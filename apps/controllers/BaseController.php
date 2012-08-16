<?php

/**
 * Base Controller
 * Common tasks of all controllers are done here
 * Must be inherited, no direct instance allowed (abstract)   
 */
abstract class BaseController extends Controller {

    protected $data = array();
    public $stylesheets = array();
    public $javascripts = array();
    public $jsVars = array();

    function __construct() {
        parent::Controller();

        $this->load->library('layout');
        $this->layout->setLayout('frontend');
        $this->p_config['base_url'] = base_url();
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    }

    protected function _setupFirePHP() {
        $this->load->config('fireignition');
        if ($this->config->item('fireignition_enabled')) {
            if (floor(phpversion()) < 5) {
                log_message('error', 'PHP 5 is required to run fireignition');
            } else {
                $this->load->library('firephp');
            }
        } else {
            $this->load->library('firephp_fake');
            $this->firephp = & $this->firephp_fake;
        }
    }

}