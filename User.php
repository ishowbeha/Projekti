<?php


class User {

    private $id;
    private $name;
    private $surname;
    private $email;
    private $gender;
    private $day;
    private $month;
    private $year;
    private $password;
    private $role;

    function __construct($id, $name, $surname, $email, $gender, $day, $month, $year,  $password, $role) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->gender = $gender;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->password = $password;
        $this->role = $role;
    }

 
    function getId() {
        return $this->id;
    }

  
    function getName() {
        return $this->name;
    }

   
    function getSurname() {
        return $this->surname;
    }

  
    function getEmail() {
        return $this->email;
    }

   
 
    function getPassword() {
        return $this->password;
    }

    function getGender() { return $this->gender; }
    function getDay() { return $this->day; }
    function getMonth() { return $this->month; }
    function getYear() { return $this->year; }
    function getRole() { return $this->role; }
}

?>
