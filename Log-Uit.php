<?php
session_start();
session_destroy();

header("Location: categories.php");
