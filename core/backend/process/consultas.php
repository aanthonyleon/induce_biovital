<?php
// Define el arreglo de eventos
$events = [
    [
        "id" => uniqid(),
        "title" => "All Day Event 1",
        "start" => $I . "-01",
        "end" => $I . "-01",
        "description" => "Toto lorem ipsum dolor sit incid idunt ut",
        "className" => "fc-event-danger fc-event-solid-warning",
        "location" => "Federation Square"
    ],
    [
        "id" => uniqid(),
        "title" => "All Day Event 2",
        "start" => $I . "-02",
        "end" => $I . "-02",
        "description" => "Toto lorem ipsum dolor sit incid idunt ut",
        "className" => "fc-event-danger fc-event-solid-warning",
        "location" => "Federation Square"
    ]
];

// Convierte el arreglo a formato JSON
$events_json = json_encode($events);

// Devuelve los eventos en formato JSON
echo $events_json;
?>
