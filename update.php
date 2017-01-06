<?php
include "data.php";

$a=new article();
$a->id=$_REQUEST["id"];
$a->title=$_REQUEST["title"];
$a->content=$_REQUEST["content"];
$a->parent=$_REQUEST["parent"];
$d=new data();
$d->update($a);


