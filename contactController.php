<html>
HI
<?php
  session_start();
  include "db_connect.php";
  include "loggedIn.php";
?>
temporarily coding in this page until I can push the appropriate file at home.

<?php
  if(isset($_POST['game'])) {
    $title = mysqli_real_escape_string($db, trim($_POST['game']));
  } else { $title = ""; }

/*




*/

?>




</html>
