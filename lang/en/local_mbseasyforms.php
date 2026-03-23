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

$string['alignleft'] = 'Left';
$string['alignright'] = 'Right';
$string['collapse'] = 'Collapse all';
$string['collapseallalign'] = 'Collapse all alignment';
$string['collapseallalign_desc'] = 'Align the collapse all switch to the left or right side.';
$string['displayname'] = 'Easy Forms';
$string['easyformsconfig'] = 'Configuration';
$string['easyformsconfig_expl'] = 'Config is using the JSON-Format.<br>
It begins with the body#id and different elements can be selected to show by their fitem_id_ or id if no fitem_id_ is present.
Example:<br>
{<br>
    &nbsp;&nbsp;"page-course-edit":<br>&nbsp;
     &nbsp;&nbsp;{<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"default_disabled": false,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"elements": ["fitem_id_category", "fitem_id_format", "id_completionview"]<br>
     &nbsp;&nbsp;},<br>
    &nbsp;&nbsp;"page-user-editadvanced":<br>
     &nbsp;&nbsp;{<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"default_disabled": true,<br>
        &nbsp;&nbsp;&nbsp;&nbsp;"elements": []<br>
     &nbsp;&nbsp;}<br>
}';
$string['pastedefaultsetting'] = 'Insert default settings';
$string['pastedefaultsettingdesc'] = '<button style="margin-top: -.5rem; margin-bottom: .2rem;" type="button" class="btn btn-secondary" onclick=\'let config = document.getElementById("mbseasyforms_config").textContent;document.getElementById("id_s_local_mbseasyforms_easyformsconfig").value=config;\'>Replace settings</';
$string['pluginname'] = 'mbsEasyforms';
$string['privacy:metadata:explanationeasyformsenabled'] = 'Enable or disable Easy Forms for this user';
$string['showall'] = 'All Settings';
$string['showless'] = 'Less Settings';
$string['useeasyforms'] = 'Use shortened forms';
$string['useeasyforms_descr'] = 'Use easyforms enabled by default.';
$string['useeasyformsconfig'] = 'Use adminconfiguration (Otherwise hardcoded configuration is used)';
