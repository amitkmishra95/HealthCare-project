<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=" width=device-width, initial-scale=1.0">
    <title>Doctor Details Form</title>
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
        input[type="text"], textarea {
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
        <h2>Doctor Details Form</h2>
        <div class="input-box">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
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
            <label for="speciality">Speciality:</label>
            <input type="text" id="speciality" name="speciality" required>
        </div>
        <div class="input-box">
            <label for="duty_details">Day of Duty and Timing:</label>
            <textarea id="duty_details" name="duty_details" required></textarea>
        </div>
        <div class="input-box">
            <input type="submit" name="upload" value="Upload Doctor Details">
        </div>
    </form>
</body>
</html>

<?php
include('userConnect.php');

if (isset($_POST['upload'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $speciality = $_POST['speciality'];
    $duty_details = $_POST['duty_details'];

    // Insert doctor details into doctors table
    $query = "INSERT INTO doctors (name, department, speciality, duty_details) VALUES ('$name', '$department', '$speciality', '$duty_details')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script type='text/javascript'>
        alert('Doctor details uploaded successfully!')
        window.location.href='admin_dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error uploading doctor details: ' . mysqli_error($conn))
        window.location.href='login.php';
        </script>";
    }
}
?>