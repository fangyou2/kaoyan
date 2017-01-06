<?php
include "data.php";

$id1=$_REQUEST["id1"];
$id2=$_REQUEST["id2"];
$d=new data();
$d->change($id1,$id2);


