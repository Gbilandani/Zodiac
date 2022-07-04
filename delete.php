<?php
session_start();
include_once('database.php');
$id2=$_GET['id1'];

if(isset($_POST['delete']))
{

$q="DELETE FROM history where id=$id2";
if(mysqli_query($conn, $q))
{
	header("location:history.php");
}
}

if(isset($_POST['cancel']))
{
    header("location:history.php");
}

?>
<center>
<form method='post'>
    <br>
    <br>
    <br>
    <h3>Do you want to delete?</h3>
    <input type='submit' name='delete' value='Yes'/>
    <input type='submit' name='cancel' value='No' />
</form>
</center>