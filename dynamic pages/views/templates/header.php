<?php
$ProjectName = 'Project111';
if (empty($title)) {
	$title = $ProjectName;
}
if (!stristr($title, $ProjectName)) {
	$title = "$title - $ProjectName";
}

if (empty($no_menu)) {
	$no_menu = 0;
}
?><!DOCTYPE html>
<html>
	<head>
		<title><?= $title; ?></title>

	</head>
	<body>
