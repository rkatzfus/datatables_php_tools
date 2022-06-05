<?php
namespace Autoloading;
class database_tools
{
    function __construct()
    {
        // $this->username = get_current_user();
    }
    function __destruct() {
        // $this->mysqli_conn->close();
    }
    private function get_conn(){
        $host = 'db';
        $user = 'MYSQL_USER';
        $pass = 'MYSQL_PASSWORD';
        $this->mysqli_conn = new \mysqli($host, $user, $pass);
        if ($this->mysqli_conn->connect_error) {
            echo("Connection failed: " . $this->mysqli_conn->connect_error);
            $this->mysqli_conn = false;
            die();
        } 
    }
    public function sql2array( // exec_sql
        $sql = ""
    ) {
        $this->get_conn();
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
        $this->get_conn();
        if ($this->mysqli_conn != false) {
            foreach ($this->mysqli_conn -> query($sql) -> fetch_all(MYSQLI_ASSOC) as $value) {
                $result[$value[$pk]] = $value;
            }
            return $result;
        }
    }
}
?>