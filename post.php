<?php
require 'config.php';

if (isset($_GET['id'])) {
    //prepare statement with placeholder value and execution
    $stmt = $connect->prepare('SELECT * FROM blog_posts WHERE id = ?');
    $stmt->execute([$_GET['id']]);

    //fetch results
    $post = $stmt->fetch();

    //end execution if no ID found
} else {
    die('Post not found.');
}

?>

<!DOCTYPE html>
<html lang="en">
    <?php include("templates/header.php"); ?>

    <div class="container py-5  bg-light de">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <article class="bg-white p-4 p-md-5 rounded-3 shadow-sm">
                    <h1 class="display-5 mb-3"><?= htmlspecialchars($post['title']); ?></h1>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-user-circle fs-5 text-secondary me-2"></i>
                        <span class="text-secondary"><?= htmlspecialchars($post['author']); ?></span>
                        <span class="mx-2">•</span>
                        <i class="far fa-calendar-alt text-secondary me-2"></i>
                        <span class="text-secondary"><?= date('F j, Y', strtotime($post['created_at'])); ?></span>
                    </div>
                    <div class="content">
                        <?= nl2br(htmlspecialchars($post['content'])); ?>
                    </div>
                </article>

                <div class="mt-4">
                    <a href="index.php" class="btn btn-outline-dark">
                        <i class="fas fa-arrow-left me-2"></i>Back to Blogs
                    </a>
                </div>
            </div>
        </div>
    </div>



    <?php include("templates/footer.php"); ?>
</html>