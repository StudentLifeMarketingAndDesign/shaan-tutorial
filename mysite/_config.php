<?php
FulltextSearchable::enable();
global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	"type" => 'MySQLDatabase',
	"server" => 'localhost',
	"username" => 'root',
	"password" => 'root',
	"database" => 'Tutorial',
	"path" => '',
);

// Set the site locale
i18n::set_locale('en_US');

error_reporting(E_ALL);
