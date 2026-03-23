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

require_once($CFG->dirroot . '/local/mbseasyforms/defaultsettings.php');

if ($hassiteconfig) {
    $settings = new admin_settingpage(
        'local_mbseasyforms',
        get_string('pluginname', 'local_mbseasyforms')
    );

    $ADMIN->add('localplugins', $settings);

    // Add button to insert default settings.
    // The script tag with the default config is embedded in the description HTML,
    // so it only renders on the actual settings page (not during early admin tree building).
    $defaultconfigscript = "<script id='mbseasyforms_config' type='application/json'>"
        . str_replace('</script>', '<\/script>', DEFAULT_SETTING) . "</script>";
    $settings->add(new admin_setting_description(
        'local_mbseasyforms/defaultsetting',
        get_string('pastedefaultsetting', 'local_mbseasyforms'),
        $defaultconfigscript . get_string(
            'pastedefaultsettingdesc',
            'local_mbseasyforms',
            DEFAULT_SETTING
        )
    ));

    $settings->add(
        new admin_setting_configtextarea(
            'local_mbseasyforms/easyformsconfig',
            get_string('easyformsconfig', 'local_mbseasyforms'),
            get_string('easyformsconfig_expl', 'local_mbseasyforms'),
            DEFAULT_SETTING
        )
    );

    $settings->add(
        new admin_setting_configselect(
            'local_mbseasyforms/collapseallalign',
            get_string('collapseallalign', 'local_mbseasyforms'),
            get_string('collapseallalign_desc', 'local_mbseasyforms'),
            'left',
            [
                'left' => get_string('alignleft', 'local_mbseasyforms'),
                'right' => get_string('alignright', 'local_mbseasyforms'),
            ]
        )
    );
}
