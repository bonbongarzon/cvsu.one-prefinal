<?php
$errors = array();
if (count($errors) > 0) : ?>
    <div class="error">
        <?php echo $errors[0];
        foreach ($errors as $error) : ?>
            <p><?php echo $error; ?> </p>
        <?php endforeach ?>
    </div>
<?php endif ?>