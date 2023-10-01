<?php
if(!session_id()) session_start();

require_once 'config/config.php';
require_once 'app/init.php';
$app = new App;