<?php

	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	include 'db_query.php';

    if( isset( $_POST['AddBase'] ) )
    {
		$res =DB::query("SELECT add_base('".$_POST['base_name']."', ".$_POST['lant'].", ".$_POST['long'].") ");
		if ($res->num_rows == 1) {
			$row = mysqli_fetch_array($res);
			if ($row[0] == "0") {
				echo "Есть база с таким названием";
			} else {
				header('Location: ../index.php/');
				exit;
			}
		}
	}
?>

<form method="POST">
    <p>Название базы: <input type="text" name="base_name" /></p>
    <p>lant: <input type="text" name="lant" /></p>
    <p>long: <input type="text" name="long" /></p>

    <?php if(!empty($message)) { ?>
    <p><?php echo $message; ?></p>
    <?php } ?>
    <p><input name="AddBase" type="submit" value="Добавитьт базу" /></p>
</form>
