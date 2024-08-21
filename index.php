<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="form-content row">
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="row my-3">
                <div class="col">
                    <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name">
                </div>
                <div class="col">
                    <input type="text" name="job" class="form-control" placeholder="Job" aria-label="Job">
                </div>
            </div>
            <div class="my-3">
                <input class="form-control" name="image" type="file" id="formFileMultiple" multiple>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <?php if (isset($_GET['msg'])): ?>
                <div class="alert alert-info my-3" role="alert">
                    <?= $_GET['msg']; ?>
                </div>
            <?php endif; ?>
        </form>
    </div>

    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Job</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($_SESSION['tasks']) && !empty($_SESSION['tasks'])): ?>
                <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
                    <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td><?= $task['name']; ?></td>
                        <td><?= $task['job']; ?></td>
                        <td>
                            <?php if (!empty($task['image'])): ?>
                                <img src="uploads/<?= $task['image']; ?>" alt="" style="max-width: 100px;">
                            <?php endif; ?>
                        </td>
                        <td><a class="btn btn-danger" href="delete.php?id=<?= $index; ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No tasks available.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
