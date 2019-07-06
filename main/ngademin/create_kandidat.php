<?php ob_start();

require_once 'header.php';

$jumlah = "";
$name_event = "";

$render_kandidat = function($no){
   $ret = <<< HTML
      <div class="form-group">
      Paslon No #$no
      <input type="text" name="nama[]"  class="form-control my-input" id="name" placeholder="Nama Kandidat">
      <br>
      <input type="text" name="foto[]"  class="form-control my-input" id="name" placeholder="URL Foto Kandidat">
      </div>
      <br>
   HTML;
   return $ret;
};


if(isset($_GET['event'], $_GET['jumlah'])){
   $name_event = base64_decode($_GET['event']);
   $jumlah = ($_GET['jumlah'] > 5) ? 5 : $_GET['jumlah'];
}else{
   die(header("location: event.php"));
}

if(isset($_POST['event'],$_POST['kode'], $_POST['nama'], $_POST['foto'])){
   if(count($_POST['nama']) == count($_POST['foto'])){
      if(is_array($_POST['nama']) and is_array($_POST['foto'])){

         foreach($_POST['nama'] as $key => $check1){
            if(strlen($check1) < 5 or empty($check1)){
               $_SESSION['alert'] = "Nama pada form ke ".($key+1)." Kurang dari 5!";
               die(header("location: index.php"));
            }
         }

         foreach($_POST['foto'] as $ke => $check2){
            if(strlen($check2) < 5 or empty($check2)){
               $_SESSION['alert'] = "URL foto pada form ke ".($key+1)." Kurang dari 5!";
               die(header("location: index.php"));
            }
         }

         $insert_kandidat = $admin_main->insert_kandidat($_POST['kode'], $_POST['nama'], $_POST['foto']);
         if($insert_kandidat){
            $insert_event = $admin_main->insert_event($_POST['event'], $_POST['kode']);
            if($insert_event){
               $_SESSION['alert'] = "Event Berhasil Dibuat!";
               die(header("location: index.php"));
            }
         }
      }
   }
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
	.send-button{
background: #54C7C3;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
.g-button{
color: #fff !important;
border: 1px solid #EA4335;
background: #ea4335 !important;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
.my-input{
box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
cursor: text;
padding: 8px 10px;
transition: border .1s linear;
}
.header-title{
margin: 5rem 0;
}
h1{
font-size: 31px;
line-height: 40px;
font-weight: 600;
color:#4c5357;
}
h2{
color: #5e8396;
font-size: 21px;
line-height: 32px;
font-weight: 400;
}
.login-or {
position: relative;
color: #aaa;
margin-top: 10px;
margin-bottom: 10px;
padding-top: 10px;
padding-bottom: 10px;
}
.span-or {
display: block;
position: absolute;
left: 50%;
top: -2px;
margin-left: -25px;
background-color: #fff;
width: 50px;
text-align: center;
}
.hr-or {
height: 1px;
margin-top: 0px !important;
margin-bottom: 0px !important;
}
@media screen and (max-width:480px){
h1{
font-size: 26px;
}
h2{
font-size: 20px;
}
}
</style>
<body>
   <div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
         	<br>
            <h1 class="wv-heading--title">
               <?=$name_event;?> Event
            </h1>
            <h2 class="wv-heading--subtitle">
              Dengan <?=$jumlah;?> Kandidat 
            </h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="" method="post" name="login">
                  <input type="hidden" name="kode" value="<?= $_GET['token'] ?>">
                  <input type="hidden" name="event" value="<?= base64_decode($_GET['event']) ?>">
<!--                   <div class="form-group">
                     <input type="text" name="nama[]"  class="form-control my-input" id="name" placeholder="Nama Kandidat">
                     <br>
                     <input type="text" name="foto[]"  class="form-control my-input" id="name" placeholder="URL Foto Kandidat">
                  </div> -->
                  <?php
                     for($i=1; $i<=$jumlah; $i++){

                        echo $render_kandidat($i);
                     }
                  ?>


                  <div class="text-center ">
                     <input type="submit" name="go" class="btn btn-block send-button tx-tfm" value="Create Event">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>
</body>
</html>