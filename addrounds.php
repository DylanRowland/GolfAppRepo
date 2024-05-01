<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
// accessControll()

// Assume that the form is submitted, and you have a variable $selectedCourse containing the selected course value.
$selectedCourse = isset($_POST['courses']) ? $_POST['courses'] : '';

// Use different image paths for each course
$course1ImagePath = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSy6f0oTM8k9zJ-sFuGVsVkdwWN7FzvSarPMVoeeW7vYA&s';
$course2ImagePath = 'https://media.istockphoto.com/id/1318713736/photo/golf-player-making-a-successful-stroke-links-golf.jpg?s=612x612&w=0&k=20&c=SDLjsj5MobUO_c1Vp0g4pyiQelNmFE7XbwhVNUKXl3k=';
$course3ImagePath = 'https://t3.ftcdn.net/jpg/02/45/65/12/360_F_245651237_dNl3J1cMvRj90p3gx6zqgfJBZX3A3xPW.jpg';

// Set the default image path
$defaultImagePath = '';

// Set the image dimensions for a larger size
$imageWidth = '800';
$imageHeight = '500';

// Determine the selected course image path
$courseMediaPath = $defaultImagePath; // Default to the default image path
if ($selectedCourse == 'course1') {
    $courseMediaPath = $course1ImagePath;
} elseif ($selectedCourse == 'course2') {
    $courseMediaPath = $course2ImagePath;
} elseif ($selectedCourse == 'course3') {
    $courseMediaPath = $course3ImagePath;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Full Width Pics - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/template/css/styles.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <?php
    navTEST();
    ?>
    <header class="py-5 bg-image-full"
        style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 55px; background-size: cover;">
        <div class="text-center my-5">
            <div class="text-center my-5">
                <!-- User profile picture starts here -->
                <?php
                // Check if the user array and its keys are defined
                if (isset($_SESSION['user']['profile']['picURL'])) {
                    $profilePicURL = $_SESSION['user']['profile']['picURL'];

                    if ($profilePicURL !== null) {
                        // If profile picture URL is not null, display the user's profile picture
                        echo '<img class="img-fluid rounded-circle mb-4" src="' . $profilePicURL . '" alt="User Profile Picture" />';
                    } else {
                        // If profile picture URL is null, display the default image
                        echo '<img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="Default Profile Picture" />';
                    }
                }
                ?>
                <!-- user profile pic ENDS here-->
                <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Add Rounds</h1>
                <br></br>
                <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Explore the popularity of golf courses</p>
            </div>
        </div>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-container">
                    <form method="post" action="/handlers/roundsHandler.php">
                        <div class="form-group">
                            <label for="courses">Courses:</label>
                            <!-- Replace the input field with a dropdown box -->
                            <select id="courses" name="courses" class="form-control">
                                <?php foreach ($_SESSION['pageData'] as $course): ?>
                                  <option value="<?php echo $course['courseID']; ?>"><?php echo $course['courseName']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="datePlayed">Date played: </label>
                            <!-- Change the input type to "date" for an actual date -->
                            <input type="date" id="datePlayed" name="datePlayed" class="form-control">

                          <label for="holesPlayed" class="mt-3">Holes Played:</label>
                          <br>
                          <!-- Use a dropdown (select) instead of an input field -->
                          <select id="holesPlayed" name="holesPlayed" class="form-control">
                              <option value="" selected disabled hidden>Select Number of Holes Played</option>
                              <option value="9">9 Holes</option>
                              <option value="18">18 Holes</option>
                          </select>
                          <br>


                            
                            <br>
                         
                        </div>

                        <div class="form-group">
                            <!-- Replace the input field with a submit button -->
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Course media section -->
                <div class="course-media mt-3">
                    <h3 class="text-center mb-3">Course Media</h3>
                    <?php
                    // Display the course media based on the selected course
                    if ($courseMediaPath) {
                        echo '<img src="' . $courseMediaPath . '" alt="Course Media" class="img-fluid" width="' . $imageWidth . '" height="' . $imageHeight . '">';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
