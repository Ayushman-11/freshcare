<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Auth</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
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
</head>
<body>
    <!-- Login Page (comment out one container at a time) -->
    
    <div class="auth-container" id="login-container">
        <div class="auth-header">
            <h1>Welcome Back</h1>
            <p>Login to continue shopping</p>
        </div>
        <form id="login-form">
            <div class="form-group">
                <div class="input-group">
                    <input type="email" id="login-email" required placeholder=" ">
                    <label for="login-email">Email Address</label>
                </div>
                <div class="error-message">Valid email is required</div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="login-password" required placeholder=" ">
                    <label for="login-password">Password</label>
                </div>
                <div class="error-message">Password is required</div>
            </div>

            <button type="submit">Login</button>
        </form>
        <div class="auth-footer">
            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </div>
    </div>
   
</body>
</html>