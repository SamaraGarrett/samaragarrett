<?php
// include configuration (for database parameters)
include_once(PATH . '../config/config.php');

/**
 * Function to connect to the database. Takes the variables defined in config and opens a connection
 * to the given database using mysqli (mysql improved). If the connection fails, echos an
 * error.
 * 
 * @return Returns the mysqli object, representing the connection between php and the database.
 */
function connectToDB() {
    // connect to database
    $mysqli = new mysqli(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);

    // check that database connected correctly
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    return $mysqli;
}

/**
 * A function which takes a statement and parameters and returns the result of that statement
 * being run as a prepared statement in the database.
 * 
 * The variable length parameters $typesAndParams should have (type, param) pairs in the
 * order: type0, param0, type1, param1, etc., such that type0 is the type of param0, type1 is
 * the type of param1, etc.
 * 
 * Parameter type input: 'i' for int, 's' for string, 'd' for double
 * 
 * @param $returnValue Whether or not the function should return a value. If the statement is
 * a SELECT statement this should be true, otherwise false.
 * @param $statement The statement to prepare to query the database. Should have question
 * marks in the respective locations that the input parameters go.
 * @param $types The types of the parameters in order, so an int parameterfollowed by a 
 * string parameter would be 'is'.
 * @param $params The parameters to be run on the statement in the locations of the 
 * respective question marks.
 * 
 * @return The return value for the statement if it is a SELECT statement.
 */
function preparedStatementDB(string $returnAmount, string $statement, string $types, string ...$params) {
    // connect to database
    $mysqli = connectToDB();

    // prepare the statement
    if (!($stmt = $mysqli->prepare($statement))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    // bind the parameters
    if(!$stmt->bind_param($types, ...$params)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    // execute the statement
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    // if the statement returns a value (such as a select), return the retrieved value(s) 
    if ($returnAmount == 'none') {
        // close the statement
        $stmt->close();

        // close the mysqli instance
        $mysqli->close();
    } else if ($returnAmount == 'one') {
        // bind the result
        $result = NULL;
        if (!$stmt->bind_result($result)) {
        echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }

        // fetch the result
        $stmt->fetch();

        // close the statement
        $stmt->close();

        //close the mysqli instance
        $mysqli->close();

        return $result;
    } else if ($returnAmount == 'oneRow') {
        // get the result
        $result = $stmt->get_result();

        // fetch the result
        $row = $result->fetch_assoc();

        // free the results
        $result->free_result();

        // close the statement
        $stmt->close();

        //close the mysqli instance
        $mysqli->close();

        return $row;
    } else if ($returnAmount == 'multi') {
        $result = $stmt->get_result();
        $results = $result->fetch_all(MYSQLI_ASSOC);

        // free the results
        $result->free_result();

        // close the statement
        $stmt->close();

        // close the mysqli instance
        $mysqli->close();

        return $results;
    }
}

/**
 * 
 * WARNING: For security, only use this if no user input is included in query! If user input 
 * is included use preparedStatementDB function instead.
 */
function queryDB($statement) {
    // connect to database
    $mysqli = connectToDB();


}
  
?>