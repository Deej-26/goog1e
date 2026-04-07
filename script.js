// Wait for the DOM to fully load before running scripts
document.addEventListener('DOMContentLoaded', function() {
    
    // Make functions globally available by attaching them to the window object
    window.slideToPassword = function() {
        const emailInput = document.getElementById('email').value;
        const track = document.getElementById('slider-track');
        const displayEmail = document.getElementById('display-email');
        
        // Basic check to ensure email isn't empty
        if(emailInput.trim() === '') {
            alert('Please enter your email or phone number.');
            return;
        }

        // Update the chip on the password screen
        displayEmail.innerText = emailInput;
        
        // Slide to Panel 2 (33.333% shifts it exactly one panel over)
        track.style.transform = 'translateX(-33.333%)';
    };

    window.slideToForgotEmail = function() {
        const track = document.getElementById('slider-track');
        // Slide to Panel 3 (66.666% shifts it two panels over)
        track.style.transform = 'translateX(-66.666%)';
    };

    window.slideBackToStart = function() {
        const track = document.getElementById('slider-track');
        // Return to Panel 1
        track.style.transform = 'translateX(0)';
    };

    window.togglePassword = function() {
        const pwdInput = document.getElementById('password');
        if (pwdInput.type === "password") {
            pwdInput.type = "text";
        } else {
            pwdInput.type = "password";
        }
    };
});