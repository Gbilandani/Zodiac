<?php
session_start();


if(empty($_SESSION['username']))
{
     echo "<center><h2>Please Login First</h2>";
     echo "<h2><a href='login.php'>Login</a></center></h2><br><br>";
}

else{
include_once('database.php');
echo "<center><h1>History</h1>";
echo "<h2><a href='home.php'>Find My Zodiac</a></h2></center>";
?>

<html>
    <center><br>
<form method="post">
	<input type="text" name="search" placeholder="Search"  />
	<input type="submit" name="submit" />
</form>
</center>
</html>


<?php
if(isset($_POST['submit']))
{
	
	echo "<center><table border=1>";
	echo "<tr><th><a href='history.php?sort=uname'>Name</a></th>
		  <th><a href='history.php?sort=birthdate'>Birth Date</a></th>
		  <th><a href='history.php?sort=birthmonth'>Birth Month</a></th>
          <th><a href='history.php?sort=birthyear'>Birth year</a></th>
          <th><a href='history.php?sort=zodiac'>Zodiac Sign</a></th>
		  
		  <th>Delete</th></tr>";
        
        

	$name=$_POST['search'];

    if($name=='*')
    {
        
	    if(isset($_GET['sort']))
	    {
		    $f=$_GET['sort'];
		    $q="select * from history order by $f";
		    $result = mysqli_query($conn, $q);

		    while($row2=mysqli_fetch_assoc($result))
		    {
			echo "<tr><td>";
            echo "".$row2['uname']."</td><td>";
            echo "".$row2['birthdate']."</td><td>";
            echo "".$row2['birthmonth']."</td><td>";
            echo "".$row2['birthyear']."</td><td>";
            echo "".$row2['zodiac']."</td>";

		//Gaurav Bilandani
			echo "<td><a href=delete.php?id1=".$row2['id']." >Delete</a></td>";
			echo "</tr>";
		    }
		
		
	    }
	    else
	    {
	        $q="select * from history ";
	        $result = mysqli_query($conn, $q);

	        while($row2=mysqli_fetch_assoc($result))
	        {
	    	echo "<tr><td>";
	    //Gaurav Bilandani
	    	echo "".$row2['uname']."</td><td>";
		    echo "".$row2['birthdate']."</td><td>";
            echo "".$row2['birthmonth']."</td><td>";
		    echo "".$row2['birthyear']."</td><td>";
            echo "".$row2['zodiac']."</td>";
		

		
	    	echo "<td><a href=delete.php?id1=".$row2['id']." >Delete</a></td>";
		    echo "</tr>";
	        }
	    }
	    echo "</table></center>";
    }


	$q="select * from history where uname='$name' or zodiac='$name' or birthdate='$name' or birthmonth='$name' or birthyear='$name' ";
	$result = mysqli_query($conn, $q);
	
	while($row2=mysqli_fetch_assoc($result))
	{
		echo "<tr><td>";
	
    //Gaurav Bilandani
		
        echo "".$row2['uname']."</td><td>";
        echo "".$row2['birthdate']."</td><td>";
        echo "".$row2['birthmonth']."</td><td>";
        echo "".$row2['birthyear']."</td><td>";
        echo "".$row2['zodiac']."</td>";

		
		echo "<td><a href=delete.php?id1=".$row2['id']." >Delete</a></td>";
		echo "</tr>";
	}
	echo "</table></center>";
}
else
{
	echo "<center><table border=1>";
	echo "<tr><th><a href='history.php?sort=uname'>Name</a></th>
		  <th><a href='history.php?sort=birthdate'>Birth Date</a></th>
		  <th><a href='history.php?sort=birthmonth'>Birth Month</a></th>
          <th><a href='history.php?sort=birthyear'>Birth year</a></th>
          <th><a href='history.php?sort=zodiac'>Zodiac Sign</a></th>
		  
		  <th>Delete</th></tr>";
	//Gaurav Bilandani

	if(isset($_GET['sort']))
	{
		$f=$_GET['sort'];
		$q="select * from history order by $f";
		$result = mysqli_query($conn, $q);

		while($row2=mysqli_fetch_assoc($result))
		{
			echo "<tr><td>";
            echo "".$row2['uname']."</td><td>";
            echo "".$row2['birthdate']."</td><td>";
            echo "".$row2['birthmonth']."</td><td>";
            echo "".$row2['birthyear']."</td><td>";
            echo "".$row2['zodiac']."</td>";

			
			echo "<td><a href=delete.php?id1=".$row2['id']." >Delete</a></td>";
			echo "</tr>";
		}
		
		
	}
	else
	{
	$q="select * from history ";
	$result = mysqli_query($conn, $q);

	while($row2=mysqli_fetch_assoc($result))
	{
		echo "<tr><td>";
	
		echo "".$row2['uname']."</td><td>";
		echo "".$row2['birthdate']."</td><td>";
        echo "".$row2['birthmonth']."</td><td>";
		echo "".$row2['birthyear']."</td><td>";
        echo "".$row2['zodiac']."</td>";
		
//Gaurav Bilandani
		
		echo "<td><a href=delete.php?id1=".$row2['id']." >Delete</a></td>";
		echo "</tr>";
	}
	}
	echo "</table></center>";
}

mysqli_close($conn);
}
?>

