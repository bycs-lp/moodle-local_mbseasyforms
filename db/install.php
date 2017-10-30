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

defined('MOODLE_INTERNAL') || die;
function xmldb_local_mbseasyforms_install() {
	//set default config
	$name = "easyformsconfig";
  $value  = '{
  "page-course-edit":
    {
    "_comment": "Kurs erstellen - body_id als selektor welche elemente",
    "default_disabled": false,
    "elements": ["fitem_id_category", "fitem_id_format"]
  },
  "page-user-editadvanced":
  {
    "_comment": "Nutzerprofil - Standardmäßig deaktiviert - es muss erst angeklickt werden",
    "default_disabled": true,
    "elements": []
  }
}';
	set_config($name, $value, 'local_mbseasyforms');
}

