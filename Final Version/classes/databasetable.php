<!--databasetable connection-->
<?php
class DatabaseTable{//class database 
    public $table;//link to the database table
    function __construct($table){//construct the table
        $this->table = $table; 
    }

    function save($record, $pk = ''){//save the record
    try{
        $this->insert($record);//insert the value
    }
    catch(Exception $e){
        $this->update($record, $pk);//update the value
    }
}

//function insert
function insert($record) {
    global $pdo;//global variable
    $keys = array_keys($record);//array 

    $values = implode(', ', $keys);//implode the value
    $valuesWithColon = implode(', :', $keys);//implode the value

    $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';//insert the value

    $stmt = $pdo->prepare($query);//prepare the query

    $stmt->execute($record);//execute the record
}

//update the record
function update($record, $pk) {//update the record
    global $pdo;
    $parameters = [];//paraeter passed as array
    foreach($record as $key => $value){//for each loop
        $parameters[] = $key. '= :' .$key;//passed parameter
    }
    $parametersWithComma = implode(',', $parameters);//implode the value
    $query = "UPDATE $this->table SET $parametersWithComma WHERE $pk =:pk";//update the table
    $record['pk'] = $record[$pk];//insert the pk
    $stmt = $pdo->prepare($query);//prepare the value
    $stmt->execute($record);//execute the record
}

//find function
function find($field, $value) {//passed as array
    global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :valu');//prepare the value
        $criteria = [
                'valu' => $value//passed as criteria
        ];
        $stmt->execute($criteria);//execute the criteria

        return $stmt;
}

//findAll function
function findAll() {
    global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM ' . $this->table);//selects the value

        $stmt->execute();//execute the value

        return $stmt;
}

function handlingChat($mes_to,$mes_by){
    global $pdo;
    $stmt = $pdo->prepare('UPDATE messages SET message_to="'.$mes_to.'" WHERE message_by="'.$mes_by.'";');
    $stmt->execute();
    return $stmt;
}

function gettingChat($person1,$person2){
    global $pdo;
    $stmt = $pdo->prepare('SELECT *, DATE_FORMAT(time, "%r") as time12, DATE_FORMAT(time, "%M %e") as montday, date(time) as jdate FROM messages WHERE message_to="'.$person1.'" AND message_by="'.$person2.'"OR message_to="'.$person2.'" AND message_by="'.$person1.'"');
    $stmt->execute();
    return $stmt;
}

//function delete
function delete($field, $value) {//passed as array
    global $pdo;
        $stmt = $pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :pk');//delete the value
        $criteria = [
                'pk' => $value//criteria passed
        ];
        $stmt->execute($criteria);//executes the criteria

        return $stmt;
}

function booking($user_id){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM `properties` INNER JOIN bookings ON properties.prop_id = bookings.prop_id WHERE bookings.user_id ='.$user_id.';');
    $stmt->execute();
    return $stmt;

}

function orderOn($givenid){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM '.$this->table.' ORDER BY '.$givenid.' DESC;');
    $stmt->execute();
    return $stmt;
}

function searchP($searchProp){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM ' .$this->table. ' WHERE prop_name LIKE "%'.$searchProp.'%" || prop_StreetName LIKE "'.$searchProp.'%" || prop_suburb LIKE "'.$searchProp.'%" || prop_state LIKE "'.$searchProp.'%" || prop_postCode LIKE "'.$searchProp.'%";');
    $stmt->execute();
    return $stmt;
}

function searchC($searchClient){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM ' .$this->table. ' WHERE role = "user" && (firstname LIKE "%'.$searchClient.'%" || lastname LIKE "%'.$searchClient.'%") ;');
    $stmt->execute();
    return $stmt;
}

function notifAll() {
    global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM ' . $this->table .' ORDER BY notif_id DESC');//selects the value

        $stmt->execute();//execute the value

        return $stmt;
}

function getlastVal($field) {//passed as array
    global $pdo;
        $stmt = $pdo->prepare('SELECT MAX('.$field.') FROM '.$this->table);
        $stmt->execute();//execute the criteria
        return $stmt;
}

function rating($prop_id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT ROUND(AVG(rating), 2) AS averages, count(prop_id) AS counts FROM `feedbacks` WHERE prop_id='.$prop_id.';');
    $stmt->execute();
    return $stmt;
}

// get month name and year from feedback table
function findrating($field, $value) {//passed as array
    global $pdo;
        $stmt = $pdo->prepare('SELECT *,MONTHNAME(post_date) AS months, YEAR(post_date) AS years FROM ' . $this->table . ' WHERE ' . $field . ' = :valu');//prepare the value
        $criteria = [
                'valu' => $value//passed as criteria
        ];
        $stmt->execute($criteria);//execute the criteria

        return $stmt;
}

function report() {
    global $pdo;
        $stmt = $pdo->prepare('SELECT properties.prop_id,properties.prop_name AS property_name, properties.prop_StreetName, properties.prop_suburb, properties.prop_state, properties.prop_postCode, properties.prop_type AS property_type, properties.prop_occupancy AS property_occup, properties.price AS price, users.user_id, users.firstname, users.lastname, users.email AS user_email, bookings.start_time AS book_start, bookings.end_time AS book_end, bookings.status AS book_status FROM properties,users,bookings WHERE bookings.prop_id=properties.prop_id AND bookings.user_id=users.user_id ORDER BY bookings.start_time DESC; ');//selects the value

        $stmt->execute();//execute the value

        return $stmt;
}

//find function
function findmsg($field, $value) {//passed as array
    global $pdo;
        $stmt = $pdo->prepare("SELECT *, DATE_FORMAT(time, '%r') as time12, DATE_FORMAT(time, '%M %e') as montday, date(time) as jdate FROM " . $this->table . ' WHERE ' . $field . ' = :valu');//prepare the value
        $criteria = [
                'valu' => $value//passed as criteria
        ];
        $stmt->execute($criteria);//execute the criteria

        return $stmt;
}

//find customer support queries function
function findcustsv($field, $value, $orderby) {//passed as array
    global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM " . $this->table . ' WHERE ' . $field . ' = :valu ORDER BY '.$orderby);//prepare the value
        $criteria = [
                'valu' => $value//passed as criteria
        ];
        $stmt->execute($criteria);//execute the criteria

        return $stmt;
}

//Count function
function count($field, $value) {//passed as array
    global $pdo;
        $stmt = $pdo->prepare("SELECT COUNT($field) AS total FROM " . $this->table . ' WHERE ' . $field . ' = :valu');//prepare the value
        $criteria = [
                'valu' => $value//passed as criteria
        ];
        $stmt->execute($criteria);//execute the criteria

        return $stmt;
}

}
?>