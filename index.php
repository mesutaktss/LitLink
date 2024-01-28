<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookshelf";
$conn = new mysqli($servername, $username, $password, $dbname);
$bookQuery = $conn->query("SELECT id, name, yazar, category, info, img, pdf FROM book");
$categoryQuery = $conn->query("SELECT id, name, img FROM category");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitaplık</title>
    <link href='https://fonts.googleapis.com/css?family=KoHo' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="categories">
        <input class="search" type="text">
        <?php
            while ($category = $categoryQuery->fetch_array()) {
            echo '<div class="category"><img src='.$category["img"].'"" alt="'.$category["name"].'" class="categoryImage"><p draggable="true" for="" class="categoryName">'.$category["name"].'</p></div>';
        }
        ?>
    </div>
    <h1 draggable="true" class="title">Kitaplar</h1>
    <div class="books">
        <?php
        while ($book = $bookQuery->fetch_array()) {
            echo '<div  class="book"><a href="pdf/'.$book["pdf"].'"><span class=""link></span></a><img src="'.$book["img"].'" alt="'.$book["name"].'" class="bookImage"><br><p draggable="true" class="bookName">'.$book["name"].'</p></div>';
        }
    echo "</div></body></html>"; ?>