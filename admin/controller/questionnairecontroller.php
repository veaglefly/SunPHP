<?php
class QuestionnaireController extends Sun_Controller
{
	function qnlist()
	{
		$M = new Sun_Model;
		$qns = $M->table("questionnaire")->order("`datetime` DESC")->page(10)->selectall();
		$show_page = $M->show(2);
		$data['qns'] = $qns;
		$data['showpage'] = $show_page;
		
		$this->display("common");
		$this->display("header");
		$this->display("qn_list", $data);
		$this->display("footer");
	}

	function qncount()
	{
		$M = new Sun_Model;
		$countnum = $M->table("questionnaire")->num_rows();
		$ping1 = $M->table("questionnaire")->where("`zongping`='1'")->num_rows();
		$ping2 = $M->table("questionnaire")->where("`zongping`='2'")->num_rows();
		$ping3 = $M->table("questionnaire")->where("`zongping`='3'")->num_rows();
		$ping4 = $M->table("questionnaire")->where("`zongping`='4'")->num_rows();
		$sifeng = $M->table("questionnaire")->where("`sifeng`!=''")->num_rows();
		$liyi = $M->table("questionnaire")->where("`liyi`!=''")->num_rows();
		$fazhan = $M->table("questionnaire")->where("`fazhan`!=''")->num_rows();
		$data['countnum'] = $countnum;
		$data['ping1'] = $ping1;
		$data['ping2'] = $ping2;
		$data['ping3'] = $ping3;
		$data['ping4'] = $ping4;
		$data['sifeng'] = $sifeng;
		$data['liyi'] = $liyi;
		$data['fazhan'] = $fazhan;

		$this->display("common");
		$this->display("header");
		$this->display("qn_count", $data);
		$this->display("footer");
	}

	function viewqn()
	{
		global $_URL;
		$id = clean($_URL[3]);
		$M = new Sun_Model;
		$qn = $M->table("questionnaire")->where("`id`='$id'")->selectone();
		$data['qn'] = $qn;
		if ($qn) {
			$this->display("common");
			$this->display("header");
			$this->display("qn_view", $data);
			$this->display("footer");
		} else {
			$this->_empty();
		}
	}

	function viewcount()
	{
		global $_URL;
		$type = clean($_URL[3]);
		$M = new Sun_Model;
		if ($type == "sifeng") {
			$qns = $M->table("questionnaire")->where("`sifeng`!=''")->order("`datetime` DESC")->page(10)->selectall();
			$data['title'] = "领导四风";
			$data['type'] = 1;
		} else if ($type == "liyi") {
			$qns = $M->table("questionnaire")->where("`liyi`!=''")->order("`datetime` DESC")->page(10)->selectall();
			$data['title'] = "师生利益";
			$data['type'] = 2;
		} else if ($type == "fazhan"){
			$qns = $M->table("questionnaire")->where("`fazhan`!=''")->order("`datetime` DESC")->page(10)->selectall();
			$data['title'] = "学院发展";
			$data['type'] = 3;
		}
		$show_page = $M->show(2);
		$data['qns'] = $qns;
		$data['showpage'] = $show_page;
		$this->display("common");
		$this->display("header");
		$this->display("qn_countview", $data);
		$this->display("footer");
	}
}
?>