<?php 
$id = "";

$input_kandidat = <<< HTML
					<input type="text" name="nama[]" placeholder="Kandidat"><br>
				HTML;

$input_paslon   = <<< HTML
					<input type="text" name="paslon[]" placeholder="No Paslon"><br>
				HTML;

	if(isset($_GET['many'])){
		$id = $_GET['many'];
	}

	if(isset($_POST['Go'])){
		die(var_dump($_POST));
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Election</title>
</head>
<body>
<form method="POST">
	<?php 
		for($i=0; $i<3; $i++){
			echo $input_kandidat;
			echo $input_paslon;
		}
	?>
	<input type="submit" name="Go" placeholder="Let's GO">
	<br>
</form>
</body>
</html>