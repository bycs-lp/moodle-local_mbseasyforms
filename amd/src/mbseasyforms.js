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
 * Module for mbseasyforms.
 *
 * @module     local_mbseasyforms/mbseasyforms
 * @copyright  2022 ISB Bayern
 * @author     Tobias Garske
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import $ from 'jquery';
import Pending from 'core/pending';

let css_hide = "easyhide";

/**
 * Initialize mbseasyforms.
 */
export const init = (params) => {

    const pendingPromise = new Pending('local_mbs/mbseasyforms');

    mbseasyforms(params);

    pendingPromise.resolve();
};

const mbseasyforms = (params) => {

    // Show hidden form after loading is complete.
    if ($('form.mform').length) {
        $('form.mform').addClass('show');
    }

    // Check if there is a form with collapsible-actions on the page.
    if ($('form.mform').length && $('.collapsible-actions').length) {
        /*variables*/
        /**********/
        var tmp = params.split('#!#');
        var theme = tmp[0];
        var showallstring = tmp[1];
        var showlessstring = tmp[2];
        var user_setting = tmp[3];
        var easyconf = tmp[4];
        try {
            var config = JSON.parse(easyconf);
        } catch (e) {
            console.log("EasyForm-Plugin: Error in JSON-Config: " + e);
            var config = JSON.parse('{}');
        }
        var body_id = $('body').attr('id');
        var default_disabled = false;
        var has_config = false;
        var id_arr = [];
        // Read config.
        if (config[body_id]) {
            default_disabled = config[body_id].default_disabled;
            if (config[body_id].elements) {
                id_arr = config[body_id].elements;
                has_config = true;
            }
        }
        // Disable for behat testing.
        if ($.isEmptyObject(config)) {
            default_disabled = true;
        }

        /*hide things*/
        /************/
        // Hide and mark header.
        $('.ftoggler').each(function() {
            $(this).addClass(css_hide + ' mbstoggle');
        });
        // Hide Input rows.
        $('.fitem').each(function() {
            // If not required or submit buttons.
            let isSubmit = ($(this).attr('id') == 'fgroup_id_buttonar' || $(this).parents('#fgroup_id_buttonar').length);
            if ($(this).find('.fa-exclamation-circle').length !== 1 && !isSubmit) {
                // If not in specified elements.
                if (has_config) {
                    var hide = true;
                    for (var i = 0, len = id_arr.length; i < len; i++) {
                        if ($(this).is('#' + id_arr[i])) {
                            hide = false;
                            // Make sure it is visible.
                            $(this).parents('.fcontainer').removeClass('collapse');
                            // Mark element as to show.
                            $(this).addClass('easyShow');
                        }
                    }
                    if (hide) {
                        $(this).addClass(css_hide + ' mbstoggle');
                    }
                } else {
                    $(this).addClass(css_hide + ' mbstoggle');
                }
            } else {
                // Mark element as to show.
                $(this).addClass('easyShow');
            }
        });
        // Add class to remove used space of hidden elements.
        $('fieldset.collapsible').each(function() {
            $(this).addClass('easyAdapt toggleAdapt');
        });
        // Adapt action buttons.
        $('#fgroup_id_buttonar').addClass("easyon");
        /*Create toggle link*/
        /*******************/
        // Create toggle link.
        // Is there a collapse all option - then create link inside its div.
        if ($('.collapsible-actions').length) {
            $('.collapseexpand').first().addClass('hidden');
            $('.collapsible-actions').append("<a id='easyform_click' href='#' role='button' class='easyform " + theme + " btn btn-link p-1'><span>" + showallstring + "</span></a>");
        }
        // If easyform disabled through conf or user setting.
        if (default_disabled || user_setting === "0") {
            $('#easyform_click').addClass('collapsed');
            $('#easyform_click').html(showlessstring);
            // Show elements.
            $('.mbstoggle').each(function() {
                $(this).removeClass(css_hide);
            });
            // Adapt css.
            $('.toggleAdapt').each(function() {
                $(this).removeClass("easyAdapt");
            });
            $('#fgroup_id_buttonar').removeClass("easyon");
            // Show collapse all.
            $('.collapseexpand').first().removeClass('hidden');
        }
        // Easyform switch.
        $("#easyform_click").click(function() {
            // Hide elements.
            $('.mbstoggle').each(function() {
                $(this).toggleClass(css_hide);
            });
            // Adapt css.
            $('.toggleAdapt').each(function() {
                $(this).toggleClass("easyAdapt");
            });
            if ($('.' + css_hide).length) {
                $('#easyform_click').removeClass('collapsed');
                $('#easyform_click').html(showallstring);
                $('.collapseexpand').first().addClass('hidden');
            } else {
                $('#easyform_click').addClass('collapsed');
                $('#easyform_click').html(showlessstring);
                $('.collapseexpand').first().removeClass('hidden');
            }
            // Adapt actionbuttons.
            $('#fgroup_id_buttonar').toggleClass("easyon");
            // Fix if collapse all was clicked before showall, all would be hidden.
            $('.easyShow').each(function() {
                $(this).parents('.collapseable').removeClass("collapse");
            });
            // Close .collapseable child that should be collapsed when showall is clicked.
            $('.collapsible.collapsed .collapseable').each(function() {
                if(!$(this).hasClass('collapse')) {
                    $(this).addClass('collapse');
                }
            });
            // Open .collapseable when showless is clicked.
            $('.collapsible.easyAdapt .collapseable').each(function() {
                if($(this).hasClass('collapse')) {
                    $(this).removeClass('collapse');
                }
            });
        });
        // Add Collapse all compatibility.
        $( document ).ready(function() {
            $('.collapseexpand').click(function() {
                $('.mbstoggle').each(function() {
                    $(this).removeClass(css_hide);
                });
                $('.toggleAdapt').each(function() {
                    $(this).removeClass("easyAdapt");
                });
            });
        });
    }
};

