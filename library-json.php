<?php 

	  try{

          $dsn = "mysql:host=localhost;dbname=DB_library";
          $opt=[
                 PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                 PDO::ATTR_EMULATE_PREPARES   => false,
          ];
          $pdo = new PDO($dsn, 'root', 'root', $opt);
                echo "connesso";
                return $pdo;
        }
        $select="SELECT * FROM books";
        $stmt=$pdo->query($select);
        if ($result=$stmt->execute()) {
        	while ($row=$result->fetchAssoc()) {
        		$row['created at']= data("d/m/Y H:i:s", strtotime($row['created at']));
        		echo json_encode($row);
        	}
        }

        }
        catch(PDOException $e){
          die("errore " .$e->getMessage());
            }
       	}
       }









 ?>