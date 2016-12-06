-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "crowdin" -------------------------------
CREATE DATABASE IF NOT EXISTS `crowdin` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `crowdin`;
-- ---------------------------------------------------------


-- CREATE TABLE "admin" ------------------------------------
CREATE TABLE `admin` ( 
	`login` VarChar( 255 ) NOT NULL,
	`password` VarChar( 255 ) NOT NULL,
	CONSTRAINT `unique_login` UNIQUE( `login` ) )
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "posts" ------------------------------------
CREATE TABLE `posts` ( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`title` VarChar( 255 ) NOT NULL,
	`short_description` Text NOT NULL,
	`description` Text NOT NULL,
	`created_at` DateTime NOT NULL,
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
ENGINE = InnoDB
AUTO_INCREMENT = 31;
-- ---------------------------------------------------------


-- Dump data of "admin" ------------------------------------
INSERT INTO `admin`(`login`,`password`) VALUES ( 'admin', '87069a6b42aa6e38b7aca2c5086acb83bfa2b8a7' );
-- ---------------------------------------------------------


-- Dump data of "posts" ------------------------------------
INSERT INTO `posts`(`id`,`title`,`short_description`,`description`,`created_at`) VALUES ( '1', 'Crowdin Now Integrates with GitHub and Bitbucket!', 'Developers and localization managers are the part of one tight unit now, because Crowdin integrates with GitHub and Bitbucket for all the organizational Crowdin subscriptions!

This means that all the new texts from pull requests are sent to localization at no time, all the translations are downloaded automatically and available for review at GitHub or Bitbucket and all this is synchronized and automated', 'Developers and localization managers are the part of one tight unit now, because Crowdin integrates with GitHub and Bitbucket for all the organizational Crowdin subscriptions!
<p>
This means that all the new texts from pull requests are sent to localization at no time, all the translations are downloaded automatically and available for review at GitHub or Bitbucket and all this is synchronized and automated
</p>
When integrated with GitHub or Bitbucket, Crowdin instantly “listens“ to the changes in the repositories and takes out all the latest texts into the specific branch in Crowdin. This nimble process helps to shorten the release cycle, as well as keep all the source texts changes up to date in your version control and translation systems.

If you are GitHub user and you got used to Crowdin CLI to send files back and forth, we’ve just made this process much more easier with new integrations. No custom scripts or complex console commands anymore.', '2016-12-04 03:08:14' );
INSERT INTO `posts`(`id`,`title`,`short_description`,`description`,`created_at`) VALUES ( '2', 'Preview of the In-built QA Check Tool', 'Today, we are announcing the in-built QA check tool. It will help your proofreaders do not waste their efforts, guarantee higher quality of translations, and save your manager’s time.', 'Today, we are announcing the in-built QA check tool. It will help your proofreaders do not waste their efforts, guarantee higher quality of translations, and save your manager’s time.
Here’s how it works.
<p>
Crowdin QA check spot mistakes, basing on the number of parameters. Auto fixes and Validators already reduce the number of possible errors during the process of translation in the Editor. However, translation upload allows the space for errors to slip in the final translated document. That is why, Crowdin QA check offers manager to make sure that the program will work as expected with all the new translations.
<p>
To start with, you have to define the scope of the QA check you want to be tested on a single field. Before this, go to the Project Settings, Translations tab, and turn on the QA check feature.', '2016-12-04 08:12:00' );
INSERT INTO `posts`(`id`,`title`,`short_description`,`description`,`created_at`) VALUES ( '3', 'Crowdin on Your Mobile!', 'Quickly translate few strings or answer translator’s question on the go - this is where mobile interface is useful most of all. Translation issues and comments, task managements alongside with proofreading are now much easier to handle from your phone.', 'Quickly translate few strings or answer translator’s question on the go - this is where mobile interface is useful most of all. Translation issues and comments, task managements alongside with proofreading are now much easier to handle from your phone.
<p>
With Crowdin optimized for mobile, it’s easy to reach anybody of your team to discuss the ongoing translation questions and deal with the emergencies at once.
</p>
<p>
With the current hectic pace of life, it is very crucial to be flexible and manage things even if your laptop is not with you.
</p>
Crowdin is a great tool for working with software translations, but in most of the cases, localization management still requires a stand-alone computer in the agile development.

Phones, on the other hand, are not perfect to work particularly with localization, but they’re handy with browsing and simple one touch actions.', '2016-12-05 09:00:00' );
INSERT INTO `posts`(`id`,`title`,`short_description`,`description`,`created_at`) VALUES ( '4', 'New Feature: Versions Management', 'The new Version Control feature we introduce today can significantly reduce the delay “after development before deploy” that usually agile companies struggle with. Time saving is achieved by letting translators work in parallel to developers. Generally speaking, every string created or modified by developer becomes available to translator almost immediately. Even if there are several teams working on different improvements.', 'The new Version Control feature we introduce today can significantly reduce the delay “after development before deploy” that usually agile companies struggle with. Time saving is achieved by letting translators work in parallel to developers. 
<p>
Generally speaking, every string created or modified by developer becomes available to translator almost immediately. Even if there are several teams working on different improvements.', '2016-12-05 08:00:00' );
INSERT INTO `posts`(`id`,`title`,`short_description`,`description`,`created_at`) VALUES ( '5', 'Announcing the Poedit and Crowdin Integration
', 'We’re excited to announce a new integration with a Poedit, the legendary translation tool for Gettext resource files.
This integration makes the collaboration for Poedit users way easier. Now every translator that uses Poedit inside of one project, can synchronize his/her work with Crowdin as a central place that manages translations.
', 'We’re excited to announce a new integration with a Poedit, the legendary translation tool for Gettext resource files.
<p>
This integration makes the collaboration for Poedit users way easier. Now every translator that uses Poedit inside of one project, can synchronize his/her work with Crowdin as a central place that manages translations.
</p>
', '2016-12-05 07:11:00' );
INSERT INTO `posts`(`id`,`title`,`short_description`,`description`,`created_at`) VALUES ( '6', 'Fresh Crowdin’s Editor and New Workflows: Already in Action', 'Today, we’re releasing new workflows and translation editor that is much more modern and much easier to use.', 'Today, we’re releasing new workflows and translation editor that is much more modern and much easier to use.
<p>
Now you can define your custom localization workflow that can involve several proofreading stages and automatic pre-translation. That feature has been frequently requested by our big clients as they often have at least two verification steps for translations, one on the vendor’s side, the second is in-house (by QA or Marketing team).', '2016-12-05 06:13:00' );
INSERT INTO `posts`(`id`,`title`,`short_description`,`description`,`created_at`) VALUES ( '7', 'July Update: New Features', 'Gross domestic product (GDP) of the USA in average grows for 3% per year. This is quite a tempo, and the index is pretty much the same among all developed countries.

What interesting is that this growth is almost entirely about technological progress.', 'Gross domestic product (GDP) of the USA in average grows for 3% per year. This is quite a tempo, and the index is pretty much the same among all developed countries.
<p>
What interesting is that this growth is almost entirely about technological progress.
With innovation and automation, people have wider possibilities and more time to produce more goods. And yes, this macroeconomics principle can be applied to any business.
</p>
Here at Crowdin we try to automate and optimize every single step during localization to save your time and resources. We keep the principle in mind each time we develop a new feature.
So we’re excited to share some recent improvements within Crowdin.
', '2016-12-06 08:11:00' );
INSERT INTO `posts`(`id`,`title`,`short_description`,`description`,`created_at`) VALUES ( '8', 'Test', 'test short desc', 'test full desc', '2016-12-06 23:22:04' );
INSERT INTO `posts`(`id`,`title`,`short_description`,`description`,`created_at`) VALUES ( '9', 'Test2', 'test2 short desc', 'test2 full desc', '2016-12-06 23:28:16' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


