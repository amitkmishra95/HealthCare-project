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
			<form action="admin_dashboard.php" method="post">
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
</html> --> 

<!DOCTYPE html>
<html>
<head>
	<title>Hospital Website Login</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background: #f4f4f4;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100%;
			height: 100%;
		}
		.login-box {
			background: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			width: 300px;
			text-align: center;
		}
		.login-box img.logo {
			width: 100px;
			height: auto;
			margin-bottom: 20px;
		}
		.login-box h2 {
			margin: 0 0 20px;
			color: #333;
		}
		.input-box {
			position: relative;
			margin-bottom: 20px;
		}
		.input-box input {
			width: 100%;
			padding: 10px;
			border: 1px solid #ddd;
			border-radius: 4px;
			box-sizing: border-box;
		}
		.input-box label {
			position: absolute;
			top: 10px;
			left: 10px;
			font-size: 14px;
			color: #aaa;
			transition: 0.3s;
			pointer-events: none;
		}
		.input-box input:focus + label,
		.input-box input:not(:placeholder-shown) + label {
			top: -10px;
			left: 5px;
			font-size: 12px;
			color: #333;
		}
		.options {
			margin-bottom: 20px;
		}
		.options .forgot-password {
			color: #007bff;
			text-decoration: none;
		}
		.options .forgot-password:hover {
			text-decoration: underline;
		}
		input[type="submit"] {
			background: #007bff;
			color: #fff;
			border: none;
			padding: 10px 15px;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
			font-size: 16px;
		}
		input[type="submit"]:hover {
			background: #0056b3;
		}
		.terms p {
			margin: 0;
			color: #666;
			font-size: 14px;
		}
		.terms a {
			color: #007bff;
			text-decoration: none;
		}
		.terms a:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="login-box">
			<img src="th.jpeg" alt="Hospital Logo" class="logo">
			<h2>Login</h2>
			<form action="admin_dashboard.php" method="post">
				<div class="input-box">
					<input type="text" id="username" name="email" required>
					<label for="username">Email</label>
				</div>
				<div class="input-box">
					<input type="password" id="password" name="password" required>
					<label for="password">Password</label>
				</div>
				<div class="options">
					<a href="forgot.php" class="forgot-password">Forgot Password?</a>
				</div>
				<input type="submit" name="login" value="Login">
				<div class="terms">
					<p> New User? <a href="register.html">Sign in</a>.</p>
				</div>
				<div class="terms">
					<p>By logging in, you agree to our <a href="#">Terms & Conditions</a>.</p>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
