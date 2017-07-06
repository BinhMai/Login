<?php
class DB_Manager{
    private $__conn;
     
    function connect()
    {
        if (!$this->__conn){
            $this->__conn = mysqli_connect('localhost', 'root', '', 'qlnhanvien') or die ('Lỗi kết nối');
        }
    }
 
    // Hàm Ngắt Kết Nối
    function dis_connect(){
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }
 
    // Hàm Insert
    function insert($table, $data)
    {
        // Kết nối
        $this->connect();
 
        // Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
 
        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysql_escape_string($value)."'";
        }
 
        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
 
        return mysqli_query($this->__conn, $sql);
    }
 
    function update($table,$data,$name,$val)
    {
        // Kết nối
        $this->connect();
        $sql = '';
        // Lặp qua data
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysql_escape_string($value)."',";
        }
 
        // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$name.'='.$val;
 
        return mysqli_query($this->__conn, $sql);
    }
 
    // Hàm delete
    function remove($table, $where){
        // Kết nối
        $this->connect();
         
        // Delete
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__conn, $sql);
    }
 
    // Hàm lấy danh sách
    function get_list($table,$getValue,$name,$value)
    {
        // Kết nối
        $this->connect();
         
		$return = array();
		$sql = "select $getValue from $table where $name = $value" ;
        $result = mysqli_query($this->__conn, $sql);
 
		while($row = mysqli_fetch_assoc($result))
			$return[] = $row;
        return $return;
    }
	
	function get_listIn($table,$getValue,$name,$value)
    {
        // Kết nối
        $this->connect();
        $val = '('.$value.')';
		$sql = "select $getValue from $table where $name in $val" ;
        $result = mysqli_query($this->__conn, $sql);
		
		$return = array();
		while($row = mysqli_fetch_assoc($result))
			$return[] = $row;
        return $return;
    }
	
	function get_listStatus($table,$name,$value, $val,$order,$start,$limit)
    {
        // Kết nối
        $this->connect();
         
		$return = array();
		$sql = "select * from $table where $name = $value || $name in ($val) $order LIMIT $start, $limit" ;
        $result = mysqli_query($this->__conn, $sql);
 
		while($row = mysqli_fetch_assoc($result))
			$return[] = $row;
        return $return;
    }
	function get_listMyStatus($table,$name,$value,$order,$start,$limit)
    {
        // Kết nối
        $this->connect();
         
		$return = array();
		$sql = "select * from $table where $name = $value $order LIMIT $start, $limit" ;
        $result = mysqli_query($this->__conn, $sql);
 
		while($row = mysqli_fetch_assoc($result))
			$return[] = $row;
        return $return;
    }
	
	function get_column($column,$table,$name,$value)
    {
        // Kết nối
        $this->connect();
         
		$sql = "select $column from $table where $name = $value" ;
        $result = mysqli_query($this->__conn, $sql);
 
		$return = mysqli_fetch_assoc($result);
        return $return;
    }
 
    // Hàm lấy 1 record dùng trong trường hợp lấy chi tiết tin
    function get_row($sql)
    {
        // Kết nối
        $this->connect();
         
        $result = mysqli_query($this->__conn, $sql);
 
        $row = mysqli_fetch_assoc($result);
 
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
 
        if ($row){
            return $row;
        }
        return false;
    }
}
?>