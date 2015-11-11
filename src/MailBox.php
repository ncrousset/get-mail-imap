<?php namespace MailImap;

/**
 *
 * @package MailImap
 * @author  Rudys Natanael Acosta <natanael926@gmail.com>
 */
class MailBox 
{
	
	/**
	 * Ruta del servidor y buzon para el servidor 
	 * la ruta debe ir en {} 
	 * 
	 * @var string
	 */
	protected $authhost;

    /**
     * Nombre del usuario
     * 
     * @var string
     */
	protected $username;


    /**
     * La clave asociada con el username
     * 
     * @var string
     */
	protected $password;

	public $connect = null;

	/**
	 * 
	 * @param string $authhost
	 * @param string $username 
	 * @param string $password 
	 */
	public function __construct($authhost, $username, $password )
	{
		$this->authhost = $authhost;
		$this->username = $username;
		$this->password = $password;
	}

	/**
	 * Inicio de coneccion
	 * 
	 * @return void
	 */
	public function connect()
	{
		$this->connect = imap_open($this->authhost, $this->username, $this->password);
	}

    /**
     * Lista de buzones
     * 
     * @return Array 
     */
	public function listMailBoxes()
	{
		$mailBoxes = imap_listmailbox($this->connect, $this->authhost, "*");

        $boxerList = [];

		if($mailBoxes == false) {
			echo "Error! en la llamada";
		} else {
			foreach ($mailBoxes as $boxe) {
				$boxe = str_replace($this->authhost, '',  $boxe);
				array_push($boxerList, $boxe);
			}
		}

		return $boxerList;
	}

	/**
	 * Cabesera de mensage
	 * 
	 * @param  int $numMsg 
	 * @return array
	 */
	public function headerMsg($numMsg)
	{
		$header = explode("\n", imap_fetchheader($this->connect, $numMsg));

		if (is_array($header) && count($header)) {
        	$head = array();

        	foreach($header as $line) {
         		// separate name and value
            	eregi("^([^:]*): (.*)", $line, $arg);
            	$head[$arg[1]] = $arg[2];
        	}
		}

		return $head;
	}

	/**
	 * 
	 * @param  int $numMsg 
	 * @return text/html
	 */
	public function bodyMsg($numMsg)
	{
		$body = imap_fetchbody($this->connect, $numMsg, "1");
		return $body;
	}

	public function numMsg()
	{
		return imap_num_msg($this->connect);
	}

	/**
	 * Close connection
	 * 
	 * @return void
	 */
	public function imapClose()
	{
		imap_close($this->connect);
	}
}