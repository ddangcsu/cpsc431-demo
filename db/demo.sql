-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2016 at 09:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--
-- DROP DATABASE `demo`;
CREATE DATABASE IF NOT EXISTS `demo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `demo`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `articleId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `createdDate` date NOT NULL,
  `modifiedDate` date NOT NULL,
  PRIMARY KEY (`articleId`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleId`, `categoryId`, `title`, `content`, `createdDate`, `modifiedDate`) VALUES
(1, 7, 'Find files base on the size of the file', '<p>Use find command to find files base on file size.</p><p>Example below is to find files on the report repository that has a size of &gt; 5MB</p><pre><code class="language-bash">find /cygdrive/f/psreports/hsmprd/*/*/ -type f -size +5000k -exec ls -lh {} \\; | awk ''{print $9": " $5}'' &gt; d:/hsmprd_file.log</code></pre><p>Example of&nbsp;Find a list of files that contain the word hello in a certain directory:</p><pre><code class="language-bash">find /directory -type f -exec grep -l hello {} \\;</code></pre><p>Example of using xargs to perform the similar to find the similar data contents:</p><pre><code class="language-bash">find /directory -type f -print0 | xargs -0 grep -l hello</code></pre><p>Example to delete a list of files owned by you in /tmp:</p><pre><code class="language-bash">find /tmp -user ddang -exec rm -rf {} \\;\r\nfind /tmp -user ddang -print0 | xargs -0 rm -rf</code></pre><p>&nbsp;</p>', '2016-04-03', '2016-04-09'),
(3, 16, 'HTML 5 FormData API', '<p>In HTML 5 one can use the FormData function to build form data through Javascript.</p><pre><code class="language-javascript">For example:\r\n\r\n// Instantiate the FormData API\r\nvar form = new FormData();\r\n\r\n// Append FormData\r\nform.append("name1", "value1");\r\n\r\n// Use AJAX to submit the form data\r\n$.ajax({ url: "http://localhost/post", data: form });</code></pre><p>&nbsp;</p>', '2016-04-04', '2016-04-08'),
(4, 12, 'Method chaining', '<p>In Code Igniter framework, one can use chaining method to simplify the call.</p><pre><code class="language-php">// For example Instead of calling it as follow:\r\n$this-&gt;db-&gt;where(''id'', $articleId);\r\n$this-&gt;db-&gt;get(''articles'');\r\n\r\n// You can do this:\r\n$this-&gt;db-&gt;where(''id'', $articleId) -&gt;get(''articles);</code></pre><p>&nbsp;</p>', '2016-04-04', '2016-04-08'),
(5, 15, 'Alternate background color for tables', '<p>Sometimes it&#39;s nice to alternate the color of a table to make it easy to see For example we have the following table:</p><pre><code class="language-markup">&lt;table&gt;\r\n&lt;tr&gt;&lt;td&gt;Row 1&lt;/td&gt;&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;Row 2&lt;/td&gt;&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;Row 3&lt;/td&gt;&lt;/tr&gt;\r\n&lt;tr&gt;&lt;td&gt;Row 4&lt;/td&gt;&lt;/tr&gt;\r\n&lt;/table&gt;</code></pre><p>In CSS we can use selector to pick out all the odd table row and change the background color to linen:</p><pre><code class="language-css">table tr:nth-child(odd) { \r\n    background-color: linen; \r\n}</code></pre><p>&nbsp;</p>', '2016-04-04', '2016-04-08'),
(6, 7, 'ssh and scp on server with multiple IP addresses', '<p>Server is configured with 3 IP addresses:</p><p>Address 1: 192.168.0.1 &nbsp;is the primary IP address</p><p>Address 2: &nbsp;192.168.0.50 is the secondary IP address</p><p>By default, when we ssh or scp to another server, the system will use Address 1 as the default source IP address. However if we need to use address 2 as the source (possibly due to firewall rules), we can change the bind address for these program as follow:</p><pre><code class="language-bash">ssh -b &lt;Address 2&gt; &lt;user&gt;@&lt;remote_server&gt;\r\n\r\ni.e: if login using public/private key\r\nssh -b 192.168.0.50 -l dev_user -i ~/.ssh/dev_user_key git_server\r\n\r\nor login via password:\r\nssh -b 192.168.0.50 dev_user@git_server</code></pre><p>For scp, we have to change it a bit different:</p><pre><code class="language-bash">scp -oBindAddress=&lt;bind_address&gt; /path/to/local_file &lt;user&gt;@&lt;remote_server&gt;:/remote_path\r\n\r\ni.e. copy via public/private key\r\nscp -oBindAddress=192.168.0.50 -i ~/.ssh/dev_user_key /tmp/file.cpp dev_user@git_server:/tmp/dev_user\r\n\r\nor via password:\r\nscp -oBindAddress=192.168.0.50 /tmp/file.cpp dev_user@git_server:/tmp/dev_user</code></pre><p>&nbsp;</p>', '2016-04-08', '2016-04-08'),
(7, 6, 'Some dummy example article for Linux', '<p>Here&#39;s some examples</p><pre><code class="language-php">$test = "123";</code></pre><p>&nbsp;</p>', '2016-04-08', '2016-04-08'),
(8, 12, 'Sample code for a controller', '<p>The controller is treated as a traffic cop which handle all request via public method. &nbsp;Below is an example of a simple controller with a single method, index.</p><pre><code class="language-php">&lt;?php\r\ndefined(''BASEPATH'') OR exit(''No direct script access allowed'');\r\n\r\nclass Categories extends CI_Controller {\r\n\r\n    // Constructor to load the model (database)\r\n    public function __construct() {\r\n        parent::__construct();\r\n        // Pull in the Categories model\r\n        $this-&gt;load-&gt;model(''categories_model'', ''categories'');\r\n        $this-&gt;load-&gt;model(''articles_model'', ''articles'');\r\n    }\r\n\r\n    public function index() {\r\n        echo "Hello World from Categories controller";\r\n    }\r\n\r\n}\r\n\r\n?&gt;</code></pre><p>Now to use it, just direct codeigniter application to http://localhost/project/categories</p><p>&nbsp;</p>', '2016-04-09', '2016-04-09'),
(9, 24, 'Find frequency in an Array', '<p>This is one way to build the frequency Array from another Array. &nbsp;This logic does not require the original array to be sorted. &nbsp;Below is the logic:<br />1. &nbsp;Create a dynamic array with the same size as the current Array<br />2. &nbsp;Loop through the original array<br />3. &nbsp;Compare the current position data with value from 0 to current to see if it has a match<br />4. &nbsp;If it has a match, increase the freqency by 1, then move to the next position<br /><br />The logic below will self increment to 1 because of freqIndex &lt;= currentIndex when it&#39;s a new entry to track.</p><pre><code class="language-cpp">// First declare an dynamic array to whole the frequency\r\nint* freqArray = new int[Size];\r\n\r\nfor (int currentIndex = 0; currentIndex &lt; Size; currentIndex++) {\r\n\r\n    freqArray[currentIndex] = 0; // Initialize the freqArray\r\n          \r\n          // This loop will check from 0 to the current Index\r\n          for (int freqIndex = 0; freqIndex &lt;= currentIndex; freqIndex++) {\r\n          \r\n            // If the value of the currentIndex match with any of the freqency Index\r\n            // Then add 1 to it and break the loop to move to the next Index\r\n               if (dArray[freqIndex] == dArray[currentIndex]) {\r\n                    freqArray[index] +=1;\r\n                    break;\r\n               }\r\n          }\r\n\r\n}</code></pre><p>&nbsp;</p>', '2016-04-09', '2016-04-09'),
(10, 24, 'Accepting arguments from command line', '<p>Below is the code snippet to demonstrate how to accept arguments from command line:</p><pre><code class="language-cpp">#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\nint main (int argc, const char* argv[]) {\r\n  // argc is the argument count\r\n  // argv is an array according to the count\r\n  // argv[0] is the program name itself.\r\n  // argv[n] is the n argument passed through the command line\r\n\r\n  ... // Code here\r\n\r\n  system("pause");\r\n  return 0;\r\n}</code></pre><p>&nbsp;</p>', '2016-04-09', '2016-04-09'),
(11, 8, 'Setup web server log rotate', '<p>One can use the delivered&nbsp; log rotate functionality from within linux to handle log rotate.<br />Example of setup log rotate for a virtual hosts on dhdhome.info domain.<br />The structure of dhdhome.info directory is as follow:</p><pre><code>/opt/domain/dhdhome.info/default/logs &lt;- This is for the main web server.\r\n/opt/domain/dhdhome.info/kb/logs &lt;- This is for the subdomain web server.</code></pre><p>Setup the Log Rotation:</p><pre><code class="language-bash">sudo su\r\ncd /etc/logrotate.d\r\nvi apache2-vhost</code></pre><p>Add the following to the file:</p><pre><code class="language-bash">"/opt/domain/*/*/logs/*.log" {\r\n    missingok\r\n    copytruncate\r\n    rotate 7\r\n    compress\r\n    notifempty\r\n    create 640 root adm\r\n    sharedscripts\r\n    postrotate\r\n    if [ -f "`. /etc/apache2/envvars ; echo ${APACHE_PID_FILE:-/var/run/apache2.pid}`" ]\r\n    then\r\n      /etc/init.d/apache2 reload &gt; /dev/null\r\n    fi\r\n    endscript\r\n}</code></pre><p>Now reload the cron daemon to make sure it pickup the new file (Ubuntu):</p><pre><code class="language-bash">/etc/init.d/cron reload</code></pre><p>&nbsp;</p>', '2016-04-09', '2016-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `articles_tags`
--

CREATE TABLE IF NOT EXISTS `articles_tags` (
  `articleId` int(11) unsigned NOT NULL,
  `tagId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`tagId`,`articleId`),
  KEY `articlestags_articles_FK` (`articleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(11) unsigned DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`categoryId`),
  KEY `PARENTID_IDX` (`parentId`) COMMENT 'Parent ID Indexes'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `parentId`, `name`, `description`) VALUES
(5, NULL, 'Operating System ', 'Category to hold articles relevant to a specific type of Operating System such as Linux, Windows, Unix'),
(6, 5, 'Linux', 'Linux HowTo, Notes, Documents'),
(7, 5, 'Unix Solaris', 'Oracle Solaris documents and information'),
(8, NULL, 'Server Setup and Configuration', 'Category for articles on setup various server such as WAMP, FTP, MySQL, Web Server, PHP Server'),
(9, NULL, 'Web Development', 'Technologies and Tools use in Web Development'),
(10, 9, 'PHP Programming Language ', 'PHP code snippet, howto'),
(12, 10, 'Code Igniter Framework', 'Information and code snippet for Code Igniter Framework some thing long in the description to see it wrap around.'),
(14, 9, 'Web front end UI development tools', 'HTML/CSS/Java Scripts'),
(15, 14, 'CSS and CSS Framework', 'Articles about CSS, Bootstrap, Material Design Lite, or any other CSS framework'),
(16, 14, 'Javascripts', 'Java Script Framework, jQuery, AngularJS, JavaScript libraries'),
(23, NULL, 'Programming', 'General programming languages'),
(24, 23, 'C/C++', 'Programming code snippet or howto for C and C++');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tagId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`tagId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagId`, `name`) VALUES
(1, 'PHP'),
(2, 'CSS'),
(3, 'JavaScript'),
(4, 'Operating System'),
(5, 'HTML5'),
(6, 'jQuery'),
(7, 'Howto');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `ArticleCategory_FK` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`);

--
-- Constraints for table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD CONSTRAINT `articlestags_articles_FK` FOREIGN KEY (`articleId`) REFERENCES `articles` (`articleId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `articletags_tags_FK` FOREIGN KEY (`tagId`) REFERENCES `tags` (`tagId`) ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `ParentCategory_FK` FOREIGN KEY (`parentId`) REFERENCES `categories` (`categoryId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



--
-- Recreate the demo user with password demo
--
GRANT USAGE ON *.* TO 'demo'@'%' IDENTIFIED BY PASSWORD '*C142FB215B6E05B7C134B1A653AD4B455157FD79';

--
-- Regrant all privileges to demo database to demo
--
GRANT ALL PRIVILEGES ON `demo`.* TO 'demo'@'%' WITH GRANT OPTION;
