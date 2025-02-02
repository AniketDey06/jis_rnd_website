<?php

require_once '../config/database.php';
// Directory to store uploaded files
$uploadDir = 'uploads/';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['post_id'] ?? '';
    
    $status = '1';
    $errors = [];
    // Check if a file is uploaded
    $files = $_FILES['file'] ?? null;

    if ($files) {
        if ($files['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Error uploading file " . $files['name'];
        }
    }
    if (empty($errors)) {
        try {

            // Get file details
            if ($files) {
                $fileName = $files['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $filePath = $uploadDir . time() . '_' . basename($fileName);

                if (move_uploaded_file($fileTmpName, $filePath)) {

                    $faculty_id = $_SESSION['faculty_id'];
                    // Insert post data into the posts table
                    $stmt = $pdo->prepare("INSERT INTO project_applications (post_id, poc, faculty_id, status)VALUES (:post_id, :poc, :faculty_id, :status)");
                    $stmt->execute([
                        ':post_id' => $postId,
                        ':poc' => $filePath,
                        ':faculty_id' => $faculty_id,
                        ':status' => $status
                    ]);

                } else {
                    $errors[] = "Failed to upload file: $fileName";
                }



            }
            if (empty($errors)) {
                echo json_encode(['success' => true, 'message' => $postId]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Some files failed to upload.', 'errors' => $errors]);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'errors' => $errors]);
    }
}
?>

