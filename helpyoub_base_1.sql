-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2015 at 12:46 PM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `helpyoub_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8,
  `js_map` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`, `js_map`) VALUES
(1, '<div>\r\n<p style="text-align:justify"><span style="font-family:tahoma,geneva,sans-serif"><a href="http://helpyou.by"><span style="color:#008000"><span style="font-size:20px"><strong>HelpYou.by</strong></span></span></a><span style="font-size:20px"><span style="color:#000000"> - уникальный для Беларуси проект, позволяющий каждому желающему абсолютно бесплатно найти надежного исполнителя для выполнения любой разовой работы, будь то уборка квартиры или написание диссертации.</span></span></span></p>\r\n\r\n<hr />\r\n<hr /><img alt="" src="https://pp.vk.me/c624322/v624322887/320f2/ONh-a3THVEE.jpg" style="max-width:100%" />\r\n<hr />\r\n<hr />\r\n<p><span style="font-size:20px"><span style="font-family:tahoma,geneva,sans-serif"><span style="color:#000000">Для этого Вам необходимо лишь зарегистрироваться на сайте, нажать кнопку &quot;Заказать услугу&quot;&nbsp;и разместить&nbsp;</span></span></span><span style="font-size:20px"><span style="font-family:tahoma,geneva,sans-serif"><span style="color:#000000">свое задание, подробно описав его суть и указав цену, которую Вы готовы заплатить.</span></span></span></p>\r\n</div>\r\n\r\n<div>\r\n<p style="text-align:justify"><img alt="" src="https://pp.vk.me/c625316/v625316887/26cd3/DKc4lyPjgRA.jpg" style="border-style:solid; border-width:3px; color:rgb(0, 128, 0); font-family:arial,helvetica,sans-serif; font-size:20px; max-width:100%" /></p>\r\n\r\n<p style="text-align:center"><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:20px">На все это Вы потратите не более 5 минут.</span></p>\r\n\r\n<hr /><img alt="" src="https://pp.vk.me/c625316/v625316887/26ecc/VtPFUSbXuVg.jpg" style="float:left; max-width:100%" />\r\n<p style="text-align:justify"><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:20px">В кратчайший срок заинтересованные исполнители предложат свои услуги &ndash; уведомление об этом придет на Ваш телефон, и Вам лишь останется выбрать одного из них, учитывая его рейтинг и отзывы других заказчиков.&nbsp;Выбранный исполнитель свяжется с Вами по телефону в течение нескольких минут. После выполнения задания не забудьте оставить отзыв.</span></p>\r\n\r\n<hr />\r\n<p style="text-align:justify"><span style="font-size:20px"><span style="font-family:tahoma,geneva,sans-serif"><span style="color:rgb(0, 0, 0)">Сервис</span><span style="color:rgb(0, 128, 0)">&nbsp;</span><strong><a href="http://helpyou.by" style="line-height: 32px;"><span style="color:rgb(0, 128, 0)">HelpYou.by</span></a></strong><span style="color:rgb(0, 0, 0)">&nbsp;принимает в ряды исполнителей только реальных людей и следит, чтобы они соответствовали заявленным требованиям и обладали такими качествами как трудолюбие, порядочность и исполнительность. С этой целью мы проводим процедуру верификации контактных данных всех исполнителей (мобильный телефон, e-mail, личные страницы в&nbsp;</span></span></span><span style="color:rgb(0, 0, 0); font-family:tahoma,geneva,sans-serif; font-size:20px">социальных сетях). В случае необходимости мы можем затребовать дополнительные данные или же попросить потенциального исполнителя пройти собеседование с представителями сервиса.</span></p>\r\n\r\n<hr /> <img alt="" src="https://pp.vk.me/c625316/v625316887/26e5e/izyP1Iztj10.jpg" style="float:right; font-family:tahoma,geneva,sans-serif; font-size:20px; height:134px; line-height:20.7999992370605px; margin-bottom:5px; margin-top:5px; width:250px" />\r\n<p style="text-align:justify"><span style="font-size:20px"><span style="font-family:tahoma,geneva,sans-serif"><span style="color:rgb(0, 0, 0)">Мы тщательно следим за тем, как исполнители выполняют задания заказчиков. На основании отзывов пользователей, оставленных после выполнения поручений, формируется общий рейтинг каждого исполнителя. За некачественно выполненную работу и отрицательные отзывы заказчиков исполнитель может быть лишен своего статуса.</span></span></span></p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n</div>\r\n\r\n<div>\r\n<hr />\r\n<hr />\r\n<p style="text-align:center"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:24px"><strong>Как стать исполнителем</strong></span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">Для получения статуса &laquo;Исполнитель&raquo; необходимо:</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px"><strong>&rArr;&nbsp;</strong></span></span><span style="color:rgb(0, 153, 255)"><span style="font-size:20px"><strong>пройти процедуру регистрации</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">&nbsp;в качестве обычного пользователя. Это займет не более 1 минуты. Загрузить свою фотографию.</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><span style="font-size:20px"><strong>&rArr;&nbsp;</strong></span><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 153, 255)"><span style="font-size:20px"><strong>привязать свою страницу из социальных сетей</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">&nbsp;(vk.com, ok.ru, facebook.com) к своему профилю на helpyou.by, что можно сделать в личном кабинете. Страница не будет отображаться в Ваших контактных данных и будет доступна только администрации сайта.</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 153, 255)"><span style="font-size:20px"><strong>подтвердить свой мобильный телефон и e-mail</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">.</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 153, 255)"><span style="font-size:20px"><strong>указать информацию о себе в профиле</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">&nbsp;(Образование, профессия, навыки, личностные качества). Чем больше информации Вы предоставите о себе, тем легче нам будет принять решение о присвоении Вам статуса Исполнителя.</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">перейти по ссылке &laquo;СТАТЬ ИСПОЛНИТЕЛЕМ&raquo;, и&nbsp;</span></span><span style="color:rgb(0, 153, 255)"><span style="font-size:20px"><strong>выбрать категории заданий</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">, которые Вы бы хотели выполнять. Информация о новых задания будет приходить к вам на e-mail, указанный в личном кабинете.</span></span></span></p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">В течение 2 рабочих дней после получения заявки администрация helpyou.by примет решение о присвоении Вам статуса исполнителя.</span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">Исполнитель может быть лишен своего статуса, аккаунт пользователя может быть заблокирован вовсе за нарушение правил сервиса, а также получение нескольких отрицательных отзывов от заказчиков.</span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">После получения статуса исполнителя у Вас появляется возможность предложить свои услуги и выполнить любое опубликованное задание:</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">найдите интересующее задание</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">в случае возникновения вопросов, задайте их заказчику в комментариях к заданию</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">если Вы готовы выполнить задание, нажмите на кнопку &laquo;ПРЕДЛОЖИТЬ СВОЮ КАНДИДАТУРУ&raquo;</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">на Ваш телефон придет SMS с контактными данными заказчика, если Вас выберут для выполнения задания</span></span></span></p>\r\n\r\n<hr />\r\n<hr />\r\n<p style="margin-left:40px; text-align:center"><span style="font-size:24px"><strong>Каждый пятый заказ оплачивается сервисом HelpYou.by​</strong></span></p>\r\n\r\n<p><span style="font-size:20px"><span style="font-family:arial,helvetica,sans-serif">Разместите четыре заказа на сервисе HelpYou.by и получите&nbsp;пятый заказ бесплатно!</span></span></p>\r\n\r\n<p style="margin-left:40px"><span style="font-size:20px"><span style="font-family:arial,helvetica,sans-serif">* Сумма&nbsp;заказа, оплачиваемого сервисом HelpYou.by в рамках акции,&nbsp;не должна превышать среднюю стоимость предыдущих четырех выполненных заказов.<br />\r\n* 100% скидка на пятый заказ предоставляется пользователю, </span></span><span style="font-size:20px"><span style="font-family:arial,helvetica,sans-serif">если его предыдущие четыре&nbsp;заказа были выполнены исполнителями сервиса HelpYou.by.&nbsp;<br />\r\n* Сервис HelpYou.by вправе изменить или прекратить акцию в любое время без уведомления пользователей.</span></span></p>\r\n</div>\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_notification`
--

CREATE TABLE IF NOT EXISTS `admin_notification` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `task_id` int(255) NOT NULL,
  `user_from` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `created` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `user_from` (`user_from`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Dumping data for table `admin_notification`
--

INSERT INTO `admin_notification` (`id`, `task_id`, `user_from`, `subject`, `created`) VALUES
(138, 225, 169, 'satisfied', 1427877055),
(142, 226, 169, 'satisfied', 1427885759),
(143, 231, 168, 'satisfied', 1427886638),
(144, 231, 169, 'satisfied', 1427887109),
(145, 226, 168, 'satisfied', 1427887719),
(146, 225, 168, 'satisfied', 1427887922),
(147, 229, 169, 'satisfied', 1427915879),
(150, 235, 169, 'satisfied', 1427917173),
(151, 235, 168, 'satisfied', 1427917190),
(152, 235, 169, 'satisfied', 1427917198),
(154, 274, 391, 'satisfied', 1429089969),
(155, 274, 421, 'satisfied', 1429090234);

-- --------------------------------------------------------

--
-- Table structure for table `balance_reserve`
--

CREATE TABLE IF NOT EXISTS `balance_reserve` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `task_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `created` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `become_performer`
--

CREATE TABLE IF NOT EXISTS `become_performer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `become_performer`
--

INSERT INTO `become_performer` (`id`, `text`) VALUES
(1, '<p style="text-align:center"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:24px"><strong>Как стать исполнителем</strong></span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">Для получения статуса &laquo;Исполнитель&raquo; необходимо:</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px"><strong>&rArr;&nbsp;</strong></span></span><span style="color:#0099FF"><span style="font-size:20px"><strong>пройти процедуру регистрации</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">&nbsp;в качестве обычного пользователя. Это займет не более 1 минуты.</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><span style="font-size:20px"><strong>&rArr;&nbsp;</strong></span><span style="font-family:arial,helvetica,sans-serif"><span style="color:#0099FF"><span style="font-size:20px"><strong>привязать свою страницу из социальных сетей</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">&nbsp;(vk.com, ok.ru, facebook.com) к своему профилю на helpyou.by, что можно сделать в личном кабинете. Страница не будет отображаться в Ваших контактных данных и будет доступна только администрации сайта.</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:#0099FF"><span style="font-size:20px"><strong>подтвердить свой мобильный телефон и e-mail</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">.</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:#0099FF"><span style="font-size:20px"><strong>указать информацию о себе в профиле</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">&nbsp;(Образование, профессия, навыки, личностные качества). Чем больше информации Вы предоставите о себе, тем легче нам будет принять решение о присвоении Вам статуса Исполнителя.</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">перейти по ссылке &laquo;СТАТЬ ИСПОЛНИТЕЛЕМ&raquo;, и&nbsp;</span></span><span style="color:#0099FF"><span style="font-size:20px"><strong>выбрать категории заданий</strong></span></span><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">, которые Вы бы хотели выполнять. Информация о новых задания будет приходить к вам на e-mail, указанный в личном кабинете.</span></span></span></p>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">В течение 2 рабочих дней после получения заявки администрация helpyou.by примет решение о присвоении Вам статуса исполнителя.</span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">Исполнитель может быть лишен своего статуса, аккаунт пользователя может быть заблокирован вовсе за нарушение правил сервиса, а также получение нескольких отрицательных отзывов от заказчиков.</span></span></span></p>\r\n\r\n<p style="text-align:center"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:24px"><strong>Условия работы на helpyou.by</strong></span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">После получения статуса исполнителя у Вас появляется возможность предложить свои услуги и выполнить любое опубликованное задание:</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">найдите интересующее задание</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">в случае возникновения вопросов, задайте их заказчику в комментариях к заданию</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">если Вы готовы выполнить задание, нажмите на кнопку &laquo;ПРЕДЛОЖИТЬ СВОЮ КАНДИДАТУРУ&raquo;</span></span></span></p>\r\n\r\n<p style="margin-left:40px; text-align:justify"><strong><span style="font-size:20px">&rArr;&nbsp;</span></strong><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">на Ваш телефон придет SMS с контактными данными заказчика, если Вас выберут для выполнения задания</span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">Обязательным условием для предложения своих услуг, является наличие на Вашем балансе не менее 12 % от стоимости задания. При регистрации на сайте на Ваш баланс зачисляется 50 тыс. баллов. Это дает Вам возможность опробовать работу сервиса без внесения собственных средств. В дальнейшем Вы можете пополнить баланс самостоятельно. Пример:</span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">Пользователь Владимир Л. создал задание &laquo;Перевезти диван из Минска в Логойск&raquo; Стоимость задания &ndash; 300 000 рублей. Для подачи заявки на указанное задание Вам необходимо иметь на своем балансе 36 000 рублей.</span></span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="color:rgb(0, 0, 0)"><span style="font-size:20px">Если Вы будете выбраны в качестве исполнителя, указанные средства заморозятся на Вашем балансе и спишутся после выполнения. Если задание было не выполнено по вине заказчика, все средства, списанные со счета, будут возвращены.</span></span></span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'no-image.png',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `parent_id`, `image`) VALUES
(16, 'Доставка (услуги курьера)', '', 0, 'courier.png'),
(17, 'Доставка подарков и цветов', NULL, 16, '140x100.gif'),
(18, 'Купить и доставить', NULL, 16, '140x100.gif'),
(19, 'Перевозки и погрузка', 'Грузчик, грузчик, парень работящий,\r\nГрузчик, грузчик, прёт, кладёт и тащит.\r\nВсе, кто науку хочет до конца познать,\r\nГрузчиком, конечно, сразу мечтает стать.', 0, 'delivery.png'),
(20, 'Грузоперевозки', NULL, 19, '13.png'),
(21, 'Пассажирские перевозки', NULL, 19, '140x100.gif'),
(22, 'Услуги водителя', NULL, 19, '140x100.gif'),
(23, 'Услуги грузчиков', NULL, 19, '140x100.gif'),
(24, 'Помощь по компьютеру', '', 0, 'сumpter work copy.png'),
(25, 'Установка операционных систем, программ', '', 24, '140x100.gif'),
(26, 'Восстановление данных', '', 24, '140x100.gif'),
(27, 'Курьерские услуги', 'dergrdfgdfgd', 16, '140x100.gif'),
(28, 'Другое', '', 16, NULL),
(29, 'Другое', '', 19, NULL),
(30, 'Ремонт компьютеров, ноутбуков', '', 24, NULL),
(33, 'Другое', '', 24, NULL),
(34, 'Уборка и помощь по дому', '', 0, 'clean-ed.png'),
(35, 'Уборка помещений', '', 34, NULL),
(36, 'Приготовление еды', '', 34, NULL),
(37, 'Стирка, глажка', '', 34, NULL),
(38, 'Выгул животных', '', 34, NULL),
(39, 'Другое', '', 34, NULL),
(40, 'Бытовой ремонт, установка техники и  мебели', '', 0, '1426177715_Settings-5-128.png'),
(41, 'Отделочные работы', '', 40, NULL),
(42, 'Услуги сантехника', '', 40, NULL),
(43, 'Услуги электрика', '', 40, NULL),
(44, 'Сборка мебели', '', 40, NULL),
(45, 'Ремонт и установка бытовой техники', '', 40, NULL),
(46, 'Другое', '', 40, NULL),
(47, 'Услуги фрилансера, дизайн и web-разработка', '', 0, '1426177747_Coding-Html-128.png'),
(48, 'Сайт под ключ', '', 47, NULL),
(49, 'Дизайн сайтов', '', 47, NULL),
(50, 'Разработка логотипов', '', 47, NULL),
(51, 'Верстка', '', 47, NULL),
(52, 'Другое', '', 47, NULL),
(53, 'Мероприятия и праздники', '', 0, 'party.png'),
(54, 'Услуги ведущего, тамады', '', 53, NULL),
(55, 'Фото/видеосъемка', '', 53, NULL),
(56, 'Организация праздника', '', 53, NULL),
(57, 'Оформление', '', 53, NULL),
(58, 'Другое', '', 53, NULL),
(59, 'Красота и здоровье', '', 0, 'cut.png'),
(60, 'Парикмахерские услуги', '', 59, NULL),
(61, ' Макияж', '', 59, NULL),
(62, 'Маникюр, педикюр', '', 59, NULL),
(63, ' Массаж', '', 59, NULL),
(64, 'Другое', '', 59, NULL),
(65, 'Услуги специалиста', '', 0, 'specialist.png'),
(66, 'Услуги юриста', '', 65, NULL),
(67, 'Услуги бухгалтера', '', 65, NULL),
(68, 'Копирайт', '', 65, NULL),
(69, 'Репетитор', '', 65, NULL),
(70, 'Написание курсовых и дипломных работ', '', 65, NULL),
(71, 'Другое', '', 65, NULL),
(72, 'Виртуальный помощник', '', 0, '1426177816_Telemarketer-Woman-2-128.png'),
(73, 'Поиск и обработка информации', '', 72, NULL),
(74, 'Прозвон баз по телефону', '', 72, NULL),
(75, 'Работа с текстом, копирайтинг, переводы', '', 72, NULL),
(76, 'Размещение объявлений', '', 72, NULL),
(77, 'Виртуальный ассистент', '', 72, NULL),
(78, 'Другое', '', 72, NULL),
(79, 'Ремонт цифровой техники', '', 0, 'helpcomp.png'),
(80, 'Ремонт мобильных телефонов и планшетов', '', 79, NULL),
(81, 'Ремонт аудио- и видеотехники', '', 79, NULL),
(82, 'Ремонт и обслуживание копировальной техники', '', 79, NULL),
(83, 'Другое', '', 79, NULL),
(84, 'Сборка компьютера', '', 24, NULL),
(85, 'Другие услуги', '', 0, 'другие.png'),
(86, 'Другое', '', 85, 'другие.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `task_id` int(255) NOT NULL,
  `user_from` int(255) NOT NULL,
  `user_to` int(255) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `created` int(255) NOT NULL,
  `read` int(2) NOT NULL DEFAULT '0',
  `parent_id` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `task_id`, `user_from`, `user_to`, `text`, `created`, `read`, `parent_id`) VALUES
(69, 272, 168, 0, 'Материал это арматура 4 м. длинной и бочки ПВХ объемом 150 л.', 1429076902, 0, 0),
(70, 274, 421, 0, 'Какой размер листов?', 1429089660, 0, 0),
(83, 300, 415, 0, 'Добрый день.Обратно сразу вести или ждать надо?', 1431950319, 0, 0),
(87, 300, 168, 0, 'надо ждать пару часов', 1432214645, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `js_map` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `content`, `js_map`) VALUES
(1, '<p><span style="font-size:18px"><span style="color:#000000"><span style="font-family:arial,helvetica,sans-serif">По всем вопросам пишите нам на </span></span><span style="color:#008000"><span style="font-family:arial,helvetica,sans-serif">mail@helpyou.by</span></span></span></p>\r\n\r\n<p><span style="font-size:18px"><span style="color:#000000"><span style="font-family:arial,helvetica,sans-serif">Мы всегда рады помочь и проконсультировать Вас по любому вопросу, касающемуся работы сайта.<br />\r\nПриветствуется конструктивная критика. С вашей помощью мы меняемся к лучшему.</span></span></span></p>\r\n\r\n<hr />\r\n<p><span style="font-size:18px"><span style="color:#000000"><span style="font-family:arial,helvetica,sans-serif">Телефоны&nbsp;службы поддержки:</span></span></span></p>\r\n\r\n<p><span style="font-size:18px"><span style="color:#000000"><span style="font-family:arial,helvetica,sans-serif">+375 29 9607948</span></span></span></p>\r\n\r\n<p><span style="font-size:18px"><span style="color:#000000"><span style="font-family:arial,helvetica,sans-serif">+375 33 6907948<br />\r\nПоддержка пользователей семь дней в неделю с 9:00 по 21:00.</span></span></span></p>\r\n\r\n<p><span style="color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif; font-size:18px">Также Вы можете задать свой вопрос в нашей группе ВКонтакте</span><span style="font-size:18px"> <a href="https://vk.com/byhelpyou"><span style="color:#008000">Работа в Минске</span></a></span></p>\r\n\r\n<hr />\r\n<p><span style="font-size:18px"><span style="color:#000000"><span style="font-family:arial,helvetica,sans-serif">Спасибо, что пользуетесь нашим сервисом!<br />\r\nС уважением,<br />\r\nкоманда HelpYou!</span></span></span></p>\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `page_category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_from` int(255) NOT NULL,
  `user_to` int(255) NOT NULL,
  `rating` int(100) NOT NULL,
  `punctuality` int(5) NOT NULL,
  `politeness` int(5) NOT NULL,
  `quality` int(5) NOT NULL,
  `task_id` int(255) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `created` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `user_to` (`user_to`),
  KEY `user_from` (`user_from`),
  KEY `user_from_2` (`user_from`),
  KEY `user_to_2` (`user_to`),
  KEY `task_id_2` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=183 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_from`, `user_to`, `rating`, `punctuality`, `politeness`, `quality`, `task_id`, `kind`, `text`, `created`) VALUES
(165, 169, 168, 5, 5, 5, 5, 225, 'positive', 'Все хорошо! буду еще заказывать!', 1427877055),
(169, 169, 168, 5, 5, 5, 5, 226, 'positive', 'Все работает! Спасибо', 1427885759),
(170, 168, 169, 5, 5, 5, 5, 231, 'positive', '1', 1427886638),
(171, 169, 168, 5, 5, 5, 5, 231, 'positive', '', 1427887109),
(172, 168, 169, 2, 2, 2, 2, 226, 'positive', '', 1427887719),
(173, 168, 169, 2, 2, 2, 2, 225, 'positive', '', 1427887922),
(174, 169, 169, 5, 5, 5, 5, 229, 'positive', 'Спасибо!', 1427915879),
(177, 169, 168, 5, 5, 5, 5, 235, 'positive', '', 1427917173),
(178, 168, 169, 1, 1, 1, 1, 235, 'positive', '', 1427917190),
(179, 169, 168, 5, 5, 5, 5, 235, 'positive', '', 1427917198),
(181, 391, 421, 5, 5, 5, 5, 274, 'positive', 'Все хорошо', 1429089969),
(182, 421, 391, 5, 5, 5, 5, 274, 'positive', 'Приятная девушка, заказывайте еще, буду рад))))))', 1429090234);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `main_banner`
--

CREATE TABLE IF NOT EXISTS `main_banner` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL DEFAULT 'no-image.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `main_banner`
--

INSERT INTO `main_banner` (`id`, `image`) VALUES
(49, 'building_wallpaper1936.png'),
(50, 'happy.jpg'),
(51, 'woman.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_from` int(255) NOT NULL,
  `user_to` int(255) NOT NULL,
  `task_id` int(255) NOT NULL,
  `text` text CHARACTER SET utf8,
  `created` int(100) NOT NULL,
  `unread` int(1) NOT NULL DEFAULT '1',
  `admin_read` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_from` (`user_from`),
  KEY `user_to` (`user_to`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=175 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_from`, `user_to`, `task_id`, `text`, `created`, `unread`, `admin_read`) VALUES
(162, 169, 168, 226, 'Вот тебе сообщения', 1427885737, 0, 1),
(163, 169, 168, 225, 'И тут оставь отзыв!', 1427887891, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE IF NOT EXISTS `password_recovery` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_log`
--

CREATE TABLE IF NOT EXISTS `payment_log` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `order_num` varchar(255) CHARACTER SET utf8 NOT NULL,
  `amount` varchar(255) CHARACTER SET utf8 NOT NULL,
  `time` varchar(255) CHARACTER SET utf8 NOT NULL,
  `currency_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `wsb_signature` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rrn` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `performer_application`
--

CREATE TABLE IF NOT EXISTS `performer_application` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `customer_id` int(100) NOT NULL,
  `about` text,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `performer_application`
--

INSERT INTO `performer_application` (`id`, `customer_id`, `about`) VALUES
(76, 261, 'be_a_performer'),
(78, 282, 'be_a_performer'),
(79, 286, 'be_a_performer'),
(85, 310, 'be_a_performer'),
(87, 317, 'be_a_performer'),
(88, 320, 'be_a_performer'),
(89, 321, 'be_a_performer'),
(91, 323, 'be_a_performer'),
(92, 326, 'be_a_performer'),
(93, 270, 'be_a_performer'),
(99, 346, 'be_a_performer'),
(101, 350, 'be_a_performer'),
(104, 354, 'be_a_performer'),
(181, 17, 'be_a_performer');

-- --------------------------------------------------------

--
-- Table structure for table `phone_verification`
--

CREATE TABLE IF NOT EXISTS `phone_verification` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `code` varchar(6) NOT NULL,
  `created` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=327 ;

--
-- Dumping data for table `phone_verification`
--

INSERT INTO `phone_verification` (`id`, `user_id`, `phone_number`, `code`, `created`) VALUES
(114, 187, '375292005066', '982388', '1427890126'),
(115, 185, '375257933148', '883150', '1427890344'),
(117, 191, '375375', '802697', '1427891177'),
(118, 184, '375297866375', '162421', '1427892856'),
(120, 199, '375293672072', '707042', '1427926123'),
(121, 200, '375333020444', '544320', '1427953117'),
(123, 205, '375297779700', '748049', '1427957792'),
(124, 207, '375295027580', '846072', '1427964942'),
(125, 213, '375375', '844806', '1427990944'),
(126, 216, '375445893811', '656058', '1427996091'),
(127, 217, '375295454484', '133121', '1427996904'),
(128, 218, '375375', '840265', '1428000913'),
(130, 223, '375336247351', '657157', '1428007048'),
(133, 230, '375256498990', '680107', '1428044541'),
(134, 233, '375296737576', '858099', '1428049287'),
(140, 248, '375447789266', '669005', '1428057717'),
(141, 241, '375336762894', '001946', '1428059368'),
(142, 252, '375292677002', '993134', '1428060436'),
(144, 258, '375297579230', '378262', '1428062107'),
(146, 261, '375447231147', '015821', '1428063351'),
(147, 266, '375447549143', '418607', '1428066636'),
(153, 283, '375253', '028139', '1428122866'),
(159, 292, '375282048614', '864720', '1428143495'),
(188, 341, '375298582936', '001218', '1428322109'),
(317, 517, '375447515143', '062401', '1430394909'),
(320, 336, '375447147154', '943521', '1430944491'),
(324, 540, '375294822222', '108740', '1432123620');

-- --------------------------------------------------------

--
-- Table structure for table `safety`
--

CREATE TABLE IF NOT EXISTS `safety` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `safety`
--

INSERT INTO `safety` (`id`, `text`) VALUES
(1, '<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:20px">Надежность и безопасность &ndash; главные принципы работы нашего сервиса.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:20px">Именно поэтому все исполнители helpyou.by &ndash; это реально существующие люди с подтвержденными личными и контактными данными.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:20px">До присвоения статуса Исполнителя администрация сайта истребует личную информацию и контактные данные каждого претендента. В случае возникновения сомнений в достоверности предъявленных данных менеджеры сервиса вправе потребовать для проверки документы удостоверяющие личность, а также провести собеседование в офисе компании.</span></span></p>\r\n\r\n<p style="text-align:justify"><span style="font-family:arial,helvetica,sans-serif"><span style="font-size:20px">На сайте helpyou.by действует достоверная система рейтинга и отзывов. Каждый заказчик после выполнения задания может оставить подробный отзыв о работе исполнителя, оценив его по таким критериям как вежливость, пунктуальность, качество. В случае некачественного исполнения заданий, появления отрицательных отзывов со стороны заказчиков пользователь может быть лишен статуса исполнителя.&nbsp;</span></span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `performer_id` int(100) DEFAULT NULL,
  `customer_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `price` int(255) DEFAULT NULL,
  `description` text,
  `customers_price` int(255) DEFAULT NULL,
  `performer_price` int(255) DEFAULT NULL,
  `propose_price` int(1) NOT NULL DEFAULT '0',
  `final_date` varchar(255) DEFAULT NULL,
  `expiry_date` int(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'non_taken',
  `docs` int(2) NOT NULL DEFAULT '0',
  `task_image` varchar(255) NOT NULL DEFAULT 'no-image.png',
  `created_at` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `performer_id` (`performer_id`),
  KEY `customer_id` (`customer_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=308 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `performer_id`, `customer_id`, `category_id`, `price`, `description`, `customers_price`, `performer_price`, `propose_price`, `final_date`, `expiry_date`, `status`, `docs`, `task_image`, `created_at`) VALUES
(225, 'Убрать квартиру', 168, 169, 35, 200000, 'Надо пропылесосить, помыть полы, протереть пыль.', 200000, NULL, 0, '1428613200', NULL, 'closed', 0, 'no-image.png', 1427807283),
(226, 'Переустановка Виндоус', 168, 169, 25, 100000, 'Установить виндоус 7 с сохранением всей информации', 100000, NULL, 0, '1427922000', NULL, 'closed', 0, 'no-image.png', 1427808190),
(229, 'Доставить меня в Фаниполь', 169, 169, 17, 100000, 'Доставить меня в Фаниполь до 18 00 в субботу 4 апреля\r\n', 100000, NULL, 0, '1428159600', NULL, 'closed', 0, 'no-image.png', 1427879892),
(231, 'Доставить пакет в ТЦ Корона', 168, 169, 27, 40000, 'отвезти пакет с документами с Воронянского 15\\1 до Короны к 18 00  сегодня', 40000, NULL, 0, '1427900400', NULL, 'closed', 1, 'no-image.png', 1427885296),
(235, 'Отремонтировать планшет', 169, 168, 80, 100000, 'Отремонтировать планшет Ritmixне работает гнездо для зарядки.', 100000, NULL, 0, '1427983200', NULL, 'closed', 0, 'no-image.png', 1427916758),
(272, 'Перевозка материалов', NULL, 168, 20, 350000, '12 июня 2015 г. Необходимо забрать 3 человек и материал для постройки плота с д. Следюки (40 км. от Могилева в Гомельском направлении) и отвезти в Давид-Городок (Брестская область, Столинский район). Расстояние - около 350 км. 20 июня забрать из Турова и отвезти обратно. Нужна машина с с вместительностью материалов 4 метра длинной. Ставлю цену с учетом 350 000 за  100 км. Общее расстояние около 800 км.  По факту заплатим по километражу.', 350000, NULL, 0, '1434139200', NULL, 'non_taken', 0, 'amr8rtyw0nhwl159baqkyydt8gv5welupxn8d6dv4iaav.jpg', 1429007398),
(273, 'холодильник', 458, 449, 20, 150000, 'Загрузка, перевозка, доставка холодильника ( куйбышева 48 - сурганова 37/5, 2 км)', 150000, NULL, 0, '1429084800', 0, 'closed', 0, 'no-image.png', 1429022133),
(274, 'шифер', 421, 391, 20, 400000, 'требуется перевезти шифер 20 листов по 20 кг 50 км от Минска ', 400000, 400000, 1, '1429131600', 0, 'closed', 0, 'no-image.png', 1429088872),
(275, 'Уборка территории', 412, 470, 86, 400000, 'Требуется 2 человека для уборки территории возле частного дом, до дома подкину \r\nза час 100 тыс, работы на 2 часа', 400000, NULL, 0, '1429106400', 0, 'closed', 0, 'no-image.png', 1429103524),
(276, 'Коляска и кроватка', 386, 471, 20, 300000, 'требуется бус нужно перевезти коляску и кроватку\r\nот Неманской 15 до Одинцова', 300000, 300000, 1, '1429110000', 0, 'closed', 0, 'no-image.png', 1429105124),
(277, 'Маляр по дереву', NULL, 479, 86, NULL, 'Для покраски деревянных окон, требуется маляр по дереву с опытом работы. Покраска окон производится на объектах г.Минска и области. Наличие автомобиля обязательно. Работа по свободному графику, разъездная. Обязателен опыт работы с лаками и красками на водной основе.\r\nРабота сезонная - с мая по октябрь.\r\nХорошая возможность для дополнительного заработка.', NULL, NULL, 1, '1430427600', 0, 'non_taken', 0, 'no-image.png', 1429373465),
(293, 'расклейка объявлений', 380, 397, 58, 250000, 'Требуется расклейщик объявлений по подъездам  в  Минске, каменная горка\r\n за 1000 объявлений 250.000 б.р.\r\n\r\nОт 18 лет', 250000, NULL, 0, '1430600400', 0, 'closed', 0, 'no-image.png', 1430297974),
(294, 'Нужно 2 грузчиков', 413, 511, 23, 300000, 'Нужен 2 грузчиков по ул Слободская \r\n50 000 в час каждому, работы на 3 часа', 300000, NULL, 0, '1430550000', 0, 'closed', 0, 'no-image.png', 1430307950),
(297, 'Продвижение сайта ', NULL, 168, 52, NULL, 'Нужно продвинуть сайт в поисковиках в топ 5 по следующим ключевикам: сплав +на плоту 86 сплав +на плоту +по реке 25 сплав +на плоту беларусь 21 сплав +на плотах +по рекам беларуси 14 сплав +по днепру +на плоту 14 сплав +на плоту +по березине 12 плот сплав березина аренда 7 аренда плота +для сплава 4 постройка плота +для сплава 3 прокат плота +для сплава 3 сплав +на плоту +по неману 8 плот +в аренду 19 плот сплав березина аренда 7 плот +на прокат 15 прокат плота +для сплава 3 на плоту +по реке 66 Предлагайте свою цену и реальный срок продвижения.', NULL, NULL, 1, '1435654800', NULL, 'non_taken', 0, 'no-image.png', 1430815049),
(300, 'Минск-Туров, Туров-Минск', NULL, 168, 21, NULL, '20 июня. Пять пассажиров  и багаж по маршруту Минск-Туров и обратно. Предлагайте цену.', NULL, NULL, 1, '1434776400', NULL, 'non_taken', 0, 'no-image.png', 1431947894),
(301, 'Роль "Капитана корабля" для корпаратива', NULL, 537, 54, 400000, '6 июня выступить в роли капитана (ншы) одевшись в тельняшку. Мероприятие будет на плоту, плывущему по реке. Нужно развлекать гостей. По времени около 7 часов. Одежду предоставлю. Отвезу-привезу. Оформление по договору подряда. Если понравитесь, возможно дальнейшее сотрудничество.', 400000, NULL, 0, '1433577600', 0, 'non_taken', 0, 'no-image.png', 1431948412),
(304, 'Минск-Лещины (85 км) отвезти 20 человек', NULL, 168, 21, NULL, 'В 20 числах июня забрать утром с Минска 23 человека и отвезти в д. Лещины (Борисовский район), подождать 8 часов и отвезти обратно. Оплата по безналу. Пишите цену.', NULL, NULL, 1, '1435305600', NULL, 'non_taken', 0, 'no-image.png', 1432271775),
(305, 'Ищу человека, который предоставит место на Березине для швартофки плавсредства', NULL, 168, 86, 1000000, 'Ищу место на Березине для швартофки плавсредства до октября.', 1000000, NULL, 0, '1443564000', NULL, 'non_taken', 0, 'no-image.png', 1432365443);

-- --------------------------------------------------------

--
-- Table structure for table `task_images`
--

CREATE TABLE IF NOT EXISTS `task_images` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `task_id` int(255) NOT NULL,
  `user_id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `task_preposition`
--

CREATE TABLE IF NOT EXISTS `task_preposition` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `task_id` int(100) NOT NULL,
  `performer_id` int(100) NOT NULL,
  `performers_price` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `performer_id` (`performer_id`),
  KEY `performer_id_2` (`performer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `task_preposition`
--

INSERT INTO `task_preposition` (`id`, `task_id`, `performer_id`, `performers_price`) VALUES
(142, 272, 169, NULL),
(155, 300, 415, 70000),
(156, 297, 415, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `content`) VALUES
(1, '                       <p><strong>Соглашение об использовании сайта </strong><strong>helpyou</strong><strong>.</strong><strong>by</strong></p>\r\n\r\n<p>город Минск.</p>\r\n\r\n<p><strong>1. Термины и определения</strong></p>\r\n\r\n<p><strong>1.1.</strong>&nbsp;<strong>Компания</strong> - общество с ограниченной ответственностью «Айкенду», 220005, Республика Беларусь, город Минск, 220024, г. Минск, ул. Бабушкина, д. 90, каб. 108, текущий (расчетный) счет 301203037044011 в ОАО «Приорбанк».</p>\r\n\r\n<p><strong>1.2.</strong>&nbsp;<strong>Сайт</strong> - официальный сайт Компании в глобальной компьютерной сети Интернет, расположенный по адресу www.helpyou.by</p>\r\n\r\n<p><strong>1.3.</strong>&nbsp;<strong>Администрация</strong> – сотрудники Компании, а также лица, уполномоченные надлежащим образом Компанией на управление Сайтом и предоставление Услуг Пользователям, в рамках использования Сайта последним.</p>\r\n\r\n<p><strong>1.4.</strong> <strong>Акцепт оферты</strong>&nbsp;– полное и безоговорочное принятие Пользователем Соглашения об использовании сайта путем осуществления действий, указанных в п. 2.3. Публичной оферты.</p>\r\n\r\n<p><strong>1.5. Баланс</strong>&nbsp;– виртуальный счет, входящий в состав Профиля Пользователя, на котором отображается сумма внесенных им денежных средств для оплаты возмездных услуг, предоставляемых Компанией.</p>\r\n\r\n<p><strong>1.6. Задание (задача)</strong> – объявление о необходимости выполнения работ и (или) оказания услуг, размещенное на сайте Заказчиком и адресованное Исполнителю</p>\r\n\r\n<p><strong>1.7. Цена Задания</strong> – сумма вознаграждения указанная Пользователем-Заказчиком за выполнение размещенного Задания.</p>\r\n\r\n<p><strong>1.8. Верификация</strong> - подтверждение личных и контактных данных, предоставленных Пользователем для получения размещения задания и получения статуса «Исполнитель».</p>\r\n\r\n<p><strong>1.9.</strong> <strong>Возмездные</strong> <strong>услуги</strong>&nbsp;– услуги оказываемые Компанией Пользователю-Исполнителю, предусмотренные разделом. 7 настоящего соглашения.</p>\r\n\r\n<p><strong>1.10. Пользователь</strong>&nbsp;– совершеннолетний гражданин Республики Беларусь, прошедший процедуру Регистрации на Сайте и получивший возможность использовать сервисы Сайта.</p>\r\n\r\n<p><strong>1.11</strong>. <strong>Заказчик</strong> – пользователь, прошедший процедуру регистрации, подтвердивший свои контактные данные и размещающий на сайте задание;</p>\r\n\r\n<p><strong>1.12. Исполнитель</strong> – пользователь, прошедший процедуру верификации и предлагающий выполнение работ и (или) услуг</p>\r\n\r\n<p><strong>1.13</strong>&nbsp;<strong>Профиль</strong>&nbsp;– информация, размещаемая по&nbsp;усмотрению Пользователя о&nbsp;себе. Для Пользователя-Исполнителя в&nbsp;Профиле также содержатся сведения о&nbsp;категориях предполагаемых к&nbsp;выполнению Заданий, фото, сведения о&nbsp;ранее выполняемой работе, сведения об&nbsp;учебных заведениях, предполагаемая стоимость выполнения Заданий и&nbsp;иная информация.</p>\r\n\r\n<p><strong>1.14.</strong>&nbsp;<strong>Стоимость услуг</strong> – расчетная величина, выраженная в&nbsp;валюте Республике Беларусь, которая определяется в&nbsp;процентном соотношении (12 %) от&nbsp;Цены Задания и оплачивается Исполнителем&nbsp; Компании.&nbsp;</p>\r\n\r\n<p><strong>1.15.</strong>&nbsp;<strong>Выбор Исполнителя</strong> – принятие Пользователем – Заказчиком предложения Пользователя – Исполнителя исполнить конкретное Задание.</p>\r\n\r\n<p><strong>1.16. Логин</strong>&nbsp;– адрес электронной почты Пользователя, выбранный им&nbsp;при регистрации и&nbsp;используемый им&nbsp;в&nbsp;процессе пользования Сайтом. Запрещается регистрировать и&nbsp;использовать несколько Логинов одним и&nbsp;тем&nbsp;же Посетителем.</p>\r\n\r\n<p><strong>1.17. Пароль</strong>&nbsp;– символьная комбинация, выбираемая Пользователем самостоятельно и&nbsp;обеспечивающая в&nbsp;совокупности с&nbsp;Логином его идентификацию при использовании Ресурса.</p>\r\n\r\n<p><strong>1.18. Стороны</strong> – Исполнитель, Заказчик, Компания вместе взятые.</p>\r\n\r\n<p><strong>1.19. Оферта </strong>– &nbsp;настоящее соглашение об использовании Сайта (далее может именоваться Договор).</p>\r\n\r\n<p>В&nbsp;настоящем Соглашении могут быть использованы термины, не&nbsp;определенные в&nbsp;разделе 1 Соглашения. В&nbsp;этом случае толкование такого термина производится в&nbsp;соответствии с&nbsp;текстом Соглашения и общепризнанным смысловым значением данного термина.&nbsp;</p>\r\n\r\n<p><strong>2. Общие положения</strong></p>\r\n\r\n<p><strong>2.1.</strong>&nbsp;Настоящее Соглашение разработано в соответствии с законодательством Республики Беларусь и определяет общие условия и порядок пользования Сайтом, порядок предоставления Услуг Компанией Пользователю, права и обязанности Компании и Пользователя, меры ответственности, а также иные условия, регламентирующие отношения между Компанией и Пользователем.</p>\r\n\r\n<p><strong>2.2.</strong>&nbsp;Настоящее Соглашение является публичной офертой и размещается на официальном сайте Компании в глобальной компьютерной сети Интернет, расположенном по адресу www.helpyou.by. Публичная оферта представляет собой официальное предложение Общества с ограниченной ответственностью «Айкэнду», в лице директора Кусочкина Ивана Ваильевича, действующей на основании Устава, , оказания услуг в порядке и на условиях предусмотренных настоящим Соглашением</p>\r\n\r\n<p><strong>2.3.</strong> Пользователь вправе присоединиться к условиям настоящих Правил (акцептовать оферту) путем регистрации на Сайте в порядке, установленном настоящим Соглашением</p>\r\n\r\n<p><strong>2.4.</strong>&nbsp;Регистрация в качестве Пользователя Сайта свидетельствует о заключении между Пользователем и Компанией Договора, условия которого определены в настоящем Соглашении.</p>\r\n\r\n<p><strong>2.5.</strong> Принимая условия настоящего Соглашения путем Акцепта, Пользователь гарантирует Компании, что:</p>\r\n\r\n<ul>\r\n	<li>указал достоверные данные, в&nbsp;том числе персональные данные, при регистрации на&nbsp;сайте и&nbsp;достоверные данные Пользователя,</li>\r\n	<li>заключает Договор добровольно, при этом: а) полностью ознакомился с&nbsp;условиями Соглашения, б) полностью понимает значение и&nbsp;последствия своих действий в&nbsp;отношении заключения и&nbsp;исполнения Соглашения,</li>\r\n	<li>обладает всеми правами и&nbsp;полномочиями, необходимыми для заключения и&nbsp;исполнения Соглашения.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3. Регистрация Пользователя</strong></p>\r\n\r\n<p><strong>3.1.</strong> Лицо, желающее стать Пользователем, обязано пройти процедуру Регистрации на соответствующей странице Ресурса. При Регистрации Пользователю присваивается выбранная им пара Логин плюс Пароль, которая используется в дальнейшем Пользователем при работе с Сайтом. Пользователь может пройти процедуру Регистрации посредством использования своего профиля в одной из следующих&nbsp; социальных сетей (Вконтакте, Одноклассники, Facebook). Регистрация производится только один раз.</p>\r\n\r\n<p><strong>3.2.</strong> При регистрации на Сайте Пользователь обязан предоставить Администрации Сайта необходимую достоверную и актуальную информацию для формирования персональной страницы Пользователя, включая уникальные для каждого Пользователя Логин (адрес электронной почты) и Пароль доступа к Сайту, а также фамилию и имя.</p>\r\n\r\n<p>Регистрационная форма Сайта может запрашивать у&nbsp;Пользователя дополнительную информацию.</p>\r\n\r\n<p><strong>3.3.</strong> Пользователь несет ответственность за достоверность, актуальность, полноту и соответствие законодательству Республики Беларусь предоставленных данных. Пользователь самостоятельно несет ответственность за&nbsp;сохранность Пароля в тайне от третьих лиц.</p>\r\n\r\n<p><strong>3.4.</strong> После осуществления регистрации Пользователь может размещать задания на Сайте, а также пользоваться другими сервисами Сайта, за рядом исключений, предусмотренных настоящим Соглашением.</p>\r\n\r\n<p><strong>3.5.</strong> Осуществляя регистрацию на сайте, Пользователь настоящим подтверждает, что делает информацию, содержащуюся в своем профиле публичной, т. е. потенциально доступной всем посетителям сайта.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>4. Регистрация Исполнителя</strong></p>\r\n\r\n<p><strong>4.1.</strong> Пользователь желающий приобрести статус Исполнителя обязан указать дополнительные данные: дата рождения, не менее 1 аккаунта в соцсетях, сведения об образовании, трудовой деятельности, интересующие сферы предполагаемых заказов. Загрузить личную фотографию, на которой должен быть изображен непосредственно сам Исполнитель (лицо крупным планом).</p>\r\n\r\n<p>Дополнительные данные могут быть указаны как в ходе первоначальной регистрации на Сайте, так и в последующем, пройдя дополнительную регистрацию (верификацию) в качестве Исполнителя.</p>\r\n\r\n<p>Администрация имеет право отказать Пользователю в присвоении статуса «Исполнитель» без объяснения причин отказа независимо от затрат и усилий, понесенных Пользователем при прохождении процедуры Верификации.</p>\r\n\r\n<p><strong>4.2.</strong> Компания по своему усмотрению может предложить любому Исполнителю приобрести статус «Проверенный Исполнитель» пригласив его в офис компании. В ходе личной встречи с представителем Администрации Исполнитель должен предъявить паспорт, документы, подтверждающие профессиональную принадлежность и по желанию Исполнителя другие документы, характеризующие его профессиональный уровень.</p>\r\n\r\n<p>После соблюдения указанной процедуры Администрация присваивает Исполнителю статус «Проверенный Исполнитель». Информация о присвоении указанного статуса отображается в личном профиле Исполнителя.</p>\r\n\r\n<p><strong>4.3.</strong> К Исполнителю совершившему нижеперечисленные нарушения, может быть применено предупреждении, временное или постоянное лишение статуса Исполнителя (бан). Таковыми нарушениями являются:</p>\r\n\r\n<ul>\r\n	<li>Исполнитель не&nbsp;выполнил свое первое Задание;</li>\r\n	<li>Исполнитель получил три и более отрицательных отзывов;</li>\r\n	<li>Исполнитель указал свои контактные данные в Предложении или комментариях к Заданию до выбора Исполнителя.</li>\r\n	<li>Исполнителю указал в своем Профиле контактные данные или ссылки на сторонние сайты, содержащие контактную информацию или предоставляющие возможность иным образом связаться с Исполнителем, включая сайты для демонстрации своих работ или портфолио;</li>\r\n	<li>В комментариях к Заданиям Исполнитель использовал ненормативную лексику, оскорбления, обсуждал вопросы, не связанные с сутью Задания;</li>\r\n	<li>Администрацией получены жалобы на Исполнителя от Заказчиков (грубость, хамство, неадекватное общение, нарушение договоренностей и т. д.);</li>\r\n	<li>Исполнитель отозвался на Задание, но отказался его выполнять, не предупредив Заказчика и не удалив свое Предложение, что привело к возникновению конфликтной ситуации или невыполнению Задания;</li>\r\n	<li>Исполнитель отозвался на Задание, но отправил выполнять Задание вместо себя другого человека, не прошедшего процедуру Верификации без согласия Заказчика;</li>\r\n	<li>Исполнитель нарушил требования к фотографии, размещаемой в Профиле. На фотографии должен быть изображен непосредственно сам Исполнитель (лицо крупным планом), без посторонних людей, предметов или животных.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>5. Правила размещения и исполнения Заданий</strong></p>\r\n\r\n<p><strong>5.1.</strong> Все Пользователи могут размещать на сайте Задания.</p>\r\n\r\n<p><strong>5.2.</strong> Запрещается размещение Заданий, противоречащих&nbsp; законодательству Республики Беларусь, а также Задания, целью которых является:</p>\r\n\r\n<ul>\r\n	<li>привлечение пользователей на сторонние ресурсы, сайты, либо регистрация пользователей на таких ресурсах, сайтах;</li>\r\n	<li>реклама своих услуг и товаров или услуг и товаров, принадлежащих третьим лицам;</li>\r\n	<li>накрутка или изменение статистики сайтов, числа подписчиков в социальных сетях и т.д.;</li>\r\n	<li>заказ автоматической или ручной рассылки приглашений и сообщений пользователям социальных сетей, email-рассылок;</li>\r\n</ul>\r\n\r\n<p><strong>5.3.</strong> Администрация оставляет за собой право удалить любое Задание без объяснения причин.</p>\r\n\r\n<p><strong>5.4.</strong> Выдвигать свои предложение на выполнение размещенного задания имеют право лишь те Исполнители, на балансе которых имеется сумма, составляющая&nbsp; не менее 12 % от Цены указанного Задания.</p>\r\n\r\n<p><strong>5.5.</strong> Заказчик осуществляет Выбор Исполнителя в сроки, определенные в момент создания Задания, после Выбора Исполнителя Задание считается Согласованным.</p>\r\n\r\n<p>В момент Выбора Исполнителя Сервис обеспечивает Исполнителя контактными данными заказчика, а именно: телефонным номером, указанным последним при Регистрации.</p>\r\n\r\n<p><strong>5.6.</strong> С момента Выбора Исполнителя на его Балансе блокируется сумма равная<br>\r\n10 % от Цены Задания. Окончательное списание указанной суммы с баланса Исполнителя происходит после наступления обстоятельств указанных в п.9.4, 9.5 настоящего Соглашения.</p>\r\n\r\n<p>В случае, если Исполнитель одновременно выдвинул предложения на исполнение нескольких заданий и в дальнейшем был выбран по одному из них, для продолжения участий в остальных актуальных заданиях на его балансе должно оставаться не менее 10% от их цены в отдельности. В противном случае его предложения в указанных заданиях будут удалены.</p>\r\n\r\n<p><strong>5.7.</strong> С момента Выбора Исполнителя Заказчик и Исполнитель считаются заключившими между собой соглашение об оказании услуг/выполнении работ. При необходимости и по согласованию между собой Заказчик и Исполнитель могут составить и подписать Договор на оказание услуг/выполнение работ и иные необходимые документы. Все взаиморасчеты между Заказчиком и Исполнителем производятся Сторонами самостоятельно (без участия Компании). Компания не вмешивается в правоотношения, возникающие между Заказчиком и Исполнителем в ходе исполнения Задания. Компания не гарантирует Заказчику и Исполнителю, что фактические&nbsp; результаты по заключенному сторонами соглашению об оказании услуг/выполнении работ будут соответствовать их ожиданиям.</p>\r\n\r\n<p><strong>5.8.</strong> Изменение условий Задания Заказчиком возможно только после публикации не допускается.</p>\r\n\r\n<p><strong>5.9.</strong> Исполнитель в течении 48 часов с момента получения задания от Заказчика обязан подтвердить либо опровергнуть факт выполнения задания.</p>\r\n\r\n<p><strong>5.10.</strong> В случае не подтверждения выполнения задания Исполнителем в указанный срок, выполнение задания презюмирует (задание считается выполненным).</p>\r\n\r\n<p><strong>5.11.</strong>Заказчик обязуется после выполнения Задания Исполнителем оставить отзыв на странице его профиля о выполненной работе/оказанной услуги.</p>\r\n\r\n<p><strong>5.12.</strong> Все споры и претензии, возникающие между Исполнителем и Заказчиком по вопросам связанным с Заданием, разрешаются ими самостоятельно без участия Компании, за исключением случаев предусмотренных настоящим Соглашением.</p>\r\n\r\n<p><strong>5.13.</strong> Компания не несет ответственности за неисполнение и или ненадлежащее исполнение Заказчиком и Исполнителем своих обязанностей, касающихся выполняемого Задания.</p>\r\n\r\n<p><strong>5.14.</strong> Пользователи, размещающие Задания на Сайте, выражают свое согласие на передачу информации, содержащейся в Задании всем посетителям сайта, а также своих контактных данных (телефон, адрес электронной почты и&nbsp;иные способы связи) выбранному Исполнителю.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>6. Права и обязанности Пользователей Сайта</strong></p>\r\n\r\n<p><strong>6.1.</strong> Пользователи Сайта имеют право использовать следующие Сервисы:</p>\r\n\r\n<ul>\r\n	<li>создавать Задания и выбирать Исполнителя Задания;</li>\r\n	<li>направлять жалобы Администрации по фактам нарушения Пользователями Соглашения;</li>\r\n	<li>использовать иные сервисы, доступ к которым предоставлен ему Компанией в лице Администрации;</li>\r\n</ul>\r\n\r\n<p><strong>6.2.</strong> Исполнитель дополнительно имеет право:</p>\r\n\r\n<ul>\r\n	<li>исполнять Задания всех видов;</li>\r\n	<li>использовать иные Сервисы, доступ к которым предоставлен ему Компанией в лице Администрации.</li>\r\n</ul>\r\n\r\n<p><strong>6.3.</strong> Исполнитель дополнительно обязан:</p>\r\n\r\n<ul>\r\n	<li>в течение 48 часов с момента получения задания от Заказчика обязан подтвердить либо опровергнуть факт выполнения задания.</li>\r\n</ul>\r\n\r\n<p><strong>6.4</strong>. Пользователю при использовании Сайта запрещается:</p>\r\n\r\n<ul>\r\n	<li>регистрироваться в&nbsp;качестве Пользователя от имени или вместо другого лица («фальшивый аккаунт»);</li>\r\n	<li>вводить Пользователей в заблуждение относительно своей личности, используя Логин и Пароль другого зарегистрированного Пользователя;</li>\r\n	<li>искажать сведения о себе, своем возрасте или своих отношениях с другими лицами или организациями;</li>\r\n	<li>загружать, хранить, публиковать, распространять и предоставлять доступ или иным образом использовать любую информацию, которая: содержит угрозы, дискредитирует, оскорбляет, порочит честь и достоинство или деловую репутацию или нарушает неприкосновенность частной жизни других Пользователей или третьих лиц; является вульгарной или непристойной, содержит порнографические изображения и тексты или сцены сексуального характера; содержит сцены бесчеловечного обращения с животными; содержит описание средств и способов суицида, любое подстрекательство к его совершению; пропагандирует и/или способствует разжиганию расовой, религиозной, этнической ненависти или вражды, пропагандирует фашизм или идеологию расового превосходства; содержит экстремистские материалы; пропагандирует преступную деятельность или содержит советы, инструкции или руководства по совершению преступных действий, содержит информацию ограниченного доступа, включая, но не ограничиваясь, государственной и коммерческой тайной, информацией о частной жизни третьих лиц; содержит рекламу или описывает привлекательность употребления наркотических веществ, информацию о распространении наркотиков, рецепты их изготовления и советы по употреблению; носит мошеннический характер; а также нарушает иные права и интересы граждан и юридических лиц или требования законодательства Республики Беларусь;</li>\r\n	<li>незаконно загружать, хранить, публиковать, распространять и предоставлять доступ или иным образом использовать интеллектуальную собственность Пользователей и третьих лиц;</li>\r\n	<li>использовать программное обеспечение и осуществлять действия, направленные на нарушение нормального функционирования Сайта и его Сервисов или персональных страниц Пользователей;</li>\r\n	<li>любым способом, в том числе, но не ограничиваясь, путем обмана, злоупотребления доверием, взлома, пытаться получить доступ к Логину и Паролю другого Пользователя;</li>\r\n	<li>осуществлять незаконные сбор и обработку персональных данных других лиц;</li>\r\n	<li>размещать любую другую информацию, которая, по личному мнению Администрации, является нежелательной, не соответствует целям создания Сайта, ущемляет интересы Пользователей или по&nbsp;другим причинам является нежелательной для размещения на Сайте.</li>\r\n</ul>\r\n\r\n<p><strong>6.5.</strong> Пользователь обязан:</p>\r\n\r\n<ul>\r\n	<li>ознакомиться с условиями настоящего Соглашения,</li>\r\n	<li>исполнять требования настоящего Договора, Пользовательского соглашения, законодательства Республики Беларусь.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>7. Права и обязанности Компании</strong></p>\r\n\r\n<p><strong>7.1. Компания обязана:</strong></p>\r\n\r\n<ol>\r\n	<li>Оказывать Пользователям Услуги на условиях, предусмотренных Соглашением.</li>\r\n</ol>\r\n\r\n<p><strong>7.2. Компания вправе:</strong></p>\r\n\r\n<ol>\r\n	<li>При нарушении Пользователем условий Соглашения приостановить оказание&nbsp; Услуг до устранения нарушений;</li>\r\n	<li>В одностороннем порядке изменять условия Публичной оферты или отозвать Публичную оферту в любой момент по своему усмотрению;</li>\r\n	<li>В одностороннем порядке отказаться от исполнения Соглашения в случаях, предусмотренных Соглашением;</li>\r\n	<li>Приостановить оказание Услуг при наличии технических неполадок в работе Сайта, сбоев в работе программного обеспечения или оборудования; при необходимости замены программного обеспечения или оборудования, проведения других работ; в иных случаях отсутствия технической или иной возможности для оказания Услуг.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>8. Сервис сообщений (комментариев)</strong></p>\r\n\r\n<p><strong>8.1.</strong> Исполнителям, выдвигающим предложения по конкретному Заданию, а также Заказчику, опубликовавшему Задание, предоставляется доступ к Сервису сообщений (комментариев). Под Сервисом сообщений подразумевается возможность размещения Пользователем на страницах Сайта сообщений, которые становятся доступными для обозрения всеми Пользователями, посещающим соответствующую страницу Сайта. Запрещается размещение публичных сообщений:</p>\r\n\r\n<ul>\r\n	<li>содержащих любую контактную информацию;</li>\r\n	<li>нарушающих законодательство Республики Беларусь, нормы международного права;</li>\r\n	<li>содержащих рекламную информацию, спам.</li>\r\n	<li>являющихся незаконными, вредоносными, угрожающими, оскорбляющими нравственность, клеветническими, нарушающими авторские права, пропагандирующими ненависть и/или дискриминацию людей по&nbsp;расовому, этническому, половому, социальному признакам;</li>\r\n	<li>содержащие ссылки на&nbsp;интернет-сайты, Принадлежащие Пользователям или третьим лицам;</li>\r\n	<li>нарушающих права третьих лиц</li>\r\n	<li>комментирующих Сумму Задания</li>\r\n	<li>не имеющих отношения к комментируемому Заданию.</li>\r\n</ul>\r\n\r\n<p><strong>8.2.</strong> Администрация имеет право в любой момент удалить публичное сообщение, как соответствующее Соглашению, так и нарушающее Соглашение. Пользователь, нарушающий Соглашение, может быть лишен, на постоянной или временной основе, права использования Сервисом сообщений.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>9. Возмездные услуги, оказываемые Компанией</strong></p>\r\n\r\n<p><strong>9.1.</strong> Компания может оказывать Пользователю, имеющему статус «Исполнитель» следующие услуги:</p>\r\n\r\n<ul>\r\n	<li>предоставление Исполнителю информации о размещенных на сайте Заказчиками заданиях;</li>\r\n	<li>предоставление Исполнителю возможности выдвигать свои предложение на выполнение размещенных на сайте заданиях;</li>\r\n	<li>предоставление возможности быть выбранным в качестве Исполнителя для указанных заданий.</li>\r\n	<li>Указанные услуги являются возмездными (за исключением случая указанного в&nbsp;п. 10.2. настоящего Соглашения) и подлежат оплате при условии, если Исполнитель был выбран Заказчиком для выполнения конкретного задания.</li>\r\n</ul>\r\n\r\n<p><strong>9.2.</strong> Стоимость Услуг определяется как сумма в белорусских рублях, равная 12 % от стоимости задания, выбранного Исполнителем для участия.</p>\r\n\r\n<p><strong>9.3.</strong> Оплата Услуг осуществляется на условиях 100 % предоплаты, посредством перечисления денежных средств на расчетный счет Компании, указанный в п. 1.1. Соглашения, одним из способов, предложенных сервисами Сайта.</p>\r\n\r\n<p>Перечисленная сумма денежных средств отображается на балансе Исполнителя, указанном в его профиле.</p>\r\n\r\n<p><strong>9.4.</strong> Возмездные услуги считаются оказанными Компанией Исполнителю в полном объеме и подлежат 100 % оплате, в случае, если Исполнитель был выбран Заказчиком для выполнения конкретного задания.</p>\r\n\r\n<p><strong>9.5.</strong> Исполнитель обязан в течение 48 часов с момента получения задания от Заказчика подтвердит или опровергнуть факт выполнения задания.</p>\r\n\r\n<p><strong>9.6.</strong> В случае если Исполнитель не имел возможности выполнить полученное задание по вине Заказчика, он вправе обратится к Администрации сайта в указанный в п.9.5. срок с мотивированным обращением о признании задания невыполненным по вине Заказчика</p>\r\n\r\n<p>При подтверждении указанного факта, Исполнителю предоставляется возможность использовать сумму предоплаты, внесенной для участия в невыполненном по вине Заказчика задании, для оплаты Возмездных услуг предоставляемых Компанией в последующем.</p>\r\n\r\n<p>Во всех остальных случаях сумма вознаграждения за оказанные по настоящему Соглашению услуги возврату не подлежит.</p>\r\n\r\n<p><strong>9.7.</strong> Администрация сайта для принятия решения по поступившему обращению вправе связаться с Заказчиком с целью выяснения причин невыполнения задания.</p>\r\n\r\n<p><strong>9.8.</strong> Администрация сайта по поступившему обращению вправе принять решение:</p>\r\n\r\n<p>о признании задания невыполненным по вине Заказчика и использовании Исполнителем уплаченной суммы для оплаты Возмездных услуг, предоставляемых Компанией, в последующем;</p>\r\n\r\n<p>об отказе в признании задания невыполненным по вине Заказчика и отказе в использовании уплаченной суммы для оплаты Возмездных услуг, предоставляемых Компанией, в последующем.</p>\r\n\r\n<p><strong>9.9.</strong> Исполнитель имеет право пользоваться возмездными услугами, предоставляемыми Компанией, при условии Акцепта Соглашения об использовании Сайта, размещенного по адресу <a href="https://helpyou.by/">https://helpyou.by</a> в качестве Оферты.</p>\r\n\r\n<p><strong>9.10.</strong> Оказание Компанией Возмездных услуг не является:</p>\r\n\r\n<ul>\r\n	<li>деятельностью в сфере игорного бизнеса;</li>\r\n	<li>электронной интерактивной игрой;</li>\r\n	<li>лотереей;</li>\r\n	<li>рекламной игрой;</li>\r\n	<li>осуществлением деятельности, связанной с трудоустройством граждан за границей;</li>\r\n	<li>осуществлением деятельности, связанной со сбором и распространением (в том числе в глобальной компьютерной сети Интернет) информации о физических лицах в целях их знакомства (деятельностью брачного агентства);</li>\r\n	<li>оказанием психологической помощи.</li>\r\n</ul>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<p><strong>10. Баланс Исполнителя</strong></p>\r\n\r\n<p><strong>10.1.</strong> При регистрации в качестве Исполнителя Пользователь получает личный счет на Сайте (Баланс), на котором отображается сумма внесенных им денежных средств на условиях предоплаты, для оплаты возмездных услуг, предоставляемых Компанией.</p>\r\n\r\n<p><strong>10.2.</strong> При регистрации в качестве Исполнителя каждый Пользователь получает на свой баланс 50&nbsp;000 (пятьдесят тысяч) бонусных единиц, которые он может использовать для выполнения требований, предусмотренных п. 5.4. настоящего Соглашения. Данное мероприятие осуществляется с целью ознакомления Исполнителя с услугами сервиса и не является предоставлением безвозмездной (спонсорской) помощи либо рекламной акцией.</p>\r\n\r\n<p>При последующей оплате Исполнителем услуг, предоставляемых Компанией и пополнение счета на Сайте, остаток бонусных единиц (при его наличия)&nbsp; списывается со счета автоматически.</p>\r\n\r\n<p><strong>10.2.</strong> Оплата услуг и пополнение счета на Сайте производится способами, доступными на сайте. Исполнитель может отслеживать состояние личного счета на Сайте в любое время.</p>\r\n\r\n<p>Способы доступные для оплата услуг пополнения Счета:</p>\r\n\r\n<ul>\r\n	<li>Банковские карты VISA и&nbsp;MasterCard;</li>\r\n	<li>Электронные системы платежей Ipay, Webpay</li>\r\n	<li>Наличными в терминалах оплаты;</li>\r\n	<li>ЕРИП</li>\r\n</ul>\r\n\r\n<p><strong>10.3.</strong> Расходы по&nbsp;оплате комиссии банков и платежных систем, связанные с проведением Пользователями оплаты Услуг Компании указанными выше способами, доступными для пополнения счета, несет Компания. Однако, возможны ситуации, когда некоторые банки, терминалы оплаты и платежные системы могут вводить дополнительные комиссии за совершение операций по проведению платежей. Пользователю необходимо внимательно знакомиться с условиями проведения платежей при совершении операций по оплате Услуг сервиса.</p>\r\n\r\n<p><strong>10.4.</strong> Администрация не несет ответственности за изменение состояния личного счета Пользователя за счет действий третьих лиц. Перевод средств с личного счета одного Пользователя на счет другого Пользователя невозможен. Средства, зачисленные на Баланс Пользователем самостоятельно, могут быть возвращены последнему, тем же способом платежа, при помощи которого осуществлялся перевод в адрес Сервиса. Вывод средств, находящихся на Балансе, иными способами не возможен. Для возврата денежных средств Пользователь должен обратится с письменным обращением к Администрации</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>11. Ответственность Сторон</strong></p>\r\n\r\n<p><strong>11.1.</strong> За&nbsp;нарушение условий Соглашения Стороны несут ответственность, установленную Договором и действующим законодательством Республики Беларусь.</p>\r\n\r\n<p><strong>11.2.</strong> Компания не несет ответственности:</p>\r\n\r\n<ul>\r\n	<li>За убытки или иной вред, возникший у Пользователя в связи с действиями третьих лиц;</li>\r\n	<li>за неисполнение и или ненадлежащее исполнение Заказчиком и Исполнителем своих обязанностей, касающихся выполняемого Задания;</li>\r\n	<li>какие-либо действия/бездействие, Пользователя;</li>\r\n	<li>какие-либо косвенные убытки и/или упущенную выгоду Пользователя и/или третьих сторон вне зависимости от того, могла ли Компания предвидеть возможность таких убытков или нет;</li>\r\n</ul>\r\n\r\n<p><strong>11.3.</strong> Пользователь несет ответственность в полном объеме за:</p>\r\n\r\n<ul>\r\n	<li>соблюдение всех требований законодательства, в том числе законодательства о рекламе, об интеллектуальной собственности, о конкуренции, но не ограничиваясь перечисленным;</li>\r\n	<li>достоверность сведений, указанных им&nbsp;при регистрации в&nbsp;качестве Пользователя на&nbsp;Сайте.</li>\r\n</ul>\r\n\r\n<p><strong>11.4.</strong> Все споры и претензии, возникающие между Исполнителем и Заказчиком по вопросам связанным с Заданием, разрешаются ими самостоятельно без участия Компании, за исключением случаев предусмотренных настоящим Соглашением.</p>\r\n\r\n<p><strong>11.5.</strong> Пользователь обязуется своими силами и за свой счет разрешать споры и урегулировать претензии третьих лиц в отношении выполнения Заданий, либо возместить убытки (включая судебные расходы), причиненные Компании в связи с претензиями и исками, основанием предъявления которых явились действия или бездействия Пользователя при использовании Услуг Компании. В случае, если содержание, форма и/или размещение информации Пользователя на Сайте явилось основанием для предъявления к Компании предписаний по уплате штрафных санкций со стороны государственных органов, Пользователь обязуется незамедлительно по требованию Компании предоставить всю запрашиваемую информацию, касающуюся размещения и содержания информации на Сайте, содействовать Компании в урегулировании предписаний, а также возместить все убытки (включая расходы по уплате штрафов), причиненные Компании вследствие предъявления ей, предписаний в результате размещения информации Пользователя на сайте.</p>\r\n\r\n<p><strong>11.6.</strong> Пользователь-Исполнитель настоящим уведомлен о требованиях законодательства, предусматривающих обязательную государственную регистрацию в качестве субъекта предпринимательской деятельности, а также о предусмотренной законодательством ответственности за их невыполнение. Компания не несет ответственности за неисполнение Пользователем&nbsp; указанного законодательства.</p>\r\n\r\n<p><strong>11.7.</strong> Компания не несет ответственности за неисполнение Пользователем налогового законодательства, касающегося уплаты подоходного налога, иных налогов, сборов и платежей, взимаемых с&nbsp; доходов полученных как в ходе осуществления предпринимательской, так и иной оплачиваемой деятельности.&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>12. Форс-мажор</strong></p>\r\n\r\n<p><strong>12.1.</strong> Стороны освобождаются от ответственности за неисполнение или ненадлежащее исполнение обязательств по Договору, если причиной неисполнения (ненадлежащего исполнения) являются обстоятельства непреодолимой силы, к которым среди прочих, относятся стихийные бедствия, пожары, техногенные аварии и катастрофы, аварии на инженерных сооружениях и коммуникациях, массовые беспорядки, военные действия, террористические акты, бунты, гражданские волнения, забастовки, акты органов власти, препятствующие исполнению обязательств по Договору, то есть чрезвычайные и непреодолимые при данных условиях обстоятельства, наступившие после заключения Договора.</p>\r\n\r\n<p><strong>12.2.</strong> При наступлении обстоятельств непреодолимой силы срок исполнения обязательств по Договору отодвигается соразмерно времени, в течение которого продолжают действовать такие обстоятельства, без возмещения каких-либо убытков.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>13. Срок действия Договора. Изменение Публичной оферты. Изменение и расторжение Договора</strong></p>\r\n\r\n<p><strong>13.1</strong>.&nbsp;Датой заключения Договора является день Регистрации пользователя на Сайте. Заключенный Договор действует до</p>\r\n\r\n<ul>\r\n	<li>до момента исполнения Исполнителем обязательств по оказанию Услуг;</li>\r\n	<li>до момента расторжения Договора.</li>\r\n</ul>\r\n\r\n<p><strong>13.2.</strong> Договор может быть расторгнут досрочно по соглашению Сторон в любое время.</p>\r\n\r\n<p><strong>13.3.</strong> Компания вправе отказаться от исполнения условий настоящего договора в любое время, предварительно уведомив об этом Пользователя посредством электронного сообщения.</p>\r\n\r\n<p><strong>13.4.</strong> Изменение условий Договора осуществляется Исполнителем в одностороннем порядке посредством изменения условий Публичной оферты.</p>\r\n\r\n<p><strong>13.5.</strong> В случае внесения Исполнителем изменений в условия Публичной оферты такие изменения вступают в силу с момента публикации измененной редакции Публичной оферты на Сайте.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>14. Реквизиты Сторон</strong></p>\r\n\r\n<p><strong>Компания:</strong></p>\r\n\r\n<p><strong>Наименование</strong>: &nbsp;Общество с&nbsp;ограниченной ответственностью «Айкэнду»<br>\r\n<strong>Адрес</strong>: 220024, г. Минск, ул. Бабушкина, 90, каб.&nbsp;108&nbsp;&nbsp;<br>\r\n<strong>Банковские реквизиты</strong>: р/с301203037044011 в ОАО «Приорбанк».<br>\r\nУНП 192432025 &nbsp;ОКПО 382225945000</p>\r\n\r\n<p><br>\r\n____________/Директор И.В. Кусочкин</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_phone_verefication`
--

CREATE TABLE IF NOT EXISTS `tmp_phone_verefication` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `code` varchar(6) DEFAULT NULL,
  `verified` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tmp_phone_verefication`
--

INSERT INTO `tmp_phone_verefication` (`id`, `phone`, `code`, `verified`) VALUES
(32, '375296675565', '336276', 1),
(33, '375297496120', '513262', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'no-image.png',
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `sex` varchar(11) NOT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `about` text,
  `phone_verified` int(2) NOT NULL DEFAULT '0',
  `city` varchar(255) DEFAULT NULL,
  `banned` int(255) DEFAULT NULL,
  `half_banned` int(2) NOT NULL DEFAULT '0',
  `birth_date` varchar(255) DEFAULT NULL,
  `registred` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance` int(255) DEFAULT '0',
  `vk` varchar(255) DEFAULT NULL,
  `ok` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=544 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `surname`, `pass`, `email`, `image`, `role`, `sex`, `phonenumber`, `about`, `phone_verified`, `city`, `banned`, `half_banned`, `birth_date`, `registred`, `balance`, `vk`, `ok`, `fb`) VALUES
(1, 'admin', '', 'NTIzMw==3Y7r0A6c', 'admin@mail.ru', 'no-image.png', 'admin', '0', '0', NULL, 0, '', NULL, 0, NULL, '0000-00-00 00:00:00', 391, NULL, NULL, NULL),
(11, 'Исполнитель', 'HelpYou.by', 'NTIzMw==3Y7r0A6c', 'per@mail.ru', '20150501000438tda4zglry2zn2tbyc821vj4hlc.png', 'performer', 'male', '375298656285', '!Пример заполнения!\r\nПриветствую вас на странице моего профиля. Я Исполнитель сервиса HelpYou.by. С удовольствием помогу решить ваши хозяйственно-бытовые проблемы.Выполню Ваши поручения! Имею высшее образование. Являюсь техническим специалистом широкого профиля. Основное место работы HelpYou.byРаботаю с компьютерами с 2005 года. Стаж системного администратора более 5 лет. Права категории B, стаж (безаварийный) с 2006 года. В наличии автомобиль Volvo S60. Есть инструмент для решения практических любых задач. Мастерски обращаюсь с паяльником! Готов рассмотреть предложения о любых формах сотрудничества. Исполнительный, пунктуальный, добросовестный и трудолюбивый!', 1, 'Hrodna', NULL, 0, '579643200', '0000-00-00 00:00:00', 1, NULL, NULL, NULL),
(17, 'customer', 'cusomeravich', 'NTIzMw==3Y7r0A6c', 'cust@mail.ru', '201504301952281d1azc57cs90zb31m8hw1h6rh.png', 'customer', 'male', '375298656285', 'сдгфсдфсдгфсд', 1, 'Brest', NULL, 0, '877294800', '0000-00-00 00:00:00', 10, NULL, NULL, '989404377739729'),
(159, 'Иван', 'Кусочкин', 'NTQ1OTg3NTY1ODcy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '619405200', '2015-03-26 10:51:57', 0, NULL, '545987565872', NULL),
(165, 'Женя', 'Гапеенко', 'ODMzMjc0Mw==3Y7r0A6c', 'yawgen.gapeenko@gmail.com', 'аватар.jpg', 'performer', 'male', '375298474735', 'Выполню быстро и качественно курсовые, дипломы по юриспруденции и экономическим дисциплинам! Очень низкие цены!!!', 1, 'Минск', NULL, 0, '610574400', '2015-03-28 11:23:52', 50000, '8332743', NULL, NULL),
(167, 'Алина', 'Кусочкина', 'MjAwMjIwMDE=3Y7r0A6c', 'cleakesa@mail.ru', 'no-image.png', 'customer', 'female', '375292093640', NULL, 1, 'Минск', NULL, 0, '721000800', '2015-03-28 12:13:30', 0, NULL, NULL, NULL),
(168, 'Иван', 'Кусочкин', 'MTIzNA==3Y7r0A6c', 'yoha89@mail.ru', '20150427225751trrmuhtjdxbu2qehrmscot6y2l.png', 'performer', 'male', '375297496120', 'Высшее юридическое образование. Более 3 лет юридической работы. Большой опыт договорной, претензионно-исковой работы.\r\nПомогу составить и оформить любой договор, исковое заявление, другие документы. Помогу в написании контрольных, курсовых, дипломных работ по юридическим дисциплинам.', 1, 'Минск', NULL, 0, '619473600', '2015-03-28 12:24:55', 215010, '5003258', NULL, NULL),
(169, 'Вова ', 'Лучков', 'MTIzNA==3Y7r0A6c', 'userrus@list.ru', '20150430175324mju0g9j7v06fkxmi8yxbc7acm.png', 'performer', 'male', '375296675565', 'Молодой приятный парень выполнит Ваши поручения в разных сферах. Ответственный и пунктуальный. Высшее образование по специальности международные отношения.  Подвезу, перевезу вещи, отвезу документы и так далее.  Помогу с компьютером и ноутбуком. ', 1, 'Gibraltar', NULL, 0, '656370000', '2015-03-28 13:43:59', 1969010, '4440887', NULL, '939143052776188'),
(170, 'Shopizator', 'Com', 'MjMwMzQxNDI43Y7r0A6c', NULL, 'img.png', 'customer', 'male', NULL, NULL, 0, 'Новогрудок', NULL, 0, '326253600', '2015-03-28 14:10:46', 0, '230341428', NULL, NULL),
(176, 'Лёшик', 'Дегтерёв', 'Mzg2NjI2MA==3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', '375292421966', NULL, 1, 'Могилёв', NULL, 0, '617763600', '2015-03-29 16:38:20', 0, '3866260', NULL, NULL),
(177, 'Евгений', 'Матвеев', 'MTc0NzM0MjI03Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', '375333446446', NULL, 1, 'Минск', NULL, 0, '610506000', '2015-03-29 19:07:14', 0, '174734224', NULL, NULL),
(179, 'Юлия', 'Галыгина', 'ODY2OTU5OQ==3Y7r0A6c', NULL, 'E4YijuUCbkA.jpg', 'customer', 'female', '375296132189', NULL, 1, 'Минск', NULL, 0, '628135200', '2015-03-30 19:09:37', 0, '8669599', NULL, NULL),
(180, 'Евгений', 'Зубович', 'MTMwODQwMg==3Y7r0A6c', NULL, 'Вепрь.jpg', 'customer', 'male', '375297904276', NULL, 1, 'Минск', NULL, 0, '635479200', '2015-03-31 06:05:09', 0, '1308402', NULL, NULL),
(182, 'Эдик', 'Пискорский', 'aGFyZGNvcmVmdWNr3Y7r0A6c', 'piskorski451@gmail.com', 'длярекламы.jpg', 'performer', 'male', '375295253519', 'Высшее юридическое образование. Напишу претензию, исковое заявление за Вас. \r\nПроконсультирую по вопросам возврата денежных средств с интернет-проектов (chargeback). \r\n', 1, 'Брест', NULL, 0, '600987600', '2015-03-31 14:56:09', 50000, '6147165', NULL, NULL),
(183, 'Nikolai', 'Nikak', 'bGFkczgy3Y7r0A6c', 'kaban4ikkaban4ik23@mail.ru', 'jcXzQAYeMPU.jpg', 'performer', 'male', '375259833606', '23 года, без вредных привычек, строительное образование плотник-бетонщик, опыт работы на монолите 5 лет. Водительское В/С. Трудолюбивый, исполнительный, пунктуальный.', 1, 'Минск', NULL, 0, '701474400', '2015-04-01 11:56:46', 50000, '296521004', NULL, NULL),
(184, 'Максим', 'Кузьмич', 'NTc1ODg4Nzc4NjYzNzU=3Y7r0A6c', 'kyzmich_max@mail.ru', 'spJFqz4NMlk (1).jpg', 'performer', 'male', '375297866375', 'помогу с погрузкой, выгрузкой, выполню любые поручения', 1, 'Минск', NULL, 0, '708210000', '2015-04-01 12:03:20', 50000, '280092449', NULL, NULL),
(185, 'Татьяна', 'Алюкова', 'MTQxNDY2OTAy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', '375257933148', NULL, 0, 'Донецк', NULL, 0, '849841200', '2015-04-01 12:04:52', 0, '141466902', NULL, NULL),
(187, 'Даниил', 'Берлин', '0L/RgNC40L3RhtC10YHRgdCw3Y7r0A6c', 'danil_br@mail.ru', 'no-image.png', 'customer', 'male', '375292005066', NULL, 0, 'Миснк', NULL, 0, '368136000', '2015-04-01 12:06:36', 0, NULL, NULL, NULL),
(188, 'Александр', 'Долгий', 'SURJUlVTMDk43Y7r0A6c', 'a.dolgiy@inbox.ru', 'p1jdtux9n7fanu409v599trvmm4c9morchce.jpg', 'performer', 'male', '375298199216', 'Грузоперевозки', 1, 'Минск', NULL, 0, '722124000', '2015-04-01 12:07:56', 50000, '234750178', NULL, NULL),
(189, 'Сергей', 'Сидорович', 'ZXJvZGVmMTkyMDIx3Y7r0A6c', 'Kawalski89@mail.ru', 'no-image.png', 'customer', 'male', '375259477972', NULL, 0, 'Минск', NULL, 0, '694216800', '2015-04-01 12:17:32', 0, NULL, NULL, NULL),
(190, 'Ваня', 'Сосновский', 'Mjk4MTYzNjA13Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, '585018000', '2015-04-01 12:17:53', 0, '298163605', NULL, NULL),
(191, 'Андрей', '', 'dHJpYWRh3Y7r0A6c', '', 'no-image.png', 'customer', 'male', '375447360503', 'Высшее образование - инженер по телекоммуникациям, физически крепкий, пунктуальный.\r\nпереустановка Windows, установка софта, выполнение контрольных и курсовых работ, работы по электрике, погрузка, разгрузка, переезд.', 0, 'Минск', NULL, 0, '519336000', '2015-04-01 12:18:19', 0, '42867086', NULL, NULL),
(196, 'Елена', 'Крупенько', 'Mjc0ODQxMDA33Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, NULL, NULL, 0, '736394400', '2015-04-01 12:35:58', 0, '274841007', NULL, NULL),
(197, 'Максим', 'Вербицкий', 'MjA0NzYyODk33Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '743479200', '2015-04-01 17:23:30', 0, '204762897', NULL, NULL),
(199, 'Алексей', 'Каштелян', 'OTgwOTQ3NA==3Y7r0A6c', 'kashtelyan.aleksey@gmail.com', 'CwJ6yv6dws4.jpg', 'performer', 'male', '375293672072', 'Опыт работы (05.2014 – 01.2015):Пеший курьер, интернет-магазин, продажа смартфонов и аксессуаров, Минск\r\n\r\nФункции: Доставка заказов по городу Минск\r\n\r\nОбразование (01.2013-03.2018): Студент дневной формы Белорусский Государственный Технологический Университет, Лесохозяйственный факультет, Инженер лесного хозяйства\r\n\r\nНавыки:  Опытный пользователь компьютера (PhotoShop, Microsoft Office, Notepad++, STATISTICA, MathCad, SonyVegas, Camtasia Studio, TurboPascal, FreePascal)\r\n\r\nЗнание иностранного языка: Русский – родной, Белорусский – родной, Польский – высокий, Английский – минимально\r\n\r\nПрофессиональный опыт: Хорошее знание города Минск и ориентирование в городе. Нахождение минимальных по времени маршрутов.\r\n\r\nЛичные качества: Ответственность, Пунктуальность, Внимательность, Опрятный внешний вид\r\n\r\nДополнительная информация: Наличие водительского удостоверения категории В', 1, 'Минск', NULL, 0, '822261600', '2015-04-01 22:04:44', 50000, '143388829', '564886157986', '696094497183430'),
(200, 'Андрей', 'Ротько', 'dGVsMzAyMDQ0NA==3Y7r0A6c', 'DJ_Ra1ek@mail.ru', 'DSCN0718.jpg', 'performer', 'male', '375333020444', NULL, 1, 'минск (беларусь, минская обл.)', NULL, 0, '470869200', '2015-04-02 05:37:12', 50000, NULL, NULL, NULL),
(201, 'Дмитрий', 'Гайгеров', 'MTc1NTIwNjA23Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '538452000', '2015-04-02 05:42:43', 0, '175520606', NULL, NULL),
(202, 'Алла', 'Бутаева', 'YXNkenhjdg==3Y7r0A6c', 'alla.butaeva1331@mail.ru', 'no-image.png', 'customer', 'female', '375255047088', NULL, 0, 'минск', NULL, 0, '682117200', '2015-04-02 05:54:19', 0, NULL, NULL, NULL),
(203, 'Миша', 'Неведомский', 'NTEwNTI13Y7r0A6c', 'mix-1600@mail.ru', 'no-image.png', 'customer', 'male', '375292616243', NULL, 0, 'минск', NULL, 0, '652568400', '2015-04-02 06:28:08', 0, NULL, NULL, NULL),
(205, 'Максим', 'Гирко', 'MDgyNjUxOQ==3Y7r0A6c', 'helpminsk@mail.ru', 'ns1aH7phBNU.jpg', 'performer', 'male', '375297779700', 'Незаконченное высшее юридическое образование. Большой опыт в написании дипломов, курсовых работ, контрольных, отчётов по практике и т.д. Полное сопровождение работы.', 1, 'Минск', NULL, 0, '661986000', '2015-04-02 06:55:39', 50000, '10618129', NULL, NULL),
(206, 'Аббат', 'Жуковски', 'NzU3MzM3Nzk=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '518662800', '2015-04-02 07:37:44', 0, '75733779', NULL, NULL),
(207, 'Виталий', 'Лапатин', 'MjA1MDA1NDY43Y7r0A6c', '', 'no-image.png', 'customer', 'male', '375295027580', '', 1, 'Минск', NULL, 0, '604184400', '2015-04-02 08:44:22', 0, '205005468', NULL, NULL),
(208, 'Саша', 'Галагаев', 'NTU3MzgyMw==3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, NULL, '2015-04-02 11:08:36', 0, '5573823', NULL, NULL),
(209, 'Арнольд', 'Дьяков', 'MjY1NjIyOTQw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, NULL, '2015-04-02 12:53:08', 0, '265622940', NULL, NULL),
(210, 'Андрей', 'Минский', 'MjQyMjM2MjUx3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '790830000', '2015-04-02 14:48:26', 0, '242236251', NULL, NULL),
(211, 'Dima', 'Belka', 'MTI2MzU4OTgw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '1427969400', '2015-04-02 15:10:32', 0, '126358980', NULL, NULL),
(212, 'Элла', 'Сулковская', 'MjIzMjY2Nzkx3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '-318981600', '2015-04-02 15:26:46', 0, '223266791', NULL, NULL),
(213, 'Игорь', 'Бикбаев', 'ODExMDQzMXF3ZXI=3Y7r0A6c', 'bikbaev1975@mail.ru', 'Фото055 (2).jpg', 'customer', 'male', '375375', '', 0, 'Минск', NULL, 0, '163976400', '2015-04-02 15:38:35', 0, '66083972', '527566371273', '738735039579984'),
(214, 'Дмитрий', 'Скребец', 'MTM5OXNodHJpaA==3Y7r0A6c', 'dmitriishtrih3000@tut.by', 'x_44eeI0m5M.jpg', 'customer', 'male', '375339030496', 'Ремонтом, дизайном, перепланировкой квартир и офисов, коттеджей на территории Минска и Минской области.\r\nМы гарантируем:\r\n• Высокое качество работ;\r\n• Точное соблюдение сроков, закрепленное официальным договором;\r\n• Экологическую чистоту материалов, используемых для отделки помещений;\r\n• Доступные цены на ремонт.\r\nМы стараемся выполнять свою работу хорошо, и у нас это получается! Все наши клиенты довольны результатами.\r\nМы занимаемся ремонтом квартир в Минске уже более 5 лет. За это время мы приобрели бесценный опыт и знания, которые помогают нам в работе. Для нас очень важно, чтобы заказчик остался доволен работой. Мы всегда стремимся к этому. Подтверждением тому служат отзывы и благодарности наших клиентов.\r\nВиды наших услуг:\r\n• монтаж/демонтаж стен, перегородок;\r\n• сложные сантехнические работы;\r\n• электромонтажные работы;\r\n• идеальное качество выравнивания стен/потолков;\r\n• возведение конструкций из гипсокартона любой сложности (потолки, ниши, перегородки и т.д.);\r\n• работы по выравниванию пола;\r\n• облицовка плиткой/мозаикой;\r\n• укладка ламината/паркетной доски/паркета;\r\n• малярные работы;\r\n• вентиляционные работы.', 0, 'Минск', NULL, 0, '', '2015-04-02 16:02:01', 0, '11972748', '167138602255', '744138942371909'),
(215, 'Виталька', 'л', 'NDc4MjA3NDgwMTA43Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '662263200', '2015-04-02 17:06:12', 0, NULL, '478207480108', NULL),
(216, 'Алена', 'Алексейчик', 'MDUwMjE5ODZtYW1h3Y7r0A6c', 'alena-strekoza@bk.ru', 'IMG_5840.JPG', 'performer', 'female', '375445893811', '', 1, 'Минск', NULL, 0, '508021200', '2015-04-02 17:31:37', 50000, NULL, NULL, NULL),
(217, 'Vladimir', 'Demid', 'NjQ2MTI4OTE4ODY0NTk23Y7r0A6c', 'vladdemid@yahoo.fr', 'no-image.png', 'customer', 'male', '375293124913', '', 0, '', NULL, 0, '75600', '2015-04-02 17:47:51', 0, NULL, NULL, '646128918864596'),
(218, 'ИлЬгАм', 'Bikbaev', 'ODExMDQzMXF3ZXI=3Y7r0A6c', 'bikbaev1975@mail.ru', 'Фото055 (2).jpg', 'customer', 'male', '375375', '', 0, 'Минск', NULL, 0, '163976400', '2015-04-02 18:49:43', 0, NULL, '531507914928', NULL),
(220, 'Alina', 'Kusochkina', 'MTMyMTk2MTI=3Y7r0A6c', NULL, 'iYPvbL0QhS4.jpg', 'customer', 'female', '375292093640', NULL, 1, 'Минск', NULL, 0, '721018800', '2015-04-02 19:34:49', 0, '13219612', NULL, NULL),
(221, 'Денис', 'Бацейкин', 'MzcyNDY0ODQ=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Могилёв', NULL, 0, '1428022860', '2015-04-02 19:52:36', 0, '37246484', NULL, NULL),
(222, 'Марина', 'Синцова', 'MTQzNjIyOTAy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', '375333279070', NULL, 1, 'Минск', NULL, 0, '649389600', '2015-04-02 20:21:44', 0, '143622902', NULL, NULL),
(223, 'Павел', 'Потапов', 'cG90YXBvdnBhdmVs3Y7r0A6c', 'Mega.remontotdelka@mail.ru', 'nTdUZ_nkzm0.jpg', 'performer', 'male', '375336247351', 'Качественный РЕМОНТ и ОТДЕЛКА помещений. Бригада ответственных отделочников выполнит все виды внутренних и наружных работ.\r\nСКИДКИ на строительные материалы, а также их доставка\r\nПолный отчёт о проделанной работе перед заказчиком ( составление сметы ), заключение ДОГОВОРА и 100 % ГАРАНТИЯ на все выполненные работы.\r\nТак же предоставляем своих мастеров по натяжным потолкам и проектированию мебели...', 1, 'Минск', NULL, 0, '679525200', '2015-04-02 20:32:22', 50000, '31903765', NULL, NULL),
(224, 'Рома', 'Коберец', 'MjAwNTM4Nzkz3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', '375333914881', NULL, 1, 'Минск', NULL, 0, '1428008760', '2015-04-02 20:52:43', 0, '200538793', NULL, NULL),
(225, 'Виктор', 'Сидорович', 'MTc1NTY2Mzc13Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '644983200', '2015-04-02 20:56:51', 0, '175566375', NULL, NULL),
(226, 'Дима', 'Димыч', 'MjY4ODY2NDA33Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '7200', '2015-04-02 21:05:27', 0, '268866407', NULL, NULL),
(227, 'Сергей', 'Гуринович', 'Mjk5MDUyODc53Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', '375255359691', NULL, 1, 'Минск', NULL, 0, '564112800', '2015-04-03 05:41:41', 0, '299052879', NULL, NULL),
(228, 'Александр', 'Прокопик', 'MTU5OTQ4Mzc0MzY3MjA0OQ==3Y7r0A6c', 'zarina11@tut.by', 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, NULL, '2015-04-03 06:01:28', 0, NULL, NULL, '1599483743672049'),
(229, 'Анастасия', 'Кардава', 'NzU4OTU2NTQ=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Светлогорск', NULL, 0, '825562800', '2015-04-03 06:09:44', 0, '75895654', NULL, NULL),
(230, 'Артём', 'Тиминский', 'MTM1NDg5NDk13Y7r0A6c', '', '12345.jpg', 'performer', 'male', '375256498990', '', 1, 'Минск', NULL, 0, '720136800', '2015-04-03 06:40:40', 50000, '135489495', NULL, NULL),
(231, 'Димка', 'Лайк', 'MjI1OTc5Njcy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, '765770400', '2015-04-03 07:41:47', 0, '225979672', NULL, NULL),
(232, 'Людмила', 'Михайловская', 'MjIyMzU2MjEw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '749703600', '2015-04-03 08:05:14', 0, '222356210', NULL, NULL),
(233, 'карина', 'денисова', 'a2FyaW5hMDgxMDExMTE=3Y7r0A6c', 'denisovakarina89@mail.ru', 'no-image.png', 'customer', 'female', '375296737576', NULL, 0, 'минск', NULL, 0, '620337600', '2015-04-03 08:10:46', 0, NULL, NULL, NULL),
(238, 'Андрей', 'Конаков', 'MjgwMjUzODcy3Y7r0A6c', '', 'no-image.png', 'customer', 'male', '375257261449', '', 0, 'Минск', NULL, 0, '392760000', '2015-04-03 09:42:20', 0, '280253872', NULL, NULL),
(239, 'Артём', 'Давжёнок', 'NDc4NTUyMTM=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '767239200', '2015-04-03 09:51:28', 0, '47855213', NULL, NULL),
(240, 'Арина', 'Ковальчук', 'MTQ2MTg5Mzk33Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '596599200', '2015-04-03 09:52:15', 0, '146189397', NULL, NULL),
(241, 'Ольга ', 'Крупенко', 'MjQ3MTU0N9GH0YfRhw==3Y7r0A6c', 'vasilkova-olya@mail.ru', '7dedcc279c2a879ca63dad13bd739423.jpg', 'performer', 'female', '375336762894', NULL, 1, 'МИнск', NULL, 0, '562626000', '2015-04-03 09:57:52', 50000, NULL, NULL, NULL),
(243, 'Руслан', 'Гринкевич', 'NTYwNTkwMzc=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Слоним', NULL, 0, '635997600', '2015-04-03 09:58:31', 0, '56059037', NULL, NULL),
(244, 'Александра', 'Филипповская', 'Mjc0MTI1Nzgy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '750654000', '2015-04-03 10:11:10', 0, '274125782', NULL, NULL),
(245, 'Екатерина', 'Геннадьевна', 'MTIz3Y7r0A6c', 'nixonks@mail.ru', '9XpMOAntSF8.jpg', 'performer', 'female', '375295655382', 'cтрессоустойчивость, коммуникабельность‚ пунктуальность‚ ответственность.', 1, 'Минск', NULL, 0, '387316800', '2015-04-03 10:32:20', 50000, '106989640', NULL, NULL),
(246, 'виктор', 'данильчик', 'YWIxMTExMWM=3Y7r0A6c', 'vitek.danilchik@mail.ru', 'no-image.png', 'customer', 'male', '375292401702', NULL, 1, 'минск', NULL, 0, '685659600', '2015-04-03 10:33:01', 0, NULL, NULL, NULL),
(247, 'Владислав', 'Скачков', 'MDYzMjQ5NjIwNzE=3Y7r0A6c', 'VD94@yandex.ru', 'no-image.png', 'customer', 'male', '375', NULL, 0, 'Минск', NULL, 0, '770331600', '2015-04-03 10:37:33', 0, NULL, NULL, NULL),
(248, 'Антон', 'Борисик', 'MTAwMzk03Y7r0A6c', 'asakra1@yandex.ru', 'no-image.png', 'performer', 'male', '375447789266', 'Помогу решить проблемы связанные с компьютером. Доставляю мелкие пакеты или документы в свободное время', 1, 'Мінск', NULL, 0, '763336800', '2015-04-03 10:41:15', 50000, '19219846', NULL, NULL),
(250, 'Виктор', 'Белый', 'MTUxNDIxODk53Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'New York City', NULL, 0, '845776800', '2015-04-03 11:02:04', 0, '151421899', NULL, NULL),
(251, 'Никита', 'Цыбулько', 'NTIxNDg3OTc=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '832212000', '2015-04-03 11:04:17', 0, '52148797', NULL, NULL),
(252, 'Алексей', 'Шавель', '0L/QvdGC0YDQvtC/0L7RgdC+0YbQuNC+0LPQtdC90LXQtw==3Y7r0A6c', 'alexjuden@mail.ru', '2014713202753.jpg', 'performer', 'male', '375292677002', 'Есть законченное высшее образование, ответственный, исполнительный, общительный, пунктуальный, вежливый, есть личное легковое авто, водительское удостоверение категории а,в,с, стаж 4 года!!! Желательно работа связанная с передвижением на автотранспорте.', 1, 'Минск', NULL, 0, '724629600', '2015-04-03 11:16:29', 50000, '209380856', NULL, NULL),
(253, 'Марта', 'Петрашкевич', 'MTk5NFBldHJhc2hrZXZpY2g=3Y7r0A6c', 'marta.masko@yandex.ry', 'no-image.png', 'customer', 'female', '375291448345', NULL, 0, 'Минск', NULL, 0, '782690400', '2015-04-03 11:34:47', 0, NULL, NULL, NULL),
(255, 'Юлия', 'Горбачева', 'MTM0OTYyNjIx3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '707018400', '2015-04-03 11:44:59', 0, '134962621', NULL, NULL),
(256, 'Светлана', 'Соколова', 'MTI3MjgyNTUx3Y7r0A6c', NULL, 'XRoQJtv08So.jpg', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '762490800', '2015-04-03 11:48:18', 0, '127282551', NULL, NULL),
(257, 'Таня', 'Гурская', 'MjU1NTg2MTQz3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '902628000', '2015-04-03 11:49:48', 0, '255586143', NULL, NULL),
(258, 'Георгий', 'Соловей', 'MTIzNDU=3Y7r0A6c', 'georgenight777@gmail.com', 'e8K5tHwFHOk.jpg', 'performer', 'male', '375297579230', 'Установка и настройка Windows и другого ПО, проверка на вирусы, ремонт ПК.', 1, 'Минск', NULL, 0, '569883600', '2015-04-03 11:54:17', 50000, '7455756', NULL, NULL),
(259, 'Андрей', 'Чернышёв', 'MTM4NDU2MDA43Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', '375336613426', NULL, 1, 'Минск', NULL, 0, '862106400', '2015-04-03 11:56:42', 0, '138456008', NULL, NULL),
(260, 'Artyom', 'Ruka', 'MTAyMDM1Nzg5NjA1NDY4NDc=3Y7r0A6c', 'jun11san@mail.ru', 'no-image.png', 'customer', 'male', '375293647347', '', 0, '', NULL, 0, '631227600', '2015-04-03 11:58:29', 0, NULL, NULL, '10203578960546847'),
(261, 'Андрей', 'Аниськович', 'NDYzNzI1MzA=3Y7r0A6c', '', '4OR5syTOcfQ.jpg', 'customer', 'male', '375447231147', '', 1, 'Минск', NULL, 0, '849909600', '2015-04-03 12:14:49', 0, '46372530', NULL, NULL),
(265, 'Тиккирей', 'Фрост', 'MjY3ODg3NjUy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Київ', NULL, 0, '571802400', '2015-04-03 13:06:37', 0, '267887652', NULL, NULL),
(266, 'Оксана', 'Воротилина', 'MjcwNjEzMjg43Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', '375447549143', NULL, 0, 'Минск', NULL, 0, '1428080640', '2015-04-03 13:09:40', 0, '270613288', NULL, NULL),
(267, 'Влада', 'Потехина', 'MzMxNTAx3Y7r0A6c', '', '63tsmFCdrYQ.jpg', 'customer', 'female', '375259319972', '', 0, 'Минск', NULL, 0, '772923600', '2015-04-03 13:26:25', 0, '13181749', NULL, NULL),
(268, 'Лена', 'Старовойтова', 'MTA0MTM2MzEx3Y7r0A6c', '', 'no-image.png', 'customer', 'female', '375298897641', '', 0, 'Минск', NULL, 0, '745189200', '2015-04-03 13:43:12', 0, '104136311', NULL, NULL),
(269, 'Андрей', 'Койпиш', 'MTQ2NDUyMjk03Y7r0A6c', '', 'no-image.png', 'customer', 'male', '375291610530', '', 0, 'Осиповичи', NULL, 0, '75600', '2015-04-03 14:03:54', 0, '146452294', NULL, NULL),
(270, 'Никита', 'Лучинович', 'MTQ4MTg0Mjc53Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', '375447184278', NULL, 1, NULL, NULL, 0, '857962800', '2015-04-03 14:05:07', 0, '148184279', NULL, NULL),
(271, 'Алексей', 'Глинский', 'MTQzNDQyNDM43Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '467690400', '2015-04-03 14:18:55', 0, '143442438', NULL, NULL),
(272, 'Виктория', 'Самсонова', 'MTM3NzU2OTk33Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Светлогорск', NULL, 0, '811130400', '2015-04-03 14:38:35', 0, '137756997', NULL, NULL),
(273, 'Анастасия', 'Шатрова', 'MTQ2MjA4NTc53Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '752641200', '2015-04-03 14:52:43', 0, '146208579', NULL, NULL),
(274, 'Владислав', 'Максименко', 'NzQ0NDk1Mw==3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '612752400', '2015-04-03 14:54:30', 0, '7444953', NULL, NULL),
(275, 'Дима', 'Фадеев', 'Mjc1ODg1ODE33Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '639108000', '2015-04-03 15:43:32', 0, '275885817', NULL, NULL),
(276, 'Роман', 'Рюмкин', 'MTUyOTk0MA==3Y7r0A6c', NULL, 'IMG_1383.jpg', 'customer', 'male', '375445834350', NULL, 1, 'Могилёв', NULL, 0, '644378400', '2015-04-03 15:57:15', 0, '1529940', NULL, NULL),
(277, 'Алеся', 'Асташова', 'MTQwMjI2MjEw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '183175200', '2015-04-03 16:29:07', 0, '140226210', NULL, NULL),
(278, 'Александр', 'Кравчук', 'MzM0NzEwMTY=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Антополь', NULL, 0, '855111600', '2015-04-03 16:31:41', 0, '33471016', NULL, NULL),
(279, 'Кристина', 'Назарова', 'MTQ1NTc5OTM03Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Барановичи', NULL, 0, '865735200', '2015-04-03 17:02:36', 0, '145579934', NULL, NULL),
(280, 'Анастасия', 'Багуцкая', 'MTM0MzM1NTM53Y7r0A6c', NULL, 'CYMERA_20150327_002503.jpg', 'customer', 'female', '375257385539', NULL, 1, 'Матьковцы', NULL, 0, '714016800', '2015-04-03 17:29:16', 0, '134335539', NULL, NULL),
(281, 'Юля', 'Федорович', 'MjcxMTY2NTg=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '714362400', '2015-04-03 20:09:36', 0, '27116658', NULL, NULL),
(282, 'Олька', 'Жук', 'MTA1MTYwNjA43Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', '375336736134', NULL, 1, 'Жабинка', NULL, 0, '769658400', '2015-04-03 23:42:29', 0, '105160608', NULL, NULL),
(283, 'Наталья', 'Стежкина', 'MjIwNg==3Y7r0A6c', 'radyush2016@mail.ru', 'ZMyHv6AuaJE.jpg', 'customer', 'female', '375253-32-24', 'Могу работать с 17:00 каждый день. Могу убирать,сидеть с детьми,готовить кушать...Ищу работу. Сама студентка БГУФК.', 0, 'Минск', NULL, 0, '835477200', '2015-04-04 04:43:52', 0, '132223737', NULL, NULL),
(284, 'Павел', 'Шагойко', 'MTY4ODg0NzA=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '650772000', '2015-04-04 04:55:30', 0, '16888470', NULL, NULL),
(285, 'Паша', 'Матусевич', 'MTk4ODc5MjAw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Дзержинск', NULL, 0, '740282400', '2015-04-04 06:42:53', 0, '198879200', NULL, NULL),
(286, 'Валера', 'Пеньков', 'MTg3MzU2Nzk43Y7r0A6c', NULL, 'DSCF0151.JPG', 'customer', 'male', '375296501943', NULL, 1, 'Минск', NULL, 0, '1428152520', '2015-04-04 08:47:00', 0, '187356798', NULL, NULL),
(287, 'Полина', 'Пищ', 'bWIxOTA2MjAxMA==3Y7r0A6c', 'P7291385@mail.ru', 'no-image.png', 'customer', 'female', '375297291385', NULL, 0, 'Минск', NULL, 0, '706827600', '2015-04-04 08:52:48', 0, NULL, NULL, NULL),
(288, 'Кристофа', 'Ткач', 'MjA3ODQ0NTgy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '732078000', '2015-04-04 09:07:21', 0, '207844582', NULL, NULL),
(289, 'Евгений', 'Сасимович', 'MTk5MA==3Y7r0A6c', 'sasimo@mail.ru', 'WP_20141028_001(1) (2).jpg', 'performer', 'male', '375333571990', '', 1, 'Минск', NULL, 0, '636670800', '2015-04-04 09:44:05', 50000, '20589560', NULL, NULL),
(290, 'Яня', 'Несцяровіч', 'MTY3NzYwNDk=3Y7r0A6c', NULL, 'IMG_20140927_200637.jpg', 'customer', 'female', '375292106530', NULL, 1, 'Менск', NULL, 0, '682826400', '2015-04-04 10:02:00', 0, '16776049', NULL, NULL),
(292, 'Сеня', 'ватрушкин', 'MjA0ODYxNA==3Y7r0A6c', 'benza009@mail.ru', 'no-image.png', 'customer', 'male', '375282048614', NULL, 0, 'Минск', NULL, 0, '632091600', '2015-04-04 10:27:23', 0, NULL, NULL, NULL),
(293, 'LENA', 'Шавлюк', 'NTc2ODI0MTU5MDEx3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '510112800', '2015-04-04 10:46:56', 0, NULL, '576824159011', NULL),
(294, 'Андрей', 'Штыркин', 'MTE3MTI4OQ==3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '582339600', '2015-04-04 11:26:56', 0, '1171289', NULL, NULL),
(295, 'Юра', 'Чайко', 'NDg5NDQzMDc=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, '775620000', '2015-04-04 11:27:20', 0, '48944307', NULL, NULL),
(297, 'Рома', 'Богатый', 'OTU3MTY5NjE=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', '375292541328', NULL, 1, NULL, NULL, 0, '618454800', '2015-04-04 11:35:07', 0, '95716961', NULL, NULL),
(301, 'Максим', 'Шпилевский', 'YjBsMHQw3Y7r0A6c', 'dremor91maxim@mail.ru', 'DSCF9056.JPG', 'performer', 'male', '375257633378', 'Ремонт квартир, офисов, домов: отделочные(плитка, ламинат, гипсокартон, штукатурка, шпатлевание, декоративная штукатурка и многое другое.) ', 1, 'Минск', NULL, 0, '666910800', '2015-04-04 12:25:51', 50000, '203616398', NULL, NULL),
(302, 'Дима', 'Масликов', 'MzEwNjk3OQ==3Y7r0A6c', 'maslikov_1979@mail.ru', 'no-image.png', 'customer', 'male', '375293199774', NULL, 0, 'Минск', NULL, 0, '313966800', '2015-04-04 12:28:08', 0, NULL, NULL, NULL),
(303, 'Ирина', 'Полянская', 'MjY2OTI0MDQ53Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, NULL, '2015-04-04 13:03:42', 0, '266924049', NULL, NULL),
(306, 'Рома', 'Писарев', 'MTQ2NTcwNDc23Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '835927200', '2015-04-04 13:32:21', 0, '146570476', NULL, NULL),
(307, 'Анатолий ', 'Помогатов', 'MTIzNA==3Y7r0A6c', 'helpyou@helpyou.by', 'iAGMZePFWSE1111112333333.jpg', 'customer', 'male', '375297496120', NULL, 1, 'Минск', NULL, 0, '469314000', '2015-04-04 13:36:55', 0, NULL, NULL, NULL),
(308, 'Александр', 'Высокий', 'dmpxZ2J5cmpsMTQ5MQ==3Y7r0A6c', 'lex.fire.prof@yandex.ru', 'no-image.png', 'customer', 'male', '375292094488', NULL, 0, 'Минск', NULL, 0, '730936800', '2015-04-04 14:03:07', 0, NULL, NULL, NULL),
(309, 'Иван', 'Вахович', 'NDg0ODQ4Mw==3Y7r0A6c', 'ivan.vahovich@gmail.com', '01tp6eury1vik0m00k2hxopc6gqfhjtc.jpg', 'performer', 'male', '375295933374', 'Приветствую вас на странице моего профиля. Работаю более 5 лет в сфере IT. Имею высшее техническое образование. Права категории B, стаж 2 года. В наличии автомобиль Volvo S60. Готов рассмотреть предложения о любых формах сотрудничества. Исполнительный, добросовестный и трудолюбивый!', 1, 'Бегомль', NULL, 0, '632869200', '2015-04-04 14:29:35', 1050000, '4848483', NULL, NULL),
(310, 'Арсений', 'Жарков', 'MTcyODc2MzMz3Y7r0A6c', '', 'no-image.png', 'customer', 'male', '375259206419', '', 1, 'Минск', NULL, 0, '873666000', '2015-04-04 14:52:25', 0, '172876333', NULL, NULL),
(311, 'Александр', 'Садовский', 'NzEyMzAzOA==3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '432262800', '2015-04-04 15:09:13', 0, '7123038', NULL, NULL),
(312, 'Валера', 'пеньков', 'MTEwMjE5Njg=3Y7r0A6c', 'penkoff.valera@yandex.ru', 'DSCF0151.JPG', 'customer', 'male', '375296501943', NULL, 1, 'Минск', NULL, 0, '-59626800', '2015-04-04 15:47:42', 0, NULL, NULL, NULL),
(313, 'Angel', 'White', 'ODEzMDA2NzA=3Y7r0A6c', NULL, '600x6001371666328.jpeg', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '408679200', '2015-04-04 16:17:41', 0, '81300670', NULL, NULL),
(314, 'Виктор', 'Маш', '0LgyNTI4Nw==3Y7r0A6c', 'b25287@rambler.ru', 'no-image.png', 'customer', 'male', '375291520864', NULL, 0, 'минск', NULL, 0, '1262296800', '2015-04-04 16:27:50', 0, NULL, NULL, NULL),
(315, 'Инесса', 'Исаевич', 'MjEzODg0NDY43Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '288842400', '2015-04-04 17:29:53', 0, '213884468', NULL, NULL),
(316, 'кирилл', 'кирилл', '3Y7r0A6c', 'kpervushev@mail.ru', 'no-image.png', 'customer', 'male', '375', NULL, 0, 'минск', NULL, 0, '1262296800', '2015-04-04 17:33:46', 0, NULL, NULL, NULL),
(317, 'андрей', 'сенькевич', 'MjUwNTI13Y7r0A6c', 'sinintv@gmail.com', '74251906239558_480.jpg', 'customer', 'male', '375293763274', NULL, 1, 'минск', NULL, 0, '263163600', '2015-04-04 18:35:05', 0, NULL, NULL, NULL),
(318, 'Олег', 'Каспров', 'MTgwNjAyMTA33Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '170560800', '2015-04-04 20:02:12', 0, '180602107', NULL, NULL),
(319, 'Дмитрий', 'Горбацевич', 'MTQyNzUwODkw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Барановичи', NULL, 0, '651204000', '2015-04-04 20:05:29', 0, '142750890', NULL, NULL),
(320, 'Андрей', 'Босый', 'MjUwOTE5ODcxMDA0MTk4N9GB0YHRgQ==3Y7r0A6c', 'basiakin@yandex.ru', 'no-image.png', 'customer', 'male', '375297095111', NULL, 1, 'минск', NULL, 0, '536446800', '2015-04-04 20:39:10', 0, NULL, NULL, NULL),
(321, 'Анютка', 'Фурса', 'MjI4MDY2Mzg=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', '375255257064', NULL, 1, 'Madrid', NULL, 0, '627012000', '2015-04-04 23:49:56', 0, '22806638', NULL, NULL),
(322, 'Рома', 'Морозов', 'ODI2NHJqbA==3Y7r0A6c', 'impmo88@mail.ru', 'no-image.png', 'customer', 'male', '375293386087', NULL, 1, 'Могилев', NULL, 0, '579038400', '2015-04-05 07:12:59', 0, NULL, NULL, NULL),
(323, 'юрий', 'подлесных', 'Mjg4MDUz0L0=3Y7r0A6c', 'podlesnih1985@mail.ru', 'no-image.png', 'customer', 'male', '375447454170', NULL, 1, 'Минск', NULL, 0, '483480000', '2015-04-05 08:43:10', 0, NULL, NULL, NULL),
(324, 'Валерий', 'Фартовый', 'MTQwNzk2NDc3Mjg1MzU4MA==3Y7r0A6c', 'vishenya.valery@mail.ru', 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, NULL, '2015-04-05 10:08:07', 0, NULL, NULL, '1407964772853580'),
(325, 'Валерий', 'Вищеня', 'NTY0ODI1NDc4NDY03Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '553050000', '2015-04-05 10:23:53', 0, NULL, '564825478464', NULL),
(326, 'Владислав', 'Пустынник', 'MTEzMjg5MDg=3Y7r0A6c', NULL, 'bq9sgkV9oAE.jpg', 'customer', 'male', '375299480810', NULL, 1, 'Минск', NULL, 0, '759898800', '2015-04-05 11:11:45', 0, '11328908', NULL, NULL),
(327, 'Виталий', 'Минский', 'Mjk0ODk4NjA23Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '-15631200', '2015-04-05 11:26:17', 0, '294898606', NULL, NULL),
(328, 'инесса', 'исаевич', 'bWltb3ph3Y7r0A6c', 'inessa06052013@mail.ru', 'w23xe8csow6db0k62x4c36qgrvvuug3pe5fihgxz.jpg', 'performer', 'female', '375259044839', 'Помогу в уборке,погуляю с Вашим питомцем,приготовлю,постираю и поглажу.Качество гарантирую,есть опыт.Очень ответственная,внимательная и пунктуальная.', 1, 'минск', NULL, 0, '288910800', '2015-04-05 14:30:25', 50000, NULL, NULL, NULL),
(329, 'Виктор', 'денисов', 'MTYwMzE5Njl2aWt0b3I=3Y7r0A6c', 'denvikskin@mail.ru', '20131224_113341.jpg', 'performer', 'male', '375296737576', '', 1, 'Минск', NULL, 0, '-25066800', '2015-04-05 14:48:16', 50000, NULL, '174194707224', NULL),
(330, 'инесса', 'исаевич', 'NTM5NjEwODQ1Njc33Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', '375259044839', NULL, 1, 'минск', NULL, 0, '288842400', '2015-04-05 15:34:05', 0, NULL, '539610845677', NULL),
(332, 'Алексей', 'Шишаев', 'IGFsZWtzXzQ13Y7r0A6c', 'aleks_kmd84@mail.ru', 'no-image.png', 'customer', 'male', '375295775095', NULL, 0, 'Минск', NULL, 0, '440024400', '2015-04-05 16:44:43', 0, NULL, NULL, NULL),
(333, 'Анастасия', 'Сулим', 'OTg0NDYyMzQ=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, NULL, NULL, 0, '412048800', '2015-04-05 17:05:53', 0, '98446234', NULL, NULL),
(334, 'Анастасия', 'Сулим ', 'MDIwOGxmeWJrcmY=3Y7r0A6c', 'a.stana@mail.ru', 'no-image.png', 'customer', 'female', '375292785080', NULL, 0, 'минск', NULL, 0, '412030800', '2015-04-05 17:08:32', 0, NULL, NULL, NULL),
(336, 'Anastasia', 'Coletta', 'MjEwODA2NzA13Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', '375447147154', NULL, 0, NULL, NULL, 0, '696394800', '2015-04-05 18:34:28', 0, '210806705', NULL, NULL),
(337, 'Анна', 'Шаховская', 'OTM4ODIzMTBzZW8=3Y7r0A6c', 'bolshoedelo@open.by', 'no-image.png', 'customer', 'female', '375', NULL, 0, 'Минск', NULL, 0, '663022800', '2015-04-06 05:18:05', 0, NULL, NULL, NULL),
(341, 'дмитрий', 'гудвилович', 'MzM0Nmd1ZA==3Y7r0A6c', 'mr.gud@mail.ru', 'no-image.png', 'customer', 'male', '375298582936', NULL, 0, 'минск', NULL, 0, '476485200', '2015-04-06 12:06:25', 0, NULL, NULL, NULL),
(342, 'Анна', 'Пузанкевич', 'MTE1MTA1NzE=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '464317200', '2015-04-06 14:48:40', 0, '11510571', NULL, NULL),
(344, 'Евгений', 'Гуцко', 'S3BhTWNh3Y7r0A6c', 'KpaMca@rambler.ru', 'no-image.png', 'customer', 'male', '375292270234', NULL, 1, 'Слуцк', NULL, 0, '571870800', '2015-04-06 19:37:35', 0, NULL, NULL, NULL),
(345, 'Кристина', 'Енкулёва', 'OTkzMDIwNDE=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '577414800', '2015-04-07 06:24:55', 0, '99302041', NULL, NULL),
(346, 'Максим', 'Лазарчик', 'MTgxNDM3Nzg53Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', '375292846576', NULL, 1, 'Минск', NULL, 0, '755665200', '2015-04-07 08:57:21', 0, '181437789', NULL, NULL),
(347, 'Александр', 'Ашуйко', 'MTQ4NTI4NzIw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Santa Maria', NULL, 0, '778557600', '2015-04-07 08:59:34', 0, '148528720', NULL, NULL),
(348, 'Александр', 'Мухин', 'MTkxNzI5Mzc=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '714016800', '2015-04-07 09:00:54', 0, '19172937', NULL, NULL),
(349, 'Дима', 'Коваль', 'Nzc2NDk0NTI=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '797047200', '2015-04-07 11:17:31', 0, '77649452', NULL, NULL),
(350, 'Денис', 'Савастюк', 'MjY0MjY2MTg=3Y7r0A6c', NULL, 'j08vb6afp92euk47ogb7a.jpg', 'customer', 'male', '375336789830', NULL, 1, NULL, NULL, 0, '674618400', '2015-04-07 14:07:24', 0, '26426618', NULL, NULL),
(351, 'Николай', 'Рабковский', 'YW1vdmFmMjQ5Nw==3Y7r0A6c', 'kolya9224@mail.ru', 'f66x188ogvftc66sjkebh4yev3z5.jpg', 'performer', 'male', '375259442301', 'Профессионально-техническое образование,слесарь-механик с/х оборудования,водитель котегории B,C...есть опыт в строительстве,работал курьером,грузчиком,занимаюсь ремонтом различной техники (хобби),ответственно отношусь к любой работе,вежлив,трудолюбив...', 1, 'Минск', NULL, 0, '724543200', '2015-04-07 14:16:25', 50000, '282209830', NULL, NULL),
(352, 'Вероника', 'Сазонова', 'U2FsYW1hbmRlcjI43Y7r0A6c', 'Antarktida2011@mail.ru', '4v0exfeqwrh0que738rszceaahg9w7cn.jpg', 'performer', 'female', '375292109954', 'студент, будущий экономист-менеджер в сфере туризм', 1, 'Минск', NULL, 0, '862261200', '2015-04-07 14:37:23', 50000, '125018483', NULL, NULL),
(353, 'Люба', 'Подвойская', 'cG9kc29sbnlo3Y7r0A6c', 'www.lybch@mail.ru', 's1vmifk71wwbxivyg3dm50v.jpg', 'performer', 'female', '375445347631', 'Студент, будущий экономист-менеджер в туристской индустрии и гостиничном бизнесе. ', 1, 'Минск', NULL, 0, '860706000', '2015-04-07 14:45:31', 50000, '291268683', NULL, NULL),
(354, 'Сергей', 'Ковальчук', 'Mzk0OTcwMw==3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', '375257805065', NULL, 1, 'Брест', NULL, 0, '432522000', '2015-04-07 17:30:28', 0, '3949703', NULL, NULL),
(355, 'Sophie', 'Katasonova', 'Mjc1NTU1NDI43Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', '375291274110', NULL, 1, NULL, NULL, 0, '1428455400', '2015-04-07 18:26:41', 0, '275555428', NULL, NULL),
(357, 'Алег', 'Калінічаў', 'MjI0NTM5MDEw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, '607309200', '2015-04-07 19:17:51', 0, '224539010', NULL, NULL),
(358, 'Инна', 'Ревяко', 'NGViMTM1OGY=3Y7r0A6c', 'Innarevyako@gmail.com', '1g62xjl1jwgf0jou42y3vsj4oibtfgye0he8j.jpg', 'performer', 'female', '375336633901', 'Добрый день, я свадебный фотограф и буду рада разделить ваши счастливые моменты с вами. \r\n\r\nСнимаю в Беларуси, на Кипре, в Праге и Москве, в Барселоне, в Париже, в Риме, в Милане, в Вероне и других чудесных городах и странах \r\n\r\n\r\n', 1, 'Минск', NULL, 0, '608760000', '2015-04-07 19:46:12', 50000, '4346810', NULL, NULL),
(359, 'Aleksey', 'Semashko', 'Nzc3MjU1Nw==3Y7r0A6c', 'aleksey1666@tut.by', '0n04mzrxpmb541jj9v2bj9qrpctgmqb2lajdl5dyoz.JPG', 'performer', 'male', '375291835777', 'Приветствую вас на странице моего профиля. С удовольствием помогу решить ваши хозяйственно-бытовые проблемы.\r\nПрава категории B, стаж 5 лет(безаварийный)\r\nВ наличии м/а Volkswagen LT грузопассажирские перевозки\r\nГотов рассмотреть предложения о любых формах сотрудничества. Исполнительный, добросовестный и трудолюбивый!', 1, 'минск', NULL, 0, '-1578966600', '2015-04-07 20:15:04', 50000, '40203976', NULL, NULL),
(360, 'Сергей', 'Захарьяш', 'Mjg4NDQwOTY53Y7r0A6c', '', '4kswm760v5ssvayjg7xrx13z0kdr7rt8w61lmr6jh.jpg', 'performer', 'male', '375336333163', 'Приветствую вас на странице моего профиля. Имею высшее образование. Права категории B, стаж (безаварийный) с 2012 года. В наличии автомобиль Mercedes(универсал). Помогу с Готов рассмотреть предложения о любых формах сотрудничества. Помогу составить и оформить любой договор, исковое заявление, другие документы. Исполнительный и добросовестный!', 1, 'Брест', NULL, 0, '604962000', '2015-04-07 20:27:42', 50000, '288440969', NULL, NULL),
(361, 'Татьяна', 'Плескань', 'NDgzOTQ2NzI=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '724561200', '2015-04-07 21:12:11', 0, '48394672', NULL, NULL),
(362, 'Артём', 'Александрович', 'NjUzMDI4NA==3Y7r0A6c', 'Shigoto.haru@Mail.ru', 'mvjzi29365utas6cn17mk5256ub8dn2fxqc2ktmqarkqpk9.jpg', 'performer', 'male', '375293647347', 'Приветствую вас на странице моего профиля. Имею высшее образование. Права категории B, стаж (безаварийный) с 2007 года. В наличии автомобиль. В свободное время готов отвезти и забрать из любой точки Минска. Исполнительный, добросовестный и трудолюбивый! ', 1, '', NULL, 0, '632091600', '2015-04-08 08:38:29', 50000, '6530284', NULL, NULL);
INSERT INTO `users` (`id`, `username`, `surname`, `pass`, `email`, `image`, `role`, `sex`, `phonenumber`, `about`, `phone_verified`, `city`, `banned`, `half_banned`, `birth_date`, `registred`, `balance`, `vk`, `ok`, `fb`) VALUES
(363, 'Сергей', 'Гамзюк', 'MTEyMzU4MTM=3Y7r0A6c', 'gamz_ne@mail.ru', '1euzzojpznh58bd7905onc97ldk2lqyq9x68.jpg', 'performer', 'male', '375298643394', 'Приветствую вас на странице моего профиля. Имею высшее образование. Сделаю сайт под ключ', 1, 'Пинск', NULL, 0, '623797200', '2015-04-08 11:06:15', 50000, NULL, NULL, NULL),
(364, 'Ваня', 'Полуйчик', 'MTQzNDc4NDAw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Мосты', NULL, 0, '722833200', '2015-04-08 12:24:26', 0, '143478400', NULL, NULL),
(365, 'Катерина', 'Виноградова', 'ZnR5Y25odHYyMA==3Y7r0A6c', 'izumchik9@mail.ru', 'bnukm7a0ge8hnkbj0bk5f.jpg', 'performer', 'female', '375298611781', 'Ответственный, исполнительный, грамотный, начитанный и аккуратный человек. Студентка БГУ (5 курс, филологический факультет). Имею опыт работы с документами (и на английском языке), базами данных в офисе.  Владею английским и итальянским языками. Имею опыт работы с детьми от 5 до 15 лет. Доступно объясняю английскую грамматику. Помогу заполнить Ваш словарный запас всей необходимой лексикой для общения на английском. Люблю детей,  могу посидеть с ребенком, погулять на улице, вместе с ним сделать уроки.', 1, 'Минск', NULL, 0, '742510800', '2015-04-08 14:15:41', 50000, '15215294', NULL, NULL),
(367, 'Алена', 'Сургутова', 'MTIzNA==3Y7r0A6c', '1mail@mail.ru', 'l2aorjzwy9nnwgddghdg9t3x9sefy7hf6vmq.jpg', 'performer', 'female', '375296675565', 'Умею и знаю много. Могу быть полезна в разных сферах деятельности, потому что работала почти везде, где было можно - официанткой, помощником повара, уборщицей, секретарем, переводчиком и преподавателем английского языка, дизайнером, web-верстальщиком, преподавателем офисных программ и программ дизайна. В общем искала себя )). Ответственна, без вредных привычек.', 1, 'Минск', NULL, 0, '19429200', '2015-04-08 19:50:12', 50000, NULL, NULL, NULL),
(368, 'Александра', 'Лучков', 'MTIzNA==3Y7r0A6c', '2userrus@list.ru', '1yb11ab124vpvgtwjvy4ymtx.jpg', 'performer', 'female', '375296675565', 'Журналист, организатор мероприятий, редактор, PR, SMM-специалист', 1, 'Минск', NULL, 0, '779317200', '2015-04-08 19:56:10', 50000, NULL, NULL, NULL),
(369, ' Екатерина', 'Пучкова', 'MTIzNA==3Y7r0A6c', '3userrus@list.ru', 'ttnn04bowtzb4793i3tqykdcm.jpg', 'performer', 'female', '375296675565', 'Привет. Меня зовут Екатерина, мне 23 года. Имею высшее образование. Ищу подработку в свободное время. Готова качественно и быстро исполнять задания.', 1, 'Минск', NULL, 0, '686268000', '2015-04-08 19:57:33', 50000, NULL, NULL, NULL),
(370, 'Дима', 'Ручков', 'MTIzNA==3Y7r0A6c', '4userrus@list.ru', 'se5m5klzrmorb66a3q0t8n2aeygu11o1ny9x1z.jpg', 'performer', 'male', '375296675565', 'Веб-разработка. Делаю: сайты, блоги, интернет-магазины, посадочные страницы.\r\n\r\nНавыки: HTML, CSS, JS.\r\n\r\nЗнаю CMS: Magento, Wordpress, Joomla.\r\n\r\nИспользую: Photoshop, Illustrator.\r\n', 1, 'Минск', NULL, 0, '601938000', '2015-04-08 20:00:23', 50000, NULL, NULL, NULL),
(371, 'Андрей ', 'Леницкий', 'MTIzNA==3Y7r0A6c', '5userrus@list.ru', 'orkjweo2vdzo2ku4l8vhvt5ez15syytz0rh5.jpg', 'customer', 'male', '375296675565', 'Образование высшее. Нравиться заниматься ремонтом техники. Ремонтирую электронику. Специализируюсь на холодильном оборудовании, но могу делать и другую бытовую технику.', 1, 'Минск', NULL, 0, '-125809200', '2015-04-08 20:03:00', 0, NULL, NULL, NULL),
(372, 'Алексей', 'Дурнев', 'MTIzNA==3Y7r0A6c', '6userrus@list.ru', 'omuil06kfbj8bbznhathtr5qbt61wp8j59sjx0em8.jpg', 'performer', 'male', '375296675565', 'оказываю качественные услуги по взаимовыгодной цене и согласованных сроках в основном характера перевозок или доставок, а также важных и особых услуг, как пешком, так и на собственном легковом авто. при желании, могу исполнить специфические услуги, к примеру поздравить с выражением получателя с праздником по заранее согласованному тексту, возможно в оговоренном внешнем виде. буду рад видеть Вас в числе моих заказчиков. p,.s, спою с вами в караоке, обладаю неплохим голосом. ', 1, 'Минск', NULL, 0, '724456800', '2015-04-08 20:04:31', 50000, NULL, NULL, NULL),
(373, 'Денис', 'Минин', 'MTIzNA==3Y7r0A6c', '7userrus@list.ru', '86zeqyfmilz640hs4dzyx05qqh7rqu.jpg', 'performer', 'male', '375296675565', 'перспективный молодой человек,ответственный,пунктуальный,работал в сфере обслуживания,выполняю курьерскую доставку.... Работаю вместе с сестрой, у нее большой опыт в килинговой сфере', 1, 'Минск', NULL, 0, '631400400', '2015-04-08 20:05:44', 50000, NULL, NULL, NULL),
(374, 'Юрий ', 'Хованский', 'MTIzNA==3Y7r0A6c', '8', 'pe09bph2vg5vrjt0h0zd4tep.jpg', 'performer', 'male', '375296675565', 'Люблю и качественно подхожу к работе. Выполняю скрупулезно, так, чтобы заказчику понравилось. Жду Ваших заказов!', 1, 'Минск', NULL, 0, '-94618800', '2015-04-08 20:07:10', 50000, NULL, NULL, NULL),
(375, 'Оксана ', 'Марченко', 'MTIzNA==3Y7r0A6c', '9', '9bd728dx34w6hcrnp8nwp2fsj42auij.jpg', 'performer', 'female', '375294821234', 'Знание ПК WORD, EХCEL, INTERNET EХPLORER, CORAL DRAW Х4 Сертификаты: "Основы Успешного Маркетинга" прохождение тренинга в компании "Plankion", Пользователь CORAL DRAW Х4 Дополнительная информация обо мне: Знание бизнес этики, правил деловой переписки и переговоров, обладаю хорошими организаторскими и аналитическими способностями, настойчива в достижении цели. Умею работать как самостоятельно, так и в команде. Присущи: энергичность, коммуникабельность, интеллигентность, высокий уровень ответственности, придерживаюсь высокой \r\n', 1, 'Минск', NULL, 0, '694303200', '2015-04-08 20:08:44', 50000, NULL, NULL, NULL),
(376, 'Катерина ', 'Гурская', 'MTIzNA==3Y7r0A6c', '10', 'gujvolb1z4bz869v67pt6cw98iwfk0.jpg', 'performer', 'female', '375294821234', 'Люблю деток. Оптимистка. Большой опыт:быстрый набор текста, уборка офиса, квартир, креатив. Берусь за любую работу и выполняю качественно. Муж отличный специалист по електрике, сантехнике, ремонту мебели и т.д.', 1, 'Минск', NULL, 0, '1420146000', '2015-04-08 20:10:09', 50000, NULL, NULL, NULL),
(377, 'Виктория ', 'Ливинская', 'MTIzNA==3Y7r0A6c', '11', 'lcjqpya6ao8pfbqkfniekw2abto1r8aiqwfy5n.jpg', 'performer', 'female', '375294821234', 'Порядочная, чистоплотная, трудолюбивая с удовольствием и за умеренную плату возьму на себя уборку вашего дома.', 1, 'Минск', NULL, 0, '694303200', '2015-04-08 20:12:41', 50000, NULL, NULL, NULL),
(378, 'Мария ', 'Зайцева', 'MTIzNA==3Y7r0A6c', '12', 'mfjzl3llmwtdgnsx76lislie2qc02d1ud5y1aoli.jpg', 'performer', 'female', '375294821234', 'Ответсвенная, исполнительная, комуникабельная, честная, чувство юмора в наличии. Вредные привычки отсутвуют. Очень люблю животных и детей.', 1, 'Минск', NULL, 0, '725925600', '2015-04-08 20:14:32', 50000, NULL, NULL, NULL),
(379, 'Юлия ', 'Салибекова', 'MTIzNA==3Y7r0A6c', '13', 'ctfa86ejqtpkan7cq52ebh9jsyo5ext3zjvryc9c025u0iko.jpg', 'performer', 'female', '375294821234', 'Без денег сидит тот, кто боится работы, живу по принципу- все в жизни нужно попробовать!Работы не боюсь, выполняю качественно и главное с огромным удовольствием. Что не умею - быстро учусь, легкая на подъем. Имею колоссальный разнообразный опыт в разных сферах. \r\nДля работы есть 2 машины-микроавтобус Т4 и легковая. В наличии - муж -мастер на все руки, для уборки больших объемов- напарница.\r\n', 1, 'Минск', NULL, 0, '-94618800', '2015-04-08 20:15:33', 50000, NULL, NULL, NULL),
(380, 'Яна ', 'Семакина', 'MTIzNA==3Y7r0A6c', '14', '2hppwr6uyv7x7o5cik9gikc.jpg', 'performer', 'female', '375294821234', 'Выполняю все виды уборок:\r\n-генеральная-\r\n-послеремонтная,\r\n-еженедельная уборка,\r\n-после переезда,\r\n-перед продажей или сдачей квартиры в наем,а также мытьё окон.Работаю как для себя!Без выходных!Пунктуальна,ответственна,коммуникабельна с отличным чувством юмора)))...\r\n', 1, 'Минск', NULL, 0, '757461600', '2015-04-08 20:16:47', 25000, NULL, NULL, NULL),
(381, 'Екатерина ', 'Семёнова', 'MTIzNA==3Y7r0A6c', '15', 'pyonug3t62xye1lh4hvgrlfxyh96iwn00spf.jpg', 'performer', 'female', '375294821234', 'Коммуникабельная,ответственная,пунктуальная.Имееется опыт работы консультантом,промоутером.Владею на высоком уровне английским языком.', 1, 'Минск', NULL, 0, '757461600', '2015-04-08 20:17:50', 50000, NULL, NULL, NULL),
(382, 'Анна ', 'Симонова', 'MTIzNA==3Y7r0A6c', '16', '65go9rfrsfvxlej68quiism.jpg', 'performer', 'female', '375294821234', 'Скромная, ответственная, спокойная, трудолюбивая....не пью, не курю.\r\nОкончила музыкальную школу по классу фортепиано.\r\nОкончила педагогический колледж, имею диплом младшего специалиста (учитель младших классов)\r\n', 1, 'Минск', NULL, 0, '536533200', '2015-04-08 20:19:18', 50000, NULL, NULL, NULL),
(383, 'Павел ', 'Вокуев', 'MTIzNA==3Y7r0A6c', '17', 'ueuoana0nd1xa7qevejcm1lyw.jpg', 'performer', 'male', '375294821234', 'Оказание услуг "Домашний мастер",в основном по сантехнике и электрике.Устанавливаю бойлеры,счетчики воды,стиральные и посудомоечные машины,сантехнику. Произвожу монтаж и замену водопроводной системы и другие виды работ.\r\n', 1, 'Минск', NULL, 0, '201042000', '2015-04-08 20:21:11', 50000, NULL, NULL, NULL),
(384, 'Оксана ', 'Хабурзания', 'MTIzNA==3Y7r0A6c', '18', '9ynts7wd090t4ktqyjhrs1fnk8wyfakg15rural1kgzq5.jpg', 'performer', 'female', '375294821234', 'Имею опыт работы: экономиста, офис-менеджера, промоутера. К любой работе стараюсь подходить ответственно и творчески.', 1, 'Minsk', NULL, 0, '699314400', '2015-04-08 20:23:03', 50000, NULL, NULL, NULL),
(385, 'Вячеслав', ' Михайлович', 'MTIzNA==3Y7r0A6c', '19', '37gby6v0k7yq9aw94uky5tgix68bbaetqnyijd66s3a.jpg', 'performer', 'female', '375294821234', 'Люблю работу и работаю если есть!\r\n комплексные ремонты , электрика и сантехника. А в общем практически всё. Сделать можно всё, главное знать кому звонить!', 1, 'Минск', NULL, 0, '671835600', '2015-04-08 20:24:32', 50000, NULL, NULL, NULL),
(386, 'Андрей ', 'Переход', 'MTIzNA==3Y7r0A6c', '20', 'lhwdzryy46rs944k40l2bg.jpg', 'performer', 'male', '375294821234', 'Домашний мастер выполнит все виды ремонта по дому и офису: \r\n- электроремонт и сантехремонт \r\n- сборка, а также ремонт всех видов мебели \r\n- установка замков \r\n- крепление карнизов, полок, зеркал, картин, ковров \r\n- навешивание кухонь, карнизов и штор \r\n- установка вытяжек \r\n- установка и ремонт смесителей \r\n- покупка недостающих материалов и запчастей \r\n- работы по гипсокартону \r\n- укладка ламината,ленолиума,паркет доски,кавролин и т.д \r\nА также другие услуги. \r\nЦена договорная,качество и гарантия\r\nТакже помогу с переездом и погрузкой! в наличии есть бус', 1, 'Минск', NULL, 0, '347230800', '2015-04-08 20:26:41', 20000, NULL, NULL, NULL),
(387, 'Артур', 'Аветисян', 'MTIzNA==3Y7r0A6c', '21', 'ol99oy25yektli8y2ircaibcrjr.jpg', 'performer', 'male', '375294821234', 'Ответственный подход к делу, качественное исполнение, проявление инициативы - свойственное мне поведение. И также, бонус от сотрудничества со мной - отличное настроение.', 1, 'Минск', NULL, 0, '662763600', '2015-04-08 20:28:35', 50000, NULL, NULL, NULL),
(388, 'Александр ', 'Кустов', 'MTIzNA==3Y7r0A6c', '22', 'veo2qdzu5ylxf326k4v6gzk38.jpg', 'performer', 'male', '375294821234', 'Ответственные, порядочные,\r\nтрудолюбивые и коммуникабельные молодые люди. Подход к работе качественный - как для себя!Готовы предложить свою помощь в выполнении бытовых и прочих заданий - мойка окон; уборка квартир; устранение неполадок с электрикой и сантехникой; косметический ремонт помещений (штукатурка, шпаклевка, покраска потолка, обои, багеты,установка радиаторов,укладка ламината)', 1, 'Минск', NULL, 0, '358286400', '2015-04-08 20:32:10', 50000, NULL, NULL, NULL),
(389, 'Вадим ', 'Мельников', 'MTIzNA==3Y7r0A6c', '23', '1fw3kv65ij31xkdbt0kjxs0vufpbg6pxmxga9frvalwq3i6.jpg', 'performer', 'male', '375294821234', 'Целеустремленный, легок в обучении,внимателен к деталям,пунктуальный, умею работать в команде по необходимости руководить ею.', 1, 'Минск', NULL, 0, '542149200', '2015-04-08 20:34:27', 50000, NULL, NULL, NULL),
(390, '24', '24', 'MTIzNA==3Y7r0A6c', '24', 'gi8lm6q7xmgyc352wp8c77m1nlem16vg7fs2r1yw2a6126.jpg', 'customer', 'male', '375294821234', 'Если взялся за дело то доделаю до конца! Профессионально разбираюсь в ремонте и настройке компьютеров, программном обеспечении. Помогу с ремонтом, переездом, перевозом, уборкой и т.д.', 1, 'Минск', NULL, 0, '231714000', '2015-04-08 20:36:29', 0, NULL, NULL, NULL),
(391, 'Марина ', 'Налитова', 'MTIzNA==3Y7r0A6c', '25', 'owp8vbx4lk9v4ipudecgrmkof2fajh4b4fu1kho6h21hli.jpg', 'customer', 'female', '375294821234', NULL, 1, 'Минск', NULL, 0, '608846400', '2015-04-08 20:38:00', 0, NULL, NULL, NULL),
(392, '26', '26', 'MTIzNA==3Y7r0A6c', '26', 'izlhqknldam15bkg7uil5k4u53i4o22ye.jpg', 'customer', 'male', '375294821234', 'Готов работать,есть опыт работы почти 2 годa! к работе готов приступить в любое время, очень нужны деньги, так что в моих интересах все сделать качественно,  к тому же с друзьями и не халтурить!', 1, 'Минск', NULL, 0, '732232800', '2015-04-08 20:39:36', 0, NULL, NULL, NULL),
(393, 'Аня', 'Ритминко', 'MTgwODE5OA==3Y7r0A6c', '27', 'xilcqch7aaq7x38nzpd2hubij8wkrcsy2bqlwekyg8n.jpg', 'customer', 'male', '375294821234', 'Студентка, 5 курс БГУ. Свободна в первую половину дня. Я ответственная, коммуникабельная, пунктуальная.', 1, 'Минск', NULL, 0, '698709600', '2015-04-08 20:41:20', 0, NULL, NULL, NULL),
(394, '28', '2828', 'MTIzNA==3Y7r0A6c', '28', 'q80cz9viz19cnwf9e0un3ja2q85ahuhr2x3f0.jpg', 'customer', 'male', '375294821234', 'Коммуникабельность, исполнительность, пунктуальность, ответственность, аккуратность, пунктуальность, быстро реагирую на изменения в обстановке, проявляю сдержанность, решительность и самообладание.\r\nЗанимаюсь юридической деятельностью \r\nКачественная уборка квартир,домов.\r\nКроме этого приведем в порядок Ваши полы (положим линолеум, прикрутим плинтус, карнизы, покраска стен и потолков, батарей\r\n', 1, 'Минск', NULL, 0, '708901200', '2015-04-08 20:42:58', 0, NULL, NULL, NULL),
(395, '29', '29', 'MTIzNA==3Y7r0A6c', '29', 'v6n36prosjm7owdk4ffp47s1oobazs5fw9v6i5zamyksl.jpg', 'customer', 'male', '375294821234', 'Выполню работы по дому.,Электрика и сантехника.Добросовестно отношусь к работе.Даю качество и гарантию!!!', 1, 'Минск', NULL, 0, '227307600', '2015-04-08 20:45:09', 0, NULL, NULL, NULL),
(396, '30', '30', 'MTIzNA==3Y7r0A6c', '30', 'izi7vdm5m2xhthnszd6vruyfug536o47pkgd.jpg', 'customer', 'female', '375294821234', 'Ответственно отношусь к выполнению заданий. Высшее образование, без вредных привычек. Люблю животных, есть собака - рыжий француз Франк. Хочу попутешествовать, нужна подработка.', 1, 'Минск', NULL, 0, '', '2015-04-08 20:46:38', 0, NULL, NULL, NULL),
(397, 'Артем', 'Дерпа', 'MTIzNA==3Y7r0A6c', '31', '82nlzqzac1sawcup6ggf8hc6x.jpg', 'customer', 'male', '375294821234', NULL, 1, 'Минск', NULL, 0, '570920400', '2015-04-08 20:48:08', 0, NULL, NULL, NULL),
(398, '32', '32', 'MTIzNA==3Y7r0A6c', '32', '9v1ifrg7hzloi45ol5e4ui267fyj532jebqnr0byhrvf6n.jpg', 'customer', 'male', '375294821234', 'Плиточник; каменщик; монтажник по монтажу стальных и железобетонных конструкций ручной сварки; электро-газосварщик; стропальщик; младший специалист по строительству и эксплуатации зданий и сооружений\r\n\r\n\r\n', 1, 'Минск', NULL, 0, '-89089200', '2015-04-08 20:49:39', 0, NULL, NULL, NULL),
(399, '33', '33', 'MTgwODE5OA==3Y7r0A6c', 'Антонина Каринаина', 'ozpvppml2f5yjtnu4qncecm0sjavfqdgo9zbfjwn8ahpp.jpg', 'customer', 'female', '375294821234', NULL, 1, 'Минск', NULL, 0, '761263200', '2015-04-08 20:52:09', 0, NULL, NULL, NULL),
(400, 'Андрей', 'Воробей', 'MTgwODE5OA==3Y7r0A6c', '34', 'kt8e1ovgy1i4qm4hebp6938uma3.jpg', 'customer', 'male', '375294821234', 'Очень трудолюбив, спокоен, честный, отзывчив, готов идти на уступки, работу выполняю на качественном уровне.', 1, 'Минск', NULL, 0, '377125200', '2015-04-08 20:54:10', 0, NULL, NULL, NULL),
(401, ' Александра', ' Соловьева', 'MTIzNA==3Y7r0A6c', '35', 'iv670xh76hnfxtnlg4yr00lon2i46z.jpg', 'customer', 'female', '375294821234', 'Спасибо, за интерес к Моей странице)\r\nЗовут Меня Александра Соловьева. Мне 22года, из которых год жила и работала в Германии, ещё 2 года работала в Банке, и ещё 2 года настраивала интернет ( wi-fi в том числе). Ответственна, пунктуальна,позитивно смотрю на Жизнь. Буду рада сотрудничеству.\r\n', 1, 'Минск', NULL, 0, '726271200', '2015-04-08 20:55:18', 0, NULL, NULL, NULL),
(402, '36', '36', 'MTIzNA==3Y7r0A6c', '36', 'wabma537duarrahd05n5kplt8o4t3jif.jpg', 'customer', 'female', '375294821234', 'У меня высшее экономическое образоваие (бухгалтер).Работаю бухгалтером, но на данный момент нахожусь в декретном отпуске. Ребенку 2 года, с недавних пор посещает детский сад, по этому ищу подработку на время (пока ребенку не исполниться 3 года).', 1, 'Минск', NULL, 0, '661122000', '2015-04-08 20:57:33', 0, NULL, NULL, NULL),
(403, 'Настя', 'Крылатова', 'MTgwODE5OA==3Y7r0A6c', '37', '9id22qelzvb0a9s29nqzptowex0liw1m1dec.jpg', 'customer', 'female', '375294821234', ' \r\n', 1, 'Минск', NULL, 0, '691884000', '2015-04-08 20:58:47', 0, NULL, NULL, NULL),
(404, '38', '38', 'MTIzNA==3Y7r0A6c', '38', 'd77v9ahr6esz02o0mpb20e6g.jpg', 'customer', 'female', '375294821234', 'Трудолюбива, порядочна, пунктуальна, умею работать в команде. Ответственно отношусь к любой работе.', 1, 'Минск', NULL, 0, '724370400', '2015-04-08 21:00:34', 0, NULL, NULL, NULL),
(405, '39', '39', 'MTIzNA==3Y7r0A6c', '39', 'foqqjp7imsau0l6sv03uua10kgkimml73ugozy12ep.jpg', 'customer', 'male', '375294821234', 'Выполню профессионально следующие работы:\r\nЭлектромонтажные, сантехнические, ремонтно-строительные работы, укладка ламината, ленолеума, установка и ремонт межкомнатных дверей,уборка помещений.\r\n', 1, 'Минск', NULL, 0, '124750800', '2015-04-08 21:01:42', 0, NULL, NULL, NULL),
(406, 'Александр', 'Соколовский', 'MTIzNA==3Y7r0A6c', '40', '8101s15grhs9szkiq700ap.jpg', 'performer', 'male', '375296675565', 'В строительстве с 2001 года.Монтаж гипсокартона,металоконструкций,систем вентиляции,водоснабж.,отопления и электрики.Установка окон,дверей,ролет.Сборка мебели.Штукатурные,малярные,покрасочные,плиточные работы.Декор,золочение,патинирование и поталь.', 1, 'Минск', NULL, 0, '439333200', '2015-04-08 21:02:50', 50000, NULL, NULL, NULL),
(407, 'Анна', 'Левицкая', 'MTIzNA==3Y7r0A6c', '41', '4f3xjpvz92r297xl2bctvp5wib33do.jpg', 'performer', 'female', '375296675565', 'Рерайт,копирайт, написание SEO-статей (ответственность и грамотность гарантирую), раздача листовок, выполнение других мелких заданий', 1, 'Минск', NULL, 0, '726184800', '2015-04-08 21:04:39', 50000, NULL, NULL, NULL),
(408, 'Дима ', 'Карташов', 'MTIzNA==3Y7r0A6c', '42', 'va4ouiz52dyscl82g9xyjehyc7hztulm7245ft.jpg', 'performer', 'female', '375296675565', 'Взрослый, адекватный, пунктуальный, честный, коммуникабельный,ответственный. Имею постоянную работу. Ищу подработку в нерабочее время и на выходных.', 1, 'Минск', NULL, 0, '629845200', '2015-04-08 21:15:24', 50000, NULL, NULL, NULL),
(409, 'Аделина ', 'Сотникова', 'MTIzNA==3Y7r0A6c', '43', '2lhln9neez43ehxd11co8800tkqdku73gwiizuw4v.jpg', 'performer', 'female', '375296675565', 'Работала хостес и промоутером в разных компаниях. Закончила модельную школу и художественную школу. Сейчас усердно изучаю английский разговорный язык.', 1, 'Минск', NULL, 0, '787356000', '2015-04-08 21:16:33', 50000, NULL, NULL, NULL),
(410, 'Катя ', 'Иванчикова', 'MTIzNA==3Y7r0A6c', '44', 'b1vq4jerm8yq8n7kl32ofmlejty.jpg', 'performer', 'female', '375296675565', 'Ответственная, честная, пунктуальная, опыт во многих направлениях. Выполню поручения на личном авто, стаж 10 лет.', 1, 'Минск', NULL, 0, '345589200', '2015-04-08 21:18:18', 50000, NULL, NULL, NULL),
(411, 'Юля ', 'Коновалова', 'MTIzNA==3Y7r0A6c', '45', '6zd550f3ui48xabz9gg27zlh92t497lb.jpg', 'performer', 'male', '375296675565', 'Готова выполнять разные задания качественно и в срок. Преимущество отдаю работе в интернете (наполнение сайтов информацией, размещение объявлений на ТОР досках, создание баз данных, любой поиск информации по заданным критериям и т.д.). Профессиональный набор текстов, написание текстов, редактирование, опыт работы в колл–центрах и т.д. Также смогу выполнить и другие виды работ', 1, 'Минск', NULL, 0, '408661200', '2015-04-08 21:20:39', 50000, NULL, NULL, NULL),
(412, 'Стас ', 'Шмелёв', 'MTIzNA==3Y7r0A6c', '46', 'ocv5r6yamt3o5pnj8pakpz.jpg', 'performer', 'male', '375296675565', 'Выполню качественно любое задание\r\nВ выходные дни готов выполнять задания в любое время.\r\nЗадание будет выполнено в сроки о которых мы с Вами договоримся)))\r\n', 1, 'Минск', NULL, 0, '824248800', '2015-04-08 21:22:16', 10000, NULL, NULL, NULL),
(413, 'Андрей ', 'Рогозов', 'MTIzNA==3Y7r0A6c', '47', 's6sme8yfmkjxho7odagwlg7t7gnqjmmfqiq0ngjvw.jpg', 'performer', 'male', '375296675565', 'Спортивный, ответственный, пунктуален молодой человек. Разбираюсь в компьютерной технике (сборка, мелкий сервис, чистка, установка операционных систем и программ). Не боюсь грязной работы.', 1, 'Минск', NULL, 0, '755820000', '2015-04-08 21:24:08', 20000, NULL, NULL, NULL),
(414, 'Елена ', 'Третьякова', 'MTIzNA==3Y7r0A6c', '48', 'hakv0wnho8czrtyzxltp95bwogt9r7iys3nw5mn2ddvji.jpg', 'performer', 'male', '375296675565', 'Люблю трудиться.К работе отношусь очень серьезно.Люблю новаторство.Ценю в людях честность и искренность,потому что всегда стараюсь быть такой сама.Добросовестный человек.', 1, 'Минск', NULL, 0, '566514000', '2015-04-08 21:25:21', 50000, NULL, NULL, NULL),
(415, 'Никита ', 'Легостев', 'MTIzNA==3Y7r0A6c', '49', 'bd8jl4irtk4uafsoigljy1fm9je8toqdfbqvocqoit.jpg', 'performer', 'male', '375296675565', 'Около 10 лет общестроительных работ. Направление отопление сантехника водоснабжение и электромонтажные роботы.', 1, 'Минск', NULL, 0, '377125200', '2015-04-08 21:27:45', 50000, NULL, NULL, NULL),
(416, 'Лера ', 'Кондра', 'MTIzNA==3Y7r0A6c', '50', 'ais9lzjqx6j8wf8wka3c.jpg', 'performer', 'male', '375296675565', 'Ответственно подхожу к поставленным поручениям и заданиям. Главное в исполнении работы - точность, пунктуальность, доверие, гарантия. Готова выполнять задания с целью заработка.', 1, 'Минск', NULL, 0, '787356000', '2015-04-08 21:29:50', 50000, NULL, NULL, NULL),
(417, 'Сергей ', 'Миронов', 'MTIzNA==3Y7r0A6c', '51', 'wn5xxz2ls311ax4478wt58.jpg', 'performer', 'male', '375296675565', 'Меня зовут - Анатолий, мне 42 года по специальности электрик. Мое любимое занятие - помогать людям.\r\nЖенат,проживаю в Минске\r\n', 1, 'Минск', NULL, 0, '93128400', '2015-04-08 21:31:20', 50000, NULL, NULL, NULL),
(418, 'Вадим ', 'Мотылёв', 'MTIzNA==3Y7r0A6c', '52', '8rs2b1ty1z8tsoqunhqvsvrsf0vsldcxab9xoai7.jpg', 'performer', 'male', '375296675565', 'Настойчив и трудолюбив. Легко обучаемый новым специальностям, исполнителен и ответственен. Без вредных привычек. Работу выполняю на совесть (как для себя).', 1, 'Минск', NULL, 0, '601160400', '2015-04-08 21:33:36', 50000, NULL, NULL, NULL),
(419, 'Карина ', 'Лимер', 'MTIzNA==3Y7r0A6c', '53', '0tim130dcqz6wsj3ku7zgkrz.jpg', 'performer', 'male', '375296675565', 'Ответственная, порядочная, исполнительная, трудолюбивая, прежде всего люблю и ценю качество работы. По семейным обстоятельствам сейчас нахожусь дома.', 1, '53', NULL, 0, '568155600', '2015-04-08 21:34:36', 50000, NULL, NULL, NULL),
(420, 'Лена ', 'Темникова', 'MTIzNA==3Y7r0A6c', '54', '5xl8rma4tmg6jk9ca53ugwqs1a24d3nufa7o.jpg', 'performer', 'male', '375296675565', 'специалист по Чехии, жила там работала и сейчас занимаюсь турами трансферами экскурсиями встречами образованием', 1, 'Минск', NULL, 0, '282430800', '2015-04-08 21:35:52', 50000, NULL, NULL, NULL),
(421, 'Лёша ', 'Пчёлкин', 'MTIzNA==3Y7r0A6c', '55', '9tdjxrzkfzlh3id1w9ow.jpg', 'performer', 'male', '375296675565', 'Если взялся за дело то доделаю до конца! Профессионально разбираюсь в ремонте и настройке компьютеров, программном обеспечении. Помогу с ремонтом, переездом, перевозом, уборкой и т.д.', 1, 'Минск', NULL, 0, '219358800', '2015-04-08 21:37:37', 20000, NULL, NULL, NULL),
(422, 'Наталья ', 'Бледанс', 'MTIzNA==3Y7r0A6c', '56', '4hfy6ucdpjyx9nzy0l4udog89y2k1lunx73oiwir8.jpg', 'performer', 'male', '375296675565', 'Добрая, порядочная, быстрая, скрупулезная.Готова выполнить любую работу.Имею опыт по уборке офисов и квартир.Могу раздавать флаера, расклеивать объявления и т.д.', 1, 'Минск', NULL, 0, '723333600', '2015-04-08 21:39:49', 50000, NULL, NULL, NULL),
(423, 'Евгений', 'Холостян', 'MTgwODE5OA==3Y7r0A6c', '57', '8bwm5w1fs1u8cyeiedjveyhjad3.jpg', 'customer', 'male', '37557', NULL, 0, 'Минск', NULL, 0, '313966800', '2015-04-08 21:40:42', 0, NULL, NULL, NULL),
(424, 'Лена ', 'Головач', 'MTIzNA==3Y7r0A6c', '58', 'iacc3phthltn3mnjkjy8wa1a1s67i6zh29fzlpvc.jpg', 'performer', 'male', '375294821111', 'Вполне вменяемый и адекватный человек, общительная. Со мной главное - четко сформулировать задачу. Работы не боюсь, хамства в свой адрес не терплю. Очень нуждаюсь в деньгах для осуществления мечты. Есть пунктик - если за что-то и берусь, то ДЕЛАЮ НА 100℅ !!! Опыт, пусть и маленький, у меня на этом сайте уже есть, буду стараться, что бы и дальше мне ставили только "5"!!!!!', 1, 'Минск', NULL, 0, '566341200', '2015-04-08 21:41:51', 50000, NULL, NULL, NULL),
(425, 'Евгений ', 'Вибе', 'MTgwODE5OA==3Y7r0A6c', '59', 'p23f1ownk8k75s8m07zy1zt1lr6aehvcjfzt5rsfx.jpg', 'performer', 'male', '375294821234', '', 1, 'Минск', NULL, 0, '598136400', '2015-04-08 21:43:15', 50000, NULL, NULL, NULL),
(426, 'Юлия ', 'Коган', 'MTIzNA==3Y7r0A6c', '60', 'gbm3qjv74tg0psqxzeuh9fzfb3tyspaovncys0dhmio.jpg', 'performer', 'male', '375294821234', 'Интересует подработка очень))) Легко перемещаюсь в пространстве Минска. Могу сделать красивые таблицы-бланки в Excel, грамотно и быстро наберу текст\r\nХорошо готовлю, убираюсь, глажу.\r\n', 1, 'Минск', NULL, 0, '725493600', '2015-04-08 21:44:35', 50000, NULL, NULL, NULL),
(427, 'Антон ', 'Иванов', 'MTIzNA==3Y7r0A6c', '61', 'x2vn08yl0cn72e6hyd1fvhcl3ww.jpg', 'performer', 'male', '375294821234', 'Если что то делаю,делаю так,что бы работало-как для себя.\r\nРаботу выполню качественно с гарантией,профессиональным инструментом.Есть опыт и рекомендации.Выбор за Вами!\r\n', 1, 'Минск', NULL, 0, '534891600', '2015-04-08 21:45:40', 50000, NULL, NULL, NULL),
(428, 'Валерия ', 'Лапенко', 'MTIzNA==3Y7r0A6c', '62', 'ya4n6algsvvx20kzjwc556lzv1.jpg', 'performer', 'male', '375294821234', 'Сейчас нахожусь в декретном отпуске по уходу за ребёнком. При возможности выполню временные задания.', 1, 'Минск', NULL, 0, '471819600', '2015-04-08 21:46:43', 50000, NULL, NULL, NULL),
(429, 'Антон ', 'Коробков', 'MTIzNA==3Y7r0A6c', '63', 'czevabezw8ig57grp2n5wp2b5fxwjvf2um7ek9jt5b.jpg', 'performer', 'male', '375294821234', 'Пунктуальность, ответственность, добросовестность, самостоятельность, высокая работоспособность, дисциплинированность, исполнительность, быстрая обучаемость, целеустремленность, стрессоустойчивость, коммуникабельность, умение работать в команде, аккуратность.Всё могу, всё умею))) кому что то делаю всем нравится.', 1, 'Минск', NULL, 0, '473720400', '2015-04-08 21:48:06', 50000, NULL, NULL, NULL),
(430, 'Леся ', 'Ярославская', 'MTIzNA==3Y7r0A6c', '64', 'chmvuca2qlwx0waysqfdcu4vva.jpg', 'performer', 'female', '375294821234', 'Имею опыт работы: экономиста, офис-менеджера, промоутера. К любой работе стараюсь подходить ответственно и творчески.', 1, 'Минск', NULL, 0, '787442400', '2015-04-08 21:50:00', 50000, NULL, NULL, NULL),
(431, 'Наталия', 'Наталия', 'MTIzNA==3Y7r0A6c', '65', '88hqinrqg8fgygd25dwtr2b.jpg', 'performer', 'male', '375294821234', 'Наталия , 38 лет! Жизнерадостная, исполнительная, аккуратная, коммуникабельна! есть опыт в сфере интеллектуальной собственности, есть Немалый опыт и в сфере Клининговых услуг! любые предложения рассмотрю с удовольствием. Не боюсь трудностей.', 1, 'Минск', NULL, 0, '224715600', '2015-04-08 22:13:01', 50000, NULL, NULL, NULL),
(432, 'Стас ', 'Каримов', 'MTIzNA==3Y7r0A6c', '66', '88wjs7vk2ilwq5r9nlsz5e.jpg', 'performer', 'male', '375294821234', 'Большой навык в различных строительно-монтажных работах. Есть полный набор инструмента.\r\nВыполнение сантехнических работ любого уровня сложности.\r\nТакже, занимаюсь фотосъемкой\r\n', 1, 'Минск', NULL, 0, '313966800', '2015-04-08 22:15:03', 50000, NULL, NULL, NULL),
(433, 'Алексей ', 'Педин', 'MTIzNA==3Y7r0A6c', '67', 'dr7mmtt582fmshd6oxtz1b53iib8y74c4rbp.jpg', 'performer', 'male', '375294821234', 'Трудолюбив, пунктуален, сообразителен и ответственен.\r\nМогу выполнить работы по электрике, сантехнике, кладке кирпича (в небольших объемах), и т.д. А также электросварка, и много другого. Выбирайте исполнителем и звоните - договоримся.\r\n', 1, 'Минск', NULL, 0, '471906000', '2015-04-08 22:16:15', 50000, NULL, NULL, NULL),
(434, 'Павел ', 'Неприятель', 'MTIzNA==3Y7r0A6c', '68', 'npgn5m1ye0ssx35jo5scvb9lmlgdy2j79rqruu0xt58s.jpg', 'performer', 'male', '375294821234', 'Разносторонне развит, коммуникабельный, трудолюбивый, стрессоустойчив, исполнительный. Есть опыт работы по укладке плитки, установке теплого пола, дверей, вытяжек, бойлеров, малярным (декоративная штукатурка) и сантехническим работам, сбора мебели (портфолио имеется). Быстро и качественно выполню любой мелкий бытовой ремонт. Также на высоком уровне владею набором и корректировкой текста, подготовкой документов. Есть опыт работы по наполнению сайтов, подготовки презентаций и корректировке фотографий.Пишите, звоните, буду рад помочь!', 1, 'Минск', NULL, 0, '94338000', '2015-04-08 22:17:36', 50000, NULL, NULL, NULL),
(435, 'Михаил ', 'Делягин', 'MTgwODE5OA==3Y7r0A6c', '69', 'e9mv15r1aqkop379p5kxr6ty.jpg', 'performer', 'male', '375294821234', 'Перевозки пассажирские по Минску и РБ. Микроавтобус Мерседес Спринтер 2010 г. Готов рассмотреть как разовую работу так и постоянное сотрудничество.', 1, 'Минск', NULL, 0, '124750800', '2015-04-08 22:19:31', 50000, NULL, NULL, NULL),
(436, 'Иван', 'Рудков', 'MTIzNA==3Y7r0A6c', '70', 'f5j6jrhuin6ex1tu8a28w3b.jpg', 'performer', 'male', '375296675565', 'Очень люблю чистоту. Есть опыт работы в клининговой компании. Если вам нужна генеральная или поддерживающая уборка (можно на постоянной основе) квартиры или офиса, мойка окон - обращайтесь. Буду рад вам помочь. Так же нравится раздавать листовки. Ответственный, порядочный. Не пью, не курю.', 1, 'Минск', NULL, 0, '598309200', '2015-04-08 22:21:28', 50000, NULL, NULL, NULL),
(437, '1', '1', 'MTIzNA==3Y7r0A6c', '1', 'no-image.png', 'customer', 'male', '3751', NULL, 0, 'v123', NULL, 0, '1262296800', '2015-04-09 08:45:54', 0, NULL, NULL, NULL),
(438, 'Виталий', 'Венский', 'MTQ2OTI3NzA33Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '332733600', '2015-04-09 14:56:54', 0, '146927707', NULL, NULL),
(439, 'Дарья', 'Селедцова', 'MTA0NzE4ODY13Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '538538400', '2015-04-09 17:42:00', 0, '104718865', NULL, NULL),
(440, 'Александрович', 'Руслан', 'MjYzNjczMTM03Y7r0A6c', '', 'no-image.png', 'customer', 'male', '375293838002', 'Высшее лингвистическое образование. Помогу с переводами с английского и французского языков. Напишу курсовые по истории, политологии.', 1, '', NULL, 0, '1428613200', '2015-04-09 20:05:54', 0, '263673134', NULL, NULL),
(441, 'Марк', 'Бондарев', 'MTM3NjczNzgx3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '854161200', '2015-04-09 20:51:42', 0, '137673781', NULL, NULL),
(442, 'Руслан', 'К.', 'MjAxNWt1a3Jhc2g=3Y7r0A6c', 'ruslankukrash@gmail.com', '20150514152124xnpst3bf9apoz2gogn0h6nwf0xo6dpatnij3h25u1d.png', 'performer', 'male', '375293838002', 'Переводы с английского и французского языков.', 1, 'Минск', NULL, 0, '606344400', '2015-04-09 20:59:55', 50000, NULL, NULL, NULL),
(443, 'Marina', 'Ushakova', 'ODk5NTk0MDczNDE3NzI33Y7r0A6c', 'marinka_love_music@tut.by', 'no-image.png', 'customer', 'female', NULL, NULL, 0, NULL, NULL, 0, NULL, '2015-04-10 07:07:08', 0, NULL, NULL, '899594073417727'),
(445, 'Слава', 'Титорович', 'MjM3NDE1MTc=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '675136800', '2015-04-12 08:34:35', 0, '23741517', NULL, NULL),
(446, 'Денис', 'гордиевич', 'MjYyNTkxOTA43Y7r0A6c', 'ragvalod666@yandex.ru', 'vmv2uel2kgbu2plk5dqrnsjgm5kgxr5zywyg3ymkm9q7t.jpg', 'performer', 'male', '375295696699', 'По образованию инженер-программист, крепкого телосложения , сильный и выносливый , работа у меня связана со съемками и поэтому часто бывают выходные в любой день недели , готов к любому физическому труду , есть опыт дорожного рабочего , слаботочника , грузчика , могу решить почти любую проблему с  программным обеспечением, работаю только на условиях оплаты за работу в тот же момент как ее выполнил !', 1, 'Минск', NULL, 0, '470350800', '2015-04-12 12:22:22', 50000, '262591908', NULL, NULL),
(447, 'Александр', 'Ярош', 'NzA5NDE5MDg5MTc5OTY43Y7r0A6c', 'aleks-90jam@mail.ru', 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, NULL, '2015-04-12 12:42:05', 0, NULL, NULL, '709419089179968'),
(448, 'Наталия', 'Шелемей', 'MDAwMDBvdGVwdXA=3Y7r0A6c', 'shelemei93@mail.ru', 'no-image.png', 'customer', 'female', '375447562055', NULL, 0, 'Минск', NULL, 0, '', '2015-04-12 17:30:15', 0, NULL, NULL, NULL),
(449, 'Masha', 'Gembitskaya', 'NDEwODc2MTY5MDM3Mjg53Y7r0A6c', 'kovboyka.by@mail.ru', 'nq1em72xh1a2snlgo2tpf.jpg', 'customer', 'female', '375292181240', NULL, 1, '', NULL, 0, '752364000', '2015-04-13 20:02:22', 0, '48843239', NULL, '410876169037289'),
(450, 'Петр', 'Шатило', 'MTgxNzYyOTI13Y7r0A6c', NULL, 'qjxyq6ogs1dtjlsoaq7w506oiyq33utz.jpg', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '600314400', '2015-04-14 06:48:18', 0, '181762925', NULL, NULL),
(451, 'Владимир', 'Чичко', '0YHRgNGI0YHRgNC70YkzMDA43Y7r0A6c', 'info@remontdorog.by', 'asf76w8x40n8k8xz23ft.png', 'customer', 'male', '375296626600', 'RemontDorog.by - это не те дорожники, которых Вы привыкли видеть на улицах Минска, "летящей" походкой пересекающих проезжую часть. Мы - это совершенно новое направление. Мы - это динамично развивающаяся компания, которая четко знает куда двигаться. Мы работаем по-новому. Мы привыкли считать деньги и поэтому максимально оптимизированы. \r\nМы делаем, а не делаем вид, что делаем. Мы даем гарантию 5 лет на все выполняемые работы.\r\nМы предлагаем лучшие цены в г. Минске. Мы работаем по государственным расценкам.\r\nМы ценим каждого клиента и индивидуально подходим к решению его проблем. Нам доверяют более 50 довольных клиентов, ведь мы знаем, что довольный клиент всегда позвонит еще.\r\nМы соблюдаем все технологические процессы при производстве работ. В 2014 году нами уложено более 20000 м.кв. асфальтобетона. \r\n', 1, 'Минск', NULL, 0, '652050000', '2015-04-14 08:00:30', 0, '95890579', NULL, NULL),
(452, '22', '2323', 'MTIzNA==3Y7r0A6c', '12323', '5q0ormt2r3tvnbr6c9j8ycv6u5xermod5n00qxklj8k2hx.jpg', 'customer', 'male', '375296675565', 'ывыфвыфвфваывмасм ыфвавфыа', 1, '2223', NULL, 0, '779576400', '2015-04-14 09:06:39', 0, NULL, NULL, NULL),
(455, 'Александр', 'Волов', 'NTIyODUxM25pbmE=3Y7r0A6c', 'ches3er@yandex.ru', '5qvzex4un0okc7m3s0edyj2lhbut265a9gnv.JPG', 'performer', 'male', '375295228513', '22 года, средне специальное образование в сфере строительства по специальности техник строитель, выполню отделочные работа, каменная кладка, а так же погрузочно-разгрузочные работа. Без вредных привычек, пунктуален и ответственен. В/у категории В. ', 1, 'Минск', NULL, 0, '730159200', '2015-04-14 11:59:39', 50000, '37227701', NULL, NULL),
(456, 'Переезды', 'Минск', 'MjkyNTUwNzQw3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, NULL, '2015-04-14 12:22:54', 0, '292550740', NULL, NULL);
INSERT INTO `users` (`id`, `username`, `surname`, `pass`, `email`, `image`, `role`, `sex`, `phonenumber`, `about`, `phone_verified`, `city`, `banned`, `half_banned`, `birth_date`, `registred`, `balance`, `vk`, `ok`, `fb`) VALUES
(457, 'Дмитрий', 'Перевоз', 'ZDM5NTM4NDRk3Y7r0A6c', 'dmitry310d@mail.ru', 'e1tg4ng0duji28dy7ma4qtah39y1rg8w0v4zpz9p.JPG', 'performer', 'male', '375257571959', 'Здравствуйте! Осуществляем грузоперевозки по Минску и РБ! Круглосуточно и без выходных! До 1,5 тонны, 9 м. куб! Адекватные цены! Скидки! Грузчики! Наличный и безналичный расчет! Возможно постоянное сотрудничество! \r\nЗвоните', 1, 'Минск', NULL, 0, '616795200', '2015-04-14 13:02:34', 50000, '300168393', NULL, NULL),
(458, 'Илья', 'Ващебрович', 'bWVyczAyNTA=3Y7r0A6c', 'start55@mail.ru', '4985ld13ttzt2m0aw9nerqhckb3xxb9gsvzjz.jpg', 'performer', 'male', '375292808955', 'ИП "Ващебрович И.Г." Грузоперевозки по Минску и РБ. Без выходных. До 1,5 тонн, до 9 м3.', 1, 'Минск', NULL, 0, '716590800', '2015-04-14 15:04:21', 35000, '27109655', NULL, NULL),
(459, 'Стас', 'Бондаревич', 'MzQzNTQ1OTY=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '698382000', '2015-04-14 15:08:15', 0, '34354596', NULL, NULL),
(460, 'Алексей', 'Ровба', 'MjYxOTM1NDE=3Y7r0A6c', 'rovba9955511@mail.ru', 'nj85xrn6krnh8q7dz7gppo8w7.jpg', 'performer', 'male', '375299955511', 'Есть водительское удостоверение категории В(стаж 2 года).Есть опыт работы курьером на авто(1 год).Физически крепкий,не привередливый,ответственный и исполнительный.Без в/п. Рассмотрю  все варианты заработка кроме интернета. Пишите звоните в любое время. ', 1, 'Минск', NULL, 0, '787960800', '2015-04-14 15:19:03', 50000, '23058637', NULL, NULL),
(461, 'Виталия', 'Малич', 'NTgyNDQ3MzA=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '753332400', '2015-04-14 16:59:37', 0, '58244730', NULL, NULL),
(462, 'Антон', 'Пильщиков', 'MTQ2NDY5ODYx3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '813898800', '2015-04-14 18:03:59', 0, '146469861', NULL, NULL),
(464, 'Юлия', 'Мироненко', 'NjA5NjQxMw==3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, NULL, NULL, 0, '1429049520', '2015-04-14 19:17:09', 0, '6096413', NULL, NULL),
(465, 'Стас', 'Мироненко', 'anVsa2EyMDEyODk=3Y7r0A6c', 'julka-star@mail.ru', '8e2yml6yj96cp1ism96kponcrvoftyofbzedax0d0y.JPG', 'performer', 'male', '375291326959', 'Занимаюсь отделочными работами:  укладка плитки, штукатурка, гипсокартон, декоративная штукатурка и т.д. \r\nОтветственный, исполнительный, порядочный. Если надо что то перевезти, завезти, могу помочь. ', 1, 'Гомель', NULL, 0, '372286800', '2015-04-14 19:36:31', 50000, NULL, '441460598357', NULL),
(467, 'Tatsiana', 'Vasilyeva', 'OTA0OTEwNjA2MjI2MDYx3Y7r0A6c', 'tanya_sistema@mail.ru', 'no-image.png', 'customer', 'female', NULL, NULL, 0, NULL, NULL, 0, NULL, '2015-04-15 06:20:43', 0, NULL, NULL, '904910606226061'),
(470, 'Сергей ', 'Зинзивер', 'MTIzNA==3Y7r0A6c', '123', 'no-image.png', 'customer', 'male', '375296675565', NULL, 1, 'Минск', NULL, 0, '555537600', '2015-04-15 13:08:53', 0, NULL, NULL, NULL),
(471, 'Анастасия', 'Балак', 'MTIzNA==3Y7r0A6c', '1234', 'no-image.png', 'customer', 'female', '375296675565', NULL, 1, 'Минск', NULL, 0, '495316800', '2015-04-15 13:36:29', 0, NULL, NULL, NULL),
(472, 'Дарья', 'Незабудкина', 'NTE2MDg5Nzc5MzU03Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '537588000', '2015-04-15 14:05:42', 0, NULL, '516089779354', NULL),
(473, 'Александр', 'Дикий', 'bW90b3JvbGExNDEy3Y7r0A6c', 'alexsandr.fred@gmail.com', '0z8mcqurmivyzpyty4wguyfx81hk7tipdldepwyzgfzo2.jpg', 'performer', 'male', '375293375112', 'Ответственный, исполнительный.', 1, 'Минск', NULL, 0, '708901200', '2015-04-15 19:40:02', 50000, '21233873', NULL, NULL),
(474, 'Дмитрий', 'Левданский', 'OTA0NzY1Nw==3Y7r0A6c', 'juronld@gmail.com', 'zvsep582pdc76gp3n1sxxu0n7p1yuaj1ivk39kaaif.jpg', 'customer', 'male', '375297053149', NULL, 1, 'Минск', NULL, 0, '625957200', '2015-04-16 19:31:08', 0, '9047657', NULL, NULL),
(475, 'Андрей', 'Граматунов', 'Mjg5ODYxNjQz3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '718167600', '2015-04-17 09:02:50', 0, '289861643', NULL, NULL),
(478, 'Тарас', 'Шкурдзе', 'MjcxNzU3OTIy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '439610400', '2015-04-18 13:32:28', 0, '271757922', NULL, NULL),
(479, 'Кирилл', 'Субота', 'aGVscHlvdTI1OA==3Y7r0A6c', 'botanica@tut.by', 'no-image.png', 'customer', 'male', '375297026420', NULL, 1, 'Минск', NULL, 0, '1262296800', '2015-04-18 15:55:51', 0, NULL, NULL, NULL),
(480, 'илья', 'федорович', 'c2Frb2xpazE5ODk=3Y7r0A6c', 'sakolik2104@gmail.com', 'rhi1nic961oht6g848b10pc11olrou7fgz6f87.jpg', 'performer', 'male', '375445925996', 'имеется в/у кат. В.,С. и личный авто.\r\nсвободен 24/7\r\nрассматриваю все варианты', 1, 'минск', NULL, 0, '609105600', '2015-04-20 12:49:29', 50000, NULL, NULL, '649459085185885'),
(481, 'Галина', 'Лучкова', 'MTQ5NzE2MTI=3Y7r0A6c', 'heliantuslg@mail.ru', 'wk81dz8bblxt5a2hkjpzx40gc9g9gh1s0hcx.jpg', 'customer', 'female', '375256057944', NULL, 1, '', NULL, 0, '607118400', '2015-04-21 17:49:38', 0, '14971612', NULL, NULL),
(482, 'Александр', 'Кучерявый', 'MjUwNdGE0Lg=3Y7r0A6c', 'al.troy93@yandex.ru', 'buaorr9xnyjwne5x2a76y98p74c1ww6p84f7.jpg', 'performer', 'male', '375447634220', 'Техник Электрик, Электромонтажник', 1, 'Минск', NULL, 0, '738363600', '2015-04-22 07:53:00', 50000, '166640638', NULL, NULL),
(483, 'Дмитрий', 'Колешко', 'NjE3ODEyODg=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Лунинец', NULL, 0, '875671200', '2015-04-22 08:20:36', 0, '61781288', NULL, NULL),
(484, 'Евгений', 'Малей', 'MTYzNjExMjM=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '591588000', '2015-04-22 10:14:58', 0, '16361123', NULL, NULL),
(485, 'Георгий', 'Кардашьян', 'MjgzNTk4NDY43Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, NULL, '2015-04-22 10:22:37', 0, '283598468', NULL, NULL),
(486, 'Гриша', 'Гришкевич', 'ODAyNTUwMDQ0Mjk=3Y7r0A6c', '', 'no-image.png', 'customer', 'male', '375255004429', NULL, 1, 'Минск', NULL, 0, '831070800', '2015-04-22 11:48:54', 0, '93493698', NULL, NULL),
(487, 'Павел', 'Щербович', 'NjI0MDA3ODI=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, '-2053975800', '2015-04-22 12:13:25', 0, '62400782', NULL, NULL),
(488, 'денис', 'ладутько', 'MTAwODE5ODgxOTg43Y7r0A6c', 'ladutko88@mail.ru', 'no-image.png', 'customer', 'male', '375297756364', NULL, 0, 'минск', NULL, 0, '587160000', '2015-04-22 12:39:54', 0, NULL, NULL, NULL),
(489, 'Сергей', 'Дормаш', 'MTM3NTMzNjE23Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '615344400', '2015-04-22 13:04:37', 0, '137533616', NULL, NULL),
(490, 'Даниил', 'Косенко', 'NjM5MjkxN2RhbmlsYQ==3Y7r0A6c', 'blackmace-danila@mail.ru', 'cbjw89iwxu1qnpqiv2v4y5kdnujr70s.jpg', 'performer', 'male', '375255308949', 'Работал грузчиком , пешим курьером, официантом, продавцом . Есть опыт работы на стройке .Общительный, весёлый , коммуникабельный , ответственный , пунктуальный.  По образованию повар . Готов выполнять любые работы ,  входящие в область моей компетенции . :)', 1, 'Минск', NULL, 0, '821397600', '2015-04-22 13:53:50', 50000, '33123965', NULL, NULL),
(491, 'Константин', 'Кленицкий', 'NTUyMDgyMw==3Y7r0A6c', 'kostia.minsk@mail.ru', 'qm8iph4g2kpxpemriyb9cfj4sh2u43k73nx32iuz.JPG', 'customer', 'male', '375296019176', NULL, 1, 'Минск', NULL, 0, '537051600', '2015-04-22 15:22:53', 0, NULL, NULL, NULL),
(492, 'Алексей', 'Котович', 'Z2FtYml0MDQwNDIwMTQ=3Y7r0A6c', 'nat_kozyr@mail.ru', 'qffxbuck0kzds90es09giptd11rm7t4524jz.jpg', 'performer', 'male', '375447019285', 'Исполнительный,порядочный,честный,образование высшее, без вредных привычек , в наличии авто,выполню ваши поручения быстро и качественно!', 1, 'Минск', NULL, 0, '583704000', '2015-04-22 15:31:23', 50000, '15822066', NULL, NULL),
(493, 'Николай', 'kalyansurovy', 'MTk4OTIwMDI=3Y7r0A6c', 'kalyansurovy@gmail.com', 'no-image.png', 'customer', 'male', '375293949420', NULL, 0, 'Минск', NULL, 0, '539298000', '2015-04-23 05:34:21', 0, NULL, NULL, NULL),
(494, 'слава', 'питкевич', 'ZGVuaXM33Y7r0A6c', 'pitkievich89@mail.ru', 'no-image.png', 'customer', 'male', '375298500849', NULL, 0, 'минск', NULL, 0, '607723200', '2015-04-23 05:35:22', 0, NULL, NULL, NULL),
(495, 'Слава', 'Питкевич', 'ZGVuaXM33Y7r0A6c', 'pitkievich89@mail.ru', 'no-image.png', 'customer', 'male', '375298500849', NULL, 1, 'минск', NULL, 0, '607809600', '2015-04-23 05:39:20', 0, '156264412', NULL, NULL),
(496, 'Нина', 'Волова', 'MTUyMjYyNDc=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Кобрин', NULL, 0, '809402400', '2015-04-23 08:58:15', 0, '15226247', NULL, NULL),
(497, 'Илья', 'Соколовский', 'ODY2NTkzMDA=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '609123600', '2015-04-23 11:43:51', 0, '86659300', NULL, NULL),
(498, 'Наталья', 'Белковская', 'MjA3MzA3MDU33Y7r0A6c', 'nata-belka@tut.by', 'hptunnuir8gkig6u1f6qt50rw.JPG', 'performer', 'female', '375296261321', 'Аккуратна, педантична, пунктуальна, ответственна.', 1, 'Минск', NULL, 0, '261003600', '2015-04-24 07:19:30', 50000, '207307057', NULL, NULL),
(499, 'Кирилл', 'Шпунтов', 'NzEyMTcxOTY=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '694926000', '2015-04-24 07:20:03', 0, '71217196', NULL, NULL),
(500, 'Анастасия', 'Антонюк', 'NjU5MDgzNTQ=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Волковыск', NULL, 0, '696740400', '2015-04-24 13:44:17', 0, '65908354', NULL, NULL),
(501, 'Анна', 'Потапенко', 'MjQyNTU0MDM=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, NULL, '2015-04-25 06:18:09', 0, '24255403', NULL, NULL),
(502, 'Михаил', 'Крупинский', 'MTAwOTU3NjI33Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Ляховичи', NULL, 0, '780894000', '2015-04-25 09:04:17', 0, '100957627', NULL, NULL),
(503, 'Dimit', 'Garkavy', 'NzU4NTE4MA==3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '584758800', '2015-04-26 10:59:32', 0, '7585180', NULL, NULL),
(504, 'Максим', 'Ганаков', 'bWFzaWExOTA03Y7r0A6c', 'm-17@mail.ru', 'no-image.png', 'customer', 'male', '375336341882', ' Предлагаю свои услуги по разработке сайтов.', 1, 'Минск', NULL, 0, '577396800', '2015-04-26 13:03:40', 0, NULL, NULL, NULL),
(505, '111', '111', 'MTIzNA==3Y7r0A6c', '111', '20150427131039dhx601kbfway2pjl129r0lzzwfj.png', 'customer', 'male', '375', NULL, 0, '1111', NULL, 0, '1262296800', '2015-04-27 10:05:34', 0, NULL, NULL, NULL),
(507, 'Дмитрий', 'Сетой', 'MjQ3MjIxNjc53Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '635652000', '2015-04-28 13:19:36', 0, '247221679', NULL, NULL),
(508, 'Илья', 'Сорока', 'MzAyMzQzOTg=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '754369200', '2015-04-29 09:15:51', 0, '30234398', NULL, NULL),
(509, 'Александр', 'Сачков', 'Mzc3NTI4MTk=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '810612000', '2015-04-29 09:31:00', 0, '37752819', NULL, NULL),
(510, 'Дарья', 'Макаревич', 'MTMxOTUzMTAy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '737690400', '2015-04-29 10:09:40', 0, '131953102', NULL, NULL),
(511, 'Илья', 'Рублевский', 'MTIzNA==3Y7r0A6c', '80', 'no-image.png', 'customer', 'male', '375294822222', NULL, 1, 'Минск', NULL, 0, '398376000', '2015-04-29 11:38:28', 0, NULL, NULL, NULL),
(512, 'Александр', 'Каплинский', 'ZXNhbGFza3ViYWlh3Y7r0A6c', 'axel190297@mail.ru', '20150429153215molde3v76sctzp5w29jysgecn2ouiuce2i9ski8gcpkrt.png', 'performer', 'male', '375447939007', 'Образование среднее, помогу в любой работе, ответственный, физически крепкий.', 1, 'Гомель', NULL, 0, '856389600', '2015-04-29 12:13:00', 50000, '70690800', NULL, NULL),
(513, 'Юрий', 'Космыков', 'MTQzMzg4MDE5OTc53Y7r0A6c', 'kosmykov.j@gmail.com ', 'no-image.png', 'customer', 'male', '375293261627', NULL, 1, 'Минск', NULL, 0, '861829200', '2015-04-29 12:29:03', 0, NULL, NULL, NULL),
(514, 'Юречко', 'Юлия', 'MzAzMDM3MTc53Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, NULL, '2015-04-29 13:45:45', 0, '303037179', NULL, NULL),
(515, 'Никита', 'Последний', 'MTU0OTIyMTM=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '646711200', '2015-04-29 16:45:57', 0, '15492213', NULL, NULL),
(516, 'Андрей', 'Шереметьев', 'MTU4NTExMzI=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, '579488400', '2015-04-29 20:56:33', 0, '15851132', NULL, NULL),
(517, 'Витя', 'воронков', 'ODY4Njg23Y7r0A6c', 'vlad.kunitskiy@list.ru', 'no-image.png', 'customer', 'male', '375447515143', NULL, 0, 'Минск', NULL, 0, '631141200', '2015-04-30 11:47:20', 0, NULL, NULL, NULL),
(518, 'Arni', 'Landong', 'MTIzNA==3Y7r0A6c', 'userrus@list.ru', 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, NULL, '2015-04-30 16:56:12', 0, NULL, NULL, '923398481017312'),
(519, 'Кристина', 'Тетерина', 'MTE2MzgyMzYz3Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', '375336054441', NULL, 1, NULL, NULL, 0, '780721200', '2015-04-30 19:00:07', 0, '116382363', NULL, NULL),
(520, 'Никита', 'Кулаковский', 'MjI2ODU4NDcy3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '852519600', '2015-05-03 16:20:38', 0, '226858472', NULL, NULL),
(521, 'Анна', 'Каменецкая', 'MjY2ODE4MDk03Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '-1580331000', '2015-05-03 18:28:12', 0, '266818094', NULL, NULL),
(522, 'Igor', 'Stepkin', 'MdC5MtGGM9GDNNC6NdC1ONGI3Y7r0A6c', 'qweshadowhunter@gmail.com', 'no-image.png', 'performer', 'male', '375255290314', 'Место учебы - БГУИР, ПОИТ, инженер-программист. \r\nИнтересует подработка во второй половине дня, также могу работать ночью.', 1, 'Minsk ', NULL, 0, '860706000', '2015-05-04 11:09:28', 50000, '251389026', NULL, NULL),
(523, 'Егор', 'Дронский', 'MTQ2MDIxMTk=3Y7r0A6c', 'ramsey17@yandex.ru', 'no-image.png', 'customer', 'male', '375293567139', NULL, 0, 'Минск', NULL, 0, '752450400', '2015-05-05 00:17:41', 0, NULL, NULL, NULL),
(524, 'Яна', 'Перникова', 'MTQ2NjcwMjQ33Y7r0A6c', NULL, 'no-image.png', 'customer', 'female', NULL, NULL, 0, 'Минск', NULL, 0, '699073200', '2015-05-05 11:13:18', 0, '146670247', NULL, NULL),
(525, 'Александр', 'Куц', 'MjQyNjczMzI13Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '744516000', '2015-05-05 12:14:40', 0, '242673325', NULL, NULL),
(526, 'Андрей', 'Волчек', 'cXdlcnR5MTIzNDU=3Y7r0A6c', 'andrew-volchek@mail.ru', 'no-image.png', 'customer', 'male', '375293238649', NULL, 0, 'Минск', NULL, 0, '774046800', '2015-05-05 14:08:50', 0, NULL, NULL, NULL),
(527, 'akimfm', 'якимович', 'MTIzMTIz3Y7r0A6c', 'akimfm@yandex.ru', 'no-image.png', 'customer', 'male', '375257041132', NULL, 0, 'минск', NULL, 0, '542926800', '2015-05-05 14:20:03', 0, NULL, NULL, NULL),
(528, 'Владимир', 'Никонович', 'NTY3OTE4MTQ=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '514515600', '2015-05-05 19:51:21', 0, '56791814', NULL, NULL),
(529, 'Юра', 'Гонюк', 'MTM4NDYwMzI53Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Микашевичи', NULL, 0, '845431200', '2015-05-06 20:29:59', 0, '138460329', NULL, NULL),
(530, 'Misha', 'Rezvinski', 'MTgyNTE4NDI43Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '727930800', '2015-05-10 11:42:44', 0, '182518428', NULL, NULL),
(531, 'Vladimir', '', 'MTIzNA==3Y7r0A6c', 'ironarnilu@gmail.com', 'no-image.png', 'customer', 'male', '375296675565', NULL, 1, NULL, NULL, 0, '1431460151', '2015-05-12 19:49:11', 0, NULL, NULL, NULL),
(532, 'Мiхась', 'Вiлькевiч', 'NTIzMw==3Y7r0A6c', 'asmaliaks@mail.ru', 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Мінск', NULL, 0, '392932800', '2015-05-13 05:04:58', 0, '169785307', NULL, NULL),
(533, 'Роман', 'Веремейчик', 'cm9tYTEyMzY1NDc4OQ==3Y7r0A6c', 'romaogyrec@mail.ru', 'no-image.png', 'customer', 'male', '375445337259', NULL, 1, 'Бобруйск', NULL, 0, '702421200', '2015-05-13 09:19:40', 0, '102323429', NULL, NULL),
(534, 'Корней', 'Капитула', 'OTY1MDU3Mjg=3Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '575258400', '2015-05-14 18:20:03', 0, '96505728', NULL, NULL),
(535, 'Вадим', 'Толстых', 'MTA4NTY3OTg=3Y7r0A6c', NULL, '201505171625189onhnd3u6in7ww7r09jsauu.png', 'customer', 'male', '375447762910', NULL, 1, NULL, NULL, 0, '549162000', '2015-05-17 13:23:52', 0, '10856798', NULL, NULL),
(536, 'Влад', '', 'bGY1Ym1rcw==3Y7r0A6c', '155', 'no-image.png', 'customer', 'male', '375296675565', NULL, 1, NULL, NULL, 0, '1431943045', '2015-05-18 09:57:25', 0, NULL, NULL, NULL),
(537, 'Илья', '', 'dTN6ODE0ZQ==3Y7r0A6c', '101@mail.ru', 'no-image.png', 'customer', 'male', '375297496120', NULL, 1, NULL, NULL, 0, '1431948412', '2015-05-18 11:26:52', 0, NULL, NULL, NULL),
(538, 'Артем', 'Раскиев', 'MTIzNA==3Y7r0A6c', '154', 'no-image.png', 'customer', 'male', '375294822222', NULL, 1, 'Минск', NULL, 0, '489096000', '2015-05-19 08:20:59', 0, NULL, NULL, NULL),
(539, 'Alexey', 'Bolbas', 'ODQ3MjQ3Mzc4NjczODIy3Y7r0A6c', 'alex_prikolist@tut.by', 'no-image.png', 'customer', 'male', NULL, NULL, 0, NULL, NULL, 0, NULL, '2015-05-19 12:34:39', 0, NULL, NULL, '847247378673822'),
(540, 'Андрей', 'Иванов', 'MTIzNA==3Y7r0A6c', '102', 'no-image.png', 'customer', 'male', '375294822222', NULL, 0, 'Могилев', NULL, 0, '664232400', '2015-05-20 12:06:03', 0, NULL, NULL, NULL),
(541, 'Артём', 'Тажеев', 'MjY4ODIxMjc=3Y7r0A6c', 'dezmond348@gmail.com', '201505232032458s9eqad04ensf499pcpnkizllmd56rwckt7n64c25.png', 'customer', 'male', '375293349010', '22 года.Физически крепкий.права кат. В,С.служба в армии,большой опыт в различных сферах', 1, 'Минск', NULL, 0, '729122400', '2015-05-23 17:29:21', 0, '26882127', NULL, NULL),
(542, 'HelpYou', 'By', 'MTgwODE5OA==3Y7r0A6c', 'mail@helpyou.by', '20150526094231b2qwqrm0bfifqjymb0wg8vbju1vft4ne.png', 'customer', 'male', '375296675565', 'Администрация сервиса  HelpYou.by', 1, 'Минск', NULL, 0, '1426712400', '2015-05-24 22:30:36', 0, NULL, NULL, NULL),
(543, 'Борис', 'Гантелин-Штангин', 'MjczNDM2MDA43Y7r0A6c', NULL, 'no-image.png', 'customer', 'male', NULL, NULL, 0, 'Минск', NULL, 0, '-86565600', '2015-05-26 07:34:47', 0, '273436008', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE IF NOT EXISTS `user_category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1525 ;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `user_id`, `category_id`) VALUES
(518, 169, 86),
(519, 169, 83),
(520, 169, 82),
(521, 169, 81),
(522, 169, 80),
(523, 169, 78),
(524, 169, 77),
(525, 169, 76),
(526, 169, 75),
(527, 169, 74),
(528, 169, 73),
(529, 169, 60),
(530, 169, 61),
(531, 169, 62),
(532, 169, 63),
(533, 169, 64),
(535, 168, 69),
(536, 168, 66),
(537, 168, 70),
(538, 169, 66),
(539, 169, 67),
(540, 169, 68),
(541, 169, 69),
(542, 169, 70),
(543, 169, 71),
(544, 169, 58),
(545, 169, 57),
(546, 169, 56),
(547, 169, 54),
(548, 169, 55),
(554, 169, 46),
(555, 169, 45),
(556, 169, 44),
(557, 169, 42),
(558, 169, 41),
(559, 169, 43),
(567, 168, 17),
(568, 168, 18),
(569, 168, 27),
(570, 168, 28),
(571, 168, 37),
(572, 168, 36),
(573, 168, 35),
(574, 168, 39),
(575, 168, 38),
(576, 165, 70),
(584, 169, 17),
(585, 169, 18),
(586, 169, 27),
(587, 169, 28),
(593, 169, 25),
(594, 169, 26),
(595, 169, 30),
(596, 169, 33),
(597, 169, 84),
(598, 169, 39),
(599, 169, 38),
(600, 169, 37),
(601, 169, 36),
(602, 169, 35),
(603, 168, 25),
(604, 183, 27),
(606, 183, 23),
(607, 183, 35),
(608, 183, 38),
(609, 183, 44),
(610, 183, 86),
(616, 184, 27),
(617, 184, 23),
(618, 184, 25),
(619, 184, 35),
(620, 184, 46),
(622, 168, 22),
(627, 199, 27),
(629, 199, 17),
(630, 199, 25),
(631, 199, 35),
(632, 199, 38),
(633, 199, 50),
(634, 199, 52),
(635, 199, 68),
(636, 199, 76),
(637, 200, 20),
(638, 200, 22),
(640, 200, 29),
(646, 205, 27),
(647, 205, 70),
(648, 205, 25),
(649, 205, 30),
(650, 205, 84),
(651, 216, 67),
(652, 222, 41),
(653, 222, 45),
(654, 222, 42),
(655, 223, 41),
(656, 223, 42),
(658, 223, 43),
(659, 223, 27),
(660, 223, 18),
(661, 223, 21),
(662, 223, 22),
(663, 223, 23),
(665, 230, 17),
(666, 230, 23),
(667, 230, 25),
(668, 230, 35),
(669, 230, 38),
(670, 230, 41),
(671, 230, 68),
(672, 230, 73),
(673, 230, 75),
(674, 230, 76),
(675, 230, 86),
(676, 230, 44),
(677, 230, 27),
(678, 248, 18),
(679, 248, 17),
(680, 248, 25),
(681, 248, 30),
(682, 248, 33),
(683, 252, 17),
(684, 252, 27),
(685, 252, 18),
(686, 252, 21),
(687, 252, 22),
(688, 252, 23),
(689, 252, 36),
(690, 252, 35),
(692, 258, 83),
(693, 261, 17),
(694, 261, 18),
(695, 261, 27),
(696, 261, 28),
(697, 261, 23),
(698, 261, 25),
(699, 261, 84),
(700, 261, 35),
(701, 261, 44),
(702, 261, 74),
(703, 168, 30),
(704, 168, 80),
(705, 182, 66),
(706, 182, 27),
(707, 182, 22),
(708, 182, 21),
(709, 182, 20),
(710, 282, 17),
(711, 282, 18),
(712, 282, 27),
(713, 282, 35),
(714, 282, 36),
(715, 282, 37),
(716, 282, 38),
(717, 282, 73),
(718, 282, 74),
(719, 282, 75),
(720, 282, 76),
(721, 282, 77),
(722, 282, 86),
(723, 286, 27),
(724, 286, 21),
(725, 286, 41),
(726, 286, 44),
(727, 286, 42),
(728, 286, 43),
(729, 286, 22),
(730, 286, 18),
(731, 289, 22),
(732, 289, 23),
(733, 289, 25),
(734, 289, 35),
(735, 289, 76),
(755, 301, 41),
(756, 310, 17),
(757, 310, 18),
(758, 310, 27),
(759, 310, 23),
(760, 310, 35),
(761, 310, 38),
(764, 310, 71),
(769, 241, 35),
(770, 241, 17),
(771, 241, 27),
(772, 241, 18),
(773, 241, 28),
(774, 241, 36),
(775, 241, 37),
(776, 241, 38),
(777, 241, 39),
(778, 241, 86),
(779, 317, 27),
(780, 317, 20),
(781, 317, 22),
(782, 317, 23),
(783, 320, 21),
(784, 321, 35),
(785, 321, 37),
(786, 321, 38),
(787, 321, 39),
(788, 321, 75),
(789, 321, 27),
(790, 245, 20),
(791, 323, 41),
(792, 326, 86),
(794, 270, 23),
(796, 270, 35),
(797, 270, 38),
(798, 270, 76),
(799, 329, 20),
(819, 328, 35),
(820, 328, 36),
(821, 328, 37),
(822, 328, 38),
(823, 328, 39),
(824, 328, 86),
(825, 346, 17),
(826, 346, 18),
(827, 346, 27),
(828, 346, 22),
(829, 346, 23),
(830, 346, 21),
(831, 346, 25),
(832, 346, 26),
(833, 346, 38),
(834, 346, 44),
(835, 346, 73),
(836, 346, 74),
(837, 346, 75),
(838, 346, 76),
(839, 350, 18),
(840, 350, 17),
(841, 350, 27),
(842, 350, 28),
(843, 350, 22),
(844, 350, 25),
(845, 350, 30),
(846, 350, 84),
(847, 350, 33),
(848, 352, 76),
(849, 352, 86),
(850, 352, 27),
(851, 352, 28),
(852, 352, 35),
(853, 352, 37),
(854, 352, 38),
(855, 352, 39),
(856, 352, 58),
(857, 352, 52),
(858, 353, 69),
(859, 353, 74),
(860, 353, 77),
(861, 353, 86),
(862, 353, 71),
(863, 352, 18),
(864, 353, 18),
(865, 353, 28),
(866, 353, 35),
(867, 353, 37),
(868, 353, 38),
(869, 353, 39),
(870, 353, 52),
(871, 353, 58),
(872, 352, 69),
(873, 352, 71),
(874, 352, 73),
(875, 353, 76),
(876, 353, 78),
(877, 352, 77),
(878, 352, 78),
(879, 354, 41),
(905, 358, 55),
(910, 362, 28),
(911, 362, 29),
(913, 362, 46),
(914, 362, 52),
(916, 309, 21),
(917, 309, 22),
(918, 309, 25),
(919, 309, 26),
(920, 309, 48),
(921, 309, 49),
(922, 309, 51),
(923, 360, 22),
(924, 360, 27),
(925, 360, 18),
(926, 360, 66),
(928, 363, 48),
(929, 365, 75),
(930, 365, 69),
(931, 359, 20),
(932, 359, 21),
(933, 367, 17),
(934, 367, 18),
(935, 367, 27),
(936, 367, 28),
(937, 367, 35),
(938, 367, 36),
(939, 367, 37),
(940, 367, 38),
(941, 367, 39),
(943, 367, 49),
(944, 367, 50),
(946, 367, 52),
(947, 367, 60),
(948, 367, 66),
(949, 367, 67),
(950, 367, 68),
(951, 367, 73),
(952, 367, 74),
(953, 367, 75),
(954, 367, 86),
(955, 436, 28),
(956, 436, 27),
(957, 436, 18),
(958, 436, 38),
(959, 436, 39),
(960, 436, 46),
(961, 436, 86),
(962, 368, 28),
(963, 368, 52),
(964, 368, 58),
(965, 368, 71),
(966, 368, 69),
(967, 368, 68),
(968, 368, 86),
(969, 369, 28),
(970, 369, 27),
(971, 369, 38),
(972, 369, 37),
(973, 369, 36),
(974, 369, 35),
(975, 369, 58),
(976, 369, 56),
(977, 369, 55),
(978, 369, 64),
(979, 369, 63),
(980, 369, 86),
(981, 370, 28),
(982, 370, 27),
(983, 370, 84),
(984, 370, 33),
(985, 370, 30),
(986, 370, 26),
(987, 370, 25),
(988, 370, 52),
(989, 370, 51),
(990, 370, 50),
(991, 370, 49),
(992, 370, 48),
(993, 370, 68),
(994, 370, 69),
(995, 370, 71),
(996, 370, 70),
(997, 370, 73),
(998, 370, 74),
(999, 370, 75),
(1000, 370, 86),
(1001, 372, 28),
(1002, 372, 27),
(1003, 372, 18),
(1004, 372, 23),
(1005, 372, 29),
(1006, 372, 86),
(1007, 372, 58),
(1008, 372, 78),
(1009, 372, 75),
(1010, 372, 73),
(1011, 372, 74),
(1012, 372, 76),
(1013, 372, 77),
(1014, 373, 28),
(1015, 373, 27),
(1016, 373, 18),
(1017, 373, 17),
(1018, 373, 23),
(1019, 373, 29),
(1020, 373, 39),
(1021, 373, 38),
(1022, 373, 37),
(1023, 373, 36),
(1024, 373, 35),
(1025, 373, 71),
(1026, 373, 68),
(1027, 373, 86),
(1028, 373, 78),
(1029, 373, 76),
(1030, 373, 75),
(1031, 373, 73),
(1032, 373, 74),
(1033, 351, 17),
(1034, 351, 18),
(1035, 351, 27),
(1036, 351, 28),
(1037, 351, 23),
(1038, 351, 29),
(1039, 351, 25),
(1040, 351, 26),
(1041, 351, 33),
(1042, 351, 35),
(1043, 351, 38),
(1044, 351, 39),
(1045, 351, 44),
(1046, 351, 46),
(1048, 351, 86),
(1049, 351, 58),
(1051, 351, 83),
(1052, 351, 80),
(1053, 351, 81),
(1054, 440, 52),
(1055, 440, 70),
(1056, 442, 52),
(1057, 309, 23),
(1058, 309, 20),
(1059, 309, 17),
(1060, 309, 27),
(1061, 309, 18),
(1062, 368, 27),
(1063, 368, 18),
(1064, 368, 17),
(1065, 369, 18),
(1066, 369, 17),
(1067, 406, 28),
(1068, 406, 29),
(1069, 406, 46),
(1070, 406, 86),
(1071, 407, 48),
(1072, 407, 54),
(1073, 407, 58),
(1074, 407, 86),
(1075, 408, 28),
(1076, 408, 29),
(1077, 408, 86),
(1078, 408, 78),
(1079, 409, 28),
(1080, 409, 27),
(1081, 409, 58),
(1082, 409, 56),
(1083, 409, 86),
(1084, 410, 28),
(1085, 410, 29),
(1086, 410, 39),
(1087, 410, 86),
(1088, 410, 78),
(1089, 410, 71),
(1090, 411, 28),
(1091, 411, 39),
(1092, 411, 33),
(1093, 411, 71),
(1094, 411, 78),
(1095, 411, 86),
(1096, 412, 28),
(1097, 412, 29),
(1098, 412, 39),
(1099, 412, 86),
(1100, 413, 28),
(1101, 413, 29),
(1102, 413, 84),
(1103, 413, 33),
(1104, 413, 71),
(1105, 413, 78),
(1106, 413, 83),
(1107, 413, 86),
(1108, 414, 28),
(1109, 414, 39),
(1110, 414, 64),
(1111, 414, 86),
(1112, 415, 28),
(1113, 415, 29),
(1114, 415, 46),
(1115, 415, 83),
(1116, 415, 86),
(1117, 416, 28),
(1118, 416, 29),
(1119, 416, 39),
(1120, 416, 86),
(1121, 416, 78),
(1122, 417, 29),
(1123, 417, 46),
(1124, 417, 83),
(1125, 417, 86),
(1126, 418, 28),
(1127, 418, 29),
(1128, 418, 30),
(1129, 418, 86),
(1130, 419, 39),
(1131, 419, 58),
(1132, 419, 64),
(1133, 419, 86),
(1134, 420, 39),
(1135, 420, 58),
(1136, 420, 64),
(1137, 420, 86),
(1138, 421, 28),
(1139, 421, 29),
(1140, 421, 39),
(1141, 421, 46),
(1142, 421, 86),
(1143, 422, 28),
(1144, 422, 39),
(1145, 422, 58),
(1146, 422, 86),
(1147, 422, 78),
(1148, 374, 28),
(1149, 374, 29),
(1150, 374, 39),
(1151, 374, 46),
(1152, 374, 86),
(1153, 374, 83),
(1154, 424, 28),
(1155, 424, 29),
(1156, 424, 86),
(1157, 424, 78),
(1164, 426, 37),
(1165, 426, 28),
(1166, 426, 71),
(1167, 426, 86),
(1168, 426, 78),
(1169, 427, 28),
(1170, 427, 29),
(1171, 427, 39),
(1172, 427, 46),
(1173, 427, 86),
(1174, 427, 83),
(1175, 428, 28),
(1176, 428, 39),
(1177, 428, 58),
(1178, 428, 64),
(1179, 428, 86),
(1180, 429, 28),
(1181, 429, 29),
(1182, 429, 84),
(1183, 429, 33),
(1184, 429, 39),
(1185, 429, 86),
(1186, 429, 83),
(1187, 429, 78),
(1188, 430, 28),
(1189, 430, 39),
(1191, 430, 58),
(1192, 430, 71),
(1193, 430, 78),
(1194, 430, 86),
(1195, 431, 39),
(1196, 431, 58),
(1197, 431, 86),
(1198, 432, 28),
(1199, 432, 29),
(1200, 432, 39),
(1201, 432, 46),
(1202, 432, 86),
(1203, 433, 29),
(1204, 433, 46),
(1205, 433, 83),
(1206, 433, 86),
(1207, 434, 46),
(1208, 434, 83),
(1209, 434, 86),
(1210, 435, 29),
(1211, 435, 39),
(1212, 435, 46),
(1213, 435, 83),
(1214, 375, 28),
(1215, 375, 52),
(1216, 375, 58),
(1217, 375, 78),
(1218, 375, 86),
(1219, 376, 28),
(1220, 376, 39),
(1221, 376, 46),
(1222, 376, 58),
(1223, 376, 86),
(1224, 376, 83),
(1225, 376, 78),
(1226, 377, 28),
(1227, 377, 39),
(1228, 377, 86),
(1229, 378, 28),
(1230, 378, 39),
(1231, 378, 58),
(1232, 378, 86),
(1233, 378, 78),
(1234, 379, 28),
(1235, 379, 29),
(1236, 379, 39),
(1237, 379, 46),
(1238, 379, 83),
(1239, 379, 86),
(1240, 380, 28),
(1241, 380, 39),
(1242, 380, 86),
(1243, 381, 71),
(1244, 381, 78),
(1245, 381, 86),
(1246, 382, 28),
(1247, 382, 86),
(1248, 382, 83),
(1249, 383, 35),
(1250, 383, 41),
(1251, 383, 83),
(1252, 384, 27),
(1254, 384, 78),
(1255, 384, 71),
(1256, 384, 86),
(1257, 385, 29),
(1258, 385, 46),
(1259, 385, 86),
(1260, 386, 28),
(1261, 386, 29),
(1262, 386, 39),
(1263, 386, 46),
(1264, 386, 86),
(1265, 387, 58),
(1266, 387, 71),
(1267, 387, 86),
(1268, 388, 28),
(1269, 388, 29),
(1270, 388, 39),
(1271, 388, 46),
(1272, 388, 86),
(1273, 389, 28),
(1274, 389, 29),
(1275, 389, 86),
(1276, 446, 17),
(1277, 446, 18),
(1278, 446, 27),
(1279, 446, 23),
(1280, 446, 25),
(1281, 446, 84),
(1282, 446, 35),
(1283, 446, 44),
(1285, 169, 20),
(1286, 169, 21),
(1287, 169, 22),
(1288, 169, 23),
(1289, 169, 29),
(1290, 169, 52),
(1291, 169, 51),
(1292, 169, 50),
(1293, 169, 49),
(1294, 169, 48),
(1295, 458, 20),
(1296, 188, 27),
(1297, 188, 20),
(1298, 188, 23),
(1299, 188, 22),
(1300, 188, 44),
(1301, 460, 17),
(1302, 460, 18),
(1303, 460, 27),
(1304, 460, 28),
(1305, 460, 20),
(1306, 460, 21),
(1307, 460, 22),
(1308, 460, 23),
(1309, 460, 29),
(1310, 460, 38),
(1311, 460, 39),
(1312, 460, 44),
(1313, 460, 41),
(1314, 460, 45),
(1315, 460, 46),
(1316, 460, 58),
(1317, 460, 64),
(1318, 460, 86),
(1319, 455, 27),
(1320, 455, 22),
(1321, 455, 23),
(1322, 455, 29),
(1323, 455, 41),
(1324, 465, 27),
(1325, 465, 18),
(1326, 465, 41),
(1327, 457, 20),
(1328, 457, 22),
(1329, 457, 23),
(1330, 421, 20),
(1331, 421, 22),
(1332, 429, 17),
(1333, 429, 18),
(1334, 429, 27),
(1335, 429, 20),
(1336, 429, 21),
(1337, 429, 22),
(1338, 429, 23),
(1339, 386, 23),
(1340, 386, 22),
(1341, 386, 21),
(1342, 386, 20),
(1343, 368, 20),
(1344, 480, 17),
(1345, 480, 27),
(1346, 480, 18),
(1347, 480, 28),
(1348, 480, 21),
(1349, 480, 22),
(1350, 480, 23),
(1351, 480, 29),
(1352, 480, 74),
(1353, 480, 77),
(1354, 480, 76),
(1356, 422, 21),
(1357, 168, 21),
(1358, 425, 28),
(1359, 425, 84),
(1360, 425, 29),
(1361, 425, 25),
(1362, 425, 26),
(1363, 425, 30),
(1364, 425, 33),
(1365, 168, 86),
(1366, 435, 18),
(1367, 435, 21),
(1368, 435, 22),
(1369, 482, 23),
(1371, 473, 17),
(1372, 473, 27),
(1373, 473, 21),
(1374, 473, 22),
(1376, 168, 45),
(1377, 490, 17),
(1378, 490, 18),
(1379, 490, 27),
(1380, 490, 28),
(1381, 490, 23),
(1382, 490, 29),
(1383, 490, 35),
(1384, 490, 39),
(1385, 490, 58),
(1386, 490, 86),
(1387, 490, 38),
(1388, 490, 36),
(1390, 490, 46),
(1391, 492, 17),
(1392, 492, 18),
(1393, 492, 27),
(1394, 492, 22),
(1395, 492, 25),
(1396, 492, 35),
(1398, 492, 44),
(1400, 492, 21),
(1401, 492, 84),
(1402, 433, 44),
(1403, 415, 42),
(1404, 415, 43),
(1405, 415, 44),
(1406, 415, 45),
(1407, 17, 17),
(1408, 168, 20),
(1409, 168, 29),
(1410, 168, 23),
(1411, 168, 26),
(1412, 168, 33),
(1413, 168, 84),
(1414, 168, 41),
(1415, 168, 42),
(1416, 168, 43),
(1417, 168, 44),
(1418, 168, 46),
(1419, 168, 48),
(1420, 168, 49),
(1421, 168, 50),
(1422, 168, 51),
(1423, 168, 52),
(1424, 168, 54),
(1425, 168, 55),
(1426, 168, 57),
(1427, 168, 58),
(1428, 168, 56),
(1429, 168, 60),
(1430, 168, 61),
(1432, 168, 62),
(1433, 168, 63),
(1434, 168, 64),
(1435, 168, 67),
(1436, 168, 68),
(1437, 168, 73),
(1439, 168, 75),
(1440, 168, 74),
(1441, 168, 78),
(1442, 168, 76),
(1443, 168, 77),
(1444, 168, 82),
(1445, 168, 81),
(1446, 168, 83),
(1447, 498, 17),
(1448, 498, 18),
(1449, 498, 27),
(1450, 498, 35),
(1451, 498, 38),
(1452, 498, 66),
(1453, 351, 20),
(1454, 351, 21),
(1455, 351, 22),
(1456, 351, 30),
(1457, 351, 84),
(1459, 351, 36),
(1460, 351, 37),
(1461, 351, 41),
(1462, 351, 42),
(1463, 351, 43),
(1464, 351, 45),
(1465, 351, 48),
(1466, 351, 49),
(1467, 351, 50),
(1468, 351, 51),
(1469, 351, 52),
(1470, 351, 54),
(1471, 351, 56),
(1472, 351, 55),
(1473, 351, 57),
(1474, 351, 61),
(1475, 351, 60),
(1476, 351, 62),
(1477, 351, 63),
(1478, 351, 64),
(1479, 351, 66),
(1480, 351, 67),
(1482, 351, 68),
(1483, 351, 69),
(1484, 351, 70),
(1485, 351, 71),
(1486, 351, 73),
(1487, 351, 74),
(1488, 351, 75),
(1489, 351, 76),
(1490, 351, 77),
(1491, 351, 78),
(1492, 351, 82),
(1494, 512, 17),
(1496, 512, 27),
(1498, 512, 23),
(1499, 512, 25),
(1500, 512, 41),
(1501, 512, 68),
(1504, 413, 27),
(1505, 413, 20),
(1506, 413, 21),
(1507, 413, 23),
(1508, 413, 22),
(1509, 380, 58),
(1511, 522, 25),
(1512, 522, 84),
(1513, 522, 35),
(1514, 522, 50),
(1515, 522, 58),
(1516, 522, 70),
(1517, 522, 86),
(1518, 522, 77),
(1519, 415, 21),
(1520, 415, 48),
(1521, 415, 49),
(1522, 415, 50),
(1523, 415, 51),
(1524, 415, 52);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_notification`
--
ALTER TABLE `admin_notification`
  ADD CONSTRAINT `admin_notification_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_notification_ibfk_2` FOREIGN KEY (`user_from`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `balance_reserve`
--
ALTER TABLE `balance_reserve`
  ADD CONSTRAINT `balance_reserve_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `balance_reserve_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_from`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`user_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`user_from`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_4` FOREIGN KEY (`user_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_5` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `performer_application`
--
ALTER TABLE `performer_application`
  ADD CONSTRAINT `performer_application_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone_verification`
--
ALTER TABLE `phone_verification`
  ADD CONSTRAINT `phone_verification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`performer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_images`
--
ALTER TABLE `task_images`
  ADD CONSTRAINT `task_images_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_preposition`
--
ALTER TABLE `task_preposition`
  ADD CONSTRAINT `task_preposition_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_preposition_ibfk_2` FOREIGN KEY (`performer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_category`
--
ALTER TABLE `user_category`
  ADD CONSTRAINT `user_category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
