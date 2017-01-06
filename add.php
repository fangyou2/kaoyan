<?php
include "data.php";

$a=new article();
$a->title=$_REQUEST["title"];
$a->content=$_REQUEST["content"];
$a->parent=$_REQUEST["parent"];
$d=new data();
$d->add($a);


