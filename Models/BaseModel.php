<?php
class BaseModel extends Database
{
   protected $connect;
   public function __construct()
   {
      $this->connect = $this->connect();
   }

   public function getTable($TableName, $select = ['*'], $orderBy = []/* ['Column asc/desc', ....] */ , $Limit = null)
   {
      $select = implode(",", $select);

      $orderBy = implode(",", $orderBy);

      $sql = "SELECT $select FROM $TableName";

      $sql .= ($orderBy != null) ? " ORDER BY $orderBy" : "";

      $sql .= ($Limit != null) ? " LIMIT $Limit" : "";
      //die($sql);
      $query = $this->_query($sql);
      $data = [];
      while ($row = mysqli_fetch_assoc($query)) {
         array_push($data, $row);
      }
      return $data;
   }

   public function getById($TableName, $id)
   {
      $sql = "SELECT * FROM $TableName WHERE id = '$id' LIMIT 1";
      $query = $this->_query($sql);
      $data = [];
      while ($row = mysqli_fetch_assoc($query)) {
         array_push($data, $row);
      }
      return $data;
   }

   public function getByColumn($TableName, $column, $value)
   {
      $sql = "SELECT * FROM $TableName WHERE $column = '$value'";
      $query = $this->_query($sql);
      $data = [];
      while ($row = mysqli_fetch_assoc($query)) {
         array_push($data, $row);
      }
      return $data;
   }

   /*public function insert($TableName, $data = [])
   {
      $column = implode(',', array_keys($data));

      $values = array_map(function ($value) {
         return "'" . $value . "'";
      }, array_values($data));

      $values = implode(',', $values);

      $sql = "INSERT INTO $TableName ($column) VALUES ($values)";

      $query = $this->_query($sql);

      if ($query) {
         return mysqli_affected_rows($this->connect); // Trả về số hàng bị ảnh hưởng
      } else {
         return -1; // Hoặc trả về một giá trị khác để biểu thị việc thêm dữ liệu không thành công
      }
   }*/

   public function insert($TableName, $data = [])
   {
      // Tạo danh sách cột và tham số dấu hỏi cho prepared statement
      $columns = implode(',', array_keys($data));
      $params = implode(',', array_fill(0, count($data), '?'));

      // Tạo câu lệnh SQL
      $sql = "INSERT INTO $TableName ($columns) VALUES ($params)";

      // Chuẩn bị câu lệnh
      $stmt = $this->connect->prepare($sql);

      // Kiểm tra xem câu lệnh có chuẩn bị thành công không
      if ($stmt === false) {
         return -1; // Trả về lỗi nếu không thể chuẩn bị câu lệnh
      }

      // Định dạng kiểu dữ liệu và truyền giá trị vào câu lệnh chuẩn bị
      $types = '';
      $values = array_values($data);
      foreach ($values as $value) {
         // Xác định kiểu dữ liệu cho từng giá trị
         if (is_float($value)) {
            $types .= 'd';  // Double
         } elseif (is_int($value)) {
            $types .= 'i';  // Integer
         } else {
            $types .= 's';  // String và mọi thứ khác
         }
      }

      // Gán các tham số vào câu lệnh chuẩn bị
      $stmt->bind_param($types, ...$values);

      // Thực thi câu lệnh
      if ($stmt->execute()) {
         return $stmt->affected_rows; // Trả về số hàng bị ảnh hưởng
      } else {
         return -1; // Trả về -1 nếu thực thi không thành công
      }
   }


   public function update($TableName, $id, $data = [])
   {
      $dataSets = [];

      foreach ($data as $key => $val) {
         array_push($dataSets, "$key = '" . $val . "'");
      }

      $dataSets = implode(',', $dataSets);

      $sql = "UPDATE $TableName SET $dataSets WHERE id = $id";

      $query = $this->_query($sql);

      if ($query) {
         return mysqli_affected_rows($this->connect); // Trả về số hàng bị ảnh hưởng (nếu sai id thì dòng update vẫn được thực thi nhưng giá trị trả về = 0)
      } else {
         return -1; // Hoặc trả về một giá trị khác để biểu thị việc update dữ liệu không thành công
      }
   }

   /* public function update($TableName, $id, $data = [])
   {
      // Chuẩn bị các phần của câu lệnh SQL update
      $sets = [];
      $types = '';
      $values = [];

      foreach ($data as $key => $val) {
         $sets[] = "$key = ?"; // Sử dụng placeholder để tránh injection
         $values[] = $val;     // Lưu giá trị để bind vào câu lệnh

         // Xác định kiểu dữ liệu
         if (is_int($val)) {
            $types .= 'i';      // Integer
         } elseif (is_float($val)) {
            $types .= 'd';      // Double
         } else {
            $types .= 's';      // String và các loại khác
         }
      }

      // Thêm id vào cuối mảng giá trị cho phần WHERE
      $values[] = $id;
      $types .= 's';          // Giả sử id là kiểu integer

      // Chuyển đổi mảng thành chuỗi cho câu lệnh SQL
      $setsString = implode(',', $sets);

      // Tạo câu lệnh SQL
      $sql = "UPDATE $TableName SET $setsString WHERE id = ?";

      // Chuẩn bị câu lệnh
      $stmt = $this->connect->prepare($sql);

      if (false === $stmt) {
         // Không thể chuẩn bị câu lệnh
         return -1;
      }

      // Bind giá trị vào câu lệnh đã chuẩn bị
      $stmt->bind_param($types, ...$values);
      var_dump($stmt);
      // Thực thi câu lệnh
      if ($stmt->execute()) {
         return $stmt->affected_rows; // Trả về số hàng bị ảnh hưởng
      } else {
         return -1; // Lỗi khi thực thi
      }
   } */

   public function _query($sql)
   {
      return mysqli_query($this->connect, $sql);
   }

   public function countRow($TableName)
   {
      $sql = "SELECT COUNT(*) FROM $TableName";
      $query = $this->_query($sql);
      $row = mysqli_fetch_row($query);
      return $row[0];
   }

   public function deleteById($TableName, $id)
   {
      $sql = "DELETE FROM $TableName WHERE id = '$id'";
      $query = $this->_query($sql);

      if ($query) {
         return mysqli_affected_rows($this->connect); // Trả về số hàng bị ảnh hưởng
      } else {
         return -1; // Hoặc trả về một giá trị khác để biểu thị việc xóa dữ liệu không thành công
      }
   }

   public function generateUniqueId($TableName)
   {
      $unique = false;
      $newId = '';

      while (!$unique) {
         $newId = $TableName . str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
         $sql = "SELECT COUNT(*) as count FROM $TableName WHERE id = '$newId'";
         $result = $this->_query($sql);

         if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row['count'] == 0) {
               $unique = true;
            }
         }
      }
      return $newId;
   }
}