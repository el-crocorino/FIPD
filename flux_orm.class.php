<?php

	require_once('functions.php');

	class flux_orm {

		/**
		 * Url of RSS flux
		 *
		 * @var string
		 */
		protected $url = NULL;

		/**
		 * Show title
		 * 
		 * @var string
		 */
		protected $title = NULL;

		
		/**
		* XML filename
		*
		* @var string
		*/
		protected $filename = NULL;

		public function get_url() {
			return $this->url;
		}

		public function set_url($url) {
			check_string($url, 'url');
			$this->url = $url;
		}

		public function get_title() {
			return $this->title;
		}

		public function set_title($title) {
			check_string($title, 'title');
			$this->title = $title;
		}

		public function get_filename() {
			return $this->filename;
		}

		public function set_filename($filename) {
			check_string($filename, 'filename');
			$this->filename = $filename;
		}

		public function __construct($title, $url) {
			$this->set_title($title);
			$this->set_url($url);
			$this->set_filename($this->get_title() . '.xml');

		}

		

	}