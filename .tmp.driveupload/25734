<style>
    /* =========================================
       Loader & Dim styles
       ========================================= */
    .dim { pointer-events: none; opacity: 0.6; background-color: rgb(0, 119, 255); }

    #loader {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(45, 49, 146, 0.9); /* Brand Blue */
        z-index: 9999; display: flex; justify-content: center;
        align-items: center; font-family: Arial, sans-serif;
    }
    .loader-content { text-align: center; }
    .spinner {
        margin: 0 auto 15px auto; border: 8px solid #f3f3f3;
        border-top: 8px solid var(--cf-light-blue);
        border-radius: 50%; width: 60px; height: 60px;
        animation: spin 1s linear infinite;
    }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    #loader h1 { color: white; font-weight: bolder; }
    #loader p { font-size: 26px; color: white; }

    /* =========================================
       Full Screen Slider CSS (Responsive Fix)
       ========================================= */
    .cf-slider-container {
        position: relative;
        width: 100%;
        overflow: hidden; 
        background-color: var(--cf-dark-blue);
    }

    .cf-slider-wrapper {
        display: flex;
        width: 100%;
        transition: transform 0.5s ease-in-out;
        align-items: center; 
    }

    .cf-slide {
        min-width: 100%;
        position: relative;
        display: flex; 
    }

    .cf-slide img {
        width: 100%;
        height: auto;
        object-fit: contain;
        display: block;
    }

    .cf-slide::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(45, 49, 146, 0.2); 
    }

    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(45, 49, 146, 0.7);
        color: white;
        border: none;
        cursor: pointer;
        padding: 10px 15px;
        font-size: 1.5rem;
        border-radius: 5px;
        transition: background-color 0.3s;
        z-index: 10;
    }

    .nav-btn:hover { background-color: var(--cf-light-blue); }
    .prev-btn { left: 10px; }
    .next-btn { right: 10px; }

    @media (min-width: 768px) {
        .nav-btn {
            padding: 1rem 1.5rem;
            font-size: 2rem;
        }
        .prev-btn { left: 20px; }
        .next-btn { right: 20px; }
    }

    /* =========================================
       Calculator Smooth Animations
       ========================================= */
    #ex3-tabs-1 {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    #ex3-tabs-1:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15) !important;
    }

    #vipform input, #vipform select {
        transition: all 0.3s ease-in-out;
        border: 1px solid #ccc;
    }
    #vipform input:focus, #vipform select:focus {
        box-shadow: 0 0 8px rgba(84, 151, 206, 0.5);
        border-color: var(--cf-light-blue);
        transform: translateY(-2px);
        outline: none;
    }

    #vipform button {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    #vipform button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(45, 49, 146, 0.3);
        filter: brightness(1.1);
    }
    #vipform button:active {
        transform: translateY(1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    #blink {
        opacity: 0;
        display: none;
        transform: translateY(-15px);
    }
    #blink.show-result {
        display: block;
        animation: slideDownFade 0.5s ease forwards;
    }

    @keyframes slideDownFade {
        from { opacity: 0; transform: translateY(-15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* =========================================
       Loan Cards Modern Styling
       ========================================= */
    .loan-card {
        background: var(--cf-white);
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        height: 100%;
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
        position: relative;
        overflow: hidden;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.02);
    }

    /* Hover Effects */
    .loan-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(45, 49, 146, 0.1);
        border-color: rgba(84, 151, 206, 0.3);
    }

    /* Top Accent Line on Hover */
    .loan-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--cf-dark-blue), var(--cf-light-blue));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .loan-card:hover::before {
        opacity: 1;
    }

    /* Icon Wrapper */
    .loan-icon-wrapper {
        width: 90px;
        height: 90px;
        margin: 0 auto 20px;
        background: rgba(84, 151, 206, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .loan-icon-wrapper i {
        font-size: 2.5rem;
        color: var(--cf-dark-blue);
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .loan-card:hover .loan-icon-wrapper {
        transform: scale(1.05);
        background: rgba(84, 151, 206, 0.2);
    }

    .loan-card:hover .loan-icon-wrapper i {
        color: var(--cf-light-blue);
    }

    /* Typography */
    .loan-card h5 {
        color: var(--cf-dark-blue);
        font-weight: 700;
        margin-bottom: 12px;
        font-size: 1.15rem;
    }

    .loan-card p {
        color: #555;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 0;
    }
</style>

<div id="loader" style="display: none;">
    <div class="loader-content">
        <div class="spinner"></div>
        <h1>Thank you for Choosing Cannan Finance</h1>
        <p>Processing your Request</p>
        <p>A copy of the Information will be sent to your email.</p>
    </div>
</div>

<div class="cf-slider-container">
    <div class="cf-slider-wrapper" id="sliderWrapper">
        <div class="cf-slide"><img src="<?php echo URL; ?>public/images/slider/1.png" alt="Cannan Finance Slider 1"></div>
        <div class="cf-slide"><img src="<?php echo URL; ?>public/images/slider/2.png" alt="Cannan Finance Slider 2"></div>
        <div class="cf-slide"><img src="<?php echo URL; ?>public/images/slider/3.png" alt="Cannan Finance Slider 3"></div>
    </div>
    <button class="nav-btn prev-btn" onclick="moveSlide(-1)">&#10094;</button>
    <button class="nav-btn next-btn" onclick="moveSlide(1)">&#10095;</button>
</div>

<?php require_once FULLPATH . '/views/index/datastructure/calculatorform.php'; ?>

<main class="mt-5 mb-4">
    <div class="container">
        
        <section>
            <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link active" id="ex3-tab-1" href="#ex3-tabs-1" role="tab"
                        aria-controls="ex3-tabs-1" aria-selected="true" style="color: var(--cf-dark-blue); font-weight: bold;">
                        <i class="fa fa-calculator"></i> Repayment Eligibility
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="ex2-content">
                <form style="filter: drop-shadow(0px 4px 10px rgba(0,0,0,0.1));" class="" novalidate name="vipform" id="vipform">
                    <div style="height: 100%; padding: 20px; background: #f8f9fa; border-radius: 10px; border: 1px solid #eee;"
                        class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-6 mb-4 mb-md-0">
                                    <h6 class="text-center mb-3" style="color: var(--cf-dark-blue); font-weight: 600;">Loan Details</h6>
                                    <hr>
                                    <?php
                                    require_once FULLPATH . '/views/index/form/calculatorform.php';
                                    echo $this->comp_form_select_nonmodal($principal_sel) . '<label class="mb-3 d-block" style="color: #555; font-size: 14px;"> *of 35%</label>';
                                    echo $this->comp_form_select_nonmodal($nofortnight_sel);
                                    ?>
                                    <hr>
                                    <button type="button" onclick="calculateAndDisplay()" class="btn w-100" style="background-color: var(--cf-light-blue); color: white;">Calculate</button>
                                    <hr>
                                    <div style="padding: 15px; background-color: var(--cf-dark-blue); color: white; border-radius: 5px; text-align: center; font-weight: 500;" id="blink"></div>
                                </div>

                                <div style="border-left: 1px solid #ddd;" class="col-md-6">
                                    <h6 class="text-center mb-3" style="color: var(--cf-dark-blue); font-weight: 600;">Customer Info</h6>
                                    <hr>
                                    <?php
                                    require_once FULLPATH . '/views/index/datastructure/calculatorform.php';
                                    echo $this->comp_form_input_text($firstname);
                                    echo $this->comp_form_input_text($surname);
                                    echo $this->comp_form_input_text($organization);
                                    echo $this->comp_form_input_text($empfilenumber);
                                    echo $this->comp_form_input_tel($phone);
                                    echo $this->comp_form_input_email($email);
                                    ?>
                                    <button type="submit" class="mt-3 btn w-100" style="background-color: var(--cf-dark-blue); color: white;">
                                        <i class="fa fa-paper-plane me-2"></i> Submit Application
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <hr class="my-5">

        <section class="mb-5">
            <div class="row gx-4 gy-4">
                
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <a href="#" class="loan-card">
                        <div class="loan-icon-wrapper">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                        </div>
                        <h5>New Loans</h5>
                        <p>New customers applying for any amount ranging from K300 to K5000.</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <a href="#" class="loan-card">
                        <div class="loan-icon-wrapper">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h5>Educational Loans</h5>
                        <p>Education Loans have different loan schedules. Loan amount ranging from K500 to K10,000, repayment term up to 30 fortnights.</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <a href="#" class="loan-card">
                        <div class="loan-icon-wrapper">
                            <i class="fa-solid fa-scale-balanced"></i>
                        </div>
                        <h5>Same Deduction Loans</h5>
                        <p>Existing customers applying for the same amount, same deduction on their existing loan.</p>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <a href="#" class="loan-card">
                        <div class="loan-icon-wrapper">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <h5>Additional Loans</h5>
                        <p>Existing customers applying for an additional loan on an increased/decreased deduction.</p>
                    </a>
                </div>

            </div>
        </section>
        
    </div>
</main>

<script>
    /* =========================================
       Slider JavaScript
       ========================================= */
    let currentIndex = 0;
    const slides = document.querySelectorAll('.cf-slide');
    const totalSlides = slides.length;
    const sliderWrapper = document.getElementById('sliderWrapper');

    function moveSlide(direction) {
        currentIndex += direction;
        if (currentIndex < 0) {
            currentIndex = totalSlides - 1;
        } else if (currentIndex >= totalSlides) {
            currentIndex = 0;
        }
        sliderWrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    setInterval(() => {
        moveSlide(1);
    }, 5000);


    /* =========================================
       Calculator JavaScript
       ========================================= */
    function calculateFortnightlyInterest(principal, interestRate, numberOfFortnights) {
        if (typeof principal !== 'number' || typeof interestRate !== 'number' || typeof numberOfFortnights !== 'number') {
            throw new Error("All inputs must be numbers.");
        }
        if (numberOfFortnights === 0) {
            throw new Error("Number of fortnights cannot be zero.");
        }
        const result = (principal * interestRate) / numberOfFortnights;
        return Math.round(result * 100) / 100;
    }

    function calculateAndDisplay() {
        const principal = parseFloat(document.getElementById('principal').value);
        const interestRate = parseFloat(1.35);
        const numberOfFortnights = parseFloat(document.getElementById('nofortnight').value);

        if (isNaN(principal) || isNaN(interestRate) || isNaN(numberOfFortnights)) {
            alert("Please enter valid numbers in all fields.");
            return;
        }

        const fortnightlyInterest = calculateFortnightlyInterest(principal, interestRate, numberOfFortnights);
        const resultTotal = fortnightlyInterest * numberOfFortnights;

        const formatter = new Intl.NumberFormat('en-PG', {
            style: 'currency',
            currency: 'PGK',
            minimumFractionDigits: 2,
        });

        const formattedResult = formatter.format(fortnightlyInterest);
        const formattedResultTotal = formatter.format(resultTotal);

        const resultBox = document.getElementById('blink');
        resultBox.innerHTML = `Fortnightly Repayment: <br><strong style="font-size: 1.2rem;">${formattedResult}</strong><br>Total Repayment: <strong style="font-size: 1.2rem;">${formattedResultTotal}</strong>`;
        
        resultBox.classList.remove('show-result');
        void resultBox.offsetWidth; 
        resultBox.classList.add('show-result');
        
        return false;
    }

    $(document).ready(function () {
        $("#principal").change(function (e) {
            let s = 'nofortnight';
            let x = {
                'data': $(this).val(),
                'type': 'GET',
                'url': 'd',
                'targetselect': `${s}`,
                'dbcolname_para': 'fn',
                'dbcolname_txt': 'fn',
                'setselectvalue': null,
            };
            fetchingSelect(x);
        });
    });
</script>