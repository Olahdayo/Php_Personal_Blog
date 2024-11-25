<?php
require 'config.php';

if (isset($_GET['id'])) {
    $stmt = $connect->prepare('SELECT * FROM blog_posts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $post = $stmt->fetch();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];

        $stmt = $connect->prepare('UPDATE blog_posts SET title = ?, content = ?, author = ? WHERE id = ?');
        $stmt->execute([$title, $content, $author, $_GET['id']]);

        header('Location: post.php?id=' . $_GET['id']);
        exit;
    }
} else {
    die('Post not found.');
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php include("templates/header.php"); ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-3 shadow-sm">
                    <h1 class="display-6 mb-4">Edit Post</h1>
                    <form action="edit.php?id=<?= $post['id']; ?>" method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="<?= htmlspecialchars($post['title']); ?>" >
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" name="author" id="author"
                                value="<?= htmlspecialchars($post['author']); ?>" >
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="content"
                                rows="8" required><?= htmlspecialchars($post['content']); ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="post.php?id=<?= $post['id']; ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                            <button type="submit" class="btn btn-dark">
                                <i class="fas fa-save me-2"></i>Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("templates/footer.php"); ?>
</html>