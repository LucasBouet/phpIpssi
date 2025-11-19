<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes super articles</title>
    <link rel="stylesheet" href="./assets/css/tailwind.css">
</head>
<body>
    <?php
        include_once("./includes/functions.php");
        include_once("./data/articles.php");

        include_once("./includes/header.php");
        $choosed_id = e($_GET['id']) ?? null;
        $article = $articles[$choosed_id];
        if ($article && $article['published']) {
            ?>
            <article class="max-w-4xl mx-auto my-8 p-6 border border-gray-300 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4"><?php echo $article['title']; ?></h2>
                <p class="text-gray-700 mb-4"><?php echo $article['content']; ?></p>
                <p class="text-sm text-gray-500">Publié par <?php echo $article['author']; ?> le <?php echo date('d/m/Y à H:i', strtotime($article['created_at'])); ?></p>
            </article>            
            <?php
        } else {
            ?>
            <p class="text-center text-red-500 mt-8">Article non trouvé ou non publié.</p>
            <?php
        }

        include_once("./includes/footer.php");
    ?>
</body>
</html>