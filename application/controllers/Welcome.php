<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function latihan() 
	{
		// $data['pesan'] = "Oops, sepertinya ini error deh wkwk";
		// $data['data'] = "data";

		$id = $_POST['id_bank'];
		$nama = $_POST['nama'];
		$foto = $_POST['foto'];

		/* ini untuk edit data */
		$data_edit = array('nama_bank' => $nama, 'foto' => $foto);
		$this->db->where('id', $id);
		$this->db->update('bank', $data_edit);


		/* ini untuk show data */
		//nampilkan semuanya
		// $this->load->model('model_crud');
		// $bank = $this->model_crud->get_data('bank');

		//nampilkan satu data saja dan dengan gambar
		$this->db->where(array('id'=> $id));
		$data = $this->db->get('bank')->row_array();
		$bank['foto'] = base_url('public/bank_foto/' .$data['foto']);
		//$variabel['object'] =$variabel['title di database']
		$bank['nama'] = $data['nama_bank'];
		$output['token'] = $this->generateRandomString();
		$output['data'] = $bank;

		// echo "<pre>";
		echo json_encode($output);
		// echo "<pre>";


        // ->set_status_header(200)
        // ->set_content_type('application/json', 'utf-8')
        // ->set_output(json_encode($data, JSON_PRETTY_PRINT))
        // ->_display();
	}

	public function get_all(){
		$all = $this->db->get('bank')->result_array();
		$output['pesan'] = "Oops";
		$output['data'] = $all;
		echo "<pre>";
		echo json_encode($output);
		echo "</pre>";
	}

	public function edit(){
		$id = $_POST['id_bank'];
		$nama = $_POST['nama'];
		$foto = $_POST['foto'];

		$edit = array('nama_bank' => $nama, 'foto' => $foto);
		$this->db->where('id', $id);
		$this->db->update('bank', $edit);

		//nampilin cara 1
		$this->load->model('model_crud');
		$bank = $this->model_crud->get_data('bank');
		echo json_encode($bank);

		//nampilin cara 2
		// $show_all = $this->db->get('bank')->result_array();
		// echo json_encode($show_all);

		//nampilin cara 3
		
	}

	public function generateRandomString($length = 64) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
