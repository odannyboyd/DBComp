<?php
//ask to go through code see why includes dont show. if statements? {? headers?
   // secure connection to mysql db script.
    // connection details kept outside of system root, so it cannot be accessed externally
    include('../sqlconfig/dbconfig.php');
    $mysqli = new mysqli($dbdetail['hostname'], $dbdetail['username'], $dbdetail['password'], $dbdetail['database']);
    $link = mysqli_connect($dbdetail['hostname'], $dbdetail['username'], $dbdetail['password'], $dbdetail['database']);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            }
        // if program fails to connect to mysql, report error, else continue (to 12)
        else {
            include_once('includes/fn_authorise.php');
            // include_once('includes/fn_strings.php'); wip
            // include_once('includes/fn_formatting.php'); wip

            $menuFile = '';
            $contentFile = '';
            $contentMsg = '';

            $loginAuthorised = ($_COOKIE["loginAuthorised"] == "loginAuthorised");
        }
            if (!$loginAuthorised) {
                // if there isn't a stored logged in username/pass, post a user/pass otherwise continue (to 34)
                $username = $_POST['username'];
                $password = $_POST['password'];
                    if (userAuthorised($username, $password, $link)) {
                        // if user is authorised after posting user/pass, refresh page (back to 1)
                        header("Location: index.php");
                    } else {
                            $contentFile = 'includes/tp_loginform.php'; //if user is NOT authorised after posting user/pass, direct to login form
                            include($contentFile); // manipulate later
                        }
                    }
            else {
                $accType = $_COOKIE["accType"];
                $userID = $_COOKIE["userID"];

                $status = $_GET['status'];
            }
                    if (isset($status) AND ($status == "logout")) {
                    //if login status is set, and set to logout, delete auth cookie and refresh otherwise continue (to 44)
                        setcookie("loginAuthorised", "", time()-7200);
                        header("Location: index.php");
                            } else {

                        echo "hello world";

                           /* $menuFile = 'includes/tp_crmMenu.php'; //sub-page that determines what options are shown based on acctype
                            $contentCode = $_GET['content'];

                            switch ($contentCode) {
                                case "companyList":
                                    $contentFile = "includes/tp_companyList.php";
                                    break;
                          
                            }*/
}

?>

<!DOCTYPE HTML PUBLIC>
<html>
<head>

	<link rel="icon" href="/favicon.ico" type="image/x-icon" />

</head>
<body>



</body>
</html>
