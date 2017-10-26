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
 * Unit tests for mbs
 *
 * @package   local_mbseasyforms
 * @copyright 2017 Tobias Garske, ISB Bayern
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '\..\..\..\lib\phpunit\lib.php');


// class local_mbseasyforms_testcase extends advanced_testcase {
// 	public function test_adding() {
// 		$this->assertEquals(2, 1+2);
// 	}
// }

// class local_mbseasyforms_testcase extends advanced_testcase {
// 	public function test_deleting() {
// 		global $DB;
// 		$this->resetAfterTest(true);
// 		$DB->delete_records('user');
// 		$this->assertEmpty($DB->get_records('user'));
// 	}
// 	public function test_user_table_was_reset() {
// 		global $DB;
// 		$this->assertEquals(2, $DB->count_records('user', array()));
// 	}
// }

// //phpunit guide
// class local_mbseasyforms_testcase extends basic_testcase  {
// 	public function testPushAndPop() {
// 		$stack = [];
// 		$this->assertEquals(0, count($stack));

// 		array_push($stack, 'foo');
// 		$this->assertEquals('foo', $stack[count($stack)-1]);
// 		$this->assertEquals(1, count($stack));

// 		$this->assertEquals('foo', array_pop($stack));
// 		$this->assertEquals(0, count($stack));
// 	}
// }

class local_mbseasyforms_testcase extends advanced_testcase 
{
    public function test_plugin_installed() {
        global $CFG;
        require_once($CFG->dirroot . '/local/mbseasyforms/lib.php');        
        
        $config = get_config('local_mbseasyforms');
        $this->assertNotFalse($config);
    }

}