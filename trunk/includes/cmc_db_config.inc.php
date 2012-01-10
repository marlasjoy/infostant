<?/**
* db_config Class
*	
* This class is used to make a database connection
* with MySQL, it should be used as the Super Class
* to other database classes.
*
* @subpackage   connection
* @package      Database
* @copyright    as GPL
* @version      1.0
* @author       Stuart Cochrane - stuartc1@users.sourceforge.net
* @link			http://sourceforge.net/projects/php-cmc/
*    
*/
class db_config {
    private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $database = "";
    private $link;
	
	function db_config() {
		$this->host 	= $host;
		$this->user 	= $user;
		$this->pass 	= $pass;
		$this->database = $database;
	}
	
	/**
	* db_config::set_host()
	* 
	* @param string $host hostname
	*/
	function set_host($host) {
		$this->host = $host;
	}
	
	/**
	* db_config::set_user()
	* 
	* @param string $user username
	*/
	function set_user($user) {
		$this->user = $user;
	}
	
	/**
	* db_config::set_pass()
	* 
	* @param string $pass password
	*/
	function set_pass($pass) {
		$this->pass = $pass;
	}
	
	/**
	* db_config::set_database()
	* 
	* @param str $database database
	*/
	function set_database($database) {
		$this->database = $database;
	}
	
	/**
    * get_connect()
	* make the database connection
    * @access   public
    */
	function get_connect() {
		$this->link=mysql_connect($this->host, $this->user, $this->pass);
        mysql_query("SET NAMES UTF8",$this->link);
		mysql_select_db($this->database,$this->link);
	}
    
    function get_pconnect() {
        $this->link=mysql_pconnect($this->host, $this->user, $this->pass);
        mysql_query("SET NAMES UTF8",$this->link);
        mysql_select_db($this->database,$this->link);
    }
    function closedb()
    {
        mysql_close($this->link);
    }
    function getlink()
    {
        return $this->link;
    }
} // end cmc_config
?>
