<?php
define('COLOR_1','#ff9200');
define('COLOR_2','#ecbb16');

define('URL', 'http://localhost/cannanfinance/');

define('FULLPATH',                  __DIR__.'/');

define('LIBS',                      FULLPATH."libs/");
define("CERTSPATH",                 FULLPATH."upload/certs/");
define("UPLOADFILEPATH",            FULLPATH."upload/declaration/");
define("PATH_TO_ACCOUNTS_FOLDER",   FULLPATH."upload/accounts/");

define('MAX_FILE_SIZE', 8);
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','cannanfi_website2');
define('DB_USER','root');
define('DB_PASS','');
// define('DB_PASS','temp');
 //The sitewide hashkey, do not change this because this is used for passwords!
 //The sitewide hashkey, do not change this because this is used for passwords!
 //This is for other hash key, not sure yet...
define('HASH_GENERAL_KEY', 'm!rA5#@25');

//This is for database password only
define('HASH_PASSWORD_KEY', 'M$Dd@$$25');


// *** START*** START*** START*** START*** START*** START*** START*** START
// ************************************************************************
//
// Email Server MTI Standard Config
define('MAIL_SMTPSECURE', 'TLS');
define('MAIL_PORT', 587);
define('MAIL_HOST', 'smtp.gmail.com');

// Account 1 -> Notification for Post

define('MAIL_CONTACT', 'Cannan Finance');
// define('MAIL_USERNAME', 'admin@cybertais.com');
// define('MAIL_PASSWORD', 'iqnr bjmg neny ywwv');// belongs to CT Admin

define('MAIL_USERNAME', 'cannanfinance@gmail.com');
define('MAIL_PASSWORD', 'thne zmac fhbh ucux'); // belongs to CF Gmail



//
// ***********************************************************************
// *** END *** END *** END *** END *** END *** END *** END *** END *** END

define('PROJECT_TITLE', 'Cannan Finance');
define('SYSTEMNAME_LONG','Cannan Finance - Website');
define('SYSTEMNAME_SHORT','CF');
define('COMPANY_LONGNAME', 'Cannan Finance');
define('COMPANY_SHORTNAME', 'Cannan Finance');
define('COMPANY_INITIAL', 'CF');
define('COMPANY_SLOGAN', 'Fast, Easy & Convenient');
define('COMPANY_POSTALADDRESS', 'CF');
define('COMPANY_PHYSICALADDRESS', 'CF');
define('COMPANY_LANDLINE', '123456');
define('COMPANY_PHONE1', '70000001');
define('COMPANY_PHONE2', '70000002');
define('COMPANY_WHATSAPPNUMBER', '7255212');
define('COMPANY_SYSUSER', 'Administrator');
define('COMPANY_FBLINK', 'https://www.facebook.com/profile.php?id=100093887439708');
define('IR', 1.35);

// Cybertais Information
define('DEVELOPER_LONGNAME', 'Cybertais IT Consultant');

?>
