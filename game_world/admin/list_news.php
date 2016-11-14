<?php
	include ("../db_config.php");
	$sql[0] = "SELECT * from news";
	$result= mysqli_query($conn,$sql[0]) or die(mysqli_error());
	echo '
	<div id="nlist"><table class="list"><tr>
    <td><b>Title</b></td>
    <td><b>Content</b></td>
	<td><b>Published</b></td>
	<td><b>Image</b></td>
	<td><b></b></td>
	<td><b></b></td>
    </tr>
    <tr>';
	
    if (mysqli_num_rows($result)>0)
	{
	    while ($record = mysqli_fetch_array($result))
		{
			$content = substr($record['content'], 0, 50);
			echo "
			<td>$record[title]</td>
			<td>$content...</td>
			<td>$record[date]</td>
			<td><img src=\"../newsimg/$record[image]\" height=\"50\" width=\"50\"></td>
			<td><a href=\"edit_news.php?upn=$record[id]\">&#x270e;</a></td>
			<td><a href=\"delete_news.php?delete=$record[id]\">&#x2716;</a></td>
			</tr>";	   
		}
    }
	else 
		echo "sikertelen";
?>