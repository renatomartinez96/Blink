-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-07-2015 a las 01:25:19
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `blink_db`
--
CREATE DATABASE IF NOT EXISTS `blink_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blink_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE IF NOT EXISTS `cuestionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` text NOT NULL,
  `opcion1` text NOT NULL,
  `opcion2` text NOT NULL,
  `opcion3` text NOT NULL,
  `opcion4` text NOT NULL,
  `correcto` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`id`, `pregunta`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `correcto`) VALUES
(1, 'Which of the following are the valid values of the &lt;a&gt; elements target attribute in HTML5?', '_blank', '_self', '_top', '_bottom', '1'),
(2, 'How does a button created by the &lt;button&gt; tag differ from the one created by an &lt;input&gt; tag?', 'An input tag button can be a reset button too.', 'A button tag button can be a reset button too.', 'An input tag button can include images as well.', 'A button tag can include images as well.', '4'),
(3, 'What is the internal/wire format of input type="date" in HTML5?', 'DD-MM-YYYY', 'YYYY-MM-DD', 'MM-DD-YYYY', 'YYYY-DD-MM', '2'),
(4, 'Which of the following will restrict an input element to accept only numerical values in a text field?', '&lt;input type="text" pattern="[0-9]*" /&gt;', '&lt;input type="number" /&gt;', '&lt;input type="text" pattern="d*"/&gt;', '&lt;input type="text" pattern="number"/&gt;', '1'),
(5, 'Which of the following is the correct way to display a PDF file in the browser?', '&lt;object type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;object type="application/pdf" id="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" src="filename.pdf" width="100%" height="100%"/&gt;', '1'),
(6, 'Which of the following video file formats are currently supported by the &lt;video&gt; element of HTML5?', 'CCTV', 'MPEG 4', 'Ogg', '3GPP', '2'),
(7, 'Which of the following shows correct use of client-side data validation in HTML5, on username and password fields in particular?', '&lt;input name="username" required /&gt; &lt;input name="pass" type="password" required/&gt;', '&lt;input name="username" validate="true"/&gt; &lt;input name="pass" type="password" validate="true"/&gt;', '&lt;input name="username" validate/&gt; &lt;input name="pass" type="password" validate/&gt;', 'There is no way to implement client-side validation for the username and password fields in HTML5.', '1'),
(8, 'Which of the following is not a valid attribute for the &lt;video&gt; element in HTML5?', 'controls', 'autoplay', 'disabled', 'preload', '3'),
(9, 'Which HTML5 doctype declarations are correct?', '&lt;!doctype html&gt;', '&lt;!DOCTYPE html&gt;', '&lt;!DOCTYPE HTML5&gt;', '&lt;!DOCTYPE HTML&gt;', '2'),
(10, 'Which of the following video tag attributes are invalid in HTML5?', 'play', 'loop', 'mute', 'pause', '4'),
(11, 'The following link is placed on an HTML webpage: &lt;a href="http://msdn.com/" target="_blank"&gt; MSDN &lt;/a&gt; What can be inferred from it?', 'It will open the site msdn.com in the same window.', 'It will open the site msdn.com in a new window.', 'It will open the site msdn.com in a frame below.', 'It will not be clickable as it is not formed correctly.', '2'),
(12, 'What is the limit to the length of HTML attributes?', '65536', '64', 'There is no limit.', 'None of these.', '3'),
(13, 'What is the purpose of the &lt;q&gt; element in HTML5?', 'It is used to define the start of a term in a definition list.', 'It is used to define attribute values for one or more columns in a table.', 'It is used to define the start of a short quotation.', 'It is used to define what to show browsers that do not support the ruby element.', '3'),
(14, 'In HTML5, which of the following is not a valid value for the type attribute when used with the &lt;command&gt; tag shown below? &lt;command type="?"&gt;Click Me!&lt;/command&gt; ', 'button', 'command', 'checkbox', 'radio', '1'),
(15, 'Which of the following attributes gets hidden when the user clicks on the element that it modifies? (Eg. hint text inside the fields of web forms)', 'autocomplete', 'autofocus', 'placeholder', 'formnovalidate', '3'),
(16, 'The &lt;canvas&gt; element is new to HTML5 and allows you to...', 'draw graphics on a web page using Adobe Flash.', 'draw graphics on a web page using a Java plug-in.', 'draw graphics on a web page using JavaScript APIs.', 'None of these.', '3'),
(17, 'Do all web browsers support all HTML5 features equally?', 'Yes, except for Safari', 'No', 'Yes, except for Firefox', 'Yes, except for Google Chrome', '2'),
(18, 'What does the following code do:  &lt;input type="text" name="user_name"  autofocus="autofocus" /&gt;?', 'Creates a text field on the form being loaded.', 'The browser will automatically give the user_name field focus when the page loads.', 'Loads a form called text.', 'none of these', '2'),
(19, 'Which of the following are the valid values of the &lt;a&gt; elements target attribute in HTML5?', '_blank', '_self', '_top', '_bottom', '1'),
(20, 'How does a button created by the &lt;button&gt; tag differ from the one created by an &lt;input&gt; tag?', 'An input tag button can be a reset button too.', 'A button tag button can be a reset button too.', 'An input tag button can include images as well.', 'A button tag can include images as well.', '4'),
(21, 'What is the internal/wire format of input type="date" in HTML5?', 'DD-MM-YYYY', 'YYYY-MM-DD', 'MM-DD-YYYY', 'YYYY-DD-MM', '2'),
(22, 'Which of the following will restrict an input element to accept only numerical values in a text field?', '&lt;input type="text" pattern="[0-9]*" /&gt;', '&lt;input type="number" /&gt;', '&lt;input type="text" pattern="d*"/&gt;', '&lt;input type="text" pattern="number"/&gt;', '1'),
(23, 'Which of the following is the correct way to display a PDF file in the browser?', '&lt;object type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;object type="application/pdf" id="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" src="filename.pdf" width="100%" height="100%"/&gt;', '1'),
(24, 'Which of the following video file formats are currently supported by the &lt;video&gt; element of HTML5?', 'CCTV', 'MPEG 4', 'Ogg', '3GPP', '2'),
(25, 'Which of the following shows correct use of client-side data validation in HTML5, on username and password fields in particular?', '&lt;input name="username" required /&gt; &lt;input name="pass" type="password" required/&gt;', '&lt;input name="username" validate="true"/&gt; &lt;input name="pass" type="password" validate="true"/&gt;', '&lt;input name="username" validate/&gt; &lt;input name="pass" type="password" validate/&gt;', 'There is no way to implement client-side validation for the username and password fields in HTML5.', '1'),
(26, 'Which of the following is not a valid attribute for the &lt;video&gt; element in HTML5?', 'controls', 'autoplay', 'disabled', 'preload', '3'),
(27, 'Which HTML5 doctype declarations are correct?', '&lt;!doctype html&gt;', '&lt;!DOCTYPE html&gt;', '&lt;!DOCTYPE HTML5&gt;', '&lt;!DOCTYPE HTML&gt;', '2'),
(28, 'Which of the following video tag attributes are invalid in HTML5?', 'play', 'loop', 'mute', 'pause', '4'),
(29, 'The following link is placed on an HTML webpage: &lt;a href="http://msdn.com/" target="_blank"&gt; MSDN &lt;/a&gt; What can be inferred from it?', 'It will open the site msdn.com in the same window.', 'It will open the site msdn.com in a new window.', 'It will open the site msdn.com in a frame below.', 'It will not be clickable as it is not formed correctly.', '2'),
(30, 'What is the limit to the length of HTML attributes?', '65536', '64', 'There is no limit.', 'None of these.', '3'),
(31, 'What is the purpose of the &lt;q&gt; element in HTML5?', 'It is used to define the start of a term in a definition list.', 'It is used to define attribute values for one or more columns in a table.', 'It is used to define the start of a short quotation.', 'It is used to define what to show browsers that do not support the ruby element.', '3'),
(32, 'In HTML5, which of the following is not a valid value for the type attribute when used with the &lt;command&gt; tag shown below? &lt;command type="?"&gt;Click Me!&lt;/command&gt; ', 'button', 'command', 'checkbox', 'radio', '1'),
(33, 'Which of the following attributes gets hidden when the user clicks on the element that it modifies? (Eg. hint text inside the fields of web forms)', 'autocomplete', 'autofocus', 'placeholder', 'formnovalidate', '3'),
(34, 'The &lt;canvas&gt; element is new to HTML5 and allows you to...', 'draw graphics on a web page using Adobe Flash.', 'draw graphics on a web page using a Java plug-in.', 'draw graphics on a web page using JavaScript APIs.', 'None of these.', '3'),
(35, 'Do all web browsers support all HTML5 features equally?', 'Yes, except for Safari', 'No', 'Yes, except for Firefox', 'Yes, except for Google Chrome', '2'),
(36, 'What does the following code do:  &lt;input type="text" name="user_name"  autofocus="autofocus" /&gt;?', 'Creates a text field on the form being loaded.', 'The browser will automatically give the user_name field focus when the page loads.', 'Loads a form called text.', 'none of these', '2'),
(37, 'Which of the following are the valid values of the &lt;a&gt; elements target attribute in HTML5?', '_blank', '_self', '_top', '_bottom', '1'),
(38, 'How does a button created by the &lt;button&gt; tag differ from the one created by an &lt;input&gt; tag?', 'An input tag button can be a reset button too.', 'A button tag button can be a reset button too.', 'An input tag button can include images as well.', 'A button tag can include images as well.', '4'),
(39, 'What is the internal/wire format of input type="date" in HTML5?', 'DD-MM-YYYY', 'YYYY-MM-DD', 'MM-DD-YYYY', 'YYYY-DD-MM', '2'),
(40, 'Which of the following will restrict an input element to accept only numerical values in a text field?', '&lt;input type="text" pattern="[0-9]*" /&gt;', '&lt;input type="number" /&gt;', '&lt;input type="text" pattern="d*"/&gt;', '&lt;input type="text" pattern="number"/&gt;', '1'),
(41, 'Which of the following is the correct way to display a PDF file in the browser?', '&lt;object type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;object type="application/pdf" id="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" src="filename.pdf" width="100%" height="100%"/&gt;', '1'),
(42, 'Which of the following video file formats are currently supported by the &lt;video&gt; element of HTML5?', 'CCTV', 'MPEG 4', 'Ogg', '3GPP', '2'),
(43, 'Which of the following shows correct use of client-side data validation in HTML5, on username and password fields in particular?', '&lt;input name="username" required /&gt; &lt;input name="pass" type="password" required/&gt;', '&lt;input name="username" validate="true"/&gt; &lt;input name="pass" type="password" validate="true"/&gt;', '&lt;input name="username" validate/&gt; &lt;input name="pass" type="password" validate/&gt;', 'There is no way to implement client-side validation for the username and password fields in HTML5.', '1'),
(44, 'Which of the following is not a valid attribute for the &lt;video&gt; element in HTML5?', 'controls', 'autoplay', 'disabled', 'preload', '3'),
(45, 'Which HTML5 doctype declarations are correct?', '&lt;!doctype html&gt;', '&lt;!DOCTYPE html&gt;', '&lt;!DOCTYPE HTML5&gt;', '&lt;!DOCTYPE HTML&gt;', '2'),
(46, 'Which of the following video tag attributes are invalid in HTML5?', 'play', 'loop', 'mute', 'pause', '4'),
(47, 'The following link is placed on an HTML webpage: &lt;a href="http://msdn.com/" target="_blank"&gt; MSDN &lt;/a&gt; What can be inferred from it?', 'It will open the site msdn.com in the same window.', 'It will open the site msdn.com in a new window.', 'It will open the site msdn.com in a frame below.', 'It will not be clickable as it is not formed correctly.', '2'),
(48, 'What is the limit to the length of HTML attributes?', '65536', '64', 'There is no limit.', 'None of these.', '3'),
(49, 'What is the purpose of the &lt;q&gt; element in HTML5?', 'It is used to define the start of a term in a definition list.', 'It is used to define attribute values for one or more columns in a table.', 'It is used to define the start of a short quotation.', 'It is used to define what to show browsers that do not support the ruby element.', '3'),
(50, 'In HTML5, which of the following is not a valid value for the type attribute when used with the &lt;command&gt; tag shown below? &lt;command type="?"&gt;Click Me!&lt;/command&gt; ', 'button', 'command', 'checkbox', 'radio', '1'),
(51, 'Which of the following attributes gets hidden when the user clicks on the element that it modifies? (Eg. hint text inside the fields of web forms)', 'autocomplete', 'autofocus', 'placeholder', 'formnovalidate', '3'),
(52, 'The &lt;canvas&gt; element is new to HTML5 and allows you to...', 'draw graphics on a web page using Adobe Flash.', 'draw graphics on a web page using a Java plug-in.', 'draw graphics on a web page using JavaScript APIs.', 'None of these.', '3'),
(53, 'Do all web browsers support all HTML5 features equally?', 'Yes, except for Safari', 'No', 'Yes, except for Firefox', 'Yes, except for Google Chrome', '2'),
(54, 'What does the following code do:  &lt;input type="text" name="user_name"  autofocus="autofocus" /&gt;?', 'Creates a text field on the form being loaded.', 'The browser will automatically give the user_name field focus when the page loads.', 'Loads a form called text.', 'none of these', '2'),
(55, 'Which of the following are the valid values of the &lt;a&gt; elements target attribute in HTML5?', '_blank', '_self', '_top', '_bottom', '1'),
(56, 'How does a button created by the &lt;button&gt; tag differ from the one created by an &lt;input&gt; tag?', 'An input tag button can be a reset button too.', 'A button tag button can be a reset button too.', 'An input tag button can include images as well.', 'A button tag can include images as well.', '4'),
(57, 'What is the internal/wire format of input type="date" in HTML5?', 'DD-MM-YYYY', 'YYYY-MM-DD', 'MM-DD-YYYY', 'YYYY-DD-MM', '2'),
(58, 'Which of the following will restrict an input element to accept only numerical values in a text field?', '&lt;input type="text" pattern="[0-9]*" /&gt;', '&lt;input type="number" /&gt;', '&lt;input type="text" pattern="d*"/&gt;', '&lt;input type="text" pattern="number"/&gt;', '1'),
(59, 'Which of the following is the correct way to display a PDF file in the browser?', '&lt;object type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;object type="application/pdf" id="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" src="filename.pdf" width="100%" height="100%"/&gt;', '1'),
(60, 'Which of the following video file formats are currently supported by the &lt;video&gt; element of HTML5?', 'CCTV', 'MPEG 4', 'Ogg', '3GPP', '2'),
(61, 'Which of the following shows correct use of client-side data validation in HTML5, on username and password fields in particular?', '&lt;input name="username" required /&gt; &lt;input name="pass" type="password" required/&gt;', '&lt;input name="username" validate="true"/&gt; &lt;input name="pass" type="password" validate="true"/&gt;', '&lt;input name="username" validate/&gt; &lt;input name="pass" type="password" validate/&gt;', 'There is no way to implement client-side validation for the username and password fields in HTML5.', '1'),
(62, 'Which of the following is not a valid attribute for the &lt;video&gt; element in HTML5?', 'controls', 'autoplay', 'disabled', 'preload', '3'),
(63, 'Which HTML5 doctype declarations are correct?', '&lt;!doctype html&gt;', '&lt;!DOCTYPE html&gt;', '&lt;!DOCTYPE HTML5&gt;', '&lt;!DOCTYPE HTML&gt;', '2'),
(64, 'Which of the following video tag attributes are invalid in HTML5?', 'play', 'loop', 'mute', 'pause', '4'),
(65, 'The following link is placed on an HTML webpage: &lt;a href="http://msdn.com/" target="_blank"&gt; MSDN &lt;/a&gt; What can be inferred from it?', 'It will open the site msdn.com in the same window.', 'It will open the site msdn.com in a new window.', 'It will open the site msdn.com in a frame below.', 'It will not be clickable as it is not formed correctly.', '2'),
(66, 'What is the limit to the length of HTML attributes?', '65536', '64', 'There is no limit.', 'None of these.', '3'),
(67, 'What is the purpose of the &lt;q&gt; element in HTML5?', 'It is used to define the start of a term in a definition list.', 'It is used to define attribute values for one or more columns in a table.', 'It is used to define the start of a short quotation.', 'It is used to define what to show browsers that do not support the ruby element.', '3'),
(68, 'In HTML5, which of the following is not a valid value for the type attribute when used with the &lt;command&gt; tag shown below? &lt;command type="?"&gt;Click Me!&lt;/command&gt; ', 'button', 'command', 'checkbox', 'radio', '1'),
(69, 'Which of the following attributes gets hidden when the user clicks on the element that it modifies? (Eg. hint text inside the fields of web forms)', 'autocomplete', 'autofocus', 'placeholder', 'formnovalidate', '3'),
(70, 'The &lt;canvas&gt; element is new to HTML5 and allows you to...', 'draw graphics on a web page using Adobe Flash.', 'draw graphics on a web page using a Java plug-in.', 'draw graphics on a web page using JavaScript APIs.', 'None of these.', '3'),
(71, 'Do all web browsers support all HTML5 features equally?', 'Yes, except for Safari', 'No', 'Yes, except for Firefox', 'Yes, except for Google Chrome', '2'),
(72, 'What does the following code do:  &lt;input type="text" name="user_name"  autofocus="autofocus" /&gt;?', 'Creates a text field on the form being loaded.', 'The browser will automatically give the user_name field focus when the page loads.', 'Loads a form called text.', 'none of these', '2'),
(73, 'Which of the following are the valid values of the &lt;a&gt; elements target attribute in HTML5?', '_blank', '_self', '_top', '_bottom', '1'),
(74, 'How does a button created by the &lt;button&gt; tag differ from the one created by an &lt;input&gt; tag?', 'An input tag button can be a reset button too.', 'A button tag button can be a reset button too.', 'An input tag button can include images as well.', 'A button tag can include images as well.', '4'),
(75, 'What is the internal/wire format of input type="date" in HTML5?', 'DD-MM-YYYY', 'YYYY-MM-DD', 'MM-DD-YYYY', 'YYYY-DD-MM', '2'),
(76, 'Which of the following will restrict an input element to accept only numerical values in a text field?', '&lt;input type="text" pattern="[0-9]*" /&gt;', '&lt;input type="number" /&gt;', '&lt;input type="text" pattern="d*"/&gt;', '&lt;input type="text" pattern="number"/&gt;', '1'),
(77, 'Which of the following is the correct way to display a PDF file in the browser?', '&lt;object type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;object type="application/pdf" id="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" src="filename.pdf" width="100%" height="100%"/&gt;', '1'),
(78, 'Which of the following video file formats are currently supported by the &lt;video&gt; element of HTML5?', 'CCTV', 'MPEG 4', 'Ogg', '3GPP', '2'),
(79, 'Which of the following shows correct use of client-side data validation in HTML5, on username and password fields in particular?', '&lt;input name="username" required /&gt; &lt;input name="pass" type="password" required/&gt;', '&lt;input name="username" validate="true"/&gt; &lt;input name="pass" type="password" validate="true"/&gt;', '&lt;input name="username" validate/&gt; &lt;input name="pass" type="password" validate/&gt;', 'There is no way to implement client-side validation for the username and password fields in HTML5.', '1'),
(80, 'Which of the following is not a valid attribute for the &lt;video&gt; element in HTML5?', 'controls', 'autoplay', 'disabled', 'preload', '3'),
(81, 'Which HTML5 doctype declarations are correct?', '&lt;!doctype html&gt;', '&lt;!DOCTYPE html&gt;', '&lt;!DOCTYPE HTML5&gt;', '&lt;!DOCTYPE HTML&gt;', '2'),
(82, 'Which of the following video tag attributes are invalid in HTML5?', 'play', 'loop', 'mute', 'pause', '4'),
(83, 'The following link is placed on an HTML webpage: &lt;a href="http://msdn.com/" target="_blank"&gt; MSDN &lt;/a&gt; What can be inferred from it?', 'It will open the site msdn.com in the same window.', 'It will open the site msdn.com in a new window.', 'It will open the site msdn.com in a frame below.', 'It will not be clickable as it is not formed correctly.', '2'),
(84, 'What is the limit to the length of HTML attributes?', '65536', '64', 'There is no limit.', 'None of these.', '3'),
(85, 'What is the purpose of the &lt;q&gt; element in HTML5?', 'It is used to define the start of a term in a definition list.', 'It is used to define attribute values for one or more columns in a table.', 'It is used to define the start of a short quotation.', 'It is used to define what to show browsers that do not support the ruby element.', '3'),
(86, 'In HTML5, which of the following is not a valid value for the type attribute when used with the &lt;command&gt; tag shown below? &lt;command type="?"&gt;Click Me!&lt;/command&gt; ', 'button', 'command', 'checkbox', 'radio', '1'),
(87, 'Which of the following attributes gets hidden when the user clicks on the element that it modifies? (Eg. hint text inside the fields of web forms)', 'autocomplete', 'autofocus', 'placeholder', 'formnovalidate', '3'),
(88, 'The &lt;canvas&gt; element is new to HTML5 and allows you to...', 'draw graphics on a web page using Adobe Flash.', 'draw graphics on a web page using a Java plug-in.', 'draw graphics on a web page using JavaScript APIs.', 'None of these.', '3'),
(89, 'Do all web browsers support all HTML5 features equally?', 'Yes, except for Safari', 'No', 'Yes, except for Firefox', 'Yes, except for Google Chrome', '2'),
(90, 'What does the following code do:  &lt;input type="text" name="user_name"  autofocus="autofocus" /&gt;?', 'Creates a text field on the form being loaded.', 'The browser will automatically give the user_name field focus when the page loads.', 'Loads a form called text.', 'none of these', '2'),
(91, 'Which of the following are the valid values of the &lt;a&gt; elements target attribute in HTML5?', '_blank', '_self', '_top', '_bottom', '1'),
(92, 'How does a button created by the &lt;button&gt; tag differ from the one created by an &lt;input&gt; tag?', 'An input tag button can be a reset button too.', 'A button tag button can be a reset button too.', 'An input tag button can include images as well.', 'A button tag can include images as well.', '4'),
(93, 'What is the internal/wire format of input type="date" in HTML5?', 'DD-MM-YYYY', 'YYYY-MM-DD', 'MM-DD-YYYY', 'YYYY-DD-MM', '2'),
(94, 'Which of the following will restrict an input element to accept only numerical values in a text field?', '&lt;input type="text" pattern="[0-9]*" /&gt;', '&lt;input type="number" /&gt;', '&lt;input type="text" pattern="d*"/&gt;', '&lt;input type="text" pattern="number"/&gt;', '1'),
(95, 'Which of the following is the correct way to display a PDF file in the browser?', '&lt;object type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;object type="application/pdf" id="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" data="filename.pdf" width="100%" height="100%"/&gt;', '&lt;input type="application/pdf" src="filename.pdf" width="100%" height="100%"/&gt;', '1'),
(96, 'Which of the following video file formats are currently supported by the &lt;video&gt; element of HTML5?', 'CCTV', 'MPEG 4', 'Ogg', '3GPP', '2'),
(97, 'Which of the following shows correct use of client-side data validation in HTML5, on username and password fields in particular?', '&lt;input name="username" required /&gt; &lt;input name="pass" type="password" required/&gt;', '&lt;input name="username" validate="true"/&gt; &lt;input name="pass" type="password" validate="true"/&gt;', '&lt;input name="username" validate/&gt; &lt;input name="pass" type="password" validate/&gt;', 'There is no way to implement client-side validation for the username and password fields in HTML5.', '1'),
(98, 'Which of the following is not a valid attribute for the &lt;video&gt; element in HTML5?', 'controls', 'autoplay', 'disabled', 'preload', '3'),
(99, 'Which HTML5 doctype declarations are correct?', '&lt;!doctype html&gt;', '&lt;!DOCTYPE html&gt;', '&lt;!DOCTYPE HTML5&gt;', '&lt;!DOCTYPE HTML&gt;', '2'),
(100, 'Which of the following video tag attributes are invalid in HTML5?', 'play', 'loop', 'mute', 'pause', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curden`
--

