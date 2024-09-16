<?php
include('userConnect.php');
if (isset($_POST['upload'])){
    $dn = $_POST['dname'];
    $av = $_POST['available'];
    $to = $_POST['total'];
    $dat = $_POST['date'];

    $ad = $_POST['address'];

    $query = "DELETE from departnments where dname='$_POST[dname]'";
    $result = mysqli_query($connection, $query);

    $query2 = "INSERT INTO departnments (dname, available,total, address,date) VALUES ('$dn', '$av', '$to','$ad','$dat')";
    $result2 = mysqli_query($connection, $query2);


    if ($result2) {
        echo "<script type='text/javascript'>
        alert('seat added in the departnment')
        window.location.href='admin_dashboard.php';
        </script>";;
    } else {
        echo "<script type='text/javascript'>
        alert('Invalid username or password  '.mysqli_error($connection))
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
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="input-box">
        <input type="text" name="dname">
        <label for="dname"> Departnment</label>
        </div>
        <div class="input-box">
        <input type="number" name="available">
        <label for="seat"> available seat</label>
        </div>
        <div class="input-box">
        <input type="number" name="total">
        <label for="seat2"> Total seat</label>
        </div>
        
        <div class="input-box">
        <input type="textarea" name="address">
        <label for="address"> Address</label>
        </div>
        <div class="input-box">
        <input type="date" name="date">
        <label for="date"> Date</label>
        </div>

<div class="input-box">
    <input type="submit" name="upload">

</div>
    </form>
</body>
</html>