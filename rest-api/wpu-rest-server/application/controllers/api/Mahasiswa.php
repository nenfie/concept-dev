<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends CI_Controller
{

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    public function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();                

        $this->load->model('Mahasiswa_model');

        $this->methods['index_get']['limit'] = 10;
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $mahasiswa = $this->Mahasiswa_model->getMahasiswa();
        } else {
            $mahasiswa = $this->Mahasiswa_model->getMahasiswa($id);
        }

        if ($mahasiswa) {
            $this->response([
                'status' => true,
                'message' => '',
                'data' => $mahasiswa
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'data not found'
            ], 404);
        }
    }

    public function index_post()
    {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->Mahasiswa_model->createMahasiswa($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data is successfully created',
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create data'
            ], 404);    
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->Mahasiswa_model->updateMahasiswa($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data is successfully updated'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], 404);    
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'invalid request'
            ], 400);
        } else {
            if ($this->Mahasiswa_model->deleteMahasiswa($id) > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'data is successfully deleted'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'failed to delete data'
                ], 404);    
            }
        }
    }

};

?>