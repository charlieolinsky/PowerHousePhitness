<?php

class User {
//properties
private Name $name;
private $id;
private Address $address; // mailing address 
private $email;
private $phoneNumber;
private $password; //username will be email
//constructor
function __User($n,$id,$add,$em,$pn,$pass){
    $this->name = $n;
    $this->id = $id;
    $this->address = $add;
    $this->email = $em;
    $this->phoneNumber = $pn;
    $this->password = $pass;
}
//methods
function createUser()
{
    // ? constructor?
}
function editUser()
{
    // ? setters?
}
function removeUser()
{
    // ? remove from DB
}
//getters and setters
function getName()
{
    return $this->name;
}
function getId()
{
    return  $this->id;
}
function getAddress()
{
    return $this->getAddress;
}
function getEmail()
{
    return $this->email;
}
function getPhoneNumber()
{   return $this->phoneNumber;

}
function getPassword()
{   return $this->password;

}
function setName($n)
{
    $this->name = $n;
}
function setId($id)
{
    $this->id = $id;
}
function setAddress($add)
{
    $this->address = $add;
}
function setEmail($em)
{
    $this->email = $em;
}
function setPhoneNumber($pn)
{
    $this->phoneNumber = $pn;
}
function setPassword($pass)
{   $this->password = $pass;

}
function userDetails()
{
    return "Name: $this->name\n ID: $this->id\n Address: $this->address\n Email: $this->email\n Phone Number: $this->phoneNumber\n";
}
}

?>