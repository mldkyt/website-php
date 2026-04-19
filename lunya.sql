SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE anonymous_messages (
  id int(11) NOT NULL,
  ip text NOT NULL,
  text text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

CREATE TABLE guestbook (
  id int(11) NOT NULL,
  ip text NOT NULL,
  name text NOT NULL,
  text text NOT NULL,
  approved tinyint(1) NOT NULL DEFAULT 0,
  created_at datetime NOT NULL DEFAULT current_timestamp(),
  reply text DEFAULT NULL,
  reply_at datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

CREATE TABLE videos (
  id varchar(32) NOT NULL,
  ord int(11) NOT NULL,
  title text NOT NULL,
  url text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

CREATE TABLE buttons (
  id int(11) NOT NULL,
  filename varchar(50) NOT NULL,
  alt text NOT NULL,
  url text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

CREATE TABLE `qna` (
  `id` int(11) NOT NULL,
  `ip` text DEFAULT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

CREATE TABLE `views` (
  `date` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

CREATE TABLE `views_expire` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

CREATE TABLE `project_comments` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `project` text NOT NULL,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `approved` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

CREATE TABLE `project_likes` (
  `id` int(11) NOT NULL,
  `project` text NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

ALTER TABLE anonymous_messages
  ADD PRIMARY KEY (id);

ALTER TABLE guestbook
  ADD PRIMARY KEY (id);

ALTER TABLE videos
  ADD PRIMARY KEY (id);

ALTER TABLE buttons
  ADD PRIMARY KEY (id);

ALTER TABLE `qna`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `views`
  ADD PRIMARY KEY (`date`);

ALTER TABLE `views_expire`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `project_comments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `project_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project` (`project`,`ip`) USING HASH;

ALTER TABLE anonymous_messages
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE guestbook
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE videos
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE buttons
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `qna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `views_expire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `project_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `project_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
