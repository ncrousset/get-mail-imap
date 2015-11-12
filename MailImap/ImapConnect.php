<?php namespace MailImap;


class ImapConnect
{
    
	protected $connect = null;

	/**
	 * Concetar la libreria Imap
	 * 
	 * @param string $authhost 
	 * @param string $username 
	 * @param string $password 
	 */
	public function __construct($authhost, $username, $password)
	{
		$this->connect = imap_open($this->authhost, $this->username, $this->password);
	}
}

?>