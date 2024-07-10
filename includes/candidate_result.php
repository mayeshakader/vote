<?php
session_start();
error_reporting(0);

// Hardcoded data for demonstration purposes
$candidates = [
    [
        'position' => 'Chairman',
        'data' => [
            ['cname' => 'Mr,Rahim', 'tvotes' => 120],
            ['cname' => 'Mr.Karim', 'tvotes' => 150]
        ]
    ],
    [
        'position' => 'Vice Chairman',
        'data' => [
            ['cname' => 'Mr.Jabbar', 'tvotes' => 130],
            ['cname' => 'Mr.Kuddus', 'tvotes' => 140]
        ]
    ],
    [
        'position' => 'Councilor',
        'data' => [
            ['cname' => 'Ms.Shaifa', 'tvotes' => 110],
            ['cname' => 'Ms.Abida', 'tvotes' => 115]
        ]
    ]
];

$i = 0;
foreach ($candidates as $positionData) {
    $pos = $positionData['position'];
    $candidateData = $positionData['data'];

    echo "ctx[$i] = document.getElementsByClassName('myChart')[$i].getContext('2d');
        myChart[$i] = new Chart(ctx[$i], {
            type: 'bar',
            data: {
                labels: ["; 

    foreach ($candidateData as $candidate) {
        echo "'{$candidate['cname']}',";
    }

    echo "],
                datasets: [{
                    label: '$pos',
                    data: [";

    foreach ($candidateData as $candidate) {
        echo "{$candidate['tvotes']},";
    }

    echo "],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
        });
    ";
    $i++;
}
?>
