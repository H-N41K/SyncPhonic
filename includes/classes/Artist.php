<?php
	class Artist {
		private $con;
		private $id;
		

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

		}
			
		public function getId() {
			return $this->id;
		}

		public function getName() {
			if ($this->id == 0){
				return 'NULL';
			}
			$artistQuery = mysqli_query($this->con, "SELECT name FROM artists WHERE id='$this->id'");
			$artist = mysqli_fetch_array($artistQuery);
			return $artist['name'];
		}

		public function getDescription() {
			$artistQuery = mysqli_query($this->con, "SELECT description FROM artists WHERE id='$this->id'");
			$artist = mysqli_fetch_array($artistQuery);
			return $artist['description'];
		}

		public function getImageUrl() {
			$artistQuery = mysqli_query($this->con, "SELECT imageUrl FROM artists WHERE id='$this->id'");
			$artist = mysqli_fetch_array($artistQuery);
			return $artist['imageUrl'];
		}

		public function getSongIds() {
			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE artist = '$this->id' OR artist2 = '$this->id' OR artist3 = '$this->id' OR artist4 = '$this->id' ORDER BY plays DESC");
			$array = array();
			while($row = mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}
			return $array;
		}

	}	
		
?>