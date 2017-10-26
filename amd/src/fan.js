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
 * @package    local_mbseasyforms
 * @copyright  2017 Franziska Hübler <franziska.huebler@isb.bayern.de>, ISB Bayern
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @module local_mbseasyforms/makeiteasy
 */
define(['jquery'], function ($) {
    
    var easyformsconfig;

    function hideNonRequiredFields() {
        var withconfig = false;
        var fieldsetsConfigArr = [], fieldsetsIdArr = [], fieldsetsElementsArr = [];
        var $fieldsets = $('form[action="modedit.php"]').children('fieldset');
        
        // Check if theres a config for this module given
        var $pageid = $('body').attr('id');        
        var modules = JSON.parse(easyformsconfig);
        console.log(modules);
        $.each( modules.modules, function( key, value ) {
            if (value.pageid == $pageid) {
                console.log($pageid);
                withconfig = true;
                fieldsetsConfigArr = value.fieldsets;
                $.each(fieldsetsConfigArr, function(index, fieldsetC) {
                    fieldsetsIdArr.push(fieldsetC.id);
                    fieldsetsElementsArr[fieldsetC.id] = fieldsetC.elements;
                });
                console.log(fieldsetsIdArr);
                console.log(fieldsetsElementsArr);
            }
        });
        
        if (withconfig) {
            $fieldsets.each(function (index, value) {
                if ($.inArray($(value).attr('id'), fieldsetsIdArr) === -1) {
                    $(value).css('display', 'none');
                } else {
                    console.log('Show fieldset');
                    var $settings = $(value).children('div.fcontainer').children('div');
                    $settings.each(function (index, setting) {                    
                        if ($.inArray($(setting).attr('id'), fieldsetsElementsArr[$(value).attr('id')]) === -1) {
                            $(setting).css('display', 'none');
                        }
                    });
                }
            });
        } else {
            $fieldsets.each(function (index, value) {
                if ($(value).children('div.fcontainer').children('div.required').length >= 1) {
                    // Show only required fields, hide everything else.
                    $(value).children('legend').css('display', 'none');
                    var $settings = $(value).children('div.fcontainer').children('div');
                    $settings.each(function (index, value) {
                        if (!$(value).hasClass('required')) {
                            $(value).css('display', 'none');
                        }
                    });
                } else {
                    $(value).css('display', 'none');
                }
            });
        }
        $('form[action="modedit.php"] div.collapsible-actions').css('display', 'none');
    }

    function showNonRequiredFields() {
        var $fieldsets = $('form[action="modedit.php"]').children('fieldset');
        $fieldsets.each(function (index, fieldset) {
            var $settingDivs = $(fieldset).children('div.fcontainer').children('div');
            $settingDivs.each(function (index, div) {
                if (!$(div).hasClass('required')) {
                    $(div).css('display', 'inherit');
                    $(fieldset).css('display', 'inherit');
                } else {
                    $(fieldset).children('legend').css('display', 'inherit');
                }
            });
        });
        $('form[action="modedit.php"] div.collapsible-actions').css('display', 'inherit');
    }

    function showMoreButton() {
        var moreButton = $('<button type="button" id="mbseasyforms_button" clicked="false">Alle Einstellungen anzeigen</button>');
        moreButton.insertBefore('form[action="modedit.php"] div#fgroup_id_buttonar');
        return moreButton;
    }

    function onMoreButtonClicked(button) {
        var clicked = $(button).attr('clicked');
        if (clicked == 'true') {
            $(button).text('Alle Einstellungen anzeigen');
            $(button).attr('clicked', 'false');
            hideNonRequiredFields();
        } else {
            $(button).text('Nur Pflichtfelder anzeigen');
            $(button).attr('clicked', 'true');
            showNonRequiredFields();
        }
    }

    /**
     * @alias module:local_mbseasyforms/makeiteasy
     */
    var makeiteasy = {
        init: function (config) {
            easyformsconfig = config;
            hideNonRequiredFields();
            var button = showMoreButton();
            button.on('click',
                    function () {
                        onMoreButtonClicked(this);
                    });
        }
    };
    return makeiteasy;
});