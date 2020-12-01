<!DOCTYPE html>
<html>

<head>
  <title>User List</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="Index.css" />
  <meta name="content" content="System User List View" />
  <link rel="icon" href="assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />

</head>

<body>


  <?php

  require_once 'Library.php';
  include 'api.service.php';
  generateHeader();
  $response = CallAPI("GET", "http://arma-se.ddns.net/users");
  $response = json_decode($response, true);
  ?>

  <div class="content">

    <div class="tableFunctions">
      <div class="tableFunctionsFloater"></div>
      <a href="InsertUser.php?create=yes"><img src="assets/più.png" style="height:20px" title="Insert new user"></a>
    </div>


    <div>
      <?php

      echo "<table class='table2' border='1'>";

      echo "<thead>
      <tr>
      <th width='35%' height='100%' align='center'>Username</th>
      <th width='35%' height='100%' align='center'>Role</th>
      </tr></thead>";





      foreach ($response['rows'] as $_ => $user) {


        echo "<tbody>
          <tr> 
      <td width='35%' height='100%' align='center'><a class=\"tableLink\" href='ViewSystemUsers.php?username=" . $user['username'] . "'>" . $user["username"] . "</a></td>
      <td width='35%' height='100%' align='center'><a class=\"tableLink\" href='ViewSystemUsers.php?username=" . $user['username'] . "'>" . $user['role'] . "</a></td>  
      </tr></tbody>";
      }
      echo "</table>";



      ?>
    </div>
  </div>






</body>

</html>