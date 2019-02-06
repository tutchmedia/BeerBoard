<?php
    require_once(realpath(dirname(__FILE__) . "/resources/config.php"));
    require_once(realpath(dirname(__FILE__) . "/resources/classes/database.class.php"));
    require_once(realpath(dirname(__FILE__) . "/resources/classes/beer.class.php"));

    require_once(realpath(dirname(__FILE__) . "/resources/templates/frontend/header.php"));
        
    $database = new Database();
    $db = $database->getConnection();

    $beers = new Beer($db);

    $stmt = $beers->fetchAll();
    $totalBeers = $stmt->rowCount();

    if($totalBeers > 0)
    {
        echo "<div class='container'>";

            $listRowId = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                extract($row);

                $stockAvailable = $liveStatus ? "" : "oos";

                echo "<div class='row beerListItem $stockAvailable'>";
                echo "<div class='col col-1 beerRowId'>$listRowId</div>";
                echo "<div class='col col-8 beerName'>{$name}</div>";
                echo "<div class='col col-2 beerAlcohol'>{$alcoholPercentage} %</div>"; 
                echo "<div class='col col-1 beerPrice'>£{$salePrice}</div>"; 
                echo "</div>";
                
                $listRowId++;
            }
    
        echo "</div>";
    }
    else
    {
        echo "<div class='alert alert-info'>No products found.</div>";
    }

    require_once(realpath(dirname(__FILE__) . "/resources/templates/frontend/footer.php"));
?>