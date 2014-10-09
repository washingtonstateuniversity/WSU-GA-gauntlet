<?php
$gauntlet=null;
function extract_domain($domain){
    if(preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches)){
        return $matches['domain'];
    } else {
        return $domain;
    }
}
function extract_subdomains($domain){
    $subdomains = $domain;
    $domain = extract_domain($subdomains);

    $subdomains = rtrim(strstr($subdomains, $domain, true), '.');

    return $subdomains;
}



add_action( 'wp_loaded', 'set_gauntlet' );
function set_gauntlet(){
	$site_code = "ga-12";
	$host = $_SERVER['SERVER_NAME'];
	if (strpos($host,'.dev') != true) {
		$site_code = extract_subdomains($_SERVER['http_host']);
	}

	$site_group_code=null;
	switch($site_code){
		case "ga-1":
		case "ga-2":
		case "ga-3":
			$site_group_code="current";
			break;
		case "ga-4":
		case "ga-5":
		case "ga-6":
			$site_group_code="ideal";
			break;
		case "ga-7":
		case "ga-8":
		case "ga-9":
			$site_group_code="controll";
			break;
		case "ga-10":
		case "ga-11":
		case "ga-12":
			$site_group_code="jtrack";
			break;
		case "ga-13":
		case "ga-14":
		case "ga-15":
			$site_group_code="tag_man";
			break;
		default:
			//nothing to do
	}
	
	
	//leave it as something exentable
	$GLOBALS['gauntlet'] = array(
		'code'  => $site_group_code
	);
}

function get_gauntlet_attr($attr=""){
	global $gauntlet;
	return isset( $gauntlet[$attr] ) ? $gauntlet[$attr] : false;
}

/**
 * set up the site vars in the dom
 */
add_action('wp_head','set_site_code');
function set_site_code() {
	?><script type="text/javascript">
	var site_code = "<?=get_gauntlet_attr("code")?>";
	var themePath = "<?=get_stylesheet_directory_uri()?>";
	$=jQuery;
</script>
<?php }


add_action( 'wp_enqueue_scripts', 'gauntlet_scripts' );
/**
 * Enqueue child theme Javascript files.
 */
function gauntlet_scripts() {
	wp_enqueue_script( 'freezer.js', get_stylesheet_directory_uri() . '/scripts/freezer.js', array( 'jquery' ), false, true );
	$code = get_gauntlet_attr("code");
	switch($code){
		case "current":
			// nothing yet
			break;
		case "ideal":
			// nothing yet
			break;
		case "controll":
			// nothing yet
			break;
		case "jtrack":
			wp_enqueue_script( 'jtrack.min.js', get_stylesheet_directory_uri() . '/scripts/jtrack.min.js', array( 'jquery' ), false, true );
			break;
		case "tag_man":
			// nothing yet
			break;
		default:
			//nothing to do
	}
	
	if(file_exists(get_stylesheet_directory() . '/scripts/site-'.$code.'.js')){
		wp_enqueue_script( 'site-'.$code.'.js', get_stylesheet_directory_uri() . '/scripts/site-'.$code.'.js', array( 'jquery' ), false, true );
	}
}
