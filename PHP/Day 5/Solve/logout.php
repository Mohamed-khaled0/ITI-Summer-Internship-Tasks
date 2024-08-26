




<?php
session_start();
session_destroy(); //delete all sessions
header("Location: login.php");
exit();


