<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_logger
{
    function log_visitor()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        if ($CI->session->userdata('email')) {
            $user_email = $CI->session->userdata('nama_lengkap');
        } else {
            $user_email = '';
        }
        
        // $ip_address = $CI->input->ip_address();
        // $location_info = file_get_contents('https://api.iplocation.net/?ip=' . $CI->input->ip_address());
        
        // $location_info = json_decode($location_info);
        // $country_name = $location_info->country_name;
        // $isp = $location_info->isp;
        
        // Simpan informasi dasar pengunjung ke dalam database
        $data = array(
            'ip_address'   => $CI->input->ip_address(),
            'page_visited' => $CI->uri->uri_string(),
            'visit_time'   => date('Y-m-d H:i:s'),
            'visitor_name' => $user_email,
            'country'      => '',
            'isp'          => ''
        );
        $CI->db->insert('visitor_logs', $data);
    }
}