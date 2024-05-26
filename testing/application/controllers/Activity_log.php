<?php
class Activity_log extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("prime_model","pm");
        $this->checkPermission();
    }
    public function index() {
        $data['title'] = 'Site Log';
        $this->load->model('activity_log_model');
        $data['activity_logs'] = $this->activity_log_model->get_activity_logs();
        $this->load->view('activity_log', $data);
    }
}
