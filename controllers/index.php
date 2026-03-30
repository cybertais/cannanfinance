<?php
class Index extends Controller
{
    function __construct()
    {
        parent::__construct();
        Auth::handleLogin('index');
        $this->view->control = get_class();
        $this->view->token = Hash::create('SHA256', time(), HASH_GENERAL_KEY);
        Session::set('token', Hash::create('SHA256', time(), HASH_GENERAL_KEY));
    }


    function test()
    {
        $loanRepayments = [
            '300' => [1 => 405.00, 2 => 202.50, 3 => 135.00],
        ];
        $myarray = array();
        $myarray2 = array();

        foreach ($loanRepayments['300'] as $k => $v) {
            $myarray['fn'] = $k;
            $myarray['repayamount'] = $v;
            $myarray2[] = $myarray;
        }

        echo json_encode($myarray2);
    }

    function storedData()
    {

        /**
         * Loan Repayments Static Table
         * Amounts: 300–5000
         * Periods: 1–15
         * Formula: amount × 1.35 ÷ period
         */

        $loanRepayments = [
            '300' => [1 => 405.00, 2 => 202.50, 3 => 135.00, 4 => 101.25, 5 => 81.00, 6 => 67.50, 7 => 57.86, 8 => 50.62, 9 => 45.00, 10 => 40.50, 11 => 36.82, 12 => 33.75, 13 => 31.15, 14 => 28.93, 15 => 27.00],
            '400' => [1 => 540.00, 2 => 270.00, 3 => 180.00, 4 => 135.00, 5 => 108.00, 6 => 90.00, 7 => 77.14, 8 => 67.50, 9 => 60.00, 10 => 54.00, 11 => 49.09, 12 => 45.00, 13 => 41.54, 14 => 38.57, 15 => 36.00],
            '500' => [1 => 675.00, 2 => 337.50, 3 => 225.00, 4 => 168.75, 5 => 135.00, 6 => 112.50, 7 => 96.43, 8 => 84.38, 9 => 75.00, 10 => 67.50, 11 => 61.36, 12 => 56.25, 13 => 51.92, 14 => 48.21, 15 => 45.00],
            '600' => [1 => 810.00, 2 => 405.00, 3 => 270.00, 4 => 202.50, 5 => 162.00, 6 => 135.00, 7 => 115.71, 8 => 101.25, 9 => 90.00, 10 => 81.00, 11 => 73.64, 12 => 67.50, 13 => 62.31, 14 => 57.86, 15 => 54.00],
            '700' => [1 => 945.00, 2 => 472.50, 3 => 315.00, 4 => 236.25, 5 => 189.00, 6 => 157.50, 7 => 135.00, 8 => 118.12, 9 => 105.00, 10 => 94.50, 11 => 85.91, 12 => 78.75, 13 => 72.69, 14 => 67.50, 15 => 63.00],
            '800' => [1 => 1080.00, 2 => 540.00, 3 => 360.00, 4 => 270.00, 5 => 216.00, 6 => 180.00, 7 => 154.29, 8 => 135.00, 9 => 120.00, 10 => 108.00, 11 => 98.18, 12 => 90.00, 13 => 83.08, 14 => 77.14, 15 => 72.00],
            '900' => [1 => 1215.00, 2 => 607.50, 3 => 405.00, 4 => 303.75, 5 => 243.00, 6 => 202.50, 7 => 173.57, 8 => 151.88, 9 => 135.00, 10 => 121.50, 11 => 110.45, 12 => 101.25, 13 => 93.46, 14 => 86.79, 15 => 81.00],
            '1000' => [1 => 1350.00, 2 => 675.00, 3 => 450.00, 4 => 337.50, 5 => 270.00, 6 => 225.00, 7 => 192.86, 8 => 168.75, 9 => 150.00, 10 => 135.00, 11 => 122.73, 12 => 112.50, 13 => 103.85, 14 => 96.43, 15 => 90.00],
            '1100' => [1 => 1485.00, 2 => 742.50, 3 => 495.00, 4 => 371.25, 5 => 297.00, 6 => 247.50, 7 => 212.14, 8 => 185.62, 9 => 165.00, 10 => 148.50, 11 => 135.00, 12 => 123.75, 13 => 114.23, 14 => 106.07, 15 => 99.00],
            '1200' => [1 => 1620.00, 2 => 810.00, 3 => 540.00, 4 => 405.00, 5 => 324.00, 6 => 270.00, 7 => 231.43, 8 => 202.50, 9 => 180.00, 10 => 162.00, 11 => 147.27, 12 => 135.00, 13 => 124.62, 14 => 115.71, 15 => 108.00],
            '1300' => [1 => 1755.00, 2 => 877.50, 3 => 585.00, 4 => 438.75, 5 => 351.00, 6 => 292.50, 7 => 250.71, 8 => 219.38, 9 => 195.00, 10 => 175.50, 11 => 159.55, 12 => 146.25, 13 => 135.00, 14 => 125.36, 15 => 117.00],
            '1400' => [1 => 1890.00, 2 => 945.00, 3 => 630.00, 4 => 472.50, 5 => 378.00, 6 => 315.00, 7 => 270.00, 8 => 236.25, 9 => 210.00, 10 => 189.00, 11 => 171.82, 12 => 157.50, 13 => 145.38, 14 => 135.00, 15 => 126.00],
            '1500' => [1 => 2025.00, 2 => 1012.50, 3 => 675.00, 4 => 506.25, 5 => 405.00, 6 => 337.50, 7 => 289.29, 8 => 253.12, 9 => 225.00, 10 => 202.50, 11 => 184.09, 12 => 168.75, 13 => 155.77, 14 => 144.64, 15 => 135.00],
            '1600' => [1 => 2160.00, 2 => 1080.00, 3 => 720.00, 4 => 540.00, 5 => 432.00, 6 => 360.00, 7 => 308.57, 8 => 270.00, 9 => 240.00, 10 => 216.00, 11 => 196.36, 12 => 180.00, 13 => 166.15, 14 => 154.29, 15 => 144.00],
            '1700' => [1 => 2295.00, 2 => 1147.50, 3 => 765.00, 4 => 573.75, 5 => 459.00, 6 => 382.50, 7 => 327.86, 8 => 286.88, 9 => 255.00, 10 => 229.50, 11 => 208.64, 12 => 191.25, 13 => 176.54, 14 => 163.93, 15 => 153.00],
            '1800' => [1 => 2430.00, 2 => 1215.00, 3 => 810.00, 4 => 607.50, 5 => 486.00, 6 => 405.00, 7 => 347.14, 8 => 303.75, 9 => 270.00, 10 => 243.00, 11 => 220.91, 12 => 202.50, 13 => 186.92, 14 => 173.57, 15 => 162.00],
            '1900' => [1 => 2565.00, 2 => 1282.50, 3 => 855.00, 4 => 641.25, 5 => 513.00, 6 => 427.50, 7 => 366.43, 8 => 320.62, 9 => 285.00, 10 => 256.50, 11 => 233.18, 12 => 213.75, 13 => 197.31, 14 => 183.21, 15 => 171.00],
            '2000' => [1 => 2700.00, 2 => 1350.00, 3 => 900.00, 4 => 675.00, 5 => 540.00, 6 => 450.00, 7 => 385.71, 8 => 337.50, 9 => 300.00, 10 => 270.00, 11 => 245.45, 12 => 225.00, 13 => 207.69, 14 => 192.86, 15 => 180.00],
            '2100' => [1 => 2835.00, 2 => 1417.50, 3 => 945.00, 4 => 708.75, 5 => 567.00, 6 => 472.50, 7 => 405.00, 8 => 354.38, 9 => 315.00, 10 => 283.50, 11 => 257.73, 12 => 236.25, 13 => 218.08, 14 => 202.50, 15 => 189.00],
            '2200' => [1 => 2970.00, 2 => 1485.00, 3 => 990.00, 4 => 742.50, 5 => 594.00, 6 => 495.00, 7 => 424.29, 8 => 371.25, 9 => 330.00, 10 => 297.00, 11 => 270.00, 12 => 247.50, 13 => 228.46, 14 => 212.14, 15 => 198.00],
            '2300' => [1 => 3105.00, 2 => 1552.50, 3 => 1035.00, 4 => 776.25, 5 => 621.00, 6 => 517.50, 7 => 443.57, 8 => 388.12, 9 => 345.00, 10 => 310.50, 11 => 282.27, 12 => 258.75, 13 => 238.85, 14 => 221.79, 15 => 207.00],
            '2400' => [1 => 3240.00, 2 => 1620.00, 3 => 1080.00, 4 => 810.00, 5 => 648.00, 6 => 540.00, 7 => 462.86, 8 => 405.00, 9 => 360.00, 10 => 324.00, 11 => 294.55, 12 => 270.00, 13 => 249.23, 14 => 231.43, 15 => 216.00],
            '2500' => [1 => 3375.00, 2 => 1687.50, 3 => 1125.00, 4 => 843.75, 5 => 675.00, 6 => 562.50, 7 => 482.14, 8 => 421.88, 9 => 375.00, 10 => 337.50, 11 => 306.82, 12 => 281.25, 13 => 259.62, 14 => 241.07, 15 => 225.00],
            '2600' => [1 => 3510.00, 2 => 1755.00, 3 => 1170.00, 4 => 877.50, 5 => 702.00, 6 => 585.00, 7 => 501.43, 8 => 438.75, 9 => 390.00, 10 => 351.00, 11 => 319.09, 12 => 292.50, 13 => 270.00, 14 => 250.71, 15 => 234.00],
            '2700' => [1 => 3645.00, 2 => 1822.50, 3 => 1215.00, 4 => 911.25, 5 => 729.00, 6 => 607.50, 7 => 520.71, 8 => 455.62, 9 => 405.00, 10 => 364.50, 11 => 331.36, 12 => 303.75, 13 => 280.38, 14 => 260.36, 15 => 243.00],
            '2800' => [1 => 3780.00, 2 => 1890.00, 3 => 1260.00, 4 => 945.00, 5 => 756.00, 6 => 630.00, 7 => 540.00, 8 => 472.50, 9 => 420.00, 10 => 378.00, 11 => 343.64, 12 => 315.00, 13 => 290.77, 14 => 270.00, 15 => 252.00],
            '2900' => [1 => 3915.00, 2 => 1957.50, 3 => 1305.00, 4 => 978.75, 5 => 783.00, 6 => 652.50, 7 => 559.29, 8 => 489.38, 9 => 435.00, 10 => 391.50, 11 => 355.91, 12 => 326.25, 13 => 301.15, 14 => 279.64, 15 => 261.00],
            '3000' => [1 => 4050.00, 2 => 2025.00, 3 => 1350.00, 4 => 1012.50, 5 => 810.00, 6 => 675.00, 7 => 578.57, 8 => 506.25, 9 => 450.00, 10 => 405.00, 11 => 368.18, 12 => 337.50, 13 => 311.54, 14 => 289.29, 15 => 270.00],
            '3100' => [1 => 4185.00, 2 => 2092.50, 3 => 1395.00, 4 => 1046.25, 5 => 837.00, 6 => 697.50, 7 => 597.86, 8 => 523.12, 9 => 465.00, 10 => 418.50, 11 => 380.45, 12 => 348.75, 13 => 321.92, 14 => 298.93, 15 => 279.00],
            '3200' => [1 => 4320.00, 2 => 2160.00, 3 => 1440.00, 4 => 1080.00, 5 => 864.00, 6 => 720.00, 7 => 617.14, 8 => 540.00, 9 => 480.00, 10 => 432.00, 11 => 392.73, 12 => 360.00, 13 => 332.31, 14 => 308.57, 15 => 288.00],
            '3300' => [1 => 4455.00, 2 => 2227.50, 3 => 1485.00, 4 => 1113.75, 5 => 891.00, 6 => 742.50, 7 => 636.43, 8 => 556.88, 9 => 495.00, 10 => 445.50, 11 => 405.00, 12 => 371.25, 13 => 342.69, 14 => 318.21, 15 => 297.00],
            '3400' => [1 => 4590.00, 2 => 2295.00, 3 => 1530.00, 4 => 1147.50, 5 => 918.00, 6 => 765.00, 7 => 655.71, 8 => 573.75, 9 => 510.00, 10 => 459.00, 11 => 417.27, 12 => 382.50, 13 => 353.08, 14 => 327.86, 15 => 306.00],
            '3500' => [1 => 4725.00, 2 => 2362.50, 3 => 1575.00, 4 => 1181.25, 5 => 945.00, 6 => 787.50, 7 => 675.00, 8 => 590.62, 9 => 525.00, 10 => 472.50, 11 => 429.55, 12 => 393.75, 13 => 363.46, 14 => 337.50, 15 => 315.00],
            '3600' => [1 => 4860.00, 2 => 2430.00, 3 => 1620.00, 4 => 1215.00, 5 => 972.00, 6 => 810.00, 7 => 694.29, 8 => 607.50, 9 => 540.00, 10 => 486.00, 11 => 441.82, 12 => 405.00, 13 => 373.85, 14 => 347.14, 15 => 324.00],
            '3700' => [1 => 4995.00, 2 => 2497.50, 3 => 1665.00, 4 => 1248.75, 5 => 999.00, 6 => 832.50, 7 => 713.57, 8 => 624.38, 9 => 555.00, 10 => 499.50, 11 => 454.09, 12 => 416.25, 13 => 384.23, 14 => 356.79, 15 => 333.00],
            '3800' => [1 => 5130.00, 2 => 2565.00, 3 => 1710.00, 4 => 1282.50, 5 => 1026.00, 6 => 855.00, 7 => 732.86, 8 => 641.25, 9 => 570.00, 10 => 513.00, 11 => 466.36, 12 => 427.50, 13 => 394.62, 14 => 366.43, 15 => 342.00],
            '3900' => [1 => 5265.00, 2 => 2632.50, 3 => 1755.00, 4 => 1316.25, 5 => 1053.00, 6 => 877.50, 7 => 752.14, 8 => 658.12, 9 => 585.00, 10 => 526.50, 11 => 478.64, 12 => 438.75, 13 => 405.00, 14 => 376.07, 15 => 351.00],
            '4000' => [1 => 5400.00, 2 => 2700.00, 3 => 1800.00, 4 => 1350.00, 5 => 1080.00, 6 => 900.00, 7 => 771.43, 8 => 675.00, 9 => 600.00, 10 => 540.00, 11 => 490.91, 12 => 450.00, 13 => 415.38, 14 => 385.71, 15 => 360.00],
            '4100' => [1 => 5535.00, 2 => 2767.50, 3 => 1845.00, 4 => 1383.75, 5 => 1107.00, 6 => 922.50, 7 => 790.71, 8 => 691.88, 9 => 615.00, 10 => 553.50, 11 => 503.18, 12 => 461.25, 13 => 425.77, 14 => 395.36, 15 => 369.00],
            '4200' => [1 => 5670.00, 2 => 2835.00, 3 => 1890.00, 4 => 1417.50, 5 => 1134.00, 6 => 945.00, 7 => 810.00, 8 => 708.75, 9 => 630.00, 10 => 567.00, 11 => 515.45, 12 => 472.50, 13 => 436.15, 14 => 405.00, 15 => 378.00],
            '4300' => [1 => 5805.00, 2 => 2902.50, 3 => 1935.00, 4 => 1451.25, 5 => 1161.00, 6 => 967.50, 7 => 829.29, 8 => 725.62, 9 => 645.00, 10 => 580.50, 11 => 527.73, 12 => 483.75, 13 => 446.54, 14 => 414.64, 15 => 387.00],
            '4400' => [1 => 5940.00, 2 => 2970.00, 3 => 1980.00, 4 => 1485.00, 5 => 1188.00, 6 => 990.00, 7 => 848.57, 8 => 742.50, 9 => 660.00, 10 => 594.00, 11 => 540.00, 12 => 495.00, 13 => 456.92, 14 => 424.29, 15 => 396.00],
            '4500' => [1 => 6075.00, 2 => 3037.50, 3 => 2025.00, 4 => 1518.75, 5 => 1215.00, 6 => 1012.50, 7 => 867.86, 8 => 759.38, 9 => 675.00, 10 => 607.50, 11 => 552.27, 12 => 506.25, 13 => 467.31, 14 => 433.93, 15 => 405.00],
            '4600' => [1 => 6210.00, 2 => 3105.00, 3 => 2070.00, 4 => 1552.50, 5 => 1242.00, 6 => 1035.00, 7 => 887.14, 8 => 776.25, 9 => 690.00, 10 => 621.00, 11 => 564.55, 12 => 517.50, 13 => 477.69, 14 => 443.57, 15 => 414.00],
            '4700' => [1 => 6345.00, 2 => 3172.50, 3 => 2115.00, 4 => 1586.25, 5 => 1269.00, 6 => 1057.50, 7 => 906.43, 8 => 793.12, 9 => 705.00, 10 => 634.50, 11 => 576.82, 12 => 528.75, 13 => 488.08, 14 => 453.21, 15 => 423.00],
            '4800' => [1 => 6480.00, 2 => 3240.00, 3 => 2160.00, 4 => 1620.00, 5 => 1296.00, 6 => 1080.00, 7 => 925.71, 8 => 810.00, 9 => 720.00, 10 => 648.00, 11 => 589.09, 12 => 540.00, 13 => 498.46, 14 => 462.86, 15 => 432.00],
            '4900' => [1 => 6615.00, 2 => 3307.50, 3 => 2205.00, 4 => 1653.75, 5 => 1323.00, 6 => 1102.50, 7 => 945.00, 8 => 826.88, 9 => 735.00, 10 => 661.50, 11 => 601.36, 12 => 551.25, 13 => 508.85, 14 => 472.50, 15 => 441.00],
            '5000' => [1 => 6750.00, 2 => 3375.00, 3 => 2250.00, 4 => 1687.50, 5 => 1350.00, 6 => 1125.00, 7 => 964.29, 8 => 843.75, 9 => 750.00, 10 => 675.00, 11 => 613.64, 12 => 562.50, 13 => 519.23, 14 => 482.14, 15 => 450.00],
        ];

        return $loanRepayments;
    }


