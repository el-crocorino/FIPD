<?php

require_once('functions.php');
require_once('flux.class.php');
require_once('show.class.php');

date_default_timezone_set('Europe/Paris');


$shows = array(	'Humeur Vagabonde' => array('rss' =>'http://radiofrance-podcast.net/podcast09/rss_10054.xml', 'classname' => 'show_humeur_vagabonde'),
				'Sur les épaules de Darwin' => array('rss' =>'http://radiofrance-podcast.net/podcast09/rss_11549.xml', 'classname' => 'show_sur_les_epaules_de_darwin'),
				'Ça peut pas faire de mal' => array('rss' =>'http://radiofrance-podcast.net/podcast09/rss_11262.xml', 'classname' => 'show_ca_peut_pas_faire_de_mal'),
				'Le masque et la plume' => array('rss' =>'http://radiofrance-podcast.net/podcast09/rss_14007.xml', 'classname' => 'show_le_masque_et_la_plume'));

foreach ($shows as $show_name => $show_infos) {

	$flux = new flux($show_name, $show_infos['rss']);
	$flux->get_xml();
	
	$xml = new SimpleXMLElement($flux->get_xml());

	foreach($xml->channel->item AS $item) {

		require_once($show_infos['classname'] . '.class.php');
		
		$show = new $show_infos['classname']($show_name, $item->title, $item->guid);
		$show->save_file();

	}

}

?>