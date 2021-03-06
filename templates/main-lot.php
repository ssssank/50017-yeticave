<main>
    <nav class="nav">
        <ul class="nav__list container">
            <li class="nav__item">
                <a href="">Доски и лыжи</a>
            </li>
            <li class="nav__item">
                <a href="">Крепления</a>
            </li>
            <li class="nav__item">
                <a href="">Ботинки</a>
            </li>
            <li class="nav__item">
                <a href="">Одежда</a>
            </li>
            <li class="nav__item">
                <a href="">Инструменты</a>
            </li>
            <li class="nav__item">
                <a href="">Разное</a>
            </li>
        </ul>
    </nav>
    <section class="lot-item container">
        <h2><?=$templateData['lot']['lot-name']; ?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?=$templateData['lot']['lot-img']; ?>" width="730" height="548" alt="Сноуборд">
                </div>
                <p class="lot-item__category">Категория: <span><?=$templateData['lot']['category']; ?></span></p>
                <p class="lot-item__description"><?=$templateData['lot']['message']; ?></p>
            </div>
            <?php if (isset($_SESSION['user']) && !($templateData['readyBet'])) : ?>
                <div class="lot-item__right">
                        <div class="lot-item__state">
                        <div class="lot-item__timer timer">
                            10:54:12
                        </div>
                        <div class="lot-item__cost-state">
                            <div class="lot-item__rate">
                                <span class="lot-item__amount">Текущая цена</span>
                                <span class="lot-item__cost"><?=$templateData['lot']['lot-rate']; ?></span>
                            </div>
                            <div class="lot-item__min-cost">
                                Мин. ставка <span><?=$templateData['lot']['lot-step']; ?> р</span>
                            </div>
                        </div>
                        <form class="lot-item__form <?=!empty($templateData['errors']) ? 'form--invalid' : ''; ?>" action="<?=$_SERVER['REQUEST_URI']; ?>" method="post">
                            <p class="lot-item__form-item <?=!empty($templateData['errors']['cost']) ? 'form__item--invalid' : ''; ?>">
                                <label for="cost">Ваша ставка</label>
                                <input id="cost" type="number" name="cost" placeholder="12 000" value="<?=isset($templateData['lot']['cost']) ? $templateData['lot']['cost'] : ''; ?>">
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
                                <td class="history__time"><?=humanTime($bet['ts']); ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>