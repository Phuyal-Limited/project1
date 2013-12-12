-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2013 at 05:11 PM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` text NOT NULL,
  `isbn10` text NOT NULL,
  `isbn13` text NOT NULL,
  `author` text NOT NULL COMMENT 'seperated by comma',
  `description` text NOT NULL,
  `category_id` text NOT NULL COMMENT 'id seperated by comma',
  `publisher` text NOT NULL,
  `image_id` int(11) NOT NULL,
  `language` text NOT NULL,
  `weight` double NOT NULL,
  `published_date` text NOT NULL,
  `edition` text NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=158 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `isbn10`, `isbn13`, `author`, `description`, `category_id`, `publisher`, `image_id`, `language`, `weight`, `published_date`, `edition`) VALUES
(65, 'Summer Love', '1265300102', '9789937856386', 'Subin Bhattarai', 'It is cheesy. It is so dramatic at times that readers will cringe at the seemingly contrived situations. Also, the beginning definitely lets it down. The writer may or may not have intended it, but the technique, at least at the start, is annoyingly reminiscent of a popular young Indian writer. But after all that, Subin Bhattarai’s Summer Love is a simple love story, beautifully told. It is not earth-shaking, and it is unlikely that anyone will call it a masterpiece of the century, but everyone with a heart will like it for what it is: an attempt to present readers with a piece of enjoyable, almost-realistic, fiction. It is the retelling of an everyday life.', '22', 'FinePrint Inc', 76, 'Nepali', 0, '2013', '1st'),
(69, 'Seto Dharti', '9789937856', '9789937856348', 'Amar Neupane', 'Seto Dharati. Nice book', '17', 'Fine Print Inc', 1, 'Nepali', 0, '1999', '2nd'),
(85, 'Parijaat', '0123456788', '9780143418672', 'Bishnu Kumari Waiwaa', 'This book is new.', '14', 'Redstone', 1, 'Nepali', 0, '2009', '2nd'),
(86, 'Story Book 1', '7657655765', '7587587778788', 'Sujan', 'this is nice book', '4', 'Sujan', 1, 'English', 100, '2013', '2nd'),
(92, 'Daphne Du Maurier', '0123456678', '9781844080380', 'Rebecca', 'Book by friend.', '14', 'virago', 1, 'English', 0, '2003', '2nd'),
(93, 'Before They Pass Away', '3832797599', '9783832797591', 'jimmy Nelson', 'This historic volume showcases tribal cultures around the world. With globalization, these societies are to be prized for their distinctive lifestyles, art and traditions. They live in close harmony with nature, now a rarity in our modern era. Jimmy Nelson not only presents us with stunning images of customs and artifacts, but also offers insightful portraits of people who are the guardians of a culture that they - and we - hope will be passed on to future generations in all its glory. Nelson''s large-plate field camera captures every intricate detail and fine nuance for posterity. What''s more, this splendid pageantry is set against a vivid backdrop of some of the world''s most pristine landscapes. Text in English / German & French', '1', ' teNeues Verlag GmbH + Co KG (6 Sep 2013)', 15, 'English', 400, '2013', '2nd'),
(94, 'Across the Ravaged Land ', '1419709453', '9781419709456', 'Nick Brandt', 'Across the Ravaged Land is the third and final volume in Nick Brandt''s trilogy of books documenting the disappearing natural world and animals of East Africa. The book''s title, combined with the titles of Brandt''s first two books, captures the change he has witnessed: "On this Earth, a shadow falls across the ravaged land." The book offers a darker vision of the world that Brandt has been photographing for the last decade, a world still filled with a stunning beauty, but now tragically tainted and fast disappearing at the hands of man. In addition to a range of new, starkly powerful portraits of animals; elephants, lions, leopards, hyenas, that appear to be posing especially for the photographer as if in a studio, Brandt introduces some new themes. For the first time, humans make an appearance in his photographs. On the jacket, a crouched ranger supports the weight of two giant tusks of an elephant killed by poachers. One new series of photographs has hunters'' trophies placed back in the epic landscapes where once these creatures roamed. Another features perfectly preserved animals calcified by the salts of a Rift Valley soda lake. In both instances, the subjects appear strangely alive and sentient in death. Brandt also contributes two essays summing up his photographic odyssey, which has taken more than a decade of intensive work to complete. One details his work from the perspective of conservation, giving a broad overview of the wave of destruction of wildlife and habitat across Africa and describing the work his Big Life Foundation is doing to preserve the Amboseli ecosystem of Kenya and Tanzania. The other discusses technical aspects of his project.', '1', 'Abrams', 16, 'English', 120, '2013', '2nd'),
(95, 'Rain Later, Good: Painting the Shipping Forecast', '1408178575', '9781408178577', 'Peter Collyer', 'Rain Later, Good is the award winning story of Peter Collyer''s extraordinary journey around the Shipping Forecast areas. The Shipping Forecast is a national institution, relied upon by mariners but also strangely comforting and poetic to landlubbers. Published in 1998 to great acclaim, Rain Later, Good was chosen by the RNLI to celebrate their 175th anniversary, and has since sold over 25,000 copies. Fifteen years later, this gorgeous book will be available in paperback for the first time. ', '1', 'Adlard Coles Nautical', 17, 'English', 144, '2013', '2nd'),
(96, 'Masters of Deception', '140275101X', '9781402751011', 'Douglas R. Hofstadter', 'Rings of seahorses that seem to rotate on the page. Butterflies that transform right before your eyes into two warriors with their horses.', '1', 'Sterling ', 18, 'English', 320, '2007', '3rd'),
(97, 'The Art of Tudor and Stuart Fashion', '1905686447', '9781905686445', 'Anna Reynolds', 'There are 4 areas of interest covered here: reenacting and historic costumes, needlework, history and portraiture. There is a whole chapter of 50 pages entitled simply Painting Dress so art students should go crazy. The front cover tells you everything: it''s all about the style and how it was conveyed in the over-the-top luxury of the Tudor and Stuart dynasties.', '1', 'Royal Collection Trust', 19, 'English', 300, '2013', '2nd'),
(98, 'In My Shoes', '067092363X', '9780670923632', 'Tamara Mellon', 'A lesson about an alchemist who won applause by being prepared to fashion a brand out of a stylish product and female chutzpah', '2', ' Portfolio Penguin ', 20, 'English', 288, '2013', '4th'),
(99, 'Riding the Storm', '1847941184', '9781847941183', 'Duncan Bannatyne', 'A few years ago Duncan Bannatyne might have said so. He was happily married and his businesses were thriving. Life was good. He couldn''t have known that a storm was brewing on the horizon and that he would soon face immense personal and professional struggles, including the strain of a divorce and the impact of the recession on his business empire. Riding the Storm is the inspirational account of how Duncan overcame these setbacks. It''s a survival story, full of insights into how he adapted his businesses and his life to new financial realities.', '2', 'Random House Business ', 21, 'English', 288, '2013', '2nd'),
(101, 'Principles and Practice of Marketing', '0077140001', '9780077140007', 'David Jobber', 'Behind the scenes secrets of marketing in the entertainment industry\nWhy the Brazilian government have to respond to macroenvironmental forces to help save the Amazon rainforest.\n\n\n', '3', 'McGraw-Hill Higher Education', 23, 'english', 1016, '2012', '2nd'),
(102, 'Exploring Strategy Text & Cases', '0273737023', '9780273737025', 'Gerry Johnson', 'This is one of the best books for Strategic Management and Business Policy. Very detailed and clear. The book has several case studies and texts including key concepts.', '3', ' Financial Times/ Prentice Hall', 24, 'english', 0, '2010', '2nd'),
(103, 'Diary of a Wimpy Kid', '0141350679', '9780141350677', 'Jeff Kinney', 'The Wimpy Kid is back! In the most hotly-anticipated children''s book release of the year, the hilarious, globally-bestselling and award-winning Diary of a Wimpy Kid series, sees BOOK 8 hit our shelves this November!', '4', 'Puffin', 25, 'english', 240, '2013', '2nd'),
(104, 'Demon Dentist', '0007453566', '9780007453566', 'David Walliams', 'Darkness had come to the town. Strange things were happening in the dead of night. Children would put a tooth under their pillow for the tooth fairy, but in the morning they would wake up to find… a dead slug; a live spider; hundreds of earwigs creeping and crawling beneath their pillow.\nEvil was at work. But who or what was behind it…?', '4', 'HarperCollinsChildren''sBooks', 26, 'English', 272, '2013', '2nd'),
(105, 'Simpsons - Annual 2014', '1781167737', '9781781167731', 'Matt Groening', 'Since their first appearance on The Tracey Ullman Show more than ten years ago, Simpsons creator MATT GROENING has successfully developed Bart & Co. into a much loved, zillion dollar franchise.', '5', 'Titan Books', 27, 'English', 72, '2013', '2nd'),
(106, 'HTML & CSS', '1118008189', '9781118008188', 'Jon Duckett', 'A full–color introduction to the basics of HTML and CSS from the publishers of Wrox!   Every day, more and more people want to learn some HTML and CSS. Joining the professional web designers and programmers are new audiences who need to know a little bit of code at work (update a content management system or e–commerce store) and those who want to make their personal blogs more attractive. Many books teaching HTML and CSS are dry and only written for those who want to become programmers, which is why this book takes an entirely new approach. Introduces HTML and CSS in a way that makes them accessible to everyone—hobbyists, students, and professionals—and it’s full–color throughout Utilizes information graphics and lifestyle photography to explain the topics in a simple way that is engaging Boasts a unique structure that allows you to progress through the chapters from beginning to end or just dip into topics of particular interest at your leisure This educational book is one that you will enjoy picking up, reading, then referring back to. It will make you wish other technical topics were presented in such a simple, attractive and engaging way!', '6', 'John Wiley & Sons', 28, 'English', 512, '2011', '2nd'),
(107, 'The Adobe Photoshop Lightroom 5 Book for Digital Photographers', '0321934318', '9780321934314', 'Scott Kelby', 'Since Lightroom 1.0 first launched, Scott’s Kelby’s The Adobe Photoshop Lightroom Book for Digital Photographers has been the world’s #1 best-selling Lightroom book (it has been translated into a dozen different languages), and in this latest version for Lightroom 5, Scott uses his same award-winning, step-by-step, plain-English style and layout to make learning Lightroom easy and fun.', '6', 'Peachpit Press', 29, 'English', 552, '2013', '2nd'),
(108, 'Tom Kerridge''s Proper Pub Food', '1472903536', '9781472903532', 'Tom Kerridge', 'The king of beautiful pub food has collected all of his best ideas into this proper cookbook, ready to warm the world on a grey day and restore the nation''s good mood. Tom Kerridge''s idea of food heaven isn''t fussy gastronomy; it''s proper ''man food'' with Michelin star magic, including breakfasts that keep you smiling for the whole day, indulgent long lunches, teatime temptations, seasonal snacks and heart-warming suppers.', '7', 'Absolute Press', 30, 'English', 256, '2013', '2nd'),
(109, 'Rugby Union For Dummies ', '1119990920', '9781119990925', 'Nick Cain', 'If you?re new to the sport or you feel you could sharpen up your knowledge of the game, this guide is for you. Inside you?ll find easy–to–understand advice on the basic rules and pitch positions, plus in–depth lessons on ball skills, fitness training, and techniques to outwit your opponents – all illustrated with entertaining stories from British and International rugby?s back pages. In addition, you get a grounding in the local, national and international reaches of Rugby Union  Rugby Union For Dummies 3rd Edition : Features an in–depth and up–to–date look at the Laws that form the beautiful game Covers all you will need to know about talking tactics and is perfect for anyone looking at swatting up on rugby for the World Cup and beyond Advises on all you will need to know to get stuck in and play Contains a new chapter on sevens as the sport will be a demonstration sport at London 2012 and a full sport at Rio 2016', '8', 'John Wiley & Sons; 3rd Edition, UK Edition edition', 31, 'english', 408, '2011', '2nd'),
(110, 'Driving Ambition', '0340840684', '9780340840689', 'Andrew Strauss', 'An outstanding opening batsman and natural leader, Andrew Strauss captained his country in 50 of his 100 Tests. During his time in charge, England emerged from a turbulent and controversial period to become the world''s top team.', '8', 'Hodder & Stoughton', 32, 'English', 288, '2013', '1st'),
(111, 'GCSE Spanish Revision Guide', '1847622909', '9781847622907', 'CGP books', 'This Revision Guide includes clear, accessible notes on all the grammar and vocabulary students will need for Higher level GCSE Spanish, backed up with plenty of useful examples. There''s also a page of revision summary questions for every topic, and a handy Spanish-English dictionary at the back. Suitable for all exam boards.', '10', 'Coordination Group Publications Ltd ', 33, 'English', 132, '2009', '2nd'),
(112, 'Teaching English as a Foreign Language for Dummies', '0470745762', '9780470745762', 'Michelle Maxom', 'Making Everything Easier! Teaching English as a Foreign Language for Dummies Learn to: Put an EFL course programme together from scratch Let your students loose in skills classes – from reading to listening Deliver grammar lessons in a logical and intuitive way Cope with different age groups and capabilities Your one–stop guide to a career that will take you places If you thought that teaching a language that?s second nature to you would be easy, think again!', '10', 'John Wiley & Sons', 34, 'English', 396, '2009', '2nd'),
(113, 'The Secret of Intermittent Fasting', '1780721676', '9781780721675', 'Michael Mosley', 'This revolutionary new approach to weight loss really is as simple as it sounds: you eat normally five days a week, then for just two days you cut your calories (500 for women, 600 for men).\nScientific trials of Intermittent Fasting have shown that it will not only help the pounds fly off but also lower your risk of a range of diseases, including diabetes, heart disease and cancer.\nDr Michael Mosley, the medical journalist who first alerted the world to the Intermittent Fasting phenomenon, presents the fascinating science behind the 5:2 diet. Mimi Spencer, award-winning food and fashion writer, explains the practicalities of how to go about it.', '11', 'Short Books ', 35, 'English', 256, '2013', '4th'),
(114, 'The Secret of Intermittent Fasting', '1780721676', '9781780721675', 'Michael Mosley', 'This revolutionary new approach to weight loss really is as simple as it sounds: you eat normally five days a week, then for just two days you cut your calories (500 for women, 600 for men).\nScientific trials of Intermittent Fasting have shown that it will not only help the pounds fly off but also lower your risk of a range of diseases, including diabetes, heart disease and cancer.\nDr Michael Mosley, the medical journalist who first alerted the world to the Intermittent Fasting phenomenon, presents the fascinating science behind the 5:2 diet. Mimi Spencer, award-winning food and fashion writer, explains the practicalities of how to go about it.', '11', 'Short Books ', 36, 'English', 256, '2013', '1st'),
(115, 'The Secret of Intermittent Fasting', '1780721676', '9781780721675', 'Michael Mosley', 'This revolutionary new approach to weight loss really is as simple as it sounds: you eat normally five days a week, then for just two days you cut your calories (500 for women, 600 for men).\nScientific trials of Intermittent Fasting have shown that it will not only help the pounds fly off but also lower your risk of a range of diseases, including diabetes, heart disease and cancer.\nDr Michael Mosley, the medical journalist who first alerted the world to the Intermittent Fasting phenomenon, presents the fascinating science behind the 5:2 diet. Mimi Spencer, award-winning food and fashion writer, explains the practicalities of how to go about it.', '11', 'Short Books ', 37, 'English', 256, '2013', '1st'),
(116, 'A History of Modern Psychology', '1118011457', '9781118011454', 'C. James Goodwin', 'The enhanced 4 th Edition of Goodwin''s series, A History of Modern Psychology , explores the modern history of psychology including the fundamental bases of psychology and psychology''s advancements in the 20th century. Goodwin, Ph.D. in experimental psychology, has a true passion for the history of experimental psychology.', '12', 'John Wiley & Sons', 38, ' English', 576, '2012', '4th'),
(117, 'Madness: A Brief History', '0192802674', '9780192802675', 'Roy Porter', 'This fascinating story of madness reveals the radically different perceptions of madness and approaches to its treatment, from antiquity to the present day. ', '12', 'OUP Oxford', 39, ' English', 256, '2003', '1st'),
(118, 'Entertainment, Heroes and Villains', '1904091504', '9781904091509', 'Dave Thomas', 'Entertainment, Heroes and Villains explores humble Burnley FC''s rise to the glamour of the Premiership and then its immediate relegation to the Championship. The book, written by Dave Thomas, a lifelong Burnley supporter, examines the actions of the three managers directly responsible for steering the club into glory and back again.', '13', 'Vertical Editions', 40, ' English', 264, '2011', '2nd'),
(119, 'Poirot and Me', '0755364198', '9780755364190', 'David Suchet', 'As he films the final episode actor David Suchet recalls his experience of playing Agatha Christie''s world-famous detective, Hercule Poirot, for almost a quarter of a century.', '13', 'Headline', 41, 'English', 320, '2013', '2nd'),
(120, 'The Oxford Companion to English Literature', '0192806874', '9780192806871', 'Dinah Birch', 'The Oxford Companion to English Literature has long been established as the leading reference resource for students, teachers, scholars, and general readers of English literature. It provides unrivalled coverage of all aspects of English literature - from writers, their works, and the historical and cultural context in which they wrote, to critics, literary theory, and allusions. \n', '14', 'OUP Oxford', 42, 'English', 1184, '2009', '2nd'),
(121, 'How to Read Literature', '0300190964', '9780300190960', 'Terry Eagleton', 'What makes a work of literature good or bad? How freely can the reader interpret it? Could a nursery rhyme like Baa Baa Black Sheep be full of concealed loathing, resentment, and aggression? In this accessible, delightfully entertaining book, Terry Eagleton addresses these intriguing questions and a host of others. ', '14', 'Yale University Press', 43, 'english', 256, '2013', '2nd'),
(122, 'Anomalies and Curiosities of Medicine', '144443781X', '1444437811111', 'Walter Lytle', 'This book was converted from its physical edition to the digital format by a community of volunteers. You may find it for free on the web. Purchase of the Kindle edition includes wireless delivery', '15', ' Amazon Media EU S.à r.l.', 44, 'english', 752, '2009', '2nd'),
(123, 'BMA New Guide to Medicine and Drugs ', '1405361794', '9781405361798', 'DK', 'The BMA New Guide to Medicine and Drugs Eighth Edition is the fully updated, quick-reference guide to drugs for anyone wanting to know more about the medication they''re taking from Britain''s leading authority.', '15', 'Dorling Kindersley', 45, 'English', 512, '2011', '3rd'),
(126, 'Haunted From Within ', '1234567891', '1234567891011', 'Ian C.P. Irvine', 'When you are finished, join the thousands of others who are turning to the internet to see if this story is based upon truth, and a real medical mystery! And be prepared to be surprised, shocked and scared by what you may find out! ', '16', 'Crime Thriller Ebook Free Press ', 48, 'English', 277, '1970', '2nd'),
(127, 'The Mystery of the Missing Money', '1345672901', '1456738791078', 'Paul Moxham ', 'he seaside village of Smugglers Cove is proving to be anything but quiet for the four children as they encounter yet another mystery while exploring Brackness Castle. This ruined fortress sits on the outskirts of the village and, as the children soon discover, holds more secrets than they could ever imagine. ', '16', 'Amazon Media EU S.à r.l.', 49, 'English', 22, '2012', '2nd'),
(129, 'A Slip of the Keyboard', '0857521225', '9780857521224', 'Terry Pratchett', 'Terry Pratchett has earned a place in the hearts of readers the world over with his bestselling Discworld series - but in recent years he has become equally well-known and respected as an outspoken campaigner for causes including Alzheimer''s research and animal rights. A Slip of the Keyboard brings together for the first time the finest examples of Pratchett''s non fiction writing, both serious and surreal: from musings on mushrooms to what it means to be a writer (and why banana daiquiris are so important); from memories of Granny Pratchett to speculation about Gandalf''s love life, and passionate defences of the causes dear to him.', '17', ' Doubleday', 51, 'English', 768, '2014', '2nd'),
(130, 'Where in the World is Bob? ', '1444782827', '9781444782820', 'James Bowen', 'Find Street Cat Bob and his friend James hidden in the illustrations of all the countries they visit.\n\n', '17', 'Hodder & Stoughton', 52, 'english', 48, '2013', '2nd'),
(131, 'The Attachment Parenting Book', '0316778095', '9780316778091', 'William Sears', 'Attachment parenting is a highly intuitive, high-touch style of parenting that encourages a strong early attachment, and advocates consistent parental responsiveness to babies'' dependency needs. Rather than give parents a strict set of rules about when to breastfeed or when to respond to a cry, The Sears'' approach encourages parents to learn and work with their baby''s particular cues. Their book focuses on the benefits of attachment parenting for both parent and child, and explains how attachment parenting improves development, makes discipline easier, and even promotes independence. There is further information on attachment parenting for working parents and on weaning your child from attachment parenting, as well as scientific research that explains why attachment parenting works. ', '18', 'Little, Brown & Company', 53, 'english', 192, '2001', '2nd'),
(132, 'Calmer, Easier, Happier Parenting', '144472990X', '9781444729900', 'Noël Janis-Norton', 'Finally, a revolutionary programme that gives you simple steps to take the daily battles out of parenting. These strategies resolve one of parents'' biggest frustrations: getting your children to listen and do what you ask, the first time you ask.\n\n', '18', ' Hodder & Stoughton', 54, 'english', 448, '2012', '2nd'),
(133, 'Social Science Methodology', '0521132770', '9780521132770', 'John Gerring', 'John Gerring''s exceptional textbook has been thoroughly revised in this second edition. It offers a one-volume introduction to social science methodology relevant to the disciplines of anthropology, economics, history, political science, psychology and sociology.', '19', 'Cambridge University Press', 55, 'english', 522, '2011', '2nd'),
(134, 'Social Sciences: The Big Issues', '0415466601', '9780415466608', 'Kath Woodward ', 'The Big Issues second edition offers an introduction to the big debates within the social sciences and to what the social sciences can provide as a means of explaining the changing world. The social sciences focus upon people as individuals and as members of wider communities and networks, and look at all aspects of human relationships from the personal and intimate to the public and political. ', '19', 'Routledge', 56, 'English', 216, '2009', '2nd'),
(135, 'Microsoft Manual of Style', '0735648719', '9780735648715', 'Microsoft Corporation', 'Maximize the impact and precision of your message! Now in its fourth edition, the Microsoft Manual of Style provides essential guidance to content creators, journalists, technical writers, editors, and everyone else who writes about computer technology. Direct from the Editorial Style Board at Microsoft-you get a comprehensive glossary of both general technology terms and those specific to Microsoft;', '20', ' MICROSOFT PRESS', 57, '', 438, '2012', '2nd'),
(136, 'Dancing the Dream', '0062515144', '9780062515148', 'Jamie Sams', 'Widely recognized as one of the foremost teachers of Native American wisdom, Jamie Sams reveals the seven sacred paths of human spiritual development and explains how exploring each path leads to shifts in our personal relat', '21', 'HarperOne', 58, 'English', 288, '1999', '1st'),
(137, 'Religion without God', '0674726820', '9780674726826', 'Ronald Dworkin', 'Dworkin claims a religious attitude that acknowledges two things: first, human life has objective meaning and importance; second, the physical universe is something of intrinsic value and wonder. This broad and inclusive definition has a significant implication. Both theists and atheists can assent to it because it points to a shared, fundamental commitment that goes beyond their differences. In this sense, atheists can be religious, and religion does not necessarily require a god. Because religious atheists lack a god who legitimizes those values and both creates the physical universe and endows it with sublimity and beauty, they need an alternative explanation.', '21', 'Harvard University Press', 59, 'English', 192, '2013', '3rd'),
(138, 'Who Is the Holy Spirit?', '1567692990', '9781567692990', 'Paperback', 'Dr. R.C. Sproul, the founder and chairman of Ligonier Ministries, is known for his ability to communicate the deep truths of the Christian Faith. He is the president of The Reformation Bible College, preaches at Saint Andrew''s Chapel in Sanford, FL, and teaches on the daily radio program, Renewing Your Mind. He has written more than eighty books', '21', 'Reformation Trust Publishing', 60, ' English', 72, '2012', '2nd'),
(139, 'Forbidden Disclosure', 'B008EOWJM6', '1234567891012', 'Terri Marie', 'This was a really cute book and wasn''t like other romances I''ve read. It was a lot milder than most.The man and woman didn''t throw themselves at one another five minutes after meeting, and I liked that.', '22', 'Gossamer Publishing', 61, 'english', 268, '1993', '2nd'),
(140, 'Finding Pride', 'B009LQKHIO', '1234567890134', 'Jill Sanders', 'Dealing with her loss was hard, but, now she was thinking of taking over Matt''s new business venture. This could be the fresh start she needed, a new town, a new place to forget the pain and maybe she could learn to trust again. ', '22', 'Amazon Digital Services, Inc.', 62, 'English', 300, '1910', '3rd'),
(141, 'Jill Sanders', '1480054542', '9781480054547', 'Jill Sanders', 'Megan Kimble has finally freed herself from years of abuse at the hands of her ex. Now she can finally start a new life and figure out just who she really is. When her brother Matt dies suddenly, she takes a big risk and moves cross country to live in his house and take over his new business. This could be the chance she''s needed. There''s only one problem now. She can''t seem to escape the irresistible charm of her departed brother''s best friend. ', '22', 'CreateSpace Independent Publishing Platform ', 63, 'English', 298, '2012', '2nd'),
(142, 'Sports Illustrated Baseball''s Greatest', '1618930559', '9781618930552', 'Editors of Sports Illustrated"', '"This is the kind of book baseball fans can cherish. . . . Whether you agree or disagree with Sports Illustrated''s choices, one thing is certain--you cannot dispute the crisp writing, bold photography and compelling layout of Baseball''s Greatest." --Bob D''Angelo, The Tampa Tribune\n', '23', 'Sports Illustrated; ILL edition', 64, 'English', 288, '2013', '2nd'),
(143, 'The Sports Gene', '1591845114', '9781591845119', 'David Epstein', 'If you have any interest in being at the forefront of change in the sports industry you have to read this book. The Sports Gene goes far beyond cliche and digs into the science that every professional sports team will have to incorporate into their thinking. It is a must read.', '23', 'Current Hardcover', 65, 'English', 352, '2013', '2nd'),
(144, 'Sports Illustrated Kids Full Count', '1618930060', '9781618930064', 'Sports Illustrated Kids', 'Get everything you ever wanted to know about America''s pastime in FULL COUNT: TOP 10 LISTS OF EVERYTHING IN BASEBALL . ', '23', 'Sports Illustrated for Kids', 66, 'english', 96, '1960', '2nd'),
(145, 'DK Eyewitness Travel Guide', '1465400486', '9781465400482', 'DK', '', '24', 'DK Travel; Pap/Map edition', 67, 'English', 440, '2013', '2nd'),
(146, 'Rick Steves'' Italy 2014', '1612386598', '9781612386591', 'Rick Steves', '', '24', 'Avalon Travel Publishing', 68, 'English', 1264, '2013', '2nd'),
(149, 'Morning, Noon & Night', '9788172234', '9788172234843', 'Sidney ', 'Suspense, Intrigue and passion from the world''s favourite storyteller.', '16', 'Sheldon', 70, 'English', 0, '2004', '2nd'),
(155, 'engineering', '1234567890', '1234567891034', 'nepal reads', 'testing', '16', 'nepalreads', 1, 'english', 65, '1910', '2nd'),
(156, 'Peace is Possible', '0130417173', '9780130417176', 'Andrea Cagan', 'Peace Is Possible is the first full and complete story of Prem Rawat. It documents his extraordinary life, from growing up with a father who was a revered master, to the day he first addressed audiences at age three, to being discovered by hippies at his home by the Himalayan foothills when he was a child, to his dramatic arrival in the West at thirteen, to today. When Prem Rawat was six years old, his father and beloved teacher showed him a special gift, a practical means to discover a world of peace within him. When he was eight, his father passed away, and he accepted the responsibility of spreading the message of peace. He attended school during the week and addressed audiences in the tens of thousands on weekends. He has spent the last forty years inspiring millions of people from all walks of life and offering this same gift to people. Controversy has not eluded him: he was only eight when the Indian media wrote that he was a sixty-year-old posing as a child. Few journalists have gone beyond stereotypes and taken the time to get a real sense of what he offers. While his message is translated into more than seventy languages, it remains a little-known secret, spread mostly through word of mouth. This book lifts the veil on Prem Rawat--the man, his life, his message.', '17,21', 'Mighty River Press', 75, 'English', 0.75, '2007', '2nd');

-- --------------------------------------------------------

--
-- Table structure for table `bookshop`
--

CREATE TABLE IF NOT EXISTS `bookshop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `specialization` text NOT NULL,
  `image` int(11) NOT NULL,
  `description` text NOT NULL,
  `delivery_cost_within_city` int(11) NOT NULL,
  `delivery_cost_outof_city` int(11) NOT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bookshop`
--

INSERT INTO `bookshop` (`shop_id`, `name`, `address`, `phone`, `specialization`, `image`, `description`, `delivery_cost_within_city`, `delivery_cost_outof_city`) VALUES
(1, '\r\nABC Book Store', 'XYZ', '123456789', 'Art Books', 3, 'We sell the best', 20, 65),
(2, 'XYZ Bookstore', 'Kathmandu', '987663738', 'Best bookstore of ktm \r\nget every book here', 0, 'this is a test store', 100, 500),
(3, 'Test Store', 'test.com', '93849383954', 'testers', 0, 'we are happy to test', 250, 400);

-- --------------------------------------------------------

--
-- Table structure for table `cart_books`
--

CREATE TABLE IF NOT EXISTS `cart_books` (
  `cart_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_books`
--

INSERT INTO `cart_books` (`cart_id`, `stock_id`, `quantity`) VALUES
(1, 99, 2),
(1, 102, 1),
(1, 85, 1),
(2, 158, 1),
(3, 78, 1),
(3, 101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Arts'),
(2, 'Biographies'),
(3, 'Business & Investing'),
(4, 'Children''s Book'),
(5, 'Comics'),
(6, 'Computers & Technology'),
(7, 'Cookbooks'),
(8, 'Hobbies'),
(9, 'Education & School Books'),
(10, 'Foreign Language Books'),
(11, 'Health & Fitness'),
(12, 'History'),
(13, 'Humor & Entertainment'),
(14, 'Literature & Fiction'),
(15, 'Medicine'),
(16, 'Mystery & suspense'),
(17, 'Nonfiction'),
(18, 'Parenting & Relationships'),
(19, 'Politics & Social Sciences'),
(20, 'Professional & Technical'),
(21, 'Religion & Spirituality'),
(22, 'Romance'),
(23, 'Sports'),
(24, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `guest_customer`
--

CREATE TABLE IF NOT EXISTS `guest_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `guest_customer`
--

