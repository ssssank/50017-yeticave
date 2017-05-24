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
    <form class="form form--add-lot container <?=!empty($errors) ? 'form--invalid' : ''; ?>" action="/add.php" method="post" enctype="multipart/form-data">
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item <?=!empty($errors['name']) ? 'form__item--invalid' : ''; ?>">
                <label for="name">Наименование</label>
                <input id="name" type="text" name="lot_name" placeholder="Введите наименование лота" value="<?=isset($lot['lot_name']) ? $lot['lot_name'] : ''; ?>">
                <span class="form__error"><?=!empty($errors['name']) ? $errors['name'] : ''; ?></span>
            </div>
            <div class="form__item <?=!empty($errors['category_id']) ? 'form__item--invalid' : ''; ?>">
                <label for="category_id">Категория</label>
                <select id="category_id" name="category_id" required>
                    <option value="">Выберите категорию</option>
                    <?php foreach ($categories as $category) : ?>
                    <option value="<?=$category['id']; ?>" <?=isset($lot['category_id']) && $lot['category_id'] == $category['id'] ? 'selected' : '' ;?>>
                        <?=$category['name']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <span class="form__error"><?=!empty($errors['category_id']) ? $errors['category_id'] : ''; ?></span>
            </div>
        </div>
        <div class="form__item form__item--wide <?=!empty($errors['description']) ? 'form__item--invalid' : ''; ?>">
            <label for="description">Описание</label>
            <textarea id="description" name="description" placeholder="Напишите описание лота" ><?=isset($lot['description']) ? $lot['description'] : ''; ?></textarea>
            <span class="form__error"><?=$errors['description']; ?></span>
        </div>
        <div class="form__item form__item--file <?=!empty($lot['image']) ? 'form__item--uploaded' : ''; ?> <?=!empty ($errors['image']) ? 'form__item--invalid' : ''; ?>">
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="<?=!empty($lot['image']) ? $lot['image'] : ''; ?>" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" name="image" id="photo2" value="">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
            <span class="form__error"><?=!empty($errors['image']) ? $errors['image'] : ''; ?></span>
        </div>
        <div class="form__container-three">
            <div class="form__item form__item--small <?=!empty($errors['start_bet']) ? 'form__item--invalid' : ''; ?>">
                <label for="start_bet">Начальная цена</label>
                <input id="start_bet" type="" name="start_bet" placeholder="0"  value="<?=isset($lot['start_bet']) ? $lot['start_bet'] : ''; ?>">
                <span class="form__error"><?=!empty($errors['start_bet']) ? $errors['start_bet'] : ''; ?></span>
            </div>
            <div class="form__item form__item--small <?=!empty($errors['step_bet']) ? 'form__item--invalid' : ''; ?>">
                <label for="step_bet">Шаг ставки</label>
                <input id="step_bet" type="" name="step_bet" placeholder="0"  value="<?=isset($lot['step_bet']) ? $lot['step_bet'] : ''; ?>">
                <span class="form__error"><?=!empty($errors['step_bet']) ? $errors['step_bet'] : ''; ?></span>
            </div>
            <div class="form__item <?=!empty($errors['finish_date']) ? 'form__item--invalid' : ''; ?>">
                <label for="finish_date">Дата заверщения</label>
                <input class="form__input-date" id="finish_date" type="text" name="finish_date" placeholder="20.06.2017"
                       value="<?=isset($lot['finish_date']) ? $lot['finish_date'] : ''; ?>">
                <span class="form__error"><?=!empty($errors['finish_date']) ? $errors['finish_date'] : ''; ?></span>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>