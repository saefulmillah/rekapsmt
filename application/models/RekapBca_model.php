<?php
/**
 *
 */
class RekapBca_model extends CI_Model
{
	var $select = "tanggal`, `CIPUTAT_1_SMT`, `CIPUTAT_1_RK`, `PONDOKPINANG_SMT`, `PONDOKPINANG_RK`, `FATMAWATI_2_SMT`, `FATMAWATI_2_RK`, `FATMAWATI_1_SMT`, `FATMAWATI_1_RK`, `AMPERA_2_SMT`, `AMPERA_2_RK`, `AMPERA_1_SMT`, `AMPERA_1_RK`, `LENTENG_AGUNG_2_SMT`, `LENTENG_AGUNG_2_RK`, `LENTENG_AGUNG_1_SMT`, `LENTENG_AGUNG_1_RK`, `GEDONG_2_SMT`, `GEDONG_2_RK`, `GEDONG_1_SMT`, `GEDONG_1_RK`, `KP_RAMBUTAN_SMT`, `KP_RAMBUTAN_RK`, `PS_REBO_SMT`, `PS_REBO_RK`, `DUKUH_1_SMT`, `DUKUH_1_RK`, `DUKUH_3_SMT`, `DUKUH_3_RK`, `LT_AGUNG_3_SMT`, `LT_AGUNG_3_RK`, `CILANDAK_UTAMA_SMT`, `CILANDAK_UTAMA_RK` ";
    var $table = "
        (
            SELECT
            tanggal,
            SUM(( CASE WHEN idgerbang = 3 THEN RpSMT ELSE 0 END )) AS 'CIPUTAT_1_SMT',
            SUM(( CASE WHEN idgerbang = 3 THEN Rp ELSE 0 END )) AS 'CIPUTAT_1_RK',
            SUM(( CASE WHEN idgerbang = 4 THEN RpSMT ELSE 0 END )) AS 'PONDOKPINANG_SMT',
            SUM(( CASE WHEN idgerbang = 4 THEN Rp ELSE 0 END )) AS 'PONDOKPINANG_RK',
            SUM(( CASE WHEN idgerbang = 5 THEN RpSMT ELSE 0 END )) AS 'FATMAWATI_2_SMT',
            SUM(( CASE WHEN idgerbang = 5 THEN Rp ELSE 0 END )) AS 'FATMAWATI_2_RK',
            SUM(( CASE WHEN idgerbang = 6 THEN RpSMT ELSE 0 END )) AS 'FATMAWATI_1_SMT',
            SUM(( CASE WHEN idgerbang = 6 THEN Rp ELSE 0 END )) AS 'FATMAWATI_1_RK',
            SUM(( CASE WHEN idgerbang = 7 THEN RpSMT ELSE 0 END )) AS 'AMPERA_2_SMT',
            SUM(( CASE WHEN idgerbang = 7 THEN Rp ELSE 0 END )) AS 'AMPERA_2_RK',
            SUM(( CASE WHEN idgerbang = 8 THEN RpSMT ELSE 0 END )) AS 'AMPERA_1_SMT',
            SUM(( CASE WHEN idgerbang = 8 THEN Rp ELSE 0 END )) AS 'AMPERA_1_RK',
            SUM(( CASE WHEN idgerbang = 9 THEN RpSMT ELSE 0 END )) AS 'LENTENG_AGUNG_2_SMT',
            SUM(( CASE WHEN idgerbang = 9 THEN Rp ELSE 0 END )) AS 'LENTENG_AGUNG_2_RK',
            SUM(( CASE WHEN idgerbang = 10 THEN RpSMT ELSE 0 END )) AS 'LENTENG_AGUNG_1_SMT',
            SUM(( CASE WHEN idgerbang = 10 THEN Rp ELSE 0 END )) AS 'LENTENG_AGUNG_1_RK',
            SUM(( CASE WHEN idgerbang = 11 THEN RpSMT ELSE 0 END )) AS 'GEDONG_2_SMT',
            SUM(( CASE WHEN idgerbang = 11 THEN Rp ELSE 0 END )) AS 'GEDONG_2_RK',
            SUM(( CASE WHEN idgerbang = 12 THEN RpSMT ELSE 0 END )) AS 'GEDONG_1_SMT',
            SUM(( CASE WHEN idgerbang = 12 THEN Rp ELSE 0 END )) AS 'GEDONG_1_RK',
            SUM(( CASE WHEN idgerbang = 13 THEN RpSMT ELSE 0 END )) AS 'KP_RAMBUTAN_SMT',
            SUM(( CASE WHEN idgerbang = 13 THEN Rp ELSE 0 END )) AS 'KP_RAMBUTAN_RK',
            SUM(( CASE WHEN idgerbang = 14 THEN RpSMT ELSE 0 END )) AS 'PS_REBO_SMT',
            SUM(( CASE WHEN idgerbang = 14 THEN Rp ELSE 0 END )) AS 'PS_REBO_RK',
            SUM(( CASE WHEN idgerbang = 15 THEN RpSMT ELSE 0 END )) AS 'DUKUH_1_SMT',
            SUM(( CASE WHEN idgerbang = 15 THEN Rp ELSE 0 END )) AS 'DUKUH_1_RK',
            SUM(( CASE WHEN idgerbang = 16 THEN RpSMT ELSE 0 END )) AS 'DUKUH_3_SMT',
            SUM(( CASE WHEN idgerbang = 16 THEN Rp ELSE 0 END )) AS 'DUKUH_3_RK',
            SUM(( CASE WHEN idgerbang = 34 THEN RpSMT ELSE 0 END )) AS 'LT_AGUNG_3_SMT',
            SUM(( CASE WHEN idgerbang = 34 THEN Rp ELSE 0 END )) AS 'LT_AGUNG_3_RK',
            SUM(( CASE WHEN idgerbang = 99 THEN RpSMT ELSE 0 END )) AS 'CILANDAK_UTAMA_SMT',
            SUM(( CASE WHEN idgerbang = 99 THEN Rp ELSE 0 END )) AS 'CILANDAK_UTAMA_RK'
        FROM
            ( SELECT
                    tanggal,
                    SUM( rpsmt ) AS RpSMT,
                    idgerbang
                FROM
                    bcarekap AS bca
                WHERE
                    DATE_FORMAT( tanggal, '%Y-%m' ) <= '2018-12'
                GROUP BY
                    tanggal,
                    idgerbang
            ) smt LEFT JOIN
            ( SELECT
                    rk.Tanggal AS tanggal_rk,
                    rk.Rp,
                    rk.IdGerbang AS idgerbang_rk
                FROM
                    t_rekeningkoran AS rk
								INNER JOIN ( SELECT MAX( InsertTime ) AS maxInsertTime FROM t_rekeningkoran ) x2 ON rk.InsertTime = x2.maxInsertTime
                WHERE
                    DATE_FORMAT( rk.Tanggal, '%Y-%m' ) <= '2018-12'
                AND
                    rk.Bank='BCA'
                GROUP BY
                    rk.Tanggal,
                    IdGerbang
            ) rekeningkoran ON smt.idgerbang = rekeningkoran.idgerbang_rk
                    AND smt.tanggal = rekeningkoran.tanggal_rk
                GROUP BY
                    tanggal ) as SMT_RK";

