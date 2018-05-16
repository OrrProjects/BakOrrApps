<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * The MIT License
 *
 * Copyright 2561 it.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Description of Reports
 *
 * @author it
 */
class Ttr_mse extends ORR_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database('ttr_mse');
    }

    public function index() {
        $this->set_view((object) array('output' => '', 'js_files' => array(base_url('assets/jquery/jquery-3.2.1.min.js'), base_url('assets/jquery/jquery-3.2.1.min.js')), 'css_files' => array(base_url('assets/bootstrap/css/bootstrap.min.css'))));
    }

    public function patient() {

        $crud = $this->get_acrud(['table' => 'patient']);
        $crud->columns('hn', 'fname', 'lname', 'sex', 'idcard');
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        //$crud->required_fields(array('code', 'name_e'));
        //$crud->unique_fields(array('code'));
        /**
         * End of function
         */
        $this->set_view($crud->render());
    }
    
    public function lab_result() {

        $crud = $this->get_acrud(['table' => 'lab_result']);
        $crud->columns('document_date', 'hn', 'result_lab_type', 'result_lab_id', 'result_id','result_text','result_unit');
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        //$crud->required_fields(array('code', 'name_e'));
        //$crud->unique_fields(array('code'));
        /**
         * End of function
         */
        $this->set_view($crud->render());
    }

}
