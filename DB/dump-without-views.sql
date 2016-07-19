-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Lug 19, 2016 alle 16:19
-- Versione del server: 5.6.29-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_hypprojectwebsite`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `assistance`
--

CREATE TABLE IF NOT EXISTS `assistance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `category` varchar(45) NOT NULL,
  `faq` tinyint(4) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `assistance`
--

INSERT INTO `assistance` (`id`, `title`, `category`, `faq`, `content`) VALUES
(1, 'Configure an Email account on your smartphone', 'technical-support', 0, '<p>Follow the following steps</p>\n<ol>\n    <li>Go to System Settings</li>\n    <li>Open "Email" submenu</li>\n    <li>Select "Setup Wizard"</li>\n    <li>Follow the steps of the wizard</li>\n</ol>\n\nIn case of problems, <a href="?page=contact-us">contact us</a>.'),
(2, 'Use your mobile phone as modem', 'technical-support', 1, '<ol>\n    <li>Ensure the TIM Mobile Hotspot feature is activated in your Settings or Manage Connections area.</li>\n    <li>Open the App Tray and select "Mobile Hotspot."</li>\n    <li>Tap the Mobile Hotspot checkbox.</li>\n    <li>In a few moments, an icon will appear in the notifications panel showing the availability of your new hotspot.</li>\n    <li>Computers and other connected devices can now connect to this hotspot through Wi-Fi and share your smartphone''s data connection.</li>\n</ol>'),
(3, 'Change your mobile plan', 'line-management', 0, '<p>To change your mobile plan, you simply have to:</p>\n<ul>\n    <li>Call 231932 from your line</li>\n    <li>Follow the instructions</li>\n</ul>\n<p>You should receive a confirmation via SMS immediately.</p>\n<p>It will take at least 24h for your request to be processed completely. You''ll receive another SMS when the request has been processed completely.</p>'),
(4, 'Disable your Netflix subscription', 'digital-services', 1, '<p>To change your mobile plan, you simply have to:</p>\n<ul>\n    <li>Call 231932 from your line</li>\n    <li>Follow the instructions</li>\n</ul>\n<p>You should receive a confirmation via SMS immediately.</p>\n<p>It will take at least 24h for your request to be processed completely. You''ll receive another SMS when the request has been processed completely.</p>'),
(5, 'Find the current credit of your line', 'bills', 1, '<p>Send an SMS to 12312432 with the following content</p>\n<pre>credit</pre>\n<p>You''ll immediately receive an SMS reporting your current credit.</p>');

-- --------------------------------------------------------

--
-- Struttura della tabella `assistance_for`
--

CREATE TABLE IF NOT EXISTS `assistance_for` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_assistance` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `category_product` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dump dei dati per la tabella `assistance_for`
--

INSERT INTO `assistance_for` (`id`, `id_assistance`, `id_product`, `category_product`) VALUES
(1, 1, 1, 'smartphone'),
(2, 1, 2, 'smartphone'),
(3, 1, 3, 'smartphone'),
(4, 1, 4, 'smartphone'),
(5, 4, 1, 'smartlife'),
(6, 1, 5, 'smartphone'),
(7, 1, 6, 'smartphone'),
(8, 1, 7, 'smartphone'),
(9, 1, 8, 'smartphone'),
(10, 1, 9, 'smartphone'),
(11, 4, 10, 'smartphone'),
(12, 4, 11, 'smartphone'),
(13, 4, 12, 'smartphone'),
(14, 3, 13, 'smartphone'),
(15, 3, 14, 'smartphone'),
(16, 1, 15, 'tablet'),
(17, 1, 15, 'tablet'),
(18, 2, 1, 'smartphone'),
(19, 3, 2, 'smartphone'),
(20, 5, 3, 'smartphone'),
(21, 3, 5, 'smartphone'),
(22, 3, 10, 'smartphone'),
(23, 5, 11, 'smartphone'),
(24, 5, 6, 'smartphone'),
(25, 5, 2, 'smartphone'),
(26, 4, 3, 'smartphone'),
(27, 4, 10, 'smartphone'),
(28, 4, 16, 'tablet');

-- --------------------------------------------------------

--
-- Struttura della tabella `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dump dei dati per la tabella `devices`
--

