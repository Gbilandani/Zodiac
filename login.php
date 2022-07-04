<?php
session_start();
include_once('database.php');

if(isset($_POST['login']))
{
     $username=$_POST['user'];
     $password=$_POST['pass'];

    $q="select * from history where user='$username' and password='$password'";

    $query = mysqli_query($conn, $q);

	$row = mysqli_fetch_assoc($query);

	$count=mysqli_num_rows($query);
	
	if($count>0)
    {
        $_SESSION['username']=$username;
        header('location:home.php');
    }
    else
    {
        echo "<br><center>Username is 'mohit'<br>";
        echo "Password is 'abc'</center><br><br>";
    }


}
?>
<center><form method='post'>
    Username
    <input type='text' name='user' placeholder='Username' required /><br><br>
    Password
    <input type='password' name='pass' placeholder='Password' required /><br><br>
    <input type='submit' name='login' value='Login' />


</form></center>