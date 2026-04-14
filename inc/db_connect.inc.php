<?php
// db_connect.inc.php
// This file creates a PDO connection to the MySQL database.
// It is included by other PHP files using require_once.

// Create variables for your database connection:
$host = 'localhost'; // The database is on the same machine (XAMPP)
$user= 'root'; // XAMPP's default MySQL username
$password = ''; // XAMPP's default has no password (empty string)
$dbname = 'ctec'; // The database you created in phpMyAdmin

// Build the DSN (Data Source Name) string:
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Create a new PDO instance:
$db = new PDO($dsn, $user, $password);

// Set the default fetch mode to return objects:
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
