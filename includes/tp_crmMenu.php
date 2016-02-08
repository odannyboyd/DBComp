<?php
//primary key on ptprofile, foreign key on accdetails
//	Patient Options
// Options, and include a file with a function for the opening screen etc (whether to book appt or whats next etc)
// +book appt include
echo '<a href="index.php?content=companyList">
			<span class="mainMenuItem">List Companies</span>
			</a>';
echo '<br /><br />';

//	Dentist Options
//Option inc 'create pt. include', and include function of calendar/timeslot system
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
//Options, create dt/pt, view all appts (regardless of ID can match to all profiles to be displayed)
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
