<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user/user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'id_role' => $row->id_role,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tgl_lahir' => $row->tgl_lahir,
		'no_telp' => $row->no_telp,
		'email' => $row->email,
		'password' => $row->password,
	    );
            $this->load->view('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id_user' => set_value('id_user'),
	    'id_role' => set_value('id_role'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'no_telp' => set_value('no_telp'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	);
        $this->load->view('user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_role' => $this->input->post('id_role',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'id_role' => set_value('id_role', $row->id_role),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
	    );
            $this->load->view('user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'id_role' => $this->input->post('id_role',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->User_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_role', 'id role', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-22 15:51:53 */
/* http://harviacode.com */