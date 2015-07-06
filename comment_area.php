<?php

define ( 'MYSQL_HOST', 'localhost' );
define ( 'MYSQL_USER', 'root' );
define ( 'MYSQL_PASS', 'navi' );
define ( 'MYSQL_DATA', 'commentfunction' );

$db_link = @mysql_connect (MYSQL_HOST, MYSQL_USER, MYSQL_PASS);

if ( ! $db_link ) {
    die('Failed to etablish connection to the database. Check it out later!');
  }

$db_sel = mysql_select_db( MYSQL_DATA )
  or die('Unable to select database.');

$sql = " SELECT * FROM comments ORDER BY date ";

$db_erg = mysql_query( $sql );
  if ( ! $db_erg ) {
  die('Invalid query: ' . mysql_error()); }


// testing here

$entries = mysql_num_rows($db_erg);
  echo "<p>Amount of comments: $entries </p>";

while ($data = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
{
    // Aushabe der Daten
    echo "ID: ";
    echo $data['id'];
    echo "<br />";

    echo "Name: ";
    echo $data['name'];
    echo "<br />";

    echo "Email: ";
    echo $data['email'];
    echo "<br />";

    echo "URL: ";
    echo $data['url'];
    echo "<br />";

    echo "Date: ";
    echo $data['date'];
    echo "<br />";

    echo "Comment: ";
    echo $data['comment'];
    echo "<br />";
}

mysql_free_result( $db_erg );









?>
