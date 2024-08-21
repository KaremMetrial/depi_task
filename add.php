<?php
session_start();

if (isset($_POST['submit'])) {

    if (empty($_POST['name']) || empty($_POST['job']) || empty($_FILES['image']['name'])) {

        header('Location: index.php?msg=Please fill in all fields.');
        exit();

    } else {

        $name = $_POST['name'];
        $job = $_POST['job'];
        $image = $_FILES['image']['name'];

        $nameImage = date("YmdHis") . "_" . $image;

        $parts = explode(".", $image);
        $ext = strtolower(end($parts));

        $extensions = ["jpg", "jpeg", "png", "gif"];

        if (in_array($ext, $extensions)) {

            if (move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $nameImage)) {

                $_SESSION['tasks'][] = [
                    'name' => $name,
                    'job' => $job,
                    'image' => $nameImage
                ];

                header('Location: index.php?msg=File uploaded successfully');
                exit();

            } else {

                header('Location: index.php?msg=Failed to upload the file');
                exit();

            }
        } else {

            header('Location: index.php?msg=Invalid image type');
            exit();

        }
    }
}
?>
