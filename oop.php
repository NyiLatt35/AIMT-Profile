<?php
class User{
    public function hello(){
        return "Hello <br/>";
    }
}

$user1=new User();
echo $user1->hello();

$user2=new User();
echo $user2->hello();

class Person{
    public $name;
    public function sayHi(){
        return $this->name." says Hi <br/>";
    }
}

$person1=new Person();
$person1->name="Alice";
echo $person1->sayHi();

class People{
    public function __construct($name,$email){
        $this->name=$name;
        $this->email=$email;
    }
    public function sayAbout(){
        return "I am ".$this->name." and email is ".$this->email;
    }
}

$people1=new People("Baby","baby@gmail.com");
echo $people1->sayAbout();
echo "<br/>";

class Student extends People{
    public function sayName(){
        return "$this->name $this->email<br/>";
    }
}
$student1=new Student("Sam","sam@gmail.com");
echo $student1->sayName();
echo $student1->sayAbout();
