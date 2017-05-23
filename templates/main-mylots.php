<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $category) : ?>
                <li class="nav__item">
                    <a href="all-lots.html"><?=htmlspecialchars($category['name']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <section class="rates container">
        <h2>Мои ставки</h2>
        <table class="rates__list">
            <?php foreach ($bets as $bet) : ?>
                <tr class="rates__item">
                    <td class="rates__info">
                        <div class="rates__img">
                            <img src="<?=$bet['image']; ?>" width="54" height="40" alt="Сноуборд">
                        </div>
                        <h3 class="rates__title">
                            <a href="<?='lot.php?id=' . $bet['lot_id']; ?>">
                                <?=$bet['name']; ?>
                            </a>
                        </h3>
                    </td>
                    <td class="rates__category">
                        <?=$bet['category']; ?>
                    </td>
                    <td class="rates__timer">
                        <div class="timer timer--finishing"><?=$bet['finish_date']; ?></div>
                    </td>
                    <td class="rates__price">
                        <?=$bet['price']; ?> р
                    </td>
                    <td class="rates__time">
                        <?=humanTime($bet['create_date']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>