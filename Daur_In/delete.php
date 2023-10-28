<?php
include_once("config.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM trans WHERE id=$id");

header("Location: TambahSampah.php");
?>