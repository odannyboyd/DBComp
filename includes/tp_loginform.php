<?php


echo '<p>Login Form</p>';

echo '<form name="postLoginHid" action="index.php" method="post">';
echo '
					<P>User name:
					<INPUT TYPE=text NAME=username value="" SIZE=12 MAXLENGTH=16></P>
					<P>Password:
					<INPUT TYPE=password NAME=password value="" SIZE=12 MAXLENGTH=16></P>
					<input type="submit"  value="Login" />
				';
echo '</form>';


?>