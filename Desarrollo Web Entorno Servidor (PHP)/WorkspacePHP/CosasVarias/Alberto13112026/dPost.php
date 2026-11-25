<?php
require_once '../../lib/rb.php';
R::setup('mysql:host=localhost;dbname=test', 'root', '');
$id = isset($_POST['id']) ? $_POST['id'] : null;
$p = R::load('persona', $id);
R::trash($p);
header('Location:rGet.php');
?>