<?php
class Login extends CI_Controller
{
	function __construct(){
	parent::__construct();
	$this->load->model('Login_model');
	}
	public function index(){
		$data['pesan_gagal'] = "";
		$this->load->View('login_v' , $data);
	}

	function aksi_login()
	{
		$username_1 = $this->input->post('username');
		$password_1 = $this->input->post('password');

		
		$cek_login = $this->Login_model->M_aksi_login($username_1,$password_1)->row();

		if (!empty($cek_login)){
			$data = array ('nama_level'=>$cek_login->nama_level);
			$cek_user = $data['nama_level'];

			if ($cek_user=='admin'){
				echo "anda login sebagai admin";
			}
			if ($cek_user=='owner'){
				echo "anda login sebagai owner";
			}
			if($cek_user=='kasir'){
				echo "anda login sebagai kasir";
			}
			if($cek_user=='waiter'){
				echo "anda login sebagai waiter";
			}

			}else{
				echo " gagal";
			}
		}
	}

?>