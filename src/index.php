<?php 

use MailImap\MailBox as MailBox;


$box = new MailBox("{imap.gmail.com:993/imap/ssl}", 'natanael926@gmail.com', 'Jonathan0220');
$box->connect();
$box->listMailBoxes();



