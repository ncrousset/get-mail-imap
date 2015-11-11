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

	protected $connect = null;

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

	public function connect()
	{
		$this->connect = imap_open($this->authhost, $this->username, $this->password);
	}

	public function listMailBoxes()
	{
		$mailBoxes = imap_listmailbox($this->connect, $this->authhost, "*");

		if($mailBoxes == false) {
			echo "Error! en la llamada";
		} else {
			foreach ($mailBoxes as $boxe) {
				echo $boxe . '<br />\n';
			}
		}
	}

	public function imapClose()
	{
		imap_close($this->connect);
	}
}