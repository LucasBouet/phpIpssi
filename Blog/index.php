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
        #include_once("./data/articles.php");
        include_once("./data/database.php");

        include_once("./includes/header.php");

        $db_articles = [];
        $sql = "SELECT id, title, content, author, created_at, published FROM Articles";
        $result = $conn->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $db_articles[] = [
                    'id' => (int) $row['id'],
                    'title' => $row['title'],
                    'content' => $row['content'],
                    'author' => $row['author'],
                    'created_at' => $row['created_at'],
                    'published' => (bool) $row['published'],
                ];
            }
            $result->free();
        };

        $articles_length = count($db_articles);

        ?>
        <div id="articles">
            <?php
                for ($i = 0; $i < $articles_length; $i++) {
                    $article = $db_articles[$i];
                    if ($article['published']) {
                        ?>
                        <a href="article.php?id=<?php echo $article['id']; ?>">
                            <article style="animation: slideInRight 0.35s ease-out forwards <?php echo ($i * 200 + 200) ?>ms;opacity: 0;" class="max-w-4xl mx-auto my-8 p-6 border border-gray-300 rounded-lg shadow-lg">
                                <h2 class="text-2xl font-bold mb-4"><?php echo $article['title']; ?></h2>
                                <p class="text-gray-700 mb-4"><?php echo excerpt($article['content'], 200); ?></p>
                                <div class="flex justify-between items-center w-full">
                                    <p class="text-sm text-gray-500">Publié par <?php echo $article['author']; ?> le <?php echo date('d/m/Y à H:i', strtotime($article['created_at'])); ?></p>
                                    <p class="text-sm text-green-700 ">Learn more...</p>
                                </div>
                                
                            </article>
                        </a>
                        <?php
                    }
                }
            ?>
        </div>
    <?php
        include_once("./includes/footer.php");
        $conn->close();
    ?>
    
</body>
</html>
