<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Pi_cal_model extends CI_Model {

	protected $table = "performance_indicater";
	protected $pi_id;
	protected $emp_code;
	protected $score_sca;
	protected $score_pdac;
	
	protected $scpore_rc;
	protected $pi;
	protected $status_id;
  protected $year_of_pi;
  protected $obtained_score;
  protected $scaled_score;
  protected $date_of_pi_creation;
  protected $approval_officer;


   

	function get_pi()
	{
	   //for getting pi...
         echo "<br>";
	     $query = $this->db->get('performance_indicater'); 
         echo "<h4>Getting PI</h4>";
         foreach($query->result_array() as $row){
         var_dump($row);
         echo "<br><h1>Another Record</h1>";
        }
    }




    function set_pi($emp_code)
    {

             $inst_id = $this->session->inst; 
             //$desi = $this->session->desisss;
             $dept = $this->session->dept;
             $emp_code = $this->session->emp_code;
             $role_id = $this->session->role_id;
             $ayyear = trim($this->session->ayear);

             if($role_id == 4)
             {

             $this->db->select('hod');
             $this->db->from('department');
             $this->db->where('id', $dept);
             $this->db->where('institute_id', $inst_id);
        
             $query = $this->db->get();
                 foreach ($query->result() as $row)
                 {
                   $off = $row->hod;
                 }
             }

            
            else if($role_id == 3)
            {
              $this->db->select('principal_id');
              $this->db->from('institutes');
              // $this->db->where('id', $dept);
              $this->db->where('id', $inst_id);
        
             $query = $this->db->get();
                 foreach ($query->result() as $row)
                 {
                   $off = $row->principal_id;
                 } 

            }


            else if($role_id == 2)
            {
              $des = "president";
              $this->db->select('emp_code');
              $this->db->from('stes');
              // $this->db->where('id', $dept);
              $this->db->where('designation', $des);
        
             $query = $this->db->get();
                 foreach ($query->result() as $row)
                 {
                   $off = $row->emp_code;
                 } 

            }




            //forwarding appraisal..........

             $this->db->where('emp_code', $emp_code); 
             $query = $this->db->get('sca');
              
             
              foreach ($query->result() as $row)
               {
                 $id = $row->sca_id;
                 $sca = $row->sca_total;
                 $pda = $row->pda_total;
                 $rc =  $row->rc_total;
                 $ahp = $row->ahp_total;

                 $dept = $row->dept_total;
                 $acd = $row->acd_total;
                 $insts =  $row->insts_total;
                 $stds = $row->stds_total;
                 $pcd =  $row->pcd_total;
                 $fas = $row->fas_total;



                 $sca_id = $row->sca_id; 
                 $ay = $row->AY;
               }


               $this->db->where('pi_id', $id); 
               $query = $this->db->get('performance_indicater');
              
              if(($query->num_rows()) > 0 )
               {
                 $flag = 1;

               }

               else
              {

                $flag = 0; 
              }


               
            $table = "performance_indicater";
            $pi_id = $id;
            $emp_code;
            $score_sca =  $sca;
            $score_pdac = $pda;
            $score_rc = $rc; 
            $score_ahp = $ahp; 
            $score_dept = $dept;
            $score_acd = $acd;
            $score_insts = $insts;
            $score_stds = $stds;
            $score_pcd =  $pcd;
            $score_fas = $fas;
            $date_of_pi_creation = date("Y/m/d"); 
            $year = date("Y"); 
            $approval_officer =  $off ;
            if($role_id == 3)
            {
              $pi = round(($score_dept +  $score_acd + $score_insts + $score_stds + $score_pcd + $score_fas)/600);
            }

            else
           
            {

            $pi = (0.4 * $score_sca) + (0.2 * $score_pdac) + (0.3 * $score_rc ) + (0.1 * $score_ahp);
            
            }

            //$status_id = 1;
            //$year_of_pi = 2016;
            //$obtained_score = 60;
           // $scaled_score = 60;
           // $date_of_pi_creation = 60;
             
             
             $data=array('forward_status'=>'1');
                      $this->db->where('sca_id', $sca_id);
                      $this->db->update('sca',$data);
           
          
         

            if($flag == 0)
            {

             
                    $data = array(
                    
                    'pi_id' => $pi_id,
                    'emp_code' =>  $emp_code,
                    'score_sca' =>  $score_sca,
                    'score_pdac' =>  $score_pdac,
                    'score_rc' => $score_rc,
                    'score_ahp' =>  $score_ahp,
                     
                    'score_dept' => $score_dept,
                    'score_acd' => $score_acd,
                    'score_insts' => $score_insts,
                    'score_stds' => $score_stds,
                    'score_pcd' =>  $score_pcd,
                    'score_fas' => $score_fas,

                    'date_of_pi_creation' =>  $date_of_pi_creation,
                    'year_of_pi' => $year,
                    'approval_officer' => $approval_officer,
                    'officer' => $approval_officer,
                    'status_id' => '0',
                     'AY' => $ayyear
                    
                     );
             

             
              $this->db->where('emp_code', $emp_code);
              $this->db->insert('performance_indicater', $data);
            }

            else if($flag == 1)
            {  

          
            $data = array(
            
            'pi_id' => $pi_id,
            'emp_code' =>  $emp_code,
            'score_sca' =>  $score_sca,
            'score_pdac' =>  $score_pdac,
            'score_rc' => $score_rc,
            'score_ahp' =>  $score_ahp,
            'score_dept' => $score_dept,
            'score_acd' => $score_acd,
            'score_insts' => $score_insts,
            'score_stds' => $score_stds,
            'score_pcd' =>  $score_pcd,
            'score_fas' => $score_fas,
            'date_of_pi_creation' =>  $date_of_pi_creation,
            'year_of_pi' => $year,
            'approval_officer' => $approval_officer,
            'officer' => $approval_officer,
            'status_id' => '0',
            'AY' => $ayyear
            
             );

             $this->db->where('pi_id', $pi_id);
             $this->db->where('emp_code',$emp_code);
             $this->db->update('performance_indicater',$data); 

             $data = array(
            
             'reject_status' => '0'
            
             );

             $this->db->where('sca_id', $pi_id);
             $this->db->update('sca',$data);


            }

          






              if($this->db->affected_rows()>0)  
              {
                 //updating the notification table.....
                //updating staff forward notification 
                    $msg = "New appraisal is waiting for approval submited";

                     $data = array(
                          //'emp_code'=>  $code,
                          'assign_to' => $off,
                          'assign_of' => $emp_code,
                           //'pi_id' => $pi_id,
                          // 'given_by' => $lastoff,
                          'message' => $msg,
                          'given_at' => date('Y-m-d H:i:s')
                         );


                       $this->db->insert('notification', $data);
                      return 1; 

                    } 
              else
              {
               return 0; 
              }
             

   }

}



	






