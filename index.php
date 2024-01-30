<?php

require_once 'vendor/autoload.php';

use App\Model\Clothing;

$clothing = new Clothing();

var_dump($clothing->findAll());