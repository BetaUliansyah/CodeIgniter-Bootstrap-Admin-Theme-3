<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      ExpressionEngine Dev Team
 * @copyright   Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license     http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since       Version 1.3.1
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * HTML Table Generating Class
 *
 * Lets you create tables manually or from database result objects, or arrays.
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    HTML Tables
 * @author      Nick Gorbunov intsurfer73@gmail.com
 * @link        http://codeigniter.com/user_guide/libraries/uri.html
 */
class MY_Table extends CI_Table {

    var $row_class = array();

    function add_row_class($rowclass) {
        $args = func_get_args();
        $this->row_class[] = $this->_prep_args($args);
    }

// --------------------------------------------------------------------

    /**
     * Generate the table
     *
     * @access  public
     * @param   mixed
     * @return  string
     */
    function generate($table_data = NULL) {
        // The table data can optionally be passed to this function
        // either as a database result object or an array
        if (!is_null($table_data)) {
            if (is_object($table_data)) {
                $this->_set_from_object($table_data);
            } elseif (is_array($table_data)) {
                $set_heading = (count($this->heading) == 0 AND $this->auto_heading == FALSE) ? FALSE : TRUE;
                $this->_set_from_array($table_data, $set_heading);
            }
        }

        // Is there anything to display?  No?  Smite them!
        if (count($this->heading) == 0 AND count($this->rows) == 0) {
            return 'Undefined table data';
        }

        // Compile and validate the template date
        $this->_compile_template();

        // set a custom cell manipulation function to a locally scoped variable so its callable
        $function = $this->function;

        // Build the table!

        $out = $this->template['table_open'];
        $out .= $this->newline;

        // Add any caption here
        if ($this->caption) {
            $out .= $this->newline;
            $out .= '<caption>' . $this->caption . '</caption>';
            $out .= $this->newline;
        }

        // Is there a table heading to display?
        if (count($this->heading) > 0) {
            $out .= $this->template['thead_open'];
            $out .= $this->newline;
            $out .= $this->template['heading_row_start'];
            $out .= $this->newline;

            foreach ($this->heading as $heading) {
                $temp = $this->template['heading_cell_start'];

                foreach ($heading as $key => $val) {
                    if ($key != 'data') {
                        $temp = str_replace('<th', "<th $key='$val'", $temp);
                    }
                }

                $out .= $temp;
                $out .= isset($heading['data']) ? $heading['data'] : '';
                $out .= $this->template['heading_cell_end'];
            }

            $out .= $this->template['heading_row_end'];
            $out .= $this->newline;
            $out .= $this->template['thead_close'];
            $out .= $this->newline;
        }

        // Build the table rows
        if (count($this->rows) > 0) {
            $out .= $this->template['tbody_open'];
            $out .= $this->newline;

            $i = 1;
            $cnt = 0;
            foreach ($this->rows as $row) {
                if (!is_array($row)) {
                    break;
                }

                // We use modulus to alternate the row colors
                $name = (fmod($i++, 2)) ? '' : 'alt_';

                //nvg
                if (isset($this->row_class[$cnt][0]['data']))
                    $tr_end = ' class="' . $this->row_class[$cnt][0]['data'] . '">';
                else
                    $tr_end = '>';
                $cnt++;

                $out .= ($this->template['row_' . $name . 'start'] . $tr_end);
                $out .= $this->newline;

                foreach ($row as $cell) {
                    $temp = $this->template['cell_' . $name . 'start'];

                    foreach ($cell as $key => $val) {
                        if ($key != 'data') {
                            $temp = str_replace('<td', "<td $key='$val'", $temp);
                        }
                    }

                    $cell = isset($cell['data']) ? $cell['data'] : '';
                    $out .= $temp;

                    if ($cell === "" OR $cell === NULL) {
                        $out .= $this->empty_cells;
                    } else {
                        if ($function !== FALSE && is_callable($function)) {
                            $out .= call_user_func($function, $cell);
                        } else {
                            $out .= $cell;
                        }
                    }

                    $out .= $this->template['cell_' . $name . 'end'];
                }

                $out .= $this->template['row_' . $name . 'end'];
                $out .= $this->newline;
            }

            $out .= $this->template['tbody_close'];
            $out .= $this->newline;
        }

        $out .= $this->template['table_close'];

        // Clear table class properties before generating the table
        $this->clear();

        return $out;
    }

    function _default_template() {
        return array('table_open' => '<table border="0" cellpadding="4" cellspacing="0">', 'thead_open' => '<thead>', 'thead_close' => '</thead>', 'heading_row_start' => '<tr>', 'heading_row_end' => '</tr>', 'heading_cell_start' => '<th>', 'heading_cell_end' => '</th>', 'tbody_open' => '<tbody>', 'tbody_close' => '</tbody>', 'row_start' => '<tr', 'row_end' => '</tr>', 'cell_start' => '<td>', 'cell_end' => '</td>', 'row_alt_start' => '<tr', 'row_alt_end' => '</tr>', 'cell_alt_start' => '<td>', 'cell_alt_end' => '</td>', 'table_close' => '</table>');
    }

    function clear() {
        $this->row_class = array();
        parent::clear();
    }

}

/* End of file MY_Table.php */
    /* Location: ./application/libraries/MY_Table.php */