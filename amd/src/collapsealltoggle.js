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
 * Additional JS needed to make the "collapse all custom input toggle" work.
 *
 * By default, the toggle will not change its toggle state when clicked directly, so this module will just update it "manually".
 *
 * @module     local_mbseasyforms/collapsealltoggle
 * @copyright  2024 ISB Bayern
 * @author     Philipp Memmel
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
export const init = () => {
    const toggle = document.querySelector('.mbseasycollapseall .form-switch, .mbseasycollapseall .custom-switch');
    const controlInput = document.querySelector('.mbseasycollapseall .form-check-input, .mbseasycollapseall .custom-control-input');

    if (!toggle || !controlInput) {
        return;
    }

    toggle.addEventListener('click', () => {
        const collapsedElement = document.querySelector('.mbseasycollapseall.collapsed');
        controlInput.checked = !!collapsedElement;

        // Matomo tracking.
        if (typeof _paq !== 'undefined') {
            // eslint-disable-next-line no-undef
            _paq.push(['trackEvent', 'Easyforms', 'Click toggle collapse', 'Toggle collapse']);
        }
    });
};