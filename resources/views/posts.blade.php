<!DOCTYPE html>
<link rel="stylesheet" href="/app.css">
<title>my Blog</title>

<body>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h1>
                <a href="/posts/<?= $post->slug;?>">
                    <?= $post->title;?></h1>
                </a>
                <div>
                    <?= $post->excerpt;?></h1>
                </div>

        </article>
    <?php endforeach; ?>

</body>
</html>
