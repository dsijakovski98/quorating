<?php
    session_start();
    $uname = $_SESSION['user_name'];
    echo "Hello " . $uname . "!";