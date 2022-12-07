<?php
function get_task()
{
    $name = readline('Как вас зовут?');
    $count = readline('Сколько задач у вас запланировано?');
    $allTask = '';
    $allTime = 0;
    for ($i = 1; $i <= $count; $i++) {
        ${"task${i}"} = (string) readline('Какая задача стоит перед вами?');
        ${"time${i}"} = (int) readline('Сколько по времени это займет?');
        $allTime += ${"time${i}"};
        $allTask = $allTask . ${"task${i}"} . " (" . ${"time${i}"} . "ч)\n";
    }
    echo "$name, сегодня у вас запланировано" . " ${count} приоритетные задачи на день:
    \n" . $allTask . "\nПримерное  время выполнения плана = $allTime" . "ч)
    \n";
}
echo get_task();
