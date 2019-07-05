<?php  ob_start();
require_once 'header.php';
require_once '../../lib/conf.php'; 

if(isset($_POST['name'], $_FILES['foto'])){
   
   if(!empty($_FILES['foto']['type'])){
      
      $dir = '../../assett/foto_uploaded/';
      $new_name_file = (strlen($_POST['name']) > 10) ? substr($_POST['name'], 0, 10) : $_POST['name'] ;

      $ext_allowed   = array('jpg', 'jpeg', 'png');

      $path = pathinfo($_FILES['foto']['name']);

      $ext = strtolower($path['extension']);
      $iden = substr(md5($_FILES['foto']['name']),0,5);
      $fix_name_file = $new_name_file.'-'.$iden.".".$ext;
      if(!in_array($ext, $ext_allowed)){
         header("location: upload_foto.php?pesan=Sorry Just Image!");exit;
      }

      if($_FILES['foto']['size'] > 5000000){
         header("location: upload_foto.php?pesan=Max Size 5 MB!");exit;
      }

      if(move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$fix_name_file)){
         // header("location: upload_foto.php?pesan=Some Error");exit;  
         $_SESSION['alert'] = $local_config['base_url']."/"."assett/foto_uploaded/".$fix_name_file;
         die(header("Refresh: 0"));
      }else{
         $_SESSION['alert'] = "Sorry!";
         die(header("Refresh: 0"));
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
               Create Event 
            </h1>
            <h2 class="wv-heading--subtitle">
              Welcome to Callestasia Event
            </h2>
            <?php 
               if(isset($_SESSION['alert'])){
                  $ret = '<h4 class="wv-heading--subtitle" style="color: green;">'.$_SESSION["alert"].'</h4>';
                  echo $ret;
                  unset($_SESSION['alert']);
               }
            ?>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="" method="post" name="login" enctype="multipart/form-data">
                  <div class="form-group">
                     <input type="text" name="name" class="form-control my-input" id="name" placeholder="Election Name">
                  </div>
                  <div class="form-group">
                     <input type="file" name="foto" accept="image/*" id="foto"  class="form-control my-input" placeholder="Jumlah Kandidat">
                  </div>
                  <div class="text-center ">
                     <!-- <button type="submit" class=" btn btn-block send-button tx-tfm">Create Event</button> -->
                     <input type="submit" name="go" class="btn btn-block send-button tx-tfm" value="Create Event">
                  </div>
 <!--                  <div class="col-md-12 ">
                     <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or">or</span>
                     </div>
                  </div>
                  <div class="form-group">
                     <a class="btn btn-block g-button" href="#">
                     <i class="fa fa-google"></i> Sign up with Google
                     </a>
                  </div>
  -->                 <!-- <p class="small mt-3">By signing up, you are indicating that you have read and agree to the <a href="#" class="ps-hero__content__link">Terms of Use</a> and <a href="#">Privacy Policy</a>. -->
                  </p>
               </form>
            </div>
         </div>
      </div>
   </div>
</body>
</body>
</html>