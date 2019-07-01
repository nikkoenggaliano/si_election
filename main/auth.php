<?php 

include '../lib/koneksi.php';

$from = $local_config['from'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<style type="text/css">
*{
  margin:0;
  padding:0;
}
body{
  background:#4D8FAC;
  font-family:'Open Sans',sans-serif;
  
}
.button {
  width:120px;
  display:block;
  background:#22A7F0;
  padding:15px;
  text-align:center;
  margin:auto;
  margin-top:1.5%;
  color:#FFF;
  cursor:pointer;
  border-radius:5px;
  border:1px solid #5D8CAE;
  transition: background .5s ;
  
  }

.button:hover {
  background:#19B5FE
}

.register_button {
  width:120px;
  display:block;
  background:#22A7F0;
  padding:15px;
  text-align:center;
  margin:auto;
  margin-top:1.5%;
  color:#FFF;
  cursor:pointer;
  border-radius:5px;
  border:1px solid #5D8CAE;
  transition: background .5s ;
  
  }

.register_button:hover {
  background:#19B5FE
}

.login {
  width:500px;
  margin:auto ;
  margin-top:10px;
  margin-bottom:2%;
  display:none;
 -webkit-transition:opacity 1s;
}

.register {
  width:500px;
  margin:auto ;
  margin-top:10px;
  margin-bottom:2%;
  display:none;
 -webkit-transition:opacity 1s;
}

.triangle {
  width:0;
  border-top: 12px solid transparent ;
  border-right:12px solid transparent ;
  border-bottom:12px solid #264348 ;
  border-left: 12px solid transparent;;
  margin:auto;
  margin-top:-10px

}

.login  h1{
  background:#317589;
  padding:20px 0;
  font-size:140%;
  font-weight:300;
  text-align:center;
  color:#264348;
}

.register  h1{
  background:#317589;
  padding:20px 0;
  font-size:140%;
  font-weight:300;
  text-align:center;
  color:#264348;
}

form{
  background:#f0f0f0;
  padding:6% 4%;
}

input[type="email"],input[type="password"],input[type="text"] {
  display:block;
  width:92%;
  padding:3%;
  margin-bottom:3%;
  color:#2ABB9B;
  font-size:95%;
  font-family:'tahoma',sans-serif;
  border:1px solid #4B77BE;
  border-radius:3px
}

input[type="text"]:focus,input[type="email"]:focus,
input[type="password"]:focus{
   border:2px solid #044F67
}


input[type="submit"]{
  width:100%;
  background:#317589;
  border:0;
  padding:4%;
  font-family:'Open Sans',sans-serif;
  font-size:100%;
  color:#fff;
  cursor:pointer;
  -webkit-transition:background .3s;
}

input[type="submit"]:hover{
  background:#003171;
}


input[type="placeholder"]{
  color:#000;
}


	</style>
<script type="text/javascript">

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}


$(function(){

  const from = "<?=$from?>";
  if(from == 'umsida'){
    $(".register_button").hide();
  }

  $(".button").click(function(){
   $(".login").slideToggle(1000);

   if($(".register_button:visible").length > 0){
    $(".register").hide();
   }

  });

  $(".register_button").click(()=>{
   $(".register").slideToggle(700);

   if($(".login:visible").length > 0){
    $(".login").hide();
   }

  }); 
});

$(document).on('click', '#register', ()=>{
  var email = $("#remail").val();
  var user  = $("#ruser").val();
  var pass  = $("#rpass").val();
  var pass2 = $("#rpass1").val();

  if(!email || !user || !pass || !pass2){
    swal("Hey!", "Don't leave a blank form", "error");
    return false;
  }

  if(email.length <= 4 || user.length <= 4 || pass.length <= 4 || pass2.length <= 4){
    swal("Hey!", "Input minimum is 5 caracter", "error");
    return false;
  }

  if(!validateEmail(email)){
    swal("Sorry!", "Please enter valid email!", "info");
    return false;
  }

  if(pass != pass2){
    swal("Hey!", "Your input password not same!", "error");
    return false; 
  }

  $.ajax({
    type : "POST",
    url  : 'api_auth.php',
    data : {
      email: email,
      user : user,
      pass : pass
    },
    success: function(respon){
      if(respon == 1){
        $(".register").hide();
        $(".register_button").hide();
        swal("Yeay!", "Register Success!", "success");
      }else if(respon == 'user_fail'){
        swal("Ugh!", "Username telah digunakan!", "warning");
        return false;
      }else if(respon == 'email_fail'){
        swal("Ugh!", "Email telah digunakan!", "warning");
        return false;
      }else{
        console.log(respon);
        swal("No!!", "Something Error!", "error");
        return false;
      }
    },
    error : function(res){
      console.log(res);
    }
  });

});

$(document).on('click', '#login', ()=>{
    var user = $("#ue").val();
    var pass = $("#p").val();
    
    $.ajax({
      type : "POST",
      url  : 'api_auth.php',
      data : {
        login : '<?=$from?>',
        user : user,
        pass : pass
      },
      success : function(respon){
       if(respon){
         window.location.href = "vote.php";
       }else{
        console.log(respon);
        swal("Sorry!!", "We Cant find you account!", "warning");

       }
      }
    })

  });

</script>
</head>
<body>

  <span class="button"> Login </span>
    <span class="register_button"> Register </span>
  
  <div class="login">
    <div class="triangle"></div>
    <h1> Login </h1>
  <form method="POST" autocomplete="OFF" onsubmit="return false">
    <input type="text" placeholder="Email/User" id="ue" />
    <input type="password" placeholder="Password" id="p" />
    <input type="submit" value="Login" id="login"/>
  </form>
  </div>

  <div class="register">
    <div class="triangle"></div>
    <h1> Register </h1>
  <form method="POST" onsubmit="return false" autocomplete="off">
    <input type="email" placeholder="Email" id="remail"/>
    <input type="text" placeholder="username"  id="ruser"/>
    <input type="password" placeholder="Password" id="rpass"/>
    <input type="password" placeholder="Password" id="rpass1"/>
    <input type="submit" id="register" value="Register"/>
  </form>
  </div>
</body>
</html>