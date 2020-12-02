<?php
function generateHeader()
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
	    <a href=\"screens/list-users.screen.php\">Users</a>
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

function back()
{
  echo "
  <div class=\"footer2\" >
    <a class=\"tableLink\" href=\"list-users.screen.php\" data-role=\"button\">Back</a>
  </div>";
}

function gotopage($indirizzo = "")
{
  echo   '<script language="javascript">self.location="' . $indirizzo . '"</script>';
}
