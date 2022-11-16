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

/**
 * Before footer hook loads easyforms config and javascript.
 * @return void
 */
function local_mbseasyforms_before_footer() {
    global $USER, $PAGE;

    // Get current theme.
    $theme = $PAGE->theme->name;

    // Read data from config and lang.
    $showall = get_string('showall', 'local_mbseasyforms');
    $showless = get_string('showless', 'local_mbseasyforms');
    $usembseasyforms = $USER->profile['mbseasyforms'];
    if (isset($USER->profile['mbseasyforms'])) {
        $usembseasyforms = $USER->profile['mbseasyforms'];
    } else {
        $usembseasyforms = 1;
    }
    $useconfig = get_config('local_mbseasyforms', 'useeasyformsconfig');
    // Conditional loading for adminconfig, since it triggers a warning because its too big.
    $config = '';
    if ($useconfig) {
        $config = get_config('local_mbseasyforms', 'easyformsconfig');
    }

    // Param needs to be in array format.
    $params = array($theme . '#!#' . $showall . '#!#' . $showless . '#!#' . $usembseasyforms . '#!#' . $config . '#!#' . $useconfig);

    // Pass them to js and initialize.
    $PAGE->requires->js_call_amd('local_mbseasyforms/mbseasyforms', 'init', $params);
}
