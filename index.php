<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Lets Play — Alexander</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="styles/rangeslider.css" />
		<script src="scripts/rangeslider.js"></script>
		<link rel="stylesheet" href="styles/styles.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div id="head" class="col-xs-12 col-md-12">
					<h1>Start</h1>
					<h2>Now</h2>
				</div>
			</div>
			<div class="row"><div class="col-xs-12 col-md-12"><hr/></div></div>
			<div class="row">
				<div id="content" class="col-xs-12 col-md-12">
					<button id="play" class="btn btn-default"><span class="glyphicon glyphicon-play"></span></button>
					<button id="next" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></button>
					<button id="origin" class="btn btn-default"><span class="glyphicon glyphicon-share-alt"></span></button>
				</div>
			</div>
			<div class="row"><div class="col-xs-6 col-md-6 col-xs-offset-3 col-md-offset-3"><input type="range"></input></div></div>
		</div>
	<script src="scripts/player.js"></script>
	</body>
</html>