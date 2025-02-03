<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Auth</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="freshcare/assets/css/style.css">
    <style>
        
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}

:root {
    --primary-color: #1976D2;
    --background: #f5f5f5;
    --surface: #ffffff;
    --error: #B00020;
}

body {
    background-color: var(--background);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.auth-container {
    background: var(--surface);
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 450px;
    margin: 1rem;
}

.auth-header {
    text-align: center;
    margin-bottom: 2rem;
}

.auth-header h1 {
    color: var(--primary-color);
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
    position: relative;
}

.input-group {
    position: relative;
}

.input-group input {
    width: 100%;
    padding: 1rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.input-group input:focus {
    outline: none;
    border-color: var(--primary-color);
}

.input-group label {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
    pointer-events: none;
    transition: 0.3s ease;
}

.input-group input:focus ~ label,
.input-group input:not(:placeholder-shown) ~ label {
    top: -0.5rem;
    left: 0.8rem;
    font-size: 0.8rem;
    background: var(--surface);
    padding: 0 0.2rem;
    color: var(--primary-color);
}

.error-message {
    color: var(--error);
    font-size: 0.8rem;
    margin-top: 0.5rem;
    display: none;
}

button {
    width: 100%;
    padding: 1rem;
    background: var(--primary-color);
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background: #1565C0;
}

.auth-footer {
    text-align: center;
    margin-top: 1.5rem;
}

.auth-footer a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
}

@media (max-width: 480px) {
    .auth-container {
        padding: 1.5rem;
        margin: 1rem;
    }

    .auth-header h1 {
        font-size: 1.5rem;
    }
}

    </style>
    <script>
        document.getElementById("signup-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent default form submission

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm-password").value;
    
    // Simple validation
    if (!name || !email || !password || !confirmPassword) {
        alert("All fields are required!");
        return;
    }
    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }

    let formData = new FormData();
    formData.append("name", name);
    formData.append("email", email);
    formData.append("password", password);

    fetch("signup.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Signup successful! Redirecting to login page...");
            window.location.href = "login.php"; // Redirect on success
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
});

    </script>
</head>
<body>
    <!-- Signup Page -->
    <div class="auth-container" id="signup-container">
        <div class="auth-header">
            <h1>Create Account</h1>
            <p>Sign up to start shopping</p>
        </div>
        <form id="signup-form" method="POST" action="freshcare/backend/php/signup.php">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="name" required placeholder=" ">
                    <label for="name">Full Name</label>
                </div>
                <div class="error-message">Name is required</div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="email" id="email" required placeholder=" ">
                    <label for="email">Email Address</label>
                </div>
                <div class="error-message">Valid email is required</div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password" required placeholder=" ">
                    <label for="password">Password</label>
                </div>
                <div class="error-message">Password is required</div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="confirm-password" required placeholder=" ">
                    <label for="confirm-password">Confirm Password</label>
                </div>
                <div class="error-message">Passwords must match</div>
            </div>

            <button type="submit">Sign Up</button>
        </form>
        <div class="auth-footer">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>