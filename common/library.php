<?php

/**
 * Echoes the header on screen
 */
function generate_header()
{
  echo "
  <div id=\"header\" class=\"topnav\">
    <a class=\"lineeMenu\" onclick=\"openNav()\" href=\"#home\">☰ User List</a>
    <img class=\"image\" src=\"..\assets\user.png\">
	</div>";


  echo "
	<div id=\"mySidenav\" class=\"sidenav\">
	  <a href=\"javascript:void(0)\" class=\"closebtn\" onclick=\"closeNav()\"> &times;</a>
	  
	  <div id=\"list\">
	    <a href=\"list-users.screen.php\">Users</a>
	  </div>
	</div> ";


  echo "
	<script>
	  function openNav() {
	    document.getElementById(\"mySidenav\").style.width = \"20%\";
	  }

    function closeNav() {
      document.getElementById(\"mySidenav\").style.width = \"0\";
    }
	</script> ";
}

/**
 * Echoes the back button on screen
 */
function back()
{
  echo "
  <div class=\"footer2\" >
    <a class=\"tableLink\" href=\"list-users.screen.php\" data-role=\"button\">Back</a>
  </div>";
}

/**
 * Redirects to the page with given address
 *
 * @param string $address
 * The address to redirect to
 */
function go_to_page($address = "")
{
  echo   '<script language="javascript">self.location="' . $address . '"</script>';
}
