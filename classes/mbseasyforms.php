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

class mbseasyforms {
    
    /**
     * Get the user preference for use easyforms.
     * @return int 1 = use easyforms
     */
    public static function get_use_pref() {
        $userpref = get_user_preferences('local_mbseasyforms_use', 1);
        return $userpref; 
    }
    
    /**
     * Set the user preference for use easyforms.
     * @return int 1 = use easyforms
     */
    public static function set_use_pref($status) {
        $userpref = get_user_preferences('local_mbseasyforms_use', 1);
        if ($status <> $userpref) {
            set_user_preference('local_mbseasyforms_use', $status);
        }
        return $status; 
    }
}