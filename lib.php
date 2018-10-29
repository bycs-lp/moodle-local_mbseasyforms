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
 * Function library for the plugin.
 *
 * @package   local_mbseasyforms
 * @copyright 2017 Tobias Garske, ISB
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Before footer hook loads easyforms config and javascript.
 * @return void
 */
function local_mbseasyforms_before_footer() {
    global $PAGE;

    // Get current theme.
    $theme = $PAGE->theme->name;

    // Read data from config and lang.
    $config = get_config('local_mbseasyforms', 'easyformsconfig');
    $showall = get_string('showall', 'local_mbseasyforms');
    $showless = get_string('showless', 'local_mbseasyforms');
    $usembseasyforms = get_user_preferences('local_mbseasyforms_use', 1);

    // Param needs to be in array format.
    $params = array($theme . '#!#' . $showall . '#!#' . $showless . '#!#' . $usembseasyforms);

    // Pass them to js and initialize.
    // Config too large -> pass before as object.
    $PAGE->requires->data_for_js('easyconf', $config);
    $PAGE->requires->js_call_amd('local_mbseasyforms/mbseasyforms', 'init', $params);
}