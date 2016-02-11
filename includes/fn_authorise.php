<?php
//sheet containing authorisation function for login on index.php as well as function for login logs
function userAuthorised($username, $password, $link) {
    $tUser_SQLselect = "SELECT ID, hashPassword, accType FROM accdetails ";
    $tUser_SQLselect .= "WHERE username = '" . $username . "' ";

    $tUser_SQLselect_Query = mysqli_query($link, $tUser_SQLselect); //$link designated in index.php //sql query pulling stored info

        while ($row = mysqli_fetch_array($tUser_SQLselect_Query, MYSQLI_ASSOC)) {
            $ID = $row['ID'];
            $hashPasswordRetrieved = $row['hashPassword'];
            $accType = $row['accType'];
        }
            if (!empty($hashPasswordRetrieved) AND (password_verify($password, $hashPasswordRetrieved))) { //(any errors??)

                setcookie("accType", $accType, time() + 7200, "/");
                setcookie("ID", $ID, time() + 7200, "/");
                setcookie("loginAuthorised", "loginAuthorised", time() + 7200, "/");

                $returnCode = true;
            } else {
                $returnCode = false;
            }
}


/*       $sessionLogged = insertLogin($ID);
        if (!$sessionLogged) {
            setcookie("sessionLogging", "failed", time()+300, "/");
        }
    } else {
        $returnCode = false;
    }

    return $returnCode;
}*/

/*
function insertLogin($ID) { //function to record logged in user's ID/Time logged in/IP for debugging (maintenance etc)
    $success = false;
    $nowTimeStamp = date("Y-m-d H:i:s");   //	Gets current date-time in MYSQL format
    $userIP = $_SERVER['REMOTE_ADDR']; //	Gets user's IP address
    $insertLogin_SQL = 'INSERT INTO AccessLog (ID, timeLogin, IPaddress)
									VALUES ('$ID', "'$nowTimeStamp'", "'$userIP'")';

    mysqli_free_result($insertLogin_SQL);

    if (mysqli_query($link, $insertLogin_SQL)) {
        $success = true;
    } else {
        $success = $insertLogin_SQL."<br />".mysqli_error($link);
    }

    return $success;
}*/



?>