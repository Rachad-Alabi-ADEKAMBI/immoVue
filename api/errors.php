<div class="bg-light mt-5">
    <h2>
        Merci de corriger les erreurs suivantes:
    </h2>
    <ul>
        <?php foreach ($errors as $error): ?>
        <li style="color: red"><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<?php exit();
?>