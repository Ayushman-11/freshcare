<?php
// --- signup.php ---

// Start session if needed for later authentication
session_start();

// Initialize error and success message arrays
$errors = [];
$successMsg = '';

// Process form submission only if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database Connection Variables
    $db_host = "localhost";      // Change if needed
    $db_user = "root";           // Your DB username
    $db_pass = "";               // Your DB password
    $db_name = "freshcare";   // Your database name

    // Create connection using MySQLi
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die(json_encode(["success" => false, "message" => "Database Connection Failed: " . $conn->connect_error]));
    }

    // Retrieve and sanitize form inputs using the null coalescing operator
    $name            = trim($_POST['name'] ?? '');
    $email           = trim($_POST['email'] ?? '');
    $password        = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';

    // Basic Validation
    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo json_encode(["success" => false, "message" => "All fields are required!"]);
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email format!"]);
        exit();
    }

    if (strlen($password) < 6) {
        echo json_encode(["success" => false, "message" => "Password must be at least 6 characters long!"]);
        exit();
    }

    if ($password !== $confirmPassword) {
        echo json_encode(["success" => false, "message" => "Passwords do not match!"]);
        exit();
    }

    // Check if the email is already registered
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "This email is already registered!"]);
        exit();
    }
    $stmt->close();

    // Hash the password using bcrypt
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database (only inserting username, email, and password_hash for now)
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password_hash);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Registration successful!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Something went wrong. Please try again later."]);
    }
    $stmt->close();
    $conn->close();
} else {
    // Optionally, you can handle non-POST requests or just output a message.
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>
