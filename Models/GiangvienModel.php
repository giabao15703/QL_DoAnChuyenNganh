<?php 
    class GiangvienModel extends BaseModel{
        const TABLE = "giangvien";
        public function getAll($select = ['*'], $orderBy = []/* ['Column asc/desc', ....] */ , $Limit = null)
    {
        return $this->getTable(self::TABLE, $select, $orderBy, $Limit);
    }
    }
?>