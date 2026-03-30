<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title><?=(isset($this->title)) ? $this->title: COMPANY_LONGNAME ?></title>

    <link rel="stylesheet" href="<?php echo URL;?>public/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.1/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.css">

    <link rel="icon" href="<?php echo URL;?>public/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="<?php echo URL?>public/node_modules/mdb-ui-kit/css/mdb.min.css" />

    <?php 
    if(isset($this->css)){
        foreach($this->css as $css){ echo '<link rel="stylesheet" href="'.URL.$css.'">'; }
    }
    ?>

    <script src="<?php echo URL;?>public/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.1/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.js"></script>
    <script src="<?php echo URL;?>public/js/global.js"></script>
    <script src="<?php echo URL;?>public/js/mdbootstrapglobal.js"></script>

    <style>
        /* Modern Theme Variables */
        :root {
            --cf-dark-blue: #2d3192;
            --cf-light-blue: #5497ce;
            --cf-black: #000000;
            --cf-white: #ffffff;
        }

        /* Global Body Background 
           Uses a fixed soft mesh gradient to reflect the brand colors professionally
        */
        body { 
            font-family: 'Roboto', sans-serif; 
            background-color: #f8f9fc; /* Clean, slightly cool off-white */
            background-image: 
                radial-gradient(circle at 90% 0%, rgba(84, 151, 206, 0.12), transparent 45%), /* Top Right Light Blue glow */
                radial-gradient(circle at 10% 100%, rgba(45, 49, 146, 0.08), transparent 45%); /* Bottom Left Dark Blue glow */
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        /* Preloader Styles */
        #cf-preloader {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: var(--cf-white);
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.6s ease, visibility 0.6s;
        }
        .cf-loader-logo {
            width: 250px;
            animation: cf-pulse 1.5s infinite alternate ease-in-out;
        }
        @keyframes cf-pulse {
            0% { transform: scale(0.95); opacity: 0.8; }
            100% { transform: scale(1.05); opacity: 1; }
        }

        /* Top Contact Bar */
        .top-contact-bar {
            background-color: var(--cf-dark-blue);
            color: var(--cf-white);
            padding: 8px 0;
            font-size: 13px;
        }
        .top-contact-bar a {
            color: var(--cf-white);
            text-decoration: none;
            transition: color 0.3s;
        }
        .top-contact-bar a:hover {
            color: var(--cf-light-blue);
        }
        .top-contact-bar i { margin-right: 5px; color: var(--cf-light-blue); }
        .contact-separators { margin: 0 10px; opacity: 0.5; }
    </style>
</head>

<?php 
echo "<script> let control = \"$this->control\"; control = control.toLowerCase(); </script>";
?>

<body>
    <div id="cf-preloader">
        <img src="<?php echo URL;?>public/images/LogoCF.png" alt="Cannan Finance Loader" class="cf-loader-logo">
    </div>

    <a target="_blank" href="https://wa.me/75520000" class="btn text-white btn-floating btn-lg shadow-5" style="background-color: #25d366; position: fixed; bottom: 30px; right: 30px; z-index: 1030;" data-mdb-ripple-init role="button">
      <i class="fab fa-whatsapp" style="font-size: 1.5rem;"></i>
    </a>

    <div class="top-contact-bar d-none d-md-block">
        <div class="container text-center text-md-end">
            <i class="fab fa-whatsapp"></i><a target="_blank" href="https://wa.me/75520000">7552 0000</a> 
            <span class="contact-separators">|</span> 
            <i class="fa-solid fa-phone"></i><a href="tel:+6753234499">323 4499</a> 
            <span class="contact-separators">|</span> 
            <i class="fa-solid fa-mobile-screen"></i><a href="tel:+67570922233">7092 2233</a> 
            <span class="contact-separators">|</span> 
            <i class="fa-solid fa-paper-plane"></i> <a href="mailto:enquiries@cannanfinance.com">enquiries@cannanfinance.com</a>
        </div>
    </div>

    <script>
        // Remove Preloader when page loads
        window.addEventListener('load', function() {
            const preloader = document.getElementById('cf-preloader');
            preloader.style.opacity = '0';
            setTimeout(() => preloader.style.visibility = 'hidden', 600);
        });
    </script>