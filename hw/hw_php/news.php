<?php
    require_once("Connect.php");
    class News{ 
        public $news_id;
        public $news_title;
        public $news_description;
        public $img;

        function __construct($news_title, $news_description, $img){
            $this->news_title = $news_title;
            $this->news_description = $news_description;
            $this->img = $img;
        }

        public static function getNews($news_id) {
            $pdo = new PDO("mysql:host=" . Connect::getHost() . 
                ";port=" . Connect::getPort() . ";dbname=" . Connect::getDbName() . ";charset=utf8", Connect::getUserName(), Connect::getPassword());
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM `news` WHERE `news_id` = $news_id;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

?>