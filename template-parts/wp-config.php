<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'frenchteyqvivian' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'frenchteyqvivian' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'qdk63cbb2SmQ' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'frenchteyqvivian.mysql.db' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'd0M[4)OtG-{! uRFo<&$zV9`WNPo!SA[rt%63xo3dOu#3Q/pFe:E|BeBq*TtF+48' );
define( 'SECURE_AUTH_KEY',  'gI`Zq~FG_x)La3)[Banu$#1/T:a&DWy$tLpchIr|?YB0C=1Sb9Z!xIE9^@5=Gy%Q' );
define( 'LOGGED_IN_KEY',    '  P?PMoK:ZWQE>K$}^b mop/OD#e_>J!;4M-d%0E}[,q]W8]m{0G@Gj6Y[dVJG6+' );
define( 'NONCE_KEY',        '`B]KnO2b+cjexItR3grt^GVriD,-QhQ9)t@jbcIrWbbpN#s:YJE@a:sETuxm`7>X' );
define( 'AUTH_SALT',        '=O/}jivflM?BX1::jUJ)0x-^nCqdMDPlu6DV!F+;/hrFqYFj}I1%7!Xz,Rhx@yfU' );
define( 'SECURE_AUTH_SALT', 'iIeB8@tw?vv;6F(kA3.&w*RvtYdj[mWteRfv9~g{*vpr,R@5WTmF^$QoN4HlC~f[' );
define( 'LOGGED_IN_SALT',   'll0L$;Yb=`HQv&p-S~d,K+B#~BK7_3roUM1xkx*(<!(GuTur}uz1[j/4&.33J+A=' );
define( 'NONCE_SALT',       '%q>1gt+;WnmG8TM6v555(pL#1^4>t<0o_@X3*A(G7YBhfuT:F`yJJ[L1IL)ab B/' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'cdfo_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
