/*получить список из всех категорий;*/
SELECT name FROM categories;

/*получить самые новые, открытые лоты.
Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;*/
SELECT lots.name, start_bet, image, COUNT(bets.id), MAX(bets.price), category.name
FROM lots
  JOIN categories ON categories.id = category_id
  JOIN bets ON lots.id = lot_id
WHERE winner_id = NULL
GROUP BY lots.id;

/*найти лот по его названию или описанию;*/
SELECT * FROM lots
WHERE name LIKE %$name#
OR description LIKE %$description%;

/*добавить новый лот (все данные из формы добавления);*/
INSERT INTO lots (
  name,
  description,
  create_date,
  finish_date,
  image,
  start_bet,
  step_bet,
  fav_count,
  owner_id,
  winner_id,
  category_id
)
VALUES (
  'DC Ply Mens 2016/2017 Snowboard',
  'Описание для DC Ply Mens 2016/2017 Snowboard',
  NOW(),
  DATE_ADD(NOW(), INTERVAL 30 DAY),
  '/img/lot1.jpg',
  '10000',
  '500',
  '0',
  '1',
  '',
  '1'
);

/*обновить название лота по его идентификатору;*/
UPDATE lot SET name = '$description' WHERE id = '$lot_id';

/*добавить новую ставку для лота;*/
INSERT INTO bets (
  create_date,
  price,
  user_id,
  lot_id
)
VALUES (
  NOW(),
  '10500',
  '1',
  '1'
);

/*получить список ставок для лота по его идентификатору.*/
SELECT * FROM bets WHERE lot_id = '$lot_id';