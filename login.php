<?php

	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	include 'db_query.php';

    if( isset( $_POST['LoginUser'] ) )
    {
		$res = DB::query("SELECT login_user('".$_POST['login']."', '".$_POST['password']."');");
		if ($res->num_rows == 1) {

			$row = mysqli_fetch_array($res);
			if ($row[0] == "-2") {
				echo "User not defined";
			} elseif ($row[0] == "-1") {
				echo "Passwor uncorrect";
			} else {

				header('Location: /workspace.php/');
				exit;
			}
		}
	}
?>

<form method="POST">
    <p>user <input type="text" name="login" /></p>
    <p>pass: <input type="password" name="password" /></p>
    <p>remember me: <input type="checkbox" name="remember" /></p>
    <?php if(!empty($message)) { ?>
    <p><?php echo $message; ?></p>
    <?php } ?>
    <p><input name="LoginUser" type="submit" value="Вход" /></p>
</form>
