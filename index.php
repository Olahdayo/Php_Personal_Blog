<?php
require 'config.php';
//query sql and show blogs in decscending order 
$stmt = $connect->query('SELECT * FROM blog_posts ORDER BY created_at DESC');
//gets all rows as an array
$posts = $stmt->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">

<?php include("templates/header.php"); ?>
<section class="bg-light de">
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 mb-4 text-dark">Latest Posts</h1>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-6 col-lg-6">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="post.php?id=<?= $post['id']; ?>" class="text-decoration-none text-dark">
                                    <?= htmlspecialchars($post['title']); ?>
                                </a>
                            </h5>
                            <p class="text-muted small mb-2">
                                <i class="fas fa-user me-2"></i><?= htmlspecialchars($post['author']); ?>
                            </p>
                            <p class="card-text text-secondary">
                                <?= substr(htmlspecialchars($post['content']), 0, 100); ?>...
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="post.php?id=<?= $post['id']; ?>" class="btn btn-outline-dark btn-sm">Read More</a>
                                <div>
                                    <a href="edit.php?id=<?= $post['id']; ?>" class="btn btn-sm btn-light me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $post['id']; ?>"
                                        class="btn btn-sm btn-light"
                                        onclick="return confirm('Are you sure you want to delete this blog?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include("templates/footer.php"); ?>

</html>