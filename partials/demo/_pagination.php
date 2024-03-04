<div class="pagination-area">
    <a href="/category/<?= $caption ?>/page<?= $page - 1 ?>" class="prev page-numbers"><i class="icofont-double-left"></i></a>
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <a href="/category/<?= $caption ?>/page<?= $i ?>" class="page-numbers <?= $i === $page ? 'current' : '' ?>" onclick="showPage(<?= $i ?>, <?= $category_id ?>)"><?= $i; ?></a>
    <?php endfor; ?>
    <a href="/category/<?= $caption ?>/page<?= $page + 1 ?>" class="next page-numbers"><i class="icofont-double-right"></i></a>
</div>

<?php if ($page > 1) : ?>
    <a class="prev page-numbers" href="/category/<?= $caption ?>/page<?= $page - 1 ?>" onclick="showPage(<?= $page - 1 ?>, <?= $category_id ?>)"></a>
<?php endif; ?>

<?php if ($page < $total_pages) : ?>
    <a class="next page-numbers" href="/category/<?= $caption ?>/page<?= $page + 1 ?>" onclick="showPage(<?= $page + 1 ?>, <?= $category_id ?>)"></a>
<?php endif; ?>
</div>
