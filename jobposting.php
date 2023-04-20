<?php
if(empty($_POST["job-title"])) {die("job title is required");}
//print_r($_POST);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobs";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle job posting form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_job'])) {

  // Get form data
  $job_title = $_POST['job_title'];
  $job_description = $_POST['job_description'];
  $job_location = $_POST['location'];
  $job_type = $_POST['job_type'];
  $job_salary = $_POST['salary'];

  // Insert data into database
  $sql = "INSERT INTO jobs (job_title, job_description, job_location, job_type,job_salary)
          VALUES ('$job_title', '$job_description', '$job_location', '$job_type', '$job_salary')";

  if ($conn->query($sql) === TRUE) {
    echo "Job posted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

// Close database connection
$conn->close();


?>