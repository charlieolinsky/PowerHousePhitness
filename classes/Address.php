<?php 
class Address {
//properties
private $houseNum;
private $streetName;
private $city;
private $state;
private $zipCode;
private $country;
// constructor
function __construct($hn,$sn,$ci,$st,$zc,$co){
    $this->houseNum = $hn;
    $this->streetName = $sn;
    $this->city = $ci;
    $this->state = $st;
    $this->zipCode = $zc;
    $this->country = $co;
// methods
}
function getHouseNum() {
    return $this->houseNum;
}
function getStreetName() {
    return $this->streetName;
}
function getCity() {
    return $this->city;
}
function getState() {
    return $this->state;
}
function getZipCode() {
    return $this->state;   
}
function getCountry() {
    return $this->country;
}
function setHouseNum($hn) {
    $this->houseNum = $hn;
}
function setStreetName($sn) {
    $this->streetName = $sn;
}
function setCity($ci) {
    $this->city = $ci;
}
function setState($st) {
    $this->state = $st;
}
function setZipCode($zc) {
    $this->zipCode = $zc;
}
function setCountry($co) {
    $this->country = $co;
}
function fullAddress(){
    return "$this->houseNum $this->streetName , $this->city, $this->state, $this->country";
}
}
?>