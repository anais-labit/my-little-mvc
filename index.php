<?php
require_once 'vendor/autoload.php';

use App\Model\User;

$newUser = new User(null, 'momo', 'Morgane Maréchal', 'momo@momo.com', 'Hello45!', ['role' => 'ROLE_USER']);
$newUser->create();

$newUser->setEmail('momo@momo.momo');
$newUser->update();