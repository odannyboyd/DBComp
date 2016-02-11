<?php

//	Patient Options
if (isset($accType) AND ($accType = "Patient")) {

    echo '<a href="../index.php?content=companyList">
			<span class="mainMenuItem">View</span>
			</a>';
    echo '<br /><br />';

}
//	Dentist Options
if (isset($accType) AND ($accType = "Dentist")) {

    echo '<a href="../index.php?content=insert">
				<span class="mainMenuItem">Create</span>
				</a>';
    echo '<br /><br />';

    echo '<a href="../index.php?content=edit">
				<span class="mainMenuItem">Edit</span>
				</a>';
    echo '<br /><br />';

}
//reference to either include of their page or just their options
//	Owner/Admin Options
if (isset($accType) AND ($accType = "PO")) {
    echo '<a href="../index.php?content=insertUser">
				<span class="mainMenuItem">create NEW USER</span>
				</a>';
    echo '<br /><br />';
}

//	Logout menu item
echo '<a href="../index.php?status=logout">
			<span class="mainMenuItem">Logout</span>
			</a>';
echo '<br /><br />';


?>