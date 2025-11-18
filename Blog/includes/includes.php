<?php
declare(strict_types=1);

/**
 * Formater une date
 *
 * @param string $date Date au format Y-m-d H:i:s
 * @param string $format Format de sortie
 * @return string Date formatée
 */
function formatDate(string $date, string $format = 'd/m/Y à H:i'): string
{
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}

/**
 * Créer un extrait de texte
 *
 * @param string $text Texte complet
 * @param int $length Longueur maximale
 * @return string Extrait
 */
function excerpt(string $text, int $length = 150): string
{
    if (strlen($text) <= $length) {
        return $text;
    }

    // Couper au dernier espace avant la limite
    $excerpt = substr($text, 0, $length);
    $lastSpace = strrpos($excerpt, ' ');

    if ($lastSpace !== false) {
        $excerpt = substr($excerpt, 0, $lastSpace);
    }

    return $excerpt . '...';
}

/**
 * Trouver un article par son ID
 *
 * @param array $articles Tableau des articles
 * @param int $id ID de l'article
 * @return array|null Article trouvé ou null
 */
function findArticleById(array $articles, int $id): ?array
{
    foreach ($articles as $article) {
        if ($article['id'] === $id) {
            return $article;
        }
    }

    return null;
}

/**
 * Échapper les sorties HTML (sécurité XSS)
 *
 * @param string $value Valeur à échapper
 * @return string Valeur échappée
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Obtenir l'URL actuelle
 *
 * @return string URL actuelle
 */
function currentUrl(): string
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];

    return $protocol . '://' . $host . $uri;
}

/**
 * Vérifier si on est sur une page
 *
 * @param string $page Nom de la page
 * @return bool
 */
function isCurrentPage(string $page): bool
{
    $currentScript = basename($_SERVER['PHP_SELF']);
    return $currentScript === $page;
}
?>