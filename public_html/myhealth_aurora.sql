-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 10 2019 г., 20:25
-- Версия сервера: 5.6.41-84.1
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myhealth_aurora`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins_aurora`
--

CREATE TABLE `admins_aurora` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins_aurora`
--

INSERT INTO `admins_aurora` (`id_admin`, `name`, `last_name`, `email`, `password`, `role`, `salt`) VALUES
(1, 'Влад', 'Малакеев', 'vlad.malakeev@gmail.com', '3dc35a0ccd7856b4fac4062d5f00d582', 'SUPER_ADMIN', 'a5b0d3f6'),
(2, 'admin', 'admin', 'admin@gmail.com', 'fec491939a0a765e6b881a67e8bc1ad7', 'SUPER_ADMIN', '1d5a8c2f');

-- --------------------------------------------------------

--
-- Структура таблицы `cards_aurora`
--

CREATE TABLE `cards_aurora` (
  `id_card` int(11) NOT NULL,
  `description` longtext,
  `photo` varchar(255) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cards_aurora`
--

INSERT INTO `cards_aurora` (`id_card`, `description`, `photo`, `page_id`) VALUES
(1, '<p style=\"text-align:center\"><strong><span style=\"color:#222222\">Школа для Вас, если:</span></strong></p><p><span style=\"color:#222222\"><span style=\"font-size:26px\"><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" /></span>Хотите зачать ребенка, а не выходит<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Есть вопросы с женской репродуктивной системой: миомы, эндометриоз, молочница<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Проблемы со щитовидной железы<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Аутоимунные заболевания<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Сердечнососудистые заболевания&nbsp;<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Часто болеете простудными заболеваниями<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Хотите иметь постоянную квалифицированную поддержку нашего специалиста<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Хотите попасть в окружение здоровых людей</span></p>', 'http://admin.alphabet-of-health.com/pages/health/flower-3408808_960_720.jpg', 1),
(2, '<p style=\"text-align:center\"><strong><span style=\"color:#222222\">&nbsp;Школа для Вас, если:</span></strong></p><p><span style=\"color:#222222\"><span style=\"font-size:26px\"><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" /></span>Вы хотите научится здоровому стилю питания<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Понять как работает ваш организм и что ему необходимо<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Испытываете проблемы с пищеварением<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Аллергия<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Высыпания, акне и другие проблемы косметического характера<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Хотите избавиться от избыточного веса<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Есть с хронические заболевания: язва, желчекаменная, хеликобактер, диабет<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Чувствуете хроническую усталость, депрессию</span></p>', 'http://admin.alphabet-of-health.com/pages/health/background-20823_960_720.jpg', 1),
(3, '<p style=\"text-align:center\"><strong><span style=\"color:#222222\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\">После&nbsp;обучение в школе Вы:</span></span></strong></p><p><span style=\"color:#222222\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><span style=\"font-size:26px\"><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" /></span>Научитесь разбираться какие витамины и в каких случаях необходимы.<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Научитесь правильно выбирать продукты и составлять свой рацион.<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Поймете, что правильное питание - это просто и вкусно.</span></span></p><p><span style=\"color:#222222\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Вспомните, как &nbsp;быть энергичным, высыпаться и сохранять бодрость весь день.</span></span></p><p><span style=\"color:#222222\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Получите квалифицированную поддержку и контроль результатов.&nbsp;</span></span></p>', 'http://admin.alphabet-of-health.com/pages/health/orchids-1209612_960_720.jpg', 1),
(4, '<p style=\"text-align:center\"><strong><span style=\"color:#222222\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\">После&nbsp;обучение в школе Вы:</span></span></strong></p><p style=\"text-align:justify\"><span style=\"color:#222222\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><span style=\"font-size:26px\"><em><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" /></em></span>Поймете настоящие причины Ваших заболеваний и узнаете, как от них избавиться.&nbsp;</span></span></p><p style=\"text-align:justify\"><span style=\"color:#222222\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Плавно и комфортно перейдете к новому образу жизни и правильному питанию.&nbsp;&nbsp;</span></span></p><p style=\"text-align:justify\"><span style=\"color:#222222\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Научитесь системному подходу к своему здоровью и начнете &laquo;слышать&raquo; свое тело.<br /><img alt=\"\" src=\"https://catestraining.com.au/wp-content/uploads/2017/01/check-tick-icon-14179.png\" style=\"height:25px; width:25px\" />Будете понимать, что организм хочет сказать Вам через симптомы и перестанете их залечивать.</span></span></p>', 'http://admin.alphabet-of-health.com/pages/health/flower-3182652_960_720.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `comments_aurora`
--

CREATE TABLE `comments_aurora` (
  `id_comment` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments_aurora`
--

INSERT INTO `comments_aurora` (`id_comment`, `link`, `page_id`) VALUES
(6, 'https://www.youtube.com/embed/3wntWcPTkB4', 1),
(7, 'https://www.youtube.com/embed/FQ3o1p7fJEU', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `curators_aurora`
--

CREATE TABLE `curators_aurora` (
  `id_curator` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `curators_aurora`
--

INSERT INTO `curators_aurora` (`id_curator`, `link`, `page_id`) VALUES
(4, 'https://www.youtube.com/embed/V9z1NDCo1aQ', 1),
(3, 'https://www.youtube.com/embed/65EnB0pslO4', 1),
(5, 'https://www.youtube.com/embed/sdBNzCREego', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `currencies_aurora`
--

CREATE TABLE `currencies_aurora` (
  `id` int(11) NOT NULL,
  `id_course` int(11) DEFAULT NULL,
  `usd` float DEFAULT NULL,
  `eur` float DEFAULT NULL,
  `rub` float DEFAULT NULL,
  `uah` float DEFAULT NULL,
  `byn` float DEFAULT NULL,
  `kzt` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currencies_aurora`
--

INSERT INTO `currencies_aurora` (`id`, `id_course`, `usd`, `eur`, `rub`, `uah`, `byn`, `kzt`) VALUES
(1, 1, 30, 26, 1950, 780, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `form_health`
--

CREATE TABLE `form_health` (
  `id_form` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `question_type` varchar(255) DEFAULT NULL,
  `filled` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `form_health`
--

INSERT INTO `form_health` (`id_form`, `question`, `question_type`, `filled`) VALUES
(1, 'Пол (мужской/женский)', 'text', 1),
(2, 'Ваш возраст', 'text', 0),
(3, 'Ваш рост (см)', 'text', 1),
(4, 'Ваш вес (кг)', 'text', 1),
(5, 'Объем талии (см)', 'text', 0),
(6, 'Объем бедер (см)', 'text', 0),
(7, 'Любимая еда', 'text', 1),
(8, 'Какая еда вызывает отвращение?', 'text', 0),
(9, 'Какие хронические заболевания у вас есть?', 'text', 0),
(10, 'Были ли операции, травмы?', 'text', 1),
(11, 'Какое у Вас нормальное давление?', 'text', 1),
(12, 'Имеете ли вы вредные привычки?', 'text', 0),
(13, 'Есть ли у Вас на что либо аллергия?', 'text', 1),
(14, 'Устраивает ли Вас качество вашего сна?', 'text', 1),
(15, 'Фото, (лицо крупным планом)', 'file', 0),
(16, 'Фото в полный рост, (спереди)', 'file', 0),
(17, 'Фото в полный рост‚ (сзади)', 'file', 0),
(18, 'Фото в полный рост‚ (сбоку)', 'file', 0),
(19, 'Анализ ТТГ (тиреотропный гормон)', 'file', 0),
(20, 'Анализ Т3 (Трийодтиронин)', 'file', 0),
(21, 'Анализ Т4 (Тироксин)', 'file', 0),
(22, 'Развернутый анализ крови', 'file', 0),
(23, 'Анализ на ферритин', 'file', 0),
(24, 'Что Вы хотите ещё нам рассказать', 'text', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `liqpay_aurora`
--

CREATE TABLE `liqpay_aurora` (
  `id` int(11) NOT NULL,
  `version` int(11) DEFAULT NULL,
  `public_key` varchar(255) DEFAULT NULL,
  `private_key` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `liqpay_aurora`
--

INSERT INTO `liqpay_aurora` (`id`, `version`, `public_key`, `private_key`, `action`) VALUES
(1, 3, '', '', 'pay');

-- --------------------------------------------------------

--
-- Структура таблицы `pages_aurora`
--

CREATE TABLE `pages_aurora` (
  `id_page` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `main_photo` varchar(255) DEFAULT NULL,
  `main_text` longtext,
  `main_description` longtext,
  `cost` float DEFAULT NULL,
  `main` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages_aurora`
--

INSERT INTO `pages_aurora` (`id_page`, `name`, `main_photo`, `main_text`, `main_description`, `cost`, `main`) VALUES
(1, 'health', 'http://admin.alphabet-of-health.com/pages/health/Ph-7.jpg', 'Курс: очищение организма', '<p><span style=\"font-size:48px\"><span style=\"color:#ffffff\"><strong>Азбука&nbsp;Здоровья</strong></span></span></p><p><br /><span style=\"color:#ffffff\"><em><strong><span style=\"font-size:28px\">online программа очищения и</span></strong></em></span></p><p><span style=\"color:#ffffff\"><em><strong><span style=\"font-size:28px\">&nbsp;</span></strong></em></span><em><strong><span style=\"font-size:28px\"><span style=\"color:#ffffff\">комплексного оздоровления </span></span></strong></em></p><p><em><strong><span style=\"font-size:28px\"><span style=\"color:#ffffff\">организма</span></span></strong></em></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><span style=\"color:#5ce6a0\"><strong><span style=\"font-size:36px\">Старт - 16 марта</span></strong></span></p><p><span style=\"color:#5ce6a0\"><strong><span style=\"font-size:36px\">Длительность курса&nbsp;- 21 день</span></strong></span></p><p style=\"text-align:right\">&nbsp;</p>', 800, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `text_reviews_aurora`
--

CREATE TABLE `text_reviews_aurora` (
  `id_review` int(11) NOT NULL,
  `header` varchar(255) DEFAULT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `text_reviews_aurora`
--

INSERT INTO `text_reviews_aurora` (`id_review`, `header`, `description`, `photo`, `link`, `page_id`) VALUES
(1, 'Елена Аскерова, 25 лет', 'Спасибо большое за консультацию и рекомендации по питанию. По правильному планированию чисток и восстановлению организма после. Очень хороший, ненавязчивый индивидуальный подход, исходя из потребностей и особенностей организмами и состояния здоровья.', 'http://admin.alphabet-of-health.com/pages/health/review/photo_2019-02-22_16-13-18.jpg', 'https://www.facebook.com/ElenAskerova', 1),
(2, 'Анна Григорьевна, 57 лет', 'Я еще никогда не оставляла отзывы! Но тут просто невозможно сдержаться, чтобы не рассказать о моих результатах и о школе, с ее замечательными кураторами, благодаря которым они появились!\r\nОбратилась я к ним, т.к. была сильная пигментация на руках, которая со временем начала распространяться по всему телу, что вызывало у меня жуткий дискомфорт и комплекс.\r\n Врачи назвали это диагнозом Витилиго. И что с этим уже ничего сделать не получится...Смириться, тем более уже возраст и это весьма распространенное заболевание.\r\nНо смириться я не хотела! И правильно сделала.\r\nВсего лишь изменив питание по рекомендации Школы здоровья, пройдя пару чисток на соках  и начав пить воду и необходимые мне минералы  спустя пол года моя пигментация на руках прошла полностью!!! На теле еще остались, но только поодинокие точки. \r\nИ это помимо того, что у меня перестали выпадать волосы, улучшился сон,  стал меньше проявляться варикоз, хотя работаю я поваром уже почти 40 лет и все время на ногах. Стало больше сил. И я начала пить воду! ПО 2-3л каждый день! На минуточку, я не пила ее правильно  почти всю жизнь мне ее просто не хотелось! Чай и кофе – это была моя вода. Раньше я думала, если я много пью, я отекаю! Так где сейчас мои отеки при 3л воды в день? Их просто нет! Они исчезли!\r\nТак что слушайте, пожалуйста, что рекомендуют эти ребята! Это действительно помогает нам быть здоровее и счастливее!', 'http://admin.alphabet-of-health.com/pages/health/review/photo_2019-02-22_16-13-57.jpg', 'https://www.facebook.com/profile.php?id=100010843478455', 1),
(3, 'Лена, 28 лет', '<p><span style=\"font-size:18px\">Знаю, что люди, которые читают отзывы, им сразу интересен результат, положительный или отрицательный, но главное результат. Поэтому я сразу расскажу о своем результате, который дала мне школа. Мне школу порекомендовали. На тот момент меня волновало 2 вопроса: 1 - боль в спине, которая мешала мне тренироваться. 2 - лишний вес, от которого сложно было избавиться. (гормональный курс таблеток и уколов, который привел к лишнему весу).</span></p><p><span style=\"font-size:18px\">   Мои Результаты:</span></p><p><span style=\"font-size:18px\">      1. Я начала пить воду! Правильно и необходимое мне количество. Не заставлять себя, а пить с удовольствием.</span></p><p><span style=\"font-size:18px\">      2. Постоянно ноющая боль в спине ушла.</span></p><p><span style=\"font-size:18px\">      3. Я понимаю, что и как есть. Какие продукты сочетаются, а какие лучше не есть вообще.</span></p><p><span style=\"font-size:18px\">      4. Проснуться самой без будильника в 8.00?! Теперь я знаю как это ) и что такое бывает!</span></p><p><span style=\"font-size:18px\">      5. Нормализовался стул и перестало беспокоить вздутие ( да, чуть деликатная тема и очень ВАЖНАЯ! Но почему-то многие молчат о ней, предпочитая не бывать в WC по несколько дней, но при этом тратить деньги на косметологов)</span></p><p><span style=\"font-size:18px\">      6. Перестали беспокоить мигрени</span></p><p><span style=\"font-size:18px\">      7. Месячные проходят без обезболивающих таблеток! Ушли болевые ощущения, которые раньше не давали нормально жить в этот период.</span></p><p><span style=\"font-size:18px\">      8. Я медленно, но уверено стройнею!</span></p><p><span style=\"font-size:18px\">      9. Я умею слышать и понимать свой организм. Я понимаю, какие витамины и минералы мне пить и когда.</span></p><p><span style=\"font-size:18px\">      10. Стала меньше болеть простудными заболеваниями, а если болею, то безмедикоментозно и все проходит за 3-5 дней само и без антибиотиков. Мое субъективное мнение. Эти знания, что дают ребята на школе, нужны каждому! Чтобы мы понимали, что такое наш организм, что ему надо вообще и как сделать так, чтобы прожить нашу жизнь здоров, бодро и продуктивно! Здоровье наше в наших руках, друзья !</span></p>', '', '', 1),
(4, 'Валерий,  56 лет', '<p><span style=\"font-size:18px\">   Мои дети уже давно интересовались и пили БАДы, придерживались здоровому образу жизни, слушали какие лекции и все мне рассказывали, что мне надо что-то менять в образе жизни,питании, чтобы я хорошо себя чувствовал. Скажу честно, я не особо в это вникал, считая это ерундой. Пока не начало шалить мое давление. Пару приступов и угроз госпитализации сделали свое дело (больницы я не терплю с детства, поэтому на долго я там не задерживался). И тут я начал спрашивать у детей и у жены, что бы мне такого сделать, чтобы наладить и вернуть свое нормальное состояние не попадая в больницу. И вот они мне дали какие-то книжечки, какие то ссылки на ютубе. И я поддался, все лучше не есть жареную картошку, чем лежать в больнице под капельницей. Мое удивление наступило тогда, когда по рекомендации Владислава я побыл на соках и чаге 4 дня, не пожрал, и мое давление стало 130 на 80! Без медикаментов. Всего за 4 дня! Под впечатлением я продолжил. </span></p><p><span style=\"font-size:18px\">   Прошло с тех пор уже 5 месяцев. Мое давление по-прежнему в норме! Ушел мой «пивной живот», варикоз стал почти незаметен, перестали болеть ноги, прошли головные боли, нервишки не так шалят. При этом я не могу сказать, что я веду жизнь отшельника и ЗОЖника. И 50 грамм бывает, под шашлычок и картошечкой грешу по праздникам. Так что есть истина в этом, друзья! И к ней лучше приходить не тогда, когда уже прихватило, как меня. А заранее, как мои дети…Спасибо им за мудрость и за то, что затащили меня в Школу и дали возможность продлить активную жизнь в мои 56.</span></p>', 'http://admin.alphabet-of-health.com/pages/health/review/photo_2019-03-03_17-53-25.jpg', '', 1),
(5, 'Елена, 42 года', 'Кетоновая диета. Правильный режим питания. Аутофагия. Послушала Олега и честно говоря, отнеслась с недоверием. Но решила все таки попробовать. Начала с того, что отказалась от сахара. Думаю, пусть мой кислотно-щелочной баланс нормализуется. Потом стала принимать пищу семь часов в сутки, а остальное время только пить воду. Буквально через две недели ушли такие проблемы со здоровьем, как отечность, проблемы с пищеварением, стал снижаться вес, цвет глаз стал ярче, усталость приходит поздно вечером, а не после трех-четырех часов после пробуждения. Продолжаю придерживаться этих несложных правил, часто слышу комплименты по поводу своего внешнего вида. Коллеги и знакомые спрашивают, какой секрет моего преображения? Мне так нравятся изменения, которые со мной произошли, что буду теперь постоянным клиентом \"Азбуки здоровья\" и к старому образу жизни возвращаться не хочу. Да, чуть не забыла, за период с июля по март я ни разу не заболела простудой и гриппом (а раньше по два-три раза за сезон болела). Ничего сложного, а результат просто потрясающий! Спасибо, Вам! ', 'http://admin.alphabet-of-health.com/pages/health/review/photo_2018-10-31_19-13-59.jpg', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `transactions_aurora`
--

CREATE TABLE `transactions_aurora` (
  `id_transaction` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_course` int(11) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `transactions_aurora`
--

INSERT INTO `transactions_aurora` (`id_transaction`, `id_user`, `id_course`, `currency`, `status`, `start_time`, `end_time`) VALUES
(1, 1, 1, 'UAH', 'success', '1550581551', '1550581573'),
(2, 1, 1, 'UAH', 'pending', '1550582970', NULL),
(3, 1, 1, 'UAH', 'pending', '1550589709', NULL),
(4, 1, 1, 'UAH', 'pending', '1551015710', NULL),
(5, 4, 1, 'UAH', 'pending', '1551091201', NULL),
(6, 2, 1, 'UAH', 'pending', '1551092735', NULL),
(7, 1, 1, 'UAH', 'pending', '1551343812', NULL),
(8, 1, 1, 'UAH', 'pending', '1551358937', NULL),
(9, 1, 1, 'UAH', 'pending', '1551375586', NULL),
(10, 7, 1, 'UAH', 'pending', '1551643029', NULL),
(11, 1, 1, 'USD', 'pending', '1551649135', NULL),
(12, 7, 1, 'USD', 'pending', '1551650525', NULL),
(13, 7, 1, 'USD', 'pending', '1551650968', NULL),
(14, 4, 1, 'UAH', 'pending', '1551883245', NULL),
(15, 4, 1, 'UAH', 'pending', '1551883245', NULL),
(16, 8, 1, 'UAH', 'pending', '1551894810', NULL),
(17, 8, 1, 'RUB', 'pending', '1551895037', NULL),
(18, 8, 1, 'USD', 'pending', '1551895228', NULL),
(19, 8, 1, 'UAH', 'pending', '1551895323', NULL),
(20, 8, 1, 'RUB', 'pending', '1551895534', NULL),
(21, 1, 1, 'UAH', 'pending', '1551957906', NULL),
(22, 4, 1, 'UAH', 'pending', '1551958017', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users_aurora`
--

CREATE TABLE `users_aurora` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `active_hex` varchar(255) DEFAULT NULL,
  `salt` varchar(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_aurora`
--

INSERT INTO `users_aurora` (`id`, `active`, `name`, `last_name`, `email`, `phone`, `password`, `date`, `active_hex`, `salt`) VALUES
(1, 1, 'Владислав', 'Малакеев', 'vlad.malakeev@gmail.com', '+380963105129', '01e3607647681af6ba97abda57ddeb0b', 1549945641, '7908a5cb406fe70f6bca9fd3d83d6e4a', '6c84105e'),
(2, 1, 'Владислав', 'Жельнио', 'anarchyboy@rambler.ru', '+380631672985', '7c55ebe94538b946a47a9fe54e6b9bff', 1550397684, '5f1cadd25a5a6ef958bfd4bdf92efa54', '626a9e9a'),
(3, 1, 'Test', 'Test', 'test@test.com', '+380000000000', '690d7b0450c1e10e8199a0ceb7a2d7e7', 1550603022, 'ae46c527a6d24a6e4d2ac7007eba60e3', 'd0d75abf'),
(4, 1, 'Олег', 'Дудко', 'adsuperandumnatus@gmail.com', '+380997230571', '37e1888967f16fd0ba84aa1186676ac2', 1551091125, 'e57d1c0cd04a1ca24533e19814056d39', '4bbd86a7'),
(5, 1, 'Татьяна', 'Ткач', 'tatjana83-tkach@mail.ru', '+79111519171', 'b03e6df464f98fc8b07577ce1cea3de6', 1551636546, '1d1ae3b543a42330a49954f42a3c7074', 'ffe0c96b'),
(6, 1, 'Александр ', 'Курсаненко', 'alexukr1977@mail.ru', '+380980317397', 'c56c8564846bb55ab7f28a84ef191082', 1551641660, '275717fa8397eee1c10d1a39e1c73ce3', '1a3d3955'),
(7, 1, 'Yelena ', 'Kozay ', 'yelena.kozay@gmail.com', '+19174887474', 'a1b32b2abbb99fbba2ae0eae76225781', 1551642798, '644285ab830c2b509ce4c82f3ec39e76', 'da42327e'),
(8, 1, 'Ольга', 'Кухтова', 'kukho@bk.ru', '+79648995029', '603b20986bcee9b2f0828e4557b2d4af', 1551646145, '3028d3c25dee4f2c7cba86b9c86d2c22', '10cb7e97'),
(9, 0, 'Оксана', 'Горбунова', 'lux-optika@mail.ru', '+375296798808', '24bf6df0d244cf35301c3c7b3a858ad6', 1551647299, 'ae604f633688f512f9d53f112608d528', 'd4361077'),
(10, 0, 'Galya', 'Shkvarok ', 'galya.shkvarok@mail.ru', '+33630213047', '4f95e441cc636853853bc037c77a9b9d', 1551649414, '4b4281398fdc9513022f47a9529cc8a1', '2ef1c366'),
(11, 0, 'Галина', 'Утенкова', 'mes909@yandex.ru', '+79149122485', '2fc10cb2e37f978fe9421014e6eb85ee', 1551673562, 'd484201780ed4c6df81738187cb10fca', 'd32a0c99'),
(12, 0, 'Ирина', 'Орлова', 'b-trast@mail.ru', '+79095172214', '519dea1e15dc87613ff22faa68ebbdcb', 1551679948, '7ea1389cd53cd3eac29c724fbf5937dc', 'af488470'),
(13, 0, 'Алевтина', 'Синица', 'alewtina03@mail.ru', '+79127126902', '01da9bd1f44bbecfb7dd16807e431493', 1551680011, '41ac69600e65b32d6ff356d2b4ad565b', '29dd525b'),
(14, 0, 'Елена', 'Семенюк', 'lena-semeniuk@mail.ru', '+79038729227', '20772bf87c747bac4b53178462ba6b3b', 1551698453, 'd26326120c6066f41c0ecb16d1c05782', 'b22da8c2'),
(15, 1, 'Татьяна', 'Липовцева', 'tayrli@mail.ru', '+79531943801', '87c490497607f976f84567475c991d7c', 1551704194, '229fa2afb0eedceb43bf2233136f8b54', '92fa27c8'),
(16, 0, 'RŪTA ', 'Straševičiūtė ', 'ruteleru@inbox.lt', '+37064635948', 'db1380cb5819bc5a79fc06f6d96c3df0', 1551727041, '065498f606e1d8e5730b9d2e07aaadc0', '2e86ae9f'),
(17, 1, 'Ирина', 'Бунтова', 'kaluza1@mail.ru', '+393886981310', 'ebe5f23f94cc497d0a3de81a01ce9910', 1551732618, 'fe8e8daf19bdc910da4bee47f3c9181b', '48a72eb4'),
(18, 1, 'Ольга ', 'Крыжановская', '8348834@gmail.com', '+79160883687', '072ac3bfbea7d01ef86f28da7efaa5e0', 1551733677, '21e0c6afb2cb7cb09faa528f2c47dcf9', '518edc85'),
(19, 1, 'Ирина', 'Семенова ', '2543233@gmail.com', '+79831584233', '2527525c64424f978992dc9c1fa4145b', 1551757245, 'e1b07a41ab75435fdc8587aec890b24a', '4148fbed'),
(20, 0, 'Татьяна', 'Тюрина', 'niktat@ro.ru', '+79232969202', 'cb472d2d98cd2ef6bf50ad59bb5673d3', 1551765741, 'fb006b0270b656104bdae76a54d04253', '3b438520'),
(21, 1, 'Альбина', 'Шириязданова', 'honey_october@mail.ru', '+79233406458', 'e19b225ecfe59096617cb43a927371ea', 1551766157, 'c7517e36261984420176c88d01da0b00', 'c7abd9c8'),
(22, 0, 'Маргарита', 'Букатина', 'ritabukatina@mail.ru', '+79025552258', 'e6e4ea402d28f970d529060fc121e3e9', 1551772946, 'bd3a9ab25280e768c461dcaa0dffa21a', 'b2d85037'),
(23, 0, 'Наталья', 'Гущина', 'nagunia-yarsk@yandex.ru', '+79059711010', 'd9d0de9b44714d936d839bfb5bbb9b64', 1551790032, 'b7dadd22d5aa7d9d2d04971a324d44aa', '784610aa'),
(24, 0, 'Ирина', 'Батракова - Дарджания', 'irinadarjania@gmail.com', '+995558241224', '6fb0e6ddad6de16359049d59f1c0f503', 1551792248, '9b25ac639cb8d9deb8e1e51c0ddec4e2', 'd4783e68'),
(25, 0, 'Ирина', 'Корнева', 'korneva08@mail.ru', '+79098677142', 'ca83425213f5e59c2daed2d167ccb04f', 1551796147, 'a10f4e1389a7434895adec26c5c29a9b', 'a6f78095'),
(26, 0, 'Ирина', 'Зайцева', 'irinka072@mail.ru', '+79951953512', '0a1c6255e2aa257253525b38ecf1c327', 1551802810, 'ec879bf04ae903c2142278bef15e97a0', 'd2b2ff56');

-- --------------------------------------------------------

--
-- Структура таблицы `user_courses_aurora`
--

CREATE TABLE `user_courses_aurora` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_courses_aurora`
--

INSERT INTO `user_courses_aurora` (`id`, `user_id`, `course_id`, `status`) VALUES
(1, 1, 1, 0),
(3, 2, 1, 0),
(4, 3, 1, 0),
(5, 4, 1, 0),
(6, 5, 1, 0),
(7, 6, 1, 0),
(14, 11, 1, 0),
(9, 7, 1, 0),
(10, 8, 1, 0),
(11, 9, 1, 0),
(12, 10, 1, 0),
(15, 12, 1, 0),
(16, 13, 1, 0),
(17, 14, 1, 0),
(18, 15, 1, 0),
(19, 16, 1, 0),
(20, 17, 1, 0),
(21, 18, 1, 0),
(22, 19, 1, 0),
(23, 20, 1, 0),
(24, 21, 1, 0),
(25, 22, 1, 0),
(26, 23, 1, 0),
(27, 24, 1, 0),
(28, 25, 1, 0),
(29, 26, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_form_health`
--

CREATE TABLE `user_form_health` (
  `id_user_form` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question_1` varchar(255) DEFAULT NULL,
  `question_2` varchar(255) DEFAULT NULL,
  `question_3` varchar(255) DEFAULT NULL,
  `question_4` varchar(255) DEFAULT NULL,
  `question_5` varchar(255) DEFAULT NULL,
  `question_6` varchar(255) DEFAULT NULL,
  `question_7` varchar(255) DEFAULT NULL,
  `question_8` varchar(255) DEFAULT NULL,
  `question_9` varchar(255) DEFAULT NULL,
  `question_10` varchar(255) DEFAULT NULL,
  `question_11` varchar(255) DEFAULT NULL,
  `question_12` varchar(255) DEFAULT NULL,
  `question_13` varchar(255) DEFAULT NULL,
  `question_14` varchar(255) DEFAULT NULL,
  `question_15` varchar(255) DEFAULT NULL,
  `question_16` varchar(255) DEFAULT NULL,
  `question_17` varchar(255) DEFAULT NULL,
  `question_18` varchar(255) DEFAULT NULL,
  `question_19` varchar(255) DEFAULT NULL,
  `question_20` varchar(255) DEFAULT NULL,
  `question_21` varchar(255) DEFAULT NULL,
  `question_22` varchar(255) DEFAULT NULL,
  `question_23` varchar(255) DEFAULT NULL,
  `question_24` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_form_health`
--

INSERT INTO `user_form_health` (`id_user_form`, `user_id`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `question_7`, `question_8`, `question_9`, `question_10`, `question_11`, `question_12`, `question_13`, `question_14`, `question_15`, `question_16`, `question_17`, `question_18`, `question_19`, `question_20`, `question_21`, `question_22`, `question_23`, `question_24`) VALUES
(1, 1, 'Мужской', '25', '179', '70', '60', '30', 'Рис, гречка', '', '', 'нет', '120 на 80', '', 'нет', 'нет', 'background-20823_960_720.jpg', '', 'coffee-2390136_960_720.jpg', '', '', '', '', '63f5458e3280026f2fc3a88dda61-1418868.jpg', '3jpg.jpg', 'hello world'),
(2, 3, 'м', '12', '123', '23', '45', '23', 'слизь', '', '', 'нет', '760мм. рт. ст.', '', 'нет', 'да', 'grudnichok-na-krovati1.jpg', '', 'images.jpg', '', '', '', '', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins_aurora`
--
ALTER TABLE `admins_aurora`
  ADD PRIMARY KEY (`id_admin`);

--
-- Индексы таблицы `cards_aurora`
--
ALTER TABLE `cards_aurora`
  ADD PRIMARY KEY (`id_card`);

--
-- Индексы таблицы `comments_aurora`
--
ALTER TABLE `comments_aurora`
  ADD PRIMARY KEY (`id_comment`);

--
-- Индексы таблицы `curators_aurora`
--
ALTER TABLE `curators_aurora`
  ADD PRIMARY KEY (`id_curator`);

--
-- Индексы таблицы `currencies_aurora`
--
ALTER TABLE `currencies_aurora`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `form_health`
--
ALTER TABLE `form_health`
  ADD PRIMARY KEY (`id_form`);

--
-- Индексы таблицы `liqpay_aurora`
--
ALTER TABLE `liqpay_aurora`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages_aurora`
--
ALTER TABLE `pages_aurora`
  ADD PRIMARY KEY (`id_page`);

--
-- Индексы таблицы `text_reviews_aurora`
--
ALTER TABLE `text_reviews_aurora`
  ADD PRIMARY KEY (`id_review`);

--
-- Индексы таблицы `transactions_aurora`
--
ALTER TABLE `transactions_aurora`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Индексы таблицы `users_aurora`
--
ALTER TABLE `users_aurora`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_courses_aurora`
--
ALTER TABLE `user_courses_aurora`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_form_health`
--
ALTER TABLE `user_form_health`
  ADD PRIMARY KEY (`id_user_form`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins_aurora`
--
ALTER TABLE `admins_aurora`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `cards_aurora`
--
ALTER TABLE `cards_aurora`
  MODIFY `id_card` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments_aurora`
--
ALTER TABLE `comments_aurora`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `curators_aurora`
--
ALTER TABLE `curators_aurora`
  MODIFY `id_curator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `currencies_aurora`
--
ALTER TABLE `currencies_aurora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `form_health`
--
ALTER TABLE `form_health`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `liqpay_aurora`
--
ALTER TABLE `liqpay_aurora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `pages_aurora`
--
ALTER TABLE `pages_aurora`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `text_reviews_aurora`
--
ALTER TABLE `text_reviews_aurora`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `transactions_aurora`
--
ALTER TABLE `transactions_aurora`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `users_aurora`
--
ALTER TABLE `users_aurora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `user_courses_aurora`
--
ALTER TABLE `user_courses_aurora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `user_form_health`
--
ALTER TABLE `user_form_health`
  MODIFY `id_user_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
