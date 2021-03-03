<?php

class UserVO {

    private $id_user;
    private $name;
    private $age;
    private $phone;
    private $emergency_contact;
    private $id_address;
    private $id_nivel;
    
    
    function getId_user() {
        return $this->id_user;
    }
    function getId_address() {
        return $this->id_address;
    }
    function getId_nivel() {
        return $this->id_nivel;
    }

    function getName() {
        return $this->name;
    }

    function getAge() {
        return $this->age;
    }

    function getPhone() {
        return $this->phone;
    }
    function getEmergency_contact() {
        return $this->emergency_contact;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setId_address($id_address) {
        $this->id_address = $id_address;
    }

    function setId_nivel($id_nivel) {
        $this->id_nivel = $id_nivel;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setEmergency_contact($emergency_contact) {
        $this->emergency_contact = $emergency_contact;
    }
}