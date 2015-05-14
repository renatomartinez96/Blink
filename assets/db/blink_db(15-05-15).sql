-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-05-2015 a las 21:57:27
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

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
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `idprofesor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `idprofesor`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 3, 'Maquetacion Web Basica', 'Maquetacion Web Basica Maquetacion Web Basica Maquetacion Web Basica', NULL),
(2, 3, 'Basic Web Layout', 'Basic Web Layout Basic Web Layout Basic Web Layout Basic Web Layout', NULL),
(3, 1, 'HTML ', 'hola', NULL),
(4, 12, 'curso basico', 'descripcion', NULL),
(5, 3, 'html basico', 'jihsdijsdiasd', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoestudiante`
--

CREATE TABLE IF NOT EXISTS `cursoestudiante` (
  `idcurso` int(11) NOT NULL,
  `idestudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursoestudiante`
--

INSERT INTO `cursoestudiante` (`idcurso`, `idestudiante`) VALUES
(2, 12),
(3, 12),
(1, 12),
(5, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente-estudiante`
--

CREATE TABLE IF NOT EXISTS `docente-estudiante` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idDocente` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  PRIMARY KEY (`idDetalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `docente-estudiante`
--

INSERT INTO `docente-estudiante` (`idDetalle`, `idDocente`, `idEstudiante`) VALUES
(12, 1, 15),
(14, 3, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `comienzo` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `p1` int(11) DEFAULT NULL,
  `r1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `r2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `r3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `r4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `r5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `r6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `r7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `r8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `r9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `r10` int(11) DEFAULT NULL,
  `p11` int(11) DEFAULT NULL,
  `r11` int(11) DEFAULT NULL,
  `p12` int(11) DEFAULT NULL,
  `r12` int(11) DEFAULT NULL,
  `p13` int(11) DEFAULT NULL,
  `r13` int(11) DEFAULT NULL,
  `p14` int(11) DEFAULT NULL,
  `r14` int(11) DEFAULT NULL,
  `p15` int(11) DEFAULT NULL,
  `r15` int(11) DEFAULT NULL,
  `p16` int(11) DEFAULT NULL,
  `r16` int(11) DEFAULT NULL,
  `p17` int(11) DEFAULT NULL,
  `r17` int(11) DEFAULT NULL,
  `p18` int(11) DEFAULT NULL,
  `r18` int(11) DEFAULT NULL,
  `p19` int(11) DEFAULT NULL,
  `r19` int(11) DEFAULT NULL,
  `p20` int(11) DEFAULT NULL,
  `r20` int(11) DEFAULT NULL,
  `p21` int(11) DEFAULT NULL,
  `r21` int(11) DEFAULT NULL,
  `p22` int(11) DEFAULT NULL,
  `r22` int(11) DEFAULT NULL,
  `p23` int(11) DEFAULT NULL,
  `r23` int(11) DEFAULT NULL,
  `p24` int(11) DEFAULT NULL,
  `r24` int(11) DEFAULT NULL,
  `p25` int(11) DEFAULT NULL,
  `r25` int(11) DEFAULT NULL,
  `p26` int(11) DEFAULT NULL,
  `r26` int(11) DEFAULT NULL,
  `p27` int(11) DEFAULT NULL,
  `r27` int(11) DEFAULT NULL,
  `p28` int(11) DEFAULT NULL,
  `r28` int(11) DEFAULT NULL,
  `p29` int(11) DEFAULT NULL,
  `r29` int(11) DEFAULT NULL,
  `p30` int(11) DEFAULT NULL,
  `r30` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(14, '1431442824');

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
  PRIMARY KEY (`idleccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `leccion`
--

INSERT INTO `leccion` (`idleccion`, `idcurso`, `nombre`, `descripcion`, `teoria`, `filename`, `idUsuario`) VALUES
(27, 3, 'Create a a Website', 'Create a a Website Create a a Website Create a a Website Create a a Website', 'Create a a Website Create a a Website Create a a Website Create a a WebsiteCreate a a Website Create a a Website Create a a Website Create a a WebsiteCreate a a Website Create a a Website Create a a Website Create a a Website', NULL, 0),
(28, 3, 'asd', 'ad', 'asd', NULL, 0),
(29, 3, 'jojoojo', '1212', '1212', NULL, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `leccusua`
--

INSERT INTO `leccusua` (`codigo`, `idUsuario`, `idLeccion`, `resultado`, `inicio`, `fin`, `tiempo`) VALUES
(6, 3, 29, 10, '2015-05-14 19:15:55', '2015-05-14 19:16:41', '00:00:46');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Usuarios registrados en Blink' AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `usuarios_tb`
--

INSERT INTO `usuarios_tb` (`idusuario`, `nombres`, `apellidos`, `nacimiento`, `genero`, `usuario`, `contra`, `descripcion`, `correo`, `avatar`, `tipo`, `salt`, `lang`, `log`, `estado`, `token`) VALUES
(1, 'Miguel Alejandro', 'Lopez Barrientos', '1997-10-07', NULL, 'mlopez', 'db9da5806dedebe0788eb6712f913d4ff0c814f61b9a36dcf3f46f91f64471e67e89d7b1e2c55c1a65e3205de833005782bef54e6a89a514e6e2542ee41206eb', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et massa ac nisi consectetur dignissim. Aenean at lectus suscipit, hendrerit dolor vestibulum, aliquet ligula. Vestibulum bibendum augue vitae ante ultricies dapibus. Sed sed nisl non dolor elementum suscipit vel at nibh. Praesent quis dui', 'miguel@mail.com', 36, '2', '23daad667aa164c3eee0313d94b3e0f831f97b0aec7fd4f6447ae4f98a83db8c777b4066788ce8e1d8913a01fd9e3ba4b7608cacdce0670441ba114ec3a75844', NULL, 1, '1', NULL),
(3, 'Renato Andres', 'Reyes Martinez', '1996-12-20', NULL, 'renato96', '4d803a565542e01c1b9fa274661a4a054b21485002e048811aff8c1807e3574cb14ddfe6c008d9bac733f930b00b3ceedf73637ab0eb0303ce766a05131ff223', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et massa ac nisi consectetur dignissim. Aenean at lectus suscipit, hendrerit dolor vestibulum, aliquet ligula. Vestibulum bibendum augue vitae ante ultricies dapibus. Sed sed nisl non dolor elementum suscipit vel at nibh. Praesent quis dui', 'renatomartinez96@gmail.com', 35, '2', '1154ccfa82eb54d473b595451670ef7c7e869fe65a454788c5132d399bf1aef3bfb4789d5f472d2dedc8f8bfe15cc4d684659c68e005283d60b655e86e064816', NULL, 1, '0', NULL),
(12, 'Gerardo Antonio', 'Lopez Barrientos', '1997-10-07', NULL, 'glopez97', 'd349bae9a728cf8d95fdc6354d147e58aec215e9019f45ebfd0cca8f0acac2edc5b697fbb9ffe7dbf6ff658887e525eda22948f068bcae8467397761af4e6ab7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et massa ac nisi consectetur dignissim. Aenean at lectus suscipit, hendrerit dolor vestibulum, aliquet ligula. Vestibulum bibendum augue vitae ante ultricies dapibus. Sed sed nisl non dolor elementum suscipit vel at nibh. Praesent quis dui', 'gerardo.antonio97@gmail.com', 22, '3', '971da9e2d475d01068eeb2c6110acffa706051bc489395892a3e86264312252869719be7e7633a13defd0ab3f1478cb7e376a9f6e6d100bf986961dde14d03d4', NULL, 1, '1', NULL),
(14, 'Gerardo Antonio', 'Lopez Barrientos', '1997-10-07', NULL, 'g_lopez97', 'c05a3fd7e3355aaaa16b1ba446c404923bd3ee26599565ee1ea4db2315b2830dff82f3dbe4bc06ce744ed9981ae649cb861ad8d3f8ca7e2a9183199b6ee216f4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et massa ac nisi consectetur dignissim. Aenean at lectus suscipit, hendrerit dolor vestibulum, aliquet ligula. Vestibulum bibendum augue vitae ante ultricies dapibus. Sed sed nisl non dolor elementum suscipit vel at nibh. Praesent quis dui', 'gerardo.antonio20@hotmail.com', 22, '2', 'bafb28a96b0267f68aadcb240cfbd420a4702d1d1baf74f303add5eb52e451478555495f8328ed089a82f8a4b6e4207bff8a93a76a2e7c65a0de0053ac3663d8', NULL, 0, '0', '826a0af530ac708566bf8a5698518df2'),
(15, 'Miguel Antonio', 'LÃ³pez Barrientos', '1997-10-07', NULL, 'mlopez123', 'ca6fb92588a1ee1f302897a73c59ce81142a6fd6ca03958f2a8350b1ffbc30798c72973247a8b2033ace7e6c6972febda0ce0b9b1971b2cad673712651399d48', NULL, 'malc@mail.com', 33, '3', 'd7efc1330964575a322dd6ad89ff94174c6ccd74259c8a3c80b2f121c41b02ee183f9b18d0840c435d46d12fd8fbc83c4f7d6a7ef98bc32c0abe0b1a08628414', NULL, 1, '1', '85f9827f2a2c0bae76efaafe1afbb220');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
