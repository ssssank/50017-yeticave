INSERT INTO categories (name)
VALUES
  ('Доски и лыжи'),
  ('Крепления'),
  ('Ботинки'),
  ('Одежда'),
  ('Инструменты'),
  ('Разное');

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
  category_id)
VALUES
  ( '2014 Rossignol District Snowboard',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    NOW(),
    DATE_ADD(NOW(), INTERVAL 30 DAY),
    '/img/lot-1.jpg',
    10000,
    500,
    3,
    1,
    NULL,
    1),
  ( 'DC Ply Mens 2016/2017 Snowboard',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    '2017-05-09 12:00:00',
    '2017-06-09 12:00:00',
    '/img/lot-2.jpg',
    59999,
    500,
    2,
    2,
    NULL,
    1),
  ( 'Крепления Union Contact Pro 2015 года размер L/XL',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    '2017-05-05 12:00:00',
    '2017-06-05 12:00:00',
    '/img/lot-3.jpg',
    8000,
    500,
    1,
    3,
    NULL,
    2),
  ( 'Ботинки для сноуборда DC Mutiny Charocal',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    '2017-05-01 12:00:00',
    '2017-06-01 12:00:00',
    '/img/lot-4.jpg',
    10999,
    500,
    0,
    1,
    NULL,
    3),
  ( 'Куртка для сноуборда DC Mutiny Charocal',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    '2017-05-04 12:00:00',
    '2017-06-04 12:00:00',
    '/img/lot-5.jpg',
    7500,
    500,
    1,
    2,
    NULL,
    4),
  ( 'Маска Oakley Canopy',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    '2017-05-03 12:00:00',
    '2017-06-03 12:00:00',
    '/img/lot-6.jpg',
    5400,
    500,
    3,
    3,
    NULL,
    6);

INSERT INTO bets (create_date, price, user_id, lot_id)
VALUES
  ('2017-05-05 17:00:00', 8500, 1, 3),
  ('2017-05-08 23:00:00', 9000, 3, 3),
  ('2017-05-09 11:00:00', 9500, 1, 3),
  ('2017-05-09 18:00:00', 10000, 2, 3);

INSERT INTO users (reg_date, email, name, password, image, details)
VALUES
  ('2017-04-30 12:00:00', 'ignat.v@gmail.com', 'Игнат', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', '/img/ignat.v.jpg', '+7(987)123-45-67'),
  ('2017-05-01 12:00:00', 'kitty_93@li.ru', 'Леночка', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', '/img/kitty_93.jpg', '+7(123)987-65-43'),
  ('2017-05-02 12:00:00', 'warrior07@mail.ru', 'Руслан', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', '/img/warrior07.jpg', 'На деревне у бабушки');