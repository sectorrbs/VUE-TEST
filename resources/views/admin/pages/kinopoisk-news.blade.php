<ul>
    <?php foreach ($data['items'] as $item) { ?>
    <li>
        <div>
            <?= $item['title'] ?>
        </div>
        <div>
            <?= $item['description'] ?>
        </div>
    </li>
    <?php } ?>
</ul>
