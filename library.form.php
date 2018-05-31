 <?php 

 	if(isset($_POST['title'],$_POST['category'])){
 		$title = (string)$_POST['title'];
 		$category = (int)$_POST['category'];
 		$libri = new libro();
 		$libri->inserimento_libri($title,$category);
	}
	else{  
    echo "valore non inserito";
	}

 	

	class connessione{
		private $dbname;
		private $user;
		private $pass;
		private $host;
		public $pdo;
		


		public function __construct(){
			$this->host = "localhost";
			$this->user = 'root';
			$this->pass = 'root';
			$this->dbname = 'DB_library';
			
			
		}

		public function getInstance(){

	  try{

          $dsn = "mysql:host=" .$this->host .";dbname=".$this->dbname.";";
                 $opt=[
                 PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                 PDO::ATTR_EMULATE_PREPARES   => false,
          ];
          $pdo = new PDO($dsn, $this->user, $this->pass, $opt);
                echo "connesso";
                return $pdo;
        }
        catch(PDOException $e){
          echo " errore " .$e->getMessage();
            }
       	}
       }

       	class libro extends connessione{
	       	private $titolo;
	       	private $category;
	       	public $pdo; 

	  
	  		public function inserimento_libri($title, $category){
	  			$this->titolo = $title;
	  			$this->category = $category;
	  			$this->pdo = $this->getInstance();
	  			try{
	  				$insert = "INSERT INTO books(title, category) VALUES ('". $this->titolo . "'," . $this->category . ")";
	  				echo $insert;
	  				//$this->pdo = $this->getInstance();
	  				$tth = $this->pdo->prepare($insert);
	  				return $tth->execute();
					}
				catch(PDOException $e){
					#echo "error" .$this->pdo->getMessage();

					}
				
			}

	  	}


?>

</body>
</html>