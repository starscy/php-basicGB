<?php
//1
//возникли трудности с множественным сравнением на не равно
//while($userAnswer != 810 || $userAnswer !=740)  - при false и true возращает true.  В цикле while всегда 1 сравниение?

$question1 = "В каком году произошло крещение Руси? Варианты ответов: 810, 988, 740    ";
$question2 = "В каком году произошла Куликовская битва? Варианты ответов: 1380, 990, 740   ";
$question3 = "В каком году произошла Невская битва? Варианты ответов: 810, 990, 1240    ";

$answer1 = 988; //Правильный вариант
$answer11 = 810;
$answer111 = 740;
$answer2 = 1380; //Правильный вариант
$answer22 = 990;
$answer222 = 740;
$answer3 = 1240; //Правильный вариант
$answer33 = 810;
$answer333 = 990;

$questions = 3;
$count = 0;

for ($i = 1; $i <= $questions; $i++) {
    ${"userAnswer${i}"} = (int) readline(${"question${i}"});
    while (${"userAnswer${i}"} != ${"answer${i}"}) {
        if (${"userAnswer${i}"} == ${"answer${i}${i}"} || ${"userAnswer${i}"} == ${"answer${i}${i}${i}"}) {
            echo "Вы не угадали\n";
            break;
        } else {${"userAnswer${i}"} = (int) readline(${"question${i}"});}
    }
    if (${"userAnswer${i}"} == ${"answer${i}"}) {
        $count++;
        echo "Правилный ответ!\n";
    }
}
echo "Вы ответили правильна на ${count} вопросов\n";

//2

$name = readline('Как вас зовут?');
$count = readline('Сколько задач у вас запланировано?');
$allTask = '';
$allTime = 0;
for ($i = 1; $i <= $count; $i++) {
    ${"task${i}"} = (string) readline('Какая задача стоит перед вами?');
    ${"time${i}"} = (int) readline('Сколько по времени это займет?');
    $allTime += ${"time${i}"};
    $allTask .= ${"task${i}"} . " (" . ${"time${i}"} . "ч)\n";
}
echo "$name, сегодня у вас запланировано" . " ${count} приоритетные задачи на день:
    \n" . $allTask . "\nПримерное  время выполнения плана = $allTime" . "ч)
    \n";

//3

$number = (int) readline("Введите число");
while (!$number) {$number = (int) readline("Введите число");}

if ($number % 8 == 1 || $number == 1) {
    echo "1 большой ";
}
if ($number % 8 == 2 || $number % 8 == 0 || $number == 2) {
    echo "2 указательный";
}
if ($number % 4 == 3 || $number == 3) {
    echo "3 средний";
}
if ($number % 2 == 0 && ($number % 6 == 0 || $number % 6 == 2) || $number == 4) {
    echo "4 безымянный";
}
if ($number % 8 == 5 || $number == 5) {
    echo "5 мизинец";
} else {
    echo "Ни один палец найти не удалось";
}

//
//P.S Можно пожалуйста больше задач? Требования к коду предпочтительнее жесткие )
