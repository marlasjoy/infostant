<?php
    class template {
        private $folder='default';
        private $data=array();
        private $data2=array();
        function set_folder($folder)
        {
            $this->folder=$folder;
        }
        function set_data($data=array())
        {
            $this->data=$data;
        }
        function set_data2($data2=array())
        {
            $this->data2=$data2;
        }
        function load($file)
         {
             $this->data;
             $this->data2;
             include(rootpath.'/templates/'.$this->folder.'/'.$file.'.php');
         }
         function load2($file)
         {
            $this->data;
             $this->data2;
             include(rootpath.'/templates/'.$this->folder.'/'.$file.'');
         }
    }
?>
