<?php 
include 'authload.php';
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
	

?>
<?php
$vote = $_REQUEST['vote'];


$filename = "poll_result.txt";
$content = file($filename);


$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];

if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $no = $no + 1;
}


$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
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
		<form method="POST">
			<input type="hidden" name="from" value="<?= $re_id ?>">
			<input type="hidden" name="anti" value="<?= $_SESSION['csrf'] ?>">
		<div class="row">
			<?php 
			echo $render_kandidat('https://images.pexels.com/photos/67636/rose-blue-flower-rose-blooms-67636.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500', 'nama', '1');
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
