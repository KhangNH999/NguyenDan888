<?php
$mysqli = new mysqli("localhost","root","","hinada_sport");

// Check connection
if ($mysqli->connect_errno) {
  echo "Kết nối MYSQL lỗi" . $mysqli->connect_error;
  exit();
}