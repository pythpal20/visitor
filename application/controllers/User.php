<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $this->form_validation->set_rules('', 'Nama User', 'trim|required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'valid_email'   => 'Format penulisan email salah!',
            'is_unique'     => 'Email ini sudah terdaftar'
        ]);
        $this->form_validation->set_rules('role', 'Role Access', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'User';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['rolex']  = $this->db->get('user_role');

            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_headbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/admin_footer');
        } else {
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

            $nama       = $this->input->post('namauser');
            $email      = $this->input->post('email');
            $role       = $this->input->post('role');
            $password   = $this->input->post('password');
            $xuser      = $this->input->post('xuser');

            $data  = [
                'token'         => makeid(10),
                'user_nama'     => htmlspecialchars($nama),
                'email'         => htmlspecialchars($email),
                'password'      => password_hash($password, PASSWORD_DEFAULT),
                'role_id'       => htmlspecialchars($role),
                'is_active'     => "1",
                'date_created'  => time(),
                'createdby'     => $xuser
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User baru ditambahkan!</div>');
            redirect('user');
        }
    }

    function getUser()
    {
        $user = $this->db->get('tb_user');
        $data = array();

        $no = 1;
        foreach($user->result() AS $row) {
            $data[] = array(
                'no'    => $no++,
                'nama'  => $row->user_nama,
                'email' => $row->email,
                'date'  => date("d-m-Y", $row->date_created)
            );
        }
        echo json_encode($data);

    }
}
