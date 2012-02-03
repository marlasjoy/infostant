<?php
  function __autoload($className) {
    //echo "load {$className} <br>";                        
    loadClass($className);
}

   function bb_parse($string) {
        while (preg_match_all('`\[(.+?)=?(.*?)\](.+?)\[/\1\]`', $string, $matches)) foreach ($matches[0] as $key => $match) {
            list($tag, $param, $innertext) = array($matches[1][$key], $matches[2][$key], $matches[3][$key]);
            switch ($tag) {
                case 'b': $replacement = "<strong>$innertext</strong>"; break;
                case 'i': $replacement = "<em>$innertext</em>"; break;
                case 'size': $replacement = "<span style=\"font-size: $param;\">$innertext</span>"; break;
                case 'color': $replacement = "<span style=\"color: $param;\">$innertext</span>"; break;
                case 'center': $replacement = "<div class=\"centered\">$innertext</div>"; break;
                case 'quote': $replacement = "<blockquote>$innertext</blockquote>" . $param? "<cite>$param</cite>" : ''; break;
                case 'url': $replacement = '<a href="' . ($param? $param : $innertext) . "\">$innertext</a>"; break;
                case 'img':
                    list($width, $height) = preg_split('`[Xx]`', $param);
                    $replacement = "<img src=\"$innertext\" " . (is_numeric($width)? "width=\"$width\" " : '') . (is_numeric($height)? "height=\"$height\" " : '') . '/>';
                break;
                case 'video':
                    $videourl = parse_url($innertext);
                    parse_str($videourl['query'], $videoquery);
                    if (strpos($videourl['host'], 'youtube.com') !== FALSE) $replacement = '<embed src="http://www.youtube.com/v/' . $videoquery['v'] . '" type="application/x-shockwave-flash" width="425" height="344"></embed>';
                    if (strpos($videourl['host'], 'google.com') !== FALSE) $replacement = '<embed src="http://video.google.com/googleplayer.swf?docid=' . $videoquery['docid'] . '" width="400" height="326" type="application/x-shockwave-flash"></embed>';
                break;
            }
            $string = str_replace($match, $replacement, $string);
        }
        return $string;
    } 

function loadClass($className) {
    global $imports;
    if (isset($imports[$className])) {
        require_once($imports[$className]);
    }
}

// แปลง วัน เดือน ปี > ปี-เดือน-วัน
function convertDate($date){
        $month_array = array("ม.ค."=>'01',"ก.พ."=>"02","มี.ค."=>"03","เม.ย."=>"04","พ.ค."=>"05","มิ.ย."=>"06","ก.ค."=>"07","ส.ค."=>"08","ก.ย."=>"09","ต.ค."=>"10","พ.ย."=>"11","ธ.ค."=>"12");
        list($day, $month, $year) = explode(" ",$date);
        $year = $year - 543;
        return $year."-".$month_array[$month]."-".$day;
    }
    
    // แปลง ปี-เดือน-วัน > วัน เดือน ปี
function revertDate($date){
        $month_array = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
        list($year, $month, $day) = explode("-",$date);
        if($year == 0 && $month == 0 && $day == 0){
            return "ไม่ระบุ";
        }else{
            $year = $year + 543;
             list($day,$time)= explode(" ",$day);
            return $day." ".$month_array[$month]." ".$year.'  '.$time;
        }
    }
function revertDate3($date){
        $month_array = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
        list($year, $month, $day) = explode("-",$date);
        if($year == 0 && $month == 0 && $day == 0){
            return "ไม่ระบุ";
        }else{
            
             $arrayDate=date_diff(strtotime(date('Y-m-d H:i:s')),strtotime($date)); 
             //$year = $year + 543;
                 list($day,$time)= explode(" ",$day);
             if($arrayDate[day]==1)
             {
                 
                 $when='เมื่อวานนี้ เวลา ';
                 
             }else if($arrayDate[day]==0)
             {
                $when='วันนี้ เวลา '; 
             }else 
             {
                 
                 $when=$day." ".$month_array[$month]." ".$year.'';
             }
            
            return $when.$time;
        }
    }
    function revertDate4($date){
        $month_array = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
        list($year, $month, $day) = explode("-",$date);
        if($year == 0 && $month == 0 && $day == 0){
            return "ไม่ระบุ";
        }else{
            
            
              if($year>2400)
              {
                  $year = $year - 543;
              }
             //$year = $year + 543;
                 list($day,$time)= explode(" ",$day);
           
                 
                 $when=$day." ".$month_array[$month]." ".$year.'';
         
            
            return $when;
        }
    }
    function convertDate3($date){
        $month_array = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
        list($day, $month, $year) = explode(" ",$date);
        //$year = $year - 543;
        return $year."-".array_search($month, $month_array)."-".$day;
    } 
  
    
