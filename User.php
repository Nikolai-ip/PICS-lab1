<?php
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
class User
{
    private $id;
    private $email;
    private $password;
    private $name;
    private $date_of_initialization;
    public function get_date_of_init(){
        return $this->date_of_initialization;
    }
    public function get_name(){
        return $this->name;
    }
    
    public function __construct($id,$name, $email,$password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->date_of_initialization = date("Y-m-d H:i:s");
        $validator = Validation::createValidator();
        $violations = [];
        $violations[] = $validator->validate($this->id, [
            new NotBlank(),
            new Type(['type' => 'numeric'])
        ]);
        $violations[] = $validator->validate($this->email, [
            new NotBlank(),
            new Length(['min'=>3]), new NotBlank()
        ]);
        $violations[] = $validator->validate($this->password, [
            new NotBlank(),
            new Length(['min'=>10])
        ]);
        $violations[] = $validator->validate($this->name, [
            new NotBlank(),
            new Type(['type' => 'string'])
        ]);
        if (count($violations) > 0) { 
            foreach ($violations as $violation) { 
                foreach($violation as $viol){
                    echo $viol->getMessage()."\n";}
            }
        }
    }

}
?>