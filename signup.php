<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name','$email','$phone','$pass')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Signup Successful! Please login.'); window.location='login.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
