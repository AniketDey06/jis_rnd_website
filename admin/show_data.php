<?php

require_once '../config/database.php';

$srch = '';
$scr_data = '';

if (isset($_POST['inputvalue'])) {
    $scr_data = $_POST['inputvalue'];
    $srch .= "AND title like '%$scr_data%'";
}

try {
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE status = '0' $srch");
    $stmt->execute();
    $numrow = $stmt->rowCount();
    // var_dump($posts);
    $output = "";
    if ($numrow > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $post_id = $row['post_id']; // Use correct $post_id for each row
            // echo $post_id;

            // Fetch applications where post_id matches
            $stmt1 = $pdo->prepare("SELECT * FROM project_applications WHERE post_id = :post_id ");
            $stmt1->execute([':post_id' => $post_id]);
            $application_count = $stmt1->rowCount();
            //echo '<pre>';
            //print_r($row); 
            $output .= '<tr class="border-b :border-gray-700">
                                        <th scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                            ' . $row['post_id'] . '
                                        </th>
                                        <td class="px-4 py-3">' . $row['title'] . '</td>
                                        <td class="px-4 py-3">' . $row['domain'] . '</td>
                                        <td class="px-4 py-3 ">
                                            ' . $row['description'] . '
                                        </td>
                                        <td class="px-4 py-3 ">
                                            <a target="_blank" href="' . $row['file_path'] . '"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                                type="button">
                                                <!-- View Applications -->
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">' . $application_count . '</td>

                                        <td class="px-4 py-3  flex flex-col ">

                                            <!-- Modal toggle -->
                                            <form action="application_list.php" id="viewApplicationsForm" >
                                                <input type="hidden" name="post_id" value="' . $row['post_id'] . '">
                                                <button  
                                                    class="crud focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                                    type="submit">
                                                    View
                                                    Applications
                                                    <!-- <i class="fa-solid fa-arrow-up-right-from-square"></i> -->
                                                </button>

                                            </form>


                                            <a href="post_edit.php?post_id=' . $row['post_id'] . '"
                                                class="crud focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                                >
                                                Edit
                                                <!-- <i class="fa-solid fa-arrow-up-right-from-square"></i> -->
                                            </a>

                                            <button type="button" onclick="closeApp(' . $row['post_id'] . ')"
                                                class="crud focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-red-600 :hover:bg-red-700 :focus:ring-red-900">Close
                                                Applications</button>
                                            <button type="button"
                                                class="crud focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-red-600 :hover:bg-red-700 :focus:ring-red-900">Delete</button>



                                        </td>
                                    </tr>
            
            ';
        }
        echo $output;
    } 
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE status = '1' $srch");
        $stmt->execute();
        $numrow = $stmt->rowCount();
        // var_dump($posts);
        $output = "";
        if ($numrow > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $post_id = $row['post_id']; // Use correct $post_id for each row

                // Fetch applications where post_id matches
                $stmt1 = $pdo->prepare("SELECT COUNT(*) AS application_count FROM project_applications WHERE post_id = :post_id AND status = '1'");
                $stmt1->execute([':post_id' => $post_id]);
                $application_count = $stmt1->rowCount();
                //echo '<pre>';
                //print_r($row); 
                $output .= '<tr class="border-b :border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                                ' . $row['post_id'] . '
                                            </th>
                                            <td class="px-4 py-3">' . $row['title'] . '</td>
                                            <td class="px-4 py-3">' . $row['domain'] . '</td>
                                            <td class="px-4 py-3 ">
                                                ' . $row['description'] . '
                                            </td>
                                            <td class="px-4 py-3 ">
                                                <a target="_blank" href="' . $row['file_path'] . '"
                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                                    type="button">
                                                    <!-- View Applications -->
                                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3">' . $application_count . '</td>
    
                                            <td class="px-4 py-3  flex flex-col ">
    
                                                <!-- Modal toggle -->
                                                <form action="application_list.php" id="viewApplicationsForm" >
                                                    <input type="hidden" name="post_id" value="' . $row['post_id'] . '">
                                                    <button  
                                                        class="crud focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-green-600 :hover:bg-green-700 :focus:ring-green-800"
                                                        type="submit">
                                                        View
                                                        Applications
                                                        <!-- <i class="fa-solid fa-arrow-up-right-from-square"></i> -->
                                                    </button>
    
                                                </form>
    
    
                                                <button 
                                                    class="crud focus:outline-none text-white bg-gray-400 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                                    disabled>
                                                    Edit
                                                </button>
                                                <button type="button" onclick="closeApp(' . $row['post_id'] . ')"
                                                    class="crud text-white bg-gray-400 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                                    disabled>
                                                    Close Applications
                                                </button>                                         
                                                <button type="button" onclick="deletePost(' . $row['post_id'] . ')"
                                                    class="crud focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 :bg-red-600 :hover:bg-red-700 :focus:ring-red-900">Delete</button>
    
    
    
                                            </td>
                                        </tr>
                
                ';
            }
            echo $output;
        }
    


} catch (PDOException $e) {
    // Log and handle query errors
    echo $e->getMessage();
    die("Failed to fetch data. Please try again later.");
}







?>