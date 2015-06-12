<?php

class User extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
		// if angemeldet ---> profile else Benutzer übersicht
      URL::redirect(DIR /file);
   }

   public function loginForm() {
	  if (!Session::get('username') || Session::get('username') == '')
	  {
		$data['title'] = 'Login';
		$data['form_header'] = 'Login';
		$this->_view->render('header', $data);
		$this->_view->render('user', $data);
		$this->_view->render('footer');
	  }
	  else
	  {
		Message::set('Sie sind bereits eingeloggt');
		$this->index();
		Message::show();
	  }
   }
   
   public function login() {
	  if (!Session::get('username') || Session::get('username') == '')
	  {
		if (isset($_POST["username"]) && isset($_POST["password"]))
		{
			$data['username'] = $_POST["username"];
			if ($this->_model->single($data) != 0) {
				$data['password'] = $_POST["password"];
				// pass hashen? --------------------------------------------
				if ( $this->_model->matchexists($data))
				{
					$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
					echo $domain;
					Session::set('username',$data['username']);
					Message::set('You are logged as '.Session::get('username').'');
				}
				else {
					Message::set('Wrong password');
				}
			}
			else {
				Message::set('There is no username like what you suggest');}
		}
		else{
			Message::set('You have to fill all requiered fields');}
	  }
	  else{
		Message::set('You are already logged as '.Session::get('username'));
	  }
	  $this->index();    
	  Message::show();
   }
   
   public function logout() {
      if (Session::get('username') && Session::get('username') != '')
	  {
			$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
			Session::clear('username');
			Message::set("Your have succesfully logged out");
	  }
	  else
			Message::set('Please login first');
	  $this->index();
	  Message::show();
   }
}
