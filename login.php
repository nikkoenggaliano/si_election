<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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

.login {
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
form{
  background:#f0f0f0;
  padding:6% 4%;
}

input[type="email"],input[type="password"] {
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

input[type="email"]:focus,
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
$(function(){
  $(".button").click(function(){
   $(".login").slideToggle(1000); 
  });
});
</script>
</head>
<body>

  <span class="button"> Login </span>
  
  <div class="login">
    <div class="triangle"></div>
    <h1> Login </h1>
  <form>
    <input type="email" placeholder="Email" />
    <input type="password" placeholder="Password" />
    <input type="submit" value="Log in" />
  </form>
  </div>
</body>
</html>