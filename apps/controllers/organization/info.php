<?php

include_once 'BaseController.php';

class info extends BaseController {

    function info() {
        parent::__construct();
        //if ($this->session->userdata('logged_in') != TRUE) {
        if ($this->session->userdata('user_id') == "") {
            redirect('orgadmin/index');
        }
        $this->load->model('organization/info_model');
        $this->load->helper('common_helper');
    }

    function show_profile() {
        $org_id = $this->session->userdata('user_id');
        $this->data['record'] = $this->info_model->get_all($acc_no);
        $this->data['record1'] = $this->info_model->get_account1($acc_no);
        $this->data['dynamicView'] = 'pages/users/profile/report_detail';
        $this->_commonPageLayout('frontend_viewer');
    }

    function add_group() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'group';
        $this->data['dynamicView'] = 'pages/organization/group/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function org_group($group_name, $org_id) {

        $result = $this->dx_auth->is_org_group_available($group_name, $org_id);
        if (!$result) {
            $this->form_validation->set_message('org_group', 'Group name exists.Please choose another one.');
        }

        return $result;
    }

    function added_group() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'group';
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('group_name', 'Group Name', 'trim|required|callback_org_group');
        $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required|callback_org_group[' . $this->session->userdata('user_id') . ']');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/group/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'group_name' => ucfirst($this->input->post("group_name")),
                'org_id' => $this->session->userdata('user_id')
            );
            // echo "<pre>";print_r($data);die();
            $this->info_model->org_group_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Group Created Successfully.</div>');
            redirect('organization/info/add_group');
        }
    }

    function view_org_group() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_group';
        $org_id = $this->session->userdata('user_id');
        $this->data['query1'] = $this->info_model->view_org_group1($org_id);
        $this->data['dynamicView'] = 'pages/organization/group/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function org_group1($group_name, $id1, $org_id) {

        $result = $this->dx_auth->is_org_group_available($group_name, $id1, $org_id);
        if (!$result) {
            $this->form_validation->set_message('org_group', 'Group name exists.Please choose another one.');
        }

        return $result;
    }

    function org_group12($group_name, $id1) {
        $org_id = $this->session->userdata('user_id');
        $result = $this->dx_auth->is_org_group1_available($group_name, $org_id, $id1);
        if (!$result) {
            $this->form_validation->set_message('org_group12', 'Group name exists.Please choose another one.');
        }

        return $result;
    }

