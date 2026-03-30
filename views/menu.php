<style>
    /* Navbar Styling */
    .navbar {
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .nav-link-custom {
        color: var(--cf-dark-blue) !important;
        font-weight: 500;
        position: relative;
        padding-bottom: 5px;
        transition: color 0.3s ease;
    }
    .nav-link-custom:hover {
        color: var(--cf-light-blue) !important;
    }
    /* Animated underline effect */
    .nav-link-custom::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        display: block;
        margin-top: 5px;
        right: 0;
        background: var(--cf-light-blue);
        transition: width 0.4s ease, right 0.4s ease;
    }
    .nav-link-custom:hover::after {
        width: 100%;
        left: 0;
        background: var(--cf-light-blue);
    }
</style>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URL;?>">
                <img src="public/images/LogoCF.png" height="40" alt="Cannan Finance" loading="lazy" />
            </a>
            <button class="navbar-toggler text-primary" type="button" data-mdb-collapse-init data-mdb-target="#navbarExample01"
                aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4">
                    <li class="nav-item">
                        <a class="nav-link-custom nav-link" href="<?php echo URL;?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom nav-link" href="<?php echo URL;?>downloads">Download Application</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom nav-link" href="<?php echo URL;?>agents">Agents</a>
                    </li>
                </ul>

                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item me-3 me-lg-0">
                        <a target="_blank" class="nav-link text-primary" style="font-size: 1.2rem;" href="<?php echo COMPANY_FBLINK;?>">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>