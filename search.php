<?php
// Verbindung zur Datenbank herstellen
$conn = mysqli_connect("localhost", "username", "password", "database");

// Suchanfrage verarbeiten
if (isset($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']);
    $sql = "SELECT * FROM content WHERE content LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);
}

// Suchergebnisse anzeigen
if (isset($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<a href='".$row['url']."'>".$row['title']."</a><br>";
    }
}
?>