<?php 

require __DIR__.'/vendor/autoload.php';

use MailImap\MailBox as MailBox;

$box = new MailBox("{imap.gmail.com:993/imap/ssl}", '', '');
$box->connect();
$box->listMailBoxes();