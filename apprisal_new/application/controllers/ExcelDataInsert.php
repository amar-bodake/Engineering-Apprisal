  <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ExcelDataInsert extends CI_Controller
{
 
   public function excel_function()
   {

     $file = $_FILES['upload']['tmp_name'];
     $year = $_POST['year'];


 if($year == "Select Year")
  {

    $this->session->set_flashdata('warning', 'Please select a year');
    redirect('Upload_data/choose_data');

  }  

  if(!file_exists($_FILES['upload']['tmp_name']) || !is_uploaded_file($_FILES['upload']['tmp_name'])) {
    $this->session->set_flashdata('warning', 'Please Upload a CSV File');
    redirect('Upload_data/choose_data');
    
  }


//load the excel library
    $this->load->library('excel');
    //read file from path
   
    $objPHPExcel = PHPExcel_IOFactory::load($file);
    //get only the Cell Collection
    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
    //extract to a PHP readable array format
    foreach ($cell_collection as $cell) {
     $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
     $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
     $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
     //header will/should be in row 1 only. 
     if ($row == 1) {
     $header_main[$row][$column] = $data_value;
     }

    else if ($row == 2) {
     $header[$row][$column] = $data_value;
     } 
      

     else {
     $arr_data[$row][$column] = $data_value;
     }


    }
     
     //print_r($arr_data);
   // die;


    for ($x = 3; $x <= $row;  $x++)
    {
      
      $empno = $arr_data[$x]['B'];
      //letures practicals
      $la1 = $arr_data[$x]['C'];
      $lc1 = $arr_data[$x]['D'];
      $pa1 = $arr_data[$x]['E'];
      $pc1 = $arr_data[$x]['F'];

      $la2 = $arr_data[$x]['H'];
      $lc2 = $arr_data[$x]['I'];
      $pa2 = $arr_data[$x]['J'];
      $pc2 = $arr_data[$x]['K'];
      //feedback..........
      $tsem1f1 = $arr_data[$x]['M'];
      $tsem1f2 = $arr_data[$x]['N'];

      $psem1f1 = $arr_data[$x]['O'];
      $psem1f2 = $arr_data[$x]['P'];


      $tsem2f1 = $arr_data[$x]['Q'];
      $tsem2f2 = $arr_data[$x]['R'];

      $psem2f1 = $arr_data[$x]['S'];
      $psem2f2 = $arr_data[$x]['T'];

      

      //theory result sem1

      $tsem1r1 = $arr_data[$x]['U'];
      $tsem1ra1 = $arr_data[$x]['V'];

      $tsem1r2 = $arr_data[$x]['W'];
      $tsem1ra2 = $arr_data[$x]['X'];

      //practical result
      $pr1sem1 = $arr_data[$x]['Y'];
      $pra1sem1 = $arr_data[$x]['Z'];

      $pr2sem1 = $arr_data[$x]['AA'];
      $pra2sem1 = $arr_data[$x]['AB'];


      //theory result sem2

      $tsem2r1 = $arr_data[$x]['AC'];
      $tsem2ra1 = $arr_data[$x]['AD'];

      $tsem2r2 = $arr_data[$x]['AE'];
      $tsem2ra2 = $arr_data[$x]['AF'];

      //practical result
      $pr1sem2 = $arr_data[$x]['AG'];
      $pra1sem2 = $arr_data[$x]['AG'];

      $pr2sem2 = $arr_data[$x]['AI'];
      $pra2sem2 = $arr_data[$x]['AJ'];




      

      


      //attendance sem 1

      $th1aasem1 = $arr_data[$x]['AK'];
      $th2aasem1 = $arr_data[$x]['AL'];

      $pr1aasem1 = $arr_data[$x]['AM'];
      $pr2aasem1 = $arr_data[$x]['AN'];


      //attendance sem 2

      $th1aasem2 = $arr_data[$x]['AO'];
      $th2aasem2 = $arr_data[$x]['AO'];

      $pr1aasem2 = $arr_data[$x]['AQ'];
      $pr2aasem2 = $arr_data[$x]['AR'];

      //$this->session->emp_is;
      $data_user = 

      array(

        'emp_no'=> $empno, 
        'institute_id' => $this->session->inst,
        'dept_id' => $this->session->dept,
        'year'=> $year,

        'lecasem1'=>  $la1,
        'leccsem1'=>$lc1, 
        'praasem1'=> $pa1,
        'pracsem1'=>$pc1, 

        'lecasem2'=>  $la2,
        'leccsem2'=>$lc2, 
        'praasem2'=> $pa2,
        'pracsem2'=>$pc2, 

        //feedback..........
      'tsem1f1' => $tsem1f1,
      'tsem1f2' => $tsem1f2,

      'psem1f1' => $psem1f1,
      'psem1f2' =>  $psem1f2,


      'tsem2f1' => $tsem2f1,
      'tsem2f2' => $tsem2f2,

      'psem2f1' => $psem2f1,
      'psem2f2' => $psem2f2,


      //theory result sem1

      'tsem1r1' => $tsem1r1,
      'tsem1ra1' => $tsem1ra1,

      'tsem1r2' => $tsem1r2,
      'tsem1ra2' => $tsem1ra2,

      //practical result
      'pr1sem1' => $pr1sem1,
      'pra1sem1' => $pra1sem1,

      'pr2sem1' => $pr2sem1,
      'pra2sem1' => $pra2sem1,

      //theory result sem2

      'tsem2r1' => $tsem2r1,
      'tsem2ra1' => $tsem2ra1,

      'tsem2r2' => $tsem2r2,
      'tsem2ra2' => $tsem2ra2,

      //practical result
      'pr1sem2' => $pr1sem2,
      'pra1sem2' => $pra1sem2,

      'pr2sem2' => $pr2sem2,
      'pra2sem2' => $pra2sem2,

       //attendance sem 1

      'th1aasem1' => $th1aasem1,
      'th2aasem1' => $th2aasem1,

      'pr1aasem1' => $pr1aasem1,
      'pr2aasem1' => $pr2aasem1,


      //attendance sem 2

      'th1aasem2' => $th1aasem2,
      'th2aasem2' => $th2aasem2,

      'pr1aasem2' => $pr1aasem2,
      'pr2aasem2' => $pr2aasem2




      );


    



     $this->load->model('excel_data_insert_model');
     $this->excel_data_insert_model->add_user($data_user);
     }

  
    redirect('Upload_data/choose_data');

   }


  public function excel_emp_function()
  {

     $file = $_FILES['upload']['tmp_name'];
    // $year = $_POST['year'];


   //if($year == "Select Year")
  // {

  //   $this->session->set_flashdata('warning', 'Please select a year');
  //    redirect('Upload_data/choose_data');
  // }  

    if(!file_exists($_FILES['upload']['tmp_name']) || !is_uploaded_file($_FILES['upload']['tmp_name'])) {
       $this->session->set_flashdata('warning', 'Please Upload a CSV File');
       redirect('Upload_data/emp_data');
    
      }


//load the excel library
    $this->load->library('excel');
    //read file from path
   
    $objPHPExcel = PHPExcel_IOFactory::load($file);
    //get only the Cell Collection
    $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
    //extract to a PHP readable array format
    foreach ($cell_collection as $cell) {
     $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
     $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
     $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
     //header will/should be in row 1 only. 
     if ($row == 1) {
     $header_main[$row][$column] = $data_value;
     }

    else if ($row == 2) {
     $header[$row][$column] = $data_value;
     } 
      

     else {
     $arr_data[$row][$column] = $data_value;
     }


    }
     
     //print_r($arr_data);
   // die;


    for ($x = 3; $x <= $row;  $x++)
    {
      
      $emp_code= $arr_data[$x]['A'];

      $email = $arr_data[$x]['B'];
      $password = base64_encode($arr_data[$x]['A']);
      $name = $arr_data[$x]['C'];
     // $institute_id = $this->session->inst;
      //$department_id = $this->session->dept;
   

      


      $data_user = 

      array(

        'emp_code'=> $emp_code, 
        'email'=> $email,
        'password'=>  $password,
        'name'=>$name, 
        //'institute_id'=> $institute_id,
        
       // 'department_id' => $department_id
       // 'set_profile' => $set_profile,
        //'is_active' => $is_active
           );
     $this->load->model('excel_data_insert_model');
     $this->excel_data_insert_model->add_emp_user($data_user);
     }

  
    redirect('Upload_data/emp_data');

   }

}



?>