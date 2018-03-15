<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_staff_apraisal_apraisal_model extends CI_Model {

   

  function view()
  {

      $code =  base64_decode($this->uri->segment(3));
      $year = trim($this->session->ayear);
   
     
     if (empty($code))
      { 

      $emp_code = $this->session->emp_code; 

      }
      else
      {
          $emp_code = $code; 
        
      }


      $this->db->select('*');
      $this->db->from('employee');
      $this->db->where('emp_code', $emp_code);
      $query = $this->db->get();

     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
              $emp_role_id = $row->role_id;  

             }
          }


      

      $this->db->select('*');
      $this->db->from('sca');
      $this->db->where('emp_code', $emp_code);
      $this->db->where('AY', $year);
      $query = $this->db->get();

     

        if($query->num_rows())
          {
             foreach ($query->result() as $row)
             {
              $sac_id = $row->sca_id;  
              $sca = $row->sca_total;
              $sca2 = $row->sca_total2;
              $pdac = $row->pda_total;
              $pdac2 = $row->pda_total2;
              $rc = $row->rc_total;
              $rc2 = $row->rc_total2;
              $ahp = $row->ahp_total;
              $ahp2 = $row->ahp_total2;
                 $dept = $row->dept_total;
                 $dept2 = $row->dept_total2;
                 $acd = $row->acd_total;
                 $acd2 = $row->acd_total2;
                 $insts =  $row->insts_total;
                 $insts2 =  $row->insts_total2;
                 $stds = $row->stds_total;
                 $stds2 = $row->stds_total2;
                 $pcd =  $row->pcd_total;
                 $pcd2 =  $row->pcd_total2;
                 $fas = $row->fas_total;
                 $fas2 = $row->fas_total2;
              $year = $row->year_of_pi;
              $forward_status = $row->forward_status;
              //$status_id = $row->status_id;
              
              //$obtained_score = $row->scaled_score;
             // $date_of_pi_creation = $row->date_of_pi_creation;
              //$approval_officer = $row->approval_officer;
            //  $officer = $row->officer;
             // $last_assign_at = $row->last_assign_at;
               
             
             }

            
             $this->db->select('*');
             $this->db->from('performance_indicater');
             $this->db->where('pi_id', $sac_id);
             $query = $this->db->get();
     

              if($query->num_rows())
                {
                   foreach ($query->result() as $row)
                   {
                     $approval_officer = $row->approval_officer;   
                   }
                }

                else
                {
                  $approval_officer = "NA";
                }


             //Gettinf from table approvals...
             $this->db->select('*');
             $this->db->from('approvals');
             $this->db->where('pi_id', $sac_id);
             $query = $this->db->get();
     

              if($query->num_rows())
                {
                   foreach ($query->result() as $row)
                   {
                     $status_hod = $row->status_hod; 
                     $status_principal = $row->status_principal;
                     $status_vice = $row->status_vice;  
                   }
                }


              $this->db->select('*');
              $this->db->from('employee');
              $this->db->where('emp_code', $emp_code);
              $query = $this->db->get();
     
              //print_r($query);
             // die;

              if($query->num_rows())
               {
                 foreach ($query->result() as $row)
                   {
                    $des = $row->designation_id; 
                   } 
               }



          if($emp_role_id == 3 || $emp_role_id == 2)
          {
             if($dept!=0 && $acd !=0 && $insts!=0 && $stds!=0 && $fas !=0 && $pcd!=0)
             {
             $pi = round(($dept + $acd + $insts + $stds + $fas + $pcd)/6);

            
             }

             else
             {
                $pi = 0;
             }
            
             $scale_dept = round(($dept + $dept2)/2);
             $scale_acd = round(($acd + $acd2)/2);
             $scale_insts = round(($insts + $insts2)/2);
             $scale_stds = round(($stds + $stds2)/2);
             $scale_pcd = round(($pcd + $pcd2)/2);
             $scale_fas = round(($fas + $fas2)/2);
             $scale_sca = 0;
             $scale_pda = 0;
             $scale_rc = 0;
             $scale_ahp = 0;


             if($scale_dept!=0 && $scale_acd !=0 && $scale_insts!=0 && $scale_stds!=0 && $scale_pcd !=0 && $scale_fas!=0)
             {
             $fpi = round(($scale_dept + $scale_acd + $scale_insts + $scale_stds + $scale_fas + $scale_pcd)/6);

            
             }

             else
             {
                $fpi = 0;
             }



          }

          else
          {

              
          //faculty calculation
             if($sca !=0 && $pdac !=0 && $rc !=0 && $ahp !=0)
             {
             $pi = ($sca + $pdac + $rc + $ahp)/4;
             }

             else
             {
                $pi = 0;
             }

            //calculation of final score.
             if(abs($sca - $sca2) >= 15 )
                                        {


                                           $scale_sca = ($sca + $sca2)/2;

                                        }
                                        else
                                        {
                                          $scale_sca = $sca2;  
                                        }


                                          
                                        if(abs($pdac- $pdac2) >= 15 )
                                        {
                                           $scale_pda = ($pdac + $pdac2)/2;

                                               
                                        }
                                        else
                                        {
                                          $scale_pda = $pdac2;  
                                        }

                                         if(abs($rc - $rc2) >= 15 )
                                        {
                                           $scale_rc = ($rc + $rc2)/2;

                                        }
                                        else
                                        {
                                          $scale_rc = $rc2;  
                                        }

                                       
                                        $scale_ahp = $ahp2;

                                        $scale_dept = 0;
                                        $scale_acd = 0;
                                        $scale_insts = 0;
                                        $scale_stds = 0;
                                        $scale_pcd = 0;
                                        $scale_fas = 0;

                                          
                                        
                                      

            //calculation of PI based on designation
                                    

                                         if($des == 1)
                                          {
                                            $des_sca = $scale_sca*0.4;  
                                            $des_pda = $scale_pda*0.2; 
                                            $des_rc = $scale_rc*0.3; 
                                            $des_ahp = $scale_ahp*0.1;
                                            $fpi = $des_sca + $des_pda + $des_rc + $des_ahp;
                                          }

                                          else if($des == 2)
                                          {

                                            $des_sca = $scale_sca*0.5;  
                                            $des_pda = $scale_pda*0.2; 
                                            $des_rc = $scale_rc*0.2; 
                                            $des_ahp = $scale_ahp*0.1;
                                             $fpi = $des_sca + $des_pda + $des_rc + $des_ahp;

                                          }


                                          else if($des == 3)
                                          {
                                          

                                            $des_sca = $scale_sca*0.6;  
                                            $des_pda = $scale_pda*0.15; 
                                            $des_rc = $scale_rc*0.15; 
                                            $des_ahp = $scale_ahp*0.1;
                                            $fpi = $des_sca + $des_pda + $des_rc + $des_ahp;
                                          }

                                          else
                                          {
                                        
                                          echo "Designation ID is not assign";
                                          
                                          }


             }                           
             // end faculty calculation
       

                                 if($fpi >= 65) 
                                  {
                                    $grade =  "Outstanding";

                                  } 
                                  else if($fpi >= 50 && $fpi < 65) 
                                  {
                                    $grade =  "Very Good"; 
                                  }

                                   else if($fpi >= 45 && $fpi < 50) 
                                  {
                                     $grade =  "Positively Good"; 
                                  }

                                  else if($fpi >= 40 && $fpi < 45) 
                                  {
                                     $grade =  "Good"; 
                                  }

                                   else if($fpi >= 30 && $fpi < 40) 
                                  {
                                    $grade =  "Average"; 
                                  }

                                  else if($fpi < 30) 
                                  {
                                     $grade =  "Below Average"; 
                                  }


            $data = array(
            'eid' => $emp_code,
            'sca' => $sca,
            'sca2' => $sca2,
            'pdac' => $pdac,
            'pdac2' => $pdac2,
            'rc' => $rc,
            'rc2' => $rc2,
            'ahp' => $ahp,
            'ahp2' => $ahp2,

             'dept' => $dept,
             'dept2' => $dept2,
             'acd' => $acd,
             'acd2' => $acd2,
             'insts' =>  $insts,
             'insts2' =>  $insts2,
             'stds' => $stds,
             'stds2' => $stds2,
             'pcd' =>  $pcd,
             'pcd2' =>  $pcd2,
             'fas' => $fas,
             'fas2' => $fas2,


            'pi' => $pi,
            'year' => $year,
            'forward_status' => $forward_status,
            'approval_officer' => $approval_officer,
            'scale_ahp' => $scale_ahp,
            'scale_rc' => $scale_rc,
            'scale_pda' => $scale_pda,
             'scale_sca' => $scale_sca,

             'scale_dept' => $scale_dept,
             'scale_acd' =>  $scale_acd,
             'scale_insts' => $scale_insts,
             'scale_stds' => $scale_stds,
             'scale_pcd' => $scale_pcd,
             'scale_fas' =>  $scale_fas,

             'fpi' => $fpi,
             'grade' => $grade,
             'sca_id' => $sac_id,
             'status_hod' => $status_hod,
             'status_principal' => $status_principal,
             'status_vice' => $status_vice
           
             );

           
            //print_r($data);
            //die;
           // $this->load->view('my_apraisal',$data); 
          if($emp_role_id == 3 || $emp_role_id == 2)
          { 
          $this->load->view('v0.1/apprisal_staff_hod',$data);
          } 
          else
          {
           $this->load->view('v0.1/apprisal_staff',$data);  
          }

          //update notification flag
          
      }
         
              
       else
      {
                 $data = array(
                  'forward_status' => 0,
                   'sca_id' => 0
                   );
              $this->load->view('v0.1/apprisal_staff', $data);
      }

}

}



  







