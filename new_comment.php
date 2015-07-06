<form name="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="text/html">
  <p>Name<span style="color:red;">*</span>:<br />
    <input type="text" name="name" value="" size="50" maxlength="150" />
  </p>
  <p>Email:<br />
    <input type="text" name="email" value="" size="50" maxlength="150" />
  </p>
  <p>Comment<span style="color:red;">*</span>:<br />
    <textarea name="comment_field" rows="10" cols="50"></textarea>
  </p>
  <input type="Submit" name="" value="save" />
</form>

<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ( isset($_POST['comment_field'])) {
  echo "<h2>Save comment</h2>";

  $nameErr = "Name is required";
  $commentErr = "Comment is required";

  if (empty($_POST['name'])){
    die($nameErr);
  }
  if (empty($_POST['comment_field'])){
    die($commentErr);
  }

  $sql = " INSERT INTO comments ";
  $sql .= " SET ";
  $sql .= " name ='". test_input($_POST['name']) ."', ";
  $sql .= " email ='". test_input($_POST['email']) ."', ";
  $sql .= " url ='" . "', ";
  $sql .= " date ='". date("Y-m-d H:i:s") ."', ";
  $sql .= " comment ='". test_input($_POST['comment_field']) ."' ";

  define ( 'MYSQL_HOST', 'localhost' );
  define ( 'MYSQL_USER', 'root' );
  define ( 'MYSQL_PASS', 'navi' );
  define ( 'MYSQL_DATA', 'commentfunction' );

  $db_link = @mysql_connect (MYSQL_HOST, MYSQL_USER, MYSQL_PASS);

  if ( ! $db_link ) {
    die('Failed to etablish connection to the database. Check it out later!');
  }

  $db_sel = mysql_select_db ( MYSQL_DATA ) or die('Unable to select database.');

  $db_erg = mysql_query( $sql );
  if ( ! $db_erg ) {
    die('Invalid query: ' . mysql_error());
  }
}

echo '<p><a href="comment_area.php">See comment</a></p>';
exit;

?>
