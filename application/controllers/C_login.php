<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller { 
	public function __construct(){
		parent::__construct();
		$this->load->model('M_user');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('v_login');
	}

	public function do_login(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$user = $this->M_user->getUser($email);

		print_r($user);
	}
}
