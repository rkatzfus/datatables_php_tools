<?php
namespace Autoloading;
// use Autoloading\database_tools;
class webutility_ssp
{
    private $draw;
    private $intlength;
    private $intstart;
    private $strsqlOrder;
    private $data;

    public function __construct(
        $debug=false
    ) {
        $this->debug = $debug;
        $this->draw = 0;
        $this->intlength = 10;
        $this->intstart = 0;
        $this->strsqlOrder = "";
        $this->data = array();
        $this->obj_mysqli = new database_tools();
        echo "hello from webutility_ssp";
    }  
    public function set_draw(
        $draw = 0
    ) {
        $this->draw = intval($draw);
        if ($this->debug == true ) {
            echo "<hr>";
            echo "<b>function set_draw</b><br>";
            echo $this->draw = intval($draw);
        } 
    }
    public function set_length(
        $length = 10
    ) {
        $this->intlength = intval($length);
        if ($this->debug == true ) {
            echo "<hr>";
            echo "<b>function set_length</b><br>";
            echo $this->intlength = intval($length);
        }  
    }
    public function set_start(
        $intstart = 0
    ) {
        $this->intstart = intval($intstart);
        if ($this->debug == true ) {
            echo "<hr>";
            echo "<b>function set_start</b><br>";
            echo $this->intstart = intval($intstart);
        }  
    }
    private function length_and_paging()
    {
        if($this->intlength==-1){
            return "";
        }else{
            return " offset ".$this->intstart." rows fetch next ".$this->intlength." rows only";
        }
    }
    public function set_order(
        $orders = array()
        , $columns = array()
    ) {
        $sql_order = array();
        foreach ($orders as $ordersValue) {
            array_push($sql_order, '['.$columns[$ordersValue['column']]['data'].'] '.$ordersValue['dir']);
        }
        $this->strsqlOrder = " order by ".implode(", ", $sql_order);
        if ($this->debug == true ) {
            echo "<hr>";
            echo "<b>function set_order</b><br>";
            echo $this->strsqlOrder = " order by BY ".implode(", ", $sql_order);
        } 
    }
    private function set_recordsTotal()
    {
        if(!isset($this->recordsTotal) && $this->recordsTotal < 1){
            $sql = "
                select
                    distinct count(*) ".$this->strSqlFrom;
            $this->recordsTotal = intval($this->obj_mysqli->sql_getfield($sql));
        }
    }

}
?>