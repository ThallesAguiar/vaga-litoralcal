<?php

class AddressVO {

    private $id_address;
    private $city;
    private $state;
    private $country;
    private $street;
    private $number;
    private $district;
    
    
    
    function getId_address() {
        return $this->id_address;
    }

    function getCity() {
        return $this->city;
    }
    function getState() {
        return $this->state;
    }
    function getCountry() {
        return $this->country;
    }
    function getStreet() {
        return $this->street;
    }

    function getNumber() {
        return $this->number;
    }

    function getDistrict() {
        return $this->district;
    }

    function setId_address($id_address) {
        $this->id_address = $id_address;
    }

    function setCity($city) {
        $this->city = $city;
    }
    function setState($state) {
        $this->state = $state;
    }
    function setCountry($country) {
        $this->country = $country;
    }
    function setStreet($street) {
        $this->street = $street;
    }

    function setNumber($number) {
        $this->number = $number;
    }

    function setDistrict($district) {
        $this->district = $district;
    }
}