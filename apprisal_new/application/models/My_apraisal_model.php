<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_apraisal_model extends CI_Model {

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


   

  function view()
  {

      $code = base64_decode($this->uri->segment(3));
      $nts_id = $this->uri->segment(4);
      $year = trim($this->session->ayear);
      $role = $this->session->role_id;
      

      //echo $code;
      if (empty($code))
      { 

      $emp_code = $this->session->emp_code; 

      }
      else
      {
          $emp_code = $code; 
          $data3 = array(
                  'flag' => '1'
               
                    );

                $this->db->where('id', $nts_id);
                $this->db->update('notification', $data3);
      }



        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('emp_code', $emp_code);
        $query = $this->db->get();
     
              

      if($query->num_rows())
      {
      foreach ($query->result() as $row)
          {
            $des = $row->designation_id; 
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

              //HOD 
              $dept = $row->dept_total;
              $dept2 = $row->dept_total2;
              $acd = $row->acd_total;
              $acd2 = $row->acd_total2;
              $insts = $row->insts_total;
              $insts2 = $row->insts_total2;
              $stds = $row->stds_total;
              $stds2 = $row->stds_total2;
              $fas = $row->fas_total;
              $fas2 = $row->fas_total2;
              $pcd = $row->pcd_total;
              $pcd2 = $row->pcd_total2;

              $year = $row->year_of_pi;
              $forward_status = $row->forward_status;
              $timing_initialised = $row->timing;
              $reject_status = $row->reject_status;
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
                           $vp_comment = $row->vp_comment;   
                         }
                      }

                      else
                      {
                        $approval_officer = "NA";
                        $vp_comment = '';
                      }




          if($role == 3 || $role == 2)
          {
               if($dept != -1 && $acd != -1 && $insts != -1 && $stds != -1 && $fas != -1 && $pcd != -1 )
                 {
                   $pi = round(($dept + $acd + $insts + $stds + $fas + $pcd)/6);
                 }

                 else
                {
                 $pi = 0;
                }


          }

          else
          { 
       

                 if($sca != -1 && $pdac != -1 && $rc != -1)
                 {
                     
                                           if($des == 1)
                                            {

                                              $des_sca = $sca*0.4;  
                                             

                                              $des_pda = $pdac*0.2; 


                                              $des_rc = $rc*0.3; 
                                              

                                              $des_ahp = $ahp*0.1;

                                              $pi = $des_sca + $des_pda + $des_rc + $des_ahp;


                                            }

                                            else if($des == 2)
                                            {

                                              $des_sca = $sca*0.5;  
                                              $des_pda = $pdac*0.2; 
                                              $des_rc = $rc*0.2; 
                                              $des_ahp = $ahp*0.1;
                                              $pi = $des_sca + $des_pda + $des_rc + $des_ahp;

                                            }


                                            else if($des == 3)
                                            {
                                            
                                              $des_sca = $sca*0.6;  
                                              $des_pda = $pdac*0.15; 
                                              $des_rc = $rc*0.15; 
                                              $des_ahp = $ahp*0.1;
                                              $pi = $des_sca + $des_pda + $des_rc + $des_ahp;
                                            }

                                            else
                                            {
                                          
                                              echo "Designation ID is not assign";
                                            
                                            }
                 }

                 else
                 {
                    $pi = 0;
                 }
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

            //HOD
            'dept' => $dept,
            'dept2' => $dept2,
            'acd' => $acd,
            'acd2' => $acd2,
            'insts' => $insts,
            'insts2' => $insts2,
            'stds' => $stds,
            'stds2' => $stds2,
            'fas' => $fas,
            'fas2' => $fas2,
            'pcd' => $pcd,
            'pcd2' => $pcd2,


            'pi' => $pi,
            'year' => $year,
            'forward_status' => $forward_status,
            'approval_officer' => $approval_officer,
             'timing_initialised' => $timing_initialised,
             'reject_status' => $reject_status,
             'vp_comment' => $vp_comment
           
             );
          
       
           // $this->load->view('my_apraisal',$data); 
           //print_r($data);
            //die;
             if($role == 3 || $role == 2)
            {

              $this->load->view('v0.1/apprisal_self_hod',$data);
            }
            else
            {

               $this->load->view('v0.1/apprisal_self',$data); 
            }
            


            
      }
         
              


    

      else
      {
                 $data = array(
                  'forward_status' => 0,
                  'reject_status' =>0 

                   );

              if($role == 3 || $role == 2)
              {
              $this->load->view('v0.1/apprisal_self_hod', $data);
              }
              else
              {
               $this->load->view('v0.1/apprisal_self', $data);   
              }
      }

}

}



  







