<?php

include_once 'BaseController.php';

class sms extends BaseController {

    function sms() {
        parent::__construct();
        //if ($this->session->userdata('logged_in') != TRUE) {
        if ($this->session->userdata('user_id') == "") {
            redirect('orgadmin/index');
        }
        $this->load->model('organization/sms_model');
    }

    function add_sms() {
        $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'send_sms';
        $this->data['dynamicView'] = 'pages/organization/sms/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_sms() {
        $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'send_sms';       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sms_content', 'Content', 'trim|required|max_length[160]');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/sms/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $konto = "ip1-1868";  //username
            $pass = "y5lhyp0q";
            $post_member = $this->input->post("checkbox");
            $post_group = $this->input->post("checkbox1");
            $from_phone = "";
            $uid = $this->session->userdata('user_id');
            $this->data['org_phone'] = $this->sms_model->get_orginfo($uid);
            foreach ($this->data['org_phone'] as $o_info):
                $from_phone = $o_info->content;
            endforeach;
            if (!empty($post_member) || !empty($post_group)) {
                $data1 = array(
                    'sms_content' => $this->input->post('sms_content'),
                );
                $this->sms_model->sms_content_insert($data1);
                $sms_id = $this->db->insert_id();
                $j = 0;
                if (!empty($post_group)) {
                    for ($i = 0; $i < sizeof($post_group); $i++):
                        $group_id = $post_group[$i];
                        $this->data['group_member'] = $this->sms_model->get_group_member($group_id);
                        foreach ($this->data['group_member'] as $g_member_info):
                            $member_id = $g_member_info->id;
                            $phone_number = $g_member_info->phone;
                            $p = $g_member_info->phone;
                            $content = $this->input->post("sms_content");
                            $priority = 2;
                            $c = $this->multiple_receipient($konto, $pass, $from_phone, $phone_number, $content, $priority);
                            //if($c!= -1):
                            $data = array(
                                'receiver_name' => $member_id,
                                'sms_id' => $sms_id,
                                'sms_content' => $this->input->post("sms_content"),
                                'org_id' => $this->session->userdata('user_id'),
                                'sender_name' => $this->session->userdata('user_id'),
                                'sender_contact_no' => $from_phone,
                                'receiver_contact_no' => $p,
                                'sender_status' => 1,
                                'sending_date' => date('Y-m-d'),
                                'status' => 1
                            );
                            $this->sms_model->sms_insert($data);
                            // endif;
                            $j = $j + 1;
                        endforeach;
                    endfor;
                }
                //if count member
                if (!empty($post_member)) {
                    for ($i = 0; $i < sizeof($post_member); $i++):
                        $id = $post_member[$i];
                        $this->data['m'] = $this->sms_model->get_member($id);
                        foreach ($this->data['m'] as $g):
                            $phone_number1 = $g->phone;
                        endforeach;
                        $phone_number = $phone_number1;
                        $p = $phone_number1;
                        $content = $this->input->post("sms_content");
                        $priority = 2;
                        $c = $this->multiple_receipient($konto, $pass, $from_phone, $phone_number, $content, $priority);
                        $data1 = array(
                            'receiver_name' => $post_member[$i],
                            'sms_id' => $sms_id,
                            'sms_content' => $this->input->post("sms_content"),
                            'org_id' => $this->session->userdata('user_id'),
                            'sender_contact_no' => $from_phone,
                            'receiver_contact_no' => $p,
                            'sender_name' => $this->session->userdata('user_id'),
                            'sender_status' => 1,
                            'sending_date' => date('Y-m-d'),
                            'status' => 1
                        );
                        $this->sms_model->sms_insert1($data1);
                    endfor;
                }
                $total_no_of_sms = sizeof($post_member) + $j;
                $data2 = array(
                    'sending_date' => date('Y-m-d'),
                    'sender_name' => 0,
                    'no_of_sms' => $total_no_of_sms,
                    'org_id' => $this->session->userdata('user_id'),
                    'sms_id' => $sms_id,
                    'status' => 2
                );
                $this->sms_model->total_sms_insert($data2);
                $this->session->set_flashdata('message', '<div id="message">Sms send successfully.</div>');
                redirect('organization/sms/add_sms');
            } else {
                $this->session->set_flashdata('message', '<div id="message">Please Select Sender Name.</div>');
                redirect('organization/sms/add_sms');
            }
        }
    }

