<?php
class TopicModel extends BaseModel
{
    const TABLE = 'topic';
    public function getAll($select = ['*'], $orderBy = []/* ['Column asc/desc', ....] */ , $Limit = null)
    {
        return $this->getTable(self::TABLE, $select, $orderBy, $Limit);
    }
}