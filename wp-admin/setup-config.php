<?php
/**
 * Retrieves and creates the wp-config.php file.
 *
 * The permissions for the base directory must allow for writing files in order
 * for the wp-config.php to be created using this page.
 *
 * @internal This file must be parsable by PHP4.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * We are installing.
 *
 * @package WordPress
 */
define('WP_INSTALLING', true);

/**
 * We are blissfully unaware of anything.
 */
define('WP_SETUP_CONFIG', true);

/**
 * Disable error reporting
 *
 * Set this to error_reporting( E_ALL ) or error_reporting( E_ALL | E_STRICT ) for debugging
 */
error_reporting(0);

/**#@+
 * These three defines are required to allow us to use require_wp_db() to load
 * the database class while being wp-content/db.php aware.
 * @ignore
 */
define('ABSPATH', dirname(dirname(__FILE__)).'/');
define('WPINC', 'wp-includes');
define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
define('WP_DEBUG', false);
/**#@-*/

require_once(ABSPATH . WPINC . '/load.php');
require_once(ABSPATH . WPINC . '/version.php');
wp_check_php_mysql_versions();

require_once(ABSPATH . WPINC . '/compat.php');
require_once(ABSPATH . WPINC . '/functions.php');
require_once(ABSPATH . WPINC . '/class-wp-error.php');

if (!file_exists(ABSPATH . 'wp-config-sample.php'))
	wp_die('Beklager, vi trenger filen wp-config-sample.php for å ha noe å jobbe med. Venligst last opp denne igjen fra din WordPress-installasjon.');

$configFile = file(ABSPATH . 'wp-config-sample.php');

// Check if wp-config.php has been created
if (file_exists(ABSPATH . 'wp-config.php'))
	wp_die("<p>Filen 'wp-config.php' finnes allerede. Hvis du må tilbakestille noen konfigurasjoner i denne filen, vennligst slett den først. Du kan prøve å <a href='install.php'>installere nå</a>.</p>");

// Check if wp-config.php exists above the root directory but is not part of another install
if (file_exists(ABSPATH . '../wp-config.php') && ! file_exists(ABSPATH . '../wp-settings.php'))
	wp_die("<p>Filen 'wp-config.php' finnes allerede i mappen over din WordPress-installasjon. Hvis du må lage en ny, må du slette denne først. Du kan prøve å <a href='install.php'>installere nå</a>.</p>");

if (isset($_GET['step']))
	$step = $_GET['step'];
else
	$step = 0;

/**
 * Display setup wp-config.php file header.
 *
 * @ignore
 * @since 2.3.0
 * @package WordPress
 * @subpackage Installer_WP_Config
 */
function display_header() {
	header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WordPress &rsaquo; Lag konfigurasjonsfil</title>
<link rel="stylesheet" href="css/install.css" type="text/css" />

</head>
<body>
<h1 id="logo"><img alt="WordPress" src="images/wordpress-logo.png" /></h1>
<?php
}//end function display_header();

