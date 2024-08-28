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
 * Functions for local plugin mbseasyforms.
 *
 * @package   local_mbseasyforms
 * @copyright 2017 Franziska Hübler, ISB München
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mbseasyforms;

// Needed to use constants from the profile library.
require_once(__DIR__ . '/../../../user/profile/lib.php');
/**
 * Functions for local plugin mbseasyforms.
 *
 * @copyright 2017 Franziska Hübler, ISB München
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mbseasyforms {

    public static function set_custom_profile_field(): void {
        global $DB;

        // Set custom profile field for easyforms.
        $profilefield = [
            'shortname' => 'mbseasyforms',
            'name' => 'vereinfachte Formulare verwenden',
            'datatype' => 'checkbox',
            'description' => '<p>Vereinfachte Formulare standardmäßig aktiviert.<br></p>',
            'descriptionformat' => 1,
            'categoryid' => 1,
            'required' => 0,
            'locked' => 0,
            'visible' => PROFILE_VISIBLE_PRIVATE,
            'forceunique' => 0,
            'signup' => 0,
            'defaultdata' => 1,
            'defaultdataformat' => 0,
            'param1' => '',
            'param2' => '',
            'param3' => '',
            'param4' => '',
            'param5' => ''
        ];

        // Check for standard category.
        if ($DB->get_field('user_info_category', '*', ['id' => 1])) {
            $DB->insert_record('user_info_field', $profilefield);
        } else {
            mtrace('Creation of custom profile field failed, because of missing category with ID 1');
        }

    }

    /**
     * Update custom profile field. It should be private.
     *
     * @return void
     */
    public static function update_custom_profile_field(): void {
        global $DB;

        $id = $DB->get_field('user_info_field', 'id', ['shortname' => 'mbseasyforms']);

        if ($id) {
            $DB->update_record('user_info_field', [
                'id' => $id,
                'visible' => PROFILE_VISIBLE_PRIVATE,
            ]);
        }
    }
}
