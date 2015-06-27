<?php

class Connect_Model extends Model {

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
    public function all_ip_ga(){
      return $this->_db->select("SELECT IpAddress,count(IpAddress) as Summe FROM ga GROUP BY IpAddress HAVING count(*) >1 ORDER BY count(*) DESC");
   }
   public function all_user_ga(){
      return $this->_db->select("SELECT UserId,count(UserId) as Summe FROM ga GROUP BY UserId HAVING count(*) >1 ORDER BY count(*) DESC");
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
   //IR DB
   public function all_ir() {
      return $this->_db->select('SELECT * FROM ir ORDER BY id DESC LIMIT 0, 20');
   }
   public function _insert_ir($datas) {
     $this->_db->insert('ir', $datas);
   }
   public function summe_ir(){
      return $this->_db->select("SELECT count(*) as 'Summe_ir' from ir");
   }
   //KV DB
   public function all_kv() {
      return $this->_db->select('SELECT * FROM kv ORDER BY id DESC LIMIT 0, 20');
   }
   public function _insert_kv($datas) {
     $this->_db->insert('kv', $datas);
   }
   public function summe_kv(){
      return $this->_db->select("SELECT count(*) as 'Summe_kv' from kv");
   }
   //KW DB
   public function all_kw() {
      return $this->_db->select('SELECT * FROM kw ORDER BY id DESC LIMIT 0, 20');
   }
   public function _insert_kw($datas) {
     $this->_db->insert('kw', $datas);
   }
   public function summe_kw(){
      return $this->_db->select("SELECT count(*) as 'Summe_kw' from kw");
   }
   //TC DB
   public function all_tc() {
      return $this->_db->select('SELECT * FROM tc ORDER BY id DESC LIMIT 0, 20');
   }
   public function _insert_tc($datas) {
     $this->_db->insert('tc', $datas);
   }
   public function summe_tc(){
      return $this->_db->select("SELECT count(*) as 'Summe_tc' from tc");
   }
}