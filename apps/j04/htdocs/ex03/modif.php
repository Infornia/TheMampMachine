<?PHP
if (isset($_POST['submit']) && $_POST['submit'] == "OK" && isset($_POST['newpw']) && $_POST['newpw'] != "")
{
	$OK = 0;
	$data = unserialize(file_get_contents('../private/passwd'));
	foreach ($data as $e)
	{
		foreach ($e as $log => $pass)
		{
			if ($log == $_POST['login'] && $pass == hash('whirlpool', $_POST['oldpw']))
			{
				$new_data[] = array($_POST['login'] => hash('whirlpool', $_POST['newpw']));
				$OK = 1;
			}
			else
				$new_data[] = array($log => $pass);
		}
	}
	file_put_contents('../private/passwd', serialize($new_data));
	if ($OK == 1)
		echo "OK\n";
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>
