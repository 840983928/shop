<?php
//他的一个对象实例就表示admin表的一条记录
 class Admin{
     private $id;
     private $name;
     private $password;
        function getId() {
            return $this->id;
        }

        function getName() {
            return $this->name;
        }

        function getPassword() {
            return $this->password;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setName($name) {
            $this->name = $name;
        }

        function setPassword($password) {
            $this->password = $password;
        }


 }
?>
