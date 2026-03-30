<?php
class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->control = strtolower(get_class());
        $this->thiscontrol = strtolower(get_class());
    }

    function index()
    {
        // 1. Start or resume the existing session
        Session::init();

        // 2. Wipe all existing session variables (effectively logging the user out)
        session_unset();
        session_destroy();

        // 3. Start a brand new, empty session for the login page
        Session::init();

        $titlesubject = 'Login';
        $route = 'login/index';
        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic' => $titlesubject,
            'crumb' => array(
                array('link' => URL, 'label' => 'Home'),
                array('link' => URL . strtolower(get_class($this)) . '/index', 'label' => 'Acquisition Management'),
                array('link' => URL . strtolower(get_class($this)) . '/acqdesk', 'label' => 'Acquisition Main Desk'),
                array('link' => URL . $route, 'label' => $titlesubject),
            )
        );

        $this->view->render($route);
    }

    function recover()
    {
        Session::init();

        $titlesubject = 'Recover Account';
        $route = 'login/recover';

        $this->view->js = [
            "views/login/js/app.js"
        ];

        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic' => $titlesubject,
            'crumb' => array(
                array('link' => URL, 'label' => 'Home'),
                array('link' => URL . strtolower(get_class($this)) . '/index', 'label' => 'Acquisition Management'),
                array('link' => URL . strtolower(get_class($this)) . '/acqdesk', 'label' => 'Acquisition Main Desk'),
                array('link' => URL . $route, 'label' => $titlesubject),
            )
        );

        $this->view->render($route);
    }

    /**
     * SECURE AUTHENTICATION ENDPOINT
     */
    function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
            return;
        }

        // Support for both your old MDB names and standard names
        $username = trim($_POST['username'] ?? $_POST['form2Example11'] ?? '');
        $password = trim($_POST['password'] ?? $_POST['form2Example22'] ?? '');

        if (empty($username) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Username and password are required.']);
            return;
        }

        // Pass cleaned data to the model
        $result = $this->model->loginUser($username, $password);
        
        // If login is successful, append the redirect URL
        if ($result['success'] === true) {
            $result['redirect'] = URL . 'agentmanagement/index';
        }

        echo json_encode($result);
    }

    function resetpwd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $validatepost = new Postvalidator($_GET);
            $validatepost->validateRequired('pass1', 'Incorrect Code');
            $validatepost->validateRequired('pass2', 'Incorrect Code');
            $insertmsg = null;
            if (!$validatepost->getErrors()) {
                if (trim($_GET['pass1'] === trim($_GET['pass2']))) {
                    $data = Hash::create('sha256', trim($_GET['pass2']), HASH_PASSWORD_KEY);
                    $insertmsg = $this->model->resetpwd($data);
                }
            }
            echo json_encode(
                array(
                    'data' => $validatepost->getErrors(),
                    'hasError' => $validatepost->hasErrors(),
                    'tagNames' => $validatepost->getTagNames(),
                    'requiredTag' => $validatepost->getRequiredTag(),
                    'validateTags' => $validatepost->getValidateTags(),
                    'insertmsg' => $insertmsg,
                )
            );
        }
    }

    function terminate()
    {
        echo json_encode(
            array(
                'sessionExpire' => $this->timer(),
            )
        );
    }

    function verifyconfcode()
    {
        $bool = false;
        $session = false;
        $validatepost = new Postvalidator($_GET);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $validatepost->validateRequired('code', 'Incorrect Code');
            $insertmsg = null;
            if ($this->timer()) {
                if (!$validatepost->getErrors()) {
                    Session::init();
                    if (Session::get('code') == $_GET['code']) {
                        $insertmsg = 'Excellent. you can recover the password';
                    } else {
                        $bool = true;
                        $insertmsg = "Fail. Check Code";
                    }
                } else {
                    $insertmsg = 'Cannot Be Empty';
                    $bool = false;
                }
            } else {
                $insertmsg = 'Session Expired';
                $bool = false;
                $session = true;
            }

            echo json_encode(
                array(
                    'data' => $validatepost->getErrors(),
                    'hasError' => $validatepost->hasErrors() ? $validatepost->hasErrors() : $bool,
                    'tagNames' => $validatepost->getTagNames(),
                    'requiredTag' => $validatepost->getRequiredTag(),
                    'validateTags' => $validatepost->getValidateTags(),
                    'sessionExpire' => $session,
                    'insertmsg' => $insertmsg,
                )
            );
        }
    }

    function verifyRecoveryCode()
    {
        $validatepost = new Postvalidator($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $validatepost->validateEmail('emailrecover', 'Incorrect Email Address');
            $validatepost->validateRequired('username', 'Incorrect Username');
            $insertmsg = null;
            if (!$validatepost->getErrors()) {
                if (count($this->model->rec($_POST)) > 0) {
                    $insertmsg = $this->model->rec($_POST);
                    $code = $this->generate_user_code($insertmsg[0]['username'], $insertmsg[0]['email']);
                    Session::init();
                    Session::set('userprofileid', $insertmsg[0]['userIdPk']);
                    Session::set('access_time', time());
                    Session::set('code', $code);
                    $this->emailRecoveryCode($code);
                }
            }
            echo json_encode(
                array(
                    'data' => $validatepost->getErrors(),
                    'hasError' => $validatepost->hasErrors(),
                    'tagNames' => $validatepost->getTagNames(),
                    'requiredTag' => $validatepost->getRequiredTag(),
                    'validateTags' => $validatepost->getValidateTags(),
                    'insertmsg' => $insertmsg,
                )
            );
        }
    }

    /**
     * 180000 is 3 minutes, 60000 is 1 minute, 3000 is 30 seconds, 500 is 5 seconds
     * Summary of timer
     * @param mixed $assignTime
     * @return bool : if true than it means the user can access the statement
     */
    function timer($assignTime = 180)
    {
        $val = false;
        Session::init();

        $timestamp = (int) Session::get('access_time');
        $resultTime = time() - $timestamp;

        if ($resultTime < $assignTime) {
            $val = true;
        }

        return $val;
    }

    function emailRecoveryCode($code, $email = '')
    {
        $val = false;
        $mail = new PHPMailer(true);
        try {
            // SMTP Server configuration
            $mail->isSMTP();
            $mail->Host = MAIL_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = MAIL_USERNAME;
            $mail->Password = MAIL_PASSWORD;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = MAIL_PORT;

            // Email sender & recipient details
            $mail->setFrom(MAIL_USERNAME, "User Recovery Code");
            $mail->addAddress('jonathan@cybertais.com', 'Code Email ');

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'User Code Recovery';
            $mail->Body = $code;

            if ($mail->send()) {
                return [
                    "hasError" => true,
                    "message" => "Email Successfully Sent",
                ];
            }
        } catch (Exception $e) {
            return [
                "hasError" => false,
                "message" => "Error: Mail could not be sent. Mailer Error: {$mail->ErrorInfo}",
            ];
        }
    }

    function generate_user_code(string $username, string $email): int
    {
        // Combine username, email and current microtime for randomness
        $seed = trim($username) . trim($email) . microtime(true);

        // Generate a hash from the seed
        $hash = hash('sha256', $seed);

        // Convert part of the hash to an integer
        $num = hexdec(substr($hash, 0, 8));

        // Restrict the number to 8-digit range
        $code = $num % 90000000 + 10000000;

        return (int) $code;
    }

    function rec()
    {
        $validatepost = new Postvalidator($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateEmail('emailrecover', 'Incorrect Email Address');
            $validatepost->validateRequired('username', 'Incorrect Username');
            $insertmsg = null;
            if (!$validatepost->getErrors()) {
                if (count($this->model->rec($_POST)) > 0) {
                    $insertmsg = $this->model->rec($_POST);
                    $code = $this->generate_user_code($insertmsg[0]['username'], $insertmsg[0]['email']);
                    Session::init();
                    Session::set('access_time', time());
                    Session::set('userprofileid', $insertmsg[0]['userIdPk']);
                    Session::set('code', $code);
                    $this->emailRecoveryCode($code);
                }
            }
            echo json_encode(
                array(
                    'data' => $validatepost->getErrors(),
                    'hasError' => $validatepost->hasErrors(),
                    'tagNames' => $validatepost->getTagNames(),
                    'requiredTag' => $validatepost->getRequiredTag(),
                    'validateTags' => $validatepost->getValidateTags(),
                    'insertmsg' => $insertmsg,
                )
            );
        }
    }

    function vali()
    {
        $validatepost = new Postvalidator($_GET);
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $domname = $_GET["nametag"];
            switch ($domname) {
                case "mng_plant_acquisitiontype":
                    $validatepost->validateRequired(
                        "mng_plant_acquisitiontype",
                        "Required Field"
                    );
                    break;
            }
            $c = null;
            if (in_array($domname, $validatepost->getRequiredTag(), true)) {
                $c = [$domname];
            } else {
                $c = [];
            }

            echo json_encode([
                "data" => $validatepost->getErrors(),
                "hasError" => $validatepost->hasErrors(),
                "tagNames" => $validatepost->getTagNames(),
                "requiredTag" => $c,
                "validateTags" => $validatepost->getValidateTags(),
            ]);
        }
    }
}
?>