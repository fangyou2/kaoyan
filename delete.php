<?php
include "data.php";

$id=$_GET["id"];
$d=new data();
$d->delete($id);


