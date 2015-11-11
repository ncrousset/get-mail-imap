<?php 

require __DIR__ . '/vendor/autoload.php';

use MailImap\MailBox as MailBox;

$config = parse_ini_file('config.ini');

$box = new MailBox("{" . $config['host'] .":". $config['post_imap'] ."/imap/ssl}", $config['username'], $config['password']);
$box->connect();
$box->listMailBoxes();