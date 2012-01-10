<?php
/**
* db_recordset Class extends db_config
*
* This class is used to retrieve recordsets
* from a MySQL database and return them as
* a multidimentional array.
* Extends db_config Class 
*
* @subpackage   recordsets
* @package      Database
* @copyright    as GPL
* @version      1.0
* @author       Stuart Cochrane - stuartc1@users.sourceforge.net
* @link			http://sourceforge.net/projects/php-cmc/
*    
*/
class db_recordset extends db_config {
	/**
    * sql - 	SQL to be executed
    * @access   public
    * @return   string
    */
	var $sql = "";
	
	/**
    * num - 	number of elements in array
    * @access   public
    * @return   integer
    */
	var $num = 0;
	
	/**
    * count - 	number of rows returned
    * @access   public
    * @return   integer
    */
	var $count = 0;
	
	/**
    * row - 	returned array
    * @access   public
    * @return   array
    */
	var $row = 0;
	
	/**
	* db_recordset::db_set_recordset()
	* 
	* @param string $sql sql query
	* @param integer $num items
	*/
	function db_set_recordset($sql, $num) {
		$qry = mysql_query($sql);
		$this->count = mysql_num_rows($qry);
		$i=0;
		while($out = mysql_fetch_array($qry)) {
			for($j=0; $j<$num; $j++){
				$this->row[$i][$j] = $out[$j];
			}
		$i++;
		}
	}
	
	/**
    * db_recordset::db_get_recordset()
	* 
	* @access   public
	* @return   array recordset array
    */
	function db_get_recordset() {
		return $this->row;
	}
	
	
	/**
	* db_select::db_get_count()
	* 
	* @access   public
	* @return   integer recordset row count
	*/
	function db_get_count() {
		return $this->count;
	}
}
?>