<!-- <!DOCTYPE html>
<html>
<head>
	<title>Hospital Website Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class="login-box">
			<img src="th.jpeg" alt="Hospital Logo" class="logo">
			<h2>Login</h2>
			<form action="dashboard.php" method="post">
				<div class="input-box">
					<input type="text" id="username" name="email" required>
					<label for="username">Email</label>
				</div>
				<br>
				<div class="input-box">
					<input type="password" id="password" name="password" required>
					<label for="password">Password</label>
				</div>
				<br>
				<div class="options">
					<div class="remember-me">
						<input type="checkbox" id="remember-me" name="check" value="1">
						<label for="remember-me">Remember Me</label>
					</div> -->
					<!-- <a href="forgot.php" class="forgot-password">Forgot Password?</a>
				</div>
				<br>
				<input type="submit" name="login" value="Login">
				<br>
				<br>
				<div class="terms">
					<p> New User ?<a href="register.html">Sign in</a>.</p>
				</div>
				<br>
				<div class="terms">
					<p>By logging in, you agree to our <a href="#">Terms & Conditions</a>.</p>
				</div>
			</form>
		</div>
	</div>
</body>
</html> */ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Website Login</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
        <div style="background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 300px; text-align: center;">
            <img src="th.jpeg" alt="Hospital Logo" style="width: 100px; height: auto; margin-bottom: 20px;">
            <h2 style="color: #333; margin-bottom: 20px;">Login</h2>
            <form action="dashboard.php" method="post">
                <div style="position: relative; margin-bottom: 20px;">
                    <input type="text" id="username" name="email" placeholder="Email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; outline: none; font-size: 16px;">
                </div>
                <div style="position: relative; margin-bottom: 20px;">
                    <input type="password" id="password" name="password" placeholder="Password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; outline: none; font-size: 16px;">
                </div>
                <div style="margin-bottom: 20px;">
                    <a href="forgot.php" style="color: #4CAF50; text-decoration: none; font-size: 14px;">Forgot Password?</a>
                </div>
                <input type="submit" name="login" value="Login" style="width: 100%; padding: 10px; border: none; border-radius: 5px; background: #4CAF50; color: white; font-size: 16px; cursor: pointer; transition: background 0.3s;">
                <div style="margin-top: 20px; font-size: 14px; color: #555;">
                    <p>New User? <a href="register.html" style="color: #4CAF50; text-decoration: none;">Sign up</a>.</p>
                </div>
                <div style="font-size: 14px; color: #555;">
                    <p>By logging in, you agree to our <a href="#" style="color: #4CAF50; text-decoration: none;">Terms & Conditions</a>.</p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
