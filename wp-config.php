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
define('AUTH_KEY',         ']2Wm`97ooYcdlr8KMRPa|i$Nnf^dX:O1D)4J-[.^A+M=~mK8Ab3uJ+SWc<0$l}/5');
define('SECURE_AUTH_KEY',  '6f+<lxpQKHs3!du-3Rk}pe#CE6e4-kp(0_@crZ-2[Prt~9zV^yI7er>;GhR8pY/E');
define('LOGGED_IN_KEY',    'nTjT(0irTPjoy5CjN}X2Ho$WgiSSew.cfb8IEfVGkN7_*RD^!cZ{wLDK6!Yn$vsI');
define('NONCE_KEY',        '3HU{Q!l]`XNu~nBgEtoL3[EV20+C(Ea8+yQ3|f]sd}MZFe/8laKzj`_IZ!6`wW2j');
define('AUTH_SALT',        '`|yR{o&Cy8!9D J!CG325yNif.[5U^meFde_puT0_8mB9td)@8Li<e1}_p$H04nA');
define('SECURE_AUTH_SALT', 'f[SYVAh;Iohf&pd47=,BvJ@: X$` Ymo#/Ho!B1{VJX:~Tg-8j+9./:`!>B7tJT]');
define('LOGGED_IN_SALT',   '7{^2$`t5F5M>0J@V)I;[l^lf5wlir<7XrZTI!Go-)E$k1J=,FnAGwN:|Laux5<4p');
define('NONCE_SALT',       '!pB]}CRT}Z_(ZEUEw!1UwXWBTaL87c6ugna#p<S_=`jBB--9Y>n@#>w$$$AT.-1{');

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
