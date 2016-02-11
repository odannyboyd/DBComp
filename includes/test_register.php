<?php

include('../../sqlconfig/dbconfig.php');
$mysqli = new mysqli($dbdetail['hostname'], $dbdetail['username'], $dbdetail['password'], $dbdetail['database']);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
else {

    echo '<p> testregister</p>';

    echo '<form name="testregister" action="test_register.php" method="post">';
    echo '
                        <P>User name:
                        <INPUT TYPE=text NAME=username value="" SIZE=12 MAXLENGTH=16></P>
                        <P>Password:
                        <INPUT TYPE=password NAME=password value="" SIZE=12 MAXLENGTH=16></P>
                        <input type="submit"  value="Login" />

    ';

        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $SQL_testregister = 'INSERT INTO accdetails (username, hashPassword, accType) VALUES ('$username', '$hash', "Patient")';
}
?>