<?php
define('DB_NAME', 'wwtapr_okbr');
define('DB_USER', 'siteok');
define('DB_PASSWORD', '1viP7kWJ5YfF57mE');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('AUTH_KEY',         '5(w+9%Yfy+TC]{Pp=|~Qes+3H0 H_I,3QXas4;7-#`(sA_26la2XAX$ZgmA4`-zA');
define('SECURE_AUTH_KEY',  'y8b]Y dz,$VU8}E+/-Rgk,=8;ZO2pqVHfLY{&Vg5u:*&9L8R)-W##`_p[PMj/Jkc');
define('LOGGED_IN_KEY',    '?L4(9W5GN&4v/Y_Z-q2++><>^mc-R[{|5L1BUf)7Rqfi]q[!ZX7Zh=,5n<cY%iy<');
define('NONCE_KEY',        'f91lCz-R)/27MQLAj|Bwzbbc}t3|~K)gy7|Xsl.5/z$b&>VE=T(|2lX-+{*>I?eE');
define('AUTH_SALT',        'NBGM`B:QfIS,1`frp<^~9N3@-i`_Fv+n+u0UjTGP+//{m~N,ub,;DxHLw7~MnY.$');
define('SECURE_AUTH_SALT', 'u uos+f@&yL7MAD>3UH OktwJ:V(0~Tizy;|>W+h5s$6[8(J&?~h<C{3Pw+n|ZEo');
define('LOGGED_IN_SALT',   '5&h>W{m$)2VLzel$l%OuWEE^U)%rWO?8P,ZWka)@CqdT~,$8bCb7{;qS,#~QgI)g');
define('NONCE_SALT',       '>CMp%|F~DHi=~8v2-/%76T_19S?K^LAw^:RF~W#Lp.fgipg8+a{}8Q3i`C7(1~.H');
$table_prefix = 'ok_';

define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );

if ( !defined('ABSPATH') ) define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
