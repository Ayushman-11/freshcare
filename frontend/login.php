
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | E-Commerce Auth</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="freshcare/assets/css/style.css" />
  <style>
    /* Basic styling for the login form (customize as needed) */
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
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
      font-size: 0.9rem;
      margin-top: 0.5rem;
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
      margin-top: 0.5rem;
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
    .forgot-password {
      text-align: right;
      margin-top: 0.5rem;
    }
    .forgot-password a {
      font-size: 0.9rem;
      color: var(--primary-color);
      text-decoration: none;
    }
    .forgot-password a:hover {
      text-decoration: underline;
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
  <div class="auth-container" id="login-container">
    <div class="auth-header">
      <h1>Login</h1>
      <p>Enter your credentials to access your account</p>
    </div>
    <?php if (!empty($errorMsg)): ?>
      <p class="error-message" style="text-align: center;"><?php echo $errorMsg; ?></p>
    <?php endif; ?>
    <form id="login-form" method="POST" action="/freshcare/freshcare/backend/php/login.php">
      <div class="form-group">
        <div class="input-group">
          <input type="email" id="email" name="email" required placeholder=" " />
          <label for="email">Email Address</label>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="password" id="password" name="password" required placeholder=" " />
          <label for="password">Password</label>
        </div>
      </div>
      <div class="forgot-password">
        <!-- Forgot Password Link/Button -->
        <a href="forgot-password.php">Forgot Password?</a>
      </div>
      <button type="submit">Login</button>
    </form>
    <div class="auth-footer">
      <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
  </div>
</body>
</html>
