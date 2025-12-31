<?php
class person {
    var $name;
    public $height;
    protected $social_insurance;
    private $pinn_number;

    // Constructor to initialize the name
    function __construct($persons_name) {
        $this->name = $persons_name;
    }

    // Setter method for name
    function set_name($new_name) {
        $this->name = $new_name;
    }

    // Getter method for name
    function get_name() {
        return $this->name;
    }

    // Private method example (only accessible within this class)
    private function get_pinn_number() {
        return $this->pinn_number;
    }
}

// 'employee' inherits all public/protected methods and properties from 'person'
class employee extends person {
    function __construct($employee_name) {
        $this->set_name($employee_name);
    }
}
?>