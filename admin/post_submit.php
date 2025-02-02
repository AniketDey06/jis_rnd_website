<?php
// Database connection
require_once '../config/database.php';
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $domain = $_POST['domain'] ?? '';
    $description = $_POST['description'] ?? '';
    $files = $_FILES['file'] ?? null;

    $errors = [];
    $uploadDir = '../forms/uploads_post/'; // Directory for uploaded files

    // Validate inputs
    if (empty($title)) {
        $errors[] = "Title is required.";
    }
    if (empty($domain)) {
        $errors[] = "Domain is required.";
    }
    if (empty($description)) {
        $errors[] = "Description is required.";
    }
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
                $fileTmpName = $_FILES['file']['tmp_name'];
                $filePath = $uploadDir . time() . '_' . basename($fileName);

                if (move_uploaded_file($fileTmpName, $filePath)) {

                    $faculty_id = $_SESSION['faculty_id'];
                    // Insert post data into the posts table
                    $stmt = $pdo->prepare("INSERT INTO posts (faculty_id, title, domain, description, file_path) VALUES (:faculty_id, :title, :domain, :description, :file_path)");
                    $stmt->execute([
                        ':faculty_id' => $faculty_id,
                        ':title' => $title,
                        ':domain' => $domain,
                        ':description' => $description,
                        ':file_path' => $filePath
                    ]);

                    // Get the last inserted post_id 
                    $postId = $pdo->lastInsertId();

                    // Insert attachment data into the attachments table
                    $stmt = $pdo->prepare("INSERT INTO attachments (post_id, file_name, file_path) VALUES (:post_id, :file_name, :file_path)");
                    $stmt->execute([
                        ':post_id' => $postId,
                        ':file_name' => $fileName,
                        ':file_path' => $filePath
                    ]);
                } else {
                    $errors[] = "Failed to upload file: $fileName";
                }
            }

            if (empty($errors)) {
                echo json_encode(['success' => true, 'message' => 'Post and attachments created successfully.']);
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