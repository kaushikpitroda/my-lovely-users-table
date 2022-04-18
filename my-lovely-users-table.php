<?php

declare(strict_types=1);

// -*- coding: utf-8 -*-
/**
 * My Lovely Users Table
 *
 * @package     MyLovelyUsersTable
 * @author      Inpsyde GmbH
 * @copyright   2022 Kaushik Pitroda
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: My Lovely Users Table
 * Plugin URI:  https://inpsyde.com/
 * Description: This plugin will show list of users and their details.
 * Version:     1.0.0
 * Author:      Inpsyde GmbH
 * Author URI:  https://inpsyde.com/
 * Text Domain: my-lovely-users-table
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace Acme;

require_once __DIR__ . '/autoload.php';

use Inpsyde\MyLovelyUsersTable;

function userTable()
{

    return MyLovelyUsersTable::getInstance();
}
add_action('plugins_loaded', [ userTable(), 'pluginsOnLoad' ]);
