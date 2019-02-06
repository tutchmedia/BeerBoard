<?php

    require_once(realpath(dirname(__DIR__) . "/resources/config.php"));
    require_once(realpath(dirname(__DIR__) . "/resources/classes/database.class.php"));
    require_once(realpath(dirname(__DIR__) . "/resources/classes/beer.class.php"));

    require_once(realpath(dirname(__DIR__) . "/resources/templates/admin/header.php"));
    
    $database = new Database();
    $db = $database->getConnection();

    $beer = new Beer($db);

    if($_POST)
    {
        $beer->name = $_POST['name'];
        $beer->salePrice = $_POST['salePrice'];
        $beer->description = $_POST['description'];
        $beer->alcoholPercentage = $_POST['alcoholPercentage'];
        $beer->costPrice = $_POST['costPrice'];
        $beer->inStock = $_POST['inStock'];
    
        if($beer->createBeer()){
            echo "<div class='alert alert-success'>Beer was created.</div>";
        }
    
        else{
            echo "<div class='alert alert-danger'>Unable to create beer.</div>";
        }
    }
?>
<div class='right-button-margin'>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Beer</li>
        </ol>
    </nav>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' required/></td>
        </tr>
 
        <tr>
            <td>Sale Price</td>
            <td><input type='text' name='salePrice' class='form-control' required/></td>
        </tr>

        <tr>
            <td>Cost Price</td>
            <td><input type='text' name='costPrice' class='form-control' value="0"/></td>
        </tr>
 
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>

        <tr>
            <td>Alcohol Percentage</td>
            <td><input type='text' name='alcoholPercentage' class='form-control' required/></td>
        </tr>

        <tr>
            <td>In Stock</td>
            <td><input type='checkbox' name='inStock' class='form-control' checked/></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
</form>

<?php
    require_once(realpath(dirname(__DIR__) . "/resources/templates/admin/footer.php"));
?>