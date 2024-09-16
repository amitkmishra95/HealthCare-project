<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>My Bookings</h2>
    <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Departnment name</th>
                <th>Available</th>
                <th>Total</th>
        
                <th>Address</th>
                <th> Date</th>
            </tr>
            <?php
include('userConnect.php');
// if (!isset($_SESSION['email'])) {
//     header("Location: login.php");
//     exit;
// }
            $query = "SELECT * FROM departnments";
            $result = mysqli_query($connection,$query);
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['dname'] . "</td>";
                echo "<td>" . $row['available'] . "</td>";
                echo "<td>" . $row['total'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
</body>
</html>