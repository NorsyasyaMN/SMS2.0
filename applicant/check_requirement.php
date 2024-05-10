<?php
require_once('../config.php');

if (isset($_GET['id_x']) && isset($_GET['id_y'])) {
    // Sanitize and assign values
    $s_id = $_GET['id_x'];
    $id = $_GET['id_y'];

    // Initialize requirement status
    $levelSatisfied = false;
    $fieldSatisfied = false;
    $verified = false;
    $requirementSatisfied = false;

    // Perform your database query here using $s_id and $id
    $stmt = "SELECT * FROM `scholarship` WHERE id = $s_id";
    $result = mq($stmt);
    if ($result && mnr($result) > 0) {
        while ($row = mfa($result)) {
            $num_level = explode(',', $row['level']);
            $num_field = explode(',', $row['field']);
        }
    }

    $stmt_a = "SELECT * FROM `applicant` WHERE u_id = $id";

    $result_a = mq($stmt_a);
    if ($result_a && mnr($result_a) > 0) {
        while ($row_a = mfa($result_a)) {
            $level_a = $row_a['level'];
            $field_a = $row_a['stud'];
            $verify = $row_a['verify'];

        }
        if (in_array($level_a, $num_level)) {
            $levelSatisfied = true;
        }
        if (in_array($field_a, $num_field)) {
            $fieldSatisfied = true;
        }
        if( $levelSatisfied && $fieldSatisfied){
            if($verify = 'Approved'){
                $requirementSatisfied = true;
            }
        }
        
        
    }


    // Send the response back to the client
    if ($requirementSatisfied) {
        echo "satisfied";
    } else {
        echo "not satisfied";
    }
} else {
    // Display error message if id_x or id_y are not set or are not numeric
    echo "invalid";
}
?>