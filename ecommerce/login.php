<?php
include 'config.php';

$message = ""; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prevent SQL Injection (use prepared statements)
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $message = "Login successful!";
            // You can start a session here if needed
            // session_start();
            // $_SESSION['user'] = $row['username'];
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No user found with that email.";
    }
    $stmt->close();
}

// Check if there's a message from a redirect
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Eco-Friendly Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <!-- Display the message inside the form container -->
        <?php if (!empty($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="form-group">
                
                <input type="email" id="email" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                
                <input type="password" id="password" placeholder="Password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account?</p> <a href="signup.php">Sign up here</a>
    </div>
</body>
</html>
