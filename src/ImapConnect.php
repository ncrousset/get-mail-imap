<?php namespace MailImap;


class ImapConnect
{
    
    /**
     * 
     * @var null
     */
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
		$this->connect = imap_open($authhost, $username, $password);
	}

	/**
	 * 
	 * @return booleam
	 */
	public function ping()
	{
		if(!imap_ping($this->connect)){
			$this->connect();
		}

		return true;
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