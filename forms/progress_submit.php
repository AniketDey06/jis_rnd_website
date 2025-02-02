<?php
// Database connection
require_once '../config/database.php';
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $files = $_FILES['file'] ?? null;

    $post_id = $_POST['post_id'];
    // echo $post_id;

    $errors = [];
    $uploadDir = 'progress_report/'; // Directory for uploaded files

    // Validate inputs

    if ($files) {
        if ($files['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Error uploading file " . $files['name'];
        }
    }

    // If no errors, process data
    if (empty($errors)) {
        try {
            // Handle file uploads
            if ($files) {
                $fileName = $files['name'];
                $fileTmpName = $files['tmp_name'];
                $filePath = $uploadDir . time() . '_' . basename($fileName);

                if (move_uploaded_file($fileTmpName, $filePath)) {

                    $faculty_id = $_SESSION['faculty_id'];
                    // Insert post data into the posts table
                    $stmt = $pdo->prepare("INSERT INTO project_allocation (faculty_id, post_id, progress_report, status, created_at) VALUES (:faculty_id, :post_id, :file_path, '2', NOW())");

                    $stmt->execute([
                        ':faculty_id' => $faculty_id,
                        ':post_id'=>$post_id,
                        ':file_path' => $filePath
                    ]);

                    echo json_encode(['success' => true, 'message' => 'Post and attachments created successfully.']);

                } 
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