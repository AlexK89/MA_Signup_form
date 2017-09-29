<?php
/**
 * Created by PhpStorm.
 * User: alexandrk
 * Date: 29/09/2017
 * Time: 18:22
 */

if (isset($_POST["submit"])) {
    $adult_name = $_POST["adult_name"];
    $adult_dob = $_POST["adult_dob"];
    $gender = $_POST["gender"];
    $child = $_POST["child"];
    $child_name = $_POST["child_name"];
    $child_dob = $_POST["child_dob"];
    $f_color = $_POST["f_color"];

    if ($adult_name && $adult_dob && $gender && $child) {
        $adult_id = query_adult($adult_name, $adult_dob, $gender);
        if ($child == "yes") {
            if ($child_name && $child_dob && $f_color) {
                $child_id = query_children($child_name, $child_dob, $f_color);
                parent_of($adult_id, $child_id);
            } else {
                echo "<h6 style='color: red; text-align: center; margin-top: 40px;'>PROVIDE DATA ABOUT YOUR CHILD</h6>";
            }
        }
    } else {
        echo "<h6 style='color: red; text-align: center; margin-top: 40px;'>FILL THE FORM</h6>";
    }
}
function query_adult($adult_name, $adult_dob, $gender) {
    $db = new PDO("mysql:host=127.0.0.1;dbname=test_DB", "root" , "");

    $query = $db->prepare("INSERT INTO `adults` (`name`, `DOB`, `gender`) VALUE (:name, :date, :gender);");
    $query->bindParam(":name", $adult_name);
    $query->bindParam(":date", $adult_dob);
    $query->bindParam(":gender", $gender);
    $query->execute();
    $result = $db->lastInsertId();
    return $result;
}
function query_children($child_name, $child_dob, $f_color) {
    $db = new PDO("mysql:host=127.0.0.1;dbname=test_DB", "root" , "");

    $query = $db->prepare("INSERT INTO `children` (`name`, `DOB`, `f_color`) VALUE (:name, :date, :color);");
    $query->bindParam(":name", $child_name);
    $query->bindParam(":date", $child_dob);
    $query->bindParam(":color", $f_color);
    $query->execute();
    $result = $db->lastInsertId();
    return $result;
}
function parent_of($adult_id, $child_id) {
    $db = new PDO("mysql:host=127.0.0.1;dbname=test_DB", "root" , "");
    $query = $db->prepare("INSERT INTO `parent_of` (`adults_id`, `children_id`) VALUE ($adult_id, $child_id);");
    $query->execute();
}