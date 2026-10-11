<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location='login.html';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT t.ticket_id, tr.train_name, tr.source, tr.destination, t.journey_date, t.seat_no, t.passenger_name 
        FROM tickets t 
        JOIN trains tr ON t.train_id = tr.train_id 
        WHERE t.user_id='$user_id'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Tickets</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Railway Reservation System</h1>
    <div class="auth-buttons">
      <a href="index.html">Home</a>
    </div>
  </header>

  <div class="table-container">
    <h2>Your Booked Tickets</h2>
    <table>
      <thead>
        <tr>
          <th>Ticket ID</th>
          <th>Train Name</th>
          <th>From</th>
          <th>To</th>
          <th>Date</th>
          <th>Seat No</th>
          <th>Passenger</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $row['ticket_id']; ?></td>
          <td><?php echo $row['train_name']; ?></td>
          <td><?php echo $row['source']; ?></td>
          <td><?php echo $row['destination']; ?></td>
          <td><?php echo $row['journey_date']; ?></td>
          <td><?php echo $row['seat_no']; ?></td>
          <td><?php echo $row['passenger_name']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
