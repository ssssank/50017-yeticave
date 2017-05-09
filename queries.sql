/*получить список из всех категорий;*/
SELECT name FROM categories;

/*получить самые новые, открытые лоты.
Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;*/
SELECT lots.name, start_bet, image, COUNT(bets.id), MAX(bets.price), category.name
FROM lots
  JOIN categories ON categories.id = category_id
  JOIN bets ON lots.id = lot_id
WHERE finish_date > NOW()
GROUP BY lots.id
ORDER BY lots.create_date DESC;

/*найти лот по его названию или описанию;*/
SELECT * FROM lots
WHERE name LIKE '%snowboard%'
OR description LIKE '%snowboard%';

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
  10000,
  500,
  0,
  1,
  NULL,
  1
);

/*обновить название лота по его идентификатору;*/
UPDATE lot SET name = 'Snowboard 2017' WHERE id = 2;

/*добавить новую ставку для лота;*/
INSERT INTO bets (
  create_date,
  price,
  user_id,
  lot_id
)
VALUES (
  NOW(),
  10500,
  1,
  1
);

/*получить список ставок для лота по его идентификатору.*/
SELECT * FROM bets WHERE lot_id = 5;