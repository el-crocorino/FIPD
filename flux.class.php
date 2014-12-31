<?php

	require_once('functions.php');
	require_once('flux_orm.class.php');


	class flux extends flux_orm {

		/**
		 * get XML files fom flux
		 * @param  string $url url of RSS Flux
		 * @return [type]      [description]
		 */
		public function get_xml() {

			$ch = curl_init($this->get_url());

			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$ressource = curl_exec($ch);
			curl_close($ch);
			
			return $ressource;

		}

	}