	var $column_order = array('tanggal', 'CIPUTAT_1_SMT', 'CIPUTAT_1_RK', 'PONDOKPINANG_SMT', 'PONDOKPINANG_RK', 'FATMAWATI_2_SMT', 'FATMAWATI_2_RK', 'FATMAWATI_1_SMT', 'FATMAWATI_1_RK', 'AMPERA_2_SMT', 'AMPERA_2_RK', 'AMPERA_1_SMT', 'AMPERA_1_RK', 'LENTENG_AGUNG_2_SMT', 'LENTENG_AGUNG_2_RK', 'LENTENG_AGUNG_1_SMT', 'LENTENG_AGUNG_1_RK', 'GEDONG_2_SMT', 'GEDONG_2_RK', 'GEDONG_1_SMT', 'GEDONG_1_RK', 'KP_RAMBUTAN_SMT', 'KP_RAMBUTAN_RK', 'PS_REBO_SMT', 'PS_REBO_RK', 'DUKUH_1_SMT', 'DUKUH_1_RK', 'DUKUH_3_SMT', 'DUKUH_3_RK', 'LT_AGUNG_3_SMT', 'LT_AGUNG_3_RK', 'CILANDAK_UTAMA_SMT', 'CILANDAK_UTAMA_RK');
	var $column_search = array('tanggal', 'CIPUTAT_1_SMT', 'CIPUTAT_1_RK', 'PONDOKPINANG_SMT', 'PONDOKPINANG_RK', 'FATMAWATI_2_SMT', 'FATMAWATI_2_RK', 'FATMAWATI_1_SMT', 'FATMAWATI_1_RK', 'AMPERA_2_SMT', 'AMPERA_2_RK', 'AMPERA_1_SMT', 'AMPERA_1_RK', 'LENTENG_AGUNG_2_SMT', 'LENTENG_AGUNG_2_RK', 'LENTENG_AGUNG_1_SMT', 'LENTENG_AGUNG_1_RK', 'GEDONG_2_SMT', 'GEDONG_2_RK', 'GEDONG_1_SMT', 'GEDONG_1_RK', 'KP_RAMBUTAN_SMT', 'KP_RAMBUTAN_RK', 'PS_REBO_SMT', 'PS_REBO_RK', 'DUKUH_1_SMT', 'DUKUH_1_RK', 'DUKUH_3_SMT', 'DUKUH_3_RK', 'LT_AGUNG_3_SMT', 'LT_AGUNG_3_RK', 'CILANDAK_UTAMA_SMT', 'CILANDAK_UTAMA_RK');
	var $order = array('tanggal' => 'asc');

	public function __construct()
	{
		parent::__construct();
        // $this->dbATP = $this->load->database('atp', TRUE);
	}

  public function getDataExport($startdate, $gerbang)
  {
      // if ($gerbang!='') {
      //   $this->dbATP->where("Gerbang", $gerbang);
      // }
      //   $this->dbATP->select($this->select);
      //   $this->dbATP->from($this->table);
      //   $this->dbATP->where("DATE_FORMAT(`Tanggal`,'%Y-%c')", $startdate);
      //   $this->dbATP->group_by('Gerbang');
      //   $query = $this->dbATP->get();
      //   return $query->result_array();
  }

	private function _get_datatables_query()
	{
        //add custom filter here
        if($this->input->post('fltMonth'))
        {
            $this->db->where("DATE_FORMAT(`tanggal`,'%Y-%m')", $this->input->post('fltMonth'));
        }

        $this->db->select($this->select);
		$this->db->from($this->table);
        // $this->db->group_by('tanggal');

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}

	function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->select($this->select);
        $this->db->from($this->table);
        // $this->db->group_by('tanggal');
        return $this->db->count_all_results();
    }
}
