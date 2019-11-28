<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model
{

    function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('cls_login');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }

    }

    function add($data, $table_name)
    {
        try {
            $this->db->insert($table_name, $data);
            return $this->db->insert_id();
        } catch (Exception $e) {
            return FALSE;
        }
    }
    
    function fetch_brands($table_name)
    {
        $this->db->where('is_deleted', 0);
        $query = $this->db->get($table_name);
        return $query->result_array();
    }

    function fetch_all($table_name)
    {
        // $this->db->where('is_deleted', 0);
        $query = $this->db->get($table_name);
        return $query->result_array();
    }

    function fetch_all_where($table_id, $id, $table_name)
    {
        $this->db->where($table_id, $id);
        $query = $this->db->get($table_name);
        return $query->result_array();
    }

    function fetch_single_where($table_id, $id, $table_name)
    {
        $this->db->where($table_id, $id);
        $query = $this->db->get($table_name);
        return $query->row_array();
    }

    function fetch_variant($model_id, $table_name)
    {
        $this->db->where('model_id', $model_id);
        $query = $this->db->get($table_name);
        return $query->result_array();
    }

    function update($table_id, $id, $table_name, $data)
    {
        try {
            $this->db->where($table_id, $id);
            $this->db->update($table_name, $data);
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    
    function normal_delete($table_id,$id,$table_name)
    {
        try {
        $this->db->where($table_id, $id);
        $this->db->delete($table_name);
        return TRUE;
        }
        catch (Exception $e) {
            return FALSE;
        }
        
    }

    function normal_delete_all($id,$table_name)
    {
        try {
            for($i=0;$i<count($id);$i++){
                $this->db->where('id', $id[$i]);
                $this->db->delete($table_name);
            }
            return TRUE;

        } catch (Exception $e) {
            return FALSE;
        }
    }

    function delete($table_id, $id, $table_name, $data)
    {
        try {
            $this->db->where($table_id, $id);
            $this->db->update($table_name, $data);
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }
    
     function delete_all($id,$table_name, $data)
    {
        try {
            for($i=0;$i<count($id);$i++){
                $this->db->where('id', $id[$i]);
                $this->db->update($table_name,$data);
            }
            return TRUE;

        } catch (Exception $e) {
            return FALSE;
        }
    }

    function fetch_model()
    {
        $this->db->select('cls_m_model.id,cls_m_brand.brand, cls_m_brand.id as brand_id, cls_m_model.model,cls_m_model.icon');
        $this->db->where('cls_m_model.is_deleted', 0);
        $this->db->from('cls_m_model');
        $this->db->join('cls_m_brand', 'cls_m_model.brand_id = cls_m_brand.id');
        $query = $this->db->get();
        return $query->result_array();
    }


    function brand_wise_variant($brand){
        $this->db->select('cls_m_model.model, cls_m_varient.id as varient_id,cls_m_varient.varient');
        $this->db->from('cls_m_varient');
        $this->db->join('cls_m_model', 'cls_m_varient.model_id = cls_m_model.id');
        $this->db->join('cls_m_brand', 'cls_m_model.brand_id = cls_m_brand.id');
        $this->db->where('cls_m_brand.id',$brand);
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_model_single($id)
    {
        $this->db->select('cls_m_model.brand_id,cls_m_model.id,cls_m_brand.brand, cls_m_model.model,cls_m_model.icon');
        $this->db->from('cls_m_model');
        $this->db->join('cls_m_brand', 'cls_m_model.brand_id = cls_m_brand.id');
        $this->db->where('cls_m_model.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function fetch_variant_all()
    {
        $this->db->select('cls_m_varient.id,cls_m_brand.brand, cls_m_model.model, cls_m_varient.varient,cls_m_varient.icon');
        $this->db->where('cls_m_varient.is_deleted', 0);
        $this->db->from('cls_m_varient');
        $this->db->join('cls_m_model', 'cls_m_varient.model_id = cls_m_model.id');
        $this->db->join('cls_m_brand', 'cls_m_model.brand_id = cls_m_brand.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_variant_single($id)
    {
        $this->db->select('cls_m_varient.id, cls_m_varient.varient, cls_m_varient.icon, cls_m_model.id as model_id, cls_m_model.model, cls_m_brand.id as brand_id, cls_m_brand.brand');
        $this->db->from('cls_m_varient');
        $this->db->join('cls_m_model', 'cls_m_varient.model_id = cls_m_model.id');
        $this->db->join('cls_m_brand', 'cls_m_model.brand_id = cls_m_brand.id');
        $this->db->where('cls_m_varient.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function fetch_mobiles_all()
    {
        $this->db->select('cls_m_mobile.id as mobile_id, cls_m_mobile.mobile_title, cls_m_mobile.processor, cls_m_mobile.ram_size, cls_m_mobile.internal_memory,  cls_m_mobile.mobile_img, cls_m_varient.varient, cls_m_model.model, cls_m_brand.brand, cls_m_pricing.like_new, cls_m_pricing.box_na, cls_m_pricing.bill_na,cls_m_pricing.charger_na,cls_m_pricing.earphone_na,cls_m_pricing.warranty_below_3,cls_m_pricing.warranty_3_6,cls_m_pricing.warranty_6_11,cls_m_pricing.warranty_above_11,cls_m_pricing.glass_broke,cls_m_pricing.display_crack,cls_m_pricing.front_camera_fault,cls_m_pricing.back_camera_fault,cls_m_pricing.battery_fault,cls_m_pricing.wifi_fault,cls_m_pricing.speaker_fault,cls_m_pricing.mic_fault,cls_m_pricing.volumn_btn_fault,cls_m_pricing.charging_fault,cls_m_pricing.power_button_fault,cls_m_pricing.fingerprint_fault,cls_m_pricing.face_recog_fault,cls_m_pricing.looking_new,cls_m_pricing.looking_good,cls_m_pricing.looking_average,cls_m_pricing.looking_average_below');
        $this->db->where('cls_m_mobile.is_deleted',0);
        $this->db->from('cls_m_mobile');
        $this->db->join('cls_m_varient', 'cls_m_mobile.varient_id = cls_m_varient.id');
        $this->db->join('cls_m_model', 'cls_m_varient.model_id = cls_m_model.id');
        $this->db->join('cls_m_brand', 'cls_m_model.brand_id = cls_m_brand.id');
        $this->db->join('cls_m_pricing', 'cls_m_mobile.id = cls_m_pricing.mobile_id');
        $this->db->order_by('cls_m_brand.id', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_mobile_single($id)
    {
        $this->db->select('cls_m_mobile.id, cls_m_mobile.mobile_title, cls_m_mobile.processor, cls_m_mobile.ram_size, cls_m_mobile.internal_memory,  cls_m_mobile.mobile_img, cls_m_pricing.like_new, cls_m_pricing.box_na, cls_m_pricing.bill_na, cls_m_pricing.charger_na,cls_m_pricing.earphone_na,cls_m_pricing.warranty_below_3,cls_m_pricing.warranty_3_6,cls_m_pricing.warranty_6_11,cls_m_pricing.warranty_above_11,cls_m_pricing.glass_broke,cls_m_pricing.display_crack,cls_m_pricing.front_camera_fault,cls_m_pricing.back_camera_fault,cls_m_pricing.wifi_fault,cls_m_pricing.battery_fault,cls_m_pricing.speaker_fault,cls_m_pricing.mic_fault,cls_m_pricing.volumn_btn_fault,cls_m_pricing.charging_fault,cls_m_pricing.power_button_fault,cls_m_pricing.fingerprint_fault,cls_m_pricing.face_recog_fault,cls_m_pricing.looking_new,cls_m_pricing.looking_good,cls_m_pricing.looking_average,cls_m_pricing.looking_average_below, cls_m_varient.id as varient_id, cls_m_varient.varient, cls_m_model.id as model_id, cls_m_model.model, cls_m_brand.id as brand_id, cls_m_brand.brand');
        $this->db->from('cls_m_mobile');
        $this->db->join('cls_m_pricing', 'cls_m_mobile.id = cls_m_pricing.mobile_id');
        $this->db->join('cls_m_varient', 'cls_m_mobile.varient_id = cls_m_varient.id');
        $this->db->join('cls_m_model', 'cls_m_varient.model_id = cls_m_model.id');
        $this->db->join('cls_m_brand', 'cls_m_model.brand_id = cls_m_brand.id');
        $this->db->where('cls_m_mobile.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function fetch_city()
    {
        $this->db->select('cls_city.id as city_id, cls_city.city_name, cls_city.city_icon, cls_state.id as state_id, cls_state.state_name');
        $this->db->from('cls_city');
        $this->db->join('cls_state', 'cls_city.state_id = cls_state.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_city_single($id)
    {
        $this->db->select('cls_city.id as city_id, cls_city.city_name, cls_city.city_icon, cls_state.id as state_id, cls_state.state_name');
        $this->db->from('cls_city');
        $this->db->join('cls_state', 'cls_city.state_id = cls_state.id');
        $this->db->where('cls_city.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function fetch_all_pincodes()
    {
        $this->db->select('cls_city_pincode.id as pin_id, cls_city_pincode.pincode, cls_city.city_name');
        $this->db->from('cls_city_pincode');
        $this->db->join('cls_city', 'cls_city_pincode.city_id = cls_city.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    function fetch_pincode_single($id)
    {
        $this->db->select('cls_city_pincode.id as pin_id, cls_city_pincode.pincode, cls_city.id as city_id, cls_city.city_name');
        $this->db->from('cls_city_pincode');
        $this->db->join('cls_city', 'cls_city_pincode.city_id = cls_city.id');
        $this->db->where('cls_city_pincode.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    

    function import_excel($table_name,$data)
        {

            for ($i = 0; $i < count($data); $i++) {
                if ($i == 0) {

                } else {
                    $this->db->insert($table_name, $data[$i]);
                }
            }
            return $this->db->insert_id();

        }

    function fetch_order(){
        $this->db->select('cls_order.id as order_id, cls_order.order_number, cls_order.power_on,cls_order.box,cls_order.bill,cls_order.charger,cls_order.earphone,cls_order.device_age,cls_order.glass_broken,cls_order.touch_issue,cls_order.front_camera_issue,cls_order.back_camera_issue,cls_order.wifi_issue,cls_order.battery_issue,cls_order.speaker_issue,cls_order.mice_issue,cls_order.volumn_issue,cls_order.chargingpin_issue,cls_order.power_btn_issue,cls_order.finger_print_issue,cls_order.face_recog_issue,cls_order.device_condition,cls_order.address_type,cls_order.address_first,cls_order.address_second,cls_order.locality,cls_order.city,cls_order.state,cls_order.pincode,cls_order.payment_type,cls_order.account_no,cls_order.beneficiary_name,cls_order.ifsc_code,cls_order.bank_name,cls_order.pickup_date,cls_order.pickup_tme_slot,cls_order.final_price,cls_order.created,cls_order.placed,cls_order.processing,cls_order.onpickup,cls_order.completed,cls_order.is_cancel,cls_order.cancel_time,cls_order.referral_code,cls_order.comment,cls_order.upi_id,cls_m_mobile.mobile_title,cls_user.full_name,cls_user.mobile');
        $this->db->order_by("cls_order.created", "desc");
        $this->db->limit('5');
        $this->db->from('cls_order');
        $this->db->join('cls_user', 'cls_order.user_id = cls_user.id');
        $this->db->join('cls_m_mobile', 'cls_order.mobile_id = cls_m_mobile.id');
        $this->db->where('cls_order.is_deleted',0);
        $query = $this->db->get();
        return $query->result_array();
    }

    function total_order(){
        $this->db->where('cls_order.is_deleted',0);
        $query = $this->db->get('cls_order');
        return $query->num_rows();
    }

    function total_completed_order(){
        $this->db->where('completed',1);
        $this->db->where('cls_order.is_deleted',0);
        $query = $this->db->get('cls_order');
        return $query->num_rows();
    }

    function total_users(){
        $query = $this->db->get('cls_user');
        return $query->num_rows();
    }

    function all_orders(){
        $this->db->select('cls_order.id as order_id, cls_order.order_number, cls_order.power_on,cls_order.box,cls_order.bill,cls_order.charger,cls_order.earphone,cls_order.device_age,cls_order.glass_broken,cls_order.touch_issue,cls_order.front_camera_issue,cls_order.back_camera_issue,cls_order.wifi_issue,cls_order.battery_issue,cls_order.speaker_issue,cls_order.mice_issue,cls_order.volumn_issue,cls_order.chargingpin_issue,cls_order.power_btn_issue,cls_order.finger_print_issue,cls_order.face_recog_issue,cls_order.device_condition,cls_order.address_type,cls_order.address_first,cls_order.address_second,cls_order.locality,cls_order.city,cls_order.state,cls_order.pincode,cls_order.payment_type,cls_order.account_no,cls_order.beneficiary_name,cls_order.ifsc_code,cls_order.bank_name,cls_order.pickup_date,cls_order.pickup_tme_slot,cls_order.final_price,cls_order.created,cls_order.placed,cls_order.processing,cls_order.onpickup,cls_order.completed,cls_order.is_cancel,cls_order.cancel_time,cls_order.referral_code,cls_order.comment,cls_order.upi_id,cls_m_mobile.mobile_title,cls_user.full_name,cls_user.mobile');
        $this->db->order_by("cls_order.created", "desc");
        $this->db->from('cls_order');
        $this->db->join('cls_user', 'cls_order.user_id = cls_user.id');
        $this->db->join('cls_m_mobile', 'cls_order.mobile_id = cls_m_mobile.id');
        $this->db->where('cls_order.is_deleted',0);
        $query = $this->db->get();
        return $query->result_array();
    }
    function all_orders_where($id){
        $this->db->select('cls_order.id as order_id, cls_order.order_number, cls_order.power_on,cls_order.box,cls_order.bill,cls_order.charger,cls_order.earphone,cls_order.device_age,cls_order.glass_broken,cls_order.touch_issue,cls_order.front_camera_issue,cls_order.back_camera_issue,cls_order.wifi_issue,cls_order.battery_issue,cls_order.speaker_issue,cls_order.mice_issue,cls_order.volumn_issue,cls_order.chargingpin_issue,cls_order.power_btn_issue,cls_order.finger_print_issue,cls_order.face_recog_issue,cls_order.device_condition,cls_order.address_type,cls_order.address_first,cls_order.address_second,cls_order.locality,cls_order.city,cls_order.state,cls_order.pincode,cls_order.payment_type,cls_order.account_no,cls_order.beneficiary_name,cls_order.ifsc_code,cls_order.bank_name,cls_order.pickup_date,cls_order.pickup_tme_slot,cls_order.final_price,cls_order.created,cls_order.placed,cls_order.processing,cls_order.onpickup,cls_order.completed,cls_order.is_cancel,cls_order.cancel_time,cls_order.referral_code,cls_order.comment,cls_order.upi_id,cls_m_mobile.mobile_title,cls_user.full_name,cls_user.mobile');
        $this->db->order_by("cls_order.created", "desc");
        $this->db->from('cls_order');
        $this->db->join('cls_user', 'cls_order.user_id = cls_user.id');
        $this->db->join('cls_m_mobile', 'cls_order.mobile_id = cls_m_mobile.id');
        $this->db->where('cls_order.id',$id);
        $this->db->where('cls_order.is_deleted',0);
        $query = $this->db->get();
        return $query->row_array();
    }
}
