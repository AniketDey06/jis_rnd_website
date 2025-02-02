<?php
require_once '../utils/admin_auth.php';

// require_once '../config/database.php';
// try {
//     $stmt = $pdo->prepare("SELECT * FROM posts");
//     $stmt->execute();
//     $posts = $stmt->fetchAll();
//     // var_dump($posts);
// } catch (PDOException $e) {
//     // Log and handle query errors
//     error_log($e->getMessage());
//     die("Failed to fetch data. Please try again later.");
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Project List</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        nav img {
            height: 60px;
        }

        .title-box {
            border-bottom: 2px solid rgb(0, 0, 0);
            font-size: 30px;
            font-weight: 600;
        }

        td .crud {
            width: 160px;
        }
    </style>
</head>

<body>


    <?php
    require_once "../includes/admin_header.php"
        ?>



    <section class="min-h-screen bg-[#E5E7EB] :bg-gray-900 p-3 sm:p-5 ">
        <div class="h-full mx-auto max-w-screen-l px-4 lg:px-12 ">
            <!-- Start coding here -->

            <div class="bg-white :bg-gray-800 relative shadow-md sm:rounded-lg ">

                <!-- Search, tools etc... -->
                <div
                    class=" flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <h1 class="title-box ">List of Projects</h1>

                </div>

                <!-- Search, tools etc... -->
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <div class="w-full md:w-1/2">
                        <form class="flex items-center" id="swdata" method="get">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 :text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" name='scr_data'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500"
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    </div>

                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">


                        <div class="flex items-center space-x-3 w-full md:w-auto">




                            <div class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 :focus:ring-gray-700 :bg-gray-800 :text-gray-400 :border-gray-600 :hover:text-white :hover:bg-gray-700"
                                type="button">

                                <a href="admin_dashboard.php">
                                    Back
                                </a>

                            </div>



                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 :focus:ring-gray-700 :bg-gray-800 :text-gray-400 :border-gray-600 :hover:text-white :hover:bg-gray-700"
                                type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Filter
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>


                            <?php
                            require_once "../includes/drowpdown.php"
                                ?>

                        </div>
                    </div>

                </div>

                <!-- table -->
                <div class="overflow-x-auto">

                    <!-- main Table -->
                    <table class="w-full text-sm text-left text-gray-500 :text-gray-400">
                        <!-- Table hade -->
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Project ID</th>
                                <th scope="col" class="px-4 py-3">Project/Research paper Name</th>
                                <th scope="col" class="px-4 py-3">Domain</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Document</th>
                                <th scope="col" class="px-4 py-3">Apply Count</th>

                                <th scope="col" class="px-4 py-3 ">
                                    Actions
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>


                        <!-- Table Data -->

                        <tbody id="result"></tbody>
                    </table>
                </div>


            </div>
        </div>
    </section>





    <script>


        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {
                searchable: false,
                perPageSelect: false
            });
        }


    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script>
         $(document).ready(function () {
            $('#viewApplicationsForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                // Collect form data
                const formData = {
                    post_id: $(this).find('input[name="post_id"]').val(),
                };

                // console.log(formData);
                //Send AJAX POST request
                $.ajax({
                    type: 'POST',
                    url: 'application_list.php', // The PHP file handling the login
                    data: formData,
                    dataType: 'json',
                    window.location.href = "application_list.php";
                });
            });
        });
    </script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        showdata();
        function showdata() {
            //Get all Form Input Data

            $.ajax({
                url: "show_data.php",
            }).done(function (data) {
                $('#result').html(data);
                //data == response
            });

        }


        $('#simple-search').on('input', function () {
            // console.log(this.value);
            const inputvalue = $(this).val();
            console.log(inputvalue);
            $.ajax({
                type: "POST",
                url: "show_data.php",
                data: { inputvalue: inputvalue },
            }).done(function (data) {
                $('#result').html(data);
                //data == response
            });
        });


        function closeApp(postId) {
            if (!confirm("Are you sure you want to close applications for this post?")) {
                return;
            }

            $.ajax({
                type: 'POST',
                url: 'close_application.php', // Backend PHP file to update the status
                data: { post_id: postId },
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.success) {
                        alert(res.message);
                        location.reload(); // Reload page to reflect the change
                    } else {
                        alert("Error: " + res.message);
                    }
                },
                error: function () {
                    alert('An error occurred. Please try again.');
                }
            });
        }


        function deletePost(postId) {
            if (!confirm("Are you sure you want to delete this post?")) {
                return;
            }

            $.ajax({
                type: 'POST',
                url: 'delete_post.php', // Backend PHP file to delete post
                data: { post_id: postId },
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.success) {
                        alert(res.message);
                        location.reload(); // Reload page to reflect changes
                    } else {
                        alert("Error: " + res.message);
                    }
                },
                error: function () {
                    alert('An error occurred. Please try again.');
                }
            });
        }





    </script>



</body>

</html>