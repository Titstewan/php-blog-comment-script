<form name="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="text/html">
  <p>Name:<br />
    <input type="text" name="name" value="" size="50" maxlength="150" />
  </p>
  <p>Email:<br />
    <input type="text" name="email" value="" size="50" maxlength="150" />
  </p>
  <p>Homepage:<br />
    <input type="text" name="url" value="" size="50" maxlength="150" />
  </p>
  <p>Comment:<br />
    <textarea name="comment_field" rows="10" cols="50"></textarea>
  </p>
  <input type="Submit" name="" value="save" />
</form>

<?php

if ( !isset($_POST['comment_field']) != "" ) {
  echo "<h2>Save comment</h2>";

  $sql = " INSERT INTO comments ";
  $sql .= " SET ";
  $sql .= " name ='". !isset($_POST['name']) ."', ";
  $sql .= " email ='". !isset($_POST['email']) ."', ";
  $sql .= " url ='". !isset($_POST['url']) ."', ";
  $sql .= " date ='". date("Y-m-d H:i:s") ."', ";
  $sql .= " comment ='". !isset($_POST['comment_field']) ."' ";

define ( 'MYSQL_HOST', 'localhost' );
define ( 'MYSQL_USER', 'root' );
define ( 'MYSQL_PASS', '' );
define ( 'MYSQL_DATA', 'commentfunction' );

$db_link = @mysql_connect (MYSQL_HOST, MYSQL_USER, MYSQL_PASS);

  if ( ! $db_link ) {
  die('Failed to etablish connection to the database. Check it out later!');
  }

$db_sel = mysql_select_db ( MYSQL_DATA )
  or die('Unable to select database.');

$db_erg = mysql_query( $sql );
  if ( ! $db_erg ) {
  die('Invalid query: ' . mysql_error());
  }
  }

  echo '<p><a href="comment_area.php">See comment</a></p>';
  exit;

?>