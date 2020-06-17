<?php
//codigo apra poser usar eloquent
use App\Models\Job;

if (!empty($_POST))
{
    $job=new Job();
    $job->title=$_POST['title'];
    $job->description=$_POST['description'];
    $job->save();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddJobs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>AddJob</h1>
    <form action="addJob.php" method='POST'>
    <label for="title">Title</label>
    <input type="text" name='title' id='title'>
    <br>
    <label for="description">Description</label>
    <input type="text" name='description' id='description'>
    <br>
    
    <input type="submit" value="Save">
    </form>
</body>
</html>