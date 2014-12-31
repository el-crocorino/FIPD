<?php

	require_once('functions.php');
	require_once('show_orm.class.php');


	class show_le_masque_et_la_plume extends show {

		/**
		 * Save show file
		 * 
		 * @return NULL
		 */
		public function save_file() {

			if (preg_match('/.*?film.*?/', $this->get_title())) {
				parent::save_file();
			}

		}
	}