INSERT INTO `devices` (`id`, `manufacturer`, `name`, `price`) VALUES
(1, 'Apple', 'iPhone SE', 509.90),
(2, 'Samsung', 'Galaxy S7', 729.90),
(3, 'Sony', 'Xperia X', 629.90),
(4, 'Samsung', 'Galaxy J5', 229.90),
(5, 'LG', 'K8', 179.90),
(6, 'Huawei', 'P9 Plus', 749.90),
(7, 'LG', 'G5', 699.90),
(8, 'Microsoft', 'LUMIA 950', 499.90),
(9, 'Samsung', 'Galaxy Grand', 179.90),
(10, 'Huawei', 'P8 lite smart', 199.90),
(11, 'Microsoft', 'LUMIA 950 XL', 699.90),
(12, 'LG', 'X screen', 249.90),
(13, 'LG', 'Nexus 5', 449.90),
(14, 'Apple', 'iPhone 5s', 329.90),
(15, 'Apple', 'iPad Pro', 1199.90),
(16, 'Samsung', 'Galaxy Tab S2 9.7 VE', 549.90);

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `content` text,
  `summary` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `summary`) VALUES
(1, 'Telecom Italia leader of the TLC sector', '<p>The best on-line corporate communication in the Webranking Europe 2015 ranking.</p>\n\n<p>Telecom Italia is absolute leader in Europe in the TLC sector for digital corporate communication in the Webranking Europe 2015 ranking drawn up by Comprend in collaboration with Lundquist.</p>\n\n<p>With a score of 86.6 out of 100, Telecom Italia also takes second place in the general ranking that assesses the 500 largest European companies in terms of market capitalisation.</p>\n\n<p>The research, now at its nineteenth edition, analysed and rewarded the quality of on-line financial and institutional communication - on the web and social media - through 100 objective criteria relative to aspects of contents and technology, updated each year on the basis of stakeholder needs (analysts, investors, journalists and communication managers) from all over Europe.</p>\n\n<p>Telecom Italia has been appreciated for the new methods used to present contents, through a more extensive use of infographics and videos to support the business strategy, storytelling intended for professionals and the general public and integrated communication between the institutional website and social media. Telecom Italia has also been recognised as our country''s first company to abandon the interactive financial statements as a replica of the annual financial statements, in order to create a narrative type digital version.</p>\n\n<p>Telecom Italia sees this as a significant confirmation of its continued commitment to excellence in communication and a strengthening of its digital reputation.</p> <img src="img/pages/news/1-001.png" alt="News 1">', 'The best on-line corporate communication in the Webranking Europe 2015 ranking.'),
(2, 'Telecom Italia on the podium for web and social communication', '<p>It ranks second in the prestigious Webranking by Comprend for best online corporate communication and its accounts are among the most popular on Twitter according to the Digital Close to Media study.</p>\n\n<p>The data of two studies on the web and social communication of large companies were published almost simultaneously and Telecom Italia got excellent results in both.</p>\n\n<p>With 86.6 points out of 100 it ranks second in the 14th Italian Edition of the 2015 Webranking by Comprend, in collaboration with Lundquist, that has verified the quality of online financial and corporate communication starting from a sample of 105 companies, which further decreased to 70, in the light of the information on their websites. As a matter of fact, this year the Webranking has focused particularly on the information most requested by stakeholders: strategy, growth drivers, market position, geographical presence, sustainability data. A meticulous, in-depth and compelling analysis, which aims to promote greater transparency and a stronger digital culture within companies.</p>\n\n<p>As to the world of social networks, the new Digital Close to Media study, conducted on 40 companies officially listed on the Milan Stock Exchange, indicates Telecom Italia as the top company for corporate use on Facebook and on Twitter with 516,600 "Likes" on FB and 162,975 "followers" on the second social network. Among the 5 most popular accounts on Twitter are those of CEO Marco Patuano and Chairman Giuseppe Recchi.</p>\n\n<p>Beyond the figures, the results mark a step in the company''s long journey marked by dedication and hard work because, to quote the words of the Webranking executive summary, "to achieve excellence hard work and commitment are needed".</p> <img src="img/pages/news/2-001.png" alt="News 2">', 'It ranks second in the prestigious Webranking by Comprend for best online corporate communication and its accounts are among the most popular on Twitter according to the Digital Close to Media study.');

