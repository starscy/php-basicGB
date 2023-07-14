<?php
/**
 * @var Task $task
 */
?>
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>

<h1><?= $pageHeader ?></h1>
Добро пожаловать <?=$username?>! <a href="/?controller=security&action=logout">Выйти</a>
<a href="/">Главная</a>
<br><br>
<form action="/?controller=tasks&action=add" method="post">
    <input type="text" name="task" placeholder="Опишите новую задачу">
    <input type="submit" value="Добавить">
</form>

<?php foreach ($tasks as $task): ?>
    <div id="<?=$task->getId()?>">
        <?= $task->getDescription() ?> <a href="/?controller=tasks&action=done&id=<?=$task->getId()?>">[Done]</a>
        <button class="done" data-id="<?=$task->getId()?>">Done</button>
    </div>
<?php endforeach; ?>
<script>
    let buttons = document.querySelectorAll('.done');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/?controller=tasks&action=apidone&id=' + id);
                    const answer = await response.json();
                    document.getElementById(answer.id).remove();
                }
            )();
        })
    })
</script>
</body>
