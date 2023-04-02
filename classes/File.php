<?php 
namespace TechStore\Classes;

class File
{
    private $name, $tmpName, $uploadName;

    public function __construct(array $file)
    {
         $this->name = $file['name'];
         $this->tmpName = $file['tmp_name']; 
    }

    public function rename() //بتاخد اسم الصورة تقص منه الاكستنشن و تحط مكان الاسم اسم جديد مميز
    {
        $ext=pathinfo($this->name,PATHINFO_EXTENSION);
        $randomStr = uniqid();
        $this->uploadName = "$randomStr.$ext";

        return $this;
    }
    public function setName($name) //بتاخد اسم الصورة تقص منه الاكستنشن و تحط مكان الاسم اسم جديد مميز
    {
        $this->uploadName =$name;

        return $this;
    }
    public function upload() // نقل الصورة الي ملف الابلود
    {
        $destination  = PATH."uploads/".$this->uploadName;
        move_uploaded_file($this->tmpName,$destination);

        return $this->uploadName;
    }

}


?>