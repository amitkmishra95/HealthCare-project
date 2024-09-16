<?php
include("userConnect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_email($email, $num, $name){

    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'shivamverma7522075220@gmail.com';
    $mail->Password   = 'cobb cqsh twtk wruz';
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom("shivamverma7522075220@gmail.com", "Admin");
    $mail->addAddress($email,$name);

    //Content
    $mail->isHTML(true);
    $mail->Subject = "Confirmation mail for appointnment.";
    $mail->Body    = "We have received a appointnment request from $email, $name,
         
       <P> <b>Your appointnment is fixed and your booking number is $num</b></p>
        <a ></a>";

    $mail->send();
        return true;
    
//  catch Exception($se){
   return false;
//  }

}
include('userConnect.php');
session_start();
if (isset($_POST['upload'])){
    $name = $_POST['name'];
    $ag = $_POST['age'];
    $mp = $_POST['medical_problem'];
    $fm = $_POST['fname'];
    $dt = $_POST['date'];
    $dm = $_POST['department'];
    $email = $_POST['email'];

    $query = "select * from departnments where dname='$dm'";
    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);
    $available_seats = $row['available'];
    $to = $row['total'];
    $dtf = $row['date'];

    if ($available_seats > 0 && $dt === $dtf) {
        $q1 = "UPDATE departnments set available=available-1 where dname='$dm'";
        send_email($name , $email , $to-$available_seats);
        $result1 = mysqli_query($connection, $q1);
        // Insert patient details into bookings table
        $query = "INSERT INTO bookings (name, fname, age, problem, department,email , date) VALUES ('$name', '$fm', '$ag', '$mp', '$dm',$email,'$dt')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<script type='text/javascript'>
            alert('Appointnment Successfull !')
            window.location.href='dashboard.php';
            </script>";
        } else {
            echo "<script type='text/javascript'>
            alert('Appointnment not available: ' . mysqli_error($conn))
            window.location.href='dashboard.php';
            </script>";
        }
    } else {
        echo "<script type='text/javascript'>
        alert('Seat is not available in the selected department!')
        window.location.href='dashboard.php';
        </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details Form</title>
    <style>
        /* Add some basic styling to make the form look better */
        form {
            width: 50%;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .input-box {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #337ab7;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #23527c;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Patient Details Form</h2>
        <div class="input-box">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="input-box">
            <label for="fname">Father's Name:</label>
            <input type="text" id="name" name="fname" required>
        </div>
        <div class="input-box">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div class="input-box">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="input-box">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="input-box">
            <label for="medical_problem">Medical Problem:</label>
            <textarea id="medical_problem" name="medical_problem" required></textarea>
        </div>
        <div class="input-box">
            <label for="department">Department:</label>
            <select id="department" name="department" required>
                <option value="">Select Department</option>
                <option value="cardiology">Cardiology</option>
                <option value="neurology">Neurology</option>
                <option value="orthopedics">Orthopedics</option>
                <option value="pediatrics">Pediatrics</option>
                <!-- Add more department options as needed -->
            </select>
        </div>
        <div class="input-box">
            <input type="submit" name="upload" value="Upload Patient Details">
        </div>
    </form>
</body>
</html>