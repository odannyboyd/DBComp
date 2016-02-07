<?php
{
	// file: index.php (root/www)
	// secure connection to mysql db script.
	// connection details kept outside of system root, so it cannot be accessed externally
		include('../sqlconfig/dbconfig.php');
		$mysqli = new mysqli($dbdetail['hostname'], $dbdetail['username'], $dbdetail['password'], $dbdetail['database']);
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		}
		else

			$menuFile = '';
			$contentFile = '';
			$contentMsg = '';
			$loginAuthorised = ($_COOKIE["loginAuthorised"] == "loginAuthorised");

			if ($loginAuthorised){
				$menuFile = 'includes/tp_crmMenu.php';
			} else {
				$contentFile = 'includes/tp_loginForm.php';

			}

}
?>

<!DOCTYPE HTML PUBLIC>
<html>
<head>

	<link rel="icon" href="/favicon.ico" type="image/x-icon" />

</head>
<body>





<?php
// can contain most php code - except header()function
?>

yes
</body>
</html>