<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_report_model extends CI_Model {

   

  function view()
  {

      $code =  base64_decode($this->uri->segment(3));
     
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
              $fac_role_id = $row->role_id;  
             
             }
          }
      

      $this->db->select('*');
      $this->db->from('sca');
      $this->db->where('emp_code', $emp_code);
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
                     $hod_comment = $row->hod_comment;
                     $pricipal_comment = $row->pricipal_comment;
                     $vp_comment = $row->vp_comment;
                     $dept = $row->score_dept;
                      $dept2 = $row->score_dept2;
                      $scale_dept = $row->scale_dept; 
                      $acd = $row->score_acd;
                      $acd2 = $row->score_acd2;
                      $scale_acd = $row->scale_acd; 
                      $insts = $row->score_insts;
                      $insts2 = $row->score_insts2;
                      $scale_insts = $row->scale_insts; 
                      $stds = $row->score_stds;
                      $stds2 = $row->score_stds2;
                      $scale_stds = $row->scale_stds; 

                      $fas = $row->score_fas;
                      $fas2 = $row->score_fas2;
                      $scale_fas = $row->scale_fas; 

                      $pcd = $row->score_pcd;
                      $pcd2 = $row->score_pcd2;
                      $scale_pcd = $row->scale_pcd;

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
                     $hod_time = $row->hod_time;
                     $principal_time = $row->principal_time; 
                     $vp_time = $row->vp_time; 

					           $ayear = $row->AY; 

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






                    
       if($fac_role_id == 4)
       {

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

                   else if($fac_role_id == 3 || $fac_role_id == 2)
                  {


                  $scale_sca = 0;
                  $scale_rc = 0;
                  $scale_pda = 0;
                  $scale_ahp = 0;

                   $pi = round(($scale_dept + $scale_acd + $scale_insts + $scale_stds + $scale_fas + $scale_pcd)/6);
                   $fpi = $pi;
                  }

                                        
             
       

                                   if($fpi >= 60) 
                                  {
                                    $grade =  "Outstanding";

                                  } 
                                  else if($fpi >= 50 &&$fpi <= 60) 
                                  {
                                    $grade =  "Very Good"; 
                                  }

                                   else if($fpi >= 45 && $fpi <= 50) 
                                  {
                                     $grade =  "Positively Good"; 
                                  }

                                  else if($fpi >= 40 && $fpi <= 45) 
                                  {
                                     $grade =  "Good"; 
                                  }

                                   else if($fpi >= 30 && $fpi <= 40) 
                                  {
                                     $grade =  "Average"; 
                                  }

                                  else if($fpi <= 30) 
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
            'pi' => $pi,
            'year' => $year,
            'forward_status' => $forward_status,
            'approval_officer' => $approval_officer,
            'scale_ahp' => $scale_ahp,
            'scale_rc' => $scale_rc,
            'scale_pda' => $scale_pda,
            'scale_sca' => $scale_sca,
             'dept' => $dept,
             'dept2' => $dept2,
             'scale_dept' => $dept, 
             'acd' => $acd,
             'acd2' => $acd2,
             'scale_acd' => $scale_acd, 
             'insts' => $insts,
             'insts2' => $insts2,
             'scale_insts' => $scale_insts, 
             'stds' => $stds,
             'stds2' => $stds2,
             'scale_stds' => $scale_stds, 

             'fas' => $fas,
             'fas2' => $fas2,
             'scale_fas' => $scale_fas, 

             'pcd' => $pcd,
             'pcd2' => $pcd2,
             'scale_pcd' => $scale_pcd,

             'fpi' => $fpi,
             'grade' => $grade,
             'sca_id' => $sac_id,
             'status_hod' => $status_hod,
             'status_principal' => $status_principal,
             'status_vice' => $status_vice,
             'hod_comment' => $hod_comment,
             'pricipal_comment' => $pricipal_comment,
             'vp_comment' => $vp_comment,
             'hod_time' => $hod_time,
             'principal_time' => $principal_time,
             'vp_time' => $vp_time,
             'ayear' =>  $ayear


           
             );

           
            //print_r($data);
            //die;
           // $this->load->view('my_apraisal',$data); 

            $html=$this->load->view('v0.1/pdf_report', $data, true); 
            $pdfFilePath = "Apraisal.pdf";
            $this->load->library('m_pdf');
            $pdf = $this->m_pdf->load();
            $pdf->WriteHTML($html);
             $pdf->Output($pdfFilePath, "D");   

           // $this->load->view('v0.1/pdf_report',$data);

          //update notification flag
          
      }
         
              
   else
  {
             $data = array(
              'forward_status' => 0,
               'sca_id' => 0,
               );
          $this->load->view('v0.1/pdf_report', $data);
  }

 


}



}



  







