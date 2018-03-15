<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment_model extends CI_Model {

   function cal()
    {
      $emp_code = $this->uri->segment(3);
      $des =  $this->session->des_id;
     




       if (!empty($emp_code))
            { 

            $array = array('emp_code' => $emp_code, ' forward_status' => '1' );
            $this->db->select('*');
            $this->db->from('sca');
            $this->db->where($array); 
            $query = $this->db->get(); 
            if ($query->num_rows() > 0)
                           {
                                    foreach ($query->result() as $row)
                                     {
                                          $sca_id = $row->sca_id;
                                          $emp_code = $row->emp_code;
                                          $sca_total = $row->sca_total;
                                          $sca_total2 = $row->sca_total2;
                                          $pda_total = $row->pda_total;
                                          $pda_total2 = $row->pda_total2;
                                          $rc_total = $row->rc_total;
                                          $rc_total2 = $row->rc_total2;
                                          $ahp_total = $row->ahp_total;
                                          $ahp_total2 = $row->ahp_total2;

                                     }
                                       if(abs($sca_total - $sca_total2) >= 15 )
                                        {


                                           $scale_sca = ($sca_total + $sca_total2)/2;

                                          // echo $scale_sca;
                                           

                                          
                                        }
                                        else
                                        {
                                          $scale_sca = $sca_total;  
                                        }


                                          
                                        if(abs($pda_total - $pda_total2) >= 15 )
                                        {
                                           $scale_pda = ($pda_total + $pda_total2)/2;
                                        }
                                        else
                                        {
                                          $scale_pda = $pda_total;  
                                        }

                                         if(abs($rc_total - $rc_total2) >= 15 )
                                        {
                                           $scale_rc = ($rc_total + $rc_total2)/2;
                                        }
                                        else
                                        {
                                          $scale_rc = $rc_total;  
                                        }

                                         if(abs($ahp_total - $ahp_total2) >= 15 )
                                        {
                                           $scale_ahp = ($ahp_total + $ahp_total2)/2;
                                        }
                                        else
                                        {
                                          $scale_ahp = $ahp_total; 

                                         

                                        }
                                        
                                        //calcukation of scaled scored according to Designation

                                        if($des == 1)
                                        {
                                          $des_sca = $scale_sca*0.4;  
                                          $des_pda = $scale_pda*0.2; 
                                          $des_rc = $scale_rc*0.3; 
                                          $des_ahp = $scale_ahp*0.1;
                                          $pi = $des_sca + $des_pda + $des_rc + $des_ahp;
                                        }

                                        else if($des == 2)
                                        {

                                          $des_sca = $scale_sca*0.5;  
                                          $des_pda = $scale_pda*0.2; 
                                          $des_rc = $scale_rc*0.2; 
                                          $des_ahp = $scale_ahp*0.1;
                                           $pi = $des_sca + $des_pda + $des_rc + $des_ahp;
                                        }


                                        else if($des == 3)
                                        {
                                        

                                          $des_sca = $scale_sca*0.6;  
                                          $des_pda = $scale_pda*0.15; 
                                          $des_rc = $scale_rc*0.15; 
                                          $des_ahp = $scale_ahp*0.1;
                                           $pi = $des_sca + $des_pda + $des_rc + $des_ahp;
                                        }

                                        else
                                        {
                                      
                                        echo "Designation ID is not assign";
                                        
                                        }


                                      

                                 
                                    $data = array (

                                          'sca_id' => $sca_id,
                                          'emp_code' => $emp_code,
                                          'sca_total' => $sca_total,
                                          'sca_total2' => $sca_total2,
                                          'scale_sca' => $scale_sca,
                                          'des_sca' => $des_sca,

                                          'pda_total' => $pda_total,
                                          'pda_total2' => $pda_total2,
                                          'scale_pda' => $scale_pda,
                                          'des_pda' => $des_pda,

                                          'rc_total' => $rc_total,
                                          'rc_total2' => $rc_total2,
                                          'scale_rc' => $scale_rc,
                                          'des_rc' => $des_rc,

                                          'ahp_total' => $ahp_total,
                                          'ahp_total2' => $ahp_total2,
                                          'scale_ahp' => $scale_ahp,
                                          'des_ahp' => $des_ahp,

                                           'pi' => $pi,


                                     );

                                  // var_dump($data);
                                   // die;

                                    return $data;
                                  
                            }
                  
            }   

      else {
             echo "No aprisal is found!!!";
             die;
           }
                      
    }

  }
       
        
 



  







