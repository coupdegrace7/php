<?php

declare(strict_types=1);

require_once __DIR__ . 'php/game/game/Player.php';
require_once __DIR__ . 'php/game/game/Hedgehog.php';
require_once __DIR__ . 'php/game/game/Game.php';

use Game\Src\Game;

session_start();

if (!isset($_SESSION['game'])) {
    $numPlayers = 3;
    $spikes = 10;
    $_SESSION['game'] = serialize(new Game($numPlayers, $spikes));
}

$game = unserialize($_SESSION['game']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['play'])) {
    $game->playRound();
    $_SESSION['game'] = serialize($game);
}

$leaderboard = $game->getLeaderboard();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ой, Колючки!</title>
</head>
<body>
    <h1>Игра "Ой, Колючки!"</h1>
    <form method="post">
        <button type="submit" name="play">Играть раунд</button>
    </form>
    <h2>Текущие результаты</h2>
    <ul>
        <?php foreach ($leaderboard as $player): ?>
            <li><?= htmlspecialchars($player->name) ?>: <?= htmlspecialchars((string)$player->points) ?> очков</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
