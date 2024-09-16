<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <nav>
        <h1>Welcome to City HOSPITAL</h1>

        </nav>
    </header>
    <section class="hero">
    
    <p></p>
    
              
    </section>
    <div id="container">
       
            <div class="cta">
          
        <p>New here ? <a href="register.php">Register</a> 
        </p>
        <p>Already a member ? <a href="login.php">Login</a>
        </p>     
        <p>Admin ? <a href="admin_login.php">Admin Login</a> 
        </p>
            
        </div>  
        </div>
    
    <footer>
        <p>&copy; Student Discussion Forum</p>
    </footer>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Hospital Booking Forum</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f7;
            color: #333;
        }

        header {
            background: linear-gradient(45deg, #4caf50, #81c784);
            color: white;
            padding: 40px 0;
            text-align: center;
            position: relative;
        }

        nav h1 {
            background-color: white;
            color: #2e7d32;
            padding: 20px;
            border-radius: 50px;
            display: inline-block;
            font-size: 3em;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }

        .hero {
            background-color: #e8f5e9;
            padding: 100px 20px;
            text-align: center;
            position: relative;
        }

        .hero p {
            background-color: #fff;
            color: #388e3c;
            padding: 15px 30px;
            border-radius: 40px;
            display: inline-block;
            font-size: 1.8em;
            font-weight: 600;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            margin-top: -30px;
        }

        #container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            max-width: 1100px;
            margin: -50px auto 50px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
        }

        .cta {
            flex: 1;
        }

        .cta p {
            font-size: 1.3em;
            margin: 25px 0;
            color: #424242;
        }

        .cta a {
            text-decoration: none;
            background-color: #1e88e5;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
        }

        .cta a:hover {
            background-color: #1565c0;
            transform: translateY(-5px);
        }

        .img {
            flex: 1;
            text-align: center;
        }

        .img img {
            width: auto;
            height: 90%;
            max-height: 350px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #4caf50;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 1em;
            letter-spacing: 1px;
        }

        footer p {
            margin: 0;
        }

        footer a {
            color: #ffeb3b;
            text-decoration: none;
        }

        footer a:hover {
            color: #fff176;
        }

        @media (max-width: 768px) {
            #container {
                flex-direction: column;
                text-align: center;
            }

            .img img {
                max-height: 250px;
                width: 100%;
            }

            .cta a {
                display: inline-block;
                margin: 10px 0;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <h1>Welcome to City Hospital</h1>
        </nav>
    </header>

    <section class="hero">
        <p>Where Care Meets Compassion</p>
    </section>

    <div id="container">
        <div class="cta">
            <p>New here? <a href="register.php">Register</a></p>
            <p>Already a member? <a href="login.php">Login</a></p>
            <p>Admin? <a href="admin_login.php">Admin Login</a></p>
        </div>

        <div class="img">
            <img src="forum-image.jpg" alt="Healthcare Image">
        </div>
    </div>

    <footer>
        <p>&copy; 2024 City Hospital | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </footer>
</body>

</html>
