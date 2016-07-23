<?php

$db = mysqli_connect();

// Create connection
$db = new mysqli("localhost", "train_info", "m9GPRBexvjBtC3sq", "train_infos");
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
