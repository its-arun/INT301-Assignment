<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Electricity Bill Calculator</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:500,700|Shadows+Into+Light" rel="stylesheet">
	<link href="styles/main.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<header>
			<h1>Bill Calculator</h1>
		</header>
		<main>
			<form id="main-form" name="main-form" action="" method="POST">
				<div class="input-container">
					<label for="consumption">Units Consumed:</label>
                    <input class="default-input" id="consumption" placeholder="0" type="number" name="units">
				</div>
			</form>
		</main>
		<div class="form-footer">
			<div class="button-wrapper">
				<button id="mainButton" type="submit" name="calculate" form="main-form">Calculate</button>
			</div>
		</div>
	</div>
</body>
</html>