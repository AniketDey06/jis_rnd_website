<?php
require_once '../config/database.php'; // Ensure database connection is included

try {
    // Count total admins based on a specific condition (e.g., checking for certain users or admins)
    // This assumes that admins have a specific condition to distinguish them, for example, 'user_id' exists in a certain table.
    // $stmtAdmin = $pdo->prepare("SELECT COUNT(*) AS admin_count FROM users WHERE user_id IN (SELECT user_id FROM faculty_info)");
    // $stmtAdmin->execute();
    // $adminResult = $stmtAdmin->fetch(PDO::FETCH_ASSOC);
    // $admin_count = $adminResult['admin_count'];

    // Count total faculty members
    $stmtFaculty = $pdo->prepare("SELECT COUNT(*) AS faculty_count FROM faculty_info");
    $stmtFaculty->execute();
    $facultyResult = $stmtFaculty->fetch(PDO::FETCH_ASSOC);
    $faculty_count = $facultyResult['faculty_count'];

    // // Calculate the admin percentage (based on total users and total admins)
    // $stmtTotalUsers = $pdo->prepare("SELECT COUNT(*) AS total_users FROM users");
    // $stmtTotalUsers->execute();
    // $userResult = $stmtTotalUsers->fetch(PDO::FETCH_ASSOC);
    // $total_users = $userResult['total_users'];

    // if ($total_users > 0) {
    //     $admin_percentage = round(($admin_count / $total_users) * 100, 2);
    // } else {
    //     $admin_percentage = 0; // If no users exist, show 0%
    // }

    // Calculate the faculty percentage
    $stmtTotalFaculty = $pdo->prepare("SELECT COUNT(*) AS total_faculty FROM faculty_info");
    $stmtTotalFaculty->execute();
    $facultyResult = $stmtTotalFaculty->fetch(PDO::FETCH_ASSOC);
    $total_faculty = $facultyResult['total_faculty'];

    if ($total_faculty > 0) {
        $faculty_percentage = round(($faculty_count / $total_faculty) * 100, 2);
    } else {
        $faculty_percentage = 0;
    }

    // Return the data as JSON
    echo json_encode([
        'success' => true,
        'faculty_count' => $faculty_count,
        'faculty_percentage' => $faculty_percentage
    ]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
