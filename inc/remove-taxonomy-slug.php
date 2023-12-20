<?php

add_filter('request', 'change_term_request', 1, 1 );

function change_term_request($query){

	$tax_name = 'product-category'; // Especifica el nombre de tu taxonomía aquí, también puede ser 'category' o 'post_tag'

	// La solicitud para las subcategorías es diferente, debemos realizar una comprobación adicional
	if (isset($query['attachment'])) {
		$include_children = true;
		$name = $query['attachment'];
	} else {
		$include_children = false;
		$name = (isset($query['name'])) ? $query['name'] : '';
	}

	$term = get_term_by('slug', $name, $tax_name); // Obtén el término actual para asegurarte de que exista

	if (isset($name) && $term && !is_wp_error($term)) { // Verifica aquí

		if ($include_children) {
			unset($query['attachment']);
			$parent = $term->parent;
			while ($parent) {
				$parent_term = get_term($parent, $tax_name);
				$name = $parent_term->slug . '/' . $name;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
	}

	switch ($tax_name):
		default:{
			$query[$tax_name] = $name; // para otras taxonomías
			break;
		}
		endswitch;

	}

	return $query;

}

add_filter( 'term_link', 'rudr_term_permalink', 10, 3 );

function rudr_term_permalink( $url, $term, $taxonomy ){

	$taxonomy_name = 'product-category'; // nombre de tu taxonomía aquí
	$taxonomy_slug = 'product-category'; // el slug de la taxonomía puede ser diferente del nombre de la taxonomía (como 'post_tag' y 'tag')

	// Sale de la función si el slug de la taxonomía no está en la URL
	if (strpos($url, $taxonomy_slug) === false || $taxonomy != $taxonomy_name) {
		return $url;
	}

	$url = str_replace('/' . $taxonomy_slug, '', $url);

	return $url;
}
