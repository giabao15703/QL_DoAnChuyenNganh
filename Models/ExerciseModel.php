<?php
class ExerciseModel extends BaseModel
{
    const TABLE = 'exercises';
    public function getAll($select = ['*'], $orderBy = []/* ['Column asc/desc', ....] */ , $Limit = null)
    {
        return $this->getTable(self::TABLE, $select, $orderBy, $Limit);
    }

    public function findById($id)
    {
        $data = [];
        $query = $this->_query("SELECT * FROM " . self::TABLE . " WHERE id = '$id' AND isDel = 0");
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function findByUserId($id)
    {
        $data = [];
        $query = $this->_query("SELECT exercises.id AS ExerciseID,
                                exercises.title AS ExerciseTitle,
                                topic.name AS TopicName,
                                level.name AS LevelName,
                                exercises.time_limit_minutes,
                                exercises.has_time_limit 
                                FROM exercises
                                JOIN topic ON exercises.topic_id = topic.id 
                                JOIN level ON exercises.level_id = level.id 
                                WHERE exercises.user_id = '$id' AND exercises.isDel = 0");
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