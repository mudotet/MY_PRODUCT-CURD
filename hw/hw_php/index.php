<?php
    require_once("news.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index News</title>
    <link rel="stylesheet" href="../hw_css/index.css">
</head>
<body>
    <nav>
        <ul>
            <li>Du lịch</li>
            <li>Điểm đến</li>
            <li>Ẩm thực</li>
            <li>Dấu Chân</li>
            <li>Tư vấn</li>
            <li>Cẩm nang</li>
            <li>Ảnh</li>
        </ul>
    </nav>
    <img src=".\images\5g.jpg" alt="">
    <div class="container">
        <div class="section-1">
            
            <?php
                $news = News::getNews(1);
                foreach($news as $new){
                    echo "<img src='../images/" . $new['img'] . "' alt='News Image'>";
                    echo "<h1>" . $new['news_title'] . "</h1>"; 
                    echo "<p>" . $new['news_description'] . "</p>";
                }
            ?>
        </div>
        <div class="section-2">
            <?php
            for($i = 2; $i <= 3; $i++){
                $news = News::getNews($i);
                foreach($news as $new){
                    echo "<img src='../images/" . $new['img'] . "' alt='News Image'>";
                    echo "<h1>" . $new['news_title'] . "</h1>"; 
                    echo "<p>" . $new['news_description'] . "</p>";
                }
            }
            ?>
        </div>
        <div class="section-3">
            <?php
            for($i = 4; $i <= 7; $i++){
                $news = News::getNews($i);
                foreach($news as $new){
                    echo "<div class='news-item-section-3'>";
                    echo "<div>". "<h1>" . $new['news_title'] . "</h1>" ."</div>"; 
                    echo "<img src='../images/" . $new['img'] . "' alt='News Image'>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>