function revertDate2($date){
   // echo $date;
        $month_array = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
        list($year, $month, $day) = explode("-",$date);
        if($year == 0 && $month == 0 && $day == 0){
            return "ไม่ระบุ";
        }else{
            
            // $arrayDate=date_diff(strtotime(date('Y-m-d H:i:s')),strtotime($date)); 
             $year = $year + 543;
                 list($day,$time)= explode(" ",$day);
          
           
                 
                 $when=$day." ".$month_array[$month]." ".$year.' เวลา ';
          
            
            return $when.$time;
        }
    }
    
function object_to_array($object) {
        if (is_array($object) || is_object($object)) {
            $array = array();
            foreach ($object as $key=>$value) {
                $array[$key] = object_to_array($value);
            }
            return $array;
        }
        return $object;
    }
    
function import_new($import='')
{
    global $imports;
    
    // seperate import into a package and a class
    $lastDot = strrpos($import, ',');
    $class = "class.".$lastDot ? substr($import, $lastDot + 1) : $import;
    $package = substr($import, 0, $lastDot);
    
    // if this import has already happened, return true
    if (isset($imports[$class]) || isset($imports[$package.',*'])) return true;
    
    // create a folder path out of the package name
    $folder = '' . ($package ? str_replace(',', '/', $package) : '');
    $file = "$folder/$class.php";
    
//     echo "- $folder / $file <br>";
    
    // make sure the folder exists
    if (!file_exists($folder)) {
        $back = debug_backtrace();
        return trigger_error("There is no such package <strong>'$package'</strong> -- Checked folder <strong>'$folder'</strong><br />
            Imported from <strong>'{$back[0]['file']}'</strong> on line <strong>'{$back[0]['line']}'</strong><br />", E_USER_WARNING);
    } elseif ($class != '*' && !file_exists($file)) {
        $back = debug_backtrace();
        return trigger_error("There is no such Class <strong>'$import'</strong> -- Checked for file <strong>'$file'</strong><br />
            Imported from <strong>'{$back[0]['file']}'</strong> on line <strong>'{$back[0]['line']}'</strong><br />", E_USER_WARNING);
    }
    
    if ($class != '*') {
        // add the class and it's file location to the imports array
        $imports[$class] = $file;
    } else {
        // add all the classes from this package and their file location to the imports array
        // first log the fact that this whole package was alread imported
        //echo "<u>Debug Load File</u> <br>";
        $imports["$package.*"] = 1;
        $dir = opendir($folder);
        while (($file = readdir($dir)) !== false) {
            if (strrpos($file, '.php')&&strrpos($file, '.tmp')===false) {
               ///echo "- $folder/$file <br>";
                $class = str_replace('.php', '', $file);
                require_once "$folder/$file";
            }
        }
        //echo "<hr size=\"1px\"> <br>"; 
    }
    
}

function date_diff($d1, $d2) {
        /* compares two timestamps and returns array with differencies (year, month, day, hour, minute, second)
         */
        //check higher timestamp and switch if neccessary
        if ($d1 < $d2) {
            $temp = $d2;
            $d2 = $d1;
            $d1 = $temp;
        } else {
            $temp = $d1; //temp can be used for day count if required
        }
        
      
        $d1 = date_parse(date("Y-m-d H:i:s", $d1));
        $d2 = date_parse(date("Y-m-d H:i:s", $d2));
       
        //seconds
        if ($d1['second'] >= $d2['second']) {
            $diff['second'] = $d1['second'] - $d2['second'];
        } else {
            $d1['minute']--;
            $diff['second'] = 60 - $d2['second'] + $d1['second'];
        }
        //minutes
        if ($d1['minute'] >= $d2['minute']) {
            $diff['minute'] = $d1['minute'] - $d2['minute'];
        } else {
            $d1['hour']--;
            $diff['minute'] = 60 - $d2['minute'] + $d1['minute'];
        }
        //hours
        if ($d1['hour'] >= $d2['hour']) {
            $diff['hour'] = $d1['hour'] - $d2['hour'];
        } else {
            $d1['day']--;
            $diff['hour'] = 24 - $d2['hour'] + $d1['hour'];
        }
        //days
        if ($d1['day'] >= $d2['day']) {
            $diff['day'] = $d1['day'] - $d2['day'];
        } else {
            $d1['month']--;
            $diff['day'] = date("t", $temp) - $d2['day'] + $d1['day'];
        }
        //months
        if ($d1['month'] >= $d2['month']) {
            $diff['month'] = $d1['month'] - $d2['month'];
        } else {
            $d1['year']--;
            $diff['month'] = 12 - $d2['month'] + $d1['month'];
        }
        //years
        $diff['year'] = $d1['year'] - $d2['year'];
        return $diff;
    }
    
     function checkemailmx($email) { 
                        if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) || 
                            (preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/',$email)) ) { 
                            $host = explode('@', $email);
                            
                            if(checkdnsrr($host[1].'.', 'MX') ) return true;
                            if(checkdnsrr($host[1].'.', 'A') ) return true;
                            if(checkdnsrr($host[1].'.', 'CNAME') ) return true;
                        }
                        return false;
     }
      function positiontext($array,$str)
  {
      $num=0;
      foreach($array as $value)
      {
  
        $str=substr_replace($str,'{--'."$num".'--}',strpos($str,$value),strlen($value));  
        $num++;
      }
     
     return    $str ;
      
  }
  function pregmatchall($str)
  {
      $array=array();
      $h1count = preg_match_all('/({)(.*)(\})/ismxU',$str,$array); 

      if($h1count)
      {
       return $array[0];     
      }
     return $h1count;  
      
  }
  function distance($lat1, $lon1, $lat2, $lon2, $unit) { 

  $theta = $lon1 - $lon2; 
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
  $dist = acos($dist); 
  $dist = rad2deg($dist); 
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344); 
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

  function randtext($text,$array)
  {
      if(is_array($array))
      {
         foreach($array as $key => $value)
         {
             
              $value=str_replace('{','',$value);
              $value=str_replace('}','',$value); 
             $arrayEx=explode('|',$value);
             
           $text=str_replace('{--'.$key.'--}',$arrayEx[rand(0,count($arrayEx)-1)],$text); 

         } 
      }
     return $text; 
  }
  function deleteAll($directory, $empty = false) {
    if(substr($directory,-1) == "/") {
        $directory = substr($directory,0,-1);
    }

    if(!file_exists($directory) || !is_dir($directory)) {
        return false;
    } elseif(!is_readable($directory)) {
        return false;
    } else {
        $directoryHandle = opendir($directory);
       
        while ($contents = readdir($directoryHandle)) {
            if($contents != '.' && $contents != '..') {
                $path = $directory . "/" . $contents;
               
                if(is_dir($path)) {
                    deleteAll($path);
                } else {
                    unlink($path);
                }
            }
        }
       
        closedir($directoryHandle);

        if($empty == false) {
            if(!rmdir($directory)) {
                return false;
            }
        }
       
        return true;
    }
} 
  function array2json($arr) 
  {
    if(function_exists('json_encode')) return json_encode($arr); //Lastest versions of PHP already has this functionality.
    $parts = array();
    $is_list = false;

    //Find out if the given array is a numerical array
    $keys = array_keys($arr);
    $max_length = count($arr)-1;
    if(($keys[0] == 0) and ($keys[$max_length] == $max_length)) {//See if the first key is 0 and last key is length - 1
        $is_list = true;
        for($i=0; $i<count($keys); $i++) { //See if each key correspondes to its position
            if($i != $keys[$i]) { //A key fails at position check.
                $is_list = false; //It is an associative array.
                break;
            }
        }
    }

    foreach($arr as $key=>$value) {
        if(is_array($value)) { //Custom handling for arrays
            if($is_list) $parts[] = array2json($value); /* :RECURSION: */
            else $parts[] = '"' . $key . '":' . array2json($value); /* :RECURSION: */
        } else {
            $str = '';
            if(!$is_list) $str = '"' . $key . '":';

            //Custom handling for multiple data types
            if(is_numeric($value)) $str .= $value; //Numbers
            elseif($value === false) $str .= 'false'; //The booleans
            elseif($value === true) $str .= 'true';
            else $str .= '"' . addslashes($value) . '"'; //All other things
            // :TODO: Is there any more datatype we should be in the lookout for? (Object?)

            $parts[] = $str;
        }
    }
    $json = implode(',',$parts);
    
    if($is_list) return '[' . $json . ']';//Return numerical JSON
    return '{' . $json . '}';//Return associative JSON
} 
function json2array($json){
   if(get_magic_quotes_gpc()){
      $json = stripslashes($json);
   }
   $json = substr($json, 1, -1);
   $json = str_replace(array(":", "{", "[", "}", "]"), array("=>", "array(", "array(", ")", ")"), $json);

   @eval("\$json_array = array({$json});");
   return $json_array;
}
     function get_images($file){
    $h1count = preg_match_all("/<img[^>]+>/i",$file,$patterns);
    $res = array();

    return $patterns;
}
function array_search_r($needle, $haystack){
        foreach($haystack as $value){
            
            if(is_array($value))
            {$match=array_search_r($needle, $value);}
            if($value==$needle)
            {
              $match=1;  
            }
            
            if($match)
            {
              return 1;  
            }
                
        }
        return 0;
    } 
function convert($size)
 {
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
 }
  function do_post_request($url, $data, $optional_headers = null) {
    $start = strpos($url,'//')+2;
    $end = strpos($url,'/',$start);
    $host = substr($url, $start, $end-$start);
    $domain = substr($url,$end);
    $fp = pfsockopen($host, 80, $erstr, $errno, 5);
    if(!$fp) return null;
    fputs ($fp,"POST $domain HTTP/1.1\n");
    fputs ($fp,"Host: $host\n");
    if ($optional_headers) {
       fputs($fp, $optional_headers);
    }
    fputs ($fp,"Content-type: application/x-www-form-urlencoded\n");
    fputs ($fp,"Content-length: ".strlen($data)."\n\n");
    fputs ($fp,"$data\n\n");
    $response = "";
    while(!feof($fp)) {
       $response .= fgets($fp, 1024);
    }
    fclose ($fp);
    return $response;
 } 
function FetchContent($url, $agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4)
 Gecko/20030624 Netscape/7.1 (ax)', $cookie = '', $referer = '', $post_fields = '', $return_transfer = 1, $follow_location = 1, $ssl = '', $curlopt_header = 0)
{
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);

    if($ssl) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    }

    curl_setopt ($ch, CURLOPT_HEADER, $curlopt_header);

    if($agent) {
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    }

    if($post_fields) {
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    if($referer) {
        curl_setopt($ch, CURLOPT_REFERER, $referer);
    }

    if($cookie) {
        
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    }

    $result = curl_exec ($ch);
    curl_close ($ch);
    return $result;
}

