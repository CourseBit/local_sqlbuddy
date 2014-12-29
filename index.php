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
 * SQL Buddy
 *
 * @package    local
 * @subpackage sqlbuddy
 * @copyright  2014 CourseBit LLC | www.coursebit.net
 * @author     Joseph Conradt | joseph.conradt@coursebit.net
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . '/../../config.php');
require_once($CFG->libdir . '/adminlib.php');

require_login();
require_capability('moodle/site:config', context_system::instance());

admin_externalpage_setup('local_sqlbuddy', '', null);

$PAGE->set_heading($SITE->fullname);
$PAGE->set_title($SITE->fullname . ': ' . get_string('pluginname', 'local_sqlbuddy'));

raise_memory_limit(MEMORY_HUGE);
set_time_limit(300);

echo $OUTPUT->header();

echo $OUTPUT->heading(get_string('pluginname', 'local_sqlbuddy'));
echo $OUTPUT->box_start('generalbox boxaligncenter boxwidthnormal');
echo sprintf('<button onclick="sqlbuddy_popup()">%s</button>', get_string('open', 'local_sqlbuddy'));
echo sprintf('<p>%s</p>', get_string('helptext', 'local_sqlbuddy'));
echo $OUTPUT->box_end();
?>

<script type="text/javascript">
    function sqlbuddy_popup() {
        var url = "<?php echo new moodle_url('/local/sqlbuddy/vendor/sqlbuddy/index.php'); ?>";
        var width = document.documentElement.clientWidth * 0.8;
        var height = document.documentElement.clientHeight * 0.6;
        
        window.open(url, "SQLBuddyWindow", "resizable,scrollbars,status,width=" + width + ",height=" + height);
    }
</script>

<?php
echo $OUTPUT->footer();