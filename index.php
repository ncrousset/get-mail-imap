<?php 

require __DIR__ . '/vendor/autoload.php';

use MailImap\MailBox as MailBox;

$config = parse_ini_file('config.ini');

$box = new MailBox("{" . $config['host'] .":". $config['post_imap'] ."/imap/ssl}", $config['username'], $config['password']);
$box->connect();
//$box->listMailBoxes();
//

$message = imap_fetchbody($box->connect, 5, "1");




echo var_export($box->bodyMsg(5));

