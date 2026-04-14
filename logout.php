<?php
// logout.php
session_start();
session_destroy(); // removing ALL session data
header("Location: home.php"); // go home