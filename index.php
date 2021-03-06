<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Weather Predictor</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="white">

    <div class="container text-center">
    	<div class="row">
    		<div class="col-sm-6 col-sm-offset-3">
    			<h1>Weather Predictor</h1>
    			<p class="lead">Enter your city below to get a forecast for the weather.</p>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-sm-6 col-sm-offset-3">
    			<form id="weather-form">
    				<div class="form-group">
    					<input class="form-control" type="text" name="city" placeholder="Eg. London, Paris, San Francisco..." required>
    				</div>

    				<input type="submit" class="input-control btn btn-success btn-lg" value="Find My Weather">
    			</form>

                <div class="success" id="weather">
                    
                </div>
    		</div>
    	</div>
    </div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

    <script>
        $("#weather-form").submit(function (event) {
            $.ajax({
                url: 'scraper.php?city=' + $("#city").val(),
                success: function (data) {
                    
                    if (data == "error") {
                        $("#weather").removeClass("alert-success").addClass("alert-danger");
                        $("#weather").html("Could not retrieve weather information.").fadeIn();
                    } else {
                        $("#weather").html(data).fadeIn();
                    }

                }
            });

            event.preventDefault();
        });
    </script>
</body>
</html>