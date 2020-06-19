<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Załóż konto</h3>
    </div>
    <div class="panel panel-body">
        <form method="POST" action="<?php echo ROOT_URL; ?>users/createAccount">
        <div class="form-group">
                <label>Imię</label>
                <input type="text" name="name" class="form-control" />    
        </div>
        <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label>Hasło</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Załóż" />
        </form>
    </div>
</div>