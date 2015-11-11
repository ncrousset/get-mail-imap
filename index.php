<?php 

require __DIR__ . '/vendor/autoload.php';

use MailImap\MailBox as MailBox;

$config = parse_ini_file('config.ini');

$box = new MailBox("{" . $config['host'] .":". $config['post_imap'] ."/imap/ssl}", $config['username'], $config['password']);
$box->connect();
//$box->listMailBoxes();
//

// $message = imap_fetchbody($box->connect, 5, "1");


// echo $box->getUID(5);

// var_dump(imap_status($box->connect, "{" . $config['host'] .":". $config['post_imap'] ."/imap/ssl}", SA_ALL));

// var_dump(imap_check($box->connect));




// echo var_export($box->bodyMsg(5));


// $MC = imap_check($box->connect);
// $start = $MC->Nmsgs - 100;

// var_dump($box->fetchOverview($start, $MC->Nmsgs));
