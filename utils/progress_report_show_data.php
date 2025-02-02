<?php

require_once '../config/database.php';

$srch = '';
$scr_data = '';
$output = "";

if (isset($_POST['inputvalue'])) {
    $scr_data = $_POST['inputvalue'];
    $srch .= "AND title like '%$scr_data%'";
}

try {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $post_id = $_POST['post_id'];



        $stmt1 = $pdo->prepare("SELECT * FROM project_allocation WHERE post_id=:post_id and com_status = '1'");
        $stmt1->execute([
            ':post_id' => $post_id
        ]);
        $row = $stmt1->rowCount();

        if (!$row) {
            // check project_application table status = 1
            $stmt1 = $pdo->prepare("SELECT * FROM faculty_info WHERE faculty_id = :faculty_id ");
            $stmt1->bindParam(':faculty_id', $_SESSION['faculty_id'], PDO::PARAM_STR);
            $stmt1->execute();
            $data = $stmt1->fetch(PDO::FETCH_ASSOC);
            $numrow1 = $stmt1->rowCount();

            if ($numrow1) {
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id=:post_id $srch");
                $stmt->execute([
                    ':post_id' => $post_id
                ]);
                $numrow = $stmt->rowCount();


                // $_SESSION['post_id'] = $row['post_id'] ;
                // var_dump($posts);

                if ($numrow > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        //echo '<pre>';
                        //print_r($row); 
                        $output .= '
                            <tr class="border-b :border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                    ' . $row['post_id'] . '
                                </th>
                                <td class="px-4 py-3">' . $row['title'] . '</td>
                                <td class="px-4 py-3">' . $row['domain'] . '</td>
                                <td class="px-4 py-3">' . $data['faculty_id'] . '</td>
                                <td class="px-4 py-3">' . $data['name'] . '</td>
                                <td class="px-4 py-3">' . $data['department'] . '</td>
                                <td class="px-4 py-3">Ongoing</td>
                            </tr>
            ';
                    }
                    echo $output;
                } else {
                    $output .= '<tr><td class="px-4 py-3 ">
    
                                        no record found
                                        
                                        
                                    </td></tr>';
                    echo $output;

                }
            } else {
                $output .= '<tr>no data found</tr>';
                echo $output;
            }
        } else {
            // check project_application table status = 1
            $stmt1 = $pdo->prepare("SELECT * FROM faculty_info WHERE faculty_id = :faculty_id ");
            $stmt1->bindParam(':faculty_id', $_SESSION['faculty_id'], PDO::PARAM_STR);
            $stmt1->execute();
            $data = $stmt1->fetch(PDO::FETCH_ASSOC);
            $numrow1 = $stmt1->rowCount();

            if ($numrow1) {
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id=:post_id $srch");
                $stmt->execute([
                    'post_id' => $post_id
                ]);
                $numrow = $stmt->rowCount();


                // $_SESSION['post_id'] = $row['post_id'] ;
                // var_dump($posts);

                if ($numrow > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        //echo '<pre>';
                        //print_r($row); 
                        $output .= '
                             <tr class="border-b :border-gray-700">
                                 <th scope="row"
                                     class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                     ' . $row['post_id'] . '
                                 </th>
                                 <td class="px-4 py-3">' . $row['title'] . '</td>
                                 <td class="px-4 py-3">' . $row['domain'] . '</td>
                                 <td class="px-4 py-3">' . $data['faculty_id'] . '</td>
                                 <td class="px-4 py-3">' . $data['name'] . '</td>
                                 <td class="px-4 py-3">' . $data['department'] . '</td>
                                 <td class="px-4 py-3">complete</td>
                             </tr>
             ';
                    }
                    echo $output;
                } else {
                    $output .= '<tr><td class="px-4 py-3 ">
    
            no record found
        
        
        </td></tr>';
                    echo $output;

                }
            } else {
                $output .= '<tr><td class="px-4 py-3 ">
    
            no record found
        
        
        </td></tr>';
                echo $output;
            }
        }
    }
} catch (PDOException $e) {
    // Log and handle query errors
    echo $e->getMessage();
    die("Failed to fetch data. Please try again later.");
}







?>