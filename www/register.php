<?php
	$connect=mysql_connect('localhost','root','')or die(mysql_error());
	mysql_select_db('web');

	if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$r_password = $_POST['r_password'];
	if($password == $r_password){
	$password = md5($password);
	$query = mysql_query("INSERT INTO users VALUES('','$username',$login','$password')") or die(mysql_error());
	}
	else{
	die('password must match');
	}
	}
	if(isset($_POST['enter'])){
	$e_login=$_POST['e_login'];
	$e_password=md5($_POST['e_password']);
	
	
	$query=mysql_query("SELECT * FROM users WHERE login='$e_login'");
	$user_data = mysql_fetch_array($query);
	
	if($user_data['password']==$e_password){
	echo "OK";
	$check=true;
	
	}
	else{
	echo"bad password or login";
	}
	}
?>

<form method="post" action="register.php>
	<input type="text" name="username" placeholder="username" required /><br>
	<input type="text" name="login" placeholder="login" required /><br>
	<input type="password" name="password" placeholder="passwor" required /><br>
	<input type="password" name="r_password" placeholder="repeat password" required /><br>
	<input type="submit" name="submit" value="Register" />
</form>

<form method="post" action="register.php>
<input type="text" name="login" placeholder="login" required /><br>
<input type="text" name="e_login" placeholder="e_login" required /><br>
	<input type="password" name="e_password" placeholder="password" required /><br>
	<input type="submit" name="enter" value="Log In" />
</form>


