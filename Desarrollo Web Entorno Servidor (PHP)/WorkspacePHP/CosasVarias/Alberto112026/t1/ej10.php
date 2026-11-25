<?php

$formatos = [
    'normal' =>
        [
            'uno',
            'dos',
            'tres',
            'cuatro',
            'cinco',
            'seis',
            'siete',
            'ocho',
            'nueve',
            'diez'
        ],
    'romano' => [
        'i',
        'ii',
        'iii',
        'iv',
        'v',
        'vi',
        'vii',
        'viii',
        'ix',
        'x'
    ],
    'ingles' =>

        [
            'one',
            'two',
            'three',
            'four',
            'five',
            'six',
            'seven',
            'eight',
            'nine',
            'ten'
        ]
];

do {
    echo "Introduce n: ";
    $n = readLine();
}
while ($n < 1 || $n > 10);

do {
    echo "Introduce formato: ";
    $formato = readLine();
}
while (!in_array($formato, array_keys($formatos)));

for ($i = 0; $i < $n; $i++) {
    echo $formatos[$formato][$i] . ' ';
}
?>