<?php

/**
 * @param string $dbName   - Database name
 * @param string $tableName   - Table name
 */
class Entity
{
	private $dbName, $tableName;

	public function __construct($dbName, $tableName)
	{
		$this->dbName = $dbName;
		$this->tableName = $tableName;
	}

	public function getCars() {
		$conn = new mysqli("localhost", "user", "pass", $this->dbName);
		$sql = 'SELECT id,carName FROM '.$this->tableName;
		$result=mysqli_query($conn,$sql);
		return $result;
	}

	public function getBikes() {
		$conn = new mysqli("localhost", "user", "pass", $this->dbName);
		$sql = 'SELECT id,bikeName FROM '.$this->tableName;
		$result=mysqli_query($conn,$sql);
		return $result;	
	}

	public function getBoats() {
		$conn = new mysqli("localhost", "user", "pass", $this->dbName);
		$sql = 'SELECT id,boatName FROM '.$this->tableName;
		$result=mysqli_query($conn,$sql);
		return $result;
	}
}

class EntityFactory 
{
	public static function create($dbName, $tableName){
		return new Entity($dbName, $tableName);
	}
}

$carData = EntityFactory::create($dbCar,$tableCar);
$bikeData = EntityFactory::create($dbBike,$tableBike);
$boatData = EntityFactory::create($dbBoat,$tableBoat);

$carFetchData = $carData->getCars();
$bikeFetchData = $bikeData->getBikes();
$boatFetchData = $boatData->getBoats();
