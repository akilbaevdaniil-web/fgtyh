<?php

// Íàñòðîéêè ïîäêëþ÷åíèÿ ê áàçå äàííûõ                                                        шампиньоны
$host = 'localhost';
$db = 'j38202257_diplom';
$user = '047582029_diplom';
$pass = 'Diplom_41';

// Ïîäêëþ÷åíèå ê áàçå äàííûõ
$conn = new mysqli($host, $user, $pass, $db);

// Ïðîâåðêà ïîäêëþ÷åíèÿ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Çàïðîñ íà ïîëó÷åíèå äàííûõ
$sql = "SELECT * FROM nepoladki";
$result = $conn->query($sql);

// Ïðîâåðêà íàëè÷èÿ äàííûõ
if ($result->num_rows > 0) {
    // Ñîçäàíèå òåêñòîâîãî äîêóìåíòà
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="otchet_po_oshibkam.txt"');

    // Âûâîä çàãîëîâêîâ òàáëèöû
    echo "id\     FIO\                            otdel\          categoriy\        oshibca\              done";

    // Âûâîä äàííûõ
    while($row = $result->fetch_assoc()) {
        echo "\n". $row['id'] . "\t" . $row['FIO'] . "\t" . $row['otdel'] . "\t" . $row['categoriy'] . "\t" . "\t" . $row['oshibca'] . "\t" . $row['done']. "\n";
    }
} else {
    echo "No results found.";
}

// Çàêðûòèå ñîåäèíåíèÿ
$conn->close();




?>
