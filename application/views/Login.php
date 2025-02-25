<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Administrator</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url() . "assets/login/images/logo.png"; ?>"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login/vendor/"; ?>bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login/vendor/"; ?>animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login/vendor/"; ?>css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login/vendor/"; ?>animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login/vendor/"; ?>select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login/vendor/"; ?>daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login/"; ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/login/"; ?>css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="<?php echo base_url() . 'Login/auth' ?>" method="POST">
					<style type="text/css">
						.logo_header{
							width: 120px;
							height: 70px;
						}
						.text_header{
							padding-left: 10px;
						}
					</style>
					
					<span class="login100-form-title ">	
						<img src="<?php echo base_url() . "assets/login/images/logo.png"; ?>" alt="Logo" class="logo_header">				
						<!-- text -->
					</span>
					<p><?php echo $this->session->flashdata('msg'); ?></p>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">

					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Sign in
						</button>
					</div>
					<br>
					<br>
				</form>
			</div>
		</div>
	</div>


	<!--===============================================================================================-->
	<script src="<?php echo base_url() . "assets/login/vendor/"; ?>jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() . "assets/login/vendor/"; ?>animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() . "assets/login/vendor/"; ?>bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() . "assets/login/vendor/"; ?>bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() . "assets/login/vendor/"; ?>select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() . "assets/login/vendor/"; ?>daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() . "assets/login/vendor/"; ?>daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() . "assets/login/vendor/"; ?>countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() . "assets/login/"; ?>js/main.js"></script>

</body>
</html>