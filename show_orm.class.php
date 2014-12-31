<?php

	require_once('functions.php');

	class show_orm {

		/**
		 * Show title
		 * 
		 * @var string
		 */
		protected $title = NULL;

		/**
		 * Show date
		 * 
		 * @var string
		 */
		protected $date = NULL;

		/**
		 * Show url
		 * 
		 * @var string
		 */
		protected $url = NULL;

		/**
		 * Show name
		 * 
		 * @var string
		 */
		protected $show_name = NULL;

		/**
		 * Show ressource
		 * 
		 * @var string
		 */
		protected $ressource = NULL;

		public function get_title() {
			return $this->title;
		}

		public function set_title($title) {
			$this->title = $title;
		}

		public function get_date() {
			return $this->date;
		}

		public function set_date($date) {
			$this->date = $date;
		}

		public function get_url() {
			return $this->url;
		}

		public function set_url($url) {
			$this->url = $url;
		}

		public function get_show_name() {
			return $this->show_name;
		}

		public function set_show_name($show_name) {
			$this->show_name = $show_name;
		}

		public function get_ressource() {
			return $this->ressource;
		}

		public function set_ressource($ressource) {
			$this->ressource = $ressource;
		}

		public function __construct($show_name, $title, $url) {

			$this->set_show_name($show_name);
			$this->set_title(trim($title->__toString()));
			$this->set_url($url->__toString());
			$this->set_date($this->get_date_from_url($url));

		}

		/**
		 * Get date from url 
		 * 
		 * @param  string $url show url
		 * @return string      show publication date
		 */
		public function get_date_from_url($url) {

			preg_match('/-(\d{2}.\d{2}.\d{4})-/', $url->__toString(), $match);
			
			if (!empty($match)) {
				$date = new DateTime(str_replace('.', '-',$match[1]));
				
				return $date->format('Ymd');

			} else {
				return false;
			}
			

		}

	}