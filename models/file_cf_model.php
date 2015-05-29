<?php

class File_cf_Model extends Model {

   public function __construct(){
      parent::__construct();
   }
   public function all() {
      return $this->_db->select('SELECT * FROM cf_table ORDER BY id DESC LIMIT 0, 20');
   }
    public function _insert($datas) {
     $this->_db->insert('cf_table', $datas);
   }

}