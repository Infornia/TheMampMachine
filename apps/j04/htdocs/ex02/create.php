<?PHP
if (isset($_POST['login']) && $_POST['login'] != "" && isset($_POST['passwd']) && $_POST['passwd'] != ""
   	&& isset($_POST['submit']) && $_POST['submit'] == "OK")
{
	$log_found = 0;
	if (file_exists('../private') == FALSE)
		mkdir('../private');
	else
	{
		if (file_exists('../private/passwd') == TRUE)
		{
			$tab = unserialize(file_get_contents('../private/passwd'));
			foreach($tab as $login)
			{
				foreach($login as $log => $s)
				{
					if ($log == $_POST['login'])
						$log_found++;
				}
			}
		}
	}
	if ($log_found == 0)
	{
		$tab[] = array($_POST['login'] => hash('whirlpool', $_POST['passwd']));
		file_put_contents('../private/passwd', serialize($tab));
		echo "OK\n";
	}
	else
		echo "ERROR\n";
}
else
	echo "ERROR\n";
?>
