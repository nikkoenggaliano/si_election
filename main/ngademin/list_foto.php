<?php 
include 'header.php';
include '../../lib/conf.php';
$the_dir = scandir('../../assett/foto_uploaded/');
?>

<title>List Uploaded</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
	.custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
</style>

<br><br><br><br>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>List local file foto</th>
        	<th>Link</th>
        </tr>
    </thead>
    <?php
	foreach($the_dir as $dir){
		if($dir === '..' or $dir === '.'){
			continue;
		}
		$name_file = explode('-', $dir);
		
		echo '<tr><td>'.$name_file[0].'</td><td><a href="../../assett/foto_uploaded/'.$dir.'" target="_blank">See<a></td></tr>';
		
	}
    ?>
    </table>
    </div>

</div>
</body>
</html>