<?php
/**
* db_execute Class extends db_config
*
* This class is used to execute sql command
* and can be used with insert, update and delete
* statements
* Extends db_config Class 
*
* @subpackage   execute
* @package      Database
* @copyright    as GPL
* @version      1.0
* @author       Stuart Cochrane - stuartc1@users.sourceforge.net
* @link			http://sourceforge.net/projects/php-cmc/
*   
*/
class db_execute extends db_config {
	/**
    * sql - 	SQL to be executed
    * @access   public
    * @return   string
    */
	private $sql = "";
	
	/**
    * err - 	error message returned
    * @access   public
    * @return   string
    */
	private $err = "";
    private $link;
    private $row;
    private $count;
	
	/**
	* db_execute::db_set_execute()
	* 
	* @param string $sql sql query
	*/
    
    
	function db_set_execute($sql) {
             $resource=mysql_query($sql);
		if(!$resource) {
			$this->err = mysql_error();
			return false;
		} else {
			return $resource;
		}
        
	}
    
    function db_set_recordset($sql) {
        
        $qry = $this->db_set_execute($sql);
        $this->count = mysql_num_rows($qry);
        $i=0;
        if($this->count)
        {
        while($out = mysql_fetch_array($qry)) {
        $this->row[]=$out;
        }
        }

    }
    function db_get_recordset() {
        return $this->row;
    }
    function db_get_count() {
        return $this->count;
    }
    function destory()
    {
        unset($this->row);
        unset($this->count);
    }
    
    function escape_str($str, $like = FALSE)    
    {    
        if (is_array($str))
        {
            foreach($str as $key => $val)
               {
                $str[$key] = $this->escape_str($val, $like);
               }
           
               return $str;
           }
        $link=$this->getlink();
        if (function_exists('mysql_real_escape_string') AND is_resource($link))
        {
            $str = mysql_real_escape_string($str, $link);
        }
        elseif (function_exists('mysql_escape_string'))
        {
            $str = mysql_escape_string($str);
        }
        else
        {
            $str = addslashes($str);
        }
        
        // escape LIKE condition wildcards
        if ($like === TRUE)
        {
            $str = str_replace(array('%', '_'), array('\\%', '\\_'), $str);
        }
        
        return $str;
    }
    function db_set($data,$table,$where='')
    {
        if(is_array($data))
        {
           if($where)
           { 
          // $array = array('lastname', 'email', 'phone');

              $this->escape_str($data);
              //strkeyvalue= join(",", $data); 
              //$datakey=array_keys($data);
              
              foreach($data as $key=>$value)
              {
                  
                 $datavalue[]=" `$key` = '$value' "; 
              }
              
              $strkeyvalue= join(",", $datavalue); 
              
              $sql="UPDATE $table
              SET $strkeyvalue
              WHERE $where";
              
             //echo $sql;
           
           }else
           {
           $this->escape_str($data);  
           $strvalue= "'".join("','", $data). "'";
           $data=array_keys($data);
           $strkey= join("`,`", $data);  
           $sql="INSERT INTO $table (`$strkey`)
                 VALUES ($strvalue)";
                 
           }
           return $this->db_set_execute($sql);
           
        }else
        {
            return false;
        }
    }
    function db_get_last_number()
    {
        return mysql_insert_id();
    }
    
	
	/**
	* db_execute::db_get_error()
	* 
	* @return $err error message 
	*/
	function db_get_error(){
		return $this->err;
	}
    
}
?>