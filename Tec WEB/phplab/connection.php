<?php

namespace DB;
class DBAccess{
    private const DB_HOST = "localhost";
    private const DB_NAME = "ssanson";
    private const USERNAME = "ssanson";
    private const PASSWORD = "aci0eSausoo2shov";
    
    private $connection;

    public function openDBConnection(){
        mysqli_report(MYSQLI_REPORT_ERROR);

        $this->connection = mysqli_connect(DBAccess::DB_HOST, DBAccess::USERNAME, DBAccess::PASSWORD, DBAccess::DB_NAME);

        return mysqli_connect_errno() ? false : true;
    }

    public function getList(){
        $query = "SELECT * FROM 'giocatori' ORDER BY 'ID' ASC";
        
        $queryResult = mysqli_query($this->connection, $query) or die("Errore in openDBConnection: " . mysqli_error($this->connection));
        
        if (mysqli_num_rows($queryResult) > 0) {   
            $result = array();
            while($row = mysqli_fetch_assoc($queryResult)) {
                array_push($result, $row);
            }
            $queryResult->free();
            return $result;
        } else
            return null;
    }

    public function closeDBConnection(){
        mysqli_close($this->connection);
    }
}

?>
