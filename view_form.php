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
 * Form for viewing/entering parameters for a custom SQL report.
 *
 * @package report_customsql
 * @copyright 2009 The Open University
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once($CFG->libdir . '/formslib.php');
require_once(dirname(__FILE__) . '/locallib.php');

/**
 * Form for viewing a custom SQL report.
 *
 * @copyright © 2009 The Open University
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class report_customsql_view_form extends moodleform {
    public function definition() {
        global $CFG;

        $mform =& $this->_form;

        $mform->addElement('static', 'displayname', get_string('displayname', 'report_customsql'));
        $mform->addElement('static', 'description', get_string('description', 'report_customsql'));
        $mform->addElement('static', 'querysql', get_string('querysql', 'report_customsql'));

        if (count($this->_customdata)) {
            $mform->addElement('static', 'params', get_string('queryparams', 'report_customsql'));
            foreach ($this->_customdata as $queryparam => $formparam) {
                $mform->addElement('text', $formparam, $queryparam);
            }
            $mform->addElement('static', 'spacer', '', '');
        }

        $this->add_action_buttons(true, 'Run report');
    }

    public function validation($data, $files) {
        global $CFG, $DB, $USER;

        $errors = parent::validation($data, $files);

        return $errors;
    }
}
