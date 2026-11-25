<h3>Lista de links interesantes</h3>

<ul>
    <?php foreach ($lista as $elemento): ?>
        <li><a href=" <?= $elemento['url'] ?>"><?= $elemento['label'] ?></a></li>
    <?php endforeach; ?>
</ul>