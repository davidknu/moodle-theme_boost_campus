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
 * Course renderer.
 *
 * @package   theme_boost_campus
 * @copyright 2017 Kathrin Osswald, Ulm University kathrin.osswald@uni-ulm.de
 *            copyright based on code from theme_boost by Bas Brands
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_boost_campus\output\core;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->dirroot . '/course/renderer.php');

/**
 * Course renderer class.
 */
class course_renderer extends \core_course_renderer {
    /**
     * Displays availability info for a course section or course module
     *
     * @param string $text
     * @param string $additionalclasses
     *
     * @return string
     */
    public function availability_info($text, $additionalclasses = '') {
        $data = ['text' => $text, 'classes' => $additionalclasses];
        $additionalclasses = array_filter(explode(' ', $additionalclasses));
        if (in_array('ishidden', $additionalclasses)) {
            $data['ishidden'] = 1;
        } else if (in_array('isstealth', $additionalclasses)) {
            $data['isstealth'] = 1;
        } else if (in_array('isrestricted', $additionalclasses)) {
            $data['isrestricted'] = 1;
            if (in_array('isfullinfo', $additionalclasses)) {
                $data['isfullinfo'] = 1;
            }
        }
        // MODIFICATION START: Require theme_boost_campus availability_info.mustache.
        return $this->render_from_template('theme_boost_campus/availability_info', $data);
        // MODIFICATION END.
        /* ORIGINAL START
        return $this->render_from_template('theme_boost_campus/availability_info', $data);
        ORIGINAL END. */
    }
}
