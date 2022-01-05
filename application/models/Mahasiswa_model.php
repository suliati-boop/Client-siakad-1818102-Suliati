<?php 

use GuzzleHttp\Client;

class Mahasiswa_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost:8080/rest-api/rest-server-siakad/api/'
        ]);

    }

    public function getAllMahasiswa()
    {
        
        
        $response = $this->_client->request('GET','mahasiswa',[
            'query' => [
                'X-API-SULIS' => 'suliati'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data'];
    }

    public function getMahasiswaById($id)
    {
        return $this->db->get_where('mahasiswa', ['nim' => $id])->row_array();
                
    }


    public function tambahDataMahasiswa()
    {
        $data = [
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'jurusan' => $this->input->post('jurusan', true),
            'alamat' => $this->input->post('alamat', true),
            'angkatan' => $this->input->post('angkatan', true),
            'X-API-SULIS' => 'suliati'

        ];

        //$this->db->insert('mahasiswa', $data);
        
        $response = $this->_client->request('POST', 'mahasiswa' ,[
                'form_params' => $data
        ]);



        $result = json_decode($response->getBody()->getContents(),true);
        return $result;


    }

    public function hapusDataMahasiswa($id)
    {
        $response = $this->_client->request('DELETE','mahasiswa',[
            'form_params' => [
                'X-API-SULIS' => 'suliati',
                'id'=>$id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }


    public function ubahDataMahasiswa()
    {
        $data = [
            'nim' => $this->input->post('nim', true),
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'jurusan' => $this->input->post('jurusan', true),
            'alamat' => $this->input->post('alamat', true),
            'angkatan' => $this->input->post('angkatan', true),
            'id' => $this->input->post('id', true),
            'X-API-SULIS' => 'suliati'

        ];

        $response = $this->_client->request('PUT', 'mahasiswa' ,[
                'form_params' => $data
        ]);



        $result = json_decode($response->getBody()->getContents(),true);
        return $result;

    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nim', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('angkatan', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}