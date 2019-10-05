<?php

namespace FR_MO\LIB;

class FileUpload
{
    private $image_name;
    private $type;
    private $image_size;
    private $image_error;
    private $image_tmp;
    private $image_exe;
    public  $new_name;

    private $fileExtention;

    private $allowd = ['jpg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls', 'jpeg'];

   public function __construct(array $file)
   {
    //var_dump($file);
   	$this->image_name = $file['name'];
   	$this->type = $file['type'];
   	$this->image_size = $file['size'];
   	$this->image_error = $file['error'];
   	$this->image_tmp = $file['tmp_name'];
   }

    public function upload()
    {
     $this->image_exe = explode('.', $this->image_name);
     $this->image_exe = strtolower(end($this->image_exe));
   if (in_array($this->image_exe, $this->allowd)) {
   if ($this->image_error === 0) {
       if ($this->image_size <= 3000000) {
          $this->new_name = uniqid('av', false) . '.' . $this->image_exe;

          if(preg_match("/image/i" , $this->type)){     
           $image_db = IMAGE_UPLODE_STORAGE . DS . $this->new_name;
           }else{
           $image_db = DEMC_UPLODE_STORAGE . DS . $this->new_name;
           }

           if (move_uploaded_file($this->image_tmp , $image_db)) {
                return $this;
             }
               } else {
                   echo '<div class="alert alert-danger" role="alert"> حدث خطأ عند رفع الصورة </div>';
               }
               } else {
                   echo '<div class="alert alert-danger" role="alert"> حجم الصورة كبير </div>';
               }
           } else {
               echo '<div class="alert alert-danger" role="alert"> حدث خطأ اثنا رفع الصورة </div>';
           }
    }


}
  
