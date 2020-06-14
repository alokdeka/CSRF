<?php
// required
session_start();

class CSRF{
  public static function create_token(){
    // generate token
    $token = base64_encode(openssl_random_pseudo_bytes(32));

    // save in Session
    $_SESSION['token'] = $token;

    // creating hidden field
    echo "<input type='hidden' name='token' value='$token'>";
  }

  public static function validate_token($token){
    // validate token
    if(isset($_SESSION['token']) && $token === $_SESSION['token']){
            unset($_SESSION['token']);
            return true;
        }
        return false;
  }
}
?>
