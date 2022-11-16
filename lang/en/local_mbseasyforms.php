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
 * Strings for component 'local_mbseasyforms', language 'en'
 *
 * @package   local_mbseasyforms
 * @copyright 2017 Franziska Hübler, Tobias Garske, ISB Bayern
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$string['displayname'] = 'Easy Forms';
$string['easyformsconfig'] = 'Configuration';
$string['easyformsconfig_expl'] = 'As default only required elements are shown.The configuration to show more option follows the JSON-Format.<br>
It begins with the body#id and different elements can be selected to show by their fitem_id
Example:<br>
{<br>
    &nbsp;&nbsp;"page-course-edit":<br>&nbsp;
     &nbsp;&nbsp;{<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"_comment": "Kurs erstellen - body_id als selektor welche elemente",<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"default_disabled": false,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"elements": ["fitem_id_category", "fitem_id_format"]<br>
     &nbsp;&nbsp;},<br>
    &nbsp;&nbsp;"page-user-editadvanced":<br>
     &nbsp;&nbsp;{<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"_comment": "Nutzerprofil - Standardmäßig deaktiviert - es muss erst angeklickt werden",<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"default_disabled": true,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"elements": []<br>
     &nbsp;&nbsp;}<br>
}';
$string['pluginname'] = 'mebis Easy Forms';
$string['useeasyforms'] = 'Use shortened forms';
$string['useeasyformsconfig'] = 'Use adminconfiguration (Otherwise hardcoded configuration is used)';
$string['showall'] = 'All Settings';
$string['showless'] = 'Less Settings';
