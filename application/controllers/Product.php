<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Product extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in')==TRUE){
            $this->load->model('Common_model');
            date_default_timezone_set('Asia/Kolkata');
        }
        else{
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['total_orders'] = $this->Common_model->total_order();
        $data['total_completed_orders'] = $this->Common_model->total_completed_order();
        $data['total_users'] = $this->Common_model->total_users();

        $data['result']=$this->Common_model->fetch_order();

        $data['view']='dashboard';
        $this->load->view('layout/layout',$data);
    }

    public function add_brands(){
        $data['view']='product/add_brands';
        $this->load->view('layout/layout',$data);
    }

    public function insert_brand(){
        $config['upload_path']="./upload/brands";
        $config['allowed_types']='jpg|png|jpeg';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("icon")){
            $data = array('upload_data' => $this->upload->data());
            $data1 = array(
                'brand' => $this->input->post('brand'),
                'icon' => $data['upload_data']['file_name']
            );
            $result= $this->Common_model->add($data1,'cls_m_brand');
            if ($result) {
                $data=array(
                    'error'=> 0,
                    'msg'=> "Record Inserted Successfully"
                );

                echo json_encode($data);
            }
            else{
                $data=array(
                    'error'=> 1,
                    'msg'=> "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }
        else{
            $data=array(
                'error'=> 1,
                'msg'=> "Upload jpg and png only"
            );
            echo json_encode($data);
        }

    }

    public function add_models(){
        $data['view']='product/add_models';
        $this->load->view('layout/layout',$data);
    }

    public function fetch_brand(){
        $result=$this->Common_model->fetch_all('cls_m_brand');

        echo json_encode($result);
    }

    public function insert_model(){

        $config['upload_path']="./upload/models";
        $config['allowed_types']='jpg|png|jpeg';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("icon")){
            $data = array('upload_data' => $this->upload->data());
            $data1 = array(
                'brand_id' => $this->input->post('brand'),
                'model' => $this->input->post('model'),
                'icon' => $data['upload_data']['file_name']
            );
            $result= $this->Common_model->add($data1,'cls_m_model');
            if ($result) {
                $data=array(
                    'error'=> 0,
                    'msg'=> "Record Inserted Successfully"
                );

                echo json_encode($data);
            }
            else{
                $data=array(
                    'error'=> 1,
                    'msg'=> "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }
        else{
            $data=array(
                'error'=> 1,
                'msg'=> "Upload jpg and png only"
            );
            echo json_encode($data);
        }
    }

    public function add_variants(){
        $data['view']='product/add_variant';
        $this->load->view('layout/layout',$data);
    }

    public function fetch_model(){
        $brand_id = $this->input->post('brand_id');
        $result=$this->Common_model->fetch_all_where('brand_id',$brand_id,'cls_m_model');

        echo json_encode($result);
    }

    public function insert_variant(){
        $this->form_validation->set_rules('variant', 'Variant', 'trim|required|is_unique[cls_m_varient.varient]');


        if ($this->form_validation->run() == FALSE) {
            $data=array(
                'error'=> 1,
                'msg'=> "Duplicate Entry"
            );
            echo json_encode($data);
        }

        else {

            $config['upload_path'] = "./upload/variants";
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("icon")) {
                $data = array('upload_data' => $this->upload->data());


                $data1 = array(
                    'model_id' => $this->input->post('model'),
                    'varient' => $this->input->post('variant'),
                    'icon' => $data['upload_data']['file_name']
                );
                $result = $this->Common_model->add($data1, 'cls_m_varient');
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
    }

    public function add_mobiles(){
        $data['view']='product/add_mobile';
        $this->load->view('layout/layout',$data);
    }

    public function fetch_variant(){
        $model_id = $this->input->post('model_id');

        $result=$this->Common_model->fetch_variant($model_id,'cls_m_varient');

        echo json_encode($result);
    }

    public function insert_mobile(){

        $this->form_validation->set_rules('variant', 'Variant', 'trim|required|is_unique[cls_m_mobile.varient_id]');


        if ($this->form_validation->run() == FALSE) {
            $data=array(
                'error'=> 1,
                'msg'=> "Duplicate Entry"
            );
            echo json_encode($data);
        }
        else {

            $config['upload_path'] = "./upload/mobiles";
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("icon")) {
                $data = array('upload_data' => $this->upload->data());
                $data1 = array(
                    'varient_id' => $this->input->post('variant'),
                    'mobile_img' => $data['upload_data']['file_name'],
                    'mobile_title' => $this->input->post('mobile_title'),
                    'processor' => $this->input->post('processor'),
                    'ram_size' => $this->input->post('ram_size'),
                    'internal_memory' => $this->input->post('internal_memory'),
                    'created' => date("Y-m-d H:i:s")

                );
                $result = $this->Common_model->add($data1, 'cls_m_mobile');

                $data2 = array(
                    'mobile_id' => $result,
                    'like_new' => $this->input->post('like_new'),
                    'box_na' => $this->input->post('box_na'),
                    'bill_na' => $this->input->post('bill_na'),
                    'charger_na' => $this->input->post('charger_na'),
                    'earphone_na' => $this->input->post('earphone_na'),
                    'warranty_below_3' => $this->input->post('warranty_below_3'),
                    'warranty_3_6' => $this->input->post('warranty_3_6'),
                    'warranty_6_11' => $this->input->post('warranty_6_11'),
                    'warranty_above_11' => $this->input->post('warranty_above_11'),
                    'glass_broke' => $this->input->post('glass_broke'),
                    'display_crack' => $this->input->post('display_crack'),
                    'front_camera_fault' => $this->input->post('front_camera_fault'),
                    'back_camera_fault' => $this->input->post('back_camera_fault'),
                    'wifi_fault' => $this->input->post('wifi_fault'),
                    'battery_fault' => $this->input->post('battery_fault'),
                    'speaker_fault' => $this->input->post('speaker_fault'),
                    'mic_fault' => $this->input->post('mic_fault'),
                    'volumn_btn_fault' => $this->input->post('volumn_btn_fault'),
                    'charging_fault' => $this->input->post('charging_fault'),
                    'power_button_fault' => $this->input->post('power_button_fault'),
                    'fingerprint_fault' => $this->input->post('fingerprint_fault'),
                    'face_recog_fault' => $this->input->post('face_recog_fault'),
                    'looking_new' => $this->input->post('looking_new'),
                    'looking_good' => $this->input->post('looking_good'),
                    'looking_average' => $this->input->post('looking_average'),
                    'looking_average_below' => $this->input->post('looking_average_below')
                );

                $result2 = $this->Common_model->add($data2, 'cls_m_pricing');

                if ($result2) {
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
    }

    public function view_brands(){
        $data['result']=$this->Common_model->fetch_brands('cls_m_brand');
        $data['view']='product/view_brands';
        $this->load->view('layout/layout',$data);
    }

    public function fetch_brand_details(){
        $id=$this->input->post('id');
        $data=$this->Common_model->fetch_single_where('id',$id,'cls_m_brand');

        echo json_encode($data);
    }

    public function update_brand(){
        if (!empty($_FILES['icon_u']['name']))
        {


            $config['upload_path'] = "./upload/brands";
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("icon_u")) {
                $data = array('upload_data' => $this->upload->data());
                $id=$this->input->post('id_u');
                $data1 = array(
                    'brand' => $this->input->post('brand_u'),
                    'icon' => $data['upload_data']['file_name']
                );


//                $icon=$this->Common_model->fetch_single_where('id',$id,'cls_m_brand');
//                $path='./upload/brands/'.$icon['icon'];
//                if(file_exists($path)){
//                    unlink($path);
//                }

                $result = $this->Common_model->update('id',$id,'cls_m_brand',$data1);
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

        }

        else{
            $id=$this->input->post('id_u');
            $data = array(
                'brand' => $this->input->post('brand_u'),
            );

            $result = $this->Common_model->update('id',$id,'cls_m_brand',$data);
            if ($result) {
                $data = array(
                    'error' => 0,
                    'msg' => "Record Updated Successfully"
                );

                echo json_encode($data);
            }
            else {
                $data = array(
                    'error' => 1,
                    'msg' => "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }
    }
    
    public function delete(){
        $id=$this->input->post('id');
        $table_name=$this->input->post('table_name');
        
        // $image_path=$this->input->post('path');
        // $icon=$this->Common_model->fetch_single_where('id',$id,$table_name);
        // $path="./upload/banners/" . $icon['slider_img'];

        // unlink($path);
        // print_r($path);
        $result=$this->Common_model->normal_delete('id',$id,$table_name);
        if($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Deleted Successfully"
            );

            echo json_encode($data);
        }
    }
    
    public function delete_all(){
        $id=$this->input->post('id');
        $table_name=$this->input->post('table_name');
       

        $result=$this->Common_model->normal_delete_all($id,$table_name);
        if($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Deleted Successfully"
            );

            echo json_encode($data);
        }
    }

    public function common_delete(){
        $id=$this->input->post('id');
        $table_name=$this->input->post('table_name');
        $data = array(
            'is_deleted' => 1
            );
//        $image_path=$this->input->post('path');
//        $icon=$this->Common_model->fetch_single_where('id',$id,$table_name);
//        $path="../../upload/brands/" . $icon['icon'];

//        unlink($path);
//        print_r($path);
        $result=$this->Common_model->delete('id',$id,$table_name,$data);
        if($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Deleted Successfully"
            );

            echo json_encode($data);
        }
    }
    
     public function common_mobile_delete(){
        $id=$this->input->post('id');

//        $image_path=$this->input->post('path');
//        $icon=$this->Common_model->fetch_single_where('id',$id,$table_name);
//        $path="../../upload/brands/" . $icon['icon'];

//        unlink($path);
//        print_r($path);
        $data = array(
            'is_deleted' => 1
            );
        $result=$this->Common_model->delete('id',$id,'cls_m_mobile',$data);
        $result2=$this->Common_model->delete('mobile_id',$id,'cls_m_pricing',$data);
        if($result && $result2) {
            $data = array(
                'error' => 0,
                'msg' => "Record Deleted Successfully"
            );

            echo json_encode($data);
        }
    }

    public function common_mobile_multi_delete(){
        $id=$this->input->post('id');
        
        $data = array(
            'is_deleted' => 1
            );
        $result=$this->Common_model->delete_all($id,'cls_m_mobile', $data);
        $result2=$this->Common_model->delete_all($id,'cls_m_pricing', $data);
        if($result && $result2) {
            $data = array(
                'error' => 0,
                'msg' => "Record Deleted Successfully"
            );

            echo json_encode($data);
        }
    }
    
    public function common_multi_delete(){
        $id=$this->input->post('id');
        $table_name=$this->input->post('table_name');
        $data = array(
            'is_deleted' => 1
            );

        $result=$this->Common_model->delete_all($id,$table_name,$data);
        if($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Deleted Successfully"
            );

            echo json_encode($data);
        }
    }

    public function view_models(){
        $data['result']=$this->Common_model->fetch_model();
        $data['view']='product/view_models';
        $this->load->view('layout/layout',$data);
    }

    public function fetch_model_details(){
        $id=$this->input->post('id');
        $data=$this->Common_model->fetch_model_single($id);

        echo json_encode($data);
    }

   public function update_model(){
        if (!empty($_FILES['icon_u']['name']))
        {
            $config['upload_path'] = "./upload/models";
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("icon_u")) {
                $data = array('upload_data' => $this->upload->data());
                $id=$this->input->post('id_u');
                $data1 = array(
                    'brand_id' => $this->input->post('brand_h'),
                    'model' => $this->input->post('model_u'),
                    'icon' => $data['upload_data']['file_name']
                );


//                $icon=$this->Common_model->fetch_single_where('id',$id,'cls_m_model');
//                $path=FCPATH.'upload/models/'.$icon['icon'];
//                if(file_exists($path)){
//                    unlink($path);
//                }

                $result = $this->Common_model->update('id',$id,'cls_m_model',$data1);
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

        }

        else{
            $id=$this->input->post('id_u');
            $data = array(
                'brand_id' => $this->input->post('brand_h'),
                'model' => $this->input->post('model_u'),
            );

            $result = $this->Common_model->update('id',$id,'cls_m_model',$data);
            if ($result) {
                $data = array(
                    'error' => 0,
                    'msg' => "Record Updated Successfully"
                );

                echo json_encode($data);
            }
            else {
                $data = array(
                    'error' => 1,
                    'msg' => "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }
    }

    public function view_variants(){
        $data['result']=$this->Common_model->fetch_variant_all();
//        print_r($data['result']);
//        die();
        $data['view']='product/view_variants';
        $this->load->view('layout/layout',$data);
    }

    public function fetch_variant_details(){
        $id=$this->input->post('id');
        $data=$this->Common_model->fetch_variant_single($id);

        echo json_encode($data);
    }

    public function update_variant(){
        if (!empty($_FILES['icon_u']['name']))
        {
            $config['upload_path'] = "./upload/variants";
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("icon_u")) {
                $data = array('upload_data' => $this->upload->data());
                $id=$this->input->post('id_u');
                $data1 = array(
                    'model_id' => $this->input->post('model_h'),
                    'varient' => $this->input->post('variant_u'),
                    'icon' => $data['upload_data']['file_name']
                );


//                $icon=$this->Common_model->fetch_single_where('id',$id,'cls_m_model');
//                $path=FCPATH.'upload/models/'.$icon['icon'];
//                if(file_exists($path)){
//                    unlink($path);
//                }

                $result = $this->Common_model->update('id',$id,'cls_m_varient',$data1);
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

        }

        else{
            $id=$this->input->post('id_u');
            $data = array(
                'model_id' => $this->input->post('model_h'),
                'varient' => $this->input->post('variant_u')
            );

            $result = $this->Common_model->update('id',$id,'cls_m_varient',$data);
            if ($result) {
                $data = array(
                    'error' => 0,
                    'msg' => "Record Updated Successfully"
                );

                echo json_encode($data);
            }
            else {
                $data = array(
                    'error' => 1,
                    'msg' => "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }
    }
    public function view_mobiles(){
        $data['result']=$this->Common_model->fetch_mobiles_all();
        $data['view']='product/view_mobiles';
        $this->load->view('layout/layout',$data);
    }

    public function fetch_mobile_details(){
        $id=$this->input->post('id');
        $data=$this->Common_model->fetch_mobile_single($id);

        echo json_encode($data);
    }

   public function update_mobile(){

            if (!empty($_FILES['icon_u']['name']))
            {
                $config['upload_path'] = "./upload/mobiles";
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("icon_u")) {
                    $data = array('upload_data' => $this->upload->data());
                    $id=$this->input->post('id_u');
                    $data1 = array(

                        'varient_id' => $this->input->post('variant_h'),
                        'mobile_img' => $data['upload_data']['file_name'],
                        'mobile_title' => $this->input->post('title_u'),
                        'processor' => $this->input->post('processor_u'),
                        'ram_size' => $this->input->post('ram_u'),
                        'internal_memory' => $this->input->post('internal_u'),
                    );

                    $data2 = array(

                        'like_new' => $this->input->post('like_new_u'),
                        'box_na' => $this->input->post('box_na_u'),
                        'bill_na' => $this->input->post('bill_na_u'),
                        'charger_na' => $this->input->post('charger_na_u'),
                        'earphone_na' => $this->input->post('earphone_na_u'),
                        'warranty_below_3' => $this->input->post('warranty_below_3_u'),
                        'warranty_3_6' => $this->input->post('warranty_3_6_u'),
                        'warranty_6_11' => $this->input->post('warranty_6_11_u'),
                        'warranty_above_11' => $this->input->post('warranty_above_11_u'),
                        'glass_broke' => $this->input->post('glass_broke_u'),
                        'display_crack' => $this->input->post('display_crack_u'),
                        'front_camera_fault' => $this->input->post('front_camera_fault_u'),
                        'back_camera_fault' => $this->input->post('back_camera_fault_u'),
                        'wifi_fault' => $this->input->post('wifi_fault_u'),
                        'battery_fault' => $this->input->post('battery_fault_u'),
                        'speaker_fault' => $this->input->post('speaker_fault_u'),
                        'mic_fault' => $this->input->post('mic_fault_u'),
                        'volumn_btn_fault' => $this->input->post('volumn_btn_fault_u'),
                        'charging_fault' => $this->input->post('charging_fault_u'),
                        'power_button_fault' => $this->input->post('power_button_fault_u'),
                        'fingerprint_fault' => $this->input->post('fingerprint_fault_u'),
                        'face_recog_fault' => $this->input->post('face_recog_fault_u'),
                        'looking_new' => $this->input->post('looking_new_u'),
                        'looking_good' => $this->input->post('looking_good_u'),
                        'looking_average' => $this->input->post('looking_average_u'),
                        'looking_average_below' => $this->input->post('looking_average_below_u'),
                    );

                    $result = $this->Common_model->update('id',$id,'cls_m_mobile',$data1);
                    $result2 = $this->Common_model->update('mobile_id',$id,'cls_m_pricing',$data2);


                    if ($result && $result2) {
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

            }

            else{
                $id=$this->input->post('id_u');
                $data = array(

                    'varient_id' => $this->input->post('variant_h'),
                    'mobile_title' => $this->input->post('title_u'),
                    'processor' => $this->input->post('processor_u'),
                    'ram_size' => $this->input->post('ram_u'),
                    'internal_memory' => $this->input->post('internal_u')
                );

                $data1 = array(

                    'like_new' => $this->input->post('like_new_u'),
                    'box_na' => $this->input->post('box_na_u'),
                    'bill_na' => $this->input->post('bill_na_u'),
                    'charger_na' => $this->input->post('charger_na_u'),
                    'earphone_na' => $this->input->post('earphone_na_u'),
                    'warranty_below_3' => $this->input->post('warranty_below_3_u'),
                    'warranty_3_6' => $this->input->post('warranty_3_6_u'),
                    'warranty_6_11' => $this->input->post('warranty_6_11_u'),
                    'warranty_above_11' => $this->input->post('warranty_above_11_u'),
                    'glass_broke' => $this->input->post('glass_broke_u'),
                    'display_crack' => $this->input->post('display_crack_u'),
                    'front_camera_fault' => $this->input->post('front_camera_fault_u'),
                    'back_camera_fault' => $this->input->post('back_camera_fault_u'),
                    'wifi_fault' => $this->input->post('wifi_fault_u'),
                    'battery_fault' => $this->input->post('battery_fault_u'),
                    'speaker_fault' => $this->input->post('speaker_fault_u'),
                    'mic_fault' => $this->input->post('mic_fault_u'),
                    'volumn_btn_fault' => $this->input->post('volumn_btn_fault_u'),
                    'charging_fault' => $this->input->post('charging_fault_u'),
                    'power_button_fault' => $this->input->post('power_button_fault_u'),
                    'fingerprint_fault' => $this->input->post('fingerprint_fault_u'),
                    'face_recog_fault' => $this->input->post('face_recog_fault_u'),
                    'looking_new' => $this->input->post('looking_new_u'),
                    'looking_good' => $this->input->post('looking_good_u'),
                    'looking_average' => $this->input->post('looking_average_u'),
                    'looking_average_below' => $this->input->post('looking_average_below_u'),
                );

                $result = $this->Common_model->update('id',$id,'cls_m_mobile',$data);
                $result2 = $this->Common_model->update('mobile_id',$id,'cls_m_pricing',$data1);

                if ($result && $result2) {
                    $data = array(
                        'error' => 0,
                        'msg' => "Record Updated Successfully"
                    );

                    echo json_encode($data);
                }
                else {
                    $data = array(
                        'error' => 1,
                        'msg' => "Something Went Wrong"
                    );
                    echo json_encode($data);
                }
            }

    }




    public function export_brand()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'brand');
        $sheet->setCellValue('B1', 'icon');
        $writer = new Xlsx($spreadsheet);
        $filename = 'sample_brand';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $writer->save('php://output'); // download file
    }

    public function import_brand(){

        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['excel_file']['name']) && in_array($_FILES['excel_file']['type'], $file_mimes)) {

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray('');

            $main_data=array();

            for($i=0;$i<count($sheetData);$i++){
                if($sheetData[$i][0] != NULL) {
                    $data = array(
                        'brand' => $sheetData[$i][0],
                        'icon' => $sheetData[$i][1],
                    );
                    array_push($main_data, $data);
                }
            }

            $result=$this->Common_model->import_excel('cls_m_brand',$main_data);
            if($result){
                $data=array(
                    'error'=> 0,
                    'msg'=> "Record Inserted Successfully"
                );

                echo json_encode($data);
            }

            else{
                $data=array(
                    'error'=> 1,
                    'msg'=> "Something went wrong"
                );

                echo json_encode($data);
            }
        }

        else{
            $data=array(
                'error'=> 1,
                'msg'=> "Enter in the specified excel format only"
            );

            echo json_encode($data);
        }
    }

    public function export_model($brand)
    {

            $result=$this->Common_model->fetch_all_where('id',$brand,'cls_m_brand');

            $main_data=array(['brand','brand_id','model_name','icon']);

            foreach($result as $row){

                $data=[$row['brand'], $row['id'], ''];

                array_push($main_data,$data);
            }


            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet()->fromArray(
                $main_data,  // The data to set
                '',        // Array values with this value will not be set
                'A1'         // Top left coordinate of the worksheet range where
            //    we want to set these values (default is A1)
            );


            $writer = new Xlsx($spreadsheet);
            $filename = 'sample_model';

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output'); // download file


    }

    public function import_model(){

        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['excel_file']['name']) && in_array($_FILES['excel_file']['type'], $file_mimes)) {

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray('');

            $main_data=array();

            for($i=0;$i<count($sheetData);$i++){
                if($sheetData[$i][1] != NULL && $sheetData[$i][2] != NULL) {
                    $data = array(
                        'brand_id' => $sheetData[$i][1],
                        'model' => $sheetData[$i][2],
                        'icon' => $sheetData[$i][3],
                    );
                    array_push($main_data, $data);
                }
            }



            $result=$this->Common_model->import_excel('cls_m_model',$main_data);
            if($result){
                $data=array(
                    'error'=> 0,
                    'msg'=> "Record Inserted Successfully"
                );

                echo json_encode($data);
            }

            else{
                $data=array(
                    'error'=> 1,
                    'msg'=> "Something went wrong"
                );

                echo json_encode($data);
            }
        }

        else{
            $data=array(
                'error'=> 1,
                'msg'=> "Enter in the specified excel format only"
            );

            echo json_encode($data);
        }
    }

    public function export_variant($brand){

        $result=$this->Common_model->fetch_all_where('brand_id',$brand,'cls_m_model');

        $main_data=array(['model_name','model_id','variant','icon']);

        foreach($result as $row){

            $data=[$row['model'], $row['id']];

            array_push($main_data,$data);
        }


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()->fromArray(
            $main_data,  // The data to set
            '',        // Array values with this value will not be set
            'A1'         // Top left coordinate of the worksheet range where
        //    we want to set these values (default is A1)
        );


        $writer = new Xlsx($spreadsheet);
        $filename = 'sample_variant';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file
    }

    public function import_variant(){
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['excel_file']['name']) && in_array($_FILES['excel_file']['type'], $file_mimes)) {

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray('');

            $main_data=array();

            for($i=0;$i<count($sheetData);$i++){
                if($sheetData[$i][1] != NULL && $sheetData[$i][2] != NULL) {
                    $data = array(
                        'model_id' => $sheetData[$i][1],
                        'varient' => $sheetData[$i][2],
                        'icon' => $sheetData[$i][3],
                    );
                    array_push($main_data, $data);
                }
            }



            $result=$this->Common_model->import_excel('cls_m_varient',$main_data);
            if($result){
                $data=array(
                    'error'=> 0,
                    'msg'=> "Record Inserted Successfully"
                );

                echo json_encode($data);
            }

            else{
                $data=array(
                    'error'=> 1,
                    'msg'=> "Something went wrong"
                );

                echo json_encode($data);
            }
        }

        else{
            $data=array(
                'error'=> 1,
                'msg'=> "Enter in the specified excel format only"
            );

            echo json_encode($data);
        }
    }

    public function export_mobile($brand)
    {
        $result=$this->Common_model->brand_wise_variant($brand);

        $main_data=array(['model','variant','variant_id','title','processor','ram','internal_memory','like_new','box_na','bill_na','charger_na','earphone_na','warranty_below_3','warranty_3_6','warranty_6_11','warranty_above_11','glass_broke','display_crack','front_camera_fault','back_camera_fault','wifi_fault','battery_fault','speaker_fault','mic_fault','volumn_btn_fault','charging_fault','power_button_fault','fingerprint_fault','face_recog_fault','looking_new','looking_good','looking_average','looking_average_below','icon']);

        foreach($result as $row){

            $data=[$row['model'], $row['varient'], $row['varient_id']];

            array_push($main_data,$data);
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()->fromArray(
            $main_data,  // The data to set
            '',        // Array values with this value will not be set
            'A1'         // Top left coordinate of the worksheet range where
        //    we want to set these values (default is A1)
        );


        $writer = new Xlsx($spreadsheet);
        $filename = 'sample_mobile';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file
    }

    public function import_mobile(){

        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['excel_file']['name']) && in_array($_FILES['excel_file']['type'], $file_mimes)) {

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
            $sheetData = $spreadsheet->getActiveSheet()->toArray('');



            for($i=0;$i<count($sheetData);$i++){
                if($i==0){

                }
                else {
                    if ($sheetData[$i][2] != NULL && $sheetData[$i][3] != NULL && $sheetData[$i][4] != NULL && $sheetData[$i][5] != NULL ) {
                        $data = array(

                            'varient_id' => $sheetData[$i][2],
                            'mobile_img' => $sheetData[$i][33],
                            'mobile_title' => $sheetData[$i][3],
                            'processor' => $sheetData[$i][4],
                            'ram_size' => $sheetData[$i][5],
                            'internal_memory' => $sheetData[$i][6],
                            'created' => date("Y-m-d H:i:s")

                        );


                        $result = $this->Common_model->add($data,'cls_m_mobile');

                        $data2 = array(
                            'mobile_id' => $result,
                            'like_new' =>$sheetData[$i][7],
                            'box_na' => $sheetData[$i][8],
                            'bill_na' => $sheetData[$i][9],
                            'charger_na' => $sheetData[$i][10],
                            'earphone_na' => $sheetData[$i][11],
                            'warranty_below_3' => $sheetData[$i][12],
                            'warranty_3_6' => $sheetData[$i][13],
                            'warranty_6_11' => $sheetData[$i][14],
                            'warranty_above_11' => $sheetData[$i][15],
                            'glass_broke' => $sheetData[$i][16],
                            'display_crack' => $sheetData[$i][17],
                            'front_camera_fault' => $sheetData[$i][18],
                            'back_camera_fault' => $sheetData[$i][19],
                            'wifi_fault' => $sheetData[$i][20],
                            'battery_fault' => $sheetData[$i][21],
                            'speaker_fault' => $sheetData[$i][22],
                            'mic_fault' => $sheetData[$i][23],
                            'volumn_btn_fault' => $sheetData[$i][24],
                            'charging_fault' => $sheetData[$i][25],
                            'power_button_fault' => $sheetData[$i][26],
                            'fingerprint_fault' => $sheetData[$i][27],
                            'face_recog_fault' => $sheetData[$i][28],
                            'looking_new' => $sheetData[$i][29],
                            'looking_good' => $sheetData[$i][30],
                            'looking_average' => $sheetData[$i][31],
                            'looking_average_below' => $sheetData[$i][32],
                        );

                        $result2 = $this->Common_model->add($data2,'cls_m_pricing');
                    }
                }
            }


            if($result2){
                $data=array(
                    'error'=> 0,
                    'msg'=> "Record Inserted Successfully"
                );

                echo json_encode($data);
            }

            else{
                $data=array(
                    'error'=> 1,
                    'msg'=> "Something went wrong"
                );

                echo json_encode($data);
            }
        }

        else{
            $data=array(
                'error'=> 1,
                'msg'=> "Enter in the specified excel format only"
            );

            echo json_encode($data);
        }
    }

    public function view_orders(){
        $data['result'] = $this->Common_model->all_orders();
        $data['view']='product/view_orders';
        $this->load->view('layout/layout',$data);

    }
    
    public function fetch_order_for_copy(){
        $id=$this->input->post('id');
        $result=$this->Common_model->all_orders_where($id);

        echo json_encode($result);
    }

    public function update_processing(){

        $id = $this->input->post('id');
        $status= $this->input->post('status');

        if($status == 1){
            $data=array(
                'processing' => $status
            );
        }

        else if($status == 0){
            $data=array(
                'processing' => $status,
                'onpickup' => 0,
                'completed' => 0
            );
        }


        $result = $this->Common_model->update('id',$id,'cls_order',$data);

        if ($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Updated Successfully"
            );

            echo json_encode($data);
        }
    }

    public function update_pickup(){
        $status = $this->input->post('status');
        $id = $this->input->post('id');

        if($status == 1){
            $data=array(
                'onpickup' => $status,
                'processing' => 1,
            );
        }

        else if($status == 0){
            $data=array(
                'onpickup' => $status,
                'completed' => 0
            );
        }

        $result = $this->Common_model->update('id',$id,'cls_order',$data);

        if ($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Updated Successfully"
            );

            echo json_encode($data);
        }
    }

    public function update_completed(){

        $status = $this->input->post('status');
        $id = $this->input->post('id');

        $data=array(
            'completed' => $status,
            'processing' => 1,
            'onpickup' => 1,
        );

        $result = $this->Common_model->update('id',$id,'cls_order',$data);

        if ($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Updated Successfully"
            );

            echo json_encode($data);
        }
    }

    public function view_banners(){
        $data['result']=$this->Common_model->fetch_all('cls_slider');
        $data['view']='product/view_banner';
        $this->load->view('layout/layout',$data);
    }

    public function insert_banner(){
        $config['upload_path']="./upload/banners";
        $config['allowed_types']='jpg|png|jpeg';
        $this->load->library('upload',$config);
        if($this->upload->do_upload("icon")){
            $data = array('upload_data' => $this->upload->data());
            $data1 = array(
                'slider_img' => $data['upload_data']['file_name']
            );
            $result= $this->Common_model->add($data1,'cls_slider');
            if ($result) {
                $data=array(
                    'error'=> 0,
                    'msg'=> "Record Inserted Successfully"
                );

                echo json_encode($data);
            }
            else{
                $data=array(
                    'error'=> 1,
                    'msg'=> "Something Went Wrong"
                );
                echo json_encode($data);
            }
        }
        else{
            $data=array(
                'error'=> 1,
                'msg'=> "Upload jpg and png only"
            );
            echo json_encode($data);
        }
    }
    
    public function order_delete(){
        $id=$this->input->post('id');

        $data=array(
            'is_deleted' => 1
        );
        $result = $this->Common_model->update('id',$id,'cls_order',$data);

        if($result) {
            $data = array(
                'error' => 0,
                'msg' => "Record Deleted Successfully"
            );

            echo json_encode($data);
        }

    }


}
