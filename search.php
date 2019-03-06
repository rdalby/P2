<?php
/**
 * Created by PhpStorm.
 * User: rachel
 * Date: 2/27/2019
 * Time: 5:24 PM
 */


/*
 * This is the logic file for index.php; it's job is to check the
 * SESSION for results, and if available, store the results in variables we
 * can display in index.php
 */

session_start();

$hasErrors = false;

# Get `results` data from session, if available
if (isset($_SESSION['results'])) {
	$results = $_SESSION['results'];

	extract($results);
	#
	# http://php.net/manual/en/function.extract.php
}

# Clear session data so our search is cleared when the page is refreshed
session_unset();