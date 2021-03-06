<?php 

  class Edit_user extends CI_Controller { 	
  	public function __construct() { 
	    parent::__construct();
    	$this->load->library('session');
    	$this->load->database();
      $this->load->helper('url');
    	$this->load->helper('form');
	    $this->load->model('user_model');
    } 
  
  	public function index() { 
      if(time() - $this->session->userdata['time'] > 900){
        redirect('logout');
      }
      if($this->session->userdata('loginuser')){
      	$info = $this->user_model->get_info($this->session);
        if($info['username'] == NULL) redirect('/');
      	$data = array(
      		'username' => $info['username'],
      		'name' => $info['name'],
      		'birthday' => $info['birthday'],
      		'address' => $info['address'],
      	);
      	$this->load->view('edit_user_view', $data);
      }
      else{
        redirect("login");
    	}
    } 
  } 

?>