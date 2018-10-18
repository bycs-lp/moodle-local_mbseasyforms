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
 * Admin settings for local plugin mbseasyforms.
 *
 * @package    local_mbseasyforms
 * @copyright  2017 Franziska Hübler <franziska.huebler@isb.bayern.de>, Tobias Garske, ISB Bayern
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {

    $settings = new admin_settingpage('local_mbseasyforms',
        get_string('pluginname', 'local_mbseasyforms'));

    $ADMIN->add('localplugins', $settings);

    $settings->add(new admin_setting_configtextarea('local_mbseasyforms/easyformsconfig',
        get_string('easyformsconfig', 'local_mbseasyforms'),
        get_string('easyformsconfig_expl', 'local_mbseasyforms'),
        ''));
}