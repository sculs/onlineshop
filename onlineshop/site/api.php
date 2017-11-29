<?php

require('../php/db.php');

$query="SELECT * FROM books";

$table=mysqli_query($connection, $query);
$rows=array();

while($r = mysqli_fetch_assoc($table)) {
    $rows[] = $r;
 }
echo json_encode($rows);
?>