    function d()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $myarray = array();
            $myarray2 = array();
            foreach ($this->storedData() as $k => $v) {
                if ($k === intval($_GET['data'])) {
                    foreach ($v as $ks => $vs) {
                        $myarray['fn'] = $ks;
                        $myarray['repayamount'] = $vs;
                        $myarray2[] = $myarray;
                    }
                }
            }
            echo json_encode($myarray2);
        }
    }


    // sent to Cannan Finanance Enquiry
    function postmail($post)
    {

        $val = false;
        $mail = new PHPMailer(true);
        try {

            // $repaymentValue = floatval($post['principal'] / $post['nofortnight']);
            $repaymentValue = floatval(($post['principal'] / $post['nofortnight']) * 1.35);
            $formatted = 'PGK ' . number_format($repaymentValue, 2, '.', ',');

            // SMTP Server configuration
            $mail->isSMTP();
            $mail->Host = MAIL_HOST;          // Set the SMTP server to send through
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = MAIL_USERNAME; //'your-email@example.com'; // SMTP username
            $mail->Password = MAIL_PASSWORD;    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = MAIL_PORT;                          // TCP port to connect to

            // Email sender & recipient details
            $mail->setFrom(MAIL_USERNAME, 'CF Website Enquiry ');
            // $mail->addAddress('malgajona@gmail.com', 'Enquiry Cannan Finance');
            $mail->addAddress('enquiries@cannanfinance.com', 'Enquiry Cannan Finance');
            // Email content
            $mail->isHTML(true);
            $mail->Subject = "CF Website Enquiry from: " . $post['firstname'] . " " . $post['surname'];
            $mail->Body =
                "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Loan Calculator and Customer Info (Labels Only)</title>

                <style>
                        body {
                        font-family: Arial, sans-serif;
                        background-color:rgb(150, 150, 150);
                        margin: 0;
                        padding: 20px;
                        }

                        .form-table {
                        width: 100%;
                        color: white;
                        background-color:rgb(255, 255, 255);
                        border-collapse: separate;
                        border-spacing: 10px;
                        padding: 10px;
                        border-radius: 8px;
                        }

                        .left-section, .right-section {
                        vertical-align: top;
                        }

                        .left-section table, .right-section table {
                        width: 100%;
                        }

                        label {
                        display: block;
                        padding: 5px 5px;
                        font-size: 12px;
                        color: white;
                        background-color: #00177d;
                        border-radius: 4px;
                        text-align: left;
                        }

                        h2 {
                        margin-bottom: 5px;
                        font-size: 15px;
                        color: #555;
                        }

                        p {
                        margin: 10px 0;
                        font-size: 16px;
                        color: #333;
                        }

                        a{
                            text-decoration: none;
                        }

                </style>

                </head>
                <body>
                <table class='form-table'>
                    <tr>
                        <td class='left-section'>
                        <table>
                        <tr>
                        <td colspan='2'><h2>Loan Calculation</h2></td>
                        </tr>
                        <tr>
                        <td><label>Principal (Kina): K{$post['principal']}</label></td>
                        </tr>
                        <tr>
                        <td><p>of 35%</p></td>
                        </tr>
                        <tr>
                        <td><label>No of Fortnight: {$post['nofortnight']}</label></td>
                        </tr>
                        <tr>
                        <td><label>Fortnightly Repayment: " . $formatted . "</label></td>
                    </tr>
                </table>
                </td>

                <td class='right-section'>
                <table>
                <tr>
                <td colspan='2'><h2>Customer Info</h2></td>
                </tr>
                <tr>
                <td><label>First Name: {$post['firstname']}</label></td>
                </tr>
                <tr>
                <td><label>Surname: {$post['surname']}</label></td>
                </tr>
                <tr>
                <td><label>Employer Organization: {$post['organization']}</label></td>
                </tr>
                <tr>
                <td><label>Employer File Number: {$post['empfilenumber']}</label></td>
                </tr>
                <tr>
                <td><label>Phone: {$post['phone']}</label></td>
                </tr>
                <tr>
                <td><label>Email: {$post['cemail']}</label></td>
                </tr>

                </table>
                </td>
                </tr>
                </table>
                </body>
                </html>
            ";




            if ($mail->send()) {
                return array(
                    'hasError' => true,
                    'message' => 'Email Successfully Sent',
                );
            }
        } catch (Exception $e) {
            return array(
                'hasError' => false,
                'message' => "Error: Mail could not be sent. Mailer Error: {$mail->ErrorInfo}",
            );
        }
    }

    // sent copy to the customer
    function recieptpostmail($post)
    {
        $val = false;
        $mail = new PHPMailer(true);
        try {
            $repaymentValue = floatval(($post['principal'] / $post['nofortnight']) * 1.35);
            $formatted = 'PGK ' . number_format($repaymentValue, 2, '.', ',');


            // SMTP Server configuration
            $mail->isSMTP();
            $mail->Host = MAIL_HOST;          // Set the SMTP server to send through
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = MAIL_USERNAME; //'your-email@example.com'; // SMTP username
            $mail->Password = MAIL_PASSWORD;    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = MAIL_PORT;                          // TCP port to connect to

            // Email sender & recipient details
            $mail->setFrom(MAIL_USERNAME, 'CF Website Enquiry ');
            $mail->addAddress($post['cemail'], $post['firstname'] . ' ' . $post['surname']);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = "Thank You for Contacting Cannan Finance";
            $mail->Body =
                "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>

                <style>
                body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                margin: 0;
                padding: 20px;
                }

                .form-table {
                width: 100%;
                background-color: #fff;
                border-collapse: separate;
                border-spacing: 10px;
                padding: 10px;
                border-radius: 8px;
                }

                .left-section, .right-section {
                vertical-align: top;
                }

                .left-section table, .right-section table {
                width: 100%;
                }

                label {
                display: block;
                padding: 5px 5px;
                font-size: 12px;
                color: white;
                background-color:#00177d;
                border-radius: 4px;
                text-align: left;
                }

                a{
                    text-decoration: none;
                }

                h2 {
                margin-bottom: 5px;
                font-size: 15px;
                color: #555;
                }

                p {
                margin: 10px 0;
                font-size: 16px;
                color: #333;
                }
                </style>


                </head>
                    <body>
                    <h2 style='text-align: center; color: #2c3e50;'>Thank You for Contacting Cannan Finance</h2>
                    <p>Dear " . $post['firstname'] . ",</p>
                    <h2 style='color=rgb(0, 23, 125)'>Thank you for reaching out to Cannan Finance. One of our customer representatives will contact you shortly to assist with your request.</h2>
                    <br>
                    <h3>Copy of Your Data</h3>
                        <table class='form-table'>
                        <tr>
                        <td class='left-section'>
                        <table>
                        <tr>
                        <td colspan='2'><h2>Loan Calculation</h2></td>
                        </tr>
                        <tr>
                        <td><label>Principal (Kina): K{$post['principal']}</label></td>
                        </tr>
                        <tr>
                        <td><p>of 35%</p></td>
                        </tr>
                        <tr>
                        <td><label>No of Fortnight: {$post['nofortnight']}</label></td>
                        </tr>
                        <tr>
                        <td><label>Fortnightly Repayment: " . $formatted . "</label></td>
                        </tr>

                        </table>
                        </td>

                        <td class='right-section'>
                        <table>
                        <tr>
                        <td colspan='2'><h2>Customer Info</h2></td>
                        </tr>
                        <tr>
                        <td><label>First Name: {$post['firstname']}</label></td>
                        </tr>
                        <tr>
                        <td><label>Surname: {$post['surname']}</label></td>
                        </tr>
                        <tr>
                        <td><label>Employer Organization: {$post['organization']}</label></td>
                        </tr>
                        <tr>
                        <td><label>Employer File Number: {$post['empfilenumber']}</label></td>
                        </tr>
                        <tr>
                        <td><label>Phone: {$post['phone']}</label></td>
                        </tr>
                        <tr>
                        <td><label>Email: {$post['cemail']}</label></td>
                        </tr>

                        </table>
                        </td>
                        </tr>
                        </table>
                    <p>Should you have any urgent questions or need further assistance in the meantime, please don't hesitate to let us know.</p>
                    <br>
                    <p>Best regards,</p>
                    <p><strong>Cannan Finance Enquiry Help Desk</strong><br>
                    Cannan Finance Team</p>
                    </body>
                </html>
            ";




            if ($mail->send()) {
                return array(
                    'hasError' => true,
                    'message' => 'Email Successfully Sent',
                );
            }
        } catch (Exception $e) {
            return array(
                'hasError' => false,
                'message' => "Error: Mail could not be sent. Mailer Error: {$mail->ErrorInfo}",
            );
        }
    }


    function pf()
    {

        // Define what each field type is
        $rules = [
            'principal' => 'number',
            'nofortnight' => 'number',
            'firstname' => 'text',
            'surname' => 'text',
            'organization' => 'text',
            'empfilenumber' => 'text',
            'phone' => 'number',
            'cemail' => 'email',
        ];


        require_once 'libs/Form/InputSanitizer.php';
        // Dynamically sanitize all fields
        $sanitizedPost = InputSanitizer::sanitizeArray($_POST, $rules);
        $validatepost = new Postvalidator($sanitizedPost);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateRequired('principal', 'Enter Pricipal');
            $validatepost->validateRequired('nofortnight', 'Required. Enter No of Fortnight');
            $validatepost->validateRequired('firstname', 'Enter First');
            $validatepost->validateRequired('surname', 'Required. Enter Surname');
            $validatepost->validateRequired('organization', 'Required. Enter Organization');
            $validatepost->validateRequired('empfilenumber', 'Required. Enter File Number');
            $validatepost->validateRequired('phone', 'Required. Enter Phone Number');
            $validatepost->validateRequired('cemail', 'Required. Enter Email');

            $insertmsg = null;
            if (!$validatepost->getErrors()) {
                $insertmsg = $this->model->pf($sanitizedPost);
                $postmailmsg = $this->postmail($sanitizedPost);
                $recieptpostmail = $this->recieptpostmail($sanitizedPost);

            }
            echo json_encode(
                array(
                    'data' => $validatepost->getErrors(),
                    'hasError' => $validatepost->hasErrors(),
                    'tagNames' => $validatepost->getTagNames(),
                    'requiredTag' => $validatepost->getRequiredTag(),
                    'validateTags' => $validatepost->getValidateTags(),
                    'insertmsg' => $insertmsg,
                    'postmailmsg' => $postmailmsg ?? "Default message if undefined",
                    'recieptpostmail' => $recieptpostmail ?? "Default message if undefined",
                )
            );
        }
    }

    function loanamount()
    {
        return array(
            array('loan_amount_id' => '300', 'loan_amount' => 'K 300'),
            array('loan_amount_id' => '400', 'loan_amount' => 'K 400'),
            array('loan_amount_id' => '500', 'loan_amount' => 'K 500'),
            array('loan_amount_id' => '600', 'loan_amount' => 'K 600'),
            array('loan_amount_id' => '700', 'loan_amount' => 'K 700'),
            array('loan_amount_id' => '800', 'loan_amount' => 'K 800'),
            array('loan_amount_id' => '900', 'loan_amount' => 'K 900'),
            array('loan_amount_id' => '1000', 'loan_amount' => 'K 1,000'),
            array('loan_amount_id' => '1100', 'loan_amount' => 'K 1,100'),
            array('loan_amount_id' => '1200', 'loan_amount' => 'K 1,200'),
            array('loan_amount_id' => '1300', 'loan_amount' => 'K 1,300'),
            array('loan_amount_id' => '1400', 'loan_amount' => 'K 1,400'),
            array('loan_amount_id' => '1500', 'loan_amount' => 'K 1,500'),
            array('loan_amount_id' => '1600', 'loan_amount' => 'K 1,600'),
            array('loan_amount_id' => '1700', 'loan_amount' => 'K 1,700'),
            array('loan_amount_id' => '1800', 'loan_amount' => 'K 1,800'),
            array('loan_amount_id' => '1900', 'loan_amount' => 'K 1,900'),
            array('loan_amount_id' => '2000', 'loan_amount' => 'K 2,000'),
            array('loan_amount_id' => '2100', 'loan_amount' => 'K 2,100'),
            array('loan_amount_id' => '2200', 'loan_amount' => 'K 2,200'),
            array('loan_amount_id' => '2300', 'loan_amount' => 'K 2,300'),
            array('loan_amount_id' => '2400', 'loan_amount' => 'K 2,400'),
            array('loan_amount_id' => '2500', 'loan_amount' => 'K 2,500'),
            array('loan_amount_id' => '2600', 'loan_amount' => 'K 2,600'),
            array('loan_amount_id' => '2700', 'loan_amount' => 'K 2,700'),
            array('loan_amount_id' => '2800', 'loan_amount' => 'K 2,800'),
            array('loan_amount_id' => '2900', 'loan_amount' => 'K 2,900'),
            array('loan_amount_id' => '3000', 'loan_amount' => 'K 3,000'),
            array('loan_amount_id' => '3100', 'loan_amount' => 'K 3,100'),
            array('loan_amount_id' => '3200', 'loan_amount' => 'K 3,200'),
            array('loan_amount_id' => '3300', 'loan_amount' => 'K 3,300'),
            array('loan_amount_id' => '3400', 'loan_amount' => 'K 3,400'),
            array('loan_amount_id' => '3500', 'loan_amount' => 'K 3,500'),
            array('loan_amount_id' => '3600', 'loan_amount' => 'K 3,600'),
            array('loan_amount_id' => '3700', 'loan_amount' => 'K 3,700'),
            array('loan_amount_id' => '3800', 'loan_amount' => 'K 3,800'),
            array('loan_amount_id' => '3900', 'loan_amount' => 'K 3,900'),
            array('loan_amount_id' => '4000', 'loan_amount' => 'K 4,000'),
            array('loan_amount_id' => '4100', 'loan_amount' => 'K 4,100'),
            array('loan_amount_id' => '4200', 'loan_amount' => 'K 4,200'),
            array('loan_amount_id' => '4300', 'loan_amount' => 'K 4,300'),
            array('loan_amount_id' => '4400', 'loan_amount' => 'K 4,400'),
            array('loan_amount_id' => '4500', 'loan_amount' => 'K 4,500'),
            array('loan_amount_id' => '4600', 'loan_amount' => 'K 4,600'),
            array('loan_amount_id' => '4700', 'loan_amount' => 'K 4,700'),
            array('loan_amount_id' => '4800', 'loan_amount' => 'K 4,800'),
            array('loan_amount_id' => '4900', 'loan_amount' => 'K 4,900'),
            array('loan_amount_id' => '5000', 'loan_amount' => 'K 5,000'),
        );
    }


    function index()
    {
         // 1. Start or resume the existing session
        Session::init();

        // 2. Wipe all existing session variables (effectively logging the user out)
        session_unset();
        session_destroy();
        
        $this->view->js = array(
            'views/index/js/app.js',
        );
        $route = 'index/index';
        $this->view->title = "Home";
        $this->view->storedData = $this->storedData();
        $this->view->loanamount = $this->loanamount();

        $this->view->subjectObj = array(
            'topic' => COMPANY_INITIAL . URL,
            'crumb' => array(
                array('link' => URL, 'label' => 'Home'),
                array('link' => URL . $route, 'label' => 'Home'),
            )
        );
        $this->view->render($route);
    }


}
?>