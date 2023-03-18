<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Showroom118 extends CI_Controller
{
    public function index()
    {
        
        $data['title'] = 'Showroom 118';
        $data['lok']   = 'Showroom 118';

        $this->load->view('templates/visitor_header', $data);
        $this->load->view('templates/visitor_headbar', $data);
        $this->load->view('visitor/index', $data);
        $this->load->view('templates/visitor_footer');
    }
}