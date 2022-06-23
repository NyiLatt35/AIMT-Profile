<?php if(isset($error)){ ?>
<ul>
    <?php foreach ($error as $err){ ?>
    <li class="text-danger"><?php echo $err ?></li>
    <?php } ?>
</ul>
<?php } ?>