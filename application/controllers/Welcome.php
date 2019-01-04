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
	function __construct()
	{
		parent::__construct();
		$this->load->library('PHPReport');
		$this->load->model('RekapMdr_model');
		$this->load->model('RekapBni_model');
		$this->load->model('RekapBri_model');
		$this->load->model('RekapBca_model');


	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getDataJsonMdr()
	{
		$list = $this->RekapMdr_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rekap) {
            $no++;
            $row = array();
            $row[] = $rekap->tanggal;
			$row[] = $rekap->CIPUTAT_1_SMT;
			$row[] = $rekap->CIPUTAT_1_RK;
			$row[] = $rekap->PONDOKPINANG_SMT;
			$row[] = $rekap->PONDOKPINANG_RK;
			$row[] = $rekap->FATMAWATI_2_SMT;
			$row[] = $rekap->FATMAWATI_2_RK;
			$row[] = $rekap->FATMAWATI_1_SMT;
			$row[] = $rekap->FATMAWATI_1_RK;
			$row[] = $rekap->AMPERA_2_SMT;
			$row[] = $rekap->AMPERA_2_RK;
			$row[] = $rekap->AMPERA_1_SMT;
			$row[] = $rekap->AMPERA_1_RK;
			$row[] = $rekap->LENTENG_AGUNG_2_SMT;
			$row[] = $rekap->LENTENG_AGUNG_2_RK;
			$row[] = $rekap->LENTENG_AGUNG_1_SMT;
			$row[] = $rekap->LENTENG_AGUNG_1_RK;
			$row[] = $rekap->GEDONG_2_SMT;
			$row[] = $rekap->GEDONG_2_RK;
			$row[] = $rekap->GEDONG_1_SMT;
			$row[] = $rekap->GEDONG_1_RK;
			$row[] = $rekap->KP_RAMBUTAN_SMT;
			$row[] = $rekap->KP_RAMBUTAN_RK;
			$row[] = $rekap->PS_REBO_SMT;
			$row[] = $rekap->PS_REBO_RK;
			$row[] = $rekap->DUKUH_1_SMT;
			$row[] = $rekap->DUKUH_1_RK;
			$row[] = $rekap->DUKUH_3_SMT;
			$row[] = $rekap->DUKUH_3_RK;
			$row[] = $rekap->LT_AGUNG_3_SMT;
			$row[] = $rekap->LT_AGUNG_3_RK;
			$row[] = $rekap->CILANDAK_UTAMA_SMT;
			$row[] = $rekap->CILANDAK_UTAMA_RK;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->RekapMdr_model->count_all(),
                        "recordsFiltered" => $this->RekapMdr_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function getDataJsonBni()
	{
		$list = $this->RekapBni_model->get_datatables();
		// die($this->db->last_query());
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rekap) {
            $no++;
            $row = array();
            $row[] = $rekap->tanggal;
			$row[] = $rekap->CIPUTAT_1_SMT;
			$row[] = $rekap->CIPUTAT_1_RK;
			$row[] = $rekap->PONDOKPINANG_SMT;
			$row[] = $rekap->PONDOKPINANG_RK;
			$row[] = $rekap->FATMAWATI_2_SMT;
			$row[] = $rekap->FATMAWATI_2_RK;
			$row[] = $rekap->FATMAWATI_1_SMT;
			$row[] = $rekap->FATMAWATI_1_RK;
			$row[] = $rekap->AMPERA_2_SMT;
			$row[] = $rekap->AMPERA_2_RK;
			$row[] = $rekap->AMPERA_1_SMT;
			$row[] = $rekap->AMPERA_1_RK;
			$row[] = $rekap->LENTENG_AGUNG_2_SMT;
			$row[] = $rekap->LENTENG_AGUNG_2_RK;
			$row[] = $rekap->LENTENG_AGUNG_1_SMT;
			$row[] = $rekap->LENTENG_AGUNG_1_RK;
			$row[] = $rekap->GEDONG_2_SMT;
			$row[] = $rekap->GEDONG_2_RK;
			$row[] = $rekap->GEDONG_1_SMT;
			$row[] = $rekap->GEDONG_1_RK;
			$row[] = $rekap->KP_RAMBUTAN_SMT;
			$row[] = $rekap->KP_RAMBUTAN_RK;
			$row[] = $rekap->PS_REBO_SMT;
			$row[] = $rekap->PS_REBO_RK;
			$row[] = $rekap->DUKUH_1_SMT;
			$row[] = $rekap->DUKUH_1_RK;
			$row[] = $rekap->DUKUH_3_SMT;
			$row[] = $rekap->DUKUH_3_RK;
			$row[] = $rekap->LT_AGUNG_3_SMT;
			$row[] = $rekap->LT_AGUNG_3_RK;
			$row[] = $rekap->CILANDAK_UTAMA_SMT;
			$row[] = $rekap->CILANDAK_UTAMA_RK;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->RekapBni_model->count_all(),
                        "recordsFiltered" => $this->RekapBni_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function getDataJsonBri()
	{
		$list = $this->RekapBri_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rekap) {
            $no++;
            $row = array();
            $row[] = $rekap->tanggal;
			$row[] = $rekap->CIPUTAT_1_SMT;
			$row[] = $rekap->CIPUTAT_1_RK;
			$row[] = $rekap->PONDOKPINANG_SMT;
			$row[] = $rekap->PONDOKPINANG_RK;
			$row[] = $rekap->FATMAWATI_2_SMT;
			$row[] = $rekap->FATMAWATI_2_RK;
			$row[] = $rekap->FATMAWATI_1_SMT;
			$row[] = $rekap->FATMAWATI_1_RK;
			$row[] = $rekap->AMPERA_2_SMT;
			$row[] = $rekap->AMPERA_2_RK;
			$row[] = $rekap->AMPERA_1_SMT;
			$row[] = $rekap->AMPERA_1_RK;
			$row[] = $rekap->LENTENG_AGUNG_2_SMT;
			$row[] = $rekap->LENTENG_AGUNG_2_RK;
			$row[] = $rekap->LENTENG_AGUNG_1_SMT;
			$row[] = $rekap->LENTENG_AGUNG_1_RK;
			$row[] = $rekap->GEDONG_2_SMT;
			$row[] = $rekap->GEDONG_2_RK;
			$row[] = $rekap->GEDONG_1_SMT;
			$row[] = $rekap->GEDONG_1_RK;
			$row[] = $rekap->KP_RAMBUTAN_SMT;
			$row[] = $rekap->KP_RAMBUTAN_RK;
			$row[] = $rekap->PS_REBO_SMT;
			$row[] = $rekap->PS_REBO_RK;
			$row[] = $rekap->DUKUH_1_SMT;
			$row[] = $rekap->DUKUH_1_RK;
			$row[] = $rekap->DUKUH_3_SMT;
			$row[] = $rekap->DUKUH_3_RK;
			$row[] = $rekap->LT_AGUNG_3_SMT;
			$row[] = $rekap->LT_AGUNG_3_RK;
			$row[] = $rekap->CILANDAK_UTAMA_SMT;
			$row[] = $rekap->CILANDAK_UTAMA_RK;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->RekapBri_model->count_all(),
                        "recordsFiltered" => $this->RekapBri_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

	public function getDataJsonBca()
	{
		$list = $this->RekapBca_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $rekap) {
            $no++;
            $row = array();
            $row[] = $rekap->tanggal;
			$row[] = $rekap->CIPUTAT_1_SMT;
			$row[] = $rekap->CIPUTAT_1_RK;
			$row[] = $rekap->PONDOKPINANG_SMT;
			$row[] = $rekap->PONDOKPINANG_RK;
			$row[] = $rekap->FATMAWATI_2_SMT;
			$row[] = $rekap->FATMAWATI_2_RK;
			$row[] = $rekap->FATMAWATI_1_SMT;
			$row[] = $rekap->FATMAWATI_1_RK;
			$row[] = $rekap->AMPERA_2_SMT;
			$row[] = $rekap->AMPERA_2_RK;
			$row[] = $rekap->AMPERA_1_SMT;
			$row[] = $rekap->AMPERA_1_RK;
			$row[] = $rekap->LENTENG_AGUNG_2_SMT;
			$row[] = $rekap->LENTENG_AGUNG_2_RK;
			$row[] = $rekap->LENTENG_AGUNG_1_SMT;
			$row[] = $rekap->LENTENG_AGUNG_1_RK;
			$row[] = $rekap->GEDONG_2_SMT;
			$row[] = $rekap->GEDONG_2_RK;
			$row[] = $rekap->GEDONG_1_SMT;
			$row[] = $rekap->GEDONG_1_RK;
			$row[] = $rekap->KP_RAMBUTAN_SMT;
			$row[] = $rekap->KP_RAMBUTAN_RK;
			$row[] = $rekap->PS_REBO_SMT;
			$row[] = $rekap->PS_REBO_RK;
			$row[] = $rekap->DUKUH_1_SMT;
			$row[] = $rekap->DUKUH_1_RK;
			$row[] = $rekap->DUKUH_3_SMT;
			$row[] = $rekap->DUKUH_3_RK;
			$row[] = $rekap->LT_AGUNG_3_SMT;
			$row[] = $rekap->LT_AGUNG_3_RK;
			$row[] = $rekap->CILANDAK_UTAMA_SMT;
			$row[] = $rekap->CILANDAK_UTAMA_RK;

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->RekapBca_model->count_all(),
                        "recordsFiltered" => $this->RekapBca_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}



	public function do_upload()
	{
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'xls|xlsx';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file_rk'))
        {
                $error = array('error' => $this->upload->display_errors());

                // $this->load->view('upload_form', $error);
                print_r($error);
        }
        else
        {
                $data = $this->upload->data();

                // $this->load->view('upload_success', $data);
                $bulan = $this->input->post('month_rk');
                $this->readExcel($bulan, $data['file_name']);
                print_r($data);
        }
	}

	public function readExcel($bulan, $file_rk)
	{
		$file = './uploads/'.$file_rk;

		//load the excel library
		// $this->load->library('excel');

		//read file from path
		$objPHPExcel = PHPExcel_IOFactory::load($file);

		//get only the Cell Collection
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

		//extract to a PHP readable array format
		foreach ($cell_collection as $cell) {

			if ($objPHPExcel->getActiveSheet()->getCell($cell)->getValue() !== NULL) {
				$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
			}

		    //The header will/should be in row 1 only. of course, this can be modified to suit your need.
		    if ($row == 1) {
		        $header[$row][$column] = $data_value;
		    } else {
		        $arr_data[$row][$column] = $data_value;
		    }
		}

		//send the data in an array format
		$data['header'] = $header;
		$data['values'] = $arr_data;

			for ($y='A'; $y <= 'Q'; $y++) {
				for ($x=1; $x < $row; $x++) {
					$tanggal = $bulan.'-'.$data['values'][$x+1]['A']; //get from input user
					$bank = $this->input->post('bank');
					if ($y=='B') {
						$gerbang = 'CIPUTAT 1';
						$rupiah = $data['values'][$x+1]['B'];
						$datainsert = array(
										'idGerbang' => 3,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='C') {
						$gerbang = 'PONDOK PINANG';
						$rupiah = $data['values'][$x+1]['C'];
						$datainsert = array(
										'idGerbang' => 4,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='D') {
						$gerbang = 'FATMAWATI 2';
						$rupiah = $data['values'][$x+1]['D'];
						$datainsert = array(
										'idGerbang' => 5,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='E') {
						$gerbang = 'FATMAWATI 1';
						$rupiah = $data['values'][$x+1]['E'];
						$datainsert = array(
										'idGerbang' => 6,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='F') {
						$gerbang = 'AMPERA 2';
						$rupiah = $data['values'][$x+1]['F'];
						$datainsert = array(
										'idGerbang' => 7,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='G') {
						$gerbang = 'AMPERA 1';
						$rupiah = $data['values'][$x+1]['G'];
						$datainsert = array(
										'idGerbang' => 8,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='H') {
						$gerbang = 'LENTENG AGUNG 2';
						$rupiah = $data['values'][$x+1]['H'];
						$datainsert = array(
										'idGerbang' => 9,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='I') {
						$gerbang = 'LENTENG AGUNG 1';
						$rupiah = $data['values'][$x+1]['I'];
						$datainsert = array(
										'idGerbang' => 10,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='J') {
						$gerbang = 'GEDONG 2';
						$rupiah = $data['values'][$x+1]['J'];
						$datainsert = array(
										'idGerbang' => 11,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='K') {
						$gerbang = 'GEDONG 1';
						$rupiah = $data['values'][$x+1]['K'];
						$datainsert = array(
										'idGerbang' => 12,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='L') {
						$gerbang = 'KP RAMBUTAN';
						$rupiah = $data['values'][$x+1]['L'];
						$datainsert = array(
										'idGerbang' => 13,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='M') {
						$gerbang = 'PS REBO';
						$rupiah = $data['values'][$x+1]['M'];
						$datainsert = array(
										'idGerbang' => 14,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='N') {
						$gerbang = 'DUKUH 1';
						$rupiah = $data['values'][$x+1]['N'];
						$datainsert = array(
										'idGerbang' => 15,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='O') {
						$gerbang = 'DUKUH 3';
						$rupiah = $data['values'][$x+1]['O'];
						$datainsert = array(
										'idGerbang' => 16,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='P') {
						$gerbang = 'LT AGUNG 3';
						$rupiah = $data['values'][$x+1]['P'];
						$datainsert = array(
										'idGerbang' => 34,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

					if ($y=='Q') {
						$gerbang = 'CILANDAK UTAMA';
						$rupiah = $data['values'][$x+1]['Q'];
						$datainsert = array(
										'idGerbang' => 99,
										'Gerbang' => $gerbang,
										'Tanggal' => $tanggal,
										'Rp' => $rupiah,
										'Bank' => $bank
									);
						// echo $gerbang.' '.$rupiah.' '.$tanggal.'</br>';
						$this->db->insert('t_rekeningkoran', $datainsert);
					}

				}
			}
	}

	public function getExcel()
	{
		$month = $this->input->post('fltMonth');
		$bank = $this->input->post('fltBank');
		// $dbATP = $this->load->database('atp', TRUE);
		if ($bank=='Mandiri') {
			$data = $this->db->query("CALL sp_rekap_mandiri ('$month')")->result_array();
		} elseif ($bank=='BNI') {
			$data = $this->db->query("CALL sp_rekap_bni ('$month')")->result_array();
		} elseif ($bank=='BRI') {
			$data = $this->db->query("CALL sp_rekap_bri ('$month')")->result_array();
		} else {
			$data = $this->db->query("CALL sp_rekap_bca ('$month')")->result_array();
		}

		$template = 'rekap.xls';
		//set absolute path to directory with template files
		$templateDir = "./";
		//set config for report
		$config = array(
			'template' => $template,
			'templateDir' => $templateDir
		);

		//load template
		$R = new PHPReport($config);
		$R->load(
					array(
			      		array(
				              'id' => 'header',
				              'data' => array('judul' => 'Data Lalu Lintas Harian dan Pendapatan Tol')
				    	    ),
				      	array(
				              'id' => 'detail',
				              'repeat' => TRUE,
				              'data' => $data
				    	    )
						)
		);

		  // define output directoy
	      $output_file_dir = "./";

	      $output_file_excel = $output_file_dir  . $bank ."_rekap_".date('dmYhis');
	      //download excel sheet with data in /tmp folder
	      $result = $R->render('excel', $output_file_excel);
	      force_download($output_file_excel, NULL);
	}

	public function getPost()
	{
		print_r($_POST);
	}
}
