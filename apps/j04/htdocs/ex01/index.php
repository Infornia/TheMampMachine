<?PHP
session_start();
if ($_GET['submit'] == "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<form action="index.php" method="get" >
	<p>Identifiant: <input type="text" name="login" value="
<?PHP
if (isset($_SESSION['login']))
	echo $_SESSION['login'];
else
	echo "";
?>"></p>
	<p>Mot de passe: <input type="text" name="passwd" value="
<?PHP
if (isset($_SESSION['passwd']))
	echo $_SESSION['passwd'];
else
	echo "";
?>"></p>
<button type="submit" name="submit" value="OK">Submit</button>
</form>
