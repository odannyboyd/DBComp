<?php

function userAuthorised($username, $password) {

    $md5Password = md5($password);
    $tUser_SQLselect = "SELECT ID, password, accessLevel FROM tUser ";
    $tUser_SQLselect .= "WHERE username = '".$username."' ";

    $tUser_SQLselect_Query = mysqli_query($tUser_SQLselect);
    while ($row = mysqli_fetch_array($tUser_SQLselect_Query, MYSQLI_ASSOC)) {
        $userID = $row['ID'];
        $passwordRetrieved = $row['password'];
        $accessLevel = $row['accessLevel'];
    }

    mysqli_free_result($tUser_SQLselect_Query);

    if (!empty($passwordRetrieved) AND ($md5Password == $passwordRetrieved)) {

        setcookie("accessLevel", $accessLevel, time()+7200, "/");
        setcookie("userID", $userID, time()+7200, "/");
        setcookie("loginAuthorised", "loginAuthorised", time()+7200, "/");

        $returnCode = true;

        $sessionLogged = insertLogin($userID);
        if (!$sessionLogged) {
            setcookie("sessionLogging", "failed", time()+300, "/");
        }
    } else {
        $returnCode = false;
    }

    return $returnCode;
}


function insertLogin($userID) {
    $success = false;
    //	Get current date-time in MySQL format
    $nowTimeStamp = date("Y-m-d H:i:s");
    //	Get user's IP address
    $userIP = $_SERVER['REMOTE_ADDR'];

    $insertLogin_SQL = 'INSERT INTO tAccessLog (
										userID,
										timeLogin,
										IPaddress
									) VALUES (
										'.$userID.',
										"'.$nowTimeStamp.'",
										"'.$userIP.'"
									)';

    if (mysqli_query($insertLogin_SQL))  {
        $success = true;
    } else {
        $success = $insertLogin_SQL."<br />".mysqli_error();
    }

    return $success;
}



?>