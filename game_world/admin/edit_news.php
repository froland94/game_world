<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="CSS/admin.css">
        <script src="JS/news.js"></script>
        <title>Administration - Edit</title>
    </head>

<body>

<?php
	include("../db_config.php");
	error_reporting(E_ERROR);
	$upn=$_GET['upn'];

	if(!empty($upn))
	{
	
	$sql[0] = "SELECT * FROM news WHERE id = '$upn'";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	if(mysqli_num_rows($result)>0)
	{
 	   while($record = mysqli_fetch_array($result))
	   {
	        $title =$record[title];
			$date =$record[date];
			$content =$record[content];
			$image =$record[image];
 	    }
?>
	<nav>
        <ul>
            <li><a href="news.php" class="active"><?php echo"News - $title";?></a></li>
        </ul>
    </nav>
<div class="container">
	<div id="nadd">
	<button><img src="CSS/edit.png" height="12" width="12"> Edit News</button>
        <form action="edit_news.php" method="post">
		<input type="hidden" name="upn" value="<?php echo"$upn";?>" />
		Name:<br />
		<input  type="text" name="title" value="<?php echo"$title";?>" /><br /><br />
		Date:<br />
		<input  type="text" name="date" value="<?php echo"$date";?>" /><br /><br />
		Content:<br />
		<textarea name="content" cols="50" rows="8"><?php echo"$content";?></textarea><br><br>
		News image:<br />
		<?php echo "<img src=\"../newsimg/$image\" height=\"150\" width=\"150\">";?><br /><br />
		<input type="file" name="file" /><br><br>		
		<input type="submit" value="Update" name="sb">
        </form>
	</div>
	</div>
<?php
    }
	else 
		echo "There is not any news like this.";
}
	include("../db_config.php");
	$title=$_POST['title'];  
	$date=$_POST['date'];  
	$content=$_POST['content'];
	$submit=$_POST['sb']; 
	$upn=$_POST['upn'];
	$image =$_POST['file'];

	if(!empty($submit) && !empty($upn))
	{
  
		$sql[0]="UPDATE news SET title='$title',date='$date',content='$content',image='$image' WHERE id= '$upn' "; 
		$result = mysqli_query($conn, $sql[0]);
		if (mysqli_query($conn, $sql[0])) 
		{ 
			header("Location:news.php");
			exit;
		} 
		else 
		{ 
			echo "Error: " . mysqli_error($conn); 
		}
	}   
?>
</body>
</html>