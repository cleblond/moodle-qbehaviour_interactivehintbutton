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
 * Renderer for outputting parts of a question belonging to the interactivehintbutton
 * behaviour.
 *
 * @package    qbehaviour
 * @subpackage interactivehintbutton
 * @copyright  2009 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();


/**
 * interactivehintbutton behaviour renderer.
 *
 * @copyright  2009 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qbehaviour_interactivehintbutton_renderer extends qbehaviour_renderer {
    public function controls(question_attempt $qa, question_display_options $options) {
        
        //echo "RENDERER CONTROLS";
        if (!$qa->get_state()->is_active() || !$options->readonly) {
                $attributes = array(
		    'type' => 'button',
		    'id' => 'hintbutton',
		    'name' => 'hintbutton',
		    'value' => 'Hint',
		    'class' => 'hintbutton',
		);

			//if($hint != null){
				$output = html_writer::empty_tag('input', $attributes);
			//}
        
	return $this->submit_button($qa, $options).$output;
        }
        return $this->submit_button($qa, $options);
    }

    public function feedback(question_attempt $qa, question_display_options $options) {
        //$options->feedback = 1;
        //echo "RENDERER FEEDBACK";
        //print_object($options);

        if (!$qa->get_state()->is_active() || !$options->readonly) {
		$jsmodule = array(
	            'name'     => 'qbehaviour_interactivehintbutton',
	            'fullpath' => new moodle_url('/question/behaviour/interactivehintbutton/module.js'),
	            'requires' => array('transition'),
	            'strings' => array()
	        );
        	$this->page->requires->js_init_call('M.qbehaviour_interactivehintbutton.expand_div',array(),true,$jsmodule);
            return '';
        }

        


        $attributes = array(
            'type' => 'submit',
            'id' => $qa->get_behaviour_field_name('tryagain'),
            'name' => $qa->get_behaviour_field_name('tryagain'),
            'value' => get_string('tryagain', 'qbehaviour_interactivehintbutton'),
            'class' => 'submit btn',
        );
        if ($options->readonly !== qbehaviour_interactivehintbutton::READONLY_EXCEPT_TRY_AGAIN) {
            $attributes['disabled'] = 'disabled';
        }
        //print_object($attributes);
        $output = html_writer::empty_tag('input', $attributes);
        if (empty($attributes['disabled'])) {
            $this->page->requires->js_init_call('M.core_question_engine.init_submit_button',
                    array($attributes['id'], $qa->get_slot()));
        }
        //print_object($output);
      
        return $output;

    }
}
