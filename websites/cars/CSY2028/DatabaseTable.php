<?php
namespace CSY2028;
class DatabaseTable {
	private $pdo;
	private $table;
	private $primaryKey;

	/*Unless commented all functions are taken from the JokeSite Provided by Dr Tom Butler in his lectures */
	/*Self created functions are findallDESC which is used on the news page ,
	the unused paginaton function which was going to be used to improve site readability,
	and the lastinsertID function which is used when uploading images on the site  */

	public function __construct($pdo, $table, $primaryKey) {
		$this->pdo = $pdo;
		$this->table = $table;
		$this->primaryKey = $primaryKey;
	}
    public function delete($id) {
		$stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :id');
		$criteria = [
			'id' => $id
		];
		$stmt->execute($criteria);
	}

    public function insert($record) {
        $keys = array_keys($record);

        $values = implode(',', $keys);
        $valuesWithColon = implode(',:', $keys);

        $query = 'INSERT INTO ' . $this->table . '('.$values.') VALUES (:'.$valuesWithColon.')';

        $stmt = $this->pdo->prepare($query);

        $stmt->execute($record);
	}

	public function find($field, $value) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');

		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);

		return $stmt->fetchAll();
	}

	/*Created a new function, this finds all the records from a table like the original find all function below,
	returns all the results in descending order, used in the news articles to make the latest article on top */
	public function findAllDESC($order) {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' ORDER BY '. $order . ' DESC');

		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function findAll() {
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);

		$stmt->execute();

		return $stmt->fetchAll();
	}


	public function save($record) {
		try {
			$this->insert($record);
		}
		catch (\Exception $e) {
			$this->update($record);
		}
	}

	public function update($record) {

	         $query = 'UPDATE ' . $this->table . ' SET ';

	         $parameters = [];
	         foreach ($record as $key => $value) {
	                $parameters[] = $key . '= :' .$key;
	         	}

	         $query .= implode(',', $parameters);
	         $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';

	         $record['primaryKey'] = $record[$this->primaryKey];

	         $stmt = $this->pdo->prepare($query);

	         $stmt->execute($record);
	}

	/*Currently unused function that is used to start a generic function for page numbers to make site easier to use */
	public function pagination() {
		$recordsOnPage = 5; 
		$totalRecords = $this->pdo->prepare('SELECT COUNT(*) FROM ' . $this->table);
		$totalRecords->execute();
		$numberOfPage = CEIL($totalRecords / $recordsOnPage);

		if (!isset ($_GET['page']) ) {  
			$page = 1;  
		} else {  
			$page = $_GET['page'];  
		}  

		$limit = ($page-1) * $recordsOnPage; 
		
		$stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' ORDER BY id ' . 'LIMIT '. $limit . ',' . $recordsOnPage);
		$stmt->execute();

		for($page = 1; $page<= $numberOfPage; $page++) {  
			echo '<a href = "index2.php?page=' . $page . '">' . $page . ' </a>';  
		}
	}

	//used for image return
	public function lastInsertId() {
        return $this->pdo->lastInsertId();

    }
}

