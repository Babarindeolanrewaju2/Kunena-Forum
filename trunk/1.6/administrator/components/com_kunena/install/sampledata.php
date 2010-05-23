<?php
/**
 * @version		$Id$
 * @package		Kunena
 * @subpackage	com_kunena
 * @copyright	Copyright (C) 2008 - 2009 Kunena Team. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 * @link		http://www.kunena.com
 */

defined( '_JEXEC' ) or die('Restricted access');

// This file contains initial sample data for the forum

include_once (KUNENA_PATH .DS. "class.kunena.php");
include_once (KUNENA_PATH_LIB .DS. "kunena.timeformat.class.php");

function installSampleData()
{
	$db = &JFactory::getDBO();
	$posttime = CKunenaTimeformat::internalTime ();
	$queries = array();

	$query = "INSERT INTO `#__kunena_ranks`
	(`rank_id`, `rank_title`, `rank_min`, `rank_special`, `rank_image`) VALUES
	(1, 'Fresh Boarder', 0, 0, 'rank1.gif'),
	(2, 'Junior Boarder', 20, 0, 'rank2.gif'),
	(3, 'Senior Boarder', 40, 0, 'rank3.gif'),
	(4, 'Expert Boarder', 80, 0, 'rank4.gif'),
	(5, 'Gold Boarder', 160, 0, 'rank5.gif'),
	(6, 'Platinum Boarder', 320, 0, 'rank6.gif'),
	(7, 'Administrator', 0, 1, 'rankadmin.gif'),
	(8, 'Moderator', 0, 1, 'rankmod.gif'),
	(9, 'Spammer', 0, 1, 'rankspammer.gif');";

	$queries[] = array ('kunena_ranks', $query);

	$query = "INSERT INTO `#__kunena_smileys`
	(`id`,`code`,`location`,`greylocation`,`emoticonbar`) VALUES
	(1, 'B)', 'cool.png', 'cool-grey.png', 1),
	(2, '8)', 'cool.png', 'cool-grey.png', 0),
	(3, '8-)', 'cool.png', 'cool-grey.png', 0),
	(4, ':-(', 'sad.png', 'sad-grey.png', 0),
	(5, ':(', 'sad.png', 'sad-grey.png', 1),
	(6, ':sad:', 'sad.png', 'sad-grey.png', 0),
	(7, ':cry:', 'sad.png', 'sad-grey.png', 0),
	(8, ':)', 'smile.png', 'smile-grey.png', 1),
	(9, ':-)', 'smile.png', 'smile-grey.png', 0),
	(10, ':cheer:', 'cheerful.png', 'cheerful-grey.png', 1),
	(11, ';)', 'wink.png', 'wink-grey.png', 1),
	(12, ';-)', 'wink.png', 'wink-grey.png', 0),
	(13, ':wink:', 'wink.png', 'wink-grey.png', 0),
	(14, ';-)', 'wink.png', 'wink-grey.png', 0),
	(15, ':P', 'tongue.png', 'tongue-grey.png', 1),
	(16, ':p', 'tongue.png', 'tongue-grey.png', 0),
	(17, ':-p', 'tongue.png', 'tongue-grey.png', 0),
	(18, ':-P', 'tongue.png', 'tongue-grey.png', 0),
	(19, ':razz:', 'tongue.png', 'tongue-grey.png', 0),
	(20, ':angry:', 'angry.png', 'angry-grey.png', 1),
	(21, ':mad:', 'angry.png', 'angry-grey.png', 0),
	(22, ':unsure:', 'unsure.png', 'unsure-grey.png', 1),
	(23, ':o', 'shocked.png', 'shocked-grey.png', 0),
	(24, ':-o', 'shocked.png', 'shocked-grey.png', 0),
	(25, ':O', 'shocked.png', 'shocked-grey.png', 0),
	(26, ':-O', 'shocked.png', 'shocked-grey.png', 0),
	(27, ':eek:', 'shocked.png', 'shocked-grey.png', 0),
	(28, ':ohmy:', 'shocked.png', 'shocked-grey.png', 1),
	(29, ':huh:', 'wassat.png', 'wassat-grey.png', 1),
	(30, ':?', 'confused.png', 'confused-grey.png', 0),
	(31, ':-?', 'confused.png', 'confused-grey.png', 0),
	(32, ':???', 'confused.png', 'confused-grey.png', 0),
	(33, ':dry:', 'ermm.png', 'ermm-grey.png', 1),
	(34, ':ermm:', 'ermm.png', 'ermm-grey.png', 0),
	(35, ':lol:', 'grin.png', 'grin-grey.png', 1),
	(36, ':X', 'sick.png', 'sick-grey.png', 0),
	(37, ':x', 'sick.png', 'sick-grey.png', 0),
	(38, ':sick:', 'sick.png', 'sick-grey.png', 1),
	(39, ':silly:', 'silly.png', 'silly-grey.png', 1),
	(40, ':y32b4:', 'silly.png', 'silly-grey.png', 0),
	(41, ':blink:', 'blink.png', 'blink-grey.png', 1),
	(42, ':blush:', 'blush.png', 'blush-grey.png', 1),
	(43, ':oops:', 'blush.png', 'blush-grey.png', 1),
	(44, ':kiss:', 'kissing.png', 'kissing-grey.png', 1),
	(45, ':rolleyes:', 'blink.png', 'blink-grey.png', 0),
	(46, ':roll:', 'blink.png', 'blink-grey.png', 0),
	(47, ':woohoo:', 'w00t.png', 'w00t-grey.png', 1),
	(48, ':side:', 'sideways.png', 'sideways-grey.png', 1),
	(49, ':S', 'dizzy.png', 'dizzy-grey.png', 1),
	(50, ':s', 'dizzy.png', 'dizzy-grey.png', 0),
	(51, ':evil:', 'devil.png', 'devil-grey.png', 1),
	(52, ':twisted:', 'devil.png', 'devil-grey.png', 0),
	(53, ':whistle:', 'whistling.png', 'whistling-grey.png', 1),
	(54, ':pinch:', 'pinch.png', 'pinch-grey.png', 1),
	(55, ':D', 'laughing.png', 'laughing-grey.png', 0),
	(56, ':-D', 'laughing.png', 'laughing-grey.png', 0),
	(57, ':grin:', 'laughing.png', 'laughing-grey.png', 0),
	(58, ':laugh:', 'laughing.png', 'laughing-grey.png', 0),
	(59, ':|', 'neutral.png', 'neutral-grey.png', 0),
	(60, ':-|', 'neutral.png', 'neutral-grey.png', 0),
	(61, ':neutral:', 'neutral.png', 'neutral-grey.png', 0),
	(62, ':mrgreen:', 'mrgreen.png', 'mrgreen-grey.png', 0),
	(63, ':?:', 'question.png', 'question-grey.png', 0),
	(64, ':!:', 'exclamation.png', 'exclamation-grey.png', 0),
	(65, ':arrow:', 'arrow.png', 'arrow-grey.png', 0),
	(66, ':idea:', 'idea.png', 'idea-grey.png', 0)";

	$queries[] = array ('kunena_smileys', $query);

	$query="INSERT INTO `#__kunena_categories`
	(`id`, `parent`, `name`, `pub_access`, `ordering`, `published`, `description`, `headerdesc`, `numTopics`, `numPosts`) VALUES
	(1, 0, ".$db->quote(JText::_('COM_KUNENA_SAMPLE_MAIN_CATEGORY_TITLE')).", 1, 1, 1, ".$db->quote(JText::_('COM_KUNENA_SAMPLE_MAIN_CATEGORY_DESC')).", ".$db->quote(JText::_('COM_KUNENA_SAMPLE_MAIN_CATEGORY_HEADER')).", 0, 0),
	(2, 1, ".$db->quote(JText::_('COM_KUNENA_SAMPLE_FORUM1_TITLE')).", 1, 1, 1, ".$db->quote(JText::_('COM_KUNENA_SAMPLE_FORUM1_DESC')).", ".$db->quote(JText::_('COM_KUNENA_SAMPLE_FORUM1_HEADER')).",1 ,1),
	(3, 1, ".$db->quote(JText::_('COM_KUNENA_SAMPLE_FORUM2_TITLE')).", 1, 2, 1, ".$db->quote(JText::_('COM_KUNENA_SAMPLE_FORUM2_DESC')).", ".$db->quote(JText::_('COM_KUNENA_SAMPLE_FORUM2_HEADER')).",0 ,0);";

	$queries[] = array ('kunena_categories', $query);

	$query="INSERT INTO `#__kunena_messages`
	(`id`, `parent`, `thread`, `catid`, `userid`, `subject`, `time`, `ip`) VALUES
	(1, 0, 1, 2, 62, ".$db->quote(JText::_('COM_KUNENA_SAMPLE_POST1_SUBJECT')).", ".$posttime.", '127.0.0.1');";

	$queries[] = array ('kunena_messages', $query);

	$query="INSERT INTO `#__kunena_messages_text`
	(`mesid`, `message`) VALUES
	(1, ".$db->quote(JText::_('COM_KUNENA_SAMPLE_POST1_TEXT')).");";

	$queries[] = array ('kunena_messages_text', $query);

	foreach ($queries as $query)
	{
		// Only insert sample/default data if table is empty
		$db->setQuery("SELECT COUNT(*) FROM ".$db->nameQuote($db->getPrefix().$query[0]));
		$count = $db->loadResult();

		if (!$count) {
			$db->setQuery($query[1]);
			$db->query();
			if ($db->getErrorNum()) trigger_error('Sample data for '.$query[0].' could not be added: '.$db->getErrorMsg(), E_USER_WARNING);
		}
	}
}

installSampleData();