<?php
class User
{
  var $username;
  var $password;

  function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;

  }

  static function authentication($username, $password)
  {
    if ($username == "abc" && $password == "123")
      return new User($username, $password);
    return false;
  }
}
