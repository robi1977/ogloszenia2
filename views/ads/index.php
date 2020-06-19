<?php if(isset($_SESSION['is_logged)in'])) : ?>
    <a class="btn btn-success btn-add-ad" href="<?php echo ROOT_URL; ?>ads/add">Dodaj nowe ogłoszenie</a>
<?php endif ?>
<?php foreach ($model as $item): ?>
    <div class="well">
        <h3><?php echo $item['title']; ?></h3>
        <small><?php echo $item['create_date'];?></small>
        <hr/>
        <p><?php echo $item['content']; ?></p>
        <?php if(!empty($_SESSION['user_data']) && $item['user_id'] == $_SESSION['user_data']['id']) : ?>
            <a class="btn btn-danger" href="<?php echo ROOT_URL.'ads/remove'.$item['id']; ?>">Usuń</a>
            <a class="btn btn-info" href="<?php echo ROOT_URL.'ads/edit'.$item['id']; ?>">Edytuj</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>