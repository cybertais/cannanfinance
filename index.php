<?php
    require 'config.php';
    require 'util/Auth.php';
        require  "libs/vendor/PHPMailer/PHPMailer.php";
        require  "libs/vendor/PHPMailer/SMTP.php";
     spl_autoload_register(function ($className){
        require LIBS .$className.".php";
    });
    require FULLPATH. 'libs/Form/PostValidator.php';
    $bootstrap = new Bootstrap();
    $bootstrap->init(); 
?>