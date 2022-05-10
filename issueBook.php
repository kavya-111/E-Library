<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$date=date('d/m/Y');
$bn=$_POST['name'];
if($bn!=NULL)
{
	$p=mysqli_query($set,"SELECT * FROM books WHERE id='$bn'");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
	$sql=mysqli_query($set,"INSERT INTO issue(sid,name,author,download) VALUES('$sid','$bk','$ba',$download')");
	if($sql)
	{
		$msg="Successfully Issued";
	}
	else
	{
		$msg="Error Please Try Later";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<form method="post" action="">

<html>
<head>
<style>
.button {
  display: flex;
  height: 50px;
  padding: 0;
  background: #009578;
  border: none;
  outline: none;
  border-radius: 5px;
  overflow: hidden;
  font-family: "Quicksand", sans-serif;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
}

.button:hover {
  background: #008168;
}

.button:active {
  background: #006e58;
}

.button__text,
.button__icon {
  display: inline-flex;
  align-items: center;
  padding: 0 24px;
  color: #fff;
  height: 100%;
}

.button__icon {
  font-size: 1.5em;
  background: rgba(0, 0, 0, 0.08);
}
body{
 background-image: url("images/background1.jpg");
background-repeat: no-repeat;
background-size:100% 100%;
}
h1{
color: Black;
text-align: center;
}
</style>
</head>
<body>
<h1>Welcome to our Books Section</h1>
<br><br><br>
<center>
<form>
<button type="button" class="button">
  <span class="button__text"><a href="books1.html">Books Related to C Programming</a></span>
  <span class="button__icon">
    <ion-icon name="c"></ion-icon>
  </span>
</button>
<br><br>
<button type="button" class="button">
  <span class="button__text"><a href="books2.html">Books Related to Java Programming</a></span>
  <span class="button__icon">
    <ion-icon name="j"></ion-icon>
  </span>
</button>
<br><br>
<button type="button" class="button">
  <span class="button__text"><a href="books3.html">Books Related to Python Programming</a></span>
  <span class="button__icon">
    <ion-icon name="p"></ion-icon>
  </span>
</button>
<br><br>
<button type="button" class="button">
  <span class="button__text"><a href="books4.html">Books Related to DBMS</a></span>
  <span class="button__icon">
    <ion-icon name="d"></ion-icon>
  </span>
</button>
<br><br>
<button type="button" class="button">
  <span class="button__text"><a href="books5.html">Books Related to Data Structures</a></span>
  <span class="button__icon">
    <ion-icon name="ds"></ion-icon>
  </span>
</button>
<br><br>
<button type="button" class="button">
  <span class="button__text"><a href="books6.html">Books Related to Computer Architecture</a></span>
  <span class="button__icon">
    <ion-icon name="ca"></ion-icon>
  </span>
</button>

</center>
</form>
</html>
<?php
$x=mysqli_query($set,"SELECT * FROM books");
while($y=mysqli_fetch_array($x))
{
	?>
<option value="<?php echo $y['id'];?>"><?php echo $y['name']." ".$y['author'];?></option>
<?php
}
?>

</table>
</form>
<br />
<br />
<a href="home.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>