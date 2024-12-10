<?php
// Verbindung mit der Datenbank
$host = 'db';
$db = 'testdb';
$user = 'testuser';
$password = 'testpassword';

$conn = new mysqli($host, $user, $password, $db);

// Prüfen, ob die Verbindung erfolgreich ist
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

echo "<h1>Verbindung erfolgreich!</h1>";

try {
    // Buttons aus der Tabelle `buttons` abrufen
    $sql = "SELECT * FROM buttons";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Buttons</h2>";
        
        // Buttons dynamisch generieren
        while ($button = $result->fetch_assoc()) {
            echo "<form method='POST' style='display:inline; margin: 5px;'>";
            echo "<button type='submit' name='action' value='{$button['id']}' style='background-color: {$button['color']}; padding: 10px; border: none; color: white; cursor: pointer;'>{$button['label']}</button>";
            echo "</form>";
        }
    } else {
        echo "<p>Keine Buttons gefunden!</p>";
    }

    // Prüfen, ob ein Button geklickt wurde
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $buttonId = (int)$_POST['action'];

        // Button-Daten basierend auf der ID abrufen
        $sql = "SELECT * FROM buttons WHERE id = $buttonId";
        $buttonResult = $conn->query($sql);

        if ($buttonResult->num_rows > 0) {
            $button = $buttonResult->fetch_assoc();
            echo "<h2>Aktion für Button: {$button['label']}</h2>";

            // Beispielabfrage für Benutzer
            $sql = "SELECT * FROM users";
            $userResult = $conn->query($sql);

            if ($userResult->num_rows > 0) {
                echo "<table border='1' cellpadding='5' cellspacing='0'>";
                echo "<tr><th>ID</th><th>Name</th><th>Lastname</th><th>Username</th><th>ZIP</th></tr>";

                while ($row = $userResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['lastname']}</td>";
                    echo "<td>{$row['username']}</td>";
                    echo "<td>{$row['zip']}</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>Keine Benutzer gefunden!</p>";
            }
        } else {
            echo "<p>Button nicht gefunden!</p>";
        }
    }
} catch (Exception $e) {
    echo "<h1>Fehler: " . $e->getMessage() . "</h1>";
}

// Verbindung schließen
$conn->close();
?>