//external sms start
    function add_external_sms() {
         $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'external_sms';
        $this->data['dynamicView'] = 'pages/organization/sms/external_entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_external_sms() {
         $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'external_sms';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sms_content', 'Content', 'trim|required|max_length[160]');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/sms/external_entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $konto = "ip1-1868";  //username
            $pass = "y5lhyp0q";
            $post_member = $this->input->post("checkbox");
            $from_phone = "";
            $uid = $this->session->userdata('user_id');
            $this->data['org_phone'] = $this->sms_model->get_orginfo($uid);
            foreach ($this->data['org_phone'] as $o_info):
                $from_phone = $o_info->content;
            endforeach;
            if (!empty($post_member)) {
                $data1 = array(
                    'sms_content' => $this->input->post('sms_content'),
                );
                $this->sms_model->sms_content_insert($data1);
                $sms_id = $this->db->insert_id();
                //if count member
                for ($i = 0; $i < sizeof($post_member); $i++):
                    $id = $post_member[$i];
                    $this->data['m'] = $this->sms_model->get_member_external($id);
                    foreach ($this->data['m'] as $g):
                        $phone_number1 = $g->contact_no;
                    endforeach;
                    $phone_number = $phone_number1;
                    $p = $phone_number1;
                    $content = $this->input->post("sms_content");
                    $priority = 2;
                    $c = $this->multiple_receipient($konto, $pass, $from_phone, $phone_number, $content, $priority);
                    $data1 = array(
                        'receiver_name' => $post_member[$i],
                        'sms_id' => $sms_id,
                        'sms_content' => $this->input->post("sms_content"),
                        'org_id' => $this->session->userdata('user_id'),
                        'sender_contact_no' => $from_phone,
                        'receiver_contact_no' => $p,
                        'sender_name' => $this->session->userdata('user_id'),
                        'sender_status' => 1,
                        'sending_date' => date('Y-m-d'),
                        'status' => 2
                    );
                    $this->sms_model->sms_insert1($data1);
                endfor;
                $total_no_of_sms = sizeof($post_member);

                $data2 = array(
                    'sending_date' => date('Y-m-d'),
                    'sender_name' => 0,
                    'no_of_sms' => $total_no_of_sms,
                    'org_id' => $this->session->userdata('user_id'),
                    'sms_id' => $sms_id,
                    'status' => 2
                );
                $this->sms_model->total_sms_insert($data2);
                $this->session->set_flashdata('message', '<div id="message">Sms send successfully.</div>');
                redirect('organization/sms/add_sms');
            } else {
                $this->session->set_flashdata('message', '<div id="message">Please Select Sender Name.</div>');
                redirect('organization/sms/add_sms');
            }
        }
    }

//external sms end
    function multiple_receipient($konto, $pass, $from, $phone_number, $content, $priority) {
        $proxyhost = "";
        $proxyport = "";
        $proxyusername = "";
        $proxypassword = "";
        require_once(APPPATH . 'libraries/nusoap/nusoap' . EXT);
        $params = array('konto' => $konto, 'passwd' => $pass, 'till' => trim($phone_number), 'from' => $from, 'meddelande' => $content, 'prio' => $priority);
        // echo "<pre>";print_r($params);die();
        $wsdlurl = "http://web.smscom.se/sendSms/sendSms.asmx?WSDL";
        //$client = new nusoap_client($wsdlurl, 'wsdl');
        $client = new nusoap_client($wsdlurl, 'wsdl', $proxyhost, $proxyport, $proxyusername, $proxypassword);
        $client->authtype = 'certificate';
        $client->decode_utf8 = 0;
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call("sms", $params);
        return $result['smsResult'];
    }

