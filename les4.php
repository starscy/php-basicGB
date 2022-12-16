<?php
//1
$array = range(-4.2, 2.4);
shuffle($array);

$isOddArray = array_map(function (int $num): string {
    return $num&1 ? "$num нечетное" : "$num четное";
}, $array);

print_r($isOddArray);

//2
function getMathArray(array $arr): array
{
    $avg = (float) array_sum($arr) / count($arr);
    return ['max' => max($arr), 'min' => min($arr), 'avg' => $avg];
}

$mathArray = getMathArray($array);

print_r($mathArray);

//3
$box = [
    0 => 'Тетрадь',
    [
        0 => 'Тетрадь',
        1 => 'Книга',
        2 => 'Настольная игра',
        3 => [
            'Настольная игра',
            'Настольная игра',
        ],
        4 => [
            [
                'Ноутбук',
                'Зарядное устройство',
            ],
            [
                'Компьютерная мышь',
                'Набор проводов',
                [
                    'Фотография',
                    'Картина',
                ],
            ],
            [
                'Инструкция',
                [
                    'Ключ',
                ],
            ],
        ],
    ],
    [
        0 => 'Пакет кошачьего корма',
        1 => [
            'Музыкальный плеер',
            'Книга',
        ],
    ],
];
// $text = (string) readline("Введите предмет");

function search(string $item, array $arr)
{
    foreach ($arr as $value) {
        if (is_array($value)) {
            if (search($item, $value)) {return search($item, $value);}
        } else {
            if ($item === $value) {
                return true;
            }
        }

    }
    return false;
}
$text1 = 'Музыкальный плеер';
$text2 = 'Зарядное устройство';
$text3 = 'Пакет кошачьего корма';
$text4 = 'Книгаk';

echo search($text1, $box) ? 'true' : 'false';
echo search($text2, $box) ? 'true' : 'false';
echo search($text3, $box) ? 'true' : 'false';
echo search($text4, $box) ? 'true' : 'false';
