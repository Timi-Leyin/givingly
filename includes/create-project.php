<?php
require_once('../includes/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture form data
    $name = $_POST['name'];
    $goal = $_POST['goal'];
    $about = $_POST['about'];
    $date = $_POST['date'];
    $user_email = $_SESSION['email']; 
    if (isset($_FILES['banner']) && $_FILES['banner']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['banner']['tmp_name'];
        $fileName = $_FILES['banner']['name'];
        $fileSize = $_FILES['banner']['size'];
        $fileType = $_FILES['banner']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $bannerPath = $dest_path;
            } else {
                $error = 'There was some error moving the file to upload directory.';
            }
        } else {
            $error = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    } else {
        $error = 'Error in file upload: ' . $_FILES['banner']['error'];
    }

    if (!isset($error)) {
        $query = "INSERT INTO projects (user_email, name, goal, about, timeline, banner) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
    
        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }
    
        $stmt->bind_param('ssdsss', $user_email, $name, $goal, $about, $date, $bannerPath);
    
        if ($stmt->execute()) {
            $success = 'Project created successfully!';
        } else {
            // echo "Insert failed! ";
            $error = 'Database error: ' . $stmt->error;
            echo $error;
        }
    
        $stmt->close();
    } else {
        echo $error;
    }
}
?>
