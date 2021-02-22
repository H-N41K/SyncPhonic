<?php
	class Song {
		private $con;
		private $id;
		private $mysqliData;
		private $title;
		private $artistId;
		private $albumId;
		private $genre;
		private $duration;
		private $path;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query= mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
			$this->mysqliData = mysqli_fetch_array($query);
			$this->title = $this->mysqliData['title'];
			$this->artistId = $this->mysqliData['artist'];
			$this->artistId_2 = $this->mysqliData['artist2'];
			$this->artistId_3 = $this->mysqliData['artist3'];
			$this->artistId_4 = $this->mysqliData['artist4'];
			$this->albumId = $this->mysqliData['album'];
			$this->genre = $this->mysqliData['genre'];
			$this->duration = $this->mysqliData['duration'];
			$this->path = $this->mysqliData['path'];
		}

		public function getId(){
			return $this->id;
		}

		public function getTitle(){
			return $this->title;
		}

		public function getArtist(){
			return new Artist($this->con, $this->artistId);
		}

		public function getArtist_2(){
			return new Artist($this->con, $this->artistId_2);
		}

		public function getArtist_3(){
			return new Artist($this->con, $this->artistId_3);
		}

		public function getArtist_4(){
			return new Artist($this->con, $this->artistId_4);
		}

		public function getAlbum(){
			return new Artist($this->con, $this->albumId);
		}

		public function getAlbumId(){
			return $this->albumId;
		}

		public function getPath(){
			return $this->path;
		}

		public function getDuration(){
			return $this->duration;
		}

		public function getGenre(){
			return $this->genre;
		}

		public function getMysqliData(){
			return $this->mysqliData;
		}

	}	
		
?>