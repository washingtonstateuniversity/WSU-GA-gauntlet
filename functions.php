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
	$site_code = "ga-1";
	$host = $_SERVER['SERVER_NAME'];
	if (strpos($host,'.dev') != true) {
		$site_code = str_replace('.web','',extract_subdomains($_SERVER['http_host']));
	}

	$site_group_code=null;
	switch($site_code){
		case "ga-1":
		case "ga-2":
		case "ga-3":
			$site_group_code="current";
			$group_ga="UA-55556719-17";
			switch($site_code){
				case "ga-1":
					$_ga="UA-55556719-1";
					break;
				case "ga-2":
					$_ga="UA-55556719-2";
					break;
				case "ga-3":
					$_ga="UA-55556719-3";
					break;
			}
			break;
		case "ga-4":
		case "ga-5":
		case "ga-6":
			$site_group_code="ideal";
			$group_ga="UA-55556719-18";
			switch($site_code){
				case "ga-4":
					$_ga="UA-55556719-4";
					break;
				case "ga-5":
					$_ga="UA-55556719-5";
					break;
				case "ga-6":
					$_ga="UA-55556719-6";
					break;
			}
			break;
		case "ga-7":
		case "ga-8":
		case "ga-9":
			$site_group_code="controll";
			$group_ga="UA-55556719-19";
			switch($site_code){
				case "ga-7":
					$_ga="UA-55556719-7";
					break;
				case "ga-8":
					$_ga="UA-55556719-8";
					break;
				case "ga-9":
					$_ga="UA-55556719-9";
					break;
			}
			break;
		case "ga-10":
		case "ga-11":
		case "ga-12":
			$site_group_code="jtrack";
			$group_ga="UA-55556719-20";
			switch($site_code){
				case "ga-10":
					$_ga="UA-55556719-10";
					break;
				case "ga-11":
					$_ga="UA-55556719-11";
					break;
				case "ga-12":
					$_ga="UA-55556719-12";
					break;
			}
			break;
		case "ga-13":
		case "ga-14":
		case "ga-15":
			$site_group_code="tag_man";
			$group_ga="UA-55556719-21";
			switch($site_code){
				case "ga-13":
					$_ga="UA-55556719-13";
					break;
				case "ga-14":
					$_ga="UA-55556719-14";
					break;
				case "ga-15":
					$_ga="UA-55556719-15";
					break;
			}
			break;
		default:
			//nothing to do
	}
	
	
	//leave it as something exentable
	$GLOBALS['gauntlet'] = array(
		'base_code'		=> $site_code,
		'code'			=> $site_group_code,
		'group_ga'		=> $group_ga,
		'site_ga'		=> $_ga
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
	?>

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"/>
<script type="text/javascript">
	var base_code = "<?=get_gauntlet_attr("base_code")?>";
	var site_code = "<?=get_gauntlet_attr("code")?>";
	var themePath = "<?=get_stylesheet_directory_uri()?>";
	$=jQuery;
</script>
<?php }

/**
 * Set up any head blocks if they exist
 */
add_action('wp_head','set_head_block');
function set_head_block() {
	get_template_part('parts/head/'.get_gauntlet_attr("code"));
}

/**
 * Set up any footer blocks if they exist
 */
add_action('wp_footer','set_footer_block');
function set_footer_block() {
	get_template_part('parts/footer/'.get_gauntlet_attr("code"));
}





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
	wp_enqueue_script( 'site.js', get_stylesheet_directory_uri() . '/scripts/site.js', array( 'jquery' ), false, true );
	if(file_exists(get_stylesheet_directory() . '/scripts/site-'.$code.'.js')){
		wp_enqueue_script( 'site-'.$code.'.js', get_stylesheet_directory_uri() . '/scripts/site-'.$code.'.js', array( 'jquery' ), false, true );
	}
	
	wp_enqueue_script( 'test_drive.js', get_stylesheet_directory_uri() . '/scripts/test_drive.js', array( 'jquery' ), false, true );

}
