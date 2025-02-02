<?php
require_once '../config/database.php'; // Ensure database connection is included

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];

    try {
        // Delete post from the database
        $stmt = $pdo->prepare("DELETE FROM posts WHERE post_id = :post_id");
        $stmt->execute([':post_id' => $post_id]);

        echo json_encode(['success' => true, 'message' => 'Post deleted successfully!']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
