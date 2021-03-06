<?php
	/**
	 * 
	 */
	class Posts extends CI_Controller
	{
		// function __construct(argument)
		// {
		// 	# code...
		// }
		public function index(){
			$data['title'] = ucfirst('Latest Posts');

			$data['posts'] = $this->post_model->get_posts();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data );
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL)
		{
			$data['post'] = $this->post_model->get_posts($slug);
			if (empty($data['post'])) {
				show_404();
			}
			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function create ($value='')
		{
			$data['title'] = 'Create Posts';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data );
			$this->load->view('templates/footer');
			} else {
				$this->post_model->create_post();
				redirect('posts');
			}

		}

		public function edit($slug)
		{
			// echo $slug;
			$data['post'] = $this->post_model->get_posts($slug);
			if (empty($data['post'])) {
				// echo $slug;
				show_404();
			}
			$data['title'] = 'Edit Post';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function delete($id)
		{
			$this->post_model->delete_post($id);
			redirect('posts');
		}

		public function update()
		{
			$this->post_model->update_post();
			redirect('posts');
		}
	}