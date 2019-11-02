<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	include 'db_query.php';

	$res = DB::query("SELECT * FROM fishing_places");
	$res_array =  array( array() );
	if ($res->num_rows > 0)
	{
		while($row = $res->fetch_assoc())
		{
			array_push($res_array, $row);
			// echo $row["ID"]."*".$row["Name"]."*".$row["lant"]."*".$row["long"]."<br />";
		}
		$res_array_json = json_encode($res_array);
	}
	else
	{
		echo "0";
	}
?>

<html>
<head>
    <title>Диалоги о рыбалке</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="https://api-maps.yandex.ru/2.1/?apikey=18f62a6d-77ff-4bb8-8f46-3b6d164fdf4d&lang=ru_RU" type="text/javascript"></script>
    <!-- <script src="yamaps.js" type="text/javascript"></script> -->
	<script type="text/javascript">
		ymaps.ready(function () {

			var PlacemarkArray = [];

		    var map = new ymaps.Map('map', {
		        center: [59.939095, 30.315961],
		        zoom: 10,
		        controls: []
		    });

			var base_array  = <?php echo $res_array_json;?>;
			base_array.forEach(function(element) {
				console.log(element["ID"]);
				var myPlacemark1 = new ymaps.Placemark([element["lant"], element["longi"]], {
					iconContent: element["Name"]
				}, {
					preset: 'islands#darkOrangeStretchyIcon'
				});
				PlacemarkArray.push(myPlacemark1);
				map.geoObjects.add(myPlacemark1);
			});
			console.log(PlacemarkArray);
		});
	</script>
	<link rel="stylesheet" href="styles.css">
	<meta name="google-site-verification" content="i1ZlqZ1bCBAIH6sDQ_q7qA2wZTGVVWl8wdPLElPTyo0" />
</head>
<body>
	<p><a href="/login.php">Login</a></p>
	<p><a href="/registration.php">Registration</a></p>
	<!-- <p style="text-align:center;"> <font size="72">Диалоги о рыбалке</font></p> -->
    <div id="map" style="margin:auto; width: 80%; height: 80%"></div>
</body>
</html>
