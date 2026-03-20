<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system"; // your existing database

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success_msg = $error_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validate passwords
    if ($password !== $confirm_password) {
        $error_msg = "Passwords do not match!";
    } else {
        // Check if username already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_msg = "Username already exists!";
        } else {
            // Insert into database without encryption
            $insert_stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $insert_stmt->bind_param("ss", $username, $password);

            if ($insert_stmt->execute()) {
                $success_msg = "Registration successful! You can <a href='login.html'>login</a> now.";
            } else {
                $error_msg = "Error: " . $insert_stmt->error;
            }
            $insert_stmt->close();
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - Blood & Organ Donation</title>
<link rel="shortcut icon" href="./photos/LOGO.webp" type="image/x-icon">
<style>
body {
    font-family: 'Arial', sans-serif;
    background: #ffe5e5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
form {
    background: #fff5f5;
    padding: 35px 40px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(255, 0, 0, 0.2);
    width: 400px;
    border: 2px solid #ff0000;
}
form h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #c10000;
    font-size: 24px;
    font-weight: bold;
}
.input-box {
    margin-bottom: 18px;
}
.input-box input {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ff4d4d;
    font-size: 14px;
    background-color: #fff0f0;
}
.input-box input:focus {
    border-color: #c10000;
    outline: none;
    box-shadow: 0 0 5px #ff4d4d;
}
.submit {
    text-align: center;
}
.button-light {
    background: #c10000;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
}
.button-light:hover {
    background: #ff1a1a;
    box-shadow: 0 4px 15px rgba(255, 0, 0, 0.4);
}
.message {
    text-align: center;
    margin-bottom: 15px;
    font-weight: bold;
}
.message.success { color: green; }
.message.error { color: red; }
</style>
</head>
<body>

<form action="register.php" method="POST">
    <h2>Register</h2>

    <?php if($success_msg) echo "<div class='message success'>$success_msg</div>"; ?>
    <?php if($error_msg) echo "<div class='message error'>$error_msg</div>"; ?>

    <div class="input-box">
        <input type="text" name="username" placeholder="Username" required>
    </div>
    <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
    </div>
    <div class="input-box">
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    </div>
    <div class="submit">
        <button type="submit" class="button-light">Register</button>
    </div>
</form>

</body>
</html>
