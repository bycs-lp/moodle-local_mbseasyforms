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
 * External API.
 *
 * @package    local_mbseasyforms
 * @copyright  2017 Franziska Hübler, ISB Bayern
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mbseasyforms;
defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/externallib.php");

use context_system;
use external_api;
use external_function_parameters;
use external_value;

/**
 * External API class.
 *
 * @package    local_mbseasyforms
 * @copyright  2017 Franziska Hübler, ISB Bayern
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class external extends external_api {

    /**
     * Get and set the users preference for use easyforms
     *
     * @param int $status Preference for use easyforms
     * @return int 1 = use easyforms
     */
    public static function use_pref($status) {
        $context = context_system::instance();
        self::validate_context($context);
        self::validate_parameters(self::use_pref_parameters(), array('status' => $status));

        return mbseasyforms::set_use_pref($status);
    }

    /**
     * Returns description of show_pref parameters
     * @return external_function_parameters
     */
    public static function use_pref_parameters() {
        return new external_function_parameters(
            array('status' => new external_value(PARAM_INT, 'Preference for use easyforms', VALUE_REQUIRED))
        );
    }

    /**
     * Returns description of show_pref result value
     * @return external_description
     */
    public static function use_pref_returns() {
        return new external_value(PARAM_INT, '1 = use easyforms');
    }
}