-- --------------------------------------------------------

--
-- Struttura della tabella `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`) VALUES
(0, 'who-we-are', '<h3>The trade idea and alpha capture experts</h3>\r\n\r\n<h4>TIM Group Mission</h4>\r\n<h5>Our mission – to provide valuable market insight which is measured and rewarded</h5>\r\n\r\n<p>TIM Group has a two-fold mission: (1) To provide investors with insights which help them earn market-beating returns, and (2) to help the originators of market insight to earn incremental revenue.</p>\r\n\r\n<p>As shown in the diagram below, we fulfil this mission by sourcing market insight from sell-side brokers and other sources, and adding value through our own analytical expertise. We deliver the resulting analysis to investors. We encourage investors to reward the sell-side contributors for their insight. We measure the value of the insights provided to help ensure a fair reward for contributors.</p>\r\n\r\n<p>By fulfilling our mission successfully, we contribute to the success of investors, sell-side contributors, and the financial markets:</p>\r\n\r\n<ol>\r\n    <li>We help investors make good investment and trading decisions by applying the market insight we provide.</li>\r\n    <li>We help sell-side brokers (and other providers) earn incremental revenue from the investors who receive market insight. We measure the value of the market insight and encourage buy-side investors to give commensurate rewards.</li>\r\n    <li>We contribute to the health of the financial markets, because markets are healthier when insightful analysis is recognised and rewarded.</li>\r\n</ol>\r\n\r\n<p>We fulfil our mission today primarily by distributing equity-based trade ideas and market indicators. We will further fulfil our mission in the future by tapping new sources of market insight, supplying our analysis to new audiences, and extending the reach of our analysis to include additional asset classes.</p>\r\n'),
(1, 'the-group', '<p>We develop new generation infrastructures with the goal of ensuring that around 84% of Italian houses have coverage via the new fixed ultra-broadband network and 98% of the population via  the new mobile network by the end of 2018. By the end of March 2016, the fixed network has already reached 45% of the houses and the mobile network 92% of the population. As we believe digital technologies are the basis for a smart, sustainable and inclusive growth.</p>\n\n    <p>To simplify the daily life there are new solutions: electronic payment systems, smart homes, electronic medical records and certified electronic mail in the healthcare and government sectors, for the schools  interactive multimedia whiteboards and web-based learning environments. For businesses, advanced platforms for cloud computing for the virtualization of applications and infrastructures, a vast selection of applications for storing and managing data or controlling energy consumption, products and software to enhance the use of digital signatures.</p>\n\n    <p>For everyone, digital technology means to be always connected and access services and digital  content - games, e-books, music and films, all constantly enriched with premium contents - with ease and safety; all of this seamlessly on smartphones, tablets or other devices.</p>\n\n    <p>Through the TIM Foundation we promote a vision of innovation and technology as social enablers, supporting projects in the fields of  digital education and cultural innovation. As a result of the company’s social and environmental commitment, we have been included among the most important and selective stock market Sustainability indexes worldwide, for the last eleven years.</p>'),
(2, 'the-group-governance', '<p>The system of corporate governance adopted by Telecom Italia, articulated according to the traditional method, is focused on the role of leadership in the strategic decision taken by the Board of Directors, on the transparency of management choices, both within the company as well as in respect to the market, on the efficiency and effectiveness of the internal control system, on the strict discipline of potential conflicts of interest and on firm principles of conduct for transactions with related parties.</p>\n\n<p>This system, which was designed and built in light of the principles elaborated by the Committee for the Corporate Governance of the Italian Stock Exchange and the best international practices, has been implemented with the adoption of codes, principles and procedures which characterize the activities of the different organizational and operational components, which are constantly subject to verification and update, to respond effectively to the evolution of the regulatory situation and to the mutation of operational practices.</p>\n\n<p>We are convinced that a good corporate governance can and has to always identify new margins for improvement, in light of external stimuli and constraints, as well as application experience.</p>'),
(3, 'the-group-for-investors', '<h4>Telecom Italia''s most relevant economic and financial events.</h4>\n<table class="table table-bordered">\n    <tr><td style="width: 100px"><strong>7 August</strong></td><td>Telecom Italia: Board of Directors examines and approves the Interim Report on Operations as of 30 June 2015</td></tr>\n    <tr><td><strong>20 May</strong></td><td>Telecom Italia Annual General Meeting held</td></tr>\n    <tr><td><strong>8 May</strong></td><td>Telecom Italia: Board of Directors examines and approves the Interim Report on Operations as of 31 March 2015</td></tr>\n    <tr><td><strong>19 March</strong></td><td>Telecom Italia: FY 2014 results approved</td></tr>\n    <tr><td><strong>20 February</strong></td><td>Telecom Italia Group: 2015-2017 strategic plan approved, cumulative investments planned totalling around 14.5 billion euros over the three year period.</td></tr>\n    <tr><td><strong>20 February</strong></td><td>Telecom Italia: preliminary results at 31 December 2014 approved</td></tr>\n</table>\n\n<h4>Other corporate operations</h4>\n<table class="table table-bordered">\n    <tr><td style="width: 100px"><strong>18 June</strong></td><td>Telecom italia: sale of stake in Infrastrutture Wireless Italiane S.p.A. successfully concluded</td></tr>\n    <tr><td><strong>21 May</strong></td><td>Telecom italia announces initial public offering of up to 40% of INWIT</td></tr>\n    <tr><td><strong>27 March</strong></td><td>Telecom Italia: request for supplementation of the agenda for the shareholders'' meeting of 20 May. Suspension of the administrative rights of Telefónica in Telecom Italia after the break-up of Telco</td></tr>\n    <tr><td><strong>19 March</strong></td><td>Merger by incorporation of Telecom Italia Media in Telecom Italia approved</td></tr>\n    <tr><td><strong>9 January</strong></td><td>Telecom Italia and Acotel Group: agreement signed on the transfer of noverca''s 170 thousand consumer customers to TIM</td></tr>\n</table>'),
(4, 'the-group-business-and-market', '<p>Our organisation, in line with the evolution of the sector business models and market and technological trends, is shifting towards a “Digital Telco & Platform Company” model based on innovative infrastructure and an excellent  customer service,increasingly aimed at disseminating premium services and digital content within a customisable platform, accessible anywhere and on any device.</p>\r\n\r\n<p>Our strategic markets are Italy and Brasil. Operations are conducted by dedicate Business Units:  the Domestic Business Unit -  it includes fixed and mobile voce and data services for retail customers and wholesale operators, as well as  international wholesale services (Telecom Italia Sparkle ) and IT solutions (Olivetti) -  and the Brazil Busines Unit (TIM Brasil).</p>\r\n\r\n<p>In  Italy commercial management of the retail customers - namely private (individual consumers and families) and business customers - is based on these organizational drivers:</p>\r\n\r\n<ul>\r\n    <li>guaranteeing the end-to-end accountability of the marketing, sales and post-sales processes for each customer segment,</li>\r\n    <li>encouraging the development of integrated “customer centric” offers and the focus on digital market services</li>\r\n    <li>creating synergies between commercial channels to increase the efficiency and effectiveness of the multichannel model</li>\r\n    <li>encouraging the development of “platform based” services expanding TIM''s offer portfolio</li>\r\n    <li>paying attention to multinational customers in order to develop international connectivity.</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Struttura della tabella `product_sales_view`
--

CREATE TABLE IF NOT EXISTS `product_sales_view` (
  `id` int(11) NOT NULL,
  `manufacturer` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `os` varchar(45) NOT NULL,
  `description` text,
  `discounted_price` decimal(10,0) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `product_sales_view`
--

INSERT INTO `product_sales_view` (`id`, `manufacturer`, `name`, `price`, `os`, `description`, `discounted_price`, `category`) VALUES
(1, 'Apple', 'iPhone SE', 509.90, 'iOS', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', 123, 'smartphone'),
(6, 'Huawei', 'P9 Plus', 749.90, 'Android', 'The most shareable moments tend to be the hardest to capture. To help you get the shots you want, we made our flagship camera faster and smarter than ever – with quicker response times and even more intelligent focus. Xperia X’s Smart Capture technology helps you banish blur. Enabled by Sony’s new Predictive Hybrid Autofocus, Smart Capture lets you choose a person or object and automatically track it. Now your subject stays in focus, even when moving, and the most unpredictable scenes come out in the sharpest detail.', 119, 'smartphone'),
(15, 'Apple', 'iPad Pro', 1199.90, 'iOS', 'iPad Pro is more than the next generation of ', 432, 'tablet');

-- --------------------------------------------------------

--
-- Struttura della tabella `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL,
  `discounted_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `sales`
--

INSERT INTO `sales` (`id`, `discounted_price`) VALUES
(1, 123),
(6, 119),
(15, 432);

-- --------------------------------------------------------

--
-- Struttura della tabella `sales_view`
--

CREATE TABLE IF NOT EXISTS `sales_view` (
  `id` int(11) NOT NULL,
  `manufacturer` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `os` varchar(45) NOT NULL,
  `description` text,
  `discounted_price` decimal(10,0) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `smartlife`
--

CREATE TABLE IF NOT EXISTS `smartlife` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(45) NOT NULL,
  `description_long` text,
  `payment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `smartlife`
--

INSERT INTO `smartlife` (`id`, `name`, `description`, `category`, `description_long`, `payment`) VALUES
(1, 'Netflix', 'Enjoy your favorite shows with our special Netflix options.', 'tv-entertainment', 'Netflix is a subscription-based film and television program rental service that offers media to subscribers via Internet streaming.\nThanks to our mobile service, Netflix allows you to watch your favorite shows and movies wherever you are and whenever you want.', 'The monthly cost is automatically detracted from your credit at the beginning of every month.'),
(2, 'TIM Music', 'Enjoy your favorite songs wherever you want and whenever you want', 'tv-entertainment', 'TIM Music is a music streaming service that allows you to listen to your favorite songs and artist wherever you are and whenever you want.\nAll you need to use the service is a compatible device.', 'The monthly cost is automatically detracted from your credit at the beginning of every month.'),
(3, 'TIM Vision', 'On demand movies, TV series, documentaries and concerts to create your own schedule without advertising. More than 8,000 titles on a subscription, with no time constraints, even in HD.', 'tv-entertainment', 'On demand movies, TV series, documentaries and concerts to create your own schedule without advertising. More than 8,000 titles on a subscription, with no time constraints, even in HD.', 'The monthly cost is automatically detracted from your credit at the beginning of every month.');

-- --------------------------------------------------------

--
-- Struttura della tabella `smartlife_options`
--

CREATE TABLE IF NOT EXISTS `smartlife_options` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `smartlife_id` int(11) NOT NULL,
  `option_name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `option_description` text,
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `smartlife_options`
--

INSERT INTO `smartlife_options` (`option_id`, `smartlife_id`, `option_name`, `price`, `option_description`) VALUES
(1, 1, 'Netflix Base', '7.99', 'One streaming session'),
(2, 1, 'Netflix Standard', '9.99', 'Two simultaneous streaming sessions'),
(3, 1, 'Netflix Premium', '11.99', 'Four simultaneous streaming sessions'),
(4, 2, 'TIM Music', '7.99', 'One streaming session'),
(5, 3, 'TIM Vision', '23.12', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `smartphones`
--

CREATE TABLE IF NOT EXISTS `smartphones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `os` varchar(45) NOT NULL,
  `description` text,
  `screen` varchar(45) DEFAULT NULL,
  `cpu` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `camera` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dump dei dati per la tabella `smartphones`
--

INSERT INTO `smartphones` (`id`, `os`, `description`, `screen`, `cpu`, `weight`, `size`, `camera`) VALUES
(1, 'iOS', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', 'Retina display, 4inch (diagonal)', 'Apple A9 a 64 bit', '113 g', '123.8mm x 58.6mm x 7.6mm (H x W x D)', '12 megapixel iSight camera with 1.22µ pixels'),
(2, 'Android', 'Explore the Samsung Galaxy S7 edge—big on screen and slim on profile with an edge.\nCrisp, bright display on 5.5" Quad HD Super AMOLED screen with dynamic, contoured dual edge display.\nWater & dust resistance that repels splashes and dunks.\nSharper low-light images with the world’s first dual-pixel smartphone camera.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(3, 'Android', 'The most shareable moments tend to be the hardest to capture. To help you get the shots you want, we made our flagship camera faster and smarter than ever – with quicker response times and even more intelligent focus. Xperia X’s Smart Capture technology helps you banish blur. Enabled by Sony’s new Predictive Hybrid Autofocus, Smart Capture lets you choose a person or object and automatically track it. Now your subject stays in focus, even when moving, and the most unpredictable scenes come out in the sharpest detail.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(4, 'Android', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(5, 'Android', 'Explore the Samsung Galaxy S7 edge—big on screen and slim on profile with an edge.\nCrisp, bright display on 5.5" Quad HD Super AMOLED screen with dynamic, contoured dual edge display.\nWater & dust resistance that repels splashes and dunks.\nSharper low-light images with the world’s first dual-pixel smartphone camera.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(6, 'Android', 'The most shareable moments tend to be the hardest to capture. To help you get the shots you want, we made our flagship camera faster and smarter than ever – with quicker response times and even more intelligent focus. Xperia X’s Smart Capture technology helps you banish blur. Enabled by Sony’s new Predictive Hybrid Autofocus, Smart Capture lets you choose a person or object and automatically track it. Now your subject stays in focus, even when moving, and the most unpredictable scenes come out in the sharpest detail.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(7, 'Android', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(8, 'Windows Phone', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(9, 'Android', 'Explore the Samsung Galaxy S7 edge—big on screen and slim on profile with an edge.\nCrisp, bright display on 5.5" Quad HD Super AMOLED screen with dynamic, contoured dual edge display.\nWater & dust resistance that repels splashes and dunks.\nSharper low-light images with the world’s first dual-pixel smartphone camera.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(10, 'Android', 'The most shareable moments tend to be the hardest to capture. To help you get the shots you want, we made our flagship camera faster and smarter than ever – with quicker response times and even more intelligent focus. Xperia X’s Smart Capture technology helps you banish blur. Enabled by Sony’s new Predictive Hybrid Autofocus, Smart Capture lets you choose a person or object and automatically track it. Now your subject stays in focus, even when moving, and the most unpredictable scenes come out in the sharpest detail.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(11, 'Windows Phone', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(12, 'Android', 'Explore the Samsung Galaxy S7 edge—big on screen and slim on profile with an edge.\nCrisp, bright display on 5.5" Quad HD Super AMOLED screen with dynamic, contoured dual edge display.\nWater & dust resistance that repels splashes and dunks.\nSharper low-light images with the world’s first dual-pixel smartphone camera.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(13, 'Android', 'The most shareable moments tend to be the hardest to capture. To help you get the shots you want, we made our flagship camera faster and smarter than ever – with quicker response times and even more intelligent focus. Xperia X’s Smart Capture technology helps you banish blur. Enabled by Sony’s new Predictive Hybrid Autofocus, Smart Capture lets you choose a person or object and automatically track it. Now your subject stays in focus, even when moving, and the most unpredictable scenes come out in the sharpest detail.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(14, 'iOS', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Apple A9 a 64 bit', '152 g', '123.8mm x 58.6mm x 7.6mm (H x W x D)', '12 megapixel iSight camera with 1.22µ pixels');

-- --------------------------------------------------------

--
-- Struttura della tabella `smartphones_view`
--

CREATE TABLE IF NOT EXISTS `smartphones_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `os` varchar(45) NOT NULL,
  `description` text,
  `screen` varchar(45) DEFAULT NULL,
  `cpu` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `camera` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dump dei dati per la tabella `smartphones_view`
--

INSERT INTO `smartphones_view` (`id`, `manufacturer`, `name`, `price`, `os`, `description`, `screen`, `cpu`, `weight`, `size`, `camera`) VALUES
(1, 'Apple', 'iPhone SE', 509.90, 'iOS', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', 'Retina display, 4inch (diagonal)', 'Apple A9 a 64 bit', '113 g', '123.8mm x 58.6mm x 7.6mm (H x W x D)', '12 megapixel iSight camera with 1.22µ pixels'),
(2, 'Samsung', 'Galaxy S7', 729.90, 'Android', 'Explore the Samsung Galaxy S7 edge—big on screen and slim on profile with an edge.\nCrisp, bright display on 5.5" Quad HD Super AMOLED screen with dynamic, contoured dual edge display.\nWater & dust resistance that repels splashes and dunks.\nSharper low-light images with the world’s first dual-pixel smartphone camera.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(3, 'Sony', 'Xperia X', 629.90, 'Android', 'The most shareable moments tend to be the hardest to capture. To help you get the shots you want, we made our flagship camera faster and smarter than ever – with quicker response times and even more intelligent focus. Xperia X’s Smart Capture technology helps you banish blur. Enabled by Sony’s new Predictive Hybrid Autofocus, Smart Capture lets you choose a person or object and automatically track it. Now your subject stays in focus, even when moving, and the most unpredictable scenes come out in the sharpest detail.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(4, 'Samsung', 'Galaxy J5', 229.90, 'Android', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(5, 'LG', 'K8', 179.90, 'Android', 'Explore the Samsung Galaxy S7 edge—big on screen and slim on profile with an edge.\nCrisp, bright display on 5.5" Quad HD Super AMOLED screen with dynamic, contoured dual edge display.\nWater & dust resistance that repels splashes and dunks.\nSharper low-light images with the world’s first dual-pixel smartphone camera.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(6, 'Huawei', 'P9 Plus', 749.90, 'Android', 'The most shareable moments tend to be the hardest to capture. To help you get the shots you want, we made our flagship camera faster and smarter than ever – with quicker response times and even more intelligent focus. Xperia X’s Smart Capture technology helps you banish blur. Enabled by Sony’s new Predictive Hybrid Autofocus, Smart Capture lets you choose a person or object and automatically track it. Now your subject stays in focus, even when moving, and the most unpredictable scenes come out in the sharpest detail.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(7, 'LG', 'G5', 699.90, 'Android', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(8, 'Microsoft', 'LUMIA 950', 499.90, 'Windows Phone', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(9, 'Samsung', 'Galaxy Grand', 179.90, 'Android', 'Explore the Samsung Galaxy S7 edge—big on screen and slim on profile with an edge.\nCrisp, bright display on 5.5" Quad HD Super AMOLED screen with dynamic, contoured dual edge display.\nWater & dust resistance that repels splashes and dunks.\nSharper low-light images with the world’s first dual-pixel smartphone camera.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(10, 'Huawei', 'P8 lite smart', 199.90, 'Android', 'The most shareable moments tend to be the hardest to capture. To help you get the shots you want, we made our flagship camera faster and smarter than ever – with quicker response times and even more intelligent focus. Xperia X’s Smart Capture technology helps you banish blur. Enabled by Sony’s new Predictive Hybrid Autofocus, Smart Capture lets you choose a person or object and automatically track it. Now your subject stays in focus, even when moving, and the most unpredictable scenes come out in the sharpest detail.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(11, 'Microsoft', 'LUMIA 950 XL', 699.90, 'Windows Phone', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(12, 'LG', 'X screen', 249.90, 'Android', 'Explore the Samsung Galaxy S7 edge—big on screen and slim on profile with an edge.\nCrisp, bright display on 5.5" Quad HD Super AMOLED screen with dynamic, contoured dual edge display.\nWater & dust resistance that repels splashes and dunks.\nSharper low-light images with the world’s first dual-pixel smartphone camera.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(13, 'LG', 'Nexus 5', 449.90, 'Android', 'The most shareable moments tend to be the hardest to capture. To help you get the shots you want, we made our flagship camera faster and smarter than ever – with quicker response times and even more intelligent focus. Xperia X’s Smart Capture technology helps you banish blur. Enabled by Sony’s new Predictive Hybrid Autofocus, Smart Capture lets you choose a person or object and automatically track it. Now your subject stays in focus, even when moving, and the most unpredictable scenes come out in the sharpest detail.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Samsung Exynos 8890', '152 g', '142.4 mm x 169.6 mm x 7.9 mm (H x W x D)', 'Samsung ISOCELL S5K2L1 or Sony Exmor R IMX260'),
(14, 'Apple', 'iPhone 5s', 329.90, 'iOS', 'Welcome to iPhone SE, the most powerful 4 inch phone ever. Created from a beloved design, then reinvented from the inside out. The A9 is the same advanced chip used in iPhone 6s. The 12 megapixel camera captures incredible photos and 4K videos. And Live Photos bring your images to life. The result is an iPhone that looks small, but lives large.', '5.1 in, Quad HD Super AMOLED 2560×1440 pixel ', 'Apple A9 a 64 bit', '152 g', '123.8mm x 58.6mm x 7.6mm (H x W x D)', '12 megapixel iSight camera with 1.22µ pixels');

-- --------------------------------------------------------

--
-- Struttura della tabella `tablets`
--

CREATE TABLE IF NOT EXISTS `tablets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `os` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `screen` varchar(45) DEFAULT NULL,
  `cpu` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `camera` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dump dei dati per la tabella `tablets`
--

INSERT INTO `tablets` (`id`, `os`, `description`, `screen`, `cpu`, `weight`, `size`, `camera`) VALUES
(15, 'iOS', 'iPad Pro is more than the next generation of ', '2732x2048 px (264 PPI), 12.9 in (330 mm) diag', '2.24 GHz dual-core 64-bit ARMv8-A', '713 g', '305.7 mm x 220.6 mm x 6.9 mm (H x W x D)', '720p Front-facing and 8 megapixels rear-facin'),
(16, 'Android', 'Slimmer for a Comfortable Fit in the Hand You', '2732x2048 px (264 PPI), 12.9 in (330 mm) diag', '2.24 GHz dual-core 64-bit ARMv8-A', '713 g', '305.7 mm x 220.6 mm x 6.9 mm (H x W x D)', '720p Front-facing and 8 megapixels rear-facin');

-- --------------------------------------------------------

--
-- Struttura della tabella `tablets_view`
--

CREATE TABLE IF NOT EXISTS `tablets_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `os` varchar(45) NOT NULL,
  `description` text,
  `screen` varchar(45) DEFAULT NULL,
  `cpu` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `camera` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dump dei dati per la tabella `tablets_view`
--

INSERT INTO `tablets_view` (`id`, `manufacturer`, `name`, `price`, `os`, `description`, `screen`, `cpu`, `weight`, `size`, `camera`) VALUES
(15, 'Apple', 'iPad Pro', 1199.90, 'iOS', 'iPad Pro is more than the next generation of ', '2732x2048 px (264 PPI), 12.9 in (330 mm) diag', '2.24 GHz dual-core 64-bit ARMv8-A', '713 g', '305.7 mm x 220.6 mm x 6.9 mm (H x W x D)', '720p Front-facing and 8 megapixels rear-facin'),
(16, 'Samsung', 'Galaxy Tab S2 9.7 VE', 549.90, 'Android', 'Slimmer for a Comfortable Fit in the Hand You', '2732x2048 px (264 PPI), 12.9 in (330 mm) diag', '2.24 GHz dual-core 64-bit ARMv8-A', '713 g', '305.7 mm x 220.6 mm x 6.9 mm (H x W x D)', '720p Front-facing and 8 megapixels rear-facin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
