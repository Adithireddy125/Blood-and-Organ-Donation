<?php
session_start(); // start the session

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // For now: plain-text check
        if ($row['password'] === $pass) {
            // ✅ Store user info in session
            $_SESSION['username'] = $row['username'];
            $_SESSION['logged_in'] = true;

            // ✅ Redirect to home page
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Invalid Password'); window.location='login.html';</script>";
        }
    } else {
        echo "<script>alert('User not found'); window.location='login.html';</script>";
    }

    $stmt->close();
}
$conn->close();
?>
