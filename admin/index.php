<?php

    require_once("../resources/config.php");
    require_once("../resources/classes/database.class.php");
    require_once("../resources/classes/beer.class.php");

    require_once("../resources/templates/admin/header.php");
        
    $database = new Database();
    $db = $database->getConnection();

    $beers = new Beer($db);

    $stmt = $beers->fetchAll();
    $num = $stmt->rowCount();

    echo "<div class='right-button-margin'>";
    echo "<a href='suppliers.php' class='btn btn-primary float-left'><i class='fas fa-warehouse'></i> Suppliers</a>";
    echo "<a href='create_beer.php' class='btn btn-dark float-right'> <i class='fas fa-beer'></i> Create Beer</a>";
    echo "</div>";

    if($num>0){
    
        echo "<table class='table table-hover table-bordered'>";
            echo "<tr>";
                echo "<th>Product</th>";
                echo "<th>Price</th>";
                echo "<th>Description</th>";
                echo "<th>In Stock?</th>";
                echo "<th>Actions</th>";
            echo "</tr>";
    
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    
                extract($row);
                
                $liveStatusBadge = $liveStatus ? "<span class='badge badge-success'>Yes</span>" : "<span class='badge badge-danger'>No</span>";

                echo "<tr>";
                    echo "<td>{$name}</td>";
                    echo "<td>£{$salePrice}</td>";
                    echo "<td>{$description}</td>";
                    echo "<td>{$liveStatusBadge}</td>";
                    echo "</td>";
    
                    echo "<td>";
                        echo "<a href='edit_beer.php?id={$id}' class='btn btn-light'>Edit</a>";
                    echo "</td>";
    
                echo "</tr>";
    
            }
    
        echo "</table>";
    }
    else
    {
        echo "<div class='alert alert-info'>No products found.</div>";
    }

    // footer
    require_once("../resources/templates/admin/footer.php");



?>