INSERT INTO `guest_customer` (`customer_id`, `name`, `address`, `phone`, `email`) VALUES
(1, 'Prachanda Gurung', 'Lamachaur, GBS paxadi', '9806677668', 'prachanda.gurung@gmail.com'),
(2, 'Anjani Phuyal', 'fffffffsdssss', '447412767100', 'anjaniphuyal@hotmail.com'),
(3, 'Sudip', 'Pokhata', '9898989898', 'sudip@genesesofts.com'),
(4, ' john', 'ffd', 'df', 'sanskar.udas@yahoo.com'),
(5, ' john', 'ffd', 'df', 'sanskar.udas@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `path` text NOT NULL,
  `alt` text NOT NULL,
  `system_image` tinyint(1) NOT NULL,
  `shared` int(11) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `name`, `path`, `alt`, `system_image`, `shared`) VALUES
(1, 'default image', 'http://admin.nepalreads.com/assets/images/book_image/1.jpg', 'Image Comming Soon', 1, 0),
(3, 'Summer love', 'http://admin.nepalreads.com/assets/images/book_image/3.png', 'Summer love', 0, 0),
(7, 'Me Talk Pretty One Day', 'http://admin.nepalreads.com/assets/images/book_image/7.jpg', 'Me Talk Pretty One Day', 0, 0),
(15, 'Before They Pass Away', 'http://admin.nepalreads.com/assets/images/book_image/15.jpeg', 'Before They Pass Away', 0, 0),
(16, 'Across the Ravaged Land ', 'http://admin.nepalreads.com/assets/images/book_image/16.png', 'Across the Ravaged Land ', 0, 0),
(17, 'Rain Later, Good: Painting the Shipping Forecast', 'http://admin.nepalreads.com/assets/images/book_image/17.png', 'Rain Later, Good: Painting the Shipping Forecast', 0, 0),
(18, 'Masters of Deception', 'http://admin.nepalreads.com/assets/images/book_image/18.png', 'Masters of Deception', 0, 0),
(19, 'The Art of Tudor and Stuart Fashion', 'http://admin.nepalreads.com/assets/images/book_image/19.png', 'The Art of Tudor and Stuart Fashion', 0, 0),
(20, 'In My Shoes', 'http://admin.nepalreads.com/assets/images/book_image/20.png', 'In My Shoes', 0, 0),
(21, 'Riding the Storm', 'http://admin.nepalreads.com/assets/images/book_image/21.png', 'Riding the Storm', 0, 0),
(22, 'Riding the Storm', 'http://admin.nepalreads.com/assets/images/book_image/22.png', 'Riding the Storm', 0, 0),
(23, 'Principles and Practice of Marketing', 'http://admin.nepalreads.com/assets/images/book_image/23.png', 'Principles and Practice of Marketing', 0, 0),
(24, 'Exploring Strategy Text & Cases', 'http://admin.nepalreads.com/assets/images/book_image/24.png', 'Exploring Strategy Text & Cases', 0, 0),
(25, 'Diary of a Wimpy Kid', 'http://admin.nepalreads.com/assets/images/book_image/25.png', 'Diary of a Wimpy Kid', 0, 0),
(26, 'Demon Dentist', 'http://admin.nepalreads.com/assets/images/book_image/26.png', 'Demon Dentist', 0, 0),
(27, 'Simpsons - Annual 2014', 'http://admin.nepalreads.com/assets/images/book_image/27.png', 'Simpsons - Annual 2014', 0, 0),
(28, 'HTML & CSS', 'http://admin.nepalreads.com/assets/images/book_image/28.png', 'HTML & CSS', 0, 0),
(29, 'The Adobe Photoshop Lightroom 5 Book for Digital Photographers', 'http://admin.nepalreads.com/assets/images/book_image/29.png', 'The Adobe Photoshop Lightroom 5 Book for Digital Photographers', 0, 0),
(30, 'Tom Kerridge''s Proper Pub Food', 'http://admin.nepalreads.com/assets/images/book_image/30.png', 'Tom Kerridge''s Proper Pub Food', 0, 0),
(31, 'Rugby Union For Dummies ', 'http://admin.nepalreads.com/assets/images/book_image/31.png', 'Rugby Union For Dummies ', 0, 0),
(32, 'Driving Ambition', 'http://admin.nepalreads.com/assets/images/book_image/32.png', 'Driving Ambition', 0, 0),
(33, 'GCSE Spanish Revision Guide', 'http://admin.nepalreads.com/assets/images/book_image/33.png', 'GCSE Spanish Revision Guide', 0, 0),
(34, 'Teaching English as a Foreign Language for Dummies', 'http://admin.nepalreads.com/assets/images/book_image/34.png', 'Teaching English as a Foreign Language for Dummies', 0, 0),
(35, 'The Secret of Intermittent Fasting', 'http://admin.nepalreads.com/assets/images/book_image/35.png', 'The Secret of Intermittent Fasting', 0, 0),
(36, 'The Secret of Intermittent Fasting', 'http://admin.nepalreads.com/assets/images/book_image/36.png', 'The Secret of Intermittent Fasting', 0, 0),
(37, 'The Secret of Intermittent Fasting', 'http://admin.nepalreads.com/assets/images/book_image/37.png', 'The Secret of Intermittent Fasting', 0, 0),
(38, 'A History of Modern Psychology', 'http://admin.nepalreads.com/assets/images/book_image/38.png', 'A History of Modern Psychology', 0, 0),
(39, 'Madness: A Brief History', 'http://admin.nepalreads.com/assets/images/book_image/39.png', 'Madness: A Brief History', 0, 0),
(40, 'Entertainment, Heroes and Villains', 'http://admin.nepalreads.com/assets/images/book_image/40.png', 'Entertainment, Heroes and Villains', 0, 0),
(41, 'Poirot and Me', 'http://admin.nepalreads.com/assets/images/book_image/41.png', 'Poirot and Me', 0, 0),
(42, 'The Oxford Companion to English Literature', 'http://admin.nepalreads.com/assets/images/book_image/42.png', 'The Oxford Companion to English Literature', 0, 0),
(43, 'How to Read Literature', 'http://admin.nepalreads.com/assets/images/book_image/43.png', 'How to Read Literature', 0, 0),
(44, 'Anomalies and Curiosities of Medicine', 'http://admin.nepalreads.com/assets/images/book_image/44.png', 'Anomalies and Curiosities of Medicine', 0, 0),
(45, 'BMA New Guide to Medicine and Drugs ', 'http://admin.nepalreads.com/assets/images/book_image/45.png', 'BMA New Guide to Medicine and Drugs ', 0, 0),
(46, 'BMA New Guide to Medicine and Drugs ', 'http://admin.nepalreads.com/assets/images/book_image/46.png', 'BMA New Guide to Medicine and Drugs ', 0, 0),
(47, 'BMA New Guide to Medicine and Drugs ', 'http://admin.nepalreads.com/assets/images/book_image/47.png', 'BMA New Guide to Medicine and Drugs ', 0, 0),
(48, 'Haunted From Within ', 'http://admin.nepalreads.com/assets/images/book_image/48.png', 'Haunted From Within ', 0, 0),
(49, 'The Mystery of the Missing Money', 'http://admin.nepalreads.com/assets/images/book_image/49.png', 'The Mystery of the Missing Money', 0, 0),
(50, 'The Mystery of the Missing Money', 'http://admin.nepalreads.com/assets/images/book_image/50.png', 'The Mystery of the Missing Money', 0, 0),
(51, 'A Slip of the Keyboard', 'http://admin.nepalreads.com/assets/images/book_image/51.png', 'A Slip of the Keyboard', 0, 0),
(52, 'Where in the World is Bob? ', 'http://admin.nepalreads.com/assets/images/book_image/52.png', 'Where in the World is Bob? ', 0, 0),
(53, 'The Attachment Parenting Book', 'http://admin.nepalreads.com/assets/images/book_image/53.png', 'The Attachment Parenting Book', 0, 0),
(54, 'Calmer, Easier, Happier Parenting', 'http://admin.nepalreads.com/assets/images/book_image/54.png', 'Calmer, Easier, Happier Parenting', 0, 0),
(55, 'Social Science Methodology', 'http://admin.nepalreads.com/assets/images/book_image/55.jpg', 'Social Science Methodology', 0, 0),
(56, 'Social Sciences: The Big Issues', 'http://admin.nepalreads.com/assets/images/book_image/56.jpg', 'Social Sciences: The Big Issues', 0, 0),
(57, 'Microsoft Manual of Style', 'http://admin.nepalreads.com/assets/images/book_image/57.png', 'Microsoft Manual of Style', 0, 0),
(58, 'Dancing the Dream', 'http://admin.nepalreads.com/assets/images/book_image/58.jpg', 'Dancing the Dream', 0, 0),
(59, 'Religion without God', 'http://admin.nepalreads.com/assets/images/book_image/59.png', 'Religion without God', 0, 0),
(60, 'Who Is the Holy Spirit?', 'http://admin.nepalreads.com/assets/images/book_image/60.png', 'Who Is the Holy Spirit?', 0, 0),
(61, 'Forbidden Disclosure', 'http://admin.nepalreads.com/assets/images/book_image/61.png', 'Forbidden Disclosure', 0, 0),
(62, 'Finding Pride', 'http://admin.nepalreads.com/assets/images/book_image/62.png', 'Finding Pride', 0, 0),
(63, 'Jill Sanders', 'http://admin.nepalreads.com/assets/images/book_image/63.png', 'Jill Sanders', 0, 0),
(64, 'Sports Illustrated Baseball''s Greatest', 'http://admin.nepalreads.com/assets/images/book_image/64.png', 'Sports Illustrated Baseball''s Greatest', 0, 0),
(65, 'The Sports Gene', 'http://admin.nepalreads.com/assets/images/book_image/65.png', 'The Sports Gene', 0, 0),
(66, 'Sports Illustrated Kids Full Count', 'http://admin.nepalreads.com/assets/images/book_image/66.png', 'Sports Illustrated Kids Full Count', 0, 0),
(67, 'DK Eyewitness Travel Guide', 'http://admin.nepalreads.com/assets/images/book_image/67.png', 'DK Eyewitness Travel Guide', 0, 0),
(68, 'Rick Steves'' Italy 2014', 'http://admin.nepalreads.com/assets/images/book_image/68.png', 'Rick Steves'' Italy 2014', 0, 0),
(69, 'Pokhiyera Mareko Paani', 'http://admin.nepalreads.com/assets/images/book_image/69.png', 'Pokhiyera Mareko Paani', 0, 0),
(70, 'Morning, Noon & Night', 'http://admin.nepalreads.com/assets/images/book_image/70.jpg', 'Morning, Noon & Night', 0, 0),
(71, 'Test-4', 'http://admin.nepalreads.com/assets/images/book_image/71.jpg', 'Test-4', 0, 0),
(72, 'Pillow', 'http://admin.nepalreads.com/assets/images/book_image/72.jpg', 'Pillow', 0, 0),
(73, 'Burger king', 'http://admin.nepalreads.com/assets/images/book_image/73.jpg', 'Burger king', 0, 0),
(74, 'Jammy', 'http://admin.nepalreads.com/assets/images/book_image/74.jpg', 'Jammy', 0, 0),
(75, 'Peace is Possible', 'http://admin.nepalreads.com/assets/images/book_image/75.jpg', 'Peace is Possible', 0, 0),
(76, 'Summer Love', 'http://admin.nepalreads.com/assets/images/book_image/76.jpg', 'Summer Love', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `registered_customer` tinyint(1) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `delivery_address` text NOT NULL,
  `delivery_note` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `registered_customer`, `cart_id`, `transaction_id`, `delivery_address`, `delivery_note`) VALUES
