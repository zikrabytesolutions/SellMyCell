<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') == TRUE) {
            $this->load->model('Common_model');
            date_default_timezone_set('Asia/Kolkata');
        } else {
            redirect('Auth');
        }
    }


    public function add_state()
    {
        $data['view'] = 'location/add_state';
        $this->load->view('layout/layout', $data);
    }

    public function insert_state()
    {

        $data = array(
            'state_name' => $this->input->post('state'),
        );
        $result = $this->Common_model->add($data, 'cls_state');
        if ($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Inserted Successfully"
            );

            echo json_encode($data);
        } else {
            $data = array(
                'error' => 1,
                'msg' => "Something Went Wrong"
            );
            echo json_encode($data);
        }
    }

    public function view_states()
    {
        $data['result'] = $this->Common_model->fetch_all('cls_state');
        $data['view'] = 'location/view_state';
        $this->load->view('layout/layout', $data);
    }

    public function fetch_state()
    {
        $id = $this->input->post('id');
        $data = $this->Common_model->fetch_single_where('id', $id, 'cls_state');
        echo json_encode($data);
    }

    public function fetch_all_states()
    {
        $data = $this->Common_model->fetch_all('cls_state');
        echo json_encode($data);
    }

    public function update_state()
    {
        $id = $this->input->post('id_u');
        $data = array(
            'state_name' => $this->input->post('state_u')
        );

        $result = $this->Common_model->update('id', $id, 'cls_state', $data);
        if ($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Updated Successfully"
            );

            echo json_encode($data);
        } else {
            $data = array(
                'error' => 1,
                'msg' => "Something Went Wrong"
            );
            echo json_encode($data);
        }
    }

    public function add_city()
    {
        $data['view'] = 'location/add_city';
        $this->load->view('layout/layout', $data);
    }

    public function insert_city()
    {
        $config['upload_path'] = "./upload/cities";
        $config['allowed_types'] = 'jpg|png';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("icon")) {
            $data = array('upload_data' => $this->upload->data());
            $data1 = array(
                'state_id' => $this->input->post('state'),
                'city_name' => $this->input->post('city'),
                'city_icon' => $data['upload_data']['file_name']
            );
            $result = $this->Common_model->add($data1, 'cls_city');
            if ($result) {
                $data = array(
                    'error' => 0,
                    'msg' => "Record Inserted Successfully"
                );

                echo json_encode($data);
            } else {
                $data = array(
                    'error' => 1,
                    'msg' => "Something Went Wrong"
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'error' => 1,
                'msg' => "Upload jpg and png only"
            );
            echo json_encode($data);
        }
    }

    public function view_cities()
    {
        $data['result'] = $this->Common_model->fetch_city();

        $data['view'] = 'location/view_cities';
        $this->load->view('layout/layout', $data);

    }

    public function fetch_city_single()
    {
        $id = $this->input->post('id');

        $data = $this->Common_model->fetch_city_single($id);
        echo json_encode($data);
    }

    public function update_city()
    {
        if (!empty($_FILES['icon_u']['name'])) {
            $config['upload_path'] = "./upload/cities";
            $config['allowed_types'] = 'jpg|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("icon_u")) {
                $data = array('upload_data' => $this->upload->data());
                $id = $this->input->post('id_u');
                $data1 = array(
                    'state_id' => $this->input->post('state_u'),
                    'city_name' => $this->input->post('city_u'),
                    'city_icon' => $data['upload_data']['file_name']
                );


//                $icon=$this->Common_model->fetch_single_where('id',$id,'cls_m_model');
//                $path=FCPATH.'upload/models/'.$icon['icon'];
//                if(file_exists($path)){
//                    unlink($path);
//                }

                $result = $this->Common_model->update('id', $id, 'cls_city', $data1);
                if ($result) {
                    $data = array(
                        'error' => 0,
                        'msg' => "Record Updated Successfully"
                    );

                    echo json_encode($data);
                } else {
                    $data = array(
                        'error' => 1,
                        'msg' => "Something Went Wrong"
                    );
                    echo json_encode($data);
                }
            } else {
                $data = array(
                    'error' => 1,
                    'msg' => "Upload jpg and png only"
                );
                echo json_encode($data);
            }

        } else {
            $id = $this->input->post('id_u');
//            print_r($id);
//            die();
            $data = array(
                'state_id' => $this->input->post('state_u'),
                'city_name' => $this->input->post('city_u'),
            );

            $result = $this->Common_model->update('id', $id, 'cls_city', $data);
            if ($result) {
                $data = array(
                    'error' => 0,
                    'msg' => "Record Updated Successfully"
                );

                echo json_encode($data);
            } else {
                $data = array(
                    'error' => 1,
                    'msg' => "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }
    }

    public function add_pincode()
    {
        $data['view'] = 'location/add_pincode';
        $this->load->view('layout/layout', $data);
    }

    public function fetch_all_cities(){
        $data=$this->Common_model->fetch_all('cls_city');

        echo json_encode($data);
    }

    public function insert_pincode(){
        $this->form_validation->set_rules('pincode','Pincode','exact_length[6]|is_unique[cls_city_pincode.pincode]',array('is_unique' => 'Duplicate Entry'));

        if($this->form_validation->run() == FALSE){
            $data = array(
                'error' => 1,
                'msg' => validation_errors()
            );
            echo json_encode($data);
        }

        else{
            $data = array(
                'city_id' => $this->input->post('city'),
                'pincode' => $this->input->post('pincode'),
            );
            $result = $this->Common_model->add($data, 'cls_city_pincode');
            if ($result) {
                $data = array(
                    'error' => 0,
                    'msg' => "Record Inserted Successfully"
                );

                echo json_encode($data);
            } else {
                $data = array(
                    'error' => 1,
                    'msg' => "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }
    }

    public function view_pincodes(){
        $data['result'] = $this->Common_model->fetch_all_pincodes();
        $data['view'] = 'location/view_pincode';
        $this->load->view('layout/layout', $data);

    }

    public function fetch_pincode_single(){
        $id=$this->input->post('id');
        $data=$this->Common_model->fetch_pincode_single($id);

        echo json_encode($data);
    }

    public function update_pincode()
    {
        $this->form_validation->set_rules('pincode_u','Pincode','exact_length[6]|is_unique[cls_city_pincode.pincode]',array('is_unique' => 'Duplicate Entry'));

        if($this->form_validation->run() == FALSE){
            $data = array(
                'error' => 1,
                'msg' => validation_errors()
            );
            echo json_encode($data);
        }

        else {
            $id = $this->input->post('id_u');
            
                $data = array(
                'city_id' => $this->input->post('city_u'),
                'pincode' => $this->input->post('pincode_u')
            );

            $result = $this->Common_model->update('id', $id, 'cls_city_pincode', $data);
            if ($result) {
                $data = array(
                    'error' => 0,
                    'msg' => "Record Updated Successfully"
                );

                echo json_encode($data);
            } else {
                $data = array(
                    'error' => 1,
                    'msg' => "Something Went Wrong"
                );
                echo json_encode($data);
            }
            }

    
    }

    public function view_users(){
        $data['result'] = $this->Common_model->fetch_all('cls_user');
        $data['view'] = 'location/view_users';
        $this->load->view('layout/layout', $data);
    }


}