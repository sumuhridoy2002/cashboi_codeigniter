<?php
class Activity_log_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function log_activity($user_id, $activity) {
        $data = array(
            'user_id' => $user_id,
            'activity' => $activity,
            'timestamp' => date('Y-m-d H:i:s')
        );
        $this->db->insert('activity_logs', $data);
    }

    public function get_activity_logs() {
            $compid       = $_SESSION['compid'];
        $query = $this->db->select('*')
                          ->from('activity_logs')
                          ->where('compid',$compid)
                          ->order_by('timestamp', 'DESC')
                          ->get()
                          ->result();
        return $query;
    }
}
