<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'pascal-cv' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'pascal-cv' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'pascal-cv' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'T?-8?O&r~J!GL,NlO/H@7||kPIEEsOr#~SXlHInyLep$fmA>~*d[Y9sT#E+50^!Q' );
define( 'SECURE_AUTH_KEY',  'x0Z;Z3kP~X?nk150kS|]V3V-;v`=4oF%57N>Nu0(fHVkAaQxX@^7&b;Xnd$*jG4.' );
define( 'LOGGED_IN_KEY',    'tz Ed5j &3cW7f>$EGh9dCC~3UXsaf;|/1.Y.O];XRTPQ*8VpQG9mT4b1}nqxM[t' );
define( 'NONCE_KEY',        'Sn.|fS-Dr[4%;KXZu,l!]ked-dJTRua|l7ZLJ8kM#U==1U>j72CpZ_7C1<*]c@kj' );
define( 'AUTH_SALT',        '!bW?c|$^CQd{_QvE:?]A,7D{a<wnFBt&TIZ{~esyzU]1i3?Tj}c i0 &6K[XI~6K' );
define( 'SECURE_AUTH_SALT', '3XmJY(0$lE3lvpF[h_%+tS)|g%387tYh|=2wVyZ;o*sT50A{$nT4win.;j~alPtX' );
define( 'LOGGED_IN_SALT',   '{:!QcSSTJw?6XVjPwu)e}/[Z0wSA[=P=]W0[H3K)_Z@&3GPrWwMwa&b_1obpwu@^' );
define( 'NONCE_SALT',       '|ejTXmN0?BaiKQH$#]Q$,Yn/4S,bMTybui{oe+7g8U<sVmH,]o|UCC&cEszyJF(V' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/*
Sachant que WordPress ne nous permet pas de gérer l'environnement dans lequel est exécuté notre WordPress, nous mettons la fonctionnalités en place nous-même en créant une constante qui n'est comprise que pas notre code.
*/
// define( 'ENVIRONMENT', 'development' );
// define( 'ENVIRONMENT', 'staging' );
define( 'ENVIRONMENT', 'production' );
/**
 * Additionnal configuration constants
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php
 */
if ( defined( 'ENVIRONMENT' ) ) { // Je vérifie que la constante ENVIRONMENT existe
    if ( ENVIRONMENT === 'development' ) {
        define( 'WP_DEBUG_DISPLAY', true ); // Affichage des erreurs PHP/WordPress directement dans le code HTML
        define( 'WP_DEBUG_LOG', false );
        define( 'DISALLOW_FILE_MODS', false ); // Activation de l'ajout des fichiers de traduction, thèmes et plugins
        define( 'FS_METHOD', 'direct' ); // Activation du téléchargement direct des fichiers de traduction, plugins et thèmes
        define( 'WP_POST_REVISIONS', false ); // Désactivation du sytème de révions des contenus
        define( 'SCRIPT_DEBUG', true ); // Activation du débogage des CSS et JS de WordPress
        define( 'EMPTY_TRASH_DAYS', 0 ); // Désactivation de la corbeille
    } elseif ( ENVIRONMENT === 'staging' ) {
        define( 'WP_DEBUG_DISPLAY', false );
        define( 'WP_DEBUG_LOG', true ); // Ecriture des erreurs PHP/WordPress dans un fichier de log
        define( 'DISALLOW_FILE_MODS', true ); // Désactivation de l'ajout et des mises à jour des thèmes et plugins dans le backoffice
        define( 'WP_POST_REVISIONS', 10 ); // Limitation du nombre de révions des contenus
        define( 'SCRIPT_DEBUG', false );
        define( 'EMPTY_TRASH_DAYS', 60 ); // Limitation du nombre de jours de conservation des contenus dans la corbeille
    } elseif ( ENVIRONMENT === 'production' ) {
        define( 'WP_DEBUG_DISPLAY', false );
        define( 'WP_DEBUG_LOG', true );
        define( 'DISALLOW_FILE_MODS', true );
        define( 'WP_POST_REVISIONS', 10 );
        define( 'SCRIPT_DEBUG', false );
        define( 'EMPTY_TRASH_DAYS', 60 );
    } else {
        echo 'La valeur de la constante ENVIRONMENT n\'est pas valide. Les valeurs possibles sont development, staging ou production.';
        exit;
    }
} else {
    echo 'La constante ENVIRONMENT n\'est pas définie.';
    exit;
}
define( 'DISALLOW_FILE_EDIT', true ); // Désactivation de l'éditeur embarqué de thèmes et plugins
define( 'AUTOMATIC_UPDATER_DISABLED', true ); // Désactivation des mises à jour automatiques de WordPress
define( 'WP_AUTO_UPDATE_CORE', false ); // Désactivation des mises à jour du cœur de WordPress
/* That's all, stop editing! Happy publishing. */

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');


