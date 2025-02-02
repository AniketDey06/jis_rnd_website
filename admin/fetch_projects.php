<?php


require_once '../config/database.php'; // Ensure database connection is included

try {
    // Fetch all projects from the "posts" table
    $stmt = $pdo->prepare("SELECT p.post_id, p.title, p.domain, p.status, 
                          (SELECT COUNT(*) FROM project_allocation WHERE project_allocation.post_id = p.post_id AND project_allocation.com_status = '1') AS completed_projects 
                          FROM posts p");
    $stmt->execute();
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $output = '';

    if (!empty($projects)) {
        foreach ($projects as $project) {
            // Determine status message
            if ($project['status'] == 0) {
                $status_message = "New Launch";
            } elseif ($project['status'] == 1 && $project['completed_projects'] > 0) {
                $status_message = "Completed"; // If at least one project_allocation has com_status = 1
            } elseif($project['status'] == 1) {
                $status_message = "Ongoing";
            }else{
              $status_message = "NONE";
            }

            // Build the table row output
            $output .= '<tr>
                          <td class="py-2 px-4 border-b border-b-gray-50">
                            <div class="flex items-center">
                              <a href="#" class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">'
                                . htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') .
                              '</a>
                            </div>
                          </td>
                          <td class="py-2 px-4 border-b border-b-gray-50">
                            <span class="text-[13px] font-medium text-gray-400">'
                                . htmlspecialchars($project['domain'], ENT_QUOTES, 'UTF-8') .
                            '</span>
                          </td>
                          <td class="py-2 px-4 border-b border-b-gray-50">
                            <span class="text-[13px] font-medium text-gray-400">'
                                . $status_message .
                            '</span>
                          </td>
                        </tr>';
        }
    } else {
        $output = '<tr><td colspan="3" class="py-4 text-center text-gray-500">No projects available</td></tr>';
    }

    echo $output;
} catch (PDOException $e) {
    echo '<tr><td colspan="3" class="py-4 text-center text-red-500">Error: ' . $e->getMessage() . '</td></tr>';
}
?>
