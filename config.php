<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function mq($sql)
{
    global $conn;
    return mysqli_query($conn, $sql);
}

function mnr($a)
{
    return mysqli_num_rows($a);
}

function mfa($a)
{
    return mysqli_fetch_assoc($a);
}
function encode($a)
{
    $s_id = strval($a);
    $e_id = base64_encode($s_id);
    return $e_id;
}
function decode($a)
{
    $s_id = base64_decode($a);
    $d_id = intval($s_id);
    return $d_id;
}


function userID()
{
    $current_url = $_SERVER['REQUEST_URI'];

    // Check if url contains '?'
    if (strpos($current_url, '?') !== false) {
        // Remove any query string parameters from the URL
        $url_parts = explode('?', $current_url);

        // Split the URL path by "/"
        $path_parts = explode('/', $url_parts[0]);

        // Remove any empty segments
        $path_parts = array_filter($path_parts);

        // Get the second-to-last part of the URL path
        $filename = isset($path_parts[count($path_parts)]) ? $path_parts[count($path_parts)] : null;

        // Remove the script name (index.php) from the URL path
        $url_without_script = str_replace('SMS2.0/' . $filename . '/', '', $current_url);

        // Get the URL path segments
        $segments = explode('/', trim($url_without_script, '/'));

        // Extract the value from the URL path
        $value = isset($segments[2]) ? $segments[2] : null;

        // echo $url_without_script;
        return $value;
    } else {
        // Remove any query string parameters from the URL
        $url_parts = explode('?', $current_url);

        // Split the URL path by "/"
        $path_parts = explode('/', $url_parts[0]);

        // Remove any empty segments
        $path_parts = array_filter($path_parts);

        // Get the second-to-last part of the URL path
        $filename = isset($path_parts[count($path_parts) - 1]) ? $path_parts[count($path_parts) - 1] : null;

       // Remove the script name (index.php) from the URL path
       $url_without_script = str_replace('SMS2.0/' . $filename . '/', '', $current_url);

       // Get the URL path segments
       $segments = explode('/', trim($url_without_script, '/'));

       // Extract the value from the URL path
       $value = isset($segments[0]) ? $segments[0] : null;

       // echo $url_without_script;
       return $value;
    }
}

function userSID()
{
    $current_url = $_SERVER['REQUEST_URI'];

    // Check if url contains '?'
    if (strpos($current_url, '?') !== false) {
        // Remove any query string parameters from the URL
        $url_parts = explode('?', $current_url);

        // Split the URL path by "/"
        $path_parts = explode('/', $url_parts[0]);

        // Remove any empty segments
        $path_parts = array_filter($path_parts);

        // Get the second-to-last part of the URL path
        $filename = isset($path_parts[count($path_parts)]) ? $path_parts[count($path_parts)] : null;

        // Remove the script name (index.php) from the URL path
        $url_without_script = str_replace('SMS2.0/scholarship-provider/' . $filename . '/', '', $current_url);

        // Get the URL path segments
        $segments = explode('/', trim($url_without_script, '/'));

        // Extract the value from the URL path
        $values = isset($segments[3]) ? $segments[3] : null;

        // echo $url_without_script;
        return $values;
    } else {
        // Remove any query string parameters from the URL
        $url_parts = explode('?', $current_url);

        // Split the URL path by "/"
        $path_parts = explode('/', $url_parts[0]);

        // Remove any empty segments
        $path_parts = array_filter($path_parts);

        // Get the second-to-last part of the URL path
        $filename = isset($path_parts[count($path_parts) - 1]) ? $path_parts[count($path_parts) - 1] : null;

       // Remove the script name (index.php) from the URL path
       $url_without_script = str_replace('SMS2.0/scholarship-provider/' . $filename . '/', '', $current_url);

       // Get the URL path segments
       $segments = explode('/', trim($url_without_script, '/'));

       // Extract the value from the URL path
       $values = isset($segments[0]) ? $segments[0] : null;

       // echo $url_without_script;
       return $values;
    }
}


// Function to handle photo upload
function uploadPhoto($photo)
{
    if ($photo["error"] == UPLOAD_ERR_OK) {
        $file_name = basename($photo["name"]);
        $file_tmp = $photo["tmp_name"];
        $file_type = $photo["type"];
        $file_size = $photo["size"];

        // Store file in uploads directory
        $upload_dir = "uploads/";
        $target_file = $upload_dir . $file_name;
        move_uploaded_file($file_tmp, $target_file);

        return $target_file; // Return uploaded file path
    } else {
        return false; // Return false if upload failed
    }
}

function uploadPhotoScholar($photo)
{
    if ($photo["error"] == UPLOAD_ERR_OK) {
        $file_name = basename($photo["name"]);
        $file_tmp = $photo["tmp_name"];
        $file_type = $photo["type"];
        $file_size = $photo["size"];

        // Store file in uploads directory
        $upload_dir = "../uploads/";
        $target_file = $upload_dir . $file_name;
        move_uploaded_file($file_tmp, $target_file);

        return $target_file; // Return uploaded file path
    } else {
        return false; // Return false if upload failed
    }
}

function btnStatus($status){
    if ($status == 'Approved') {
        $btn = "btn-success";
    } elseif ($status == 'Shortlisted') {
        $btn = "btn-info";
    } elseif ($status == 'Pending') {
        $btn = "btn-warning";
    } else {
        $btn = "btn-danger";
    }

    return $btn;
}