CREATE TABLE IF NOT EXISTS `curden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCur` int(11) NOT NULL,
  `idUsrDen` int(11) NOT NULL,
  `denuncia` varchar(250) NOT NULL,
  `tipo` char(2) NOT NULL DEFAULT '1',
  `fecha_den` date NOT NULL,
  `admDesc` varchar(250) NOT NULL,
  `destId` int(11) DEFAULT NULL,
  `visto` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idCur` (`idCur`,`idUsrDen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `curden`
--

INSERT INTO `curden` (`id`, `idCur`, `idUsrDen`, `denuncia`, `tipo`, `fecha_den`, `admDesc`, `destId`, `visto`) VALUES
(12, 1, 2, 'ss', '2', '2015-07-06', 'Change your values', 3, '1'),
(13, 1, 2, 'bug', '1', '2015-07-15', 'mensaje', 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `idprofesor` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(500) CHARACTER SET utf8 NOT NULL,
  `imagen` varchar(3) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL DEFAULT '0',
  `curEstado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `idprofesor`, `nombre`, `descripcion`, `imagen`, `curEstado`) VALUES
(1, 3, 'test', 'the test of the courses', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoestudiante`
--

CREATE TABLE IF NOT EXISTS `cursoestudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcurso` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente-estudiante`
--

CREATE TABLE IF NOT EXISTS `docente-estudiante` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idDocente` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idDetalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `docente-estudiante`
--

INSERT INTO `docente-estudiante` (`idDetalle`, `idDocente`, `idEstudiante`) VALUES
(1, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE IF NOT EXISTS `examenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `nota` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `usuario`, `nota`, `fecha`) VALUES
(11, 'teacher', 8, '2015-07-15 23:44:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forum-post`
--

CREATE TABLE IF NOT EXISTS `forum-post` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `user` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `forum-post`
--

INSERT INTO `forum-post` (`id`, `date`, `name`, `nombre`, `user`, `lang`) VALUES
(1, '2015-07-14 18:51:31', 'HTML Introduction', 'IntroducciÃ³n aÂ HTML', 0, 0),
(2, '2015-07-14 19:45:32', 'CSS Introduction', 'IntroducciÃ³n aÂ CSS', 0, 1),
(3, '2015-07-14 19:51:42', 'CSS Introduction', 'Â¿QuÃ© es CSS?', 0, 1),
(4, '2015-07-14 19:53:45', 'What is HTML?', 'Â¿QuÃ© es HTML?', 0, 0),
(5, '2015-07-14 19:57:02', 'Elements and tags', 'Elementos y etiquetas', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

CREATE TABLE IF NOT EXISTS `intentos` (
  `idusuario` int(11) NOT NULL,
  `hora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `intentos`
--

INSERT INTO `intentos` (`idusuario`, `hora`) VALUES
(2, '1427459432'),
(12, '1427997441'),
(12, '1427997447'),
(12, '1427997456'),
(12, '1427998372'),
(12, '1427998377'),
(12, '1427998384'),
(12, '1427998677'),
(12, '1427998681'),
(12, '1427998683'),
(12, '1427998683'),
(12, '1427998754'),
(12, '1427999497'),
(12, '1427999498'),
(12, '1427999499'),
(12, '1427999505'),
(12, '1427999511'),
(1, '1427999538'),
(12, '1427999834'),
(12, '1428000189'),
(12, '1428000191'),
(12, '1428000204'),
(12, '1428000709'),
(12, '1428000711'),
(12, '1428000713'),
(12, '1428000715'),
(12, '1428000716'),
(12, '1428000718'),
(12, '1428000720'),
(12, '1428001094'),
(12, '1428001612'),
(12, '1428100943'),
(12, '1428160410'),
(1, '1428634214'),
(1, '1428634239'),
(3, '1428681313'),
(12, '1429538947'),
(12, '1431117909'),
(14, '1431442807'),
(14, '1431442824'),
(16, '1431696932'),
(16, '1431698476'),
(18, '1436561767'),
(3, '1436994777');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leccion`
--

CREATE TABLE IF NOT EXISTS `leccion` (
  `idleccion` int(11) NOT NULL AUTO_INCREMENT,
  `idcurso` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `teoria` varchar(1000) NOT NULL,
  `filename` int(11) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `lecEstado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idleccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `leccion`
--

INSERT INTO `leccion` (`idleccion`, `idcurso`, `nombre`, `descripcion`, `teoria`, `filename`, `idUsuario`, `lecEstado`) VALUES
(1, 1, 'lesson test', 'the test of the lessons', 'theory', NULL, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leccusua`
--

CREATE TABLE IF NOT EXISTS `leccusua` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `idLeccion` int(11) NOT NULL,
  `resultado` double NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `tiempo` time NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idLeccion` (`idLeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test-courses`
--

CREATE TABLE IF NOT EXISTS `test-courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `test-courses`
--

INSERT INTO `test-courses` (`id`, `id_curso`, `id_user`, `grade`, `date`) VALUES
(1, 4, 12, 8, '2015-07-15 23:53:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test-cursos`
--

CREATE TABLE IF NOT EXISTS `test-cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `curso` int(11) NOT NULL,
  `preguntas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `test-cursos`
--

INSERT INTO `test-cursos` (`id`, `name`, `curso`, `preguntas`) VALUES
(13, 'Examen(IntroducciÃ³n a HTML)', 4, 10),
(14, 'Examen(IntroducciÃ³n a HTML)', 4, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_config`
--

CREATE TABLE IF NOT EXISTS `user_config` (
  `idconfig` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `theme` int(3) NOT NULL DEFAULT '1',
  `banner` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idconfig`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `user_config`
--

INSERT INTO `user_config` (`idconfig`, `iduser`, `theme`, `banner`) VALUES
(1, 1, 1, 5),
(2, 2, 1, 6),
(3, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tb`
--

CREATE TABLE IF NOT EXISTS `usuarios_tb` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nacimiento` date NOT NULL,
  `genero` char(1) DEFAULT NULL,
  `usuario` varchar(30) NOT NULL,
  `contra` varchar(128) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `avatar` int(3) DEFAULT NULL,
  `tipo` char(1) NOT NULL,
  `salt` char(128) NOT NULL,
  `lang` varchar(3) DEFAULT NULL,
  `log` int(11) NOT NULL,
  `estado` char(1) NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Usuarios registrados en Blink' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios_tb`
--

INSERT INTO `usuarios_tb` (`idusuario`, `nombres`, `apellidos`, `nacimiento`, `genero`, `usuario`, `contra`, `descripcion`, `correo`, `avatar`, `tipo`, `salt`, `lang`, `log`, `estado`, `token`) VALUES
(1, 'Ivan Graciano', 'Nolasco Hernandez', '1997-04-02', 'm', 'ivan97', 'e06aca476bf47b001b16c98fe6aff5cb4d613f3bcd4f17007b487e961c47d9425cc9df41558f483ebb6cefc6538d920c1b94db2e88c8996191698d098cbca342', NULL, 'ignh.lel@yandex.com', 35, '1', 'fea5f08ba24bf9a936eb4229f0668989184fff60da11d85f6ffcfce55b26207830bfd4d1f3044512e8b6c4ac0af7d0a8fa52cc574ffa96db1d55ae0f3dc8571f', 'es', 1, '1', NULL),
(2, 'student', 'student', '1997-04-02', 'f', 'student', 'ce68e463a480619bcd7e8e68de00c5097d4475404d510f3b2913ac59ad6ae9370a4aeda7fee18c970b43642f0c1f78d410257f1972a687f1243c5f629e93933f', 'yo soy un estudiante HOLA SEÃ‘O', 'studen@gmail.com', 42, '3', '0f1bda67d51277d26dddb15b3278f04b48cad9058f76c1a62d80a7e3182d572e66bcfa026b5342fcb2d1d3fdaad2f737892575d468312e03425c24521b6000d3', 'es', 1, '1', NULL),
(3, 'teacher', 'teacher', '1997-04-02', 'm', 'teacher', '0dce739d52aac1aaec0a502394fd618beffc1558aa58afd67d15f946246712f0a7fd36f9dc09ef810d476fc4d1e0fd829091d13971e0bb0d8743a11181c05782', NULL, 'teacher@gmail.com', 36, '2', '6a743551a13c42ebedbb7b85ea4924d3c4ee0d4fe054fc1dd34734f4b165abe224fd37cfb6d5a9693ab6f5a685c453186ab755a9c310e3227ff50f322449dfed', 'es', 1, '1', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
