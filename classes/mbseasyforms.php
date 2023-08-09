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

/**
 * Functions for local plugin mbseasyforms.
 *
 * @copyright 2017 Franziska Hübler, ISB München
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mbseasyforms {

    /**
     * Provides the admin settings easyformsconfig on update or install.
     * @return string JSON config
     */
    public static function get_admin_easyformsconfig() {
        $config = '{
          "page-course-edit":
            {
            "_comment": "Kurs erstellen",
            "default_disabled": false,
            "elements": ["fitem_id_category", "fitem_id_format", "fitem_id_", "fitem_id_numsections", "fitem_id_activitytype", "fitem_id_numdiscussions", "fitem_id_newsitems"]
          },
          "page-course-editsection":
            {
            "_comment": "Beschreibung von Abschnitten",
            "default_disabled": false,
            "elements": ["fitem_id_name", "id_name_value", "fitem_id_summary_editor"]
          },
          "page-user-editadvanced":
          {
            "_comment": "Nutzerprofil",
            "default_disabled": false,
            "elements": ["fitem_id_username", "fitem_id_passwordpolicyinfo", "fitem_id_newpassword", "fitem_id_email"]
          },
          "page-course-completion":
          {
            "_comment": "Kursabschluss",
            "default_disabled": false,
            "elements": ["fitem_id_overall_aggregation"]
          },
          "page-course-reset":
          {
            "_comment": "Kurs zurücksetzen",
            "default_disabled": false,
            "elements": []
          },
          "page-mod-choice-mod":
          {
            "_comment": "Abstimmung",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_allowupdate", "fitem_id_allowmultiple", "fitem_id_option_1", "fitem_id_option_2", "fitem_id_option_3", "fitem_id_option_4", "fitem_id_option_5", "fitem_id_option_6", "fitem_id_option_7", "fitem_id_option_8", "fitem_id_option_9", "fitem_id_option_10", "fitem_id_option_11", "fitem_id_option_12", "fitem_id_option_13", "fitem_id_option_14", "fitem_id_option_15", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionsubmit"]
          },
          "page-mod-choiceanon-mod":
          {
            "_comment": "Abstimmung Anonym",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_allowupdate", "fitem_id_allowmultiple", "fitem_id_option_1", "fitem_id_option_2", "fitem_id_option_3", "fitem_id_option_4", "fitem_id_option_5", "fitem_id_option_6", "fitem_id_option_7", "fitem_id_option_8", "fitem_id_option_9", "fitem_id_option_10", "fitem_id_option_11", "fitem_id_option_12", "fitem_id_option_13", "fitem_id_option_14", "fitem_id_option_15", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionsubmit"]
          },
          "page-mod-assign-mod":
          {
            "_comment": "Aufgabe",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fgroup_id_submissionplugins", "fgroup_id_ggbturlinput", "fitem_id_usefile", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionsubmit"]
          },
          "page-mod-chat-mod":
          {
            "_comment": "Chat",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-data-mod":
          {
            "_comment": "Datenbank",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_approval", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade", "fgroup_id_completionentriesgroup"]
          },
          "page-mod-lti-mod":
          {
            "_comment": "Externes Tool",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_typeid", "fitem_id_selectcontent", "fitem_id_toolurl",  "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade"]
          },
          "page-mod-lti-instructor_edit_tool_type":
          {
            "_comment": "Externes Tool - Tool anlegen",
            "default_disabled": true,
            "elements": []
          },
          "page-mod-feedback-mod":
          {
            "_comment": "Feedback",
            "default_disabled": false,
            "elements": ["fitem_id_toolurl", "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_anonymous", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionsubmit"]
          },
          "page-mod-forum-mod":
          {
            "_comment": "Forum",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_type", "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-workshop-mod":
          {
            "_comment": "Gegenseitige Beurteilung",
            "default_disabled": true,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_strategy", "fgroup_id_submissiongradegroup", "fitem_id_submissiongradepass", "fgroup_id_gradinggradegroup", "fitem_id_gradinggradepass", "fitem_id_instructauthorseditor",  "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade"]
          },
          "page-mod-workshop-editform":
          {
            "_comment": "Workshop - Beurteilungsbogen bearbeiten",
            "default_disabled": true,
            "elements": []
          },
          "page-mod-workshop-allocation":
          {
            "_comment": "Workshop - Einreichungen zuordnen",
            "default_disabled": true,
            "elements": []
          },
          "page-mod-geogebra-mod":
          {
            "_comment": "Geogebra",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_filetype", "fitem_id_geogebraurl", "fitem_id_geogebrafile", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionsubmit"]
          },
          "page-mod-glossary-mod":
          {
            "_comment": "Glossar",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_globalglossary", "fitem_id_displayformat", "fitem_id_defaultapproval", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade", "fgroup_id_completionentriesgroup"]
          },
          "page-mod-hotpot-mod":
          {
            "_comment": "HotPot",
            "default_disabled": false,
            "elements": ["fgroup_id_name_elements", "fitem_id_showdescription", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade", "fgroup_id_completionmingradegroup" ]
          },
          "page-mod-journal-mod":
          {
            "_comment": "Journal",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade"]
          },
          "page-mod-lesson-mod":
          {
            "_comment": "Lektion",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade", "fitem_id_completionendreached", "fgroup_id_completiontimespentgroup"]
          },
          "page-mod-lesson-editpage":
          {
            "_comment": "Lektion - Inhalt hinzufügen",
            "default_disabled": true,
            "elements": ["fitem_id_contents_editor", "fitem_id_jumpto_0"]
          },
          "page-mod-scorm-mod":
          {
            "_comment": "Lernpaket",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_packagefile",  "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade", "fgroup_id_completionscoregroup", "fitem_id_completionstatusrequired_2", "fitem_id_completionstatusallscos"]
          },
          "page-mod-game-hangman":
          {
            "_comment": "Galgenmännchen",
            "default_disabled": false,
            "elements": ["fitem_id_sourcemodule", "fitem_id_glossaryid", "fitem_id_glossarycategoryid", "fitem_id_questioncategoryid", "fitem_id_subcategories", "fitem_id_quizid", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade", "fgroup_id_completionpassgroup"]
          },
          "page-mod-game-cross":
          {
            "_comment": "Kreuzworträtsel",
            "default_disabled": false,
            "elements": ["fitem_id_sourcemodule", "fitem_id_glossaryid", "fitem_id_glossarycategoryid", "fitem_id_questioncategoryid", "fitem_id_subcategories", "fitem_id_quizid", "fitem_id_param1", "fitem_id_param4", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade", "fgroup_id_completionpassgroup"]
          },
          "page-mod-game-millionaire":
          {
            "_comment": "Wer wird Millionär",
            "default_disabled": false,
            "elements": ["fitem_id_sourcemodule", "fitem_id_questioncategoryid", "fitem_id_subcategories", "fitem_id_quizid", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade", "fgroup_id_completionpassgroup"]
          },
          "page-mod-quiz-mod":
          {
            "_comment": "Test",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "fitem_id_gradeboundarystatic1", "fitem_id_feedbacktext_0", "fitem_id_feedbackboundaries_0", "fitem_id_feedbacktext_1", "fitem_id_feedbackboundaries_1", "fitem_id_feedbacktext_2", "fitem_id_feedbackboundaries_2", "fitem_id_feedbacktext_3", "fitem_id_feedbackboundaries_3", "fitem_id_feedbacktext_4", "fitem_id_feedbackboundaries_4", "fitem_id_feedbacktext_5", "fitem_id_feedbackboundaries_5", "fitem_id_feedbacktext_6", "fitem_id_feedbackboundaries_6", "fitem_id_feedbacktext_7", "fitem_id_feedbackboundaries_7", "fitem_id_feedbacktext_8", "fitem_id_feedbackboundaries_8", "fitem_id_feedbacktext_9", "fitem_id_feedbackboundaries_9", "fitem_id_feedbacktext_10", "fitem_id_feedbackboundaries_10", "fitem_id_gradeboundarystatic2", "fitem_id_completionview", "fitem_id_completionusegrade", "fgroup_id_completionpassgroup", "fitem_id_allowofflineattempts"]
          },
          "page-mod-quiz-report":
          {
            "_comment": "Test - Bewertung",
            "default_disabled": true,
            "elements": []
          },
          "page-mod-wiki-mod":
          {
            "_comment": "Wiki",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_wikimode", "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-wiki-view":
          {
            "_comment": "Wiki",
            "default_disabled": true,
            "elements": [ "fitem_id_config_enabledock"]
          },
          "page-mod-book-mod":
          {
            "_comment": "",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_numbering", "fitem_id_navstyle",  "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-resource-mod":
          {
            "_comment": "Datei",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_files",  "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-imscp-mod":
          {
            "_comment": "IMS-Content",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_package", "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-lightboxgallery-mod":
          {
            "_comment": "Lightbox Galerie",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-url-mod":
          {
            "_comment": "Link",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-mediathek-mod":
          {
            "_comment": "Mediathek",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_display",  "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-pmediathek-mod":
          {
            "_comment": "Prüfungsarchiv",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_display", "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-label-mod":
          {
            "_comment": "Textfeld",
            "default_disabled": false,
            "elements": [ "fitem_id_introeditor","fitem_id_completion"]
          },
          "page-mod-page-mod":
          {
            "_comment": "Textseite",
            "default_disabled": false,
            "elements": [ "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-folder-mod":
          {
            "_comment": "",
            "default_disabled": true,
            "elements": [ "fitem_id_introeditor", "fitem_id_showdescription", "fitem_id_files", "fitem_id_display", "fitem_id_showexpanded", "fitem_id_studentedit", "fitem_id_showdownloadfolder",  "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-mod-hvp-mod":
          {
            "_comment": "H5P",
            "default_disabled": false,
            "elements": [ "fitem_id_name", "fitem_id_introeditor", "fitem_id_showdescription", "fgroup_id_h5peditor", "fgroup_id_h5pactiongroup", "fitem_id_h5pfile", "fitem_id_showexpanded", "fitem_id_studentedit", "fitem_id_completion", "fitem_id_completionview", "fitem_id_completionusegrade"]
          },
          "page-blocks-mbstpl-dupcrs":
          {
            "_comment": "Teachshare - Kurs kopieren",
            "default_disabled": true,
            "elements": []
          },
          "page-local-mbslicenseinfo-editlicenses":
          {
            "_comment": "Quellenangaben bearbeiten",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-algebra":
          {
            "_comment": "Fragensammlung - Algebra",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-calculated":
          {
            "_comment": "Fragensammlung - Berechnet",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-calculatedmulti":
          {
            "_comment": "Fragensammlung - Berechnete Multiple-Choice-Frage",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-ddimageortext":
          {
            "_comment": "Drag-and-drop auf Bild",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-ddwtos":
          {
            "_comment": "Drag-and-drop auf Text",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-ddmarker":
          {
            "_comment": "Drag-and-drop auf Markierungen",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-ddmatch":
          {
            "_comment": "Drag-and-drop auf Markierungen",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-calculatedsimple":
          {
            "_comment": "Einfach berechnet",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-essay":
          {
            "_comment": "Freitextfrage",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-geogebra":
          {
            "_comment": "Geogebra",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-shortanswer":
          {
            "_comment": "Kurzantowrt",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-multianswer":
          {
            "_comment": "Lückentext Frage",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-gapselect":
          {
            "_comment": "Lückentextauswahl",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-multichoice":
          {
            "_comment": "Multiple Choice",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-numerical":
          {
            "_comment": "Numerisch",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-truefalse":
          {
            "_comment": "Wahr - Falsch",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-match":
          {
            "_comment": "Zuordnung",
            "default_disabled": true,
            "elements": []
          },
          "page-question-type-description":
          {
            "_comment": "Beschreibung",
            "default_disabled": true,
            "elements": []
          },
          "page-mod-individualfeedback-mod":
          {
            "_comment": "Individuelles Feedback",
            "default_disabled": false,
            "elements": ["fitem_id_timeopen", "fitem_id_timeclose"]
          },
          "page-blocks-mbsteachshare-sendtemplate":
          {
            "_comment": "Teachshare Kurs einreichen",
            "default_disabled": true,
            "elements": []
          },
          "page-blocks-mbsteachshare-coursefromtemplate":
          {
            "_comment": "Teachshare Kurs einreichen",
            "default_disabled": true,
            "elements": []
          },
          "page-blocks-mbsteachshare-edittemplate":
          {
            "_comment": "Teachshare Kurs einreichen",
            "default_disabled": true,
            "elements": []
          },
          "page-user-edit":
          {
            "_comment": "Profil einstellungen",
            "default_disabled": true,
            "elements": []
          },
          "page-local-eportfolio-eportfolio_settings":
          {
            "_comment": "Eportfolio Einstellungen",
            "default_disabled": true,
            "elements": ["fitem_id_theme", "fitem_id_transition"]
          },
          "page-local-eportfolio-references":
          {
            "_comment": "Eportfolio Einstellungen",
            "default_disabled": true,
            "elements": []
          },
          "page-mod-mootyper-mod":
          {
            "_comment": "Tastschreiben Einstellungen",
            "default_disabled": false,
            "elements": ["fitem_id_introeditor", "fitem_id_completion", "fitem_id_completionview"]
          },
          "page-enrol-editinstance":
          {
              "_comment": "Einsschreibemethoden globale Einstellungen",
              "default_disabled": false,
              "elements": ["fitem_id_status", "fitem_id_roleid", "fitem_id_password", "fitem_id_customint1"]
          },          
          "page-mod-learningmap-mod":
          {
              "_comment": "Lernlandkarten Einstellungen",
              "default_disabled": false,
              "elements": ["mod_learningmap_editor"]
          },          
          "page-mod-unilabel-edit_content":
          {
            "_comment": "Unilabel Content bearbeitem",
            "default_disabled": true,
            "elements": ["fitem_id_introeditor"]
          },
          "page-blocks-mbsnewcourse-restore":
          {
              "_comment": "Kurswiederherstellung",
              "default_disabled": true,
              "elements": ["fitem_id_category", "fitem_id_backupfile", "fitem_id_errornocoursefile"]
          },
          "page-admin-auth-oidc-manageapplication":
          {
              "_comment": "Adminbereich Open IDC",
              "default_disabled": true,
              "elements": []
          },
          "page-mod-kanban-mod":
          {
              "_comment": "Kanban Board Einstellungen",
              "default_disabled": false,
              "elements": ["fitem_id_name", "id_history"]
          },
          "page-mod-board-mod":
          {
              "_comment": "Board Einstellungen",
              "default_disabled": true,
              "elements": ["fitem_id_name", "fitem_id_background_color", "fitem_id_background_color", "id_background_image_fieldset", "fitem_id_addrating", "fitem_id_sortby"]
          },
          "page-question-bank-importquestions-import":
          {
              "_comment": "Fragensammlung import",
              "default_disabled": false,
              "elements": ["fitem_id_submitbutton"]          
          }
        }';
        return $config;
    }

    public static function set_custom_profile_field(): void {
        global $DB;

        // Set custom profile field for easyforms.
        $profilefield = [
            'shortname' => 'mbseasyforms',
            'name' => 'vereinfachte Formulare verwenden',
            'datatype' => 'checkbox',
            'description' => '<p>Vereinfachte Formulare standardmäßig aktiviert.<br></p>',
            'descriptionformat' => 1,
            'categoryid' => 1,
            'required' => 0,
            'locked' => 0,
            'visible' => 2,
            'forceunique' => 0,
            'signup' => 0,
            'defaultdata' => 1,
            'defaultdataformat' => 0,
            'param1' => '',
            'param2' => '',
            'param3' => '',
            'param4' => '',
            'param5' => ''
        ];

        // Check for standard category.
        if ($DB->get_field('user_info_category', '*', ['id' => 1])) {
            $DB->insert_record('user_info_field', $profilefield);
        } else {
            mtrace('Creation of custom profile field failed, because of missing category with ID 1');
        }

    }
}
