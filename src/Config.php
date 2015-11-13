<?php namespace MailImap;

class Config
{

	/**
	 * instancia de la clase
	 * 
	 * @var Config
	 */
	private static $instance = null;

	/**
	 * @var string
	 */
	public $host;

	/**
	 * @var string
	 */
	public $username;

	/**
	 * @var string
	 */
	public $password;

	/**
	 * @var int
	 */
	public $postImap;

	/**
	 * @var int
	 */
	public $postSmtp;

	/**
	 * 
	 * @param string $pathConfigIni 
	 * @return  void
	 */
	public function __construct($pathConfigIni = __DIR__ . '../../config.ini')
	{

		$config = parse_ini_file($pathConfigIni);

		$this->host = $config['host'];
		$this->username = $config['username'];
		$this->password = $config['password'];
		$this->postImap = $config['post_imap'];
		$this->postSmtp = $config['post_smtp'];;
	}

	/**
	 *
	 * @return Config 
	 * @return Config
	 */
	public static function getInstace()
	{
		if(self::$instance == null) {
			self::$instance = new self;
		}

		return self::$instance;
	}
	
	 
}