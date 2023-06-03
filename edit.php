<?php

require 'config.php';

if($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $pdostatement = $pdo->prepare("UPDATE todo SET title = '$title', description = '$desc' WHERE id = '$id'");
    $result = $pdostatement->execute();

    if($result) {
        echo "<script>alert('New Todo is updated');window.location.href='index.php';</script>";
    }

} else {
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
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
            <h2>Edit New Todo</h2>
            <form class="" action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $result[0]['description'] ?>
                    </textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" value="UPDATE">
                    <a href="index.php" class="btn btn-warning">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>