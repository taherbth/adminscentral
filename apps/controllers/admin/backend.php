<?php

include_once 'BaseController.php';

class Backend extends BaseController {

    // Used for registering and changing password form validation
    var $min_username = 3;
    var $max_username = 20;
    var $min_password = 4;
    var $max_password = 20;

    function backend() {	
		 parent::__construct();
			if ($this->session->userdata('uid') == "") {
				redirect('admin/home');
			}
			
		}

   
 //------------------------------TAHER 2012-08-01----------------------------------
 /**
 *Load ORDERS_TAB name
 *
 *@access public
 *@return Tab name
 */
   function index() {
        $this->lang->load('orders', $this->session->userdata('lang_file'));
        $this->data['activeTab'] = 'orders';
		$this->data['mainTab'] = 'orders';
        $this->data['dynamicView'] = 'pages/admin/welcome';
        $this->_commonPageLayout('frontend_viewer');
    }

  /*  function index() {
        $this->data['activeTab'] = 'users';
		$this->data['mainTab'] = 'users';
        $this->data['dynamicView'] = 'pages/admin/welcome';
        $this->_commonPageLayout('frontend_viewer');
    }*/

    /* Callback function */
  
    function username_check($username) {
        $result = $this->dx_auth->is_username_available($username);
        if (!$result) {
            $this->form_validation->set_message('username_check', 'Username already exist. Please choose another username.');
        }
        return $result;
    }

