<!-- <!doctype html>
<html>
  <head>
   <title>Codeigniter - Upload Multiple Files and Images Example - ItSolutionStuff.com</title>
  </head>
<body>
  
    <strong><?php if(isset($totalFiles)) echo "Successfully uploaded ".count($totalFiles)." files"; ?></strong>
       
    <form method='post' action='/image-upload/post' enctype='multipart/form-data'>
   
      <input type='file' name='files[]' multiple=""> <br/><br/>
      <input type='submit' value='Upload' name='upload' />
   
    </form>
   
</body>
</html> -->

<?php
  
class imageUpload extends CI_Controller {
   
   /**
    * Manage __construct
    *
    * @return Response
   */
   public function __construct() { 
      parent::__construct(); 
      $this->load->helper('url'); 
   }
  
   /**
    * Manage index
    *
    * @return Response
   */
   public function index() { 
      $this->load->view('imageUploadForm'); 
   } 
    
   /**
    * Manage uploadImage
    *
    * @return Response
   */
   public function uploadImage() { 
   
      $data = [];
   
      $count = count($_FILES['files']['name']);
    
      for($i=0;$i<$count;$i++){
    
        if(!empty($_FILES['files']['name'][$i])){
    
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
  
          $config['upload_path'] = 'uploads/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000';
          $config['file_name'] = $_FILES['files']['name'][$i];
   
          $this->load->library('upload',$config); 
    
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
   
            $data['totalFiles'][] = $filename;
          }
        }
   
      }
   
      $this->load->view('imageUploadForm', $data); 
   }
  
} 
?>