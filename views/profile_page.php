<?php

require_once '../utils/include.php';
require_once '../model/get_user.php';

echo "<h1> This is the profile page!</h1>";

echo "<h3> Welcome, " . $user_info['user_name'];