(1, 1, 0, 1, 255588, '', 'Voli biana newspaper ko time ma....'),
(2, 2, 0, 2, 51809, 'ggddffgdffg', 'ring the bell'),
(3, 3, 0, 3, 500980, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registered_customer`
--

CREATE TABLE IF NOT EXISTS `registered_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `review_title` text NOT NULL,
  `review_text` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `saved_cart`
--

CREATE TABLE IF NOT EXISTS `saved_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `registered_customer` tinyint(1) NOT NULL,
  `cart_name` text NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `saved_cart`
--

INSERT INTO `saved_cart` (`cart_id`, `customer_id`, `registered_customer`, `cart_name`, `update_date`) VALUES
(1, 1, 0, 'Purchase', '2013-11-15'),
(2, 2, 0, 'Purchase', '2013-11-23'),
(3, 3, 0, 'Purchase', '2013-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `shopstock`
--

CREATE TABLE IF NOT EXISTS `shopstock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `store` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `item_no_for_store_ref` text NOT NULL,
  `delivery_cost_within_city` int(11) NOT NULL,
  `delivery_cost_outof_city` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Dumping data for table `shopstock`
--

INSERT INTO `shopstock` (`stock_id`, `store`, `book_id`, `price`, `item_no_for_store_ref`, `delivery_cost_within_city`, `delivery_cost_outof_city`, `stock`) VALUES
(67, 1, 65, 300, '', 20, 65, 500),
(68, 2, 65, 325, '', 20, 70, 500),
(85, 1, 85, 350, '', 20, 65, 5),
(86, 1, 86, 195, '', 30, 100, 300),
(99, 1, 97, 2000, '', 20, 65, 1),
(100, 1, 95, 250, '', 20, 65, 1),
(101, 1, 98, 1500, '', 50, 100, 1),
(102, 1, 99, 1600, '', 30, 80, 2),
(104, 1, 101, 1800, '', 20, 65, 2),
(105, 1, 102, 2100, '', 20, 65, 2),
(106, 1, 103, 800, '', 20, 50, 2),
(107, 1, 104, 500, '', 20, 65, 5),
(108, 1, 105, 200, '', 20, 65, 2),
(109, 1, 106, 1500, '', 20, 65, 3),
(110, 1, 107, 1500, '', 20, 65, 2),
(111, 1, 108, 500, '', 20, 65, 2),
(112, 1, 109, 1200, '', 20, 65, 1),
(113, 1, 110, 900, '', 20, 65, 1),
(114, 1, 111, 1100, '', 20, 65, 2),
(115, 1, 112, 1300, '', 20, 65, 2),
(116, 1, 113, 300, '', 20, 65, 1),
(119, 1, 116, 600, '', 20, 65, 1),
(120, 1, 117, 250, '', 20, 65, 3),
(121, 1, 118, 600, '', 20, 65, 2),
(122, 1, 119, 450, '', 20, 65, 3),
(123, 1, 120, 750, '', 20, 65, 1),
(124, 1, 121, 800, '', 20, 65, 2),
(125, 1, 122, 2000, '', 20, 65, 2),
(129, 1, 126, 350, '', 20, 65, 1),
(130, 1, 127, 150, '', 20, 65, 2),
(132, 1, 129, 800, '', 20, 65, 2),
(133, 1, 130, 475, '', 20, 65, 1),
(134, 1, 131, 495, 'a', 50, 100, 1),
(136, 1, 132, 700, '', 20, 65, 2),
(137, 1, 133, 890, '', 20, 65, 1),
(138, 1, 134, 450, '', 20, 65, 1),
(139, 1, 135, 790, '', 20, 65, 1),
(140, 1, 136, 300, '', 20, 65, 1),
(141, 1, 137, 300, '', 20, 65, 2),
(142, 1, 138, 150, '', 20, 65, 1),
(143, 1, 139, 300, '', 20, 65, 1),
(144, 1, 140, 500, '', 20, 65, 1),
(146, 1, 142, 575, '', 20, 65, 2),
(148, 1, 144, 335, '', 20, 65, 1),
(149, 1, 145, 700, '', 20, 65, 2),
(153, 1, 149, 240, '', 20, 65, 10),
(159, 1, 155, 150, '', 20, 65, 2),
(160, 1, 156, 1377, '', 20, 65, 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `profile_id` int(11) NOT NULL,
  `access_right` int(11) NOT NULL,
  `suspended` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  `avatar` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `profile_id`, `access_right`, `suspended`, `name`, `avatar`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@genesesofts.com', 1, 1, 0, 'Genese', 0),
(2, 'neeta', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'neeta@genesesofts.com', 3, 1, 0, 'Neeta ', 0),
(3, 'genese', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'genese@genese.com', 2, 1, 0, 'Genese', 0),
(4, 'hacked', 'e812ba8d00b270ef3502bb53ceb31e8c5188f14e', 'hacked@hacked.com', 1, 1, 0, 'Genese', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
