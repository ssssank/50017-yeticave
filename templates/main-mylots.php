<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="all-lots.html">Разное</a>
            </li>
        </ul>
    </nav>
    <section class="rates container">
        <h2>Мои ставки</h2>
        <table class="rates__list">
            <?php foreach ($templateData['bets'] as $bet) : ?>
                <?php $lot_id = $bet['lot_id']; ?>
                <tr class="rates__item">
                    <td class="rates__info">
                        <div class="rates__img">
                            <img src="../img/rate<?=$bet['lot_id'] + 1; ?>.jpg" width="54" height="40" alt="Сноуборд">
                        </div>
                        <h3 class="rates__title">
                            <a href="<?='lot.php?id=' . $bet['lot_id']; ?>">
                                <?=$templateData['lots'][$lot_id]['lot-name']; ?>
                            </a>
                        </h3>
                    </td>
                    <td class="rates__category">
                        <?=$templateData['lots'][$lot_id]['category']; ?>
                    </td>
                    <td class="rates__timer">
                        <div class="timer timer--finishing">07:13:34</div>
                    </td>
                    <td class="rates__price">
                        <?=$bet['cost']; ?> р
                    </td>
                    <td class="rates__time">
                        <?=humanTime($bet['time']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>