function FetchContentReturn($url, $agent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4)
 Gecko/20030624 Netscape/7.1 (ax)', $cookie = '', $referer = '', $post_fields = '', $return_transfer = 1, $follow_location = 1, $ssl = '', $curlopt_header = 0)
{
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);

    if($ssl) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
    }

    curl_setopt ($ch, CURLOPT_HEADER, $curlopt_header);

    if($agent) {
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    }

    if($post_fields) {
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    if($referer) {
        curl_setopt($ch, CURLOPT_REFERER, $referer);
    }

    if($cookie) {
        
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    }

   return $ch;
}
function FetchMutiCurl($ch1,$ch2,$ch3,$ch4)
{
    $content='';
    $mh = curl_multi_init();

//add the two handles
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);
curl_multi_add_handle($mh,$ch3);
curl_multi_add_handle($mh,$ch4);

$running=null;
//execute the handles
do {
    $content.=curl_multi_exec($mh,$running);
} while ($running > 0);

//close the handles
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_remove_handle($mh, $ch3);
curl_multi_remove_handle($mh, $ch4);
curl_multi_close($mh);

return $content;

}
function get_btag($file)
{
    
    $h1tags = preg_match_all("#<b>.+</b>#U",$file,$patterns);

    return $patterns;

}
function get_atag($content)
{
    preg_match_all('#(<a[^>]+href[^>]+>)(.*)</a>#Umis', $content, $patterns );
    return   $patterns;
}

