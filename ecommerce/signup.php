<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];

    $sql = "INSERT INTO users (username, email, password, address) VALUES ('$username', '$email', '$password', '$address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php?message=Registration successful! Please log in.");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Eco-Friendly Products</title>
    </head>
<style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #121212;
            color: white;
        }

        .container {
            background: rgba(33, 33, 33, 0.9);
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 350px;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            background: #1e1e1e;
            color: white;
        }

        button {
            width: 100%;
            padding: 10px;
            background: rgb(107, 117, 229);
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        a {
            color: rgb(107, 117, 229);
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }
    </style>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="signup.php">
            <div class="form-group">
                
                <input type="text" id="username" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
                
                <input type="email" id="email" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                
                <input type="password" id="password" placeholder="Password" name="password" required> 
            </div>
            <div class="form-group">
                
                <input type="text" id="address" placeholder="Address" name="address" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
<br>
        <p font-size:20px>Already have an account?</p><a href="login.php">Log in here</a>
    </div>
</body>
</html>