    function email_check($email) {
        $result = $this->dx_auth->is_email_available($email);
        if (!$result) {
            $this->form_validation->set_message('email_check', 'Email is already used by another user. Please choose another email address.');
        }
        return $result;
    }
    function pchange_password() {
         $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'password';
        // Check if user logged in or not
        if ($this->dx_auth->is_logged_in()) {
            $val = $this->form_validation;
            $this->data['windowTitle'] = $this->siteTitle . 'Change User Password';

            // Set form validation
            $val->set_rules('old_password', 'Old Password', 'trim|required|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']');
            $val->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']|matches[confirm_new_password]');
            $val->set_rules('confirm_new_password', 'Confirm New Password', 'trim|required|xss_clean');

            // Validate rules and change password
            if (isset($_POST['change'])) {
                if ($val->run() AND $this->dx_auth->change_password($val->set_value('old_password'), $val->set_value('new_password'))) {
                    $this->data['admin_message'] = 'Password Changed Successfully !!!';
                    //$this->data['dynamicView'] 	 = $this->dx_auth->admin_notifier;
                } else {
                    $this->data['admin_message'] = 'Fail in Password Change Operation!!!';
                }
            }
            $this->data['dynamicView'] = 'pages/admin/change_password_form';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            // Redirect to login page
            $this->dx_auth->deny_access('login');
        }
    }
	 function change_password() {
       $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'password';
        //echo "<pre>"; print_r($_POST);die();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[6]|max_length[20]|matches[confirm_new_password]');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
           $this->data['dynamicView'] = 'pages/admin/change_password_form';
            $this->_commonPageLayout('frontend_viewer');
        } else {
            $old_password = md5($this->input->post('old_password'));
            $query = $this->db->query("select * from users where password='" . $old_password . "'");
            if ($query->num_rows() == 0) {
                $this->session->set_flashdata('message', '<div id="message">Old Password doesnt match.</div>');
                redirect('admin/backend/change_password');
            } else {
                $data = array(
                    'password' => md5($this->input->post('new_password'))
                );
				 $this->load->model('admin/users');
                $this->users->password_update($data,$old_password);
                $this->session->set_flashdata('message', '<div id="message1"> Password  Changed Successfully.</div>');
                redirect('admin/backend/change_password');
            }
        }
    }

    function user() {
	    $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'create';
        //$this->data['OptionDepertment'] = getOptionDepertment();
        //$this->data['OptionEmployeeName'] = getOptionEmployeeName();
        // Set form validation rules			
        $val = $this->form_validation;
        $val->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[' . $this->min_username . ']|max_length[' . $this->max_username . ']|callback_username_check|alpha_dash');
        $val->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_email_check');
        $val->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']|matches[confirm_password]');
        $val->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
        $val->set_rules('name', ' Name', 'trim|required|xss_clean');
        $val->set_rules('user_type', 'user_type', 'trim|xss_clean');
         if ($val->run() == FALSE) {
            $this->data['dynamicView'] = 'pages/admin/user/entry';
            $this->_commonPageLayout('frontend_viewer');
        } else {
		   $this->load->model('admin/users');
		   $data=array(
		     'name'=>$this->input->post("name"),
		     'username'=>$this->input->post("username"),
			  'password'=>md5($this->input->post("password")),
			  'email'=>$this->input->post("email"),
			  'role_id'=>$this->input->post("user_type")
		   );
		    $this->users->user_insert($data); 
		   $this->session->set_flashdata('message', '<div id="message1">User Created successfully.</div>');
            redirect('admin/backend/user');
		
		}
        

       

    }
	public function view_user(){
	    $this->data['mainTab'] = 'users';
        $this->data['activeTab'] = 'view_user';
        $this->load->model('admin/users', 'UserList');
        $start = (int) $this->uri->segment(4);
        // Number of record showing per page
        $perPage = $this->config->item('DX_per_page');
        // Get all users
        $this->data['userLists'] = $this->UserList->get_all($start, $perPage)->result();
        // Pagination config
        $this->p_config['base_url'] .= 'admin/backend/view_user';
        $this->p_config['uri_segment'] = 4;
        $this->p_config['num_links'] = 2;
        $this->p_config['total_rows'] = $this->UserList->get_all()->num_rows();
        $this->p_config['per_page'] = $perPage;
        // Init pagination
        $this->pagination->initialize($this->p_config);
        // Create pagination links
        $this->data['pagination'] = $this->pagination->create_links();
	    $this->data['dynamicView'] = 'pages/admin/user/view';
		$this->_commonPageLayout('frontend_viewer');
	}

    public function userdelete($contentId = NULL) {
        $this->load->model('admin/users', 'UserList');
        $this->UserList->delete_user($contentId);
        redirect('admin/backend/view_user');
    }

    public function useredit($contentId = NULL) {
        $this->data['activeTab'] = 'configuration';
        // Load Model
        $this->load->model('admin/users', 'UserList');

        if ($contentId !== NULL) {
            $this->data['userLists'] = $this->UserList->getUserInfo($contentId);
            $this->data['windowTitle'] = $this->siteTitle . 'Modify User Priviliges Information';
            $this->data['dynamicView'] = 'pages/admin/user/edit';
        }

        if (count($_POST)) {
            $val = $this->form_validation;
            $val->set_rules('sale_prev', 'Sale Privilege', 'trim|xss_clean');
            $val->set_rules('engineering_prev', 'Engineering Privilege', 'trim|xss_clean');
            $val->set_rules('commercial_prev', 'Commercial Privilege', 'trim|xss_clean');
            $val->set_rules('hr_prev', 'HR Privilege', 'trim|xss_clean');
            $val->set_rules('configuration_prev', 'Configuration Privilege', 'trim|xss_clean');

            if ($val->run()) {
                $uPrevData = array(
                    'id' => $this->input->post('id'),
                    'sale_prev' => $this->input->post('sale_prev'),
                    'engineering_prev' => $this->input->post('engineering_prev'),
                    'commercial_prev' => $this->input->post('commercial_prev'),
                    'hr_prev' => $this->input->post('hr_prev'),
                    'configuration_prev' => $this->input->post('configuration_prev')
                );
                if (!empty($uPrevData['id'])) {
                    if ($this->UserList->set_user($uPrevData['id'], $uPrevData)) {
                        redirect('admin/backend/user');
                    } else {
                        return false;
                    }
                }
            }
        }


        // Load view
        $this->_commonPageLayout('frontend_viewer');
    }

    protected function _commonPageLayout($viewName, $cacheIt = FALSE) {

        $view = $this->layout->view($viewName, $this->data, TRUE);

        $replaces = array(
            '{SITE_TOP_LOGO}' => $this->load->view('frontend/site_top_logo', $this->data, TRUE),
            '{SITE_TOP_MENU}' => $this->load->view('frontend/site_top_menu', NULL, TRUE),
            '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
            '{SITE_FOOTER}' => $this->load->view('frontend/site_footer', NULL, TRUE)
        );

        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}

?>