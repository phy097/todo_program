<?php
require 'config.php';
if($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute(
        array(
            ':title'=>$title,
            ':description'=>$desc,
        )
    );
    if($result) {
        echo "<script>alert('New Todo is added');window.location.href='index.php';</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="crad">
        <div class="card-body">
            <h2>Create New Todo</h2>
            <form class="" action="add.php" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="Submit">
                    <a href="index.php" class="btn btn-warning">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>