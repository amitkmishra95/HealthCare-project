<?php
session_start();
include("userConnect.php");
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $query_run = mysqli_query($connection,$query);

    if(mysqli_num_rows($query_run)){
        $result2 = mysqli_fetch_assoc($query_run);
        $_SESSION['email'] = $result2['email'];
        $_SESSION['name'] = $result2['name'];
        $name = $result2['name'];
        $email = $result2['email'];

        echo "<script type='text/javascript'>
        window.location.href='admin_dashboard.php'
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
    <title>Admin DashBoard</title>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#seat").click(function(){
                $("#right").load("services.php");
            })
        })
        </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            background-image:url(futuristic-background-design_23-2148503793.avif);
        
        }

        header {
            background: #ed3f76;
            color:black;
            padding: 15px;
            text-align: center;
            
        }
        .navbar {
    position: fixed;
    width: 200px;
    top: 0;
    left: 0;
    height: 100%;
    background-color: #333;
    display: flex;
    flex-direction: column;
    padding-top: 20px;
}

.navbar a {
    padding: 10px 15px;
    text-decoration: none;
    color: white;
    display: block;
}

.navbar a:hover {
    background-color: #575757;
}

.content {
    margin-left: 220px;
    padding: 20px;
}

section {
    margin-bottom: 100px;
}

footer {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
}

footer p {
    margin: 5px 0;
}

.card-container {
    display: flex;
    flex-direction: column;
    gap: 30px;
    align-items: center;
    margin-top: 80px;
    
}

.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
    text-align: center;
    margin-bottom: 80px;
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
}

.card button:hover {
    background-color: #0056b3;
}
    </style>
</head>

<body>

    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <div class="navbar">
        <a href="#home">Home</a>
        <a href="services.php" id="seat">Update Availibility</a>
        <a href="doctors.php" id="doctor">Upload Doctor's Detail</a>
        <a href="tbook.php" id="t1" >Total bookings</a>
        <a href="tavail.php" id="t1" >Available seats</a>
        <a href="#about">About</a>
        <a href="logout.php">Logout</a>
        
    </div>

    <div id="right">
    
    </div>

    <script src="script.js"></script>

    


</body>

</html>
