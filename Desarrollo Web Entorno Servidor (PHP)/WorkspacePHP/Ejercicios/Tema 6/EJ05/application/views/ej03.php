<img src="<?= base_url() ?>/assets/img/logo.jpeg" width="300px" height="150px" alt="MiLogo">
<h2>Lista de links interesantes</h2>

<ul>
    <?php foreach ($lista as $elemento): ?>
        <li><a href=" <?= $elemento['url'] ?>"><?= $elemento['label'] ?></a></li>
    <?php endforeach; ?>
    <li><?= anchor('https://www.abc.es', 'Periodico ABC') ?></li>
</ul>

<h2>Lista con anchor</h2>

<ul>
    <?php foreach ($lista as $elemento): ?>
        <li> <?= anchor($elemento->url, $elemento->label) ?> </li>
    <?php endforeach; ?>
</ul>

<h2>prueba</h2>
<form action="">
    <input type="submit" value="SALUDAR" />
</form>