<?php
// include CSRF class
require_once('csrf.php');

// print_r($_POST)
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // validate token
    if (CSRF::validate_token($_POST['token'])) {
        $_SESSION['success'] = 'Success';
        header('location: form.php');
      }
      else {
        $_SESSION['error'] = 'Session Has Expired!!!';
        header('location: form.php');
      }
}
else
{
    $_SESSION['error'] = 'Something went wrong';
    header('location: form.php');
}
?>
