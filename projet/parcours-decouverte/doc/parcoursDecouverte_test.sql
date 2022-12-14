-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.5.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table parcours-decouverte.candidat: ~387 rows (approximately)
/*!40000 ALTER TABLE `candidat` DISABLE KEYS */;
INSERT INTO `candidat` (`id`, `user_id`, `evenement_id`, `nom`, `prenom`) VALUES
	(1, 2, 1, 'bon', 'jean'),
	(2, 2, 1, 'tale', 'marrie'),
	(3, 2, 8, 'deloin', 'alain'),
	(4, 2, 2, 'pecheur', 'martin'),
	(5, 2, 2, 'June', 'brie'),
	(9, 16, 23, 'test', 'test'),
	(11, 16, 23, 'blatte', 'blate'),
	(12, 16, 23, 'test', 'test'),
	(13, 16, 23, 'test', 'test'),
	(14, 16, 23, 'test', 'test'),
	(15, 16, 23, 'test', 'test'),
	(16, 16, 24, 'test', 'test'),
	(17, 16, 24, 'test', 'test'),
	(18, 16, 24, 'test', 'test'),
	(19, 16, 24, 'test', 'test'),
	(20, 16, 24, 'test', 'test'),
	(21, 16, 24, 'test', 'test'),
	(22, 16, 24, 'test', 'test'),
	(23, 16, 25, 'test', 'test'),
	(24, 16, 25, 'test', 'test'),
	(25, 16, 25, 'test', 'test'),
	(26, 16, 25, 'test', 'test'),
	(27, 16, 25, 'test', 'test'),
	(28, 16, 25, 'test', 'test'),
	(29, 16, 26, 'test', 'test'),
	(30, 16, 26, 'test', 'test'),
	(31, 16, 26, 'test', 'test'),
	(32, 16, 26, 'test', 'test'),
	(33, 16, 26, 'test', 'test'),
	(34, 16, 26, 'test', 'test'),
	(35, 16, 26, 'test', 'test'),
	(36, 16, 27, 'test', 'test'),
	(37, 16, 27, 'test', 'test'),
	(38, 16, 27, 'test', 'test'),
	(39, 16, 27, 'test', 'test'),
	(40, 16, 28, 'test', 'test'),
	(41, 16, 28, 'test', 'test'),
	(42, 16, 28, 'test', 'test'),
	(43, 16, 9, 'test', 'test'),
	(44, 16, 35, 'test', 'test'),
	(45, 16, 35, 'test', 'test'),
	(46, 16, 35, 'test', 'test'),
	(47, 16, 35, 'test', 'test'),
	(48, 16, 35, 'test', 'test'),
	(49, 16, 35, 'test', 'test'),
	(50, 16, 35, 'test', 'test'),
	(51, 16, 35, 'test', 'test'),
	(52, 16, 36, 'test', 'test'),
	(53, 16, 36, 'test', 'test'),
	(54, 16, 36, 'test', 'test'),
	(55, 16, 37, 'test', 'test'),
	(56, 16, 31, 'test', 'test'),
	(57, 16, 38, 'test', 'test'),
	(58, 16, 38, 'test', 'test'),
	(59, 16, 39, 'test', 'test'),
	(60, 16, 40, 'test', 'test'),
	(61, 16, 46, 'test', 'test'),
	(62, 16, 46, 'test', 'test'),
	(63, 16, 46, 'test', 'test'),
	(64, 16, 40, 'test', 'test'),
	(65, 16, 40, 'test', 'test'),
	(66, 16, 41, 'test', 'test'),
	(67, 16, 41, 'test', 'test'),
	(68, 16, 41, 'test', 'test'),
	(69, 16, 42, 'test', 'test'),
	(70, 16, 42, 'test', 'test'),
	(71, 16, 43, 'test', 'test'),
	(72, 16, 43, 'test', 'test'),
	(73, 16, 43, 'test', 'test'),
	(74, 16, 44, 'test', 'test'),
	(75, 16, 44, 'test', 'test'),
	(76, 16, 45, 'test', 'test'),
	(77, 16, 45, 'test', 'test'),
	(78, 16, 46, 'test', 'test'),
	(79, 16, 46, 'test', 'test'),
	(80, 16, 46, 'test', 'test'),
	(81, 16, 47, 'test', 'test'),
	(82, 16, 47, 'test', 'test'),
	(83, 16, 16, 'test', 'test'),
	(84, 16, 48, 'test', 'test'),
	(85, 16, 48, 'test', 'test'),
	(86, 16, 49, 'test', 'test'),
	(87, 16, 49, 'test', 'test'),
	(88, 16, 50, 'test', 'test'),
	(89, 16, 50, 'test', 'test'),
	(90, 16, 50, 'test', 'test'),
	(91, 16, 50, 'test', 'test'),
	(92, 16, 50, 'test', 'test'),
	(93, 16, 51, 'test', 'test'),
	(94, 16, 51, 'test', 'test'),
	(95, 16, 51, 'test', 'test'),
	(96, 16, 51, 'test', 'test'),
	(97, 16, 51, 'test', 'test'),
	(98, 16, 52, 'test', 'test'),
	(99, 16, 52, 'test', 'test'),
	(100, 16, 53, 'test', 'test'),
	(101, 16, 53, 'test', 'test'),
	(102, 16, 53, 'test', 'test'),
	(103, 16, 54, 'test', 'test'),
	(104, 16, 54, 'test', 'test'),
	(105, 16, 54, 'test', 'test'),
	(106, 16, 55, 'test', 'test'),
	(107, 16, 50, 'test', 'test'),
	(108, 16, 55, 'test', 'test'),
	(109, 16, 55, 'test', 'test'),
	(110, 16, 55, 'test', 'test'),
	(111, 16, 56, 'test', 'test'),
	(112, 16, 56, 'test', 'test'),
	(113, 16, 56, 'test', 'test'),
	(114, 16, 56, 'test', 'test'),
	(115, 16, 57, 'test', 'test'),
	(116, 16, 57, 'test', 'test'),
	(117, 16, 57, 'test', 'test'),
	(118, 16, 57, 'test', 'test'),
	(119, 16, 57, 'test', 'test'),
	(120, 16, 57, 'test', 'test'),
	(121, 16, 58, 'test', 'test'),
	(122, 16, 58, 'test', 'test'),
	(123, 16, 58, 'test', 'test'),
	(124, 16, 59, 'test', 'test'),
	(125, 16, 59, 'test', 'test'),
	(126, 16, 59, 'test', 'test'),
	(202, 11, 25, 'test', 'test'),
	(203, 11, 27, 'test', 'test'),
	(204, 11, 27, 'test', 'test'),
	(205, 11, 28, 'test', 'test'),
	(206, 11, 29, 'test', 'test'),
	(207, 11, 30, 'test', 'test'),
	(208, 11, 31, 'test', 'test'),
	(209, 11, 60, 'test', 'test'),
	(210, 11, 35, 'test', 'test'),
	(211, 11, 37, 'test', 'test'),
	(212, 11, 38, 'test', 'test'),
	(213, 11, 38, 'test', 'test'),
	(214, 11, 38, 'test', 'test'),
	(215, 11, 38, 'test', 'test'),
	(216, 11, 38, 'test', 'test'),
	(217, 11, 39, 'test', 'test'),
	(218, 11, 40, 'test', 'test'),
	(219, 11, 40, 'test', 'test'),
	(220, 11, 40, 'test', 'test'),
	(221, 11, 41, 'test', 'test'),
	(222, 11, 42, 'test', 'test'),
	(223, 11, 43, 'test', 'test'),
	(224, 11, 43, 'test', 'test'),
	(225, 11, 44, 'test', 'test'),
	(226, 11, 46, 'test', 'test'),
	(227, 11, 46, 'test', 'test'),
	(228, 11, 24, 'test', 'test'),
	(229, 11, 24, 'test', 'test'),
	(230, 11, 28, 'test', 'test'),
	(231, 11, 28, 'test', 'test'),
	(232, 11, 27, 'test', 'test'),
	(233, 11, 28, 'test', 'test'),
	(234, 11, 53, 'test', 'test'),
	(235, 11, 53, 'test', 'test'),
	(236, 11, 53, 'test', 'test'),
	(237, 11, 54, 'test', 'test'),
	(238, 11, 54, 'test', 'test'),
	(239, 11, 55, 'test', 'test'),
	(240, 11, 55, 'test', 'test'),
	(241, 11, 55, 'test', 'test'),
	(242, 11, 56, 'test', 'test'),
	(243, 11, 56, 'test', 'test'),
	(244, 11, 56, 'test', 'test'),
	(245, 11, 59, 'test', 'test'),
	(246, 11, 58, 'test', 'test'),
	(247, 12, 23, 'test', 'test'),
	(248, 12, 23, 'test', 'test'),
	(249, 12, 23, 'test', 'test'),
	(250, 12, 23, 'test', 'test'),
	(251, 12, 23, 'test', 'test'),
	(252, 12, 24, 'test', 'test'),
	(253, 12, 24, 'test', 'test'),
	(254, 12, 24, 'test', 'test'),
	(255, 12, 24, 'test', 'test'),
	(256, 12, 25, 'test', 'test'),
	(257, 12, 25, 'test', 'test'),
	(258, 12, 25, 'test', 'test'),
	(259, 12, 25, 'test', 'test'),
	(260, 12, 26, 'test', 'test'),
	(261, 12, 26, 'test', 'test'),
	(262, 12, 26, 'test', 'test'),
	(263, 12, 26, 'test', 'test'),
	(264, 12, 26, 'test', 'test'),
	(265, 12, 27, 'test', 'test'),
	(266, 12, 27, 'test', 'test'),
	(267, 12, 27, 'test', 'test'),
	(268, 12, 27, 'test', 'test'),
	(269, 12, 27, 'test', 'test'),
	(270, 12, 27, 'test', 'test'),
	(271, 12, 27, 'test', 'test'),
	(272, 12, 28, 'test', 'test'),
	(273, 12, 29, 'test', 'test'),
	(274, 12, 30, 'test', 'test'),
	(275, 12, 30, 'test', 'test'),
	(276, 12, 30, 'test', 'test'),
	(277, 12, 30, 'test', 'test'),
	(278, 12, 30, 'test', 'test'),
	(279, 12, 30, 'test', 'test'),
	(280, 12, 31, 'test', 'test'),
	(281, 12, 26, 'test', 'test'),
	(282, 12, 35, 'test', 'test'),
	(283, 12, 35, 'test', 'test'),
	(284, 12, 35, 'test', 'test'),
	(285, 12, 35, 'test', 'test'),
	(286, 12, 35, 'test', 'test'),
	(287, 12, 37, 'test', 'test'),
	(288, 12, 37, 'test', 'test'),
	(289, 12, 37, 'test', 'test'),
	(290, 12, 37, 'test', 'test'),
	(291, 12, 37, 'test', 'test'),
	(292, 12, 39, 'test', 'test'),
	(293, 12, 39, 'test', 'test'),
	(294, 12, 39, 'test', 'test'),
	(295, 12, 39, 'test', 'test'),
	(296, 12, 39, 'test', 'test'),
	(297, 12, 39, 'test', 'test'),
	(298, 12, 39, 'test', 'test'),
	(299, 12, 39, 'test', 'test'),
	(300, 12, 40, 'test', 'test'),
	(301, 12, 40, 'test', 'test'),
	(302, 12, 40, 'test', 'test'),
	(303, 12, 40, 'test', 'test'),
	(304, 12, 40, 'test', 'test'),
	(305, 12, 40, 'test', 'test'),
	(306, 12, 42, 'test', 'test'),
	(307, 12, 42, 'test', 'test'),
	(308, 12, 42, 'test', 'test'),
	(309, 12, 42, 'test', 'test'),
	(310, 12, 42, 'test', 'test'),
	(311, 12, 45, 'test', 'test'),
	(312, 12, 45, 'test', 'test'),
	(313, 12, 45, 'test', 'test'),
	(314, 12, 45, 'test', 'test'),
	(315, 12, 45, 'test', 'test'),
	(316, 12, 48, 'test', 'test'),
	(317, 12, 48, 'test', 'test'),
	(318, 12, 48, 'test', 'test'),
	(319, 12, 48, 'test', 'test'),
	(320, 12, 50, 'test', 'test'),
	(321, 12, 50, 'test', 'test'),
	(322, 12, 50, 'test', 'test'),
	(323, 12, 50, 'test', 'test'),
	(324, 12, 50, 'test', 'test'),
	(325, 12, 55, 'test', 'test'),
	(326, 12, 55, 'test', 'test'),
	(327, 12, 55, 'test', 'test'),
	(328, 12, 55, 'test', 'test'),
	(329, 12, 57, 'test', 'test'),
	(330, 12, 57, 'test', 'test'),
	(331, 12, 57, 'test', 'test'),
	(332, 12, 57, 'test', 'test'),
	(333, 12, 57, 'test', 'test'),
	(334, 12, 59, 'test', 'test'),
	(335, 12, 59, 'test', 'test'),
	(336, 12, 59, 'test', 'test'),
	(337, 12, 59, 'test', 'test'),
	(338, 12, 59, 'test', 'test'),
	(339, 12, 59, 'test', 'test'),
	(340, 13, 23, 'test', 'test'),
	(341, 13, 23, 'test', 'test'),
	(342, 13, 23, 'test', 'test'),
	(343, 13, 31, 'test', 'test'),
	(344, 13, 31, 'test', 'test'),
	(345, 13, 31, 'test', 'test'),
	(346, 13, 31, 'test', 'test'),
	(347, 13, 31, 'test', 'test'),
	(348, 13, 34, 'test', 'test'),
	(349, 13, 34, 'test', 'test'),
	(350, 13, 34, 'test', 'test'),
	(351, 13, 36, 'test', 'test'),
	(352, 13, 36, 'test', 'test'),
	(353, 13, 36, 'test', 'test'),
	(354, 13, 36, 'test', 'test'),
	(355, 13, 40, 'test', 'test'),
	(356, 13, 40, 'test', 'test'),
	(357, 13, 40, 'test', 'test'),
	(358, 13, 40, 'test', 'test'),
	(359, 13, 40, 'test', 'test'),
	(360, 13, 45, 'test', 'test'),
	(361, 13, 45, 'test', 'test'),
	(362, 13, 45, 'test', 'test'),
	(363, 13, 45, 'test', 'test'),
	(364, 13, 52, 'test', 'test'),
	(365, 13, 52, 'test', 'test'),
	(366, 13, 52, 'test', 'test'),
	(367, 14, 25, 'test', 'test'),
	(368, 14, 25, 'test', 'test'),
	(369, 14, 25, 'test', 'test'),
	(370, 14, 28, 'test', 'test'),
	(371, 14, 28, 'test', 'test'),
	(372, 14, 28, 'test', 'test'),
	(373, 14, 29, 'test', 'test'),
	(374, 14, 31, 'test', 'test'),
	(375, 14, 32, 'test', 'test'),
	(376, 14, 33, 'test', 'test'),
	(377, 14, 34, 'test', 'test'),
	(378, 14, 35, 'test', 'test'),
	(379, 14, 37, 'test', 'test'),
	(380, 14, 38, 'test', 'test'),
	(381, 14, 38, 'test', 'test'),
	(382, 14, 38, 'test', 'test'),
	(383, 14, 39, 'test', 'test'),
	(384, 14, 40, 'test', 'test'),
	(385, 14, 41, 'test', 'test'),
	(386, 14, 42, 'test', 'test'),
	(387, 14, 43, 'test', 'test'),
	(388, 14, 44, 'test', 'test'),
	(389, 14, 45, 'test', 'test'),
	(390, 14, 46, 'test', 'test'),
	(391, 14, 47, 'test', 'test'),
	(392, 14, 48, 'test', 'test'),
	(393, 14, 49, 'test', 'test'),
	(394, 14, 50, 'test', 'test'),
	(395, 14, 51, 'test', 'test'),
	(396, 14, 52, 'test', 'test'),
	(397, 14, 53, 'test', 'test'),
	(398, 14, 54, 'test', 'test'),
	(399, 14, 55, 'test', 'test'),
	(400, 14, 56, 'test', 'test'),
	(401, 14, 56, 'test', 'test'),
	(402, 14, 56, 'test', 'test'),
	(403, 14, 56, 'test', 'test'),
	(404, 14, 57, 'test', 'test'),
	(405, 14, 57, 'test', 'test'),
	(406, 14, 58, 'test', 'test'),
	(407, 14, 58, 'test', 'test'),
	(408, 14, 58, 'test', 'test'),
	(409, 14, 59, 'test', 'test'),
	(410, 14, 59, 'test', 'test'),
	(411, 14, 60, 'test', 'test'),
	(412, 14, 60, 'test', 'test'),
	(413, 15, 24, 'test', 'test'),
	(414, 15, 24, 'test', 'test'),
	(415, 15, 25, 'test', 'test'),
	(416, 15, 26, 'test', 'test'),
	(417, 15, 27, 'test', 'test'),
	(418, 15, 27, 'test', 'test'),
	(419, 15, 28, 'test', 'test'),
	(420, 15, 28, 'test', 'test'),
	(421, 15, 29, 'test', 'test'),
	(422, 15, 30, 'test', 'test'),
	(423, 15, 30, 'test', 'test'),
	(424, 15, 30, 'test', 'test'),
	(425, 15, 33, 'test', 'test'),
	(426, 15, 31, 'test', 'test'),
	(427, 15, 31, 'test', 'test'),
	(428, 15, 37, 'test', 'test'),
	(429, 15, 37, 'test', 'test'),
	(430, 15, 37, 'test', 'test'),
	(431, 15, 37, 'test', 'test'),
	(432, 15, 37, 'test', 'test'),
	(433, 15, 40, 'test', 'test'),
	(434, 15, 41, 'test', 'test'),
	(435, 15, 41, 'test', 'test'),
	(436, 15, 41, 'test', 'test'),
	(437, 15, 45, 'test', 'test'),
	(438, 15, 45, 'test', 'test'),
	(439, 15, 45, 'test', 'test'),
	(440, 15, 46, 'test', 'test'),
	(441, 15, 46, 'test', 'test'),
	(442, 15, 46, 'test', 'test'),
	(443, 15, 50, 'test', 'test'),
	(444, 15, 50, 'test', 'test'),
	(445, 15, 53, 'test', 'test'),
	(446, 15, 53, 'test', 'test'),
	(447, 15, 53, 'test', 'test'),
	(448, 15, 53, 'test', 'test'),
	(449, 15, 53, 'test', 'test'),
	(450, 15, 57, 'test', 'test'),
	(451, 15, 57, 'test', 'test'),
	(452, 15, 57, 'test', 'test'),
	(453, 15, 57, 'test', 'test'),
	(454, 15, 57, 'test', 'test'),
	(455, 15, 58, 'test', 'test'),
	(456, 15, 58, 'test', 'test'),
	(457, 15, 58, 'test', 'test'),
	(458, 15, 60, 'test', 'test'),
	(459, 15, 60, 'test', 'test'),
	(460, 15, 60, 'test', 'test'),
	(461, 15, 60, 'test', 'test'),
	(462, 28, 57, 'test', 'test'),
	(463, 29, 58, 'test', 'test'),
	(464, 30, 59, 'test', 'test'),
	(465, 3, 7, 'Deloin', 'Alain'),
	(466, 17, 26, 'Detresloin', 'Alain');
