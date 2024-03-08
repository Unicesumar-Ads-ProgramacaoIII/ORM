<?php

require '../dataMapper/DataMapper.php';
require '../LayoutBuilder.php';
use dataMapper\DataMapper;

if(!isset($_POST['id'])){
  $data = "{'success': false}";
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($data);
}
$success = DataMapper::updatePlayer($_POST['id'], $_POST['nome'], $_POST['email']);
$data = "{'success': " . ($success? 'true' : 'false') . "}";
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
// TODO Appearing as a string on response