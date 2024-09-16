<?php
session_start();
include("userConnect.php");
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run)) {
        $result2 = mysqli_fetch_assoc($query_run);
        $_SESSION['email'] = $result2['email'];
        $_SESSION['name'] = $result2['name'];
        $name = $result2['name'];
        $email = $result2['email'];

        echo "<script type='text/javascript'>
        window.location.href='admin_dashboard.php'
        </script>";
    } else {
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            background-image: url('futuristic-background-design_23-2148503793.avif');
            background-size: cover;
            background-position: center;
        }

        header {
            background: #ed3f76;
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            position: fixed;
            width: 220px;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #333;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            padding: 15px;
            text-decoration: none;
            color: white;
            display: block;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #575757;
        }

        .navbar a.active {
            background-color: #ed3f76;
            color: white;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            margin-top: 0;
            color: #333;
        }

        .card p {
            color: #666;
            margin: 15px 0;
        }

        .card button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .card button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <div class="navbar">
        <a href="admin_dashboard.php" class="active">Home</a>
        <a href="services.php" id="seat">Upload Bookings</a>
        <a href="doctors.php" id="doctor">Upload Doctor's Detail</a>
        <a href="tbook.php" id="t1">Total Bookings</a>
        <a href="#about">About</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content" id="right">
        <!-- Content will be loaded here dynamically -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#seat").click(function() {
                $("#right").load("services.php");
            });
            // Add more event listeners as needed
        });
    </script>
</body>

</html>
