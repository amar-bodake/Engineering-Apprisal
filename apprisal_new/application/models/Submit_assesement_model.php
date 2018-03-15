<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit_assesement_model extends CI_Model {

 


   

  function insert()
  {
   
     $sca_id = $this->input->post('sca_id');

   

    $this->db->select('sca_id,role_id,sca.emp_code,employee.emp_code');
    $this->db->from('sca');
    $this->db->join('employee', 'sca.emp_code = employee.emp_code');
     $this->db->where('sca_id',  $sca_id);
    $query = $this->db->get();
     foreach ($query->result() as $row)
      {
            $fac_role_id = $row->role_id;
      }
       
    


     
     $role = $this->session->role_id;



     if($role == 3)
      
    {
       


               if($fac_role_id == 3)
                {
                  $data = array(  
                          
                          'score_dept' => $this->input->post('dept'),
                          'score_dept2' => $this->input->post('dept2'),
                          'scale_dept' => $this->input->post('scale_dept'), 
                          'score_acd' => $this->input->post('acd'),
                          'score_acd2' => $this->input->post('acd2'),
                          'scale_acd' => $this->input->post('scale_acd'), 
                          'score_insts' => $this->input->post('insts'),
                          'score_insts2' => $this->input->post('insts2'),
                          'scale_insts' => $this->input->post('scale_insts'), 
                          'score_stds' => $this->input->post('stds'),
                          'score_stds2' => $this->input->post('stds2'),
                          'scale_stds' => $this->input->post('scale_stds'), 

                          'score_fas' => $this->input->post('fas'),
                          'score_fas2' => $this->input->post('fas2'),
                          'scale_fas' => $this->input->post('scale_fas'), 

                          'score_pcd' => $this->input->post('pcd'),
                          'score_pcd2' => $this->input->post('pcd2'),
                          'scale_pcd' => $this->input->post('scale_pcd'), 

                          'pi' => $this->input->post('fpi'),
                          'hod_comment' => $this->input->post('hod_comment')

                      );
                } 

                else  if($fac_role_id == 4)
                {

                 $data = array(  
                          
                          'score_sca' => $this->input->post('sca'),
                          'score_sca2' => $this->input->post('sca2'),
                          'scale_sca' => $this->input->post('scale_sca'), 
                          'score_pdac' => $this->input->post('pdac'),
                          'score_pdac2' => $this->input->post('pdac2'),
                          'scale_pdac' => $this->input->post('scale_pdac'), 
                          'score_rc' => $this->input->post('rc'),
                          'score_rc2' => $this->input->post('rc2'),
                          'scale_rc' => $this->input->post('scale_rc'), 
                          'score_ahp' => $this->input->post('ahp'),
                          'score_ahp2' => $this->input->post('ahp2'),
                          'scale_ahp' => $this->input->post('scale_ahp'), 
                          'pi' => $this->input->post('fpi'),
                          'hod_comment' => $this->input->post('hod_comment')

                      );
                }

      
          $this->db->where('pi_id',  $sca_id);
          $this->db->update('performance_indicater', $data);
          if($this->db->affected_rows()>0)
          {
               $datas = array(
                          'status_hod' => '1',
                           'hod_time' => date('Y-m-d H:i:s')

                       );
                $this->db->where('pi_id',  $sca_id);
                $this->db->update(' approvals', $datas);

        }
      }

      else if($role == 2)
      {
       
               if($fac_role_id == 3)
                {
                  $data = array(  
                          
                          'score_dept' => $this->input->post('dept'),
                          'score_dept2' => $this->input->post('dept2'),
                          'scale_dept' => $this->input->post('scale_dept'), 
                          'score_acd' => $this->input->post('acd'),
                          'score_acd2' => $this->input->post('acd2'),
                          'scale_acd' => $this->input->post('scale_acd'), 
                          'score_insts' => $this->input->post('insts'),
                          'score_insts2' => $this->input->post('insts2'),
                          'scale_insts' => $this->input->post('scale_insts'), 
                          'score_stds' => $this->input->post('stds'),
                          'score_stds2' => $this->input->post('stds2'),
                          'scale_stds' => $this->input->post('scale_stds'), 

                          'score_fas' => $this->input->post('fas'),
                          'score_fas2' => $this->input->post('fas2'),
                          'scale_fas' => $this->input->post('scale_fas'), 

                          'score_pcd' => $this->input->post('pcd'),
                          'score_pcd2' => $this->input->post('pcd2'),
                          'scale_pcd' => $this->input->post('scale_pcd'), 

                          'pi' => $this->input->post('fpi'),
                          'pricipal_comment' => $this->input->post('hod_comment')

                      );
                }


                else if($fac_role_id == 4)
              {
        

                $data = array(
                        
                        'score_sca' => $this->input->post('sca'),
                        'score_sca2' => $this->input->post('sca2'),
                        'scale_sca' => $this->input->post('scale_sca'), 
                        'score_pdac' => $this->input->post('pdac'),
                        'score_pdac2' => $this->input->post('pdac2'),
                        'scale_pdac' => $this->input->post('scale_pdac'), 
                        'score_rc' => $this->input->post('rc'),
                        'score_rc2' => $this->input->post('rc2'),
                        'scale_rc' => $this->input->post('scale_rc'), 
                        'score_ahp' => $this->input->post('ahp'),
                        'score_ahp2' => $this->input->post('ahp2'),
                        'scale_ahp' => $this->input->post('scale_ahp'), 
                        'pi' => $this->input->post('fpi'),
                        'pricipal_comment' => $this->input->post('hod_comment')

                    );

                }

      
          $this->db->where('pi_id',  $sca_id);
          $this->db->update('performance_indicater', $data);
          if($this->db->affected_rows()>0)
          {
               $datas = array(
                          'status_principal' => '1',
                           'principal_time' => date('Y-m-d H:i:s')

                       );
                $this->db->where('pi_id',  $sca_id);
                $this->db->update(' approvals', $datas);

        }

      }

      else if($role == 1)
      {
       
               if($fac_role_id == 2)
                {
                  $data = array(  
                          
                          'score_dept' => $this->input->post('dept'),
                          'score_dept2' => $this->input->post('dept2'),
                          'scale_dept' => $this->input->post('scale_dept'), 
                          'score_acd' => $this->input->post('acd'),
                          'score_acd2' => $this->input->post('acd2'),
                          'scale_acd' => $this->input->post('scale_acd'), 
                          'score_insts' => $this->input->post('insts'),
                          'score_insts2' => $this->input->post('insts2'),
                          'scale_insts' => $this->input->post('scale_insts'), 
                          'score_stds' => $this->input->post('stds'),
                          'score_stds2' => $this->input->post('stds2'),
                          'scale_stds' => $this->input->post('scale_stds'), 

                          'score_fas' => $this->input->post('fas'),
                          'score_fas2' => $this->input->post('fas2'),
                          'scale_fas' => $this->input->post('scale_fas'), 

                          'score_pcd' => $this->input->post('pcd'),
                          'score_pcd2' => $this->input->post('pcd2'),
                          'scale_pcd' => $this->input->post('scale_pcd'), 

                          'pi' => $this->input->post('fpi'),
                          'vp_comment' => $this->input->post('hod_comment')

                      );
                }


      
                

      
          $this->db->where('pi_id',  $sca_id);
          $this->db->update('performance_indicater', $data);
          if($this->db->affected_rows()>0)
          {
               $datas = array(
                          'status_vice' => '1',
                           'vp_time' => date('Y-m-d H:i:s')

                       );
                $this->db->where('pi_id',  $sca_id);
                $this->db->update('approvals', $datas);

        }

      }




 

            echo '<script>alert("Staff Apprisal Submited!!!")</script>';
                if($this->db->affected_rows()>0)
                {
                 // echo "Updated!!!";
                 redirect('profile/admin_profile');  

                }
          }

    
  }





  







