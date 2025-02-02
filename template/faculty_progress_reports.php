<?php
require_once '../utils/faculty_auth.php';
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $post_id = $_GET['post_id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Faculty Progress Reports</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        nav img{
            height: 60px;
        }

        .title-box{
            border-bottom: 2px solid rgb(0, 0, 0);
            font-size: 30px;
            font-weight: 600;
        }
    </style>
</head>

<body>


<?php
   include '../includes/faculty_header.php';
   ?>

    <section class="min-h-screen bg-[#E5E7EB] :bg-gray-900 p-3 sm:p-5 ">
        <div class="h-full mx-auto w-4/5 px-4 lg:px-12 ">
            <!-- Start coding here -->

            <div class="bg-white :bg-gray-800 relative shadow-md sm:rounded-lg ">

                <!-- Search, tools etc... -->
                <div
                    class=" flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <h1 class="title-box ">Progress Reports</h1>

                </div>

                <!-- Search, tools etc... -->
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
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
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 :bg-gray-700 :border-gray-600 :placeholder-gray-400 :text-white :focus:ring-primary-500 :focus:border-primary-500"
                                    placeholder="Search" required="">
                            </div>
                        </form>
                    </div>

                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">


                        <div class="flex items-center space-x-3 w-full md:w-auto">


                            

                            <div 
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 :focus:ring-gray-700 :bg-gray-800 :text-gray-400 :border-gray-600 :hover:text-white :hover:bg-gray-700"
                                type="button">
                                
                                <a href="../">
                                    back
                                </a>
                                
                            </div>

                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 :focus:ring-gray-700 :bg-gray-800 :text-gray-400 :border-gray-600 :hover:text-white :hover:bg-gray-700"
                                type="button">
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


                            <div id="filterDropdown"
                                class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow :bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-gray-900 :text-white">Choose brand</h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                    <li class="flex items-center">
                                        <input id="apple" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="apple"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">Apple
                                            (56)</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="fitbit" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="fitbit"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">Microsoft
                                            (16)</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="razor" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="razor"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">Razor
                                            (49)</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="nikon" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="nikon"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">Nikon
                                            (12)</label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="benq" type="checkbox" value=""
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 :focus:ring-primary-600 :ring-offset-gray-700 focus:ring-2 :bg-gray-600 :border-gray-500">
                                        <label for="benq"
                                            class="ml-2 text-sm font-medium text-gray-900 :text-gray-100">BenQ
                                            (74)</label>
                                    </li>
                                </ul>
                            </div>
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
                                <th scope="col" class="px-4 py-3">Faculty ID</th>
                                <th scope="col" class="px-4 py-3">Faculty Name</th>
                                <th scope="col" class="px-4 py-3">Faculty Institute</th>
                                <th scope="col" class="px-4 py-3">Project Status</th>
                                
                                
                            </tr>
                        </thead>

                        <!-- Table Data -->
                        <tbody id="result">
                        </tbody>
                        

                    </table>


                    <table class="w-full text-sm text-left text-gray-500 :text-gray-400">
                        <!-- Table hade -->
                        <thead class=" text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Upload Monthly Progress Report</th>
                                <th scope="col" class="px-4 py-3">Actions</th>
                                
                            </tr>
                        </thead>

                        <tbody>

                            <tr class="border-b :border-gray-700">
                                <form  id="postForm" enctype="multipart/form-data">
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap :text-white">
                                          <input type="hidden" name="post_id" value='<?= htmlspecialchars($row['post_id'] ?? 'N/A', ENT_QUOTES, 'UTF-8') ?>'>
                                        
                                            <input name="file"
                                                class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  :text-gray-400 focus:outline-none  :bg-gray-700  :border-gray-600  :placeholder-gray-400"
                                                aria-describedby="file_input_help" id="file_input" type="file">
                                        
                                    </th>
                                    <td class="px-4 py-3">
                                        <button data-modal-hide="static-modal" type="submit"
                                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center :bg-blue-600 :hover:bg-blue-700 :focus:ring-blue-800">
                                            Submit
                                        </button>
                                    </td>
                                    <div id="responseMessage" class=" text-center text-sm"></div>
                                </form>
                                <!-- <td class="px-4 py-3">meaniket@gmail.com</td>
                                <td class="px-4 py-3">9679812051</td> -->
                                
                                
                            </tr>

                            
                        </tbody>

                        

                    </table>


                    <table class="w-full text-sm text-left text-gray-500 :text-gray-400">
                        <!-- Table hade -->
                        <thead class=" text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Date of Submission</th>
                                <th scope="col" class="px-4 py-3">Previous Progress Report</th>
                                
                            </tr>
                        </thead>

                        <tbody id="result2">
                        </tbody>

                        

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        var post_id = "<?php echo $post_id; ?>";
        showdata(post_id);
        function showdata(post_id) {
            //Get all Form Input Data
            
            $.ajax({
                type: "POST",
                url: "../utils/progress_report_show_data.php",
                data: { post_id: post_id },
            }).done(function (data) {
                $('#result').html(data);
                //data == response
            });

        }


        $('#simple-search').on('input', function () {
            // console.log(this.value);
            const inputvalue = $(this).val();
            // console.log(inputvalue);
            $.ajax({
                type: "POST",
                url: "../utils/progress_report_show_data.php",
                data: { inputvalue: inputvalue },
            }).done(function (data) {
                $('#result').html(data);
                //data == response
            });
        });
    
        $(document).ready(function () {
            $('#postForm').on('submit', function (e) {
                e.preventDefault(); // Prevent default form submission

                // Collect form data
                var formData = new FormData(this);
                formData.append("post_id", post_id);

                // Send AJAX POST request
                $.ajax({
                    type: 'POST',
                    url: '../forms/progress_submit.php', // The PHP file handling the login
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // console.log(response);
                        var res = JSON.parse(response);
                        if (res.success) {
                            alert(res.message);
                            location.reload(); // Reload page to reflect changes
                        } else {
                            alert("Error: " + res.message);
                        }
                    },
                    error: function () {
                        // $('#responseMessage').text('An error occurred. Please try again.').css('color', 'red');
                        alert("An error occurred. Please try again.");
                    },
                });
            });
        });

        showdata1(post_id);
        function showdata1(post_id) {
            //Get all Form Input Data

            $.ajax({
                type: "POST",
                url: "../utils/progress_report_show.php",
                data: { post_id: post_id },
            }).done(function (data) {
                $('#result2').html(data);
                //data == response
            });

        }
    </script>


</body>

</html>