<?php

/**
 * User
 */
class User extends CustomModel {

	/**
	 * Insert User
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'user_id' => $input['user_id'],
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			'email' => $input['email'],
			'password' => $input['password'],
			'member_since' => $input['member_since']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		$results = db::insert('user', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}

	/**
	 * Update User
	 */
	public function update($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			'email' => $input['email'],
			'password' => $input['password'],
			'member_since' => $input['member_since']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Update
		db::update('user', $sql_values, "WHERE user_id = {$this->user_id}");
		
		// Return a new instance of this user as an object
		return new User($this->user_id);

	}

	// verify user login
    public function isValid($input) {

        // validate user name
        // $input = $this->input(['user_name', 'password'], $input);

        $sql =<<<sql
            SELECT user_id
            FROM user
            WHERE user_name = '{$input['user_name']}'
            AND `password` = '{$input['password']}';
sql;

        $result = db::execute($sql);
        $user = null;
        if ($row = $result->fetch_assoc()) {
            $user = new User($row['user_id']);
        }
        return $user;
    }

	/**
		 * Retrieve User from DB
		 */
		public function retrieveUser() {

	        $getActivities =<<<sql
	        SELECT *
	        FROM user;
sql;

	        return db::execute($getUser);
	    }


}