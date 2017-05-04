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
    <form class="form form--add-lot container <?=!empty($templateData['errors']) ? 'form--invalid' : ''; ?>" action="/add.php" method="post" enctype="multipart/form-data">
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item <?=!empty($templateData['errors']['lot-name']) ? 'form__item--invalid' : ''; ?>">
                <label for="lot-name">Наименование</label>
                <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=isset($templateData['lot']['lot-name']) ? $templateData['lot']['lot-name'] : ''; ?>">
                <span class="form__error"><?=!empty($templateData['errors']['lot-name']) ? $templateData['errors']['lot-name'] : ''; ?></span>
            </div>
            <div class="form__item <?=!empty($templateData['errors']['category']) ? 'form__item--invalid' : ''; ?>">
                <label for="category">Категория</label>
                <select id="category" name="category" required>
                    <option value="">Выберите категорию</option>
                    <?php foreach ($templateData['categories'] as $category) : ?>
                    <option <?= isset($templateData['lot']['category']) && $templateData['lot']['category'] == $category ? 'selected' : '' ;?>>
                        <?=$category; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <span class="form__error"><?=!empty($templateData['errors']['category']) ? $templateData['errors']['category'] : ''; ?></span>
            </div>
        </div>
        <div class="form__item form__item--wide <?=!empty($templateData['errors']['message']) ? 'form__item--invalid' : ''; ?>">
            <label for="message">Описание</label>
            <textarea id="message" name="message" placeholder="Напишите описание лота" ><?=isset($templateData['lot']['message']) ? $templateData['lot']['message'] : ''; ?></textarea>
            <span class="form__error"><?=$templateData['errors']['message']; ?></span>
        </div>
        <div class="form__item form__item--file <?=!empty($templateData['lot']['lot-img']) ? 'form__item--uploaded' : ''; ?> <?=!empty($templateData['errors']['lot-img']) ? 'form__item--invalid' : ''; ?>">
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="<?=!empty($templateData['lot']['lot-img']) ? $templateData['lot']['lot-img'] : ''; ?>" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="lot-img" id="photo2" value="">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
            <span class="form__error"><?=!empty($templateData['errors']['lot-img']) ? $templateData['errors']['lot-img'] : ''; ?></span>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small <?=!empty($templateData['errors']['lot-rate']) ? 'form__item--invalid' : ''; ?>">
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="" name="lot-rate" placeholder="0"  value="<?=isset($templateData['lot']['lot-rate']) ? $templateData['lot']['lot-rate'] : ''; ?>">
                <span class="form__error"><?=!empty($templateData['errors']['lot-rate']) ? $templateData['errors']['lot-rate'] : ''; ?></span>
            </div>
            <div class="form__item form__item--small <?=!empty($templateData['errors']['lot-step']) ? 'form__item--invalid' : ''; ?>">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="" name="lot-step" placeholder="0"  value="<?=isset($templateData['lot']['lot-step']) ? $templateData['lot']['lot-step'] : ''; ?>">
                <span class="form__error"><?=!empty($templateData['errors']['lot-step']) ? $templateData['errors']['lot-step'] : ''; ?></span>
            </div>
            <div class="form__item <?=!empty($templateData['errors']['lot-date']) ? 'form__item--invalid' : ''; ?>">
                <label for="lot-date">Дата заверщения</label>
                <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="20.05.2017"  value="<?=isset($templateData['lot']['lot-date']) ? $templateData['lot']['lot-date'] : ''; ?>">
                <span class="form__error"><?=!empty($templateData['errors']['lot-date']) ? $templateData['errors']['lot-date'] : ''; ?></span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>