
<?php

/**
 * Api service to help manage http requests to the database
 */
class Api
{
  static private $base_url = "http://arma-se.ddns.net";

  static private function call_api($method, $url, $data = false)
  {
    $curl = curl_init();
    switch ($method) {
      case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
      case "PUT":
        curl_setopt($curl, CURLOPT_PUT, 1);
        if ($data)
          $url = sprintf("%s?%s", $url, http_build_query($data));
        break;
      default:
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        if ($data)
          $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // Optional Authentication:
    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
  }

  static private function request($method, $url, $data = false)
  {
    return self::call_api($method, self::$base_url . $url, $data);
  }

  static private function get($url, $data = false)
  {
    return self::request("GET", $url, $data);
  }

  static private function post($url, $data = false)
  {
    return self::request("POST", $url, $data);
  }

  static private function put($url, $data = false)
  {
    return self::request("PUT", $url, $data);
  }

  static private function delete($url, $data = false)
  {
    return self::request("DELETE", $url, $data);
  }

  // Public interface

  /**
   * Retrieves the list of users from the database
   *
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function list_users()
  {
    return self::get("/users");
  }

  /**
   * Retrieves the user with given username from the database
   *
   * @param string $username
   * The user's username
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function get_user($username)
  {
    return self::get("/user" . "/" . $username);
  }

  /**
   * Creates a new user in the database based on given user data
   *
   * @param array[string]string $user
   * The user's data
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function post_user($user)
  {
    return self::post("/user", $user);
  }

  /**
   * Edits an user with given username in the database based on given user data
   *
   * @param string $username
   * The user's username
   * @param array[string]string $user
   * The user's data
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function put_user($username, $user)
  {
    return self::put("/user" . "/" . $username, $user);
  }

  /**
   * Deletes an user with given username from the database
   *
   * @param string $username
   * The user's username
   * 
   * @return string|bool
   * The result on success, false on failure.
   */
  static public function delete_user($username)
  {
    return self::delete("/user" . "/" . $username);
  }
}
?>