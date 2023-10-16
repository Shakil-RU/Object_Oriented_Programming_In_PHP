<?php
class Customer {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;

    public function __construct(int $id = 0, string $firstName = "", string $lastName = "", string $email = "") {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

      //Getter methods
      public function getId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getEmail(){
        return $this->email;
    }

   // magic getter method
    public function __get($property) {
        if (isset($this->$property)) {
            return $this->$property;
        } else {
            echo "{$property} not found";
        }
    }


   // Setter methods
   public function setId($id){
    $this->id = $id;
}

public function setFirstName($firstName){
    $this->firstName = $firstName;
}

public function setLastName($lastName){
    $this->lastName = $lastName;
}

public function setEmail($email){
    $this->email = $email;
}

    // magic setter method
    public function __set($property, $value) {
        if (isset($this->$property)) {
            $this->$property = $value;
        } else {
            echo "{$property} not found";
        }
    }
   // magic call method
    public function __call($method, $arguments) {
        if (strpos($method, 'set') === 0 && strlen($method) > 3) {
            $property = strtolower(substr($method, 3));
            if (property_exists($this, $property)) {
                $this->$property = $arguments[0];
                echo "'{$property}' set to '{$arguments[0]}'.";
                return;
            }
        }
        else if(strpos($method, 'get') === 0 && strlen($method) > 3) {
            $property = strtolower(substr($method, 3));
            if(isset($this->$property)) {
                return $this->$property;
            }
            else if(strtolower($property) === "name" || strtolower($property) === "author") {
                return "Name: {$this->firstName} {$this->lastName}";
            }
        }
        echo "<b><i>'{$method}' method does not exist.</i></b><br>";
    }
   // magic string method.
    public function __toString(): string {
        return "<b>Name: {$this->firstName} {$this->lastName}</b><br><b>ID: {$this->id}</b><br><b>Email: {$this->email}</b>";
    }
}
?>