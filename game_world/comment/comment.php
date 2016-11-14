<html>
<body>
<form action="comment.php" method="post">
Write Comment: <br />
<textarea rows="4" cols="50" name="comment"></textarea><br /><br />
<input type="submit" value="Send" name="sub">
</form>
	<?php
		require("ins_comm.php");
    ?>
</body>
</html>