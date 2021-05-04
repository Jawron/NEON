<?php
$SEPARATOR = DIRECTORY_SEPARATOR;

define("LOCAL", "http://localhost");
define("WEB", "http://foo.bar");
$environment = LOCAL; //change to WEB if you're live


require_once($_SERVER['DOCUMENT_ROOT']). '/neon/classes/Database.php';
require_once($_SERVER['DOCUMENT_ROOT']). '/neon/classes/Main.php';
require_once($_SERVER['DOCUMENT_ROOT']). '/neon/classes/Categories.php';
require_once($_SERVER['DOCUMENT_ROOT']). '/neon/classes/Posts.php';
require_once($_SERVER['DOCUMENT_ROOT']). '/neon/classes/Session.php';
require_once($_SERVER['DOCUMENT_ROOT']). '/neon/classes/Comments.php';
