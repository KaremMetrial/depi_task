<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['tasks']) && isset($_SESSION['tasks'][$id])) {
        $task = $_SESSION['tasks'][$id];
        $image = $task['image'];

        unset($_SESSION['tasks'][$id]);
        $_SESSION['tasks'] = array_values($_SESSION['tasks']);

        unlink('uploads/' . $image);

        header('Location: index.php?msg=Task deleted successfully');
        exit();
    } else {
        header('Location: index.php?msg=Invalid task ID');
        exit();
    }
} else {
    header('Location: index.php?msg=No task ID provided');
    exit();
}
?>
