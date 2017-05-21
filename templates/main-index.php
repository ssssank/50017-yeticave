<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php foreach ($templateData['categories'] as $category) : ?>
            <li class="promo__item promo__item--<?=htmlspecialchars($category['en_name']); ?>">
                <a class="promo__link" href="all-lots.html"><?=htmlspecialchars($category['name']); ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
            <select class="lots__select">
                <option>Все категории</option>
                <?php foreach ($templateData['categories'] as $category) : ?>
                    <option><?=htmlspecialchars($category['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <ul class="lots__list">
            <?php foreach ($templateData['lot'] as $key => $val) : ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?=htmlspecialchars($val['image']); ?>" width="350" height="260" alt="<?=htmlspecialchars($val['name']); ?>">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?=htmlspecialchars($val['category']); ?></span>
                        <h3 class="lot__title"><a class="text-link" href="/lot.php?id=<?=$key; ?>"><?=htmlspecialchars($val['name']); ?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?=htmlspecialchars($val['start_bet']); ?><b class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer">
                                <?=remainTime($val['finish_date']); ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>