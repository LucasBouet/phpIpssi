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
        include_once("./data/database.php");
        $id = e($_GET['id']) ?? null;
        $article = null;

        if ($id !== false && $id !== null) {
            $stmt = $conn->prepare("SELECT id, title, content, author, created_at, published FROM Articles WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($row = $res->fetch_assoc()) {
                $article = [
                    'id' => (int) $row['id'],
                    'title' => $row['title'],
                    'content' => $row['content'],
                    'author' => $row['author'],
                    'created_at' => $row['created_at'],
                    'published' => (bool) $row['published'],
                ];
            }
            $stmt->close();
            $conn->close();
        }
        include_once("./includes/header.php");
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