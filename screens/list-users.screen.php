<!DOCTYPE html>
<html>

<head>
  <title>User List</title>
  <meta name="author" content="gruppo 10" />
  <link rel="stylesheet" type="text/css" href="../index.css" />
  <meta name="content" content="List Users Screen" />
  <link rel="icon" href="../assets/service.jpg" type="image/jpg" />
  <meta charset="utf-8" />
</head>

<body>
  <?php
  require_once '../common/library.php';
  include '../services/api.service.php';

  generateHeader();
  $response = API::list_users();
  $response = json_decode($response, true);
  ?>

  <div class="content">
    <div class="tableFunctions">
      <div class="tableFunctionsFloater"></div>
      <a href="insert-user.screen.php?create=yes"><img src="../assets/più.png" style="height:20px" title="Insert new user"></a>
    </div>

    <div>
      <?php
      echo "<table class='table2' border='1'>";
      echo "
      <thead>
        <tr>
          <th width='35%' height='100%' align='center'>Username</th>
          <th width='35%' height='100%' align='center'>Role</th>
        </tr>
      </thead>";

      foreach ($response['rows'] as $_ => $data) {
        echo "
        <tbody>
          <tr class=\"clickable-row\" onClick=\"javascript:window.location.href='view-user.screen.php?username=" . $data['username'] . "'\">
            <td width='35%' height='100%' align='center'>" . $data['username'] . "</td>
            <td width='35%' height='100%' align='center'>" . $data['role'] . "</td>  
          </tr>
        </tbody>";
      }
      echo "</table>";

      ?>
    </div>
  </div>

</body>

</html>