<?PHP
function auth($login, $passwd)
{
	$data = unserialize(file_get_contents('../private/passwd'));
	foreach ($data as $elem)
	{
		foreach ($elem as $log => $pass)
		{
			if ($login == $log && $pass == hash('whirlpool', $passwd))
				return (TRUE);
		}
	}
	return (FALSE);
}
?>
