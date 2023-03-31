<?php
include APP_PATH . 'traits/Koneksi.php';
class BaseModel
{
    use Koneksi;

    public function all()
    {
        $sql = "select * from $this->table";
        $result = $this->mysql()->query($sql);
        return $result;
    }

    public function rest()
    {
        $data = $this->all();

        $items = [];
        while ($item = mysqli_fetch_assoc($data)) {
            array_push($items, $item);
        }

        return $items;
    }

    public function getData($table)
    {
        $sql = "select * from $table";
        $result = $this->mysql()->query($sql);
        return $result;
    }

    function mapped_where($glue, $array, $symbol = '=')
    {
        return implode(
            $glue,
            array_map(
                function ($k, $v) use ($symbol) {
                    return $k . $symbol . "'" . $v . "'";
                },
                array_keys($array),
                array_values($array)
            )
        );
    }

    /**
     * @param mixed $mysql_syntax
     * syntax Mysql
     * @return $this
     */
    public function rawQuery($mysql_syntax)
    {
        $result = $this->mysql()->query($mysql_syntax);
        $this->result = $result;
        return $this;
    }



    public function where($condition, $separator = '=')
    {
        $where = $this->mapped_where(' ,', $condition, $separator);
        $sql = "select * from $this->table where $where";
        // echo $sql;
        $result = $this->mysql()->query($sql);
        $this->result = $result;
        return $this;
    }

    /**
     * 
     * Get semua data..
     * @return \mysqli_result|bool
     */
    public function get()
    {
        return $this->result;
    }
}
