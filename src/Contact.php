<?php
    class Contact
    {
//properties here
        private $name;
        private $phone;
        private $address;
//constructor here
        function __construct($name, $phone, $address)
        {
            $this->name = $name;
            $this->phone = $phone;
            $this->address = $address;
        }
//setters & getters here
//name
        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }
        function getName()
        {
            return $this->name;
        }
//phone
        function setPhone($new_phone)
        {
            $this->phone = (integer) $new_phone;
        }
        function getPhone()
        {
            return $this->phone;
        }
//address
        function setAddress($new_address)
        {
            $this->address = (string) $new_address;
        }
        function getAddress()
        {
            return $this->address;
        }
//save function
        function save()
        {
            array_push($_SESSION['list_of_contacts'], $this);
        }
//getAll function
        static function getAll()
        {
            return $_SESSION['list_of_contacts'];
        }
//deleteAll function
        static function deleteAll()
        {
            $_SESSION['list_of_contacts'] = array();
        }

    }
 ?>
