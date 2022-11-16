<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Upgrade library for easyforms plugin.
 *
 * @package     local_mbseasyforms
 * @copyright   2018 Tobias Garske, ISB
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Set easyforms config on Upgrade.
 *
 * @param string $oldversion oldversion
 * @copyright 2018 Tobias Garske, ISB
 */
function xmldb_local_mbseasyforms_upgrade($oldversion) {
    global $DB;

    $newversion = 2022111600;
    if ($oldversion < $newversion) {

        // Set new config.
        $name = "easyformsconfig";
        $value = \local_mbseasyforms\mbseasyforms::get_admin_easyformsconfig();

        set_config($name, $value, 'local_mbseasyforms');

        // Mbseasyforms savepoint reached.
        upgrade_plugin_savepoint(true, $newversion, 'local', 'mbseasyforms');
    }

    $newversion = 2023011600;
    if ($oldversion < $newversion) {

        // Set custom profile field for easyforms.
        \local_mbseasyforms\mbseasyforms::set_custom_profile_field();

        // Mbseasyforms savepoint reached.
        upgrade_plugin_savepoint(true, $newversion, 'local', 'mbseasyforms');
    }

    return true;
}
