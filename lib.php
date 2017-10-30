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
 * Code for the profile picture selector
 *
 * @package   local_mbseasyforms
 * @copyright 2017 Tobias Garske, ISB
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function local_mbseasyforms_before_footer() {
        global $PAGE;

        //get current theme
        $theme = $PAGE->theme->name;

        //read data from config and lang
        $config = get_config('local_mbseasyforms', 'easyformsconfig');
        $show_all = get_string('showall', 'local_mbseasyforms');
        $show_less = get_string('showless', 'local_mbseasyforms');
        $use_mbseasyforms = get_user_preferences('local_mbseasyforms_use', 1);

        //param needs to be in array format
        $params = array($config .'#!#'. $theme .'#!#'. $show_all .'#!#'. $show_less .'#!#'. $use_mbseasyforms);

        //pass them to js and initialize
        $PAGE->requires->js_call_amd('local_mbseasyforms/mbseasyforms', 'init', $params);
}