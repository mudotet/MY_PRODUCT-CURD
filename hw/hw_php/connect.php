<?php
    class Connect{
        public static function getUserName(){
            return "root";
        }
        public static function getPassword(){
            return "";
        }
        public static function getPort(){
            return "3306";
        }
        public static function getDbName(){
            return "users_adding";
        }
        public static function getHost(){
            return "localhost";
        }

    }
?>