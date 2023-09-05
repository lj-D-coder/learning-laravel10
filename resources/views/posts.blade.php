<!DOCTYPE html>
<link rel="stylesheet" href="/app.css">
<title>my Blog</title>

<body>
    <?php foreach ($posts as $post) : ?>
        <article>
            <?= $post;?>
        </article>
    <?php endforeach; ?>

</body>
</html>
