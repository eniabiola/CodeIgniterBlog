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

			$data['categories'] = $this->category_model->get_categories();

			// print_r($data['categories']);

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data );
			$this->load->view('templates/footer');
			} else {
				//upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				// $config['max_width'] = '500';
				// $config['max_height'] = '500'; 

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload()) {
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.png'; 
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				
				$this->post_model->create_post($post_image);
				redirect('posts');
			}

		}

		public function edit($slug)
		{
			// echo $slug;
			$data['post'] = $this->post_model->get_posts($slug);
			$data['categories'] = $this->category_model->get_categories();
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