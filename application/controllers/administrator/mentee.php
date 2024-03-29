<?php

class Mentee extends CI_Controller{

    public function index()
    {
        $data['mentee'] = $this->mentee_model->tampil_data('mentee')->result();
        $data['kelompok'] = $this->kelompok_model->tampil_data('kelompok')->result();
        $data['jurusan'] = $this->jurusan_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mentee',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail($id)
    {
        $data['detail'] = $this->mentee_model->ambil_id_mentee($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mentee_detail',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_mentee()
    {
        $data['kelompok'] = $this->mentee_model->tampil_data('kelompok')->result();
        $data['jurusan'] = $this->mentee_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mentee_form',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_mentee_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_mentee();
        } else {
            $nim = $this->input->post('nim');

            // Mengecek apakah NIM sudah ada di database
            $nim_exists = $this->mentee_model->check_nim_exists($nim);
            if ($nim_exists) {
                // Nim sudah ada, tampilkan pesan kesalahan
                $this->session->set_flashdata('pesan', '<div 
                    class="alert alert-danger alert-dismissible fade show" role="alert">
                    Nim sudah ada!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect('administrator/mentee/tambah_mentee');
            }

            // Jika NIM belum ada di database, lanjutkan proses tambah mentee
            $password      = MD5($this->input->post('password'));
            $level         = $this->input->post('level');
            $nama_lengkap  = $this->input->post('nama_lengkap');
            $alamat        = $this->input->post('alamat');
            $email         = $this->input->post('email');
            $telepon       = $this->input->post('telepon');
            $tempat_lahir  = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $nama_kelompok = $this->input->post('nama_kelompok');
            $nama_jurusan = $this->input->post('nama_jurusan');
            $photo         = $_FILES['photo'];
            if ($photo == '') {
            } else {
                $config['upload_path']   = './assets/uploads';
                $config['allowed_types'] = 'jpg|png|gif|tiff';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    echo "Gagal Upload";
                    die();
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nim'           => $nim,
                'password'      => $password,
                'level'         => $level,
                'nama_lengkap'  => $nama_lengkap,
                'alamat'        => $alamat,
                'email'         => $email,
                'telepon'       => $telepon,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'nama_kelompok' => $nama_kelompok,
                'nama_jurusan'  => $nama_jurusan,
                'photo'         => $photo
            );

            $this->mentee_model->insert_data($data, 'mentee');
            $this->session->set_flashdata('pesan', '<div 
                class="alert alert-success alert-dismissible fade show" role="alert">
                Data Mentee Berhasil Ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('administrator/mentee');
        }
    }


    public function update($id)
    {
        $where = array('$id' => $id);
        $data['mentee'] = $this->db->query("select * from mentee mte, kelompok klp where mte.nama_kelompok=klp.nama_kelompok and mte.id='$id'")->result();
        $data['kelompok'] = $this->kelompok_model->tampil_data('kelompok')->result();
        $data['jurusan'] = $this->jurusan_model->tampil_data('jurusan')->result();
        $data['detail'] = $this->mentee_model->ambil_id_mentee($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mentee_update',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_mentee_aksi()
    {
        $id            = $this->input->post("id");
        $nim           = $this->input->post('nim');
        $password      = MD5($this->input->post('password'));
        $level         = $this->input->post('level');
        $nama_lengkap  = $this->input->post('nama_lengkap');
        $alamat        = $this->input->post('alamat');
        $email         = $this->input->post('email');
        $telepon       = $this->input->post('telepon');
        $tempat_lahir  = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $nama_kelompok = $this->input->post('nama_kelompok');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $photo         = $_FILES['userfile']['name'];

        // Validasi NIM (harus berisi angka)
        if (!is_numeric($nim)) {
            $this->session->set_flashdata('pesan', '<div 
                class="alert alert-danger alert-dismissible fade show" role="alert">
                NIM hanya boleh berisi angka!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('administrator/mentee/update/'.$id);
        }

        // Validasi telepon (harus berisi angka)
        if (!is_numeric($telepon)) {
            $this->session->set_flashdata('pesan', '<div 
                class="alert alert-danger alert-dismissible fade show" role="alert">
                Telepon hanya boleh berisi angka!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('administrator/mentee/update/'.$id);
        }

        // Validasi nama lengkap (hanya huruf)
        if (!preg_match("/^[a-zA-Z ]*$/", $nama_lengkap)) {
            $this->session->set_flashdata('pesan', '<div 
                class="alert alert-danger alert-dismissible fade show" role="alert">
                Nama Lengkap hanya boleh berisi huruf!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('administrator/mentee/update/'.$id);
        }

        // Validasi tempat lahir (hanya huruf)
        if (!preg_match("/^[a-zA-Z ]*$/", $tempat_lahir)) {
            $this->session->set_flashdata('pesan', '<div 
                class="alert alert-danger alert-dismissible fade show" role="alert">
                Tempat Lahir hanya boleh berisi huruf!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('administrator/mentee/update/'.$id);
        }

        // Proses update data
        if ($photo) {
            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'jpg|png|gif|tiff';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('userfile')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('photo', $userfile);
            } else {
                echo "Gagal Upload";
            }
        }

        $data = array(
            'nim'           => $nim,
            'password'      => $password,
            'level'         => $level,
            'nama_lengkap'  => $nama_lengkap,
            'alamat'        => $alamat,
            'email'         => $email,
            'telepon'       => $telepon,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'nama_kelompok' => $nama_kelompok,
            'nama_jurusan' => $nama_jurusan
        );

        $where = array (
            'id' => $id
        );

        $this->mentee_model->update_data($where, $data, 'mentee');
        $this->session->set_flashdata('pesan', '<div 
            class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mentee Berhasil Diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('administrator/mentee');
    }


    public function _rules()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric', [
            'required' => 'NIM wajib diisi!',
            'numeric'  => 'NIM hanya boleh berisi angka!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi!']);
        $this->form_validation->set_rules('level', 'Level', 'required', ['required' => 'Level wajib diisi!']);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|alpha', [
            'required' => 'Nama Lengkap wajib diisi!',
            'alpha'    => 'Nama Lengkap hanya boleh berisi huruf!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat wajib diisi!']);
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email wajib diisi!']);
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric', [
            'required' => 'Telepon wajib diisi!',
            'numeric'  => 'Telepon hanya boleh berisi angka!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|alpha', [
            'required' => 'Tempat Lahir wajib diisi!',
            'alpha'    => 'Tempat Lahir hanya boleh berisi huruf!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', ['required' => 'Tanggal Lahir wajib diisi!']);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', ['required' => 'Jenis Kelamin wajib diisi!']);
        $this->form_validation->set_rules('nama_kelompok', 'Nama Kelompok', 'required', ['required' => 'Nama Kelompok wajib diisi!']);
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required', ['required' => 'Nama Jurusan wajib diisi!']);
    }
}