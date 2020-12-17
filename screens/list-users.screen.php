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
  include_once '../services/api.service.php';

  session_start();
  generate_header();



  $response = Api::list_users();
  $response = json_decode($response, true);



  ?>

  <div class="content">
    <div class="tableFunctions">
      <div class="tableFunctionsFloater"></div>
      <a href="insert-user.screen.php?create=yes"><img src="../assets/più.png" style="height:20px" title="Insert new user"></a>
    </div>

    <div>
      <?php
      echo "<table class='table2' border='1'>
      <thead>
        <tr>
          <th width='35%' height='100%' align='center'>Username</th>
          <th width='35%' height='100%' align='center'>Role</th>
        </tr>
      </thead>";

      if ($response && $response['rows'] && $response['meta'] && !isset($_GET['current_page']) && !isset($_GET['page_size'])) {
        foreach ($response['rows'] as $_ => $user) {
          echo "
        <tbody>
          <tr class=\"clickable-row\" onClick=\"javascript:window.location.href='view-user.screen.php?username=" . $user['username'] . "'\">
            <td width='35%' height='100%' align='center'>" . $user['username'] . "</td>
            <td width='35%' height='100%' align='center'>" . $user['role'] . "</td>  
          </tr>
          </tbody>";
        }
        echo "</table>";


        echo "
        <br>
          <div class=\"meta\"></div>
           <p class=\"meta\" style=\"font-weight: bold;\">Total users  </p>" . $response['meta']['count'] .
          "<p class=\"meta\" style=\"font-weight: bold;\">     Current page    </p>" . $response['meta']['current_page'] .
          "<p class=\"meta\" style=\"font-weight: bold;\">     Total page    </p>" . $response['meta']['page_count'] .
          "<p class=\"meta\" style=\"font-weight: bold;\">     Results for page    </p>" . $response['meta']['page_size'] . "
          ";

        if ($response['meta']['count'] > $response['meta']['page_size']) {

          if ($response['meta']['current_page'] > 1) {
            echo "<a style=\"color: black;\" href=\"" . $_SERVER['PHP_SELF'] . "?current_page=" . ($response['meta']['current_page']  - 1) . "&page_size=" . $response['meta']['page_size'] . "\">";
            echo "Prev Page     </a>";
          }
          if ($response['meta']['page_count'] > $response['meta']['current_page']) {
            echo "<a style=\"color: black;\" href=\"" . $_SERVER['PHP_SELF'] . "?current_page=" . ($response['meta']['current_page']  + 1) . "&page_size=" . $response['meta']['page_size'] . "\">";
            echo "Next Page</a>";
          }
        }
      }




      if (isset($_GET['current_page']) && isset($_GET['page_size'])) {



        $response = Api::list_users_by_size($_GET['current_page'], $_GET['page_size']);
        $response = json_decode($response, true);

        foreach ($response['rows'] as $_ => $user) {
          echo "
          <tbody>
            <tr class=\"clickable-row\" onClick=\"javascript:window.location.href='view-user.screen.php?username=" . $user['username'] . "'\">
              <td width='35%' height='100%' align='center'>" . $user['username'] . "</td>
              <td width='35%' height='100%' align='center'>" . $user['role'] . "</td>  
            </tr>
            </tbody>";
        }
        echo "</table>";


        echo "
        <br>
          <div class=\"meta\"></div>
           <p class=\"meta\" style=\"font-weight: bold;\">Total users  </p>" . $response['meta']['count'] .
          "<p class=\"meta\" style=\"font-weight: bold;\">     Current page    </p>" . $response['meta']['current_page'] .
          "<p class=\"meta\" style=\"font-weight: bold;\">     Total page    </p>" . $response['meta']['page_count'] .
          "<p class=\"meta\" style=\"font-weight: bold;\">     Results for page    </p>" . $response['meta']['page_size'] . "
          ";


        if ($response['meta']['count'] > $response['meta']['page_size']) {

          if ($response['meta']['current_page'] > 1) {
            echo "<a style=\"color: black;\" href=\"" . $_SERVER['PHP_SELF'] . "?current_page=" . ($response['meta']['current_page']  - 1) . "&page_size=" . $response['meta']['page_size'] . "\">";
            echo "Prev Page     </a>";
          }
          if ($response['meta']['page_count'] > $response['meta']['current_page']) {
            echo "<a style=\"color: black;\" href=\"" . $_SERVER['PHP_SELF'] . "?current_page=" . ($response['meta']['current_page']  + 1) . "&page_size=" . $response['meta']['page_size'] . "\">";
            echo "Next Page</a>";
          }
        }
      }

      ?>
    </div>
  </div>

</body>

</html>