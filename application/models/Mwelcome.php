<?php
if (!defined('BASEPATH')){ exit('No direct script access allowed');}

class Mwelcome extends CI_Model{

  public function __construct(){
		parent::__construct();
	}

  //Mengambil semua data dari satu tabel
  public function get_all(){
    $query = $this->db->query("SELECT * FROM USERINFO WHERE SSN='ppt' ORDER BY Badgenumber ASC");

    return $query;
  }

  public function get_userone($userid){
    $query = $this->db->query("SELECT * FROM USERINFO WHERE USERID='".$userid."'");

    return $query;
  }

  public function get_checkinout($userid){
    // $query = $this->db->query("SELECT * FROM CHECKINOUT WHERE USERID=$userid");
    $query = $this->db->query("SELECT c.USERID, c.CHECKTIME, c.CHECKTYPE, c.VERIFYCODE, c.SENSORID, c.WorkCode, c.sn, c.UserExtFmt,
                              u.Name
                              FROM USERINFO AS u INNER JOIN CHECKINOUT as c ON u.USERID = c.USERID WHERE c.USERID=$userid
                              ORDER BY c.CHECKTIME ASC");
    return $query;
  }

	public function get_all2($tabel, $order){
		$this->db->from($tabel);
		$this->db->order_by($order);
		$query = $this->db->get();

		return $query;
	}
}
?>
