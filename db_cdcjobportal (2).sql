-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 01:14 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cdcjobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accountanting', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(2, 'Education', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(3, 'Engineering', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(4, 'Programming', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(5, 'Construction', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(6, 'Medical', '2019-08-20 20:22:18', '2019-08-20 20:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `company_name`, `slug`, `crte`, `validity`, `description`, `industry`, `address`, `website`, `logo`, `rep_fullname`, `rep_position`, `rep_email`, `rep_contact`, `created_at`, `updated_at`) VALUES
(1, 7, 'Reilly and Sons', 'reilly-and-sons', '2323123123', '', 'Omnis itaque quia et occaecati quibusdam architecto. Consequuntur accusamus ut sit eos officiis. Ut perspiciatis quo totam doloremque minima nostrum. Autem tempore illum odio et. Voluptatibus repellat est distinctio quia. Qui libero est iure est sint. Ist', 'Manpower', '755 Gaylord Fords\nBuckchester, WA 95937-4568', 'swift.com', 'avatar/ry.jpg', 'Frederic Cartwright', 'Computer Software Engineer', 'gracie37@gmail.com', '1-336-272-2888', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(2, 7, 'Barton LLC', 'barton-llc', '2323123123', '', 'Sit sunt et consectetur commodi omnis suscipit nihil. Sint autem quia amet dolor quasi sint ipsam aut. Perspiciatis natus consequuntur placeat enim voluptatem eveniet quos. Omnis et eum qui consequatur maiores asperiores nobis. Minima et provident tempora', 'Manpower', '1296 Alia Route\nClarebury, NJ 72037-4643', 'haley.info', 'avatar/ry.jpg', 'Jackeline Lubowitz', 'GED Teacher', 'valentine.wisoky@schmitt.com', '887.986.4681', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(3, 1, 'Ankunding-Heller', 'ankunding-heller', '2323123123', '', 'Mollitia corrupti aut modi sed doloribus. Totam dolorem expedita tenetur et. Qui rerum sequi et dolorum similique rerum ipsam quidem. Labore similique consequuntur in natus sint eveniet. Esse ut tempora ullam ea sapiente nostrum iusto provident.', 'Manpower', '606 Bailey Tunnel Suite 425\nHahnhaven, PA 38906', 'lowe.com', 'avatar/ry.jpg', 'Dr. Lizeth Pagac', 'Healthcare', 'jannie17@collins.net', '(789) 240-6689 x8868', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(4, 10, 'Hintz Ltd', 'hintz-ltd', '2323123123', '', 'Et eos in tempora praesentium accusantium voluptas placeat. In molestias nemo odio fugit vero delectus. Ducimus iusto omnis odio nemo. Rerum perferendis aliquid distinctio nobis dolorum nam. Est ipsa temporibus neque aliquid. Veniam autem adipisci occaeca', 'Manpower', '142 Windler Lane\nOtiliaborough, DC 91527-5773', 'spencer.com', 'avatar/ry.jpg', 'Marley Monahan', 'Keyboard Instrument Repairer and Tuner', 'hoeger.garland@leannon.com', '583-844-7888 x30560', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(5, 7, 'Cassin-Dach', 'cassin-dach', '2323123123', '', 'Aut a aliquam ratione vero. Minima autem accusantium et repellendus inventore et. Et officia molestiae velit veritatis qui aut. Delectus autem sit magni sit. Non rerum ut ipsam dolore soluta. Dolorem mollitia deserunt nam eveniet corrupti ipsum recusandae', 'Manpower', '7512 Sunny Stream Apt. 821\nGislasonbury, IL 17752-2621', 'nitzsche.com', 'avatar/ry.jpg', 'Earlene Hermiston', 'Online Marketing Analyst', 'dawson69@yahoo.com', '+13094211724', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(6, 5, 'Hansen, Mertz and Farrell', 'hansen-mertz-and-farrell', '2323123123', '', 'Aliquid eos dolor amet deserunt et quidem aliquid. Commodi dolorem et quo tenetur sequi est sequi voluptas. At nihil rem eaque non quisquam. Repellendus soluta a consectetur quis non rerum autem. Quia at repudiandae beatae odit. Et adipisci totam et quo. ', 'Manpower', '79614 Ebert Mews\nNew Lemuel, HI 41126-5958', 'mueller.com', 'avatar/ry.jpg', 'Prudence Gibson', 'Police and Sheriffs Patrol Officer', 'georgianna.hills@altenwerth.biz', '1-724-300-8002 x683', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(7, 2, 'Toy-Bashirian', 'toy-bashirian', '2323123123', '', 'Qui optio aut sed sed esse. Commodi laudantium blanditiis delectus sapiente ea cupiditate sapiente. Placeat dolorum ipsa et qui. Voluptatem veniam ut eos consequatur voluptas nisi. Maxime deleniti qui quia commodi eos maxime placeat earum.', 'Manpower', '953 Kertzmann Causeway\nPort Nat, AZ 72987-2961', 'weimann.com', 'avatar/ry.jpg', 'Lenny Fisher I', 'Healthcare Support Worker', 'shanahan.jeffery@yahoo.com', '356.541.9313 x996', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(8, 2, 'Crooks Ltd', 'crooks-ltd', '2323123123', '', 'Quos et assumenda sunt quo ut aut voluptate. Quia quia perferendis tenetur et ut nesciunt accusamus. Consectetur eaque sed laudantium provident fugiat porro. Est aut omnis ullam hic optio quam. Quam reiciendis explicabo quis enim laborum.', 'Manpower', '5836 Treutel Valleys\nKautzerstad, NC 84963', 'prosacco.org', 'avatar/ry.jpg', 'Ozella Barton', 'Orthotist OR Prosthetist', 'schroeder.nina@gmail.com', '490.793.2765', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(9, 7, 'Beer-Schultz', 'beer-schultz', '2323123123', '', 'Repudiandae quis nobis quia sunt culpa. Est eius itaque expedita ab nostrum aperiam in. Et qui tempore commodi quisquam sapiente libero. Ut nobis excepturi atque et ut molestias est amet. Dolorem ea dolores maxime rerum similique. Dolor dolor sunt quia co', 'Manpower', '20962 Cummings Field Apt. 798\nNorth Lukasstad, MI 58648', 'abshire.org', 'avatar/ry.jpg', 'Ryder Feest', 'Automotive Specialty Technician', 'randal.hills@erdman.com', '+18094034859', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(10, 8, 'Feest Inc', 'feest-inc', '2323123123', '', 'Ut et amet repudiandae ducimus amet voluptatem excepturi magnam. Aut rerum nulla quis et. Alias rerum molestiae occaecati consequatur exercitationem illo voluptatem. Et sit totam ducimus sint aperiam provident eaque.', 'Manpower', '278 Cormier Canyon Suite 564\nGerlachside, NM 60872', 'considine.biz', 'avatar/ry.jpg', 'Lourdes Lehner', 'Cultural Studies Teacher', 'mbecker@yahoo.com', '(425) 277-5684 x664', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(11, 11, 'Sm Clark', '', '213-2323-2323', '2322-12-31', 'One of the biggest mall in the Philippines', 'ManPower', 'Clark Pampanga', 'smclark.com', '', '', '', '', '', '2019-08-20 21:33:20', '2019-08-20 21:33:20'),
(12, 18, 'Clark Developement Corporation', '', '619', '2020-02-03', 'CDC DESKCRIPTION', 'Eut', 'Clark free zone Pampanga', 'eut.com', '1566385117.jpg', 'Ryan Young', 'Supervisor', 'ry@gmail.com', '0929292929', '2019-08-20 22:30:35', '2019-08-21 02:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_vacancy` int(11) NOT NULL,
  `work_schedule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `company_id`, `title`, `slug`, `category_id`, `position`, `position_level`, `number_vacancy`, `work_schedule`, `description`, `education`, `work_experience`, `gender`, `salary`, `status`, `skill`, `created_at`, `updated_at`) VALUES
(1, '5', '2', 'Tree Trimmer', 'tree-trimmer', 2, 'Supervisor of Police', 'Junior', 1, 'flexible', 'Sint deleniti sequi sit id necessitatibus doloribus. Est nisi est voluptatem quia cupiditate. Placeat non impedit molestias voluptatem inventore reprehenderit quaerat. Aut nihil dolorum voluptas.', 'College graduate', 'Ut molestiae veritatis velit ut unde iusto. Molestias tempore ut et voluptatem consequatur. Pariatur quis est blanditiis qui molestiae. Nostrum qui deleniti quibusdam quaerat ipsam magnam. Est non enim fugiat ut corporis. Et quas quae nostrum molestiae. I', 'female', '5,000', 1, 'Unde incidunt rem ducimus. Illo libero tenetur corrupti at. Voluptatem nemo repellat omnis minima quos aut.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(2, '4', '8', 'Educational Counselor OR Vocationall Counselor', 'educational-counselor-or-vocationall-counselor', 1, 'Order Filler', 'Junior', 2, 'flexible', 'Aut architecto sit enim sed voluptates alias natus aut. Accusamus ut eius unde aut nesciunt facere voluptatem voluptas. Accusantium amet tempora voluptates exercitationem saepe autem. Accusantium quibusdam iste delectus a est voluptas. Dolores sit ut et ex eaque ratione. Occaecati autem repudiandae eum excepturi porro. Autem magnam adipisci reiciendis nihil. Non necessitatibus vel non modi perferendis officia. Quia repudiandae aut beatae voluptatibus blanditiis. Necessitatibus labore voluptatum aliquam consectetur perspiciatis. Hic asperiores fugit ullam dicta illum. Praesentium non voluptatem perspiciatis officia et porro.', 'College graduate', 'Illo amet sed a non veritatis ut ut. Reprehenderit quia animi fuga sapiente dolor ipsum. Quis iusto neque similique possimus magnam aspernatur nulla.', 'male', '5,000', 0, 'Eaque debitis ut aut. Impedit perferendis vitae rem vitae delectus. Est labore et quia dolorem. Harum ipsa eum blanditiis aut est dolorum.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(3, '4', '5', 'Medical Transcriptionist', 'medical-transcriptionist', 1, 'Radiologic Technician', 'Junior', 1, 'flexible', 'Dicta odit aperiam aut aliquid minima enim eum vel. Ab recusandae eius reiciendis fugit blanditiis. Commodi vero porro laboriosam rerum. Aliquam labore quis tenetur culpa. Tempora doloribus natus animi et. Sed esse aliquam nobis dolorem odit labore. Possimus commodi nesciunt quaerat in.', 'College graduate', 'Itaque ut commodi omnis sit autem. Quia corrupti cumque hic enim inventore omnis voluptatum qui. Deserunt qui enim voluptatem vel blanditiis ea tempore.', 'female', '5,000', 0, 'Quam voluptas autem placeat dolorum consectetur unde. Asperiores accusamus quis nemo quas est. Quaerat molestiae facilis id asperiores. Enim dicta inventore ut mollitia. Totam porro expedita placeat vero qui distinctio.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(4, '4', '8', 'Aircraft Engine Specialist', 'aircraft-engine-specialist', 1, 'Loading Machine Operator', 'Junior', 2, 'flexible', 'Aut nihil et corrupti. Accusamus minima culpa sit veritatis similique dolores aut. Fugiat quia odit laboriosam. Doloribus consequatur maiores rerum. Et porro possimus dolorem. Eos voluptas quae perspiciatis dicta ut eos qui. Est et odit illum porro. Sint quis impedit rerum et reiciendis asperiores repellendus. Consequatur odit dolores quis sapiente culpa distinctio.', 'College graduate', 'Est ullam optio perferendis. Veritatis incidunt natus sit odit. Earum temporibus aut omnis aut corrupti nihil praesentium consequatur. Autem et repellendus accusantium non alias. Veniam expedita consequatur nisi molestias. Consequatur aut voluptas repella', 'female', '5,000', 1, 'Autem ad quia mollitia et exercitationem dolore alias. Voluptatem a aliquam omnis omnis recusandae quam perspiciatis. Rem autem veniam totam harum aspernatur sint.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(5, '4', '9', 'Movers', 'movers', 5, 'Agricultural Manager', 'Junior', 3, 'flexible', 'Non optio rerum rem autem et commodi. Tempora voluptas animi illo natus. Quas soluta aut ea et vitae. Porro at aperiam cum consequatur. Enim consectetur voluptas qui fugit molestiae cupiditate. Quam ut sed et autem est incidunt ipsum ut. Nihil eum in tempora sint.', 'College graduate', 'Sapiente et commodi possimus inventore quam qui qui error. Quaerat quae facilis alias ut placeat. Aut ut consequatur placeat corporis. Deserunt sint dolore iure minima tenetur non non veniam. Sequi aperiam inventore non quo. Minus et culpa ut consequatur.', 'male', '5,000', 0, 'Eaque vel vero porro ducimus. Quaerat incidunt pariatur officia quia mollitia. Ipsum ullam in iste.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(6, '4', '9', 'Buffing and Polishing Operator', 'buffing-and-polishing-operator', 3, 'Furniture Finisher', 'Junior', 3, 'flexible', 'Voluptatem dolor officiis beatae. Voluptatem animi exercitationem veniam ipsa fugiat et.', 'College graduate', 'Reprehenderit unde a soluta quam sed. Enim ex culpa laboriosam tempore esse eos. Voluptatibus voluptatum aperiam earum. Est unde fugit laboriosam occaecati ad dolorum et. Nesciunt illum nobis consequatur commodi ea dignissimos. Alias omnis facilis ut tota', 'male', '5,000', 1, 'Quo doloribus sint quia sit id. Quia ad dolore sed ratione. Impedit repellat non officiis debitis labore magni.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(7, '9', '1', 'Shear Machine Set-Up Operator', 'shear-machine-set-up-operator', 3, 'Central Office', 'Junior', 5, 'flexible', 'Odio possimus eius dicta sed beatae deserunt. Rerum nesciunt omnis voluptate culpa voluptatum illo atque. Et soluta consequuntur delectus velit est nihil. At sit perspiciatis ipsum perferendis velit numquam numquam. Vel odit eos quia eos et et quo. At qui laborum repellendus rerum esse doloribus nihil. Voluptatibus dolores et eum saepe vero et. Mollitia odio dolor consectetur. Voluptatem dolorum sint maiores vero qui aut. Et deserunt iste nulla in cumque. Perspiciatis rerum cumque voluptatem. Ex magnam provident qui inventore consectetur. Et itaque aut et natus perferendis consequatur.', 'College graduate', 'Ut et velit consequuntur sed voluptas nam ratione. Nam facilis ex est odit ducimus enim. Alias qui quasi rerum quibusdam. Ex fuga et vitae reprehenderit qui ut nihil. Et aut nostrum nesciunt aperiam.', 'male', '5,000', 1, 'Aperiam dignissimos sit placeat ullam. Illo modi ut molestiae quia quasi doloribus numquam. Non sequi dicta nihil fugiat vel. Voluptatum et voluptas illo natus et eum. Omnis qui ipsum rerum est et ducimus aliquam.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(8, '2', '8', 'Forest Fire Inspector', 'forest-fire-inspector', 1, 'Woodworker', 'Junior', 3, 'flexible', 'Consequatur non dolore est eligendi omnis voluptas. Consequuntur laudantium quia id quidem dolorem tempore rerum.', 'College graduate', 'Voluptatem sed et laborum iure sapiente culpa. Odio maiores ex rerum rerum. Et voluptas et velit voluptas dignissimos nulla porro.', 'male', '5,000', 0, 'Sed ad ad necessitatibus aut. Consequatur nesciunt officiis doloribus. Aspernatur quo minus impedit voluptatem quam aut voluptatibus dignissimos. Quae dolorem quia animi est fugiat.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(9, '1', '1', 'Insurance Investigator', 'insurance-investigator', 1, 'Hairdresser OR Cosmetologist', 'Junior', 4, 'flexible', 'Blanditiis vel repellendus est. Ut ipsa aut labore id. Perferendis a id ut sed. Sequi voluptatum sed est molestiae. Atque rem molestiae consectetur tempore aliquid ut. Aut aperiam dolor qui vitae et. Consectetur et voluptatem est perspiciatis quo. Et ut autem est nulla. Expedita facilis sunt repudiandae deleniti fugiat esse. Beatae quod sit aut dolorem consequatur rerum. Unde corporis sed quisquam quo et sapiente et ipsam.', 'College graduate', 'Sed aut officia quia voluptatem tempora natus consequatur. Commodi quia voluptatem tempore veritatis dolorem consequatur quae ipsa. Aut est rerum temporibus omnis ullam debitis. Officiis qui eos odio fugiat. Ut quod ut error velit perspiciatis maiores. Po', 'male', '5,000', 1, 'Et et qui et dolores sit et quia. Molestiae est sunt illum exercitationem quisquam. Dolorum quam harum ea non veniam et.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(10, '2', '4', 'Automotive Glass Installers', 'automotive-glass-installers', 2, 'Mine Cutting Machine Operator', 'Junior', 3, 'flexible', 'Impedit nisi quod earum mollitia qui vitae qui vel. Modi praesentium ut ullam hic et. Qui est voluptatem consequatur voluptatum et non quasi. Quod vel ducimus sed in. Dignissimos est in animi deleniti et earum. Rerum consequatur saepe fugiat ipsam. Id excepturi natus aspernatur maxime culpa.', 'College graduate', 'Sint consequatur velit placeat quis sit. Occaecati aliquid aliquid accusantium voluptatibus harum ratione. Magni et voluptatum itaque quod officia. Dolorem ut sunt ut facere nihil ut. Dolore sed tempore incidunt voluptatem optio tempora. Dolorem vel autem', 'male', '5,000', 0, 'Temporibus consequatur voluptates at vel velit minus. Dignissimos numquam quo fugit incidunt asperiores et temporibus aut. Ut veniam inventore nobis sapiente quia. Quia voluptate necessitatibus maxime a. Deleniti perferendis dolorum culpa sunt blanditiis.', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(11, '18', '12', '', '', 1, 'qweqwe', 'weqwe', 0, 'Dayshift', 'eqweqwe', 'Bachelor\'sDegree', 'qweqweqwe', 'Male', '1', 0, 'qweqwe', '2019-08-21 15:08:45', '2019-08-21 15:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `job_user`
--

CREATE TABLE `job_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_12_010008_create_profiles_table', 1),
(4, '2019_08_12_010048_create_companies_table', 1),
(5, '2019_08_12_010119_create_categories_table', 1),
(6, '2019_08_12_011034_create_jobs_table', 1),
(7, '2019_08_12_011236_create_job_user_table', 1),
(8, '2019_08_12_014705_create_favourites_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edu_attainment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_of_study` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_graduated` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_year_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_year_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `phone_number`, `dob`, `gender`, `address`, `skill`, `edu_attainment`, `school`, `field_of_study`, `date_graduated`, `avatar`, `resume`, `work_position`, `work_company`, `work_year_from`, `work_year_to`, `created_at`, `updated_at`) VALUES
(1, '17', '09272414644', '1995-09-11', 'Male', 'Balibago, Angeles City', 'Computer Literate', 'bachelorsdegree', 'Holy Angel University', 'Information Technology', '2019-10-16', '1566368083.jpg', 'public/files/hdzaNZz7LxJjLdOAuV7oLomOM2ozijgWIadLam3g.docx', 'None', 'None', '2019-08-15', '2019-08-13', '2019-08-20 22:12:24', '2019-08-20 22:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `m_name`, `l_name`, `user_type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ryan', '', 'Breitenberg', 'seeker', 'justen53@example.net', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SdTODBGwGT', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(2, 'Deborah', '', 'Block', 'seeker', 'ottilie72@example.org', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VYTk6rdOXM', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(3, 'Xander', '', 'Rath', 'seeker', 'mills.hailee@example.org', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7vGpMxNuZz', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(4, 'Brisa', '', 'Feeney', 'seeker', 'alva.kovacek@example.org', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '08VhcibMZG', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(5, 'Julio', '', 'Mann', 'seeker', 'glover.keeley@example.com', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rYTVn0IT14', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(6, 'Ahmed', '', 'Gerhold', 'seeker', 'granville29@example.com', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ywhZlQhK8Y', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(7, 'Josefa', '', 'Carroll', 'seeker', 'tlangworth@example.com', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'di6c37Jh61', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(8, 'Dortha', '', 'Kuhlman', 'seeker', 'cielo31@example.com', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qEOsbzyuM9', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(9, 'Willie', '', 'Gibson', 'seeker', 'quinton.hagenes@example.org', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GDI2sY9s0N', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(10, 'Kristopher', '', 'Sawayn', 'seeker', 'qstark@example.net', '2019-08-20 20:22:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iYEsGvj3Cn', '2019-08-20 20:22:18', '2019-08-20 20:22:18'),
(17, 'Ryan', 'Tarrayo', 'Young', 'seeker', 'ryan@ryan.com', NULL, '$2y$10$euMmffAzJsZoLvSGyx.0Bexy9Q80ohTdbqKoxeOkN2dvD8lBrVm/m', NULL, '2019-08-20 22:12:24', '2019-08-20 22:13:52'),
(18, '', '', '', 'company', 'clark@clark.com', NULL, '$2y$10$G5/KKT38z4fxV3nq811Ih.UnP4NBnt9PhT545gELhk1XT8Ljv2h46', NULL, '2019-08-20 22:30:35', '2019-08-21 01:21:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_user`
--
ALTER TABLE `job_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_user`
--
ALTER TABLE `job_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
