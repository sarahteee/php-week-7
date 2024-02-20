<?php
include('includes/connect.php');
include('includes/functions.php');

if(isset($_POST['login'])){
    $query = 'SELECT * 
          FROM users 
          WHERE email = "' . $_POST['email'] . '"
          AND password = "' . md5($_POST['password']) . '"
          LIMIT 1';
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result)){
    $record = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $record['id'];
    header('Location: admin/index.php');
    die();
}else{
    set_message('Incorrect username/password');
    header('Location: index.php');
    die();
}
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Students</title> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php include('reusables/nav.php');?>
        <div class="container">
            <div class="row">
                <div class="col">
                 <?php echo get_message(); ?>
                    <h1 class="display-5 mt-4 mb-4">Login</h1>
                    <form method="POST" action="admin/index.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>