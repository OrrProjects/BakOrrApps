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
class IMC extends ORR_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->database('theptarin_utf8');
    }
    
    public function index() {
        $this->set_view((object) array('output' => '', 'js_files' => array(), 'css_files' => array()),'imc_home.php');
    }
    
     /**
     * Orr-apps my_datafield
     */
    public function icd10_code(){
         /**
         * กำหนดค่าที่เกี่ยวกับหน้าจอ
         */
        $this->page_value['title'] = "รหัสการวินิจฉัยโรค";
        $crud = $this->get_acrud(['table' => 'mr_diag', 'subject' => 'รหัสการวินิจฉัยโรค']);
        //$crud->columns('field_id', 'name', 'description');
        $crud->required_fields(array('code', 'name_e'));
        $crud->unique_fields(array('code'));
         /**
         * End of function
         */
        $this->set_view($crud->render());     
    }
}
