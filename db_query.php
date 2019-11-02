<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    class DB {


        public static function query($query_str) {



            $host = "localhost";
    		$user = "id9109250_nikiforf";
    		$pass = "student511";
    		$db = "id9109250_fishing";

            $link = new mysqli($host, $user, $pass, $db);
    		if (!$link)
    		{
    			echo "_errorconnection:" . mysqli_connect_errno() . PHP_EOL;
    			exit;
    		}

    		$result = $link->query($query_str);
            return $result;
        }
    }
?>
