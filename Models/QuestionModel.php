<?php
class QuestionModel extends BaseModel
{
    const TABLE = 'questions';
    public function getAll($select = ['*'], $orderBy = []/* ['Column asc/desc', ....] */ , $Limit = null)
    {
        return $this->getTable(self::TABLE, $select, $orderBy, $Limit);
    }

    public function findById($id)
    {
        return $this->getById(self::TABLE, $id);
    }

    public function getQuestionByExerciseId($id)
    {
        $data = [];
        $query = $this->_query("SELECT * FROM " . self::TABLE . " WHERE exercise_id = '$id'");
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function create($data = [])
    {
        return $this->insert(self::TABLE, $data);
    }

    public function update_Data($id, $data = [])
    {
        return $this->update(self::TABLE, $id, $data);
    }

    public function getUniqueId()
    {
        return $this->generateUniqueId(self::TABLE);
    }

}