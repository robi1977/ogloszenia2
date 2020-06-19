<div class="panel panel-default">
    <div class="panel-header">
        <h3 class="panel-title">Dodaj nowe ogłoszenie</h3>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo ROOT_URL; ?>add/create">
            <div class="form-group">
                <label>Tytuł</label>
                <input type="text" name="title" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Treść</label>
                <input type="text" name="content" class="form-control"/>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Dodaj" />
            <a href="<?php echo ROOT_URL; ?>ads" class="btn btn-danger">Anuluj</a>
        </form>
    </div>
</div>