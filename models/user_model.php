<?php

class User_Model extends Model {

   public function __construct(){
      parent::__construct();
   }

   /**
   * Gibt die letzten 20 Einträge im Archiv zurück.
   * @return array Liste aus Produkten mit id, timestamp, name, url, image und price
   */
   public function all() {
      return $this->_db->select('SELECT * FROM admin ORDER BY id DESC LIMIT 0, 20');
   }
   public function single($data) {
		return $this->_db->select2('admin', $data);
   }
   
   public function matchexists($data) {
	 if (!isset($data['password'])) {
		$vdata = $this->single($data);
	 	$result = $data['username'] == $vdata['username'];
	}
	 else {
		$vdata['username'] = $data['username'];
		$kdata = $this->single($vdata);
		$result = Password::validate($data['password'], $kdata['password']);
	 }
	 return $result;
		
   }
}