<?php

$content = file_get_contents('from.json');
$json = json_decode($content, true);
$newArray = [];

foreach ($json as $item) {
    $newArray[] = [
        "type" => "Feature",
        "geometry" => [
            "type" => "Point",
            "coordinates" => [
                $item['yi'],
                $item['xi']
            ]
        ],
        "properties" => [
            "balloonContent" => "11",
            "hintContent" => "22",
        ],
        "options" => [
            "iconLayout" => "default#image",
            "iconImageHref" => "/assets/icons/fitepoint.svg",
            "iconImageSize" => [15, 15],
            "iconImageOffset" => [-7, -7]
        ]
    ];
}

$result = [
    "type" => "FeatureCollection",
    "features" => $newArray,
];

file_put_contents('data.json', json_encode($result));
