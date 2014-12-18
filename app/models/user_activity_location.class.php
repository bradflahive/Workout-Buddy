<?php

/**
 * Criteria
 */
class UserActivityLocation extends Model {

	public function __construct($ids) {
		
		$this->model = $this->get_model($ids);

		if(!$this->model) {
			$this->insert($ids);
			$this->model = $this->get_model($ids);
		}
		//TODO if exists and intensity is diff, update instead of insert
	}

	/**
	 * Insert Criteria
	 */
	public static function insert($input) {

		// Prepare SQL Values
		$sql_values = [
			'user_id' => $input['user_id'],
			'activity_id' => $input['activity_id'],
			'location_id' => $input['location_id'],
			'time' => $input['time'],
			'day' => $input['day'],
			'intensity' => $input['intensity'],
			'invitee_name' => $input['name']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		$results = db::insert('user_activity_location', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}

	/**
	 * Get Model
	 */
	public function get_model($ids) {

		// Empty ID
		if (empty($ids)) { return NULL; }
	
		// SQL
		$sql = "
			SELECT *
			FROM " . $this->get_table() . "
			WHERE user_id = '{$ids['user_id']}'
			AND activity_id = '{$ids['activity_id']}'
			AND location_id = '{$ids['location_id']}'
			AND time = '{$ids['time']}'
			AND day = '{$ids['day']}'
			LIMIT 1
			";

		// Execute and Return
		$results = db::execute($sql);
		return $results->num_rows ? $results->fetch_assoc() : NULL;

	}

	/**
	 * Update Criteria
	 */
	public function update($input) {

		// Prepare SQL Values
		$sql_values = [
			'user_id' => $input['user_id'],
			'activity_id' => $input['activity_id'],
			'location_id' => $input['location_id'],
			'time' => $input['time'],
			'day' => $input['day'],
			'intensity' => $input['intensity']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Update
		db::update('user_activity_location', $sql_values, "WHERE user_id = {$this->user_id}");
		
		// Return a new instance of this user as an object
		return new Criteria($this->user_id);

	}

	/**
	 * Retrieve Activity from DB
	 */
	public function retrieveActivity() {

        $getActivities =<<<sql
        SELECT *
        FROM activity;
sql;

        return db::execute($getActivities);
    }

    /**
	 * Delete schedule from DB
	 */
	public function deleteSchedule() {

        $sql =<<<sql
            DELETE 
            FROM 
            user_activity_location
            WHERE user_id = {$this->user_id}
            AND activity_id = {$this->activity_id}
            AND location_id = {$this->location_id}
            AND time = {$this->time}
            AND day = {$this->day}
            LIMIT 1;
sql;
        $results = db::execute($sql);

    }
    
}












