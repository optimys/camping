<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'camping');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '1234');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'TV%6mARJ?OWccC0r^Bn]7_>4gDRs*SV`Je`82co5=F<mzB1zfs>Fjin#=j_5xO#)');
define('SECURE_AUTH_KEY',  'opEF]O>V!CN5n`Ectq!p1lnvs(y/fe[vZyZyBcFU+`g=A<-.1]8TPh#|[^Dj@GAd');
define('LOGGED_IN_KEY',    'd5|N^#!HJv`*>+aFT_;|/i^VVC0Rg~|wm:C&M~snI_)?<>IRs/h9AN8y5_]/]Gl;');
define('NONCE_KEY',        'evUJ%l:I07O!u[i)`pc8B|<EsHeb9@d^#C+`5Ycw|F[^-[(F};J[@*0EyRixOcpQ');
define('AUTH_SALT',        'mXu|XZ8I_jwcLii.kl[V5Dg!rmbA?$S!o6;3tt;EgS>L; N.O:C+uP v<=_1-a ~');
define('SECURE_AUTH_SALT', 'v6ozo`#}SM@HHA!:Ra9#ZlOg&%36+w3C{/cX39Z]m3)T=HaB=_O4[A1/zv>T%+um');
define('LOGGED_IN_SALT',   'T://58j}7c)+1FK9OE)@F-IKRyfAI)5uzX:L-&|1hTy<aL1)hQ5;BO!ySNZ>dIP5');
define('NONCE_SALT',       'vy}I[hLO[%fJu*-Bfy.L)U.Yg=rDB8SHXh*@{}-/:]X+%9/<Xqty#&LkG[3UO+42');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', true);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
