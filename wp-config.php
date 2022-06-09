<?php
# Database Configuration
define( 'DB_NAME', 'wp_xperi2022' );
define( 'DB_USER', 'xperi2022' );
define( 'DB_PASSWORD', '5nAtqOmUHKUoqwJ98DXm' );
define( 'DB_HOST', '127.0.0.1:3306' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'r`^j,>6|cfBZSen-`A-y{--[RBW;3W[WU&kd.KWJ=sd&d_R3}0E%Fp8*5?~i8X$d');
define('SECURE_AUTH_KEY',  '~`1F,%;`IE_gI;WsQX@hVyR0LF|8(SVrK/Why9|p3*`g[#*O[!J NgZhbUGaY`$y');
define('LOGGED_IN_KEY',    ';!h(q!&W|!QKKWlrdGc}VQts<^ku3?IlR2eg3lS+A|L2g<0~;xs(IKr^b1jg?Po>');
define('NONCE_KEY',        'ZDkhQJL@AJ$4!==FfRL 1X9BhntEvgNE,$a||q6[2NK~&-*U!ZER.h=udoY&@h,l');
define('AUTH_SALT',        'VL/zAR_P$mbas`zN p7@?,ML+!76<lL/uMn|l+C`OzmfQkbT@<XAs(XDx+_P,9rV');
define('SECURE_AUTH_SALT', '@0tZe9#t>pzKH|gzi~-AoL0kJ&C#hZHA.eh o!%^B+6:A&&QlWIX*-Rx.3f8&)zd');
define('LOGGED_IN_SALT',   'zWnMRJ=KK*VogY}Gd`K_rSF:H6nGDlFy1D[}X+mm}|!VN+;Hm>. 3;Z(I{b`b2yf');
define('NONCE_SALT',       'v&>LLA*IS6JWp[mn}:|tU@K_d:n9e[scf;^un.*i+oNuLjofm(R+kH$/J,OHb<,I');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'xperi2022' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', 'a38008a65d94673ebd54e3a0506c945f8061c88b' );

define( 'WPE_CLUSTER_ID', '101079' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'xperi2022.wpengine.com', 1 => 'xperi2022.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => 'pod-101079', );

$wpe_special_ips=array ( 0 => '104.154.167.205', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
