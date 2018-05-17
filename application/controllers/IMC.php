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
 * Description of TTR_Icd10
 *
 * @author it
 */
class IMC extends ORR_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database('theptarin');
    }

    public function index() {
        
        $this->set_view((object) array('output' => '', 'js_files' => array(base_url('assets/jquery/jquery-3.2.1.min.js'), base_url('assets/jquery/jquery-3.2.1.min.js')), 'css_files' => array(base_url('assets/bootstrap/css/bootstrap.min.css'))));
    }

    /**
     * IMC icd10_code
     */
    public function icd10_code() {

        $crud = $this->get_acrud(['table' => 'imc_icd10_code']);
        $crud->columns('code', 'name_e', 'name_t');
        $crud->required_fields(array('code', 'name_e'));
        $crud->unique_fields(array('code'));
        /**
         * End of function
         */
        $this->set_view($crud->render());
    }
    
    public function icd10_opd(){
        $crud = $this->get_acrud(['table' => 'imc_icd10_opd']);
        $crud->columns('visit_date', 'vn', 'hn','opd_principal_diag');
        $crud->set_relation_n_n('opd_principal_diag','imc_opd_principal_diag','imc_icd10_code','icd10_opd_id','icd10_code_id','name_e');
        //$crud->required_fields(array('code', 'name_e'));
        //$crud->unique_fields(array('code'));
        //$crud->set_relation('signature_opd', 'doctor', '{doctor_id}');
        /**
         * End of function
         */
        $this->set_view($crud->render());
    }

}
