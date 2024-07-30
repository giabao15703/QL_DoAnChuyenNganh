<?php
class NewModel extends BaseModel
{
    const TABLE = 'news';
    public function getAll($select = ['*'], $orderBy = []/* ['Column asc/desc', ....] */ , $Limit = null)
    {
        return $this->getTable(self::TABLE, $select, $orderBy, $Limit);
    }

    public function findById($id)
    {
        return $this->getById(self::TABLE, $id);
    }

    public function create($data = [])
    {
        return $this->insert(self::TABLE, $data);
    }

    public function getUniqueId()
    {
        return $this->generateUniqueId(self::TABLE);
    }
}