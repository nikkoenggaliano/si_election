<?php 
include 'authload.php';




if(isset($_GET['kode'], $_SESSION['id'])){
	die(var_dump($main->cek_pemilih_log($_GET['kode'], $_SESSION['id'])));

	$do_vote = $main->get_kandidat_by_id($_GET['kode']);
	if($do_vote === NULL){
		die(header("location: index.php"));
	}
}

	$render_kandidat = function($image, $name, $id){
		$ret = <<< HTML
			<div class="col-sm">
				<div class="embed-responsive embed-responsive-16by9">
					<img class="card-img-top  embed-responsive-item" src="$image" alt="Card image cap">	
				</div>
			  	  <div class="input-group-text">
			  		<span> 
				    <input type="radio" value="$id" name="pilihan"> $name
				  	</span>
				  </div>
			</div>
		HTML;
		echo $ret;
	};

if(isset($_POST['kode'], $_POST['pilihan'])){
	$exec = $main->do_vote($_POST['kode'], $_POST['pilihan'], $_SESSION['id']);
	die(var_dump($exec));
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Hmm</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style type="text/css">
	img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
  max-width: 100%;
  height: auto;
}
</style>
</head>
<body>
	<br>
	<div class="container">
		<br><br><br><br>
		<form method="POST">
			<input type="hidden" name="kode" value="<?= $_GET['kode']; ?>">
		<div class="row">
			<?php

				for($i=0; $i<count($do_vote); $i++){
					echo $render_kandidat($do_vote[$i]['foto'], $do_vote[$i]['nama'], $do_vote[$i]['id']);	
			}
			
			?>
			</div>
		<div class="text-center"> 
			<br>
    		<input type="submit" name="vote" class="btn btn-primary" value="VoteNow"> 
		</div>
			</form>
		<br>
	</div>
</body>
</html>