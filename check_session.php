<?php
session_start();
echo json_encode(array("loggedin" => isset($_SESSION['loggedin']) ? true : false));
