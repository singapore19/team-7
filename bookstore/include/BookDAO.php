<?php

class BookDAO {

    public  function retrieveAll() {
        $sql = 'SELECT * FROM books';
        
            
        $connMgr = new ConnectionManager();      
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $result = array();

        while($row = $stmt->fetch()) {
            $result[] = new Book($row['title'], $row['isbn13'], $row['price']);
        }
            
                 
        return $result;
    }
  
    public  function retrieve($isbn13) {
        $sql = 'select title, isbn13, price, availability from books where isbn13=:isbn13';
        $result = array();
        
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        
        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':isbn13', $isbn13, PDO::PARAM_STR);
        $stmt->execute();

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result = new Book($row['title'], $row['isbn13'], $row['price'],
            $row['availability']);
        }
        
        return $result;
    }
  
  
    public function add($book) {
        $sql = 'insert into books (title, isbn13, price) values (:title, :isbn13, :price)';
        
        $connMgr = new ConnectionManager();       
        $conn = $connMgr->getConnection();
         
        $stmt = $conn->prepare($sql); 

        $stmt->bindParam(':title', $book->title, PDO::PARAM_STR);
        $stmt->bindParam(':isbn13', $book->isbn13, PDO::PARAM_STR);
        $stmt->bindParam(':price', $book->price, PDO::PARAM_STR);
        
        $isAddOK = False;
        if ($stmt->execute()) {
            $isAddOK = True;
        }

        return $isAddOK;
    }
    
    public function modify($book) {
        $sql = 'update books set title=:title, price=:price where isbn13=:isbn13';      
        
        $connMgr = new ConnectionManager();           
        $conn = $connMgr->getConnection();
         
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':title', $book->title, PDO::PARAM_STR);
        $stmt->bindParam(':isbn13', $book->isbn13, PDO::PARAM_STR);
        $stmt->bindParam(':price', $book->price, PDO::PARAM_STR);
        
        $stmt->execute();
        
    }
    
        
    public function remove($isbn13) {
        $sql = 'delete from books where isbn13=:isbn13';
        
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':isbn13', $isbn13, PDO::PARAM_STR);
        
        $stmt->execute();
        $count = $stmt->rowCount();
    }
}


?>
