<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Posts Management class created by CodexWorld
 */
class Demo extends CI_Controller {
    
    function __construct() {
        parent::__construct();
       // $this->load->model('Demo_model');
        $this->login();
        $this->load->library('Ajax_pagination');
        $this->perPage = 2;
    }


    public function login()
       {
        $is_log_in = $this->session->userdata('logged_in');

                // Your own constructor
             if(isset($is_log_in))
              {
             return true;
              }
            else
              {
             echo "You don't have permisssion to acesss this page<br>";
             echo "<a href='../index.php/login'>Login</a>";
             die();
              }
       }

    
    public function index()
    {   
        $data = array();
        
        //total rows count)
         $this->load->model('demo_model');
        $totalRec = count($this->demo_model->getRows());

       

        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'index.php/demo/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $this->load->model('demo_model');
        $data['posts'] = $this->demo_model->getRows(array('limit'=>$this->perPage));
        
        //load the view
        $this->load->view('demo/index', $data);
    }
    
    function ajaxPaginationData()
    {
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //total rows count
        $this->load->model('demo_model');
        $totalRec = count($this->demo_model->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'index.php/demo/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $this->load->model('demo_model');
        $data['posts'] = $this->demo_model->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
        //load the view
        $this->load->view('demo/ajax-pagination-data', $data, false);
    }
}