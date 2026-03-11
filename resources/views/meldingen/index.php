<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <div style="height: 300px; background: #ededed; display: flex; justify-content: center; align-items: center; color: #666666;">
        <table class="meldingen-table">
            <thead>
                <tr>
                    <th>Attractie</th>
                    <th>Type</th>
                    <th>Prioriteit</th>
                    <th>Capaciteit</th>
                    <th>Melder</th>
                    <th>Overige_info</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    require_once '../../../config/conn.php';
                    $query = "SELECT * FROM meldingen";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach($meldingen as $item):?>
                <div>
                <tr>
                    <td><?php echo $item['attractie'];?></td>
                    <td><?php echo $item['type'];?></td>
                    <td><?php echo $item['prioriteit'];?></td>
                    <td><?php echo $item['capaciteit'];?></td>
                    <td><?php echo $item['melder'];?></td>
                    <td><?php echo $item['overige_info'];?></td>
                </tr>
                </div>
                <?php endforeach; ?>
            </tbody>
        </div>
    </div>

</body>

</html>