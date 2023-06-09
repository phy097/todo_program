<?php 

require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php 
        $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <h2>Todo Home Page</h2>
            <div>
            <a href="add.php" type="button" class="btn btn-success">Create New</a>
            </div> <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        if($result) {
                            foreach($result as $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['title'] ?></td>
                        <td><?php echo $value['description'] ?></td>                       
                        <td><?php echo date('Y-m-d', strtotime($value['created_at'])) ?></td>
                        <td>
                            <a type="button" class="btn btn-warning" 
                            href="edit.php?id=<?php echo $value['id'];?>">Edit</a>
                            <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $value['id'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $i++;

                            }
                        }
                    ?>
                    

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>