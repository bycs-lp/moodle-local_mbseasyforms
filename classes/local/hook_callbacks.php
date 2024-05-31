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

namespace local_mbseasyforms\local;

use core\hook\output\before_footer_html_generation;

/**
 * Hook callbacks for local_mbseasyforms
 *
 * @package    local_mbseasyforms
 * @copyright  2024 ISB Bayern
 * @author     Thomas Ludwig <thomas.ludwig@isb.bayern.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_callbacks {
    /**
     * Callback to load mbseasyforms JS module and config before footer.
     * @param before_footer_html_generation $hook
     */
    public static function before_footer_html_generation(before_footer_html_generation $hook): void {
        global $PAGE, $USER;

        // Get current theme.
        $theme = $PAGE->theme->name;

        // Read data from config and lang.
        $showall = get_string('showall', 'local_mbseasyforms');
        $showless = get_string('showless', 'local_mbseasyforms');
        $collapse = get_string('collapse', 'local_mbseasyforms');

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
        $params = array($theme . '#!#' . $showall . '#!#' . $showless . '#!#' . $collapse . '#!#' . $usembseasyforms . '#!#' . $config . '#!#' . $useconfig);

        // Pass them to js and initialize.
        $PAGE->requires->js_call_amd('local_mbseasyforms/mbseasyforms', 'init', $params);
    }
}
