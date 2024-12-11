<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assemay Alimbayeva Autos Database</title>
</head>
<body>
    <h1>Welcome to the Autos Database</h1>

    <?php
    // Display messages
    if (isset($_SESSION['error'])) {
        echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo '<p style="color: green;">' . $_SESSION['success'] . '</p>';
        unset($_SESSION['success']);
    }
    ?>

<form method="post">
        <p>
            <label for="make">Make:</label>
            <input type="text" name="make" id="make">
        </p>
        <p>
            <label for="year">Year:</label>
            <input type="text" name="year" id="year">
        </p>
        <p>
            <label for="mileage">Mileage:</label>
            <input type="text" name="mileage" id="mileage">
        </p>
        <p>
            <button type="submit">Add</button>
        </p>
    </form>

    <h2>Automobiles</h2>
    <ul>
        <?php foreach ($autos as $auto): ?>
            <li><?= htmlentities($auto['make']) . ' (' . htmlentities($auto['year']) . ') / ' . htmlentities($auto['mileage']) . ' miles'; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
