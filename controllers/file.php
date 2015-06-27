<?php

class File extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      /*
      *This will be used as page title.
      */
      $data['title'] = 'Adserverdaten';

      /*
      *Query for intialize records in database.
      */
      $data['sum_cf'] = $this->_model->summe_cf();
      //ga query
      $data['sum_ga'] = $this->_model->summe_ga();
      /*$data['all_ip_ga'] = $this->_model->all_ip_ga();
      $data['ip_ga'] = count($data['all_ip_ga']);
      $data['all_user_ga'] = $this->_model->all_user_ga();
      $data['user_ga'] = count($data['all_user_ga']);
      */
      $data['sum_gl'] = $this->_model->summe_gl();
      $data['sum_ir'] = $this->_model->summe_ir();
      $data['sum_kv'] = $this->_model->summe_kv();
      $data['sum_kw'] = $this->_model->summe_kw();
      $data['sum_tc'] = $this->_model->summe_tc();
  
      /*
      *Set recent date & time.
      */
      $data['datum'] = date("Y-m-d H:i:s");
      /*
      *Call all views that will be show as index 
      */
      $this->_view->render('header', $data);
      $this->_view->render('file', $data);
      $this->_view->render('footer');
   }
} // end of class