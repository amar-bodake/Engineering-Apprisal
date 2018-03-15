<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custumize extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->login();
		$emp_code = $this->session->emp_code; 
		//print_r($this->session);
		
		$inst = $this->session->inst;
		$dept = $this->session->dept;
        $role = $this->session->role_id;

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
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
               echo "<a href='../login'>Login</a>";
               die();
                }
       }




	public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}
	public function index()

	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function dept_data()
	{

		 $inst = $this->session->inst;
		 $dept = $this->session->dept;
		
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->where('institute_id',$inst);
			$crud->where('dept_id',$dept);
			$crud->set_table('userdata');
			$crud->set_subject('Department Data');
			$crud->required_fields('emp_no');
			
			//$crud->columns('sr_no','emp_no','institute_id','dept_id','year','lecasem1','leccsem1','praasem1','pracsem1','lecasem2','leccsem2','praasem2','pracsem2','tsem1f1','tsem1f2','	psem1f1','psem1f2','tsem2f1','tsem2f2','psem2f1','psem2f2','tsem1r1','tsem1ra1','tsem1r2','tsem1ra2','pr1sem1','pra1sem1','pr2sem1','pra2sem1','tsem2r1','tsem2ra1','	tsem2r2','tsem2ra2','pr1sem2','pra1sem2','pr2sem2','pra2sem2','	th1aasem1','th2aasem1','pr1aasem1','pr2aasem1','th1aasem2','th2aasem2','pr1aasem2','pr2aasem2');

			


			$crud->display_as('lecasem1','Lecture Assign(sem1)')->display_as('leccsem1','Lecture Conduct(sem1)')->display_as('praasem1','Pract Assign(sem1)')->display_as('praasem1','Pract Assign(sem1)')->display_as('pracsem1','Pract Conduct(sem1)')->display_as('lecasem2','Lecture Assign(sem2)')->display_as('leccsem2','Lecture Conduct(sem2)')->display_as('praasem2','Pract Assign(sem2)')->display_as('praasem2','Pract Assign(sem2)')->display_as('pracsem2','Pract Conduct(sem2)')->display_as('tsem1f1','TH1 Feedback(sem1)')->display_as('tsem1f2','TH2 Feedback(sem1)')->display_as('psem1f1','PR1 Feedback(sem1)')->display_as('psem1f2','PR2 Feedback(sem1)')->display_as('tsem2f1','TH1 Feedback(sem2)')->display_as('tsem2f2','TH2 Feedback(sem2)')->display_as('psem2f1','PR1 Feedback(sem2)')->display_as('psem2f2','PR2 Feedback(sem2)')->display_as('tsem1r1','TH1 Result%(sem1)')->display_as('tsem1ra1','TH1 Result(3 Yr Avg)%(sem1)')->display_as('tsem1r2','TH2 Result%(sem1)')->display_as('tsem1ra2','TH2 Result(3 Yr Avg)%(sem1)')->display_as('pr1sem1','PR1 Result%(sem1)')->display_as('pra1sem1','PR1 Result(3 Yr Avg)%(sem1)')->display_as('pr2sem1','PR2 Result%(sem1)')->display_as('pra2sem1','PR2 Result(3 Yr Avg)%(sem1)')->display_as('tsem2r1','TH1 Result%(sem2)')->display_as('tsem2ra1','TH1 Result(3 Yr Avg)%(sem2)')->display_as('tsem2r2','TH2 Result%(sem2)')->display_as('tsem2ra2','TH2 Result(3 Yr Avg)%(sem2)')->display_as('pr1sem2','PR1 Result%(sem2)')->display_as('pra1sem2','PR1 Result(3 Yr Avg)%(sem2)')->display_as('pr2sem2','PR2 Result%(sem2)')->display_as('pra2sem2','PR2 Result(3 Yr Avg)%(sem2)')->display_as('th1aasem1','TH1 Avg attendance(sem1)')->display_as('th2aasem1','TH2 Avg attendance(sem1)')->display_as('pr1aasem1','PR1 Avg attendance(sem1)')->display_as('pr2aasem1','PR2 Avg attendance(sem1)')->display_as('th1aasem2','TH1 Avg attendance(sem2)')->display_as('th2aasem2','TH2 Avg attendance(sem2)')->display_as('pr1aasem2','PR1 Avg attendance(sem2)')->display_as('pr2aasem2','PR2 Avg attendance(sem2)');

						//$crud->columns('sr_no','emp_no','institute_id','dept_id','year','lecasem1','leccsem1','praasem1','pracsem1','lecasem2','leccsem2','praasem2','pracsem2','tsem1f1','tsem1f2','	psem1f1','psem1f2','tsem2f1','tsem2f2','psem2f1','psem2f2','tsem1r1','tsem1ra1','tsem1r2','tsem1ra2','pr1sem1','pra1sem1','pr2sem1','pra2sem1','tsem2r1','tsem2ra1','	tsem2r2','tsem2ra2','pr1sem2','pra1sem2','pr2sem2','pra2sem2','	th1aasem1','th2aasem1','pr1aasem1','pr2aasem1','th1aasem2','th2aasem2','pr1aasem2','pr2aasem2');

			$crud->unset_edit_fields(array('tsem2r1','tsem2ra1','tsem2r2','tsem2ra2','pr1sem2','pra1sem2','pr2sem2','pr2sem2','pra2sem2'));


			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	

	

	

	public function emp_data()
	{

		    $inst = $this->session->inst;
		    $dept = $this->session->dept;

			$crud = new grocery_CRUD();
			$crud->set_theme('flexigrid');

			$crud->where('institute_id',$inst);
			$crud->where('department_id',$dept);

			$crud->set_table('employee');
			$crud->set_subject('Employee Data');
			$crud->required_fields('sr');

			$crud->columns('emp_code','email','name');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	

	

	

	

	



}
