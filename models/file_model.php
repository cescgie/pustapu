<?php

class File_Model extends Model {

   public function __construct(){
      parent::__construct();
   }
   //CF DB
   public function all() {
      return $this->_db->select('SELECT * FROM cf ORDER BY id DESC LIMIT 0, 20');
   }
    public function _insert_cf($datas) {
     $this->_db->insert('cf', $datas);
   }
   public function summe_cf(){
      return $this->_db->select("SELECT count(*) as 'Summe_cf' from cf");
   }
   //GA DB
   public function all_ga() {
      return $this->_db->select('SELECT * FROM ga ORDER BY id DESC LIMIT 0, 20');
   }
   public function _insert_ga($datas) {
     $this->_db->insert('ga', $datas);
   }
   public function summe_ga(){
      return $this->_db->select("SELECT count(*) as 'Summe_ga' from ga");
   }
   //GL DB
   public function all_gl() {
      return $this->_db->select('SELECT * FROM gl ORDER BY id DESC LIMIT 0, 20');
   }
   public function _insert_gl($datas) {
     $this->_db->insert('gl', $datas);
   }
   public function summe_gl(){
      return $this->_db->select("SELECT count(*) as 'Summe_gl' from gl");
   }

}