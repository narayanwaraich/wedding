<?php
require_once( 'db.php' );
require_once( 'menu.php' );

$db = new db('localhost','wedding','root', '');

$menu = new menu($db, 'menu');
var_dump($menu->get_menu());
//var_dump($menu);
/*
$menu = new menu('Cathy','9 Dark and Twisty','Cardiff');
$STH = $DBH->("INSERT INTO menu (id, link, name) value (:id, :link, :name)");
$STH->execute((array)$menu);
*/



?>
