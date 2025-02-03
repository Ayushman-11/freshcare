<?php
// login.php
session_start();

// Database connection variables
$db_host = "localhost";        // Change as needed
$db_user = "root";             // Your DB username
$db_pass = "";                 // Your DB password
$db_name = "freshcare";     // Your database name

// Initialize error message variable
$errorMsg = '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and sanitize the inputs
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Basic validation
    if (empty($email) || empty($password)) {
        $errorMsg = "Both email and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please enter a valid email address.";
    } else {
        // Create database connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute a statement to fetch the user by email
        $stmt = $conn->prepare("SELECT user_id, username, email, password_hash, account_status FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Check if the account is active (optional, based on your schema)
            if ($user['account_status'] !== 'active') {
                $errorMsg = "Your account is not active. Please contact support.";
            } else {
                // Verify the provided password against the stored hash
                if (password_verify($password, $user['password_hash'])) {
                    // Password is correct.
                    // Set session variables. You can store more user info if needed.
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];

                    // Optionally update last_login timestamp
                    $updateStmt = $conn->prepare("UPDATE users SET last_login = NOW() WHERE user_id = ?");
                    $updateStmt->bind_param("i", $user['user_id']);
                    $updateStmt->execute();
                    $updateStmt->close();

                    // Redirect to a protected page (e.g., dashboard)
                    header("Location: dashboard.php");
                    exit();
                } else {
                    // Password does not match
                    $errorMsg = "Invalid email or password.";
                }
            }
        } else {
            // No user found with that email
            $errorMsg = "Invalid email or password.";
        }
        $stmt->close();
        $conn->close();
    }
}
?>