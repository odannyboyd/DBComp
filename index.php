<?php

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
// connect to MYSQL /w info in external file
// if mysql has a error, return it else if mysql has connected successfully, designate files as blank
    $loginAuthorised = ($_COOKIE["loginAuthorised"] == "loginAuthorised");

        if ($loginAuthorised){
            $menuFile = 'includes/tp_crmMenu.php'; //sub-page that determines what options are shown based on acctype
        } else {
            $contentFile = 'includes/tp_loginForm.php'; //sets variable to redirect to login form

        }

    $username = $_POST['username'];
    $password = $_POST['password'];
    if (userAuthorised($username, $password)) {
        header("Location: index.php");
    } else {

        $contentFile = 'includes/tp_loginForm.php';
    }
    include_once('includes/fn_authorise.php');
    $accessLevel = $_COOKIE["accessLevel"];
    $userID = $_COOKIE["userID"];

    $status = $_GET['status'];
    if (isset($status) AND ($status == "logout")) {
        setcookie("loginAuthorised", "", time()-7200);
        header("Location: index.php");
    } else {

        //		This is where we manage CONTENT for LOGGED-IN users
        $menuFile = 'includes/tp_crmMenu.php';

        $contentCode = $_GET['content'];

        //  DO SOMETHING depending on the $contentCode.   eg

        $contentMsg = $contentCode;

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


</body>
</html>