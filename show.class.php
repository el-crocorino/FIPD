<?php

	require_once('functions.php');
	require_once('show_orm.class.php');


	class show extends show_orm {

		/**
		 * Get show file
		 * 
		 * @return NULL
		 */
		public function get_file() {

			$ch = curl_init($this->get_url());

			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

			$this->set_ressource(curl_exec($ch));
			curl_close($ch);

		}

		/**
		 * Save show file
		 * 
		 * @return NULL
		 */
		public function save_file() {

			$dirname = 'FIPodcastDowloader/' . $this->get_show_name();

			if (!file_exists($dirname)) {
				mkdir($dirname);	
			}
			
			$filename = $dirname . '/' . $this->get_date() . ' - ' . $this->get_show_name() . ' - ' . $this->get_title() . '.mp3';

			if (file_exists($filename)){
	            echo "Already saved: " . $filename . "\r\n";
	        } else {

		        $fhandle = fopen($filename, "w+");

		        if ($fhandle) {

					$this->get_file();

		            fwrite($fhandle, $this->get_ressource());
		            fclose($fhandle);

		            echo "saved: " . $filename . "\r\n";

		        } else if (isset($error)) {

		            throw new Exception("File reading denied to " . $file . " !!!");
		        }

	        }
	        
		}

	}