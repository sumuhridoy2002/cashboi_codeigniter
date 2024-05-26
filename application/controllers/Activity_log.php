<?php
class Activity_log extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("prime_model","pm");
        $this->checkPermission();
    }
    
    // public function index() {
    //     $data['title'] = 'Site Log';
    //     $this->load->model('activity_log_model');
    //     $data['activity_logs'] = $this->activity_log_model->get_activity_logs();
    //     $this->load->view('activity_log', $data);
    // }

    public function index() {
        $data['title'] = 'Site Log';
        $this->load->model('activity_log_model');
        
        // Fetch activity logs
        $data['activity_logs'] = $this->activity_log_model->get_activity_logs();
    
        // Count total records
        $total_records = count($data['activity_logs']);
    
        // Pagination variables
        $limit = 25; // Number of items per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        $total_pages = ceil($total_records / $limit);
    
        // Slice activity logs data based on pagination
        $data['activity_logs'] = array_slice($data['activity_logs'], $offset, $limit);
    
        // Pagination HTML generation
        $pagination_html = '<ul class="pagination">';
        if ($page > 1) {
            $pagination_html .= '<li class="paginated"><a href="?page=' . ($page - 1) . '">Previous</a></li>';
        }
        for ($i = 1; $i <= $total_pages; $i++) {
            $pagination_html .= '<li class="paginated';
            if ($page == $i) {
                $pagination_html .= ' active'; // Adding "active" class here
            }
            $pagination_html .= '"><a href="?page=' . $i . '">' . $i . '</a></li>';
        }
        if ($page < $total_pages) {
            $pagination_html .= '<li class="paginated"><a href="?page=' . ($page + 1) . '">Next</a></li>';
        }
        $pagination_html .= '</ul>';
    
        $data['pagination_html'] = $pagination_html;
    
        $this->load->view('activity_log', $data);
    }
}