/*!40000 ALTER TABLE `candidat` ENABLE KEYS */;

-- Dumping data for table parcours-decouverte.evenement: ~72 rows (approximately)
/*!40000 ALTER TABLE `evenement` DISABLE KEYS */;
INSERT INTO `evenement` (`id`, `user_id`, `nom`, `debut`, `fin`, `adresse`, `places`, `description`, `ville`, `code_postal`) VALUES
	(1, 3, 'afpa', '2021-11-10', '2021-11-10', 'rue du foin', 30, 'test de database', 'Amiens', '80000'),
	(2, 3, 'porte ouverte', '2021-11-13', '2021-11-13', 'rue du blaireau', 45, 'jeu de test2', 'Amiens', '80000'),
	(3, 3, 'porte ferm??', '2021-11-08', '2021-11-08', 'rue p??rim??', 16, 'test de p??remption', 'Amiens', '80000'),
	(4, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 16, 'test de p??remption', 'Amiens', '80000'),
	(5, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 45, 'test de p??remption', 'Amiens', '80000'),
	(6, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 121, 'test de p??remption', 'Amiens', '80000'),
	(7, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 16, 'test de p??remption', 'Abbeville', '80100'),
	(8, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 24, 'test de p??remption', 'Abbeville', '80100'),
	(9, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 167, 'test de p??remption', 'Abbeville', '80100'),
	(10, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 456, 'test de p??remption', 'Abbeville', '80100'),
	(11, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 45, 'test de p??remption', 'Abbeville', '80100'),
	(12, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 456, 'test de p??remption', 'st-quentin', '02100'),
	(13, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 16123, 'test de p??remption', 'st-quentin', '02100'),
	(14, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 45, 'test de p??remption', 'st-quentin', '02100'),
	(15, 3, 'test en cours', '2022-02-12', '2022-03-01', 'rue experimenter', 1678, 'test de p??remption', 'st-quentin', '02100'),
	(16, 7, 'porte de la mouert?? du bingale', '2021-11-18', '2021-11-18', 'AFPA Amiens', 54, 'Journ??e porte ouverte dans l\'afpa d\'amiens', 'st-quentin', '02100'),
	(20, 7, 'jambon', '2023-01-01', '2024-01-01', 'cvnvx,', 456, 'vxb,cv,', 'st-quentin', '02100'),
	(21, 3, 'porte ouverte test', '2022-01-04', '2022-01-04', 'rue du trou', 26, 'ablabala', 'Amiens', '80000'),
	(22, 1, 'dfshdgh', '2016-01-01', '2016-01-01', 'fghfg', 45, 'fghfg', 'fghf', 'gfhfgh'),
	(23, 17, 'janvier', '2021-01-09', '2021-01-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(24, 17, 'mars', '2021-03-09', '2021-03-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(25, 17, 'avril', '2022-04-09', '2022-04-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(26, 17, 'aout', '2022-08-09', '2022-08-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(27, 17, 'sept', '2022-09-09', '2022-09-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(28, 17, 'dec', '2021-12-09', '2022-12-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(29, 18, 'janvier', '2021-01-09', '2021-01-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(30, 18, 'janvier', '2021-01-12', '2021-01-12', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(31, 18, 'fevrier', '2021-02-09', '2021-02-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(32, 24, 'fevrier', '2021-02-09', '2021-02-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(33, 18, 'mars', '2021-03-09', '2021-03-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(34, 18, 'juin', '2021-06-09', '2021-06-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(35, 18, 'oct', '2021-10-09', '2021-10-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(36, 18, 'nov', '2021-11-09', '2021-11-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(37, 19, 'nov', '2021-11-09', '2021-11-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(38, 19, 'nov', '2021-11-09', '2021-11-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(39, 25, 'nov', '2021-11-09', '2021-11-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(40, 19, 'dec', '2021-12-09', '2021-12-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(41, 19, 'dec', '2021-12-09', '2021-12-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(42, 20, 'dec', '2021-12-09', '2021-12-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(43, 20, 'janvier', '2021-01-09', '2021-01-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(44, 20, 'fev', '2021-02-11', '2021-02-11', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(45, 20, 'fev', '2021-02-13', '2021-02-13', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(46, 20, 'avril', '2021-04-09', '2021-04-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(47, 20, 'avril', '2021-04-14', '2021-04-14', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(48, 20, 'mai', '2021-05-09', '2021-05-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(49, 20, 'juillet', '2021-07-09', '2021-07-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(50, 20, 'aout', '2021-08-09', '2021-08-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(51, 21, 'fev', '2021-02-09', '2021-02-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(52, 21, 'mars', '2021-03-09', '2021-03-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(53, 21, 'mars', '2021-03-16', '2021-03-16', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(54, 22, 'janvier', '2021-01-09', '2021-01-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(55, 22, 'janvier', '2021-01-11', '2021-01-11', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(56, 22, 'fev', '2021-02-09', '2021-02-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(57, 22, 'mars', '2021-03-09', '2021-03-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(58, 22, 'avril', '2021-04-09', '2021-04-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(59, 28, 'mai', '2021-05-09', '2021-05-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(60, 22, 'aout', '2021-08-09', '2021-07-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(61, 22, 'aout', '2021-08-14', '2021-08-14', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(62, 22, 'sept', '2021-09-09', '2021-09-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(63, 22, 'oct', '2021-10-09', '2021-10-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(64, 22, 'nov', '2021-11-09', '2021-11-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(65, 29, 'dec', '2021-12-09', '2021-12-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(66, 22, 'fev', '2021-02-09', '2021-02-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(67, 22, 'mars', '2021-03-09', '2021-03-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(68, 22, 'avril', '2021-04-09', '2021-04-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(69, 27, 'mai', '2021-05-09', '2021-05-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(70, 22, 'aout', '2021-08-09', '2021-07-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(71, 22, 'aout', '2021-08-14', '2021-08-14', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(72, 22, 'sept', '2021-09-09', '2021-09-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(73, 22, 'oct', '2021-10-09', '2021-10-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(74, 22, 'nov', '2021-11-09', '2021-11-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(75, 30, 'dec', '2021-12-09', '2021-12-09', 'fghjfhgj', 31, 'test', 'amiens', '80000'),
	(76, 21, 'mars', '2021-03-09', '2021-03-09', 'fghjfhgj', 31, 'test', 'amiens', '80000');
/*!40000 ALTER TABLE `evenement` ENABLE KEYS */;

-- Dumping data for table parcours-decouverte.partenaire: ~15 rows (approximately)
/*!40000 ALTER TABLE `partenaire` DISABLE KEYS */;
INSERT INTO `partenaire` (`id`, `organisme`) VALUES
	(1, 'faire votre choix dans la liste ci-dessous'),
	(2, 'AFPA'),
	(3, 'pres2'),
	(4, 'pres1'),
	(5, 'pres/test'),
	(6, 'org1'),
	(7, 'org2'),
	(8, 'org3'),
	(9, 'TestPartenaire'),
	(10, 'org4'),
	(11, 'org5'),
	(12, 'org6'),
	(13, 'pres3'),
	(14, 'pres4'),
	(15, 'pres5'),
	(16, '1');
/*!40000 ALTER TABLE `partenaire` ENABLE KEYS */;

-- Dumping data for table parcours-decouverte.user: ~28 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `partenaire_id`, `email`, `roles`, `password`, `status`, `nom`, `prenom`, `token`, `organisme`) VALUES
	(1, 1, 'test@gmail.com', '["ROLE_ADMIN"]', '$2y$13$kI5BH2xrrE3By.NvhY4Lkuml3wfydkbhBifgkhHjqcVt7JkW7Pymi', 3, 'Plume', 'Amanda', NULL, NULL),
	(2, 5, 'test2@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(3, 2, 'test3@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(4, 3, 'test4@gmail.com', '["provisoire"]', 'provisoire', 2, 'De la Jumgle', 'george', NULL, NULL),
	(5, 4, 'george@mail.com', '["provisoire"]', 'provisoire', 2, 'rose', 'pamela', NULL, NULL),
	(7, 2, 'other@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 2, 'bon', 'jean', NULL, NULL),
	(8, 5, 'essay@gmail.com', '["provisoire"]', 'provisoire', 0, 'Arma', 'Jule', NULL, NULL),
	(9, 2, 'testOrga@gmail.com', '["provisoire"]', 'provisoire', 0, 'Saire', 'Emie', NULL, NULL),
	(11, 4, 'pres5@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(12, 4, 'pres6@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(13, 5, 'pres7@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(14, 3, 'pres8@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(15, 3, 'pres9@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(16, 5, 'pres4@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(17, 6, 'org1@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(18, 6, 'org2@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(19, 7, 'org3@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(20, 7, 'org4@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(21, 8, 'org5@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(22, 8, 'org6@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(24, 10, 'org7@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(25, 11, 'org8@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(27, 12, 'org9@gmail.com', '["ROLE_ORGANISATEUR"]', '$2y$13$/v1MB4zYeZtBr7P2fbJUMe0BS8NhHjkkRM85H0j04vbapGT6CTfkC', 3, 'titi', 'toto', NULL, NULL),
	(28, 13, 'pres10@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(29, 14, 'pres11@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(30, 15, 'pres12@gmail.com', '["ROLE_PRESCRIPTEUR"]', '$2y$13$N2.C1MOAzetKZp3YyyGChej4orIFgSCuSZxrQnHw9yPRdk4o7ePYK', 3, 'Dupond', 'George', NULL, NULL),
	(31, 2, 'toto@gmail.com', '["ROLE_PRESCRIPTEUR"]', 'provisoire', 1, 'test', 'var', 'eyJkYXRlIjp7ImRhdGUiOiIyMDIyLTAxLTA2IDE2OjE0OjQ0LjE5MzM2OCIsInRpbWV6b25lX3R5cGUiOjMsInRpbWV6b25lIjoiRXVyb3BlXC9QYXJpcyJ9LCJ1c2VyIjozMSwicm5kIjoiNjFkNzA3NjQyZjM1ZDMuNTM0NzY1OTQifQ==', 'afpa amiens'),
	(33, 1, 'tarte@gmail.com', '["provisoire"]', 'provisoire', 0, 'test', 'var', NULL, 'afpa amiens'),
	(34, 16, 'tratra@test.net', '["provisoire"]', 'provisoire', 0, 'jule', 'jule', NULL, 'blatte22'),
	(35, NULL, 'trotra@test.net', '["provisoire"]', 'provisoire', 0, 'jule', 'jule', NULL, 'blatte22');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
