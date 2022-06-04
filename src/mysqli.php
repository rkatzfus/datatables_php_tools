<?php
namespace Autoloading;
class MySqli
{
    function __construct()
    {
        echo "Hello world! ";
        $this->username = get_current_user();
        $host = 'db';
        $user = 'MYSQL_USER';
        $pass = 'MYSQL_PASSWORD';
        $this->mysqli_conn = new mysqli($host, $user, $pass);
        if ($this->mysqli_conn->connect_error) {
            echo("Connection failed: " . $this->mysqli_conn->connect_error);
            $this->mysqli_conn = false;
            die();
        } 
    }
    function __destruct() {
        $this->mysqli_conn -> close();
    }
    public function sql2array( // exec_sql
        $sql = ""
    ) {
        if ($this->mysqli_conn != false) {
            foreach ($this->mysqli_conn -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $value) {
                $result[] = $value;
            }
            return $result;
        }
    }
    public function sql2array_pk( // exec_sql
        $sql = ""
        , $pk = ""
    ) {
        if ($this->mysqli_conn != false) {
            foreach ($this->mysqli_conn -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $value) {
                $result[$value[$pk]] = $value;
            }
            return $result;
        }
    }
}
?>