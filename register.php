<?php

include("userConnect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_email($email, $v_code, $name){

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
    $mail->Subject = "Verify Email for registering into ODF";
    $mail->Body    = "We have received a registration request from $email, $name,
         
       <P> <b>please click the below link to verify the email for processing the request.</b></p>
        <a href='http://localhost/healthcare/verify.php?email=$email && v_code=$v_code'>Verify</a>";

    $mail->send();
        return true;
    
//  catch Exception($se){
//    return false;
//  }

}
include("userConnect.php");
if (isset($_POST['userregistration'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $fname ." ".$lname;
    $faname = $_POST['faname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $age = $_POST['age'];   
    $password = $_POST['password'];
    $confirm_password = $_POST['cpassword'];

    $query = "SELECT * from patient where email = '$_POST[email]'";
    $result = mysqli_query($connection, $query);
    if ($result){
        if(mysqli_num_rows($result) > 0){
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['email'] === $email){
                echo "<script>
                alert('Email already exists')
                </script>";
            }
        }
        else{
            $vcode = bin2hex(random_bytes(16));
            if ($password === $confirm_password){
            
                $query = "insert into patient(name,fname,contact, email,age, password , vcode , verify) values('$username','$faname','$contact','$email','$age','$password','$vcode' ,'0')";
                $result = mysqli_query($connection, $query);
                if ($result && send_email($_POST['email'],$v_code,$_POST['fname'])){ //  
                    echo"<script type='text/javascript'>alert('Email sent Successfully!');
                    window.location.href='index.php';
                        </script>";
                }
                else{
                    echo"<script type='text/javascript'>alert('Email  not sent !');
                    window.location.href='index.php';
                        </script>";

                }
            }
            else{
                echo "<script>
                alert('password and confirm password do not match')
                </script>";
            }
    }
    

    }


}

// else{
    

// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .signin-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            text-align: center;
            overflow-y: auto;
            max-height: 80vh; /* Prevents container from exceeding viewport height */
        }
        h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
            letter-spacing: 1px;
        }
        .input-box {
            position: relative;
            margin-bottom: 30px;
            width: 100%;
        }
        .input-box input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            color: #333;
            outline: none;
            transition: box-shadow 0.3s ease, transform 0.2s ease;
            background: transparent;
        }
        .input-box input:focus {
            box-shadow: 0 8px 16px rgba(0, 123, 255, 0.3);
            transform: scale(1.05);
        }
        .input-box label {
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 16px;
            color: #999;
            pointer-events: none;
            transition: 0.3s ease;
            background-color: #fff;
            padding: 0 5px;
        }
        .input-box input:focus + label,
        .input-box input:not(:placeholder-shown) + label {
            top: -12px;
            left: 12px;
            font-size: 12px;
            color: #007bff;
        }
        .input-box input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 14px 0;
            cursor: pointer;
            border-radius: 12px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
        }
        .input-box input[type="submit"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .input-box input[type="submit"]:active {
            transform: translateY(0);
        }
        .terms {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }
        .terms a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .terms a:hover {
            text-decoration: underline;
        }
        .alert {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="signin-container">
        <h2>Sign In</h2>
        <form method="post">
            <div class="input-box">
                <input type="text" id="fname" name="fname" required placeholder=" ">
                <label for="fname">First Name</label>
            </div>
            <div class="input-box">
                <input type="text" id="lname" name="lname" required placeholder=" ">
                <label for="lname">Last Name</label>
            </div>
            <div class="input-box">
                <input type="text" id="faname" name="faname" required placeholder=" ">
                <label for="faname">Father's Name</label>
            </div>
            <div class="input-box">
                <input type="number" id="contact" name="contact" required placeholder=" ">
                <label for="contact">Contact Number</label>
            </div>
            <div class="input-box">
                <input type="email" id="email" name="email" required placeholder=" ">
                <label for="email">E-mail</label>
            </div>
            <div class="input-box">
                <input type="number" id="age" name="age" required placeholder=" ">
                <label for="age">Age</label>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" required placeholder=" ">
                <label for="password">Password</label>
            </div>
            <div class="input-box">
                <input type="password" id="cpassword" name="cpassword" required placeholder=" ">
                <label for="cpassword">Confirm Password</label>
            </div>
            <div class="input-box">
                <input type="submit" value="Sign In" name="userregistration">
            </div>
            <div id="alert" class="alert"></div>
            <div class="terms">
                <p>Already have an Account? <a href="login.html">Login</a>.</p>
            </div>
            <div class="terms">
                <p>By Signing in, you agree to our <a href="#">Terms & Conditions</a>.</p>
            </div>
        </form>
    </div>
</body>
</html>
