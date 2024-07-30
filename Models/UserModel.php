<?php
class UserModel extends BaseModel
{
    const TABLE = 'users';
    public function getAll($select = ['*'], $orderBy = []/* ['Column asc/desc', ....] */ , $Limit = null)
    {
        return $this->getTable(self::TABLE, $select, $orderBy, $Limit);
    }

    public function countAll()
    {
        return $this->countRow(self::TABLE);
    }

    public function findById($id)
    {
        return $this->getById(self::TABLE, $id);
    }

    public function findByEmail($email)
    {
        return $this->getByColumn(self::TABLE, 'email', $email);
    }

    public function create($data = [])
    {
        return $this->insert(self::TABLE, $data);
    }

    public function update_Data($id, $data = [])
    {
        return $this->update(self::TABLE, $id, $data);
    }

    public function delete($id)
    {
        return $this->deleteById(self::TABLE, $id);
    }

    public function getUniqueId()
    {
        return $this->generateUniqueId(self::TABLE);
    }
}