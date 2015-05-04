<?php
	error_reporting(0);

	if (!isset($_GET["city"]) or $_GET["city"] == "") {
		# do nothing
	} else {
		$city = str_replace(" ", "-", $_GET["city"]);

		$url = "http://www.weather-forecast.com/locations/$city/forecasts/latest";

		$content = file_get_contents($url);

		$pattern = "/3 Day Weather Forecast Summary(.*?)<\/s/";

		$match = preg_match($pattern, $content, $weather);

		if ($match) {
			$weather = explode ("Summary:", $weather[0])[1];

			echo $weather;
		} else {
			echo "error";
		}

		
}
?>