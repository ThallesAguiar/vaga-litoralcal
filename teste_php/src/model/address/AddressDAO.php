<?php

class AddressDAO
{

    public function store(AddressVO $addressVO, $db)
    {

        $street = $addressVO->getStreet();
        $number = $addressVO->getNumber();
        $district = $addressVO->getDistrict();
        $city = $addressVO->getCity();
        $state = $addressVO->getState();
        $country = $addressVO->getCountry();

        $sql = "INSERT INTO addresses (CITY, STATE, COUNTRY, STREET, NUMBER, DISTRICT) VALUES ('$city','$state','$country','$street', '$number','$district')";

        // Executa uma consulta no banco de dados
        mysqli_query($db, $sql);

        // mysqli_insert_id vai me retornar o ultimo id criado, e vai salver no objeto address
        $addressVO->setId_address(mysqli_insert_id($db));

        return $addressVO;
    }

    function update(AddressVO $addressVO, $db)
    {

        $id = $addressVO->getId_address();
        $street = $addressVO->getStreet();
        $number = $addressVO->getNumber();
        $district = $addressVO->getDistrict();
        $city = $addressVO->getCity();
        $state = $addressVO->getState();
        $country = $addressVO->getCountry();

        // $query = "UPDATE `addresses` SET (CITY, STATE, COUNTRY, STREET, NUMBER, DISTRICT) VALUES ('$city','$state','$country','$street', '$number','$district') WHERE `addresses`.`id_address` = $id";
        $query = "UPDATE `addresses` SET `city`='$city',`state`='$state',`country`='$country',`street`='$street',`number`='$number',`district`='$district' WHERE `id_address` =$id";
        var_dump($query);

        //retornar link e query
        return mysqli_query($db, $query);
    }
}
