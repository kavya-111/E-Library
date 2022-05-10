<?php
session_start();
include "setting.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">Library</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">.....</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Add Books in Library</span>
<br />
<br />
<form method="post" action="" encytype="multipart/form-data">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr> 
<tr><td class="labels">Book : </td><td><input type="text" name="name" placeholder="Enter Book Name" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Author : </td><td><input type="text" name="auth" placeholder="Enter Author Name" size="25" class="fields" required="required"  /></td></tr>
<tr><td class="labels">Book : </td><td><input type="file" name="book" placeholder="Upload book" size="25" class="fields" required="required"  /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit_book"value="ADD BOOK" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="adminhome.php" class="link">Go Back</a>
<br />
<br />
</div>
</div>
<?php 
if(isset($_POST['submit_book']))
{
	$tm=md5(time());
	$fnm=$_FILES["f1"]["name"];
	$dst="./add_books/".$tm.$fnm;
	$dst1="add_books/".$tm.$fnm;
	move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);


	mysqli_query($link,"insert ignore into add_books values('','$_POST[bname]','$dst1','$_POST[bauthor]','$_POST[book]','$_SESSION[aid]')");
	
		
	

  ?>
  <script type="text/javascript">
 	document.write("Book Inserted Successfully..");
  </script>
  
  <?php

 }


 ?>
</body>
</html>