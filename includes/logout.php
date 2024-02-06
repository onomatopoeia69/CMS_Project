

<?php

include_once 'db.php';

session_start();


$user_id = $_SESSION['online']; 
$delete_sessions_query = ("DELETE FROM users_online WHERE session = '$user_id' ");
mysqli_query($conn, $delete_sessions_query);



session_unset();

session_destroy();

header("Location: ../index.php");

?>