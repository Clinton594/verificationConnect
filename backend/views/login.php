<?php
if (!empty($session->loggedin) || !empty($session->user_id)) {
	header("Location: {$uri->backend}home");
	die();
}
$admin	=	$param->get_params("admin_signin");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>BACKEND LOGIN | <?= $company->name ?></title>
	<?php require_once("includes/styles.php") ?>
	<link rel="stylesheet" href="<?= $uri->backend ?>css/authentication.css<?= $cache_control ?>" type="text/css">
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="login_f">
					<span class="login100-form-title p-b-45">
						Login
					</span>
					<div class="wrap-input100">
						<input class="input100 forgot-element" type="text" name="<?= $admin->email_col ?>" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="<?= $admin->password_col ?>" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
					<div class="flex-sb-m w-full p-t-15 p-b-20">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" value=""> Remember me
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>
						<div>
							<a href="#" class="txt1 forgot-password">
								Forgot Password?
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn submit" type="submit">
							Login
						</button>
					</div>
					<p class="mt-4"><a href="<?= $uri->site ?>"> <img src="<?= $company->logo_ref ?>" alt=""> <?= $company->name ?></a></p>
				</form>
				<div class="login100-more" style="background-image: url('<?= $uri->backend ?>images/pages/bg-01.png');">
				</div>
			</div>
		</div>
	</div>
	<script src="<?= $uri->backend ?>js/app.min.js"></script>
	<script src="<?= $uri->backend ?>js/controllers.js?<?= $cache_control ?>"></script>
	<script type="text/javascript">
		$("#login_f").loginForm({
			formName: "admin_signin",
			forgoTPassword: true
		}, function(response) {
			window.location.href = site.backend;
		});
	</script>
</body>

</html>