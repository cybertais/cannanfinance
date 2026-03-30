<?php

class Agentmanagement_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

      function masterFetchAgents()
    {
        $obj = $this->db->select('SELECT * FROM peoples
INNER JOIN agents ON agents.personidfk=peoples.persidpk
INNER JOIN provinces ON provinces.provinceId=agents.provinceid
WHERE agents.isactive is true;'
        );

        $data = array();
        $countRow = 0;
        foreach ($obj as $v) {
            $countRow = $countRow + 1;
        }
        foreach ($obj as $row) {
            $r = json_encode($row);
            $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
            $sub_array = array();
            $sub_array[] = $row['fname'];
            $sub_array[] = $row['lname'];
            $sub_array[] = $row['gender'];
            $sub_array[] = $row['email'];
            $sub_array[] = $row['phone'];
            $sub_array[] = $row['pro_name'];
            $sub_array[] = '<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
</div>';
            
            $sub_array[] = '<button type="button" class="btn cf-btn-edit btn-sm shadow-sm" id="btnEditAgent">
    <i class="fas fa-edit me-1"></i> Edit Agent
</button>';
            $data[] = $sub_array;
        } //end foreach loop
        $output = array(
            "draw" => 1,
            "recordsTotal" => $countRow,
            "recordsFiltered" => $this->getCountOfObject($obj),
            "data" => $data
        );
        return $output;
    }

    // --- SECURED LOGIN METHOD ---
    function loginUser($username, $password)
    {
        try {
            // 1. SECURE PREPARED STATEMENT
            // Matches your 'peoples' table structure from the SQL dump
            $sql = '
                SELECT 
                    u.*, 
                    CONCAT(p.fname, " ", p.lname) AS `fullname`,
                    p.fname AS givenName,
                    p.lname AS surName,
                    r.roleName,
                    r.roleIdPk AS roleIdFk
                FROM userprofile u
                INNER JOIN peoples p ON p.persidpk = u.personIdFk
                INNER JOIN user_roles ur ON ur.userIdFk = u.userIdPk 
                INNER JOIN roles r ON r.roleIdPk = ur.roleIdFk
                WHERE u.username = :username
                LIMIT 1;
            ';

            // Execute using the Database wrapper's prepared statement array
            $user = $this->db->select($sql, [':username' => $username]);

            // Safely fetch global variables (Note: ensure 'define_global_variable' exists in your DB!)
            // $globaldata = $this->db->select("SELECT * FROM `define_global_variable` LIMIT 1");
            $longname = "Cannan Finance"; // Fallback if the table doesn't exist

            if ($user && count($user) > 0) {
                $userData = $user[0];

                // Check if account is locked or inactive
                if ($userData['accountStatus'] !== 'Active' || $userData['isLocked'] == 1) {
                    return ['success' => false, 'message' => 'Account is not active or is locked. Contact your System Administrator.'];
                }

                // Verify password (Keeping your SHA-256 for backward compatibility with existing users)
                $hashedPasswordInput = Hash::create('sha256', $password, HASH_PASSWORD_KEY);

                if ($userData['passwordHash'] === $hashedPasswordInput) {
                    
                    // Reset failed login attempts on success
                    $pwData = array(
                        'failedLoginAttempts' => 0,
                        'lastLogin' => date("Y-m-d H:i:s"),
                    );
                    $this->db->update('userprofile', $pwData, "userIdPk = " . (int)$userData['userIdPk']);
                    
                    // Initialize secure session
                    Session::init();
                    Session::set('role', $userData['roleName']);
                    Session::set('userid', $userData['userIdPk']);
                    Session::set('ACCESS_ROLEID', $userData['roleIdFk']);
                    Session::set('username', $userData['username']);
                    Session::set('givenname', $userData['givenName']);
                    Session::set('surname', $userData['surName']);
                    Session::set('fullname', $userData['fullname']);
                    Session::set('loggedin', true);
                    Session::set('longname', $longname);

                    return [
                        'success' => true,
                        'message' => 'Login successful.',
                        'data' => [
                            'userId' => $userData['userIdPk'],
                            'username' => $userData['username'],
                            'role' => $userData['roleName']
                        ]
                    ];

                } else {
                    // Increment failed login attempts
                    $failedAttempts = (int)$userData['failedLoginAttempts'] + 1;
                    $isLocked = $failedAttempts >= 5 ? 1 : 0; 
                    
                    $pwData = array(
                        'failedLoginAttempts' => $failedAttempts,
                        'isLocked' => $isLocked,
                    );
                    $this->db->update('userprofile', $pwData, "userIdPk = " . (int)$userData['userIdPk']);
                    
                    $msg = $isLocked ? 'Account locked due to too many failed attempts.' : 'Incorrect password.';
                    return ['success' => false, 'message' => $msg];
                }
            } else {
                return ['success' => false, 'message' => 'Invalid username or password.'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'System error occurred. Please try again later.'];
        }
    }

    // --- SECURED RECOVERY METHOD ---
    function rec($post)
    {
        // NOTE: The 'peoples' table in your DB dump does NOT have an 'email' column. 
        // You will need to add `email` to the `peoples` table in MariaDB for this to work.
        $sql = "
            SELECT u.userIdPk, p.fname, p.lname, p.email, u.username, u.accountStatus, u.isLocked 
            FROM userprofile u 
            INNER JOIN peoples p ON p.persidpk = u.personIdFk 
            WHERE p.email = :email AND u.username = :username 
            LIMIT 1
        ";

        return $this->db->select($sql, [
            ':email' => $post['emailrecover'],
            ':username' => $post['username']
        ]);
    }
    
    // ... keep your resetpwd method
}