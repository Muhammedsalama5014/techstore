<?php 
namespace TechStore\Classes\Validation;


class Validator 
{
    private $errors = [];
    public function validate(string $name , $value, array $rules)
    {
        
        foreach($rules as $rule){
            $className = "TechStore\\Classes\\Validation\\" . $rule;
            $obj = new $className;
            /*
            if($rule == 'required'){
                $obj = new Required;
            }elseif($rule == 'Str'){
                $obj = new Str;
            }elseif($rule == 'numeric'){
                $obj = new Numeric;
            }elseif($rule == 'email'){
                $obj = new Email;
            }elseif($rule == 'max'){
                $obj = new Max;
            }*/


            $error = $obj->check($name,$value);
                if($error != false){
                    $this->errors[] = $error;
                    break;
                }
            
        }
    }

    public function getErrors(){
        return $this->errors;
    }

    public function hasErrors(){

        return ! empty($this->errors);
        /*
       if(empty($this->errors)){
        return false ;
       }else{
        return true;
       }*/
    }

}

?>