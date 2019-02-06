<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title><?php echo $config['pubTitle'] . " | Admin"; ?></title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Josefin+Sans" rel="stylesheet">
  
    <!-- our custom CSS -->
    <link rel="stylesheet" href="/resources/css/menu.css" />
  
</head>
<body>
    
<div class="container">

    <?php 
        if($config['menu']['showHeader'])
        {
            echo "<div class='pubLogo'>{$config['pubTitle']}</div>";
            echo "<div class='pubDescription'>{$config['pubDescription']}</div>";
        } 
    ?>