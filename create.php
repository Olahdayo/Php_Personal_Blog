<?php
require 'config.php';

$errors = ['title' => '', 'content' => '', 'author' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate Title
    if (empty($_POST['title'])) {
        $errors['title'] = 'A title is required';
    } else {
        $title = trim($_POST['title']);
        if (strlen($title) < 5) {
            $errors['title'] = 'Title must be at least 5 characters long';
        }
    }

    // Validate Author
    if (empty($_POST['author'])) {
        $errors['author'] = 'An author name is required';
    } else {
        $author = trim($_POST['author']);
        if (
            strlen($author) < 3
        ) {
            $errors['author'] = 'Author name must be at least 3 characters long';
        }
    }

    // Validate Content
    if (empty($_POST['content'])) {
        $errors['content'] = 'Content cannot be empty';
    } else {
        $content = trim($_POST['content']);
        if (
            strlen($content) < 50
        ) {
            $errors['content'] = 'Content must be at least 50 characters long';
        }
    }

    // If no errors, proceed with database insertion
    if (empty(array_filter($errors))) {
        $stmt = $connect->prepare('INSERT INTO blog_posts (title, content, author) VALUES (?, ?, ?)');
        $stmt->execute([$title, $content, $author]);

        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post - Fox Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-light">
    <?php include("templates/header.php"); ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-3 shadow-sm">
                    <h1 class="display-6 mb-4">Create New Post</h1>
                    <form action="create.php" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control <?= !empty($errors['title']) ? 'is-invalid' : '' ?>"
                                name="title" id="title" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>" />
                            <div class="text-danger">
                                <?php echo $errors['title']; ?>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control"
                                name="author" id="author" value="<?= htmlspecialchars($_POST['author'] ?? '') ?>" />
                            <div class="text-danger">
                                <?php echo $errors['author']; ?>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="8" value="<?= htmlspecialchars($_POST['content'] ?? '') ?>"></textarea>
                            <div class="text-danger">
                                <?php echo $errors['content']; ?>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                            <button type="submit" class="btn btn-dark">
                                <i class="fas fa-plus me-2"></i>Create Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("templates/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>