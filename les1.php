<?php
$name = readline('Как вас зовут?');
$taskCounts = 3;
for ($i = 1; $i <= $taskCounts; $i++) {
    ${"task${i}"} = readline('Какая задача стоит перед вами?');
    ${"time${i}"} = readline('Сколько по времени это займет?');
    $allTime += ${"time${i}"};
}
;
echo "$name, сегодня у вас запланировано 3 приоритетные задачи на день:\n-$task1 ($time1" . "ч)\n-$task2 ($time2" . "ч)\n-$task3 ($time3" . "ч)\nПримерное  время выполнения плана = -$allTime" . "ч)\n";
