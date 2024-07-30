<?php
class UserHistoryExerciseModel extends BaseModel
{
    const TABLE = 'user_exercise_history';
    public function getAll($select = ['*'], $orderBy = []/* ['Column asc/desc', ....] */ , $Limit = null)
    {
        return $this->getTable(self::TABLE, $select, $orderBy, $Limit);
    }

    public function getUniqueId()
    {
        return $this->generateUniqueId(self::TABLE);
    }


    public function create($data = [])
    {
        return $this->insert(self::TABLE, $data);
    }

    public function findById($id)
    {
        $data = [];
        $query = $this->_query("SELECT * FROM " . self::TABLE . " WHERE id = '$id'");
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function findByExerciseId($id)
    {
        $data = [];
        $query = $this->_query("SELECT
         user_exercise_history.id,
        user_ids, display_name,
        date_completed,
        score,exercise_id
        FROM user_exercise_history 
        JOIN users ON user_exercise_history.user_ids = users.id 
        WHERE exercise_id = '$id'
        ORDER BY 
        user_exercise_history.date_completed DESC;
    ");
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    public function findByUserId($id)
    {
        $data = [];
        $query = $this->_query("SELECT 
                            user_exercise_history.id AS UserExerciseHistoryID,
                            exercises.title AS ExerciseTitle,
                            exercise_id as ExercisesID,
                            topic.name AS TopicName,
                            level.name AS LevelName,
                            user_exercise_history.score,
                            user_exercise_history.date_completed
                            FROM 
                                user_exercise_history
                            JOIN 
                                exercises ON user_exercise_history.exercise_id = exercises.id
                            JOIN 
                                topic ON exercises.topic_id = topic.id
                            JOIN 
                                level ON exercises.level_id = level.id
                            WHERE 
                                user_exercise_history.user_ids = '$id'
                            ORDER BY 
                                user_exercise_history.date_completed DESC;
                        ");
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

    //count number of exercise that user has done
    public function countExercise($id, $exerciseId)
    {
        $data = [];
        $query = $this->_query("SELECT COUNT(exercise_id) as count FROM " . self::TABLE . " WHERE user_ids = '$id' AND exercise_id = '$exerciseId' ");
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }

}