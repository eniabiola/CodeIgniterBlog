<?php
	/**
	 * 
	 */
	class Pages extends CI_Controller
	{
		// function __construct(argument)
		// {
		// 	# code...
		// }

		public function view($page = 'home'){
			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				// echo $page;
				show_404();
			}

			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}