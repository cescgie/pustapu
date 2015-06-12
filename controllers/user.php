<?php

class User extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
		// if angemeldet ---> profile else Benutzer übersicht
      URL::redirect(DIR /products);
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
		if (isset($_POST["name"]) && isset($_POST["pass"]))
		{
		# mache was
			$data['name'] = $_POST["name"];
			$data['block'] = 0;
			if ($this->_model->single($data) != 0) {
				$data['pass'] = $_POST["pass"];
				// pass hashen? --------------------------------------------
				if ( $this->_model->matchexists($data))
				{
					$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
					echo $domain;
					Session::set('username',$data['name']);
					//setcookie("login", $data['name'] ,time()+(3600),  "/");
					Message::set('Sie sind nun als '.Session::get('username').' angemeldet');
				}
				else {
					Message::set('Falsches Passwort');
				}
			}
			else {
				Message::set('Dieser Benutzername existiert nicht oder wurde noch nicht aktiviert');}
		}
		else{
			Message::set('Es wurden nicht alle Werte übergeben');}
	  }
	  else{
		Message::set('Sie sind bereits eingeloggt');
	  }
	  $this->index();
	  //$this->_view->render('header', $data);
      //$this->_view->render('carousel',$data);      
	  Message::show();
      //$this->_view->render('footer_main');
   }
   
   public function logout() {
      if (Session::get('username') && Session::get('username') != '')
	  {
			$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
			Session::destroy();
			Message::set("Ausgeloggt oder Ihre Sitzung ist abgelaufen");
	  }
	  else
			Message::set('Bitte loggen Sie sich zuerst ein');
	  $this->index();
	  Message::show();
   }
}
