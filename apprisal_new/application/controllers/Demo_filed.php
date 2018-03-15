<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Posts Management class created by CodexWorld
 */
class Demo_filed extends CI_Controller {
    
    function __construct() {
        parent::__construct();
       // $this->load->model('Demo_model');
        $this->load->library('Ajax_pagination');
        $this->perPage = 2;
    }
    
    public function index()
    {   
        $data = array();
        
        //total rows count)
         $this->load->model('demo_filed_model');
        $totalRec = count($this->demo_filed_model->getRows());

       

        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'index.php/demo_filed/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $this->load->model('demo_filed_model');
        $data['posts'] = $this->demo_filed_model->getRows(array('limit'=>$this->perPage));
        
        //load the view
        $this->load->view('demo_filed/index', $data);
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
        $this->load->model('demo_filed_model');
        $totalRec = count($this->demo_filed_model->getRows());
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'index.php/demo_filed/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $this->load->model('demo_filed_model');
        $data['posts'] = $this->demo_filed_model->getRows(array('start'=>$offset,'limit'=>$this->perPage));
        
        //load the view
        $this->load->view('demo_filed/ajax-pagination-data', $data, false);
    }
}