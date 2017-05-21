<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($templateData['categories'] as $category) : ?>
                <li class="nav__item">
                    <a href="all-lots.html"><?=htmlspecialchars($category['name']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <section class="lot-item container">
        <?php foreach ($templateData['lot'] as $lot) : ?>
        <h2><?=$lot['name']; ?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?=$lot['image']; ?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span><?=$lot['category']; ?></span></p>
                <p class="lot-item__description"><?=$lot['description']; ?></p>
            </div>
            <?php if (isset($_SESSION['user']) && !($templateData['readyBet'])) : ?>
                <div class="lot-item__right">
                        <div class="lot-item__state">
                        <div class="lot-item__timer timer">
                            <?=remainTime($lot['finish_date']); ?>
                        </div>
                        <div class="lot-item__cost-state">
                            <div class="lot-item__rate">
                                <span class="lot-item__amount">Текущая цена</span>
                                <span class="lot-item__cost"><?=$templateData['price']; ?></span>
                            </div>
                            <div class="lot-item__min-cost">
                                Мин. ставка <span><?=$templateData['price'] + $lot['step_bet']; ?> р</span>
                            </div>
                        </div>
                        <form class="lot-item__form <?=!empty($templateData['errors']) ? 'form--invalid' : ''; ?>" action="<?=$_SERVER['REQUEST_URI']; ?>" method="post">
                            <p class="lot-item__form-item <?=!empty($templateData['errors']['cost']) ? 'form__item--invalid' : ''; ?>">
                                <label for="cost">Ваша ставка</label>
                                <input id="cost" type="number" name="cost" placeholder="<?=$templateData['price'] + $lot['step_bet']; ?>" value="<?=isset($lot['cost']) ? $lot['cost'] : ''; ?>">
                            </p>
                            <button type="submit" class="button">Сделать ставку</button>
                            <span class="form__error"><?=!empty($templateData['errors']['cost']) ? $templateData['errors']['cost'] : ''; ?></span>
                        </form>
                    </div>
                <?php endif; ?>
                <div class="history">
                    <h3>История ставок (<span><?=count($templateData['bets']) ?></span>)</h3>
                    <?php foreach ($templateData['bets'] as $bet) : ?>
                        <table class="history__list">
                            <tr class="history__item">
                                <td class="history__name"><?=htmlspecialchars($bet['name']); ?></td>
                                <td class="history__price"><?=htmlspecialchars($bet['price']); ?> р</td>
                                <td class="history__time"><?=humanTime($bet['create_date']); ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </section>
</main>