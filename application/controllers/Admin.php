<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->db->from('tb_visitors');
        $data['jumlah_all'] = $this->db->count_all_results();

        $today = date('Y-m-d');
        $tambahsatuhari = date('Y-m-d', strtotime("+1 day", strtotime($today)));

        $awal   = new DateTimeImmutable($today);
        $akhir  = new DateTimeImmutable($tambahsatuhari);

        $tawal = $awal->format('U');
        $takhir = $akhir->format('U');

        $this->db->from('tb_visitors');
        $this->db->where('location', 'Showroom 75');
        $this->db->where('YEAR(FROM_UNIXTIME(date_created))', '2023');
        $data['sho75'] = $this->db->count_all_results();
        
        $this->db->from('tb_visitors');
        $this->db->where('location', 'Showroom 118');
        $this->db->where('YEAR(FROM_UNIXTIME(date_created))', '2023');
        $data['sho118'] = $this->db->count_all_results();

        $this->db->from('tb_visitors');
        $this->db->where('location', 'Joongla x Mr Kitchen');
        $this->db->where('YEAR(FROM_UNIXTIME(date_created))', '2023');
        $data['joongla'] = $this->db->count_all_results();
        
        $this->db->from('tb_visitors');
        $this->db->where('location', 'Website');
        $this->db->where('YEAR(FROM_UNIXTIME(date_created))', '2023');
        $data['wbsite'] = $this->db->count_all_results();
        
        
        $this->load->model("m_admin");
        $data['grafik_satu'] = $this->m_admin->getDataGrafik_satu();
        $data['grafik_dua'] = $this->m_admin->getDataGrafik_dua();
        $data['grafik_tiga'] = $this->m_admin->getDataGrafik_tiga();
        $data['grafik_emp'] = $this->m_admin->getDataGrafik_emp();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_headbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer');
    }
    
    public function pengunjung()
    {
        
        $this->form_validation->set_rules('nama', 'Nama Pengunjung', 'trim|required', [
            'required' => 'Nama Pengunjung wajib disi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email wajib disi',
            'valid_email' => 'Penulisan email salah'
        ]);
        $this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|min_length[8]|is_unique[tb_visitors.visitor_hp]', [
            'min_length' => 'No Hp Minimal 8 karakter',
            'required' => 'No Hp tidak boleh kosong',
            'is_unique' => 'No HP sudah terdaftar'
        ]);
        $this->form_validation->set_rules('locasi', 'Lokasi', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
            'required' => 'Tanggal wajib disii'
        ]);
        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'Data Pengunjung';
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_headbar', $data);
            $this->load->view('admin/pengunjung', $data);
            $this->load->view('templates/admin_footer');
        } else {
            # code...
            $nama   = $this->input->post('nama');
            $nohp   = $this->input->post('nohp');
            $email  = $this->input->post('email');
            $tanggal= $this->input->post('tanggal');
            $locasi = $this->input->post('locasi');
            $code   = $this->input->post('code');

            function unixtime($tgl) {
                $unix_tanggal = strtotime($tgl);
                return $unix_tanggal;
            }

            $data = [
                'token'         => $code,
                'visitor_name'  => $nama,
                'visitor_hp'  => $nohp,
                'visitor_email' => $email,
                'location'      => $locasi,
                'date_created'  => unixtime($tanggal),
            ];

            $this->db->insert('tb_visitors', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data baru ditambahkan!</div>');
            redirect('admin/pengunjung');
        }
        
    }

    public function dataPengunjungs()
    {
        $this->load->model("m_pengunjung");
        $pengunjung = $this->m_pengunjung->getDataPengunjung();

        $data = array();
        foreach ($pengunjung->result() AS $row) {
            $data[] = array(
                'tgl'   => date('Y-m-d', $row->date_created),
                'nama'  => $row->visitor_name,
                'nohp'  => $row->visitor_hp,
                'email' => $row->visitor_email,
                'token' => $row->token,
                'loc'   => $row->location
            );
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function detailPengunjung($id)
    {
        $detail = $this->db->get_where('tb_visitors', ['token' => $id]);
        $data = array();
        
        $output = '';
        foreach ($detail->result() AS $row) {
            $output .='<table class="table table-borderless" width="100%">
                <tr>
                    <th width="45%">Nama Pengunjung</th>
                    <td>:</td>
                    <th width="45%">' . $row->visitor_name . '</th>
                </tr>
                <tr>
                    <th>Tanggal Berkunjung</th>
                    <td>:</td>
                    <th>' . date('Y-m-d H:i', $row->date_created) . '</th>
                </tr>
                <tr>
                    <th>No Hp</th>
                    <td>:</td>
                    <th>' . $row->visitor_hp . '</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>:</td>
                    <th>' . $row->visitor_email . '</th>
                </tr>
                <tr>
                    <th>Instagram</th>
                    <td>:</td>
                    <th>' . $row->visitor_ig . '</th>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <th>' . $row->visitor_alamat . '</th>
                </tr>
            </table>';
        }
        // header('Content-Type: application/json');
        echo $output;
    }
}
