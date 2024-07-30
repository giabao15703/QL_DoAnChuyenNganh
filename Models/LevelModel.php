<?php
class LevelModel extends BaseModel
{
    const TABLE = 'level';
    public function getAll($select = ['*'], $orderBy = []/* ['Column asc/desc', ....] */ , $Limit = null)
    {
        return $this->getTable(self::TABLE, $select, $orderBy, $Limit);
    }
}