<?php require_once 'db.php'; ?>
<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basketball</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <div class="container" id="container-teams">
            <div class="title">
                <img src="img/collaboration.png">
                <h2>Teams</h2>
            </div>

            <div class="content">
                <?php foreach (DB::tableRows("teams") as $team) : ?>
                    <p class="team" onclick="loadPlayers(<?= $team['id'] ?>);"><?= $team['name'] ?></p>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="container invisible" id="container-players">
            <div class="title">
                <img src="img/group.png">
                <h2>Players</h2>
            </div>

            <div class="content">
            </div>
        </div>

        <div class="container invisible" id="container-player-info">
            <div class="title">
                <img src="img/user.png">
                <h2>Player info</h2>
            </div>

            <div class="content">
            </div>
    </main>

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>