function get_a_href($file){
    $h1count = preg_match_all('/(href=")(.*?)(")/i',$file,$patterns);
    return $patterns[2];
}

function get_a_href2($file){
        //preg_match_all('#(<a[^>]+href[^>]+>)(.*)</a>#Umis', $content, $patterns ); 
        preg_match_all("/href=\"([^\"]*)\"/", $file, $patterns);
    return $patterns[1];
    

} 

     
if(!function_exists('checkdnsrr'))
{
    function checkdnsrr($hostName, $recType = '')
    {
     if(!empty($hostName)) {
       if( $recType == '' ) $recType = "MX";
       exec("nslookup -type=$recType $hostName", $result);
       // check each line to find the one that starts with the host
       // name. If it exists then the function succeeded.
       foreach ($result as $line) {
         if(eregi("^$hostName",$line)) {
           return true;
         }
       }
       // otherwise there was no mail handler for the domain
       return false;
     }
     return false;
    }
}
function alert($msg='',$link='')
{
    $msgAlert.="<script>";
     if($msg)$msgAlert.="alert('$msg');";
    if($link)
    {
        $msgAlert.="location.href='$link';";
    }
    $msgAlert.="</script>";
    echo  $msgAlert;
}

function getFilesFromDir($dir) {

  $files = array();
  if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            if(is_dir($dir.'/'.$file)) {
               // $dir2 = $dir.'/'.$file;
             //   $files[] = getFilesFromDir($dir2);
            }
            else {
              $files[] = $file;
            }
        }
    }
    closedir($handle);
  }

  return array_flat($files);
}
function getFilesFromDir2($dir)
{
    
   $handle = @opendir($dir);
   $files = array();
   $files2 = array();
   $k=0;
    while (false !== ($file=readdir($handle)))
   {
           if ($file != "." && $file != "..") {
            if(is_dir($dir.'/'.$file)) {

            } else
              {

                        $files[$k]=filemtime($dir.'/'.$file);   #2-D array  
                        $files2[filemtime($dir.'/'.$file)]=$file;
                        $k++;     
              }
             
           }
   }
   closedir($handle);

   
   if ($files)
   {
      rsort($files); #sorts by filemtime


      #done! Show the files sorted by modification date
      $newfiles=array();
      foreach ($files as $key =>$value)
      {
          //echo     $value."<br>";
        $newfiles[]=$files2[$value];
         
          
      }
   //   exit(); 
        //echo "$file[0] $file[1]<br>\n";  #file[0]=Unix timestamp; file[1]=filename
   }
   return $newfiles;
}

