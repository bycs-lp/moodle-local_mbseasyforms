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
 * Strings for component 'local_mbseasyforms', language 'de'
 *
 * @package   local_mbseasyforms
 * @copyright 2017 Franziska Hübler, Tobias Garske, ISB Bayern
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$string['alignleft'] = 'Links';
$string['alignright'] = 'Rechts';
$string['collapse'] = 'Alles aufklappen';
$string['collapseallalign'] = 'Ausrichtung Alle zuklappen';
$string['collapseallalign_desc'] = 'Den Alle-zuklappen-Schalter links oder rechts ausrichten.';
$string['displayname'] = 'Easy Forms';
$string['easyformsconfig'] = 'Konfiguration';
$string['easyformsconfig_expl'] = 'Die Konfiguration des Plugins erfolgt im JSON-Format.<br>
Beginnend mit der body#id können Elemente über die fitem_id_ hinzugeschaltet werden. Falls keine fitem_id_ vorhanden wird die id genutzt.<br>Beispiel:<br>
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
$string['pastedefaultsetting'] = 'Default Konfiguration einfügen';
$string['pastedefaultsettingdesc'] = '<button style="margin-top: -.5rem; margin-bottom: .2rem;" type="button" class="btn btn-secondary" onclick=\'let config = document.getElementById("mbseasyforms_config").textContent;document.getElementById("id_s_local_mbseasyforms_easyformsconfig").value=config;\'>Konfiguration ersetzen</';
$string['pluginname'] = 'mbsEasyforms';
$string['privacy:metadata:explanationeasyformsenabled'] = 'Aktivieren oder deaktivieren Easy Forms für diesen Nutzer';
$string['showall'] = 'Ausführliche Eingabe';
$string['showless'] = 'Vereinfachte Eingabe';
$string['useeasyforms'] = 'Vereinfachte Formulare verwenden';
$string['useeasyforms_descr'] = 'Vereinfachte Formulare standardmäßig aktiviert.';
$string['useeasyformsconfig'] = 'Einbinden der Adminkonfiguration <br> (Ansonsten wird die hartkodierte Konfiguration verwendet)';
