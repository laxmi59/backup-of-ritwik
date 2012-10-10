<?php
include "model/school_reg_model.php";
class School_Controller {
 public $model;
	public function __construct(){
		$this->model= new School_Reg_Model;
	}
	public function invoke(){
		$school_list =$this->model->getSchools();
		include "view/index.php";
	}
}
?>