//callback_check_package_name[' . $this->input->post("id") . ']'
    function org_group_edit($id=NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_group';
        if ($id !== NULL) {
            $this->data['record'] = $this->info_model->get_org_group($id);
            $this->data['dynamicView'] = 'pages/organization/group/edit';
        }
        if (count($_POST)) {
            //echo "hi";die();
            $val = $this->form_validation;
            $val->set_rules('org_group', 'Group Name', 'trim|required|callback_org_group12[' . $this->input->post('id') . ']');
            if ($val->run()) {
                $data = array(
                    'group_name' => ucfirst($this->input->post("org_group"))
                );
                $this->info_model->org_group_update($data);
                redirect('organization/info/view_org_group', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function org_group_delete($id = NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_group';
        $this->info_model->org_group_delete($id);
        redirect('organization/info/view_org_group', 'location', 301);
    }

    function org_group_permission_delete($id = NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_group_permission';
        $this->info_model->org_group_permission_delete($id);
        redirect('organization/info/view_group_permission', 'location', 301);
    }

    function add_group_permission() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'group_permission';
        $this->data['dynamicView'] = 'pages/organization/permission/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_group_permission() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'group_permission';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
        $this->form_validation->set_rules('sending_email', 'Sending Email', 'trim|required');
        $this->form_validation->set_rules('sending_sms', 'Sending Sms', 'trim|required');
        $this->form_validation->set_rules('sending_post', 'Sending Post', 'trim|required');
        $this->form_validation->set_rules('profile', 'Profile', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/permission/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $g_name = $this->input->post("group_name");
            $this->data['record'] = $this->info_model->get_existing_permission($g_name);
            if (count($this->data['record'])) {
                $this->session->set_flashdata('message', '<div id="message">Group Permission Setting exists.</div>');
                redirect('organization/info/add_group_permission');
            } else {
                $org_id = $this->session->userdata('user_id');
                $data = array(
                    'sending_email' => $this->input->post("sending_email"),
                    'sending_sms' => $this->input->post("sending_sms"),
                    'sending_post' => $this->input->post("sending_post"),
                    'profile' => $this->input->post("profile"),
                    'message' => $this->input->post("message"),
                    'group_id' => $this->input->post("group_name"),
                    'org_id' => $org_id
                );
                $this->info_model->group_permission_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Group Permission Setting Saved Successfully.</div>');
                redirect('organization/info/add_group_permission');
            }
        }
    }

    function view_group_permission() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_group_permission';
        $org_id = $this->session->userdata('user_id');
        $this->data['query1'] = $this->info_model->view_group_permission($org_id);
        $this->data['dynamicView'] = 'pages/organization/permission/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    protected function now_upload($photo) {
        $setConfig['upload_path'] = './uploads/';
        $setConfig['allowed_types'] = 'BMP|GIF|JPG|PNG|JPEG|gif|jpg|png|jpeg|bmp';
        $setConfig['encrypt_name'] = TRUE;
        $setConfig['max_size'] = '';
        $setConfig['max_width'] = '';
        $setConfig['max_height'] = '';
        $this->load->library('upload');
        $this->upload->initialize($setConfig);
        if (!$this->upload->do_upload($photo)) {
            $this->data['admin_message'] = $this->upload->display_errors("<p style='color:#FF0000; font-weight:bold;'>", "</p>");
            return FALSE;
        } else {
            $this->upload_data = $this->upload->data();
            return TRUE;
        }
    }

    function edit_profile() {
        $this->data['record'] = $this->info_model->get_org_profile();
        $this->data['dynamicView'] = 'pages/organization//edit';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_profile() {
        $data = array(
            'org_primary_address' => $this->input->post('org_primary_address'),
            'org_optional_address' => $this->input->post('org_optional_address'),
            'org_phone' => $this->input->post('org_phone'),
            'org_type' => $this->input->post('org_type')
        );
        for ($i = 1; $i <= count($_FILES); $i++) {
            if ($_FILES['photo' . $i]['size'] > 0) {
                if ($this->now_upload('photo' . $i)) {
                    $fileData = array(
                        'photo' . $i => $this->upload_data['file_name'],
                    );
                    $data = array_merge($data, $fileData);
                }
            }
        }

        $this->info_model->profile_update($data);
        $this->session->set_flashdata('message', '<div id="message1">Profile Updated Successfully.</div>');
        redirect('organization/back/index', 'location', 301);
    }

    function group_edit($id) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_group_permission';
        $this->data['record'] = $this->info_model->get_group_info($id);
        $this->data['dynamicView'] = 'pages/organization/permission/edit';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_group() {
        $data = array(
            'sending_email' => $this->input->post("sending_email"),
            'sending_sms' => $this->input->post("sending_sms"),
            'sending_post' => $this->input->post("sending_post"),
            'profile' => $this->input->post("profile"),
            'message' => $this->input->post("message")
        );
        $this->info_model->group_permission_update($data);
        // $this->session->set_flashdata('message', '<div id="message">Profile Updated Successfully.</div>');
        redirect('organization/info/view_group_permission', 'location', 301);
    }

    function add_cost($start=0) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'cost_setting';
        $this->data['dynamicView'] = 'pages/organization/cost/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_cost($start=0) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'cost_setting';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sms_cost', 'Sms Cost', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('letter_cost', 'Letter Cost', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('currency', 'currency', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/cost/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $org_id = $this->session->userdata('user_id');
            $this->data['record'] = $this->info_model->get_all_cost($org_id);
            if (count($this->data['record'])) {
                $this->session->set_flashdata('message', '<div id="message">Sorry Cost settings Exists .</div>');
                redirect('organization/info/add_cost');
            } else {
                $data = array(
                    'sms_cost' => $this->input->post('sms_cost'),
                    'letter_cost' => $this->input->post('letter_cost'),
                    'currency' => $this->input->post('currency'),
                    'org_id' => $org_id
                );
                $this->info_model->cost_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Cost inserted Successfully.</div>');
                redirect('organization/info/add_cost');
            }
        }
    }

    function view_cost() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_cost';
        $org_id = $this->session->userdata('user_id');
        $this->data['query1'] = $this->info_model->view_cost($org_id);
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/cost/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function cost_edit($id=NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_cost';
        if ($id != NULL) {
            $this->data['record'] = $this->info_model->get_cost($id);
            $this->data['dynamicView'] = 'pages/organization/cost/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('sms_cost', 'Sms cost', 'trim|required||numeric|xss_clean');
            $val->set_rules('letter_cost', 'Letter Cost', 'trim|required|numeric|xss_clean');
            $val->set_rules('currency', 'Currency', 'trim|required|xss_clean');
            if ($val->run()) {
                $data = array(
                    'sms_cost' => $this->input->post('sms_cost'),
                    'letter_cost' => $this->input->post('letter_cost'),
                    'currency' => $this->input->post('currency')
                );
                $this->info_model->cost_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Cost Setting  Updated Successfully.</div>');
                redirect('organization/info/view_cost', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function cost_delete($id = NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_cost';
        $this->info_model->cost_delete($id);
        redirect('organization/info/view_cost', 'location', 301);
    }

    function check_member_username($username) {

        $result = $this->dx_auth->is_member_username_available($username);
        if (!$result) {
            $this->form_validation->set_message('check_member_username', 'Username Exists.Please choose another one.');
        }

        return $result;
    }

    function check_member_email($email) {
        $result = $this->dx_auth->is_member_email_available($email);
        if (!$result) {
            $this->form_validation->set_message('check_member_email', 'Email is already Exists.');
        }

        return $result;
    }

    function check_person_number($person_number) {
        $result = $this->dx_auth->is_person_number_available($person_number);
        if (!$result) {
            $this->form_validation->set_message('check_person_number', 'Person No is exists.Please choose another one');
        }

        return $result;
    }

    function add_member() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'register_member';
        $this->data['OptionsClient'] = getOptionsClient();
        $this->data['OptionsGroup'] = getOptionGroup();
        //echo "<pre>";print_r($this->data['OptionsClient']);die();
        $this->data['dynamicView'] = 'pages/member/register/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_member() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'register_member';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('bank_info', 'Bank Info', 'trim|xss_clean');
        $this->form_validation->set_rules('household_size', 'House Host size', 'trim|xss_clean');
        $this->form_validation->set_rules('member_title', 'Member Title', 'trim|xss_clean');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('person_number', 'Person Number', 'trim|required|xss_clean|callback_check_person_number');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_check_member_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_member_username');
        $this->form_validation->set_rules('member_group', 'Group', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[10]|');
        if ($this->form_validation->run() == FALSE) {
            $this->data['OptionsClient'] = getOptionsClient();
            $this->data['OptionsGroup'] = getOptionGroup();
            $this->data['dynamicView'] = 'pages/member/register/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $query = $this->db->query("select * from member_previlige where user_type='" . $this->input->post('user_type') . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">Sorry registration failed.User type previlization not exists.Please set previlization.</div>');
                redirect('organization/info/add_member');
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'member_title' => $this->input->post('member_title'),
                    'person_number' => $this->input->post('person_number'),
                    'expire_date' => $this->input->post('expire_date'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'bank_info' => $this->input->post('bank_info'),
                    'household_size' => $this->input->post('household_size'),
                    'member_group' => $this->input->post('member_group'),
                    'username' => $this->input->post('username'),
                    'password' => base64_encode($this->input->post('password')),
                    'user_type' => $this->input->post('user_type'),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->member_registration($data);
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $this->load->library('email');
                $this->email->from('info@onlineassociation.com', 'Confirmation ');
                $this->email->to("$email");
                $this->email->subject('Confirmation');
                $this->email->message("Dear $name Thanks for registration.your registration approved successfully.Your Username is $username and Password is $password");
                $this->email->send();
                $this->session->set_flashdata('message', '<div id="message1">Member Registered Successfully.</div>');
                redirect('organization/info/add_member');
            }
        }
    }

    function change_org_name() {
        $this->data['dynamicView'] = 'pages/organization/edit_orgname';
        $this->_commonPageLayout('frontend_viewer');
    }

    function check_org_email1($email, $id1) {

        $result = $this->dx_auth->org_email1_available($email, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_org_email1', 'Email id  exists. Please choose another one.');
        }

        return $result;
    }

    function check_org_name1($org_name, $id1) {

        $result = $this->dx_auth->org_name1_available($org_name, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_org_name1', 'Org Name  exists. Please choose another one.');
        }

        return $result;
    }

    function check_org_username($username, $id1) {

        $result = $this->dx_auth->org_u1_available($username, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_org_username', 'UserName  exists. Please choose another one.');
        }

        return $result;
    }

    function check_org_username_person($person_number, $id1) {

        $result = $this->dx_auth->org_u1_available_person($person_number, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_org_username_person', 'Person No  exists. Please choose another one.');
        }

        return $result;
    }

    //callback_check_package_name[' . $this->input->post("id") . ']'
    function edit_org() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('org_name', 'Org Name', 'trim|required|xss_clean|callback_check_org_name1[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_org_username[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('person_number', 'Person Number', 'trim|required|xss_clean|callback_check_org_username_person[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_check_org_email1[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('org_primary_address', 'Primary Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', 'Org Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description of org', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/edit_org';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            if ($this->input->post("category_name")) {
                $data1 = array(
                    'org_type' => ucfirst($this->input->post('category_name')),
                    'status' => 1
                );
                $this->info_model->org_type_insert($data1);
                $org_id = $this->db->insert_id();

                $data = array(
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'phone_no' => $this->input->post("phone_no"),
                    'address' => $this->input->post("address"),
                    'email' => $this->input->post("email"),
                    'username' => $this->input->post("username"),
                    'description' => $this->input->post("description"),
                    'org_name' => $this->input->post("org_name"),
                    'org_primary_address' => $this->input->post("org_primary_address"),
                    'org_optional_address' => $this->input->post("org_optional_address"),
                    'org_phone' => $this->input->post("org_phone"),
                    'card_no' => $this->input->post("card_no"),
                    'expire_date' => $this->input->post("expire_date"),
                    'cvv2_no' => $this->input->post("cvv2_no"),
                    'name_on_card' => $this->input->post("name_on_card"),
                    'org_type' => $org_id,
                    'bank_info' => $this->input->post("bank_info"),
                    'flag' => 1
                );
                for ($i = 1; $i <= count($_FILES); $i++) {
                    if ($_FILES['photo' . $i]['size'] > 0) {
                        if ($this->now_upload('photo' . $i)) {
                            $fileData = array(
                                'photo' . $i => $this->upload_data['file_name'],
                            );
                            $data = array_merge($data, $fileData);
                        }
                    }
                }
            } else {
                $data = array(
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'phone_no' => $this->input->post("phone_no"),
                    'address' => $this->input->post("address"),
                    'email' => $this->input->post("email"),
                    'username' => $this->input->post("username"),
                    'description' => $this->input->post("description"),
                    'org_name' => $this->input->post("org_name"),
                    'org_primary_address' => $this->input->post("org_primary_address"),
                    'org_optional_address' => $this->input->post("org_optional_address"),
                    'org_phone' => $this->input->post("org_phone"),
                    'card_no' => $this->input->post("card_no"),
                    'expire_date' => $this->input->post("expire_date"),
                    'cvv2_no' => $this->input->post("cvv2_no"),
                    'name_on_card' => $this->input->post("name_on_card"),
                    'org_type' => $this->input->post("org_type"),
                    'bank_info' => $this->input->post("bank_info"),
                    'flag' => 1
                );
                for ($i = 1; $i <= count($_FILES); $i++) {
                    if ($_FILES['photo' . $i]['size'] > 0) {
                        if ($this->now_upload('photo' . $i)) {
                            $fileData = array(
                                'photo' . $i => $this->upload_data['file_name'],
                            );
                            $data = array_merge($data, $fileData);
                        }
                    }
                }
            }

            $this->info_model->org_profile_update($data);

            $this->session->set_flashdata('message', '<div id="message1">Org Profile Updated Successfully.</div>');
            redirect('organization/info/edit_org');
        }
    }

    function modify_org() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        $this->data['dynamicView'] = 'pages/organization/organization_edit';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_organization() {
        $this->load->library('form_validation');
        //$this->form_validation->set_rules('org_name', 'Org Name', 'trim|required|xss_clean|callback_check_org_name1[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_check_org_username[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('person_number', 'Person Number', 'trim|required|xss_clean|callback_check_org_username_person[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_check_org_email1[' . $this->session->userdata("user_id") . ']');
        $this->form_validation->set_rules('org_primary_address', 'Primary Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', 'Org Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description of org', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/organization_edit';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            if ($this->input->post("category_name")) {
                $data1 = array(
                    'org_type' => ucfirst($this->input->post('category_name')),
                    'status' => 1
                );
                $this->info_model->org_type_insert($data1);
                $org_id = $this->db->insert_id();

                $data = array(
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'phone_no' => $this->input->post("phone_no"),
                    'address' => $this->input->post("address"),
                    'email' => $this->input->post("email"),
                    'username' => $this->input->post("username"),
                    'description' => $this->input->post("description"),
                    'org_name' => $this->input->post("org_name"),
                    'org_primary_address' => $this->input->post("org_primary_address"),
                    'org_optional_address' => $this->input->post("org_optional_address"),
                    'org_phone' => $this->input->post("org_phone"),
                    'card_no' => $this->input->post("card_no"),
                    'expire_date' => $this->input->post("expire_date"),
                    'cvv2_no' => $this->input->post("cvv2_no"),
                    'name_on_card' => $this->input->post("name_on_card"),
                    'org_type' => $org_id,
                    'bank_info' => $this->input->post("bank_info"),
                    'flag' => 1
                );
                for ($i = 1; $i <= count($_FILES); $i++) {
                    if ($_FILES['photo' . $i]['size'] > 0) {
                        if ($this->now_upload('photo' . $i)) {
                            $fileData = array(
                                'photo' . $i => $this->upload_data['file_name'],
                            );
                            $data = array_merge($data, $fileData);
                        }
                    }
                }
            } else {
                $data = array(
                    'first_name' => $this->input->post("first_name"),
                    'last_name' => $this->input->post("last_name"),
                    'phone_no' => $this->input->post("phone_no"),
                    'address' => $this->input->post("address"),
                    'email' => $this->input->post("email"),
                    'username' => $this->input->post("username"),
                    'description' => $this->input->post("description"),
                    'org_name' => $this->input->post("org_name"),
                    'org_primary_address' => $this->input->post("org_primary_address"),
                    'org_optional_address' => $this->input->post("org_optional_address"),
                    'org_phone' => $this->input->post("org_phone"),
                    'card_no' => $this->input->post("card_no"),
                    'expire_date' => $this->input->post("expire_date"),
                    'cvv2_no' => $this->input->post("cvv2_no"),
                    'name_on_card' => $this->input->post("name_on_card"),
                    'org_type' => $this->input->post("org_type"),
                    'bank_info' => $this->input->post("bank_info"),
                    'flag' => 1
                );
                for ($i = 1; $i <= count($_FILES); $i++) {
                    if ($_FILES['photo' . $i]['size'] > 0) {
                        if ($this->now_upload('photo' . $i)) {
                            $fileData = array(
                                'photo' . $i => $this->upload_data['file_name'],
                            );
                            $data = array_merge($data, $fileData);
                        }
                    }
                }
            }

            $this->info_model->org_profile_update($data);

            $this->session->set_flashdata('message', '<div id="message1">Org Profile Updated Successfully.</div>');
            redirect('organization/info/modify_org');
        }
    }

    function org_name_check($org_name) {

        $result = $this->dx_auth->is_org_name_available($org_name);
        if (!$result) {
            $this->form_validation->set_message('org_name_check', 'Org Name  exist. Please choose another one.');
        }

        return $result;
    }

    function edit_org_name() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('org_name', 'Org Name', 'trim|required|xss_clean|callback_org_name_check');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/edit_orgname';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'org_name' => $this->input->post("org_name"),
            );

            $this->info_model->org_profile_update($data);
            redirect('organization/info/edit_org');
        }
    }

    function email_check($email) {
        $result = $this->dx_auth->is_email_available1($email);
        if (!$result) {
            $this->form_validation->set_message('email_check', 'Email is Exists.Please chose another one');
        }

        return $result;
    }

    function edit_email() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|callback_email_check');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/edit_email';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'email' => $this->input->post("email"),
            );

            $this->info_model->org_profile_update($data);
            redirect('organization/info/edit_org');
        }
    }

    function change_email() {
        $this->data['dynamicView'] = 'pages/organization/edit_email';
        $this->_commonPageLayout('frontend_viewer');
    }

    function change_password() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'change_password';
        $this->data['dynamicView'] = 'pages/organization/password';
        $this->_commonPageLayout('frontend_viewer');
    }

    function changed_password() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'change_password';
        //echo "<pre>"; print_r($_POST);die();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required|xss_clean|min_length[10]|max_length[20]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/password';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $old_password = base64_encode($this->input->post('old_password'));
            $query = $this->db->query("select * from user_info where  id='" . $this->session->userdata('user_id') . "'and password='" . $old_password . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">Old Password doesnt match.</div>');
                redirect('organization/info/change_password');
            } else {
                $data = array(
                    'password' => base64_encode($this->input->post('password'))
                );
                $this->info_model->password_update($data);
                $this->session->set_flashdata('message', '<div id="message1"> Password  Changed Successfully.</div>');
                redirect('organization/info/change_password');
            }
        }
    }

    function view_register_member() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'view_register_member';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '10';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_register_member");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->get_reg_member()->num_rows();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->get_reg_member($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        //$this->data['query1'] = $this->info_model->get_reg_member();
        $this->data['dynamicView'] = 'pages/organization/member/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_org_type() {
        $data = array(
            'org_type' => ucfirst($this->input->post('category_name')),
        );
        $this->info_model->org_type_insert($data);
        redirect('organization/back/index');
    }

    function add_user_type() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'usertype';
        $this->data['dynamicView'] = 'pages/organization/user_type/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_user_type() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'usertype';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/user_type/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $query = $this->db->query("select user_type from user_type where user_type='" . strtolower($this->input->post("user_type")) . "'and org_id='" . $this->session->userdata('user_id') . "'");
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('message', '<div id="message">Usertype exists Please chose another one.</div>');
                redirect('organization/info/add_user_type');
            } else {
                $data = array(
                    'user_type' => ucfirst($this->input->post('user_type')),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->user_type_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Usertype Created successfully.</div>');
                redirect('organization/info/add_user_type');
            }
        }
    }

    function view_user_type() {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_usertype';
        $org_id = $this->session->userdata('user_id');
        $this->data['query1'] = $this->info_model->view_user_type($org_id);

        $this->data['dynamicView'] = 'pages/organization/user_type/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function u_type($user_type, $id1) {
        $org_id = $this->session->userdata("user_id");
        $result = $this->dx_auth->u_type_available($user_type, $id1, $org_id);
        if (!$result) {
            $this->form_validation->set_message('u_type', 'User Type  exists. Please choose another one.');
        }

        return $result;
    }

    function user_type_edit($id=NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_usertype';
        if ($id !== NULL) {
            $this->data['record'] = $this->info_model->get_user_type($id);
            $this->data['dynamicView'] = 'pages/organization/user_type/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('user_type', 'user Type', 'trim|required|xss_clean|callback_u_type[' . $this->input->post("id") . ']');
            if ($val->run()) {
                $data = array(
                    'user_type' => ucfirst($this->input->post('user_type'))
                );
                $this->info_model->user_type_update($data);
                redirect('organization/info/view_user_type', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function user_type_delete($id = NULL) {
        $this->data['mainTab'] = 'Configuration_org';
        $this->data['activeTab'] = 'view_usertype';
        $this->info_model->user_type_delete($id);
        redirect('organization/info/view_user_type', 'location', 301);
    }

    function view_previlige() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'view_previlige';
        $this->data['dynamicView'] = 'pages/organization/previlige/entry1';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_previlige() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'view_previlige';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/previlige/entry1';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $query = $this->db->query("select * from member_previlige where user_type='" . $this->input->post("user_type") . "'");
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('message', '<div id="message">Previlization Setting Exists</div>');
                redirect('organization/info/view_previlige');
            } else {
                $data = array(
                    'user_type' => $this->input->post("user_type"),
                    'org_id ' => $this->session->userdata('user_id'),
                    //mainboard
                    'mainboard_access_main' => $this->input->post("mainboard_access_main"),
                    'mainboard_send_proposal' => $this->input->post("mainboard_send_proposal"),
                    'mainboard_change_article' => $this->input->post("mainboard_change_article"),
                    'mainboard_send_notification' => $this->input->post("mainboard_send_notification"),
                    'mainboard_sending_out' => $this->input->post("mainboard_sending_out"),
                    'mainboard_manually_archive' => $this->input->post("mainboard_manually_archive"),
                    //forum
                    'forum_access' => $this->input->post("forum_access"),
                    'forum_comments' => $this->input->post("forum_comments"),
                    'forum_delete_won_comments' => $this->input->post("forum_delete_won_comments"),
                    'forum_delete_any_coments' => $this->input->post("forum_delete_any_coments"),
                    'forum_manual_comments' => $this->input->post("forum_manual_comments"),
                    //Members
                    'member_login_logout' => $this->input->post("member_login_logout"),
                    'member_change_profile' => $this->input->post("member_change_profile"),
                    'member_change_password' => $this->input->post("member_change_password"),
                    //Configuration org
                    'configuration_view_org' => $this->input->post("configuration_view_org"),
                    'configuration_change_org' => $this->input->post("configuration_change_org"),
                    //'configuration_visibility' => $this->input->post("configuration_visibility"),
                    //'configuration_switching' => $this->input->post("configuration_switching"),
                    'configuration_create_address' => $this->input->post("configuration_create_address"),
                    //Communication
                    'communication_send_email' => $this->input->post("communication_send_email"),
                    'communication_send_sms' => $this->input->post("communication_send_sms"),
                    'communication_send_letters' => $this->input->post("communication_send_letters"),
                    //Economics
                    'economics_register' => $this->input->post("economics_register"),
                    'economics_send_payment' => $this->input->post("economics_send_payment"),
                    'economics_check_complete' => $this->input->post("economics_check_complete"),
                    'economics_watch_total_income' => $this->input->post("economics_watch_total_income"),
                    'economics_watch_total_cost' => $this->input->post("economics_watch_total_cost"),
                    'economics_watch_statistics' => $this->input->post("economics_watch_statistics"),
                    //History
                    'history_access_articles' => $this->input->post("history_access_articles"),
                    'history_access_comments' => $this->input->post("history_access_comments"),
                    'history_user_actions' => $this->input->post("history_user_actions"),
                    'history_old_letters' => $this->input->post("history_old_letters"),
                    'history_old_sms' => $this->input->post("history_old_sms"),
                    'history_old_emails' => $this->input->post("history_old_emails"),
                    //Members
                    //'members_decide' => $this->input->post("members_decide"),
                    //'members_add_change' => $this->input->post("members_add_change"),
                    'members_c_group' => $this->input->post("members_c_group"),
                    'members_add_user' => $this->input->post("members_add_user"),
                        //'members_user_types' => $this->input->post("members_user_types"),
                        //'members_add_usertype' => $this->input->post("members_add_usertype"),
                );
                $this->info_model->previlige_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Previlization Setting saved successfully.</div>');
                redirect('organization/info/view_previlige');
            }
        }
    }

    function view_previlige_external() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'view_external_previlige';
        $this->data['dynamicView'] = 'pages/organization/previlige/external_entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_external_previlige() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'view_external_previlige';
        $query = $this->db->query("select * from org_external_previlige where org_id='" . $this->session->userdata('user_id') . "'");
        if ($query->num_rows() > 0) {
            $data = array(
                'external_mainboard' => $this->input->post("external_mainboard"),
                'external_presentation' => $this->input->post("external_presentation"),
                'external_contact' => $this->input->post("external_contact"),
                'external_archive_article' => $this->input->post("external_archive_article")
            );
            $this->info_model->previlige_external_update($data);
            $this->session->set_flashdata('message', '<div id="message1">Previlization Setting Updated successfully.</div>');
            redirect('organization/info/view_previlige_external');
        } else {
            $data = array(
                'external_mainboard' => $this->input->post("external_mainboard"),
                'external_presentation' => $this->input->post("external_presentation"),
                'external_contact' => $this->input->post("external_contact"),
                'external_archive_article' => $this->input->post("external_archive_article"),
                'org_id ' => $this->session->userdata('user_id'),
            );
            $this->info_model->previlige_external_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Previlization Setting saved successfully.</div>');
            redirect('organization/info/view_previlige_external');
        }
    }

    function view_all_member_post() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'article';
        $this->data['dynamicView'] = 'pages/organization/member_post/view_post';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_letter() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'letter_request';
        $this->data['dynamicView'] = 'pages/organization/letter_post/view_post';
        $this->_commonPageLayout('frontend_viewer');
    }

    function approve_member_post($post_id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'article';
        $data = array(
            'status' => 2
        );
        $this->info_model->approve_member_post_update($data, $post_id);
        $query = $this->db->query("select * from post_tbl where post_id='" . $post_id . "'");
        foreach ($query->result() as $info):
            $data1 = array(
                'status' => 2
            );
            $this->info_model->approve_member_post1_update($data1, $post_id);
            if ($info->send_by_email == '2'):
                $q = $this->db->query("select email from member where id='" . $info->send_to . "'");
                foreach ($q->result() as $s_mail):
                    $email = $s_mail->email;
                endforeach;
                $q1 = $this->db->query("select * from member_post where id='" . $info->post_id . "'");
                foreach ($q1->result() as $p_message):
                    $message = $p_message->text;
                    $title = $p_message->title;
                    $posted_by = $p_message->created_by;
                    $q3 = $this->db->query("select email from member where id='" . $posted_by . "'");
                    foreach ($q3->result() as $a):
                        $email_from = $a->email;
                    endforeach;
                endforeach;

                $this->load->library('email');
                $this->email->from($email_from, $title);
                // $this->email->from("$email_from", "$title");
                $this->email->to("$email");
                $this->email->subject("$title");
                $this->email->message("$message");
                $this->email->send();
            endif;
        endforeach;

        redirect('organization/info/view_all_member_post');
    }

    function deny_member_post($post_id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'article';
        $data = array(
            'status' => 3
        );
        $this->info_model->deny_member_post_update($data, $post_id);

        redirect('organization/info/view_letter');
    }

    function approve_member_letter($letter_id) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'letter_request';
        $data = array(
            'admin_status' => 2
        );
        $this->info_model->approve_member_letter_update($data, $letter_id);
        $query = $this->db->query("select * from letter_send_request where letter_id='" . $letter_id . "'");
        foreach ($query->result() as $info):
            $data1 = array(
                'admin_status' => 2
            );
            $this->info_model->approve_member_letter1_update($data1, $letter_id);

        endforeach;
        $data5 = array(
            'status' => 2
        );
        $this->info_model->approve_total_letter_update($data5, $letter_id);
        redirect('organization/info/view_letter');
    }

    function deny_member_letter($post_id) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'letter_request';
        $data = array(
            'admin_status' => 3
        );
        $this->info_model->deny_member_letter_update($data, $post_id);
        $data5 = array(
            'status' => 3
        );
        $this->info_model->deny_total_letter_update($data5, $post_id);
        redirect('organization/info/view_letter');
    }

    function view_archive() {
        $this->data['dynamicView'] = 'pages/organization/archive/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_mainboard() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $this->data['q'] = $this->info_model->get_expire_article();
        //echo "<pre>";print_r($this->data['q']);die();
        foreach ($this->data['q'] as $p_message):
            $data1 = array(
                'title' => $p_message->title,
                'text' => $p_message->text,
                'validity' => $p_message->validity,
                'date_of_creation' => $p_message->date_of_creation,
                'created_by' => $p_message->created_by,
                'expire_date' => $p_message->expire_date,
                'member_id' => $p_message->member_id,
                'org_id' => $p_message->org_id,
                'member_group' => $p_message->member_group,
                'status' => $p_message->status,
                'post_id' => $p_message->id,
            );
            $this->info_model->article_archive_insert($data1);
            $this->info_model->delete_article($p_message->id);
        endforeach;

        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_mainboard");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_mainboard_article()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_mainboard_article($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/mainboard/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function viewed_mainboard() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        @$art_cat = $this->uri->segment(4);
        @$start = $this->uri->segment(5);
        $article_category = $this->input->post("article_category");
        if ($article_category == ""):
            $article_category = $art_cat;
        else:
            $article_category = $article_category;
        endif;
        //print_r($start);
        // Number of record showing per page

        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/viewed_mainboard/" . $article_category . "/");
        $this->p_config['uri_segment'] = 5;
        $this->p_config['num_links'] = 4;
        $this->p_config['total_rows'] = $this->info_model->view_mainboard(0, 0, $article_category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_mainboard($start, $perPage, $article_category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/mainboard/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function mainboard_viewed($id=NULL) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        @$art_cat = $this->uri->segment(4);
        @$start = $this->uri->segment(5);
        $article_category = $id;
        if ($article_category == ""):
            $article_category = $art_cat;
        else:
            $article_category = $article_category;
        endif;
        //print_r($start);
        // Number of record showing per page

        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/mainboard_viewed/" . $article_category . "/");
        $this->p_config['uri_segment'] = 5;
        $this->p_config['num_links'] = 4;
        $this->p_config['total_rows'] = $this->info_model->view_mainboard(0, 0, $article_category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_mainboard($start, $perPage, $article_category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/mainboard/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_mainboard_post_detail($id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/mainboard/post_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function mainboard_post_detail($id) {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_article';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/mainboard/post_view_archive';
        $this->_commonPageLayout('frontend_viewer');
    }
    function mainboard_post_detail12($id) {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'article_archive';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/mainboard/post_view_archive';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_expired_membership() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'view_expired_member';
        $this->data['dynamicView'] = 'pages/organization/expired_member/view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_forum_post1() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        $this->data['dynamicView'] = 'pages/organization/forum/view_post';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_forum_post() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '3';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_forum_post");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_forum_post()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_forum_post($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/forum/view_post';
        $this->_commonPageLayout('frontend_viewer');


        /* $this->data['mainTab'] = 'forum_member';
          $this->data['activeTab'] = 'forum';
          $this->data['dynamicView'] = 'pages/member/forum/view_post';
          $this->_commonPageLayout('frontend_viewer'); */
    }

    function view_forum_post_detail($id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/forum/post_detail';
        $this->_commonPageLayout('frontend_viewer');
    }

    function delete_forum_post($id = NULL, $pid=NULL) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        $this->info_model->delete_forum_post($id);
        redirect('organization/info/view_forum_post_detail/' . $pid);
    }

    function archive_forum_comments($id, $pid) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        $query = $this->db->query("select * from forum_comment where id='" . $id . "'");
        foreach ($query->result() as $info):
            $comment_id = $info->id;
            $post_id = $info->post_id;
            $comment = $info->comment;
            $posted_by = $info->posted_by;
        endforeach;
        $data = array(
            'comment_id' => $comment_id,
            'post_id' => $post_id,
            'comment' => $comment,
            'posted_by' => $posted_by,
            'archive_by' => $this->session->userdata('user_id')
        );
        $this->info_model->archive_forum_comments_insert($data);
        $this->info_model->delete_archive_comment($id);
        redirect('organization/info/view_forum_post_detail/' . $pid);
    }

    function view_member_profile($id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'forum';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/profile_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function member_profile($id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/profile_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_org_previlize() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'previlige_edit';
        $this->data['dynamicView'] = 'pages/organization/previlige/previlize_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function viewed_org_previlize() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'previlige_edit';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/previlige/previlize_view';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $user_type = $this->input->post("user_type");
            $query = $this->db->query("select * from member_previlige where user_type='" . $user_type . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">No setting found for this userType.</div>');
                redirect('organization/info/viewed_org_previlize');
            } else {
                $this->data['usertype'] = $this->input->post("user_type");
                $this->data['dynamicView'] = 'pages/organization/previlige/edit';
                $this->_commonPageLayout('frontend_viewer');
            }
        }
    }

    function update_previlize() {
        $data = array(
            //mainboard
            'mainboard_access_main' => $this->input->post("mainboard_access_main"),
            'mainboard_send_proposal' => $this->input->post("mainboard_send_proposal"),
            'mainboard_change_article' => $this->input->post("mainboard_change_article"),
            'mainboard_send_notification' => $this->input->post("mainboard_send_notification"),
            'mainboard_sending_out' => $this->input->post("mainboard_sending_out"),
            'mainboard_manually_archive' => $this->input->post("mainboard_manually_archive"),
            //forum
            'forum_access' => $this->input->post("forum_access"),
            'forum_comments' => $this->input->post("forum_comments"),
            'forum_delete_won_comments' => $this->input->post("forum_delete_won_comments"),
            'forum_delete_any_coments' => $this->input->post("forum_delete_any_coments"),
            'forum_manual_comments' => $this->input->post("forum_manual_comments"),
            //Members
            'member_login_logout' => $this->input->post("member_login_logout"),
            'member_change_profile' => $this->input->post("member_change_profile"),
            'member_change_password' => $this->input->post("member_change_password"),
            //Configuration org
            'configuration_view_org' => $this->input->post("configuration_view_org"),
            'configuration_change_org' => $this->input->post("configuration_change_org"),
            'configuration_visibility' => $this->input->post("configuration_visibility"),
            'configuration_switching' => $this->input->post("configuration_switching"),
            'configuration_create_address' => $this->input->post("configuration_create_address"),
            //Communication
            'communication_send_email' => $this->input->post("communication_send_email"),
            'communication_send_sms' => $this->input->post("communication_send_sms"),
            'communication_send_letters' => $this->input->post("communication_send_letters"),
            //Economics
            'economics_register' => $this->input->post("economics_register"),
            'economics_send_payment' => $this->input->post("economics_send_payment"),
            'economics_check_complete' => $this->input->post("economics_check_complete"),
            'economics_watch_total_income' => $this->input->post("economics_watch_total_income"),
            'economics_watch_total_cost' => $this->input->post("economics_watch_total_cost"),
            'economics_watch_statistics' => $this->input->post("economics_watch_statistics"),
            //History
            'history_access_articles' => $this->input->post("history_access_articles"),
            'history_access_comments' => $this->input->post("history_access_comments"),
            'history_user_actions' => $this->input->post("history_user_actions"),
            'history_old_letters' => $this->input->post("history_old_letters"),
            'history_old_sms' => $this->input->post("history_old_sms"),
            'history_old_emails' => $this->input->post("history_old_emails"),
            //Members
            'members_decide' => $this->input->post("members_decide"),
            'members_add_change' => $this->input->post("members_add_change"),
            'members_c_group' => $this->input->post("members_c_group"),
            'members_add_user' => $this->input->post("members_add_user"),
            'members_user_types' => $this->input->post("members_user_types"),
            'members_add_usertype' => $this->input->post("members_add_usertype"),
        );
        $this->info_model->previlige_usertype_update($data);
        $this->session->set_flashdata('message', '<div id="message1">Previlize settings updated successfully.</div>');
        redirect('organization/info/viewed_org_previlize');
    }

    function view_org_external_previlize() {
        $this->data['mainTab'] = 'previlization_org';
        $this->data['activeTab'] = 'external_previlige_edit';
        $this->data['dynamicView'] = 'pages/organization/previlige/previlize_view_external';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_external_previlize() {
        $data = array(
            'external_mainboard' => $this->input->post("external_mainboard"),
            'external_presentation' => $this->input->post("external_presentation"),
        );
        $this->info_model->previlige_external_update($data);
        $this->session->set_flashdata('message', '<div id="message1">Previlize settings updated successfully.</div>');
        redirect('organization/info/view_org_external_previlize');
    }

    function add_external_letter($start=0) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_external_letter';
        $this->data['dynamicView'] = 'pages/organization/letter/external_entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_external_letter($start=0) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_external_letter';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('letter_title', 'Title', 'trim|required');
        $this->form_validation->set_rules('letter_text', 'Text', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/letter/external_entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $b = $this->input->post("checkbox");
            if (empty($b)) {
                $this->session->set_flashdata('message', '<div id="message">Please check the sender name.</div>');
                redirect('organization/info/add_external_letter');
            } else {
                $data = array(
                    'title' => $this->input->post('letter_title'),
                    'text' => $this->input->post('letter_text'),
                    'org_id' => $this->session->userdata('user_id'),
                    'letter_header' => $this->input->post('letter_header'),
                    'letter_footer' => $this->input->post('letter_footer'),
                    'sending_date' => date("Y-m-d"),
                    'admin_status' => 2,
                    'superadmin_status' => 1,
                    'letter_status' => 2,
                );
                $this->info_model->letter_insert($data);
                $letter_id = $this->db->insert_id();
                $a = $this->input->post("checkbox");
                for ($i = 0; $i < sizeof($a); $i++):
                    $data1 = array(
                        'member_id' => $a[$i],
                        'letter_id' => $letter_id,
                        'org_id' => $this->session->userdata('user_id'),
                        'admin_status' => 2,
                        'superadmin_status' => 1,
                        'letter_status' => 2
                    );
                    $this->info_model->letter_request_insert($data1);
                endfor;
                $total_no_of_letter = sizeof($a);
                $data2 = array(
                    'sending_date' => date('Y-m-d'),
                    'sender_name' => 0,
                    'no_of_letter' => $total_no_of_letter,
                    'org_id' => $this->session->userdata('user_id'),
                    'letter_id' => $letter_id,
                    'status' => 2
                );
                $this->info_model->total_letter_insert($data2);
                $this->session->set_flashdata('message', '<div id="message1">Leter request send successfully.</div>');
                redirect('organization/info/add_external_letter');
            }
        }
    }

    function header_view($id=NULL) {
        if ($id != ""):
            $query = $this->db->query("select * from letter_header where id='" . $id . "'");
            foreach ($query->result() as $info):
                echo $text = $info->text;
            endforeach;
        endif;
    }

    function footer_view($id=NULL) {
        if ($id != ""):
            $query = $this->db->query("select * from letter_footer where id='" . $id . "'");
            foreach ($query->result() as $info):
                echo $text = $info->text;
            endforeach;
        endif;
    }

    function add_letter($start=0) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_letter';
        $this->data['dynamicView'] = 'pages/organization/letter/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_letter($start=0) {
        
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'create_letter';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('letter_title', 'Title', 'trim|required');
        $this->form_validation->set_rules('letter_text', 'Text', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/letter/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $post_member = $this->input->post("checkbox");
            $post_group = $this->input->post("checkbox1");
            if (!empty($post_member) || !empty($post_group)) {
                $data = array(
                    'title' => $this->input->post('letter_title'),
                    'text' => $this->input->post('letter_text'),
                    'org_id' => $this->session->userdata('user_id'),
                    'letter_header' => $this->input->post('letter_header'),
                    'letter_footer' => $this->input->post('letter_footer'),
                    'sending_date' => date("Y-m-d"),
                    'admin_status' => 2,
                    'superadmin_status' => 1,
                );
                $this->info_model->letter_insert($data);
                $letter_id = $this->db->insert_id();
                
                if (!empty($post_member)) {
                    for ($i = 0; $i < sizeof($post_member); $i++):
                        $data1 = array(
                            'member_id' => $post_member[$i],
                            'letter_id' => $letter_id,
                            'org_id' => $this->session->userdata('user_id'),
                            'admin_status' => 2,
                            'superadmin_status' => 1
                        );
                        $this->info_model->letter_request_insert($data1);
                    endfor;
            }
            
            
                $j = 0;
                if (!empty($post_group)) {
                    for ($i = 0; $i < sizeof($post_group); $i++):
                        $group_id = $post_group[$i];
                        $this->data['group_member'] = $this->info_model->get_group_member($group_id);
                        foreach ($this->data['group_member'] as $g_member_info):
                            $data1 = array(
                                'member_id' => $g_member_info->id,
                                'letter_id' => $letter_id,
                                'org_id' => $this->session->userdata('user_id'),
                                'admin_status' => 2,
                                'superadmin_status' => 1
                            );
                            $this->info_model->letter_request_insert($data1);
                            $j = $j + 1;
                        endforeach;

                    endfor;
                }
               
                $total_no_of_letter = sizeof($post_member) + $j;

                $data2 = array(
                    'sending_date' => date('Y-m-d'),
                    'sender_name' => 0,
                    'no_of_letter' => $total_no_of_letter,
                    'org_id' => $this->session->userdata('user_id'),
                    'letter_id' => $letter_id,
                    'status' => 2
                );
                $this->info_model->total_letter_insert($data2);
                $this->session->set_flashdata('message', '<div id="message1">Leter request send successfully.</div>');
                
                redirect('organization/info/add_letter');
            }
            else {
                $this->session->set_flashdata('message', '<div id="message">Please Select Sender Name.</div>');
                redirect('organization/info/add_letter');
            }
        }
    }

    function archive_article($article_id) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'mainboard';
        $q1 = $this->db->query("select * from member_post where id='" . $article_id . "'");
        foreach ($q1->result() as $p_message):
            $data1 = array(
                'title' => $p_message->title,
                'text' => $p_message->text,
                'heading' => $p_message->heading,
                'article_type' => $p_message->article_type,
                'article_category' => $p_message->article_category,
                'validity' => $p_message->validity,
                'date_of_creation' => $p_message->date_of_creation,
                'created_by' => $p_message->created_by,
                'expire_date' => $p_message->expire_date,
                'member_id' => $p_message->member_id,
                'org_id' => $p_message->org_id,
                'member_group' => $p_message->member_group,
                'status' => $p_message->status,
                'post_id' => $p_message->id,
            );

            //echo "<pre>";print_r($data1);die();
            $this->info_model->article_archive_insert($data1);
            $this->info_model->delete_article($article_id);
        endforeach;
        redirect('organization/info/view_mainboard');
    }

    function pview_archive_article() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_article';
        $this->data['dynamicView'] = 'pages/organization/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_article() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_article';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_archive_article");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_article()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_article($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }
     function article_archive() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'article_archive';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/article_archive");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_article1()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_article1($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/article_view1';
        $this->_commonPageLayout('frontend_viewer');
    }
    
    

    function view_archive_article_sort() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_article';
        @$ar_sort = $this->uri->segment(4);
        @$ar_sort1 = $this->uri->segment(5);
        @$start = $this->uri->segment(6);

        $category = $this->input->post("article_category");
        if ($category == "") {
            $category = $ar_sort1;
        } else {
            $category = $category;
        }
        $id = $this->input->post("article_type");
        if ($id == "") {
            $id = $ar_sort;
        } else {
            $id = $id;
        }
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_archive_article_sort/" . $id . "/" . $category . "/");
        $this->p_config['uri_segment'] = 6;
        $this->p_config['num_links'] = 5;
        $this->p_config['total_rows'] = $this->info_model->view_article_sort(0, 0, $id, $category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_article_sort($start, $perPage, $id, $category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/article_view';
        $this->_commonPageLayout('frontend_viewer');
    }
    function view_archive_article_sort1() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'article_archive';
        @$ar_sort = $this->uri->segment(4);
        @$ar_sort1 = $this->uri->segment(5);
        @$start = $this->uri->segment(6);

        $category = $this->input->post("article_category");
        if ($category == "") {
            $category = $ar_sort1;
        } else {
            $category = $category;
        }
        $id = $this->input->post("article_type");
        if ($id == "") {
            $id = $ar_sort;
        } else {
            $id = $id;
        }
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_archive_article_sort1/" . $id . "/" . $category . "/");
        $this->p_config['uri_segment'] = 6;
        $this->p_config['num_links'] = 5;
        $this->p_config['total_rows'] = $this->info_model->view_article_sort1(0, 0, $id, $category)->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_article_sort1($start, $perPage, $id, $category)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/article_view1';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_letter() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_letter';
        $this->data['dynamicView'] = 'pages/organization/archive/letter_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_archive_comments() {
        $this->data['mainTab'] = 'history';
        $this->data['activeTab'] = 'view_archive_comments';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page
        $this->data['loop_start'] = $start;
        @$perPage = '5';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_archive_comments");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_comment()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_comment($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/archive/comment_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function add_address() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'add_address';
        $this->data['dynamicView'] = 'pages/organization/address/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_address() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'add_address';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('address_title', 'Title', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/address/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'org_id' => $this->session->userdata('user_id'),
                'address_title' => $this->input->post('address_title'),
                'address' => $this->input->post('address')
            );
            $this->info_model->address_list_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Address list Inserted Successfully.</div>');
            redirect('organization/info/add_address');
        }
    }

    function view_address_list() {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_list';
        $this->data['query1'] = $this->info_model->view_address_list();
        $this->data['dynamicView'] = 'pages/organization/address/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function address_edit($id=NULL) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_list';
        if ($id !== NULL) {
            $this->data['record'] = $this->info_model->get_all_address($id);
            $this->data['dynamicView'] = 'pages/organization/address/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('address_title', 'Title', 'trim|required');
            $val->set_rules('address', 'Address', 'trim|required');

            if ($val->run()) {
                $data = array(
                    'address_title' => $this->input->post('address_title'),
                    'address' => $this->input->post('address')
                );
                $this->session->set_flashdata('message', '<div id="message1">Address list Updated Successfully.</div>');
                $this->info_model->address_list_update($data);
                redirect('organization/info/view_address_list', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function address_delete($id = NULL) {
        $this->data['mainTab'] = 'letter_org';
        $this->data['activeTab'] = 'view_list';
        $this->info_model->address_delete($id);
        redirect('organization/info/view_address_list', 'location', 301);
    }

    function org_profile_setting() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        $this->data['dynamicView'] = 'pages/organization/profile/org_profile_ previlize';
        $this->_commonPageLayout('frontend_viewer');
    }

    function org_profile_update() {
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'home';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('org_number', 'Org Number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_name', 'Org Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_primary_address', 'Org Primary Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_optional_address', 'Org Oprional Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('org_phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('area_name', 'Area Name', 'trim|required');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'trim|xss_clean|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|xss_clean|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('card_no', 'Card No', 'trim|required|xss_clean');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cvv2_no', 'Cvv2 No', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name_on_card', 'Name On card', 'trim|required|xss_clean');
        $this->form_validation->set_rules('package_name', 'Package name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_of_member', 'No of member', 'trim|required|xss_clean');
        $this->form_validation->set_rules('duration', 'Duration', 'trim|required|xss_clean');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description of org', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/profile/org_profile_ previlize';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $org_id = $this->session->userdata('user_id');
            $this->data['record'] = $this->info_model->view_org_profile_seeting($org_id);
            if (count($this->data['record'])) {
                $data = array(
                    'org_number' => $this->input->post('org_number'),
                    'org_name' => $this->input->post('org_name'),
                    'org_primary_address' => $this->input->post('org_primary_address'),
                    'org_optional_address' => $this->input->post('org_optional_address'),
                    'org_phone' => $this->input->post('org_phone'),
                    'area_name' => $this->input->post('area_name'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone_no' => $this->input->post('phone_no'),
                    'address' => $this->input->post('address'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'description' => $this->input->post('description'),
                    'card_no' => $this->input->post('card_no'),
                    'expire_date' => $this->input->post('expire_date'),
                    'cvv2_no' => $this->input->post('cvv2_no'),
                    'name_on_card' => $this->input->post('name_on_card'),
                    'package_name' => $this->input->post('package_name'),
                    'no_of_member' => $this->input->post('no_of_member'),
                    'duration' => $this->input->post('duration'),
                    'amount' => $this->input->post('amount')
                );
                $this->info_model->org_profile_setting_update($data, $org_id);
                $this->session->set_flashdata('message', '<div id="message1">Profile Setting updated successfully.</div>');
                redirect('organization/info/org_profile_setting');
            } else {
                $data = array(
                    'org_number' => $this->input->post('org_number'),
                    'org_name' => $this->input->post('org_name'),
                    'org_primary_address' => $this->input->post('org_primary_address'),
                    'org_optional_address' => $this->input->post('org_optional_address'),
                    'org_phone' => $this->input->post('org_phone'),
                    'area_name' => $this->input->post('area_name'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'phone_no' => $this->input->post('phone_no'),
                    'address' => $this->input->post('address'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'description' => $this->input->post('description'),
                    'card_no' => $this->input->post('card_no'),
                    'expire_date' => $this->input->post('expire_date'),
                    'cvv2_no' => $this->input->post('cvv2_no'),
                    'name_on_card' => $this->input->post('name_on_card'),
                    'package_name' => $this->input->post('package_name'),
                    'no_of_member' => $this->input->post('no_of_member'),
                    'duration' => $this->input->post('duration'),
                    'amount' => $this->input->post('amount'),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->org_profile_setting_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Profile Setting save successfully.</div>');
                redirect('organization/info/org_profile_setting');
            }
        }
    }

    function profile_setting($id) {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'view_register_member';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/profile/previlize';
        $this->_commonPageLayout('frontend_viewer');
    }

    function profile_setting_update() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'view_register_member';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('member_title', 'Member Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('profile_message', 'Profile Message', 'trim|required|xss_clean');
        $this->form_validation->set_rules('household_size', 'HouseHold size', 'trim|xss_clean|required');
        $this->form_validation->set_rules('member_group', 'Group', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->data['id'] = $this->input->post("id");
            $this->data['dynamicView'] = 'pages/organization/profile/previlize';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $id = $this->input->post("id");
            $this->data['record'] = $this->info_model->view_member_profile_seeting($id);
            if (count($this->data['record'])) {
                $data = array(
                    'member_id' => $this->input->post('id'),
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'expire_date' => $this->input->post('expire_date'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'household_size' => $this->input->post('household_size'),
                    'member_group' => $this->input->post('member_group'),
                    'username' => $this->input->post('username'),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->profile_seeting_update($data, $id);
                $id = $this->input->post('id');
                $this->data['record8'] = $this->info_model->view_member_profile_seeting1($id);
                if (count($this->data['record8'])) {
                    //check for update private data
                    $profile_data = array();
                    if ($this->input->post('member_title') == 2):
                        $fileData = array(
                            'member_title' => $this->input->post('member_title'),
                        );
                        $profile_data = array_merge($profile_data, $fileData);
                    endif;

                    if ($this->input->post('name') == 2):
                        $fileData1 = array(
                            'name' => $this->input->post('name'),
                        );
                        $profile_data = array_merge($profile_data, $fileData1);
                    endif;
                    if ($this->input->post('expire_date') == 2):
                        $fileData2 = array(
                            'expire_date' => $this->input->post('expire_date'),
                        );
                        $profile_data = array_merge($profile_data, $fileData2);
                    endif;
                    if ($this->input->post('address') == 2):
                        $fileData3 = array(
                            'address' => $this->input->post('address'),
                        );
                        $profile_data = array_merge($profile_data, $fileData3);
                    endif;
                    if ($this->input->post('phone') == 2):
                        $fileData4 = array(
                            'phone' => $this->input->post('phone'),
                        );
                        $profile_data = array_merge($profile_data, $fileData4);
                    endif;
                    if ($this->input->post('email') == 2):
                        $fileData5 = array(
                            'email' => $this->input->post('email'),
                        );
                        $profile_data = array_merge($profile_data, $fileData5);
                    endif;
                    if ($this->input->post('profile_message') == 2):
                        $fileData6 = array(
                            'profile_message' => $this->input->post('profile_message'),
                        );
                        $profile_data = array_merge($profile_data, $fileData6);
                    endif;

                    if ($this->input->post('household_size') == 2):
                        $fileData9 = array(
                            'household_size' => $this->input->post('household_size'),
                        );
                        $profile_data = array_merge($profile_data, $fileData9);
                    endif;
                    if ($this->input->post('member_group') == 2):
                        $fileData10 = array(
                            'member_group' => $this->input->post('member_group'),
                        );
                        $profile_data = array_merge($profile_data, $fileData10);
                    endif;
                    if ($this->input->post('username') == 2):
                        $fileData11 = array(
                            'username' => $this->input->post('username'),
                        );
                        $profile_data = array_merge($profile_data, $fileData11);
                    endif;
                    $this->info_model->profile_seeting_update1($profile_data, $id);
                    //check for public data
                    $public_data = array();
                    if ($this->input->post('member_title') == 1):
                        $fileData = array(
                            'member_title' => $this->input->post('member_title'),
                        );
                        $public_data = array_merge($public_data, $fileData);
                    endif;

                    if ($this->input->post('name') == 1):
                        $fileData1 = array(
                            'name' => $this->input->post('name'),
                        );
                        $public_data = array_merge($public_data, $fileData1);
                    endif;
                    if ($this->input->post('expire_date') == 1):
                        $fileData2 = array(
                            'expire_date' => $this->input->post('expire_date'),
                        );
                        $public_data = array_merge($public_data, $fileData2);
                    endif;
                    if ($this->input->post('address') == 1):
                        $fileData3 = array(
                            'address' => $this->input->post('address'),
                        );
                        $public_data = array_merge($public_data, $fileData3);
                    endif;
                    if ($this->input->post('phone') == 1):
                        $fileData4 = array(
                            'phone' => $this->input->post('phone'),
                        );
                        $public_data = array_merge($public_data, $fileData4);
                    endif;
                    if ($this->input->post('email') == 1):
                        $fileData5 = array(
                            'email' => $this->input->post('email'),
                        );
                        $public_data = array_merge($public_data, $fileData5);
                    endif;
                    if ($this->input->post('profile_message') == 1):
                        $fileData6 = array(
                            'profile_message' => $this->input->post('profile_message'),
                        );
                        $public_data = array_merge($public_data, $fileData6);
                    endif;
                    if ($this->input->post('household_size') == 1):
                        $fileData9 = array(
                            'household_size' => $this->input->post('household_size'),
                        );
                        $public_data = array_merge($public_data, $fileData9);
                    endif;
                    if ($this->input->post('member_group') == 1):
                        $fileData10 = array(
                            'member_group' => $this->input->post('member_group'),
                        );
                        $public_data = array_merge($public_data, $fileData10);
                    endif;
                    if ($this->input->post('username') == 1):
                        $fileData11 = array(
                            'username' => $this->input->post('username'),
                        );
                        $public_data = array_merge($public_data, $fileData11);
                    endif;
                    $this->info_model->profile_setting_update_public($public_data, $id);
                }
                $this->session->set_flashdata('message', '<div id="message1">Profile Setting updated successfully.</div>');
                redirect('organization/info/profile_setting/' . $id, 'location', 301);
            } else {
                $id = $this->input->post("id");
                $data = array(
                    'member_id' => $this->input->post('id'),
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'expire_date' => $this->input->post('expire_date'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'household_size' => $this->input->post('household_size'),
                    'member_group' => $this->input->post('member_group'),
                    'username' => $this->input->post('username'),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->profile_seeting_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Profile Seeting Saved Successfully.</div>');
                redirect('organization/info/profile_setting/' . $id, 'location', 301);
            }
        }
    }

    function set_member_profile() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'common_setting';
        $this->data['dynamicView'] = 'pages/organization/profile/previlize_common';
        $this->_commonPageLayout('frontend_viewer');
    }

    function update_setting() {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'common_setting';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('member_title', 'Member Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('profile_message', 'Profile Message', 'trim|required|xss_clean');
        $this->form_validation->set_rules('household_size', 'HouseHold size', 'trim|xss_clean|required');
        $this->form_validation->set_rules('bank_info', 'Bank Info', 'trim|xss_clean|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/profile/previlize_common';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $this->data['record'] = $this->info_model->view_member_profile_seeting($id);
            if (count($this->data['record'])) {
                $data = array(
                    'bank_info' => $this->input->post('bank_info'),
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'household_size' => $this->input->post('household_size'),
                );
                $this->info_model->setting_update($data);
                $this->session->set_flashdata('message', '<div id="message1">Profile Seeting updated Successfully.</div>');
                redirect('organization/info/set_member_profile');
            } else {
                $data = array(
                    'bank_info' => $this->input->post('bank_info'),
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'profile_message' => $this->input->post('profile_message'),
                    'household_size' => $this->input->post('household_size'),
                    'org_id' => $this->session->userdata('user_id')
                );
                $this->info_model->setting_insert($data);
                $this->session->set_flashdata('message', '<div id="message1">Profile Seeting saved Successfully.</div>');
                redirect('organization/info/set_member_profile');
            }
        }
    }

    function admin_previlize($id) {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'view_register_member';
        $this->data['id'] = $id;
        $this->data['dynamicView'] = 'pages/organization/admin_previlize/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function added_admin_previlize() {
        $id = $this->input->post("member_id");
        $admin_status = $this->input->post("admin_status");
        if ($admin_status == '2') {
            $this->data['record1'] = $this->info_model->get_member_admin_previlize($id);
            if (count($this->data['record1'])) {
                $this->info_model->delete_member_admin_previlize($id);
                $this->data['record'] = $this->info_model->get_member_info($id);
                foreach ($this->data['record'] as $info):
                    $email = $info->email;
                    $username = $info->username;
                    $person_number = $info->person_number;
                    $password = $info->password;
                endforeach;
                $data = array(
                    'org_id' => $this->session->userdata('user_id'),
                    'member_id' => $id,
                    'email' => $email,
                    'person_number' => $person_number,
                    'username' => $username,
                    'password' => $password
                );
                $this->info_model->admin_previlize_insert($data);
                redirect('organization/info/view_register_member');
            }
            else {
                $this->data['record'] = $this->info_model->get_member_info($id);
                foreach ($this->data['record'] as $info):
                    $email = $info->email;
                    $username = $info->username;
                    $person_number = $info->person_number;
                    $password = $info->password;
                endforeach;
                $data = array(
                    'org_id' => $this->session->userdata('user_id'),
                    'member_id' => $id,
                    'email' => $email,
                    'person_number' => $person_number,
                    'username' => $username,
                    'password' => $password
                );
                $this->info_model->admin_previlize_insert($data);
                redirect('organization/info/view_register_member');
            }
        } elseif ($admin_status == '1') {
            $this->data['record1'] = $this->info_model->get_member_admin_previlize($id);
            if (count($this->data['record1'])) {
                $this->info_model->delete_member_admin_previlize($id);
                redirect('organization/info/view_register_member');
            } else {
                redirect('organization/info/view_register_member');
            }
        } else {
            redirect('organization/info/view_register_member');
        }
    }

    function edit_member_profile($id=NULL) {
        $this->data['mainTab'] = 'member';
        $this->data['activeTab'] = 'view_register_member';
        if ($id !== NULL) {
            $this->data['record'] = $this->info_model->get_user_info($id);
            $this->data['dynamicView'] = 'pages/organization/member/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('member_title', 'Member Title', 'trim|xss_clean');
            $val->set_rules('expire_date', 'Membership Expire Date', 'trim|required|xss_clean');
            $val->set_rules('name', 'Name', 'trim|required|xss_clean');
            $val->set_rules('address', 'Address', 'trim|required|xss_clean');
            $val->set_rules('phone', 'Phone', 'trim|required|xss_clean');
            $val->set_rules('profile_message', 'Profile Message', 'trim|xss_clean');
            if ($val->run()) {
                $data = array(
                    'member_title' => $this->input->post('member_title'),
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'phone' => $this->input->post('phone'),
                    'profile_message' => $this->input->post('profile_message'),
                    'expire_date' => $this->input->post('expire_date'),
                    'user_type' => $this->input->post('user_type'),
                    'member_group' => $this->input->post('member_group')
                );
                $this->info_model->user_profile_update($data, $id);
                $this->session->set_flashdata('message', '<div id="message1">Profile Updated Successfully.</div>');
                redirect('organization/info/view_register_member', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function view_inbox() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        @$start = $this->uri->segment(4);
        //print_r($start);
        // Number of record showing per page

        @$perPage = '15';
        // Get all users
        // Pagination config
        $this->p_config['base_url'] = site_url("organization/info/view_inbox");
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 3;
        $this->p_config['total_rows'] = $this->info_model->view_message()->num_rows();
        //print_r($this->p_config['total_rows']);die();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->data['query1'] = $this->info_model->view_message($start, $perPage)->result();
        $this->load->library('pagination');
        $this->pagination->initialize($this->p_config);
        $this->data['dynamicView'] = 'pages/organization/message/inbox';
        $this->_commonPageLayout('frontend_viewer');
    }

    function delete_message() {
        $a = $this->input->post("checkbox");
        for ($i = 0; $i < sizeof($a); $i++):
            $id = $a[$i];
            $this->info_model->delete_message($id);
        endfor;
        redirect('organization/info/view_inbox');
    }

    function view_message($id) {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $data = array(
            'message_status' => 1
        );
        $this->info_model->read_status_update($data, $id);
        $this->data['message'] = $this->info_model->get_message_detail($id);
        $this->data['dynamicView'] = 'pages/organization/message/message_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function reply_message($id) {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->data['message_info'] = $this->info_model->get_message_detail($id);
        $this->data['dynamicView'] = 'pages/organization/message/reply_view';
        $this->_commonPageLayout('frontend_viewer');
    }

    function replied_message() {
        $this->data['mainTab'] = '';
        $this->data['activeTab'] = '';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post("id");
            $this->data['message_info'] = $this->info_model->get_message_detail($id);
            $this->data['dynamicView'] = 'pages/organization/message/reply_view';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $photo1 = "";
            if ($_FILES['photo']['size'] > 0) {
                if ($this->now_upload()) {
                    $photo1 = $this->upload_data['file_name'];
                }
            }
            $data = array(
                'org_id' => $this->session->userdata("user_id"),
                'name' => 'OrgAdmin',
                'receiver_id' => $this->input->post("sender_id"),
                'subject' => $this->input->post("subject"),
                'message' => $this->input->post("message"),
                'message_date' => date("Y-m-d"),
                'photo1' => $photo1,
                'message_status' => 2,
                'flag' => 2,
                'sender_status' => 1
            );
            $this->info_model->message_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Message send Successfully.</div>');
            redirect('organization/info/view_inbox');
        }
    }

    function add_article_category($start=0) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'create_category';
        $this->data['dynamicView'] = 'pages/organization/article_category/entry';
        $this->_commonPageLayout('frontend_viewer');
    }

    function check_article_category($article_category, $id1) {
        $result = $this->dx_auth->is_article_category_available($article_category, $id1);
        if (!$result) {
            $this->form_validation->set_message('check_article_category', 'Article category  exist. Please choose another one.');
        }

        return $result;
    }

    function added_article_category($start=0) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'create_category';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('article_category', 'Article Category', 'trim|required|callback_check_article_category[' . $this->session->userdata("user_id") . ']');
        if ($this->form_validation->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/organization/article_category/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $data = array(
                'category_name' => ucfirst($this->input->post('article_category')),
                'org_id' => $this->session->userdata("user_id")
            );
            $this->info_model->article_category_insert($data);
            $this->session->set_flashdata('message', '<div id="message1">Article category Created Successfully.</div>');
            redirect('organization/info/add_article_category');
        }
    }

    function view_article_category() {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'view_category';
        $this->data['query1'] = $this->info_model->view_article_category();
        $this->data['dynamicView'] = 'pages/organization/article_category/show';
        $this->_commonPageLayout('frontend_viewer');
    }

    function check_category($article_category, $id) {
        $org_id = $this->session->userdata("user_id");
        $result = $this->dx_auth->check_category($article_category, $id, $org_id);
        if (!$result) {
            $this->form_validation->set_message('check_category', 'Article category  exists. Please choose another one.');
        }
        return $result;
    }

    function article_category_edit($id=NULL) {
        $this->data['mainTab'] = 'mainboard';
        $this->data['activeTab'] = 'view_category';
        if ($id != NULL) {
            $this->data['record'] = $this->info_model->get_category($id);
            $this->data['dynamicView'] = 'pages/organization/article_category/edit';
        }
        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('article_category', 'Article Category', 'trim|required|xss_clean|callback_check_category[' . $this->input->post("id") . ']');
            if ($val->run()) {
                $profile_data = array(
                    'category_name' => ucfirst($this->input->post('article_category')),
                );
                $this->info_model->article_categpry_update($profile_data);
                $this->session->set_flashdata('message', '<div id="message1">Article category Updated Successfully.</div>');
                redirect('organization/info/view_article_category', 'location', 301);
            }
        }
        $this->_commonPageLayout('frontend_viewer');
    }

    function delete_article_category($id = NULL) {
        $this->data['mainTab'] = 'configuration';
        $this->data['activeTab'] = 'view_area';
        $this->info_model->delete_zone($id);
        redirect('admin/info/view_zone', 'location', 301);
    }

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