//following function returns balance information
//echo balance($konto, $pass);
    function balance($konto, $pass) {
        require_once(APPPATH . 'libraries/nusoap/nusoap' . EXT);
        $params = array('Konto' => $konto, 'Passwd' => $pass);
        $wsdlurl = "http://web.smscom.se/sendSms/sendSms.asmx?WSDL";
        // $client = new nusoap_client($wsdlurl, 'wsdl', $proxyhost, $proxyport, $proxyusername, $proxypassword);
        $client = new nusoap_client($wsdlurl, 'wsdl');

        $client->authtype = 'certificate';
        $client->decode_utf8 = 0;
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call("balans", $params);
        return $result['balansResult'];
    }

//contact list create,delete,update
    function add_address() {
        $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'contact_list';
        $this->data['dynamicView'] = 'pages/organization/contact_list/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_address() {
        $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'contact_list';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact No', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/contact_list/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'org_id' => $this->session->userdata('user_id'),
                'name' => $this->input->post('name'),
                'contact_no' => $this->input->post('contact_no')
            );
            $this->sms_model->address_list_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Contact Info Saved Successfully.</div>');
            redirect('organization/sms/add_address');
        }
    }

    function view_address_list() {
         $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'contact_edit';
        $this->data['query1'] = $this->sms_model->view_address_list();
        $this->data['dynamicView'] = 'pages/organization/contact_list/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function address_edit($id=NULL) {
         $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'contact_edit';
        if ($id !== NULL) {
            $this->data['record'] = $this->sms_model->get_all_address($id);
            $this->data['dynamicView'] = 'pages/organization/contact_list/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('name', 'Name', 'trim|required');
            $val->set_rules('contact_no', 'Contact No', 'trim|required');

            if ($val->run()) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'contact_no' => $this->input->post('contact_no')
                );
                $this->session->set_flashdata('message', '<div id="message1">Contact list Updated Successfully.</div>');
                $this->sms_model->address_list_update($data);
                redirect('organization/sms/view_address_list', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function address_delete($id = NULL) {
         $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'contact_edit';
        $this->sms_model->address_delete($id);
        redirect('organization/sms/view_address_list', 'location', 301);
    }

//end contact list create ,delete,update

//signature list create,delete,update
    function add_signature() {
        $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'signature';
        $this->data['dynamicView'] = 'pages/organization/signature/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_signature() {
        $this->data['mainTab'] = 'sms';
         $this->data['activeTab'] = 'signature';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'OrgName', 'trim|required|max_length[8]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/signature/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
		 $query=$this->db->query("select * from signature where org_id='". $this->session->userdata('user_id')."'");
		 if($query->num_rows()>0){
		    $this->session->set_flashdata('message', '<div id="message"> Signature Info Exists.</div>');
            redirect('organization/sms/add_signature');
		 }
		 else{
            $data = array(
                'org_id' => $this->session->userdata('user_id'),
                'content' => $this->input->post('name')
               
            );
            $this->sms_model->signature_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Signature Info Saved Successfully.</div>');
            redirect('organization/sms/add_signature');
        }
		}
    }

    function view_signature() {
         $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'view_signature';
        $this->data['query1'] = $this->sms_model->view_signature();
        $this->data['dynamicView'] = 'pages/organization/signature/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function signature_edit($id=NULL) {
        $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'view_signature';
        if ($id !== NULL) {
            $this->data['record'] = $this->sms_model->get_all_signature($id);
            $this->data['dynamicView'] = 'pages/organization/signature/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $this->form_validation->set_rules('name', 'OrgName', 'trim|required|max_length[8]');           

            if ($val->run()) {
                $data = array(
                    'content' => $this->input->post('name'),
                   
                );
                $this->session->set_flashdata('message', '<div id="message1">Signature Updated Successfully.</div>');
                $this->sms_model->signature_list_update($data);
                redirect('organization/sms/view_signature', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function signature_delete($id = NULL) {
         $this->data['mainTab'] = 'sms';
        $this->data['activeTab'] = 'view_signature';
        $this->sms_model->signature_delete($id);
        redirect('organization/sms/view_signature', 'location', 301);
    }

//end contact list create ,delete,update

    protected

    function _commonPageLayout($viewName, $cacheIt = FALSE) {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/site_top_logo_org', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_menu_org', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}