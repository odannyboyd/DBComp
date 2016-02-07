<?php

//	Patient Options
echo '<a href="index.php?content=companyList">
			<span class="mainMenuItem">List Companies</span>
			</a>';
echo '<br /><br />';

//	Dentist Options
if (isset($accessLevel) AND $accessLevel >= 21) {

    echo '<a href="index.php?content=insertCompany">
				<span class="mainMenuItem">Create Company</span>
				</a>';
    echo '<br /><br />';

    echo '<a href="index.php?content=editCompany">
				<span class="mainMenuItem">Edit company</span>
				</a>';
    echo '<br /><br />';

}
//reference to either include of their page or just their options
//	Owner/Admin Options
if (isset($accessLevel) AND $accessLevel >= 99) {
    echo '<a href="index.php?content=insertUser">
				<span class="mainMenuItem">create NEW USER</span>
				</a>';
    echo '<br /><br />';
}

//	Logout menu item
echo '<a href="index.php?status=logout">
			<span class="mainMenuItem">Logout</span>
			</a>';
echo '<br /><br />';


?>