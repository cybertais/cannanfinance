<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-4-strong">
                <div class="card-body p-5 text-center">

                    <div class="mb-4">
                        <img src="<?php echo URL; ?>public/images/LogoCF.png" alt="Cannan Finance" style="height: 60px;">
                    </div>
                    
                    <h4 class="mb-4 text-primary">System Sign In</h4>

                    <div id="loginAlert" class="alert alert-danger d-none" role="alert"></div>

                    <form id="loginForm">
                        <div class="form-outline mb-4" data-mdb-input-init>
                            <input type="text" id="username" name="username" class="form-control form-control-lg" required />
                            <label class="form-label" for="username">Username</label>
                        </div>

                        <div class="form-outline mb-4" data-mdb-input-init>
                            <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="<?php echo URL; ?>login/recover" class="text-decoration-none">Forgot password?</a>
                        </div>

                        <button type="submit" id="submitBtn" class="btn btn-primary btn-lg btn-block" data-mdb-ripple-init>
                            Sign in
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById('loginForm');
    const loginAlert = document.getElementById('loginAlert');
    const submitBtn = document.getElementById('submitBtn');

    // Attach submit event listener to the form
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent standard form reload

        // Hide the alert and show a loading state on the button
        loginAlert.classList.add('d-none');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Authenticating...';

        // Gather form data
        const formData = new FormData(loginForm);

        // Send AJAX request to the backend authenticate endpoint
        fetch('<?php echo URL; ?>login/authenticate', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            // Check if the HTTP response is OK before trying to parse JSON
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // SUCCESS: Route to the agentmanagement/index URL provided by the backend
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Redirecting...';
                submitBtn.classList.replace('btn-primary', 'btn-success');
                window.location.href = data.redirect;
            } else {
                // FAIL: Maintain the login page and show the error message
                loginAlert.innerText = data.message || 'Invalid username or password.';
                loginAlert.classList.remove('d-none');
                
                // Reset the button
                submitBtn.disabled = false;
                submitBtn.innerText = 'Sign in';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle fatal network or server errors gracefully
            loginAlert.innerText = 'A network error occurred or the server is unreachable. Please try again.';
            loginAlert.classList.remove('d-none');
            
            // Reset the button
            submitBtn.disabled = false;
            submitBtn.innerText = 'Sign in';
        });
    });
});
</script>