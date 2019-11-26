<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');
    }
	public function index()
	{
	     if($this->session->userdata('logged_in')==TRUE){
            redirect('Product');
        }
        else{
            $this->load->view('login');
        }
	}

    public function login(){
        if ($this->input->server('REQUEST_METHOD') === 'POST'){

            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));

            $result=$this->Common_model->login($username,$password);

            if($result){
                $user_data = array(
                    'username' => $result['username'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($user_data);
                redirect('Product');
            }
            else{
                $this->session->set_flashdata('msg','Incorrect Credentials');
                redirect('Auth');
            }

        }
        else{
            $this->index();
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Auth/login'), 'refresh');
    }
}
