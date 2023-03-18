<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitor extends CI_Controller
{

    public function index()
    {
        
        # code...
        $data['title'] = 'Joongla <i class="fa fa-times"></i> Mr Kitchen';
        $data['lok']    = 'Joongla x Mr Kitchen';

        $this->load->view('templates/visitor_header', $data);
        $this->load->view('templates/visitor_headbar', $data);
        $this->load->view('visitor/index', $data);
        $this->load->view('templates/visitor_footer');
    }
    
    public function showroom118()
    {
        # code...
        $data['title'] = 'Showroom 118';
        $data['lok']    = 'Showroom 118';

        $this->load->view('templates/visitor_header', $data);
        $this->load->view('templates/visitor_headbar');
        $this->load->view('visitor/index', $data);
        $this->load->view('templates/visitor_footer');
    }
    
    public function showroom75()
    {
        # code...
        $data['title'] = 'Showroom 75';
        $data['lok']    = 'Showroom 75';

        $this->load->view('templates/visitor_header', $data);
        $this->load->view('templates/visitor_headbar');
        $this->load->view('visitor/index', $data);
        $this->load->view('templates/visitor_footer');
    }
    
    public function saveData()
    {
        function makeid($length)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $charactersLength = strlen($characters);
            $result = '';
            for ($i = 0; $i < $length; $i++) {
                $result .= $characters[rand(0, $charactersLength - 1)];
            }
            return $result;
        }
        
        $token = makeid(10);
        $data = [
            'token'         => $token,
            'visitor_name'  => $this->input->post('nama'),
            'visitor_hp'    => $this->input->post('nohp'),
            'visitor_ig'    => $this->input->post('ig'),
            'visitor_email' => $this->input->post('email'),
            'visitor_alamat' => $this->input->post('alamat'),
            'visitor_notes' => $this->input->post('note'),
            'date_created'  => time(),
            'location'      => $this->input->post('pos'),
            'koordinat'     => $this->input->post('location')
        ];

        $this->db->insert('tb_visitors', $data);
        echo $token;
    }
    
    public function voucerPdf($id)
    {
        $data['pengunjung'] = $this->db->get_where('tb_visitors', ['token' => $id])->row_array();

        $this->load->library("Pdf");

        $this->pdf->setPaper(array(0,0, 430.9665, 220.98), 'portrait');
        $this->pdf->filename = $id . ".pdf";
        $this->pdf->load_view('download/voucer', $data);
        // $this->load->view('download/voucer', $data);
    }
}