switch($step) {
	case 0:
		display_header();
?>

<p>Velkommen til WordPress. Før vi starter, trenger vi litt informasjon om databasen. Du må vite følgende før vi fortsetter.</p>
<ol>
	<li>Navn på databasen</li>
	<li>Databasebruker</li>
	<li>Databasepassord</li>
	<li>MySQL-Tjener</li>
	<li>Tabellprefiks (hvis du vil kjøre mer enn én WordPress-installasjon i en enkelt database)</li>
</ol>
<p><strong>Hvis den automatiske filopprettingen ikke fungerer, ikke fortvil. Alt som skjer er at den fyller inn databaseinformasjonen i en konfigurasjonsfil. Du kan like gjerne åpne <code>wp-config-sample.php</code> i en tekstredigerer, fylle inn din informasjon og lagre den som <code>wp-config.php</code>.</strong></p>
<p>Sannsynligvis får du denne informasjonen hos din nettjener (webhotell). Hvis du ikke har denne informasjonen, må du kontakte disse før du kan fortsette. Hvis du så er klar&hellip;</p>

<p class="step"><a href="setup-config.php?step=1<?php if ( isset( $_GET['noapi'] ) ) echo '&amp;noapi'; ?>" class="button">La oss fortsette!</a></p>
<?php
	break;

	case 1:
		display_header();
	?>
<form method="post" action="setup-config.php?step=2">
	<p>Nedenfor skriver du inn tilkoblingsdetaljene. Hvis du ikke er sikker på disse, kontakt tjeneren din (webhotellet ditt)</p>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="dbname">Databasenavn</label></th>
			<td><input name="dbname" id="dbname" type="text" size="25" value="wordpress" /></td>
			<td>Navnet på databasen som WP skal kjøres i. </td>
		</tr>
		<tr>
			<th scope="row"><label for="uname">Brukernavn</label></th>
			<td><input name="uname" id="uname" type="text" size="25" value="brukernavn" /></td>
			<td>Ditt MySQL-brukernavn</td>
		</tr>
		<tr>
			<th scope="row"><label for="pwd">Passord</label></th>
			<td><input name="pwd" id="pwd" type="text" size="25" value="passord" /></td>
			<td>...og ditt MySQL-passord.</td>
		</tr>
		<tr>
			<th scope="row"><label for="dbhost">Databasetjener</label></th>
			<td><input name="dbhost" id="dbhost" type="text" size="25" value="localhost" /></td>
			<td>Det skulle være mulig å få denne informasjonen fra din nettjener, hvis <code>localhost</code> ikke fungerer.</td>
		</tr>
		<tr>
			<th scope="row"><label for="prefix">Tabellprefiks</label></th>
			<td><input name="prefix" id="prefix" type="text" value="wp_" size="25" /></td>
			<td>Hvis du vil kjøre flere WordPress-installasjoner i samme database, må du endre dette.</td>
		</tr>
	</table>
	<?php if ( isset( $_GET['noapi'] ) ) { ?><input name="noapi" type="hidden" value="true" /><?php } ?>
	<p class="step"><input name="submit" type="submit" value="Send" class="button" /></p>
</form>
<?php
	break;

	case 2:
	$dbname  = trim($_POST['dbname']);
	$uname   = trim($_POST['uname']);
	$passwrd = trim($_POST['pwd']);
	$dbhost  = trim($_POST['dbhost']);
	$prefix  = trim($_POST['prefix']);
	if ( empty($prefix) )
		$prefix = 'wp_';

	// Validate $prefix: it can only contain letters, numbers and underscores
	if ( preg_match( '|[^a-z0-9_]|i', $prefix ) )
		wp_die( /*WP_I18N_BAD_PREFIX*/'<strong>FEIL</strong>: "Tabellprefiks" kan kun inneholde tall, bokstaver og understreker (_).'/*/WP_I18N_BAD_PREFIX*/ );

	// Test the db connection.
	/**#@+
	 * @ignore
	 */
	define('DB_NAME', $dbname);
	define('DB_USER', $uname);
	define('DB_PASSWORD', $passwrd);
	define('DB_HOST', $dbhost);
	/**#@-*/

	// We'll fail here if the values are no good.
	require_wp_db();
	if ( ! empty( $wpdb->error ) ) {
		$back = '<p class="step"><a href="setup-config.php?step=1" onclick="javascript:history.go(-1);return false;" class="button">Forsøk igjen</a></p>';
		wp_die( $wpdb->error->get_error_message() . $back );
	}

	// Fetch or generate keys and salts.
	$no_api = isset( $_POST['noapi'] );
	require_once( ABSPATH . WPINC . '/plugin.php' );
	require_once( ABSPATH . WPINC . '/l10n.php' );
	require_once( ABSPATH . WPINC . '/pomo/translations.php' );
	if ( ! $no_api ) {
		require_once( ABSPATH . WPINC . '/class-http.php' );
		require_once( ABSPATH . WPINC . '/http.php' );
		wp_fix_server_vars();
		/**#@+
		 * @ignore
		 */
		function get_bloginfo() {
			return ( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . str_replace( $_SERVER['PHP_SELF'], '/wp-admin/setup-config.php', '' ) );
		}
		/**#@-*/
		$secret_keys = wp_remote_get( 'https://api.wordpress.org/secret-key/1.1/salt/' );
	}

	if ( $no_api || is_wp_error( $secret_keys ) ) {
		$secret_keys = array();
		require_once( ABSPATH . WPINC . '/pluggable.php' );
		for ( $i = 0; $i < 8; $i++ ) {
			$secret_keys[] = wp_generate_password( 64, true, true );
		}
	} else {
		$secret_keys = explode( "\n", wp_remote_retrieve_body( $secret_keys ) );
		foreach ( $secret_keys as $k => $v ) {
			$secret_keys[$k] = substr( $v, 28, 64 );
		}
	}
	$key = 0;

	foreach ($configFile as $line_num => $line) {
		switch (substr($line,0,16)) {
			case "define('DB_NAME'":
				$configFile[$line_num] = str_replace("database_name_here", $dbname, $line);
				break;
			case "define('DB_USER'":
				$configFile[$line_num] = str_replace("'username_here'", "'$uname'", $line);
				break;
			case "define('DB_PASSW":
				$configFile[$line_num] = str_replace("'password_here'", "'$passwrd'", $line);
				break;
			case "define('DB_HOST'":
				$configFile[$line_num] = str_replace("localhost", $dbhost, $line);
				break;
			case '$table_prefix  =':
				$configFile[$line_num] = str_replace('wp_', $prefix, $line);
				break;
			case "define('AUTH_KEY":
			case "define('SECURE_A":
			case "define('LOGGED_I":
			case "define('NONCE_KE":
			case "define('AUTH_SAL":
			case "define('SECURE_A":
			case "define('LOGGED_I":
			case "define('NONCE_SA":
				$configFile[$line_num] = str_replace('angi din unike nøkkel her', $secret_keys[$key++], $line );
				break;
		}
	}
	if ( ! is_writable(ABSPATH) ) :
		display_header();
?>
<p>Beklager, kan ikke skrive <code>wp-config.php</code>-filen.</p>
<p>Du kan lage <code>wp-config.php</code> manuelt ved å kopiere følgende tekst inn i den.</p>
<textarea cols="98" rows="15" class="code"><?php
		foreach( $configFile as $line ) {
			echo htmlentities($line, ENT_COMPAT, 'UTF-8');
		}
?></textarea>
<p>Etter at du har gjort dette trykk "Kjør installering".</p>
<p class="step"><a href="install.php" class="button">Kjør installering</a></p>
<?php
	else :
		$handle = fopen(ABSPATH . 'wp-config.php', 'w');
		foreach( $configFile as $line ) {
			fwrite($handle, $line);
		}
		fclose($handle);
		chmod(ABSPATH . 'wp-config.php', 0666);
		display_header();
?>
<p>Alt er i orden! Du er ferdig med denne delen av installasjonen. WordPress kan nå kommunisere med din database. Hvis du er klar, er det på tide å&hellip;</p>

<p class="step"><a href="install.php" class="button">Kjør installering</a></p>
<?php
	endif;
	break;
}
?>
</body>
</html>
