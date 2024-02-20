<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Week 5</title> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-5 mt-4 mb-4">Student Catalog</h1>
                </div>
            </div>
            <?php
            $connect = mysqli_connect('localhost', 'root', 'root', 'HTTP5225');
            $query = 'SELECT id, fname, lname, marks, grade, imageURL FROM students';
            //$query = 'SELECT * FROM students';
            $students = mysqli_query($connect, $query);

            if(mysqli_connect_error()){
                die("Connection error: " . mysqli_connect_error());
            }
            ?>

            <div class="container">
                <div class="row">
                    <?php

                    foreach($students as $student){

                    if($student['marks'] < 50){
                        $bgClass = 'bg-danger';
                    }else{
                        $bgClass = 'bg-success';
                    }
                        
                    echo '<div class="col-md-4">
                            <div class="card ' . $bgClass . '">
                                <img class="card-img-top" src="' . $student['imageURL'] . '" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">' . $student['fname'] . ' ' . $student['lname'] . '</h5>
                                    <p>Marks: ' . $student['marks'] . '</p>
                                </div>

                                <div class="card-footer">

                                    <form method="GET" action="update.php">
                                    <input type="hidden" name="id" id="id" value="' . $student['id'] . '">
                                    <button type="submit" name="edit" class="btn btn-sm btn-info">Edit</button>
                                    </form>
                                    <form method="GET" action="includes/deleteStudent.php">
                                    <input type="hidden" name="id" value="' . $student['id'] . '">
                                    <button type="submit" name="delete" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                            ';

                    }
                    ?>
                </div>
            </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>