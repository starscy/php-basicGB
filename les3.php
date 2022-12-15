<?php
///1  перемножение массиовов
$array1 = range(1, 10);
$array2 = range(2, 20, 2);
$multArr = [];

foreach ($array1 as $index => $num1) {
    $multArr["$num1 *  $array2[$index]"] = $num1 * $array2[$index];
}

print_r($multArr);

// 2 -3  генератор поздравлений
$name = (string) readline('Введите имя поздравляемого');
$wish0 = ['рюмку', 'стакан', 'кружку', 'торт', 'бутылку', 'лимонад', 'шампанское', 'пойло'];
$wish1 = ['космического', 'огромного', 'громадного', 'большого', 'нереального', 'гигантского', 'хорошего', 'отличного', 'много'];
$wish2 = ['здоровья', 'благополучия', 'счастья', 'везения', 'настроения', 'успеха', 'ума', 'терпения', 'творчества'];
$finalWish = [];

for ($i = 0; $i < 3; $i++) {
    shuffle(${"wish$i"});
}

foreach ($wish1 as $index => $word1) {
    if ($index < count($wish0)) {
        $finalWish[$index] = $word1 . " " . $wish2[$index];
    } else {
        $finalWish[$index] = "и " . $word1 . " " . $wish2[$index];
    }
}
$wishText = implode(',', array_slice($finalWish, 0, -1)) . ' ' . implode(' ', array_slice($finalWish, -1));
$textCongraditulation = "Многоуважаемый $name! Поздравляем вас с днем рождения! Я поднимаю " . $wish0[array_rand($wish0)] . " и желаю вам  $wishText \n";
echo $textCongraditulation;

//4
$students = [
    'ИТ20' => [
        'Иванов Иван' => 5,
        'Кириллов Кирилл' => 5,
        'Петров Петя' => 4,
        'Пидоров Иван' => 5,
        'Тимошицкий Кирилл' => 5,

    ],
    'БАП20' => [
        'Антонов Антон' => 4,
        'Идоров Иван' => 5,
        'Матюшин Кирилл' => 3,
        'Змеин Петя' => 4,
        'Cиний Петя' => 2,
    ],
    '9-Д' => [
        'Петренко Дима' => 2,
        'Милос Дима' => 2,
        'Шуров Никита' => 3,
    ],
];

$middleGrades = []; //массив со средними оценками
$firedStudents = []; //массив с отчисленными
$bestGroup = []; //массив с лучшей группой и лучшей оценкой
$bestGrade = 0;

foreach ($students as $group => $groupMembers) {
    $firedStudents[$group] = [];
    $middle = 0;
    $middleGrades[$group] = 0;
    foreach ($groupMembers as $nameStudent => $grade) {
        if ($grade < 3) {array_push($firedStudents[$group], $nameStudent);}
        $middle += $grade;
    }
    $middleGrades[$group] = $middle / count($students[$group]);
    if ($middleGrades[$group] > $bestGrade) {
        $bestGrade = $middleGrades[$group];
        $bestGroup[$group] = $middleGrades[$group];
    }
}

echo "Самые высокие показатели в группе " . array_key_first($bestGroup) . " Средний балл сотставляет $bestGrade \n";

print_r($middleGrades);
print_r($firedStudents);
print_r($bestGroup);
