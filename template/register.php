<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="icon" type="image/x-icon" href="/img/cv_icon.png">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <script src="https://kit.fontawesome.com/9911e4038a.js" crossorigin="anonymous"></script>



    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href='../assets/css/proposal_submission.css'>

</head>

<body>
    <div class="body">
        <?php
            include '../includes/header.php';
        ?>

        <div class="mycont ">
            <form action="" enctype="multipart/form-data" id="researchForm">

                <!-- Personal Info -->
                <div class="pres-info myshadow">
                    <div class="heading">
                        <h2>Personal Info</h2>
                    </div>

                    <div class="pres-info-row">
                        <div class="pres-info-col col-sm-4">
                            <label for="upload">Upload Photo</label>
                            <input type="file" class="up form-control nopadding" name="profile_photo" id="up"
                                accept="image/png, image/jpeg" required>
                            <br>

                            <label>Faculty Id</label>
                            <input type="text" name="faculty_id" class="form-control" placeholder="Enter Faculty-id"
                                required>
                            <br>

                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Fullname" required>
                            <br>


                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            <br>

                            <label>Choose your institute where you are working</label>
                            <select name="institute_s" id="cars" class="form-control">
                                <option value="JIS K">JIS K</option>
                                <option value="NIT">NIT</option>
                                <option value="JIS U">JIS U</option>
                                <option value="GNIT">GNIT</option>
                            </select>


                        </div>

                        <div class="pres-info-col col-sm-4">
                            <Label>Date of Birth</Label>
                            <input type="date" name="dob" class=" form-control" placeholder="Date Of Birth" required>
                            <br>

                            <Label>Address</Label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                            <br>

                            <Label>Gender</Label>
                            <div class="gen">

                                <input type="radio" name="gender" class="" id="Male" value="Male">
                                <label for="Male">Male</label>

                                <input type="radio" name="gender" class="" id="Female" value="Female">
                                <label for="Female">Female</label>

                                <input type="radio" name="gender" class="" id="Others" value="Others">
                                <label for="Others">Others</label>

                            </div>
                            <br>

                            <Label>Password</Label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password"
                                required>
                            <br>

                        </div>

                        <div class="pres-info-col col-sm-3">
                            <Label>Department</Label>
                            <input type="text" name="department" class="form-control" placeholder="Enter Department">
                            <br>

                            <label>Mobile Number</label>
                            <input type="tel" maxlength="10" pattern="[0-9]{10}" name="phone" class="form-control"
                                placeholder="Enter Mobile Number" required>
                            <br>

                            <label>Alternet Mobile Number</label>
                            <input type="tel" maxlength="10" pattern="[0-9]{10}" name="alternate_phone"
                                class="form-control" placeholder="Enter Mobile Number" required>
                            <br>

                            <Label>Confirm Password</Label>
                            <input type="password" name="ps" class="form-control" placeholder="Enter Password" required>
                            <br>
                        </div>
                    </div>
                </div>

                <!-- Professional Info -->
                <div class="pro-info myshadow">
                    <div class="heading">
                        <h2>Professional Info</h2>
                    </div>

                    <div class="pres-info-row ">
                        <div class="pres-info-col col-sm-4">
                            <Label>Area of interest</Label>
                            <input type="text" name="area_of_interest" class="form-control"
                                placeholder="area of interest" required>
                            <br>

                        </div>

                        <div class="pres-info-col col-sm-4">
                            <label>Language</label>
                            <input type="text" name="language" class="form-control" placeholder="e.g. English" required>
                            <br>


                        </div>

                        <div class="pres-info-col col-sm-4">

                            <label>Skills</label>
                            <input type="text" name="skills" class="form-control" placeholder="e.g. HTML, CSS">

                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="edu myshadow">
                    <div class="heading">
                        <h2>Educational Qualification</h2>
                    </div>

                    <div class="degree">
                        <div class="panel panel-default">
                            <div class="panel-body">


                                <div class="col-sm-3 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="institute" name="institute[]"
                                            placeholder="Institute Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-3 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="uniboard" name="uniboard[]"
                                            placeholder="University/Board" required>
                                    </div>
                                </div>
                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="course" name="course[]"
                                            placeholder="Course" required>
                                    </div>
                                </div>

                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="marks" name="marks[]"
                                            placeholder="Marks(%/CGPA)" required>
                                    </div>
                                </div>


                                <div class="col-sm-2 nopadding">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="passingYear[]"
                                                placeholder="Passing Year" required>

                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button"
                                                    onclick="education_fields();">
                                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="education_fields">

                                </div>

                                <div class="clear">

                                </div>

                            </div>
                            <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to
                                    add
                                    another form field
                                    :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to
                                    remove
                                    form field :)</small>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Projects -->
                <div class="pro-info myshadow">
                    <div class="heading">
                        <h2>Previous Research Paper/ Projects</h2>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="col-sm-4 nopadding">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="project" name="project[]"
                                        placeholder="Project Name">
                                </div>
                            </div>

                            <div class="col-sm-8 nopadding">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="project_description"
                                            name="project_description[]" placeholder="Project Description">

                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button" onclick="project_fields();">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="project_fields">
                            </div>
                            <div class="clear"></div>

                        </div>
                        <div class="panel-footer">
                            <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add
                                another form field
                                :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove
                                form
                                field :)</small>
                        </div>
                    </div>
                </div>




                <div class="submit">
                    <label for="sub">
                        <input type="checkbox" id="sub" name="" value="" required>
                        I, hereby declare that the details given above are correct and true to the best of my knowledge
                        and ability.
                    </label>

                    <input type="submit" name="submit" class="sbtn">
                </div>

            </form>
        </div>

        <?php 
        include '../includes/footer.php';
        ?>
    </div>

    <script src="https://kit.fontawesome.com/9911e4038a.js" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="../assets/js/register.js"></script>
    <script>
    $(document).ready(function() {
        // Handle form submission
        $("#researchForm").on("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "http://localhost/R&D%20website/forms/proposal_submission.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#responseMessage').text(response).css('color', 'green');
                    window.location.href = "http://localhost/R&D%20website/template/login.php";
                },
                error: function() {
                    $('#responseMessage').text('An error occurred. Please try again.').css('color', 'red');
                },
            });
        });
    });
    </script>
</body>

</html>