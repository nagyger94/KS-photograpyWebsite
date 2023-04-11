<?php
	session_start();

	session_unset();						// munkamenet kiürítése
	session_destroy();						// munkamenet törlése

	header("Location: kezdolap.php");
?>