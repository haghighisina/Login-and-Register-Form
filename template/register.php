<?php require_once __DIR__.'/header.php'; ?>
<section class="container" id="RegisterForm">
    <form action="index.php/register" method="post">
        <div class="card">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <?php if ($hasErrors):?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($errors as $errorMessage):?>
                            <p><?= $errorMessage ;?></p>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" value="<?= escape($username); ?>" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" value="<?= escape($password); ?>" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="passwordRepeat">Passwort wiederholen</label>
                    <input type="password" value="<?= escape($passwordRepeat); ?>" name="passwordRepeat" id="passwordRepeat" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Register</button>
            </div>
        </div>
    </form>
</section>
<?php require_once __DIR__.'/footer.php'; ?>
