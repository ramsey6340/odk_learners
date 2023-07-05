<?php
include('connection.php');
$request = $db->query('SELECT * FROM promotion');
$promotions = array();
while($v = $request->fetch()){
    $promotions[] = $v;
}
?>