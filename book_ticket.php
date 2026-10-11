<?php
session_start();
include 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location='login.html';</script>";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id   = $_SESSION['user_id'];
    $train_id  = $_POST['train_id'];
    $date      = $_POST['journey_date'];
    $pname     = $_POST['passenger_name'];
    $age       = $_POST['passenger_age'];
    $gender    = $_POST['passenger_gender'];

    // Random seat number
    $seat_no = "S".rand(1,100);

    // Insert into tickets
    $sql = "INSERT INTO tickets (user_id, train_id, journey_date, passenger_name, passenger_age, passenger_gender, seat_no)
            VALUES ('$user_id','$train_id','$date','$pname','$age','$gender','$seat_no')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Ticket booked successfully!'); window.location='view_ticket.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
