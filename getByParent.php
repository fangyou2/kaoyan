<?php
include "data.php";

$parent=$_GET["parent"];
$d=new data();
$d->getByParent($parent);


