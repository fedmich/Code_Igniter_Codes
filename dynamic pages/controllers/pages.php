<?php
if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Pages extends CI_Controller {

	public function view($page = 'home') {
		$data['title'] = $page;

		if (!file_exists('application/views/pages/' . $page . '.php')) {
			$this->load->view('templates/header', $data);
			$this->load->view('pages/404.php', $data);
			$this->load->view('templates/footer', $data);
			return false;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer', $data);
	}

}