function array_flat($array) {

  foreach($array as $a) {
    if(is_array($a)) {
      $tmp = array_merge($tmp, array_flat($a));
    }
    else {
      $tmp[] = $a;
    }
  }

  return $tmp;
}

function redirectto($url)
{
    header("Location: $url");
}
function import($import) {
    global $imports;
    
    // seperate import into a package and a class
    $lastDot = strrpos($import, '.');
    $class = "class.".$lastDot ? substr($import, $lastDot + 1) : $import;
    $package = substr($import, 0, $lastDot);
    
    // if this import has already happened, return true
    if (isset($imports[$class]) || isset($imports[$package.'.*'])) return true;
    
    // create a folder path out of the package name
    $folder = '' . ($package ? str_replace('.', '/', $package) : '');
    $file = "$folder/$class.php";
    
//     echo "- $folder / $file <br>";
    
    // make sure the folder exists
    if (!file_exists($folder)) {
        $back = debug_backtrace();
        return trigger_error("There is no such package <strong>'$package'</strong> -- Checked folder <strong>'$folder'</strong><br />
            Imported from <strong>'{$back[0]['file']}'</strong> on line <strong>'{$back[0]['line']}'</strong><br />", E_USER_WARNING);
    } elseif ($class != '*' && !file_exists($file)) {
        $back = debug_backtrace();
        return trigger_error("There is no such Class <strong>'$import'</strong> -- Checked for file <strong>'$file'</strong><br />
            Imported from <strong>'{$back[0]['file']}'</strong> on line <strong>'{$back[0]['line']}'</strong><br />", E_USER_WARNING);
    }
    
    if ($class != '*') {
        // add the class and it's file location to the imports array
        $imports[$class] = $file;
    } else {
        // add all the classes from this package and their file location to the imports array
        // first log the fact that this whole package was alread imported
        //echo "<u>Debug Load File</u> <br>";
        $imports["$package.*"] = 1;
        $dir = opendir($folder);
        while (($file = readdir($dir)) !== false) {
            if (strrpos($file, '.php')) {
                //echo "- $folder/$file <br>";
                $class = str_replace('.php', '', $file);
                $imports[$class] = "$folder/$file";
            }
        }
        //echo "<hr size=\"1px\"> <br>"; 
    }
}

function import_files($import) {
    
    // seperate import into a package and a class
    $lastDot = strrpos($import, '.');
    $class = "class.".$lastDot ? substr($import, $lastDot + 1) : $import;
    $package = substr($import, 0, $lastDot);
    
      
    // create a folder path out of the package name
    $folder = '' . ($package ? str_replace('.', '/', $package) : '');
    $file = "$folder/$class.php";
    
    // make sure the folder exists
    if (!file_exists($folder)) {
        $back = debug_backtrace();
        return trigger_error("There is no such package <strong>'$package'</strong> -- Checked folder <strong>'$folder'</strong><br />
            Imported from <strong>'{$back[0]['file']}'</strong> on line <strong>'{$back[0]['line']}'</strong><br />", E_USER_WARNING);
    } elseif ($class != '*' && !file_exists($file)) {
        $back = debug_backtrace();
        return trigger_error("There is no such Class <strong>'$import'</strong> -- Checked for file <strong>'$file'</strong><br />
            Imported from <strong>'{$back[0]['file']}'</strong> on line <strong>'{$back[0]['line']}'</strong><br />", E_USER_WARNING);
    }
    
    //echo "<u>Debug Load File</u> <br>";
    
    if ($class != '*') {
        //echo "- $file <br>";
        require_once "$file"; 
    } else {
        // add all the classes from this package and their file location to the imports array
        // first log the fact that this whole package was alread imported

        $dir = opendir($folder);
        while (($file = readdir($dir)) !== false) {
            if(strlen($file) > 2 && strstr($file,".php")){
                //echo "- $folder/$file <br>";
                require_once "$folder/$file";
            }
        }
    }
    
    //echo "<hr size=\"1px\"> <br>"; 
}

function import_css($import){
    // seperate import into a package and a class
    global $css;
    
    $lastDot = strrpos($import, '.');
    $cssFile = $lastDot ? substr($import, $lastDot + 1) : $import;
    $package = substr($import, 0, $lastDot);
    
      
    // create a folder path out of the package name
    $folder = '' . ($package ? str_replace('.', '/', $package) : '');
    $file = "$folder/$cssFile.css\n";
    
    // make sure the folder exists
    if (!file_exists($folder)) {

    }
    
    if ($cssFile != '*') {
        $css = "<link rel=\"stylesheet\" href=\"$file\" type=\"text/css\" media='all' />\n";
    } else {
        $dir = opendir($folder);
        while (($file = readdir($dir)) !== false) {
            if(strlen($file) > 2 && strstr($file,".css")){
                $css .= "<link rel=\"stylesheet\" href=\"$folder/$file\" type=\"text/css\" media='all' />\n";
            }
        }
    }    
}
function parseFloat($ptString) {
          $result=floatval(ereg_replace("[^-0-9\.]","",$ptString)); 
            return $result;
} 

function import_java($import){
    // seperate import into a package and a class
    global $javascript;
    
    $lastDot = strrpos($import, '.');
    $javaFile = $lastDot ? substr($import, $lastDot + 1) : $import;
    $package = substr($import, 0, $lastDot);
    
      
    // create a folder path out of the package name
    $folder = '' . ($package ? str_replace('.', '/', $package) : '');
    $file = "$folder/$javaFile.js";
    
    // make sure the folder exists
    if (!file_exists($folder)) {

    }
    
    if ($javaFile != '*') {
        $javascript .= "<script type=\"text/javascript\" src=\"$file\"></script>\n";
    } else {
        $dir = opendir($folder);
        while (($file = readdir($dir)) !== false) {
            if(strlen($file) > 2 && strstr($file,".js")){
                $javascript .= "<script type=\"text/javascript\" src=\"$folder/$file\"></script> \n";
            }
        }
    }
    return    $javascript; 
}
function str_replace_once($str_pattern, $str_replacement, $string){
       
        if (strpos($string, $str_pattern) !== false){
            $occurrence = strpos($string, $str_pattern);
            return substr_replace($string, $str_replacement, strpos($string, $str_pattern), strlen($str_pattern));
        }
       
        return $string;
    } 
?>
