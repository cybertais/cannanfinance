<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title><?=(isset($this->title)) ? $this->title: COMPANY_LONGNAME ?></title>

    <link rel="stylesheet" href="<?php echo URL;?>public/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.1/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.1/sp-2.3.1/sl-2.0.1/sr-1.4.1/datatables.min.css">

    <link rel="icon" href="<?php echo URL;?>public/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
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
            --cf-accent-green: #25d366; /* Added for WhatsApp/Action items */
            --cf-black: #1a1a1a; /* Softer black for better readability */
            --cf-white: #ffffff;
            --cf-gray-bg: #f4f6f9;
        }

        /* Global Body Background */
        body { 
            font-family: 'Roboto', sans-serif; 
            background-color: var(--cf-gray-bg);
            background-image: 
                radial-gradient(circle at 85% 5%, rgba(84, 151, 206, 0.08), transparent 50%), 
                radial-gradient(circle at 15% 95%, rgba(45, 49, 146, 0.05), transparent 50%); 
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            color: var(--cf-black);
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
            transition: opacity 0.5s ease-out, visibility 0.5s;
        }
        .cf-loader-logo {
            width: 200px; /* Slightly smaller, more elegant */
            animation: cf-pulse 1.2s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
        }
        @keyframes cf-pulse {
            0% { transform: scale(0.95); opacity: 0.7; }
            100% { transform: scale(1.02); opacity: 1; }
        }

        /* Top Contact Bar */
        .top-contact-bar {
            background-color: rgba(45, 49, 146, 0.98); /* Slight transparency */
            backdrop-filter: blur(4px);
            color: var(--cf-white);
            padding: 10px 0; /* Slightly more breathing room */
            font-size: 0.85rem;
            letter-spacing: 0.3px;
        }
        .top-contact-bar a {
            color: var(--cf-white);
            text-decoration: none;
            transition: color 0.2s ease, transform 0.2s ease;
            display: inline-block;
        }
        .top-contact-bar a:hover {
            color: var(--cf-light-blue);
            transform: translateY(-1px);
        }
        .top-contact-bar i { margin-right: 6px; color: var(--cf-light-blue); opacity: 0.9; }
        .contact-separators { margin: 0 12px; opacity: 0.3; }

        /* --- GLOBAL UI/UX ENHANCEMENTS FOR INDEX --- */
        
        /* Floating WhatsApp Button Animation */
        .wa-float-btn {
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s;
        }
        .wa-float-btn:hover {
            transform: scale(1.1) rotate(-5deg);
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3) !important;
        }

        /* Agent Card Hover Effects */
        .agent-card-wrapper {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 1px solid rgba(0,0,0,0.05); /* Subtle border */
        }
        .agent-card-wrapper:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(45, 49, 146, 0.1) !important;
            border-color: rgba(84, 151, 206, 0.2);
        }
        
        /* Card Action Buttons */
        .agent-action-btn {
            transition: all 0.2s ease;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .agent-action-btn:hover {
            transform: translateY(-2px);
        }
        
        /* Search Bar Focus Effect */
        .search-filter-box {
            transition: box-shadow 0.3s ease;
            border: 1px solid transparent;
        }
        .search-filter-box:focus-within {
            box-shadow: 0 8px 20px rgba(45, 49, 146, 0.08) !important;
            border: 1px solid rgba(84, 151, 206, 0.3);
        }
        
        /* Input overrides for MDBootstrap */
        .form-control:focus, .form-select:focus {
            border-color: var(--cf-light-blue);
            box-shadow: inset 0 0 0 1px var(--cf-light-blue);
        }
    </style>
</head>

<?php 
echo "<script> let control = \"$this->control\"; control = control.toLowerCase(); </script>";
?>

<body>
    <div id="cf-preloader">
        <img src="<?php echo URL;?>public/images/LogoCF.png" alt="Cannan Finance Loader" class="cf-loader-logo">
    </div>

    <a target="_blank" href="https://wa.me/75520000" class="btn text-white btn-floating btn-lg shadow-4 wa-float-btn" style="background-color: var(--cf-accent-green); position: fixed; bottom: 30px; right: 30px; z-index: 1030;" role="button" aria-label="Chat on WhatsApp">
      <i class="fab fa-whatsapp" style="font-size: 1.6rem; margin-top: 2px;"></i>
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
        // Smoother Preloader Removal
        window.addEventListener('load', function() {
            const preloader = document.getElementById('cf-preloader');
            setTimeout(() => {
                preloader.style.opacity = '0';
                setTimeout(() => preloader.style.display = 'none', 500); // use display none after fade
            }, 300); // slight delay to ensure smooth rendering
        });
    </script>