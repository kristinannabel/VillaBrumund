<?php
/**
 * Grunnkonfigurasjonen til WordPress.
 *
 * Denne filen inneholder følgende konfigurasjoner: MySQL-innstillinger, tabellprefiks,
 * hemmelige nøkler, WordPress-språk og ABSPATH. Du kan finne mer informasjon
 * ved å besøke {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex-siden. Du kan få MySQL-innstillingene fra din nettjener.
 * 
 * Denne filen brukes av koden som lager wp-config.php i løpet av
 * installasjonen. Du trenger ikke å bruke nettstedet til å gjøre det, du trenger bare
 * å kopiere denne filen til "wp-config.php" og fylle inn verdiene.
 *
 * @package WordPress
 */

// ** MySQL-innstillinger - Dette får du fra din nettjener ** //
/** Navnet på WordPress-databasen */
define('DB_NAME', 'skole_emneokri');

/** MySQL-databasens brukernavn */
define('DB_USER', 'emneo');

/** MySQL-databasens passord */
define('DB_PASSWORD', 'emneo');

/** MySQL-tjener */
define('DB_HOST', 'emilkje.net');

/** Tegnsettet som skal brukes i databasen for å lage tabeller. */
define('DB_CHARSET', 'utf8');

/** Databasens "Collate"-type. La denne være hvis du er i tvil. */
define('DB_COLLATE', '');

/**#@+
 * Autentiseringsnøkler og salter.
 *
 * Endre disse til unike nøkler!
 * Du kan generere nøkler med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan når som helst endre disse nøklene for å gjøre aktive cookies ugyldige. Dette vil tvinge alle brukere å logge inn igjen.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'A@$4MYJ:Ya[D=j>?vqm26-h.80]gL+,nIeG4vap6+%/8Y@47l{@{~j|*+&cEg uq');
define('SECURE_AUTH_KEY',  '-*F|yX[;nk4c|=!K._30/wssGlx$sFX(y5<&=n;;Ub`z3vn#.`eFK*g,!z-P},W|');
define('LOGGED_IN_KEY',    'I%OqT~iqJH ed*@Zx(`BM8}DBi$ )!Ug[;{B.7B4fUyYt9Pl6j9WY+zrB@d$Jc5y');
define('NONCE_KEY',        'rwxU-iD#mF^|Flbx^@m(9F?y)0|jEe}<FAU,q0*O]xWJd0%:DJe<FY=l-7`~9z+:');
define('AUTH_SALT',        ')!tqbsm&[~B9XB+o11ksp8MtScE`=AyobY_vz#TcAlVI`)O2#r/YZ:yMM5UPP?w&');
define('SECURE_AUTH_SALT', ']Hw#,&dfzC3dW@%rnkF)eh3Mw/0zM8r5(C`(#!lUikD-T7]#giAk2{:X~QF8DP..');
define('LOGGED_IN_SALT',   'FMsQEZ>Q53m;c3vvJ;abXp/YSx1rf%yy#sf$K}Ig6{r(R1y3CDZ@mZ>g5sNM3_fx');
define('NONCE_SALT',       'pMv.{)]YU:h^V2l}QAzno^{WUv*oe7p68UdEtPx+=V,ZY:XTs-v9B!9N6D/7daiB');

/**#@-*/

/**
 * WordPress-databasens tabellprefiks.
 *
 * Du kan ha flere installasjoner i en databasehvis du gir dem hver deres unike
 * prefiks. Kun tall, bokstaver og understrek (_), takk!
 */
$table_prefix  = 'wp_emneo2';

/**
 * WordPress-språk, forhåndsinnstilt til norsk (bokmål).
 *
 * Du kan endre denne linjen for å bruke WordPress på et annet språk. En tilsvarende MO-fil for
 * det valgte språket må installeres i wp-content/languages. For eksempel, installer
 * de.mo i wp-content/languages og sett WPLANG til 'de' for å aktivere språkstøtte
 * på tysk.
 */
define('WPLANG', 'nb_NO');

/**
 * For utviklere: WordPress-feilsøkingstilstand.
 *
 * Sett denne til "true" for å aktivere visning av meldinger under utvikling.
 * Det er sterkt anbefalt at innstikks- og tema-utviklere bruker WP_DEBUG
 * i deres utviklermiljøer.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
