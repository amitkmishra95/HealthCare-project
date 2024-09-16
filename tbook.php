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
                <th>Name</th>
                <th>Father's Name</th>
                <th>Department</th>

                
                <th>Problem</th>
                <th>Email</th>
                <th> Date</th>
            </tr>
            <?php
include('userConnect.php');
// if (!isset($_SESSION['email'])) {
//     header("Location: login.php");
//     exit;
// }
            $query = "SELECT * FROM bookings";
            $result = mysqli_query($connection,$query);
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['department'] . "</td>";
                echo "<td>" . $row['problem'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
</body>
</html>