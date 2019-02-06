<?php 

/* Beer Class */
class Beer {

    private $conn;
    private $table_name = "beer";

    public $id;
    public $name;
    public $alcoholPercentage;
    public $salePrice;
    public $costPrice;
    public $description;
    public $inStock = true;

    public function __construct($db) {
        $this->conn = $db;
    }

    function createBeer(){
 
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, salePrice=:salePrice, description=:description, createdAt=:createdAt, liveStatus=:liveStatus, costPrice=:costPrice, alcoholPercentage=:alcoholPercentage";
        $stmt = $this->conn->prepare($query);
 
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->salePrice=$this->salePrice;
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->timestamp = date('Y-m-d H:i:s');
        $this->inStock = isset($this->inStock) && $this->inStock == "on" ? 1 : 0;
 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":salePrice", $this->salePrice);
        $stmt->bindParam(":createdAt", $this->timestamp);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":liveStatus", $this->inStock);
        $stmt->bindParam(":costPrice", $this->costPrice);
        $stmt->bindParam(":alcoholPercentage", $this->alcoholPercentage);
 
        if($stmt->execute()){
            return true;
        }else{
            print_r($stmt->errorInfo());
            return false;
        }
    }

    function updateBeer(){
 
        $query = "UPDATE " . $this->table_name . " SET name = :name, salePrice = :salePrice, description = :description, liveStatus = :liveStatus, costPrice = :costPrice, alcoholPercentage = :alcoholPercentage WHERE id = :id";
     
        $stmt = $this->conn->prepare($query);
     
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->salePrice = $this->salePrice;
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->timestamp = date('Y-m-d H:i:s');
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->inStock = isset($this->inStock) && $this->inStock == "on" ? 1 : 0;
     
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":salePrice", $this->salePrice);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":liveStatus", $this->inStock);
        $stmt->bindParam(":costPrice", $this->costPrice);
        $stmt->bindParam(":alcoholPercentage", $this->alcoholPercentage);
        $stmt->bindParam(":id", $this->id);

     
        if($stmt->execute()){
            return true;
        }
        else
        {
            print_r($stmt->errorInfo());
        }
     
        return false;
         
    }

    function fetchAll(){
 
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY name ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }

    function readBeer(){
 
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->salePrice = $row['salePrice'];
        $this->description = $row['description'];
        $this->costPrice = $row['costPrice'];
        $this->alcoholPercentage = $row['alcoholPercentage'];
        $this->inStock = $row['liveStatus'];

    }

}


?>