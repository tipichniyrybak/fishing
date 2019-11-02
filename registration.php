<?php

	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	include 'db_query.php';

    if( isset( $_POST['RegistrationUser'] ) )
    {
		$res = DB::query("SELECT registration_user('".$_POST['login']."', '".$_POST['password']."');");
		if ($res->num_rows == 1) {

			$row = mysqli_fetch_array($res);
			if ($row[0] == "0") {
				echo "User imeetsya!";
			} else {

				header('Location: /index.php/');
				exit;
			}
		}
	}
?>
<form method="POST">
    <p>user <input type="text" name="login" /></p>
    <p>pass: <input type="password" name="password" /></p>
    <?php if(!empty($message)) { ?>
    <p><?php echo $message; ?></p>
    <?php } ?>
    <p><input name="RegistrationUser" type="submit" value="Регистрация" /></p>
</form>
