<?php

    require_once(realpath(dirname(__DIR__) . "/resources/config.php"));
    require_once(realpath(dirname(__DIR__) . "/resources/classes/database.class.php"));
    require_once(realpath(dirname(__DIR__) . "/resources/classes/beer.class.php"));

    require_once(realpath(dirname(__DIR__) . "/resources/templates/admin/header.php"));
    
    $beerId = isset($_GET['id']) ? $_GET['id'] : die('No id was found.');

    $database = new Database();
    $db = $database->getConnection();

    $beer = new Beer($db);
    $beer->id = $beerId;

    $beer->readBeer();

    if($_POST){
    
        $beer->name = $_POST['name'];
        $beer->salePrice = $_POST['salePrice'];
        $beer->description = $_POST['description'];
        $beer->inStock = $_POST['inStock'];
        $beer->costPrice = $_POST['costPrice'];
        $beer->alcoholPercentage = $_POST['alcoholPercentage'];
    
        if($beer->updateBeer())
        {
            echo "<div class='alert alert-success'>Beer was updated.</div>";
        }
        else
        {
            echo "<div class='alert alert-danger'>Unable to update beer.</div>";
        }
    }
?>
<div class='right-button-margin'>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/edit_beer.php?id=<?php echo $beerId; ?>">Edit Beer</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $beer->name; ?></li>
        </ol>
    </nav>
</div>
 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]. "?id={$beerId}");?>" method="post">
 
    <table class='table table-hover table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' value='<?php echo $beer->name; ?>'/></td>
        </tr>
 
        <tr>
            <td>Sale Price</td>
            <td><input type='text' name='salePrice' class='form-control' value='<?php echo $beer->salePrice; ?>'/></td>
        </tr>

        <tr>
            <td>Cost Price</td>
            <td><input type='text' name='costPrice' class='form-control' value='<?php echo $beer->costPrice; ?>'/></td>
        </tr>
 
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control'><?php echo $beer->description; ?></textarea></td>
        </tr>

        <tr>
            <td>Alcohol Percentage</td>
            <td><input type='text' name='alcoholPercentage' class='form-control' value='<?php echo $beer->alcoholPercentage; ?>'/></td>
        </tr>

        <tr>
            <td>In Stock</td>
            <td><input type='checkbox' name='inStock' class='form-control' <?php if($beer->inStock) { echo "checked"; }; ?> /></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>

<?php
    require_once(realpath(dirname(__DIR__) . "/resources/templates/admin/footer.php"));
?>