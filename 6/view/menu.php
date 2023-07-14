<?php  if($username):?> 
    <a href="/">Главная</a>
<a href="/?controller=tasks">Задачи</a>
<?php else :?>
     <a href="/?controller=security">Войти</a>
<?php endif;?>

<br>
<?php if ($username !== null) : ?>
<p>Рады вас приветствовать, <?= $username ?>. <a href="?action=logout">[Выход]</a></p>
<?php endif;?>