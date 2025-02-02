

<?php
require_once '../config/database.php'; // Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $domain = $_POST['domain'];
    $description = $_POST['description'];

    // Handle file upload if a new file is provided
    if (!empty($_FILES['file']['name'])) {
        $uploadDir = '../forms/uploads_post/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['file']['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            $file_uploaded = true;
        } else {
            die("File upload failed!");
        }
    } else {
        // No new file uploaded, retain the old file path
        $filePath = $_POST['existing_file_path'];
        $file_uploaded = false;
    }

    try {
        // Prepare SQL query for updating the record
        $stmt = $pdo->prepare("UPDATE posts SET title = :title, domain = :domain, description = :description, file_path = :file_path WHERE post_id = :post_id");

        $stmt->execute([
            ':title' => $title,
            ':domain' => $domain,
            ':description' => $description,
            ':file_path' => $filePath,  // Updated file path or existing file
            ':post_id' => $post_id
        ]);

        $stmt = $pdo->prepare("UPDATE attachments SET file_name=:file_name, file_path=:file_path WHERE post_id=:post_id");
                    $stmt->execute([
                        ':post_id' => $post_id,
                        ':file_name' => $fileName,
                        ':file_path' => $filePath
                    ]);

        // Success response
        echo json_encode(['success' => true, 'message' => 'Post updated successfully!']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}
?>
