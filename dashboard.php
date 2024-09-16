<?php
session_start();
include("userConnect.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM patient WHERE email = ? AND password = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $result2 = $result->fetch_assoc();
        $_SESSION['email'] = $result2['email'];
        $_SESSION['name'] = $result2['name'];
        $name = $result2['username'];

        echo "<script type='text/javascript'>
        window.location.href='dashboard.php'
        </script>";
    }

    else{
        echo "<script type='text/javascript'>
        alert('Invalid username or password')
        window.location.href='login.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f0f0f0 0%, #d9e2f1 100%);
        }

        header {
            background: #4A90E2;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-bottom: 3px solid #007aff;
        }

        .navbar {
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            height: 100%;
            background: #333;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2);
        }

        .navbar a {
            padding: 15px 20px;
            text-decoration: none;
            color: #fff;
            display: block;
            font-size: 16px;
            transition: background 0.3s, border-left 0.3s;
            border-left: 4px solid transparent;
        }

        .navbar a:hover {
            background-color: #575757;
            border-left: 4px solid #4A90E2;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }

        .card-container {
            margin-top: 20px;
        }

        .card-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        table th {
            background-color: #4A90E2;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        table tr:hover {
            background-color: #e0e0e0;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Users Dashboard</h1>
    </header>
    <div class="navbar">
        <a href="#home">Home</a>
        <a href="book.php">Take Appointment</a>
        <a id="d" href="doa.php">Doctors Availability</a>
        <!-- <a id='d' href="doa.php">Doctors Availibility</a> -->
        <a href="predict1.php">Predict disease</a>
        <a href="#about">About</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <div class="card-container">
            <h2>My Bookings</h2>
            <table>
                <tr>
                    <th>Doctor Name</th>
                    <th>Father's Name</th>
                    <th>Department</th>
                    <th>Problem</th>
                    <th>Date</th>
                </tr>
                <?php
                if (!isset($_SESSION['email'])) {
                    header("Location: login.php");
                    exit;
                }
                $query = "SELECT * FROM bookings WHERE email = ?";
                $stmt = $connection->prepare($query);
                $stmt->bind_param("s", $_SESSION['email']);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['department']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['problem']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <!-- <footer>
        <p>&copy; 2024 Hospital Website. All rights reserved.</p>
    </footer> -->

    <script src="script.js"></script>
</body>
</html>
