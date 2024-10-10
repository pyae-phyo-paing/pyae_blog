-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 03:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pyae_post`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Web Development', '2024-10-07 14:44:12'),
(2, 'AI', '2024-10-07 14:44:12'),
(3, 'English Speaking', '2024-10-08 09:41:14'),
(4, 'Degital Marketing', '2024-10-08 09:41:14'),
(5, 'Personal Development', '2024-10-08 09:41:14'),
(6, 'Professional Development', '2024-10-08 09:41:14'),
(7, 'Business And Management', '2024-10-08 09:41:14'),
(8, 'Accounting', '2024-10-08 09:41:14'),
(9, 'HR Management', '2024-10-08 09:41:14'),
(10, 'Personal Ethics and Professional Ethics', '2024-10-08 09:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `description`, `category_id`, `user_id`, `created_at`) VALUES
(1, 'Pyae_Blog', 'https://easy-peasy.ai/cdn-cgi/image/quality=80,format=auto,width=700/https://fdczvxmwwjwpwbeeqcth.supabase.co/storage/v1/object/public/images/f74a37ae-0143-4286-9744-dc47b392af41/43bf0821-c81c-46c1-a9cd-194b00da66e6.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, '2024-10-08 10:09:48'),
(2, 'Phyo_Blog', 'https://pics.craiyon.com/2023-09-16/e2bc9bf7574e4d91b22b5353cb598a2e.webp', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 2, 2, '2024-10-08 10:09:48'),
(3, 'Paing_Blog', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYROyMlelOMz3ZqmMFupl-uuh8xYc1dg1sT5B9qtB9XSWtCkLn3EVHG1KwKWuFnXXRbFE&usqp=CAU', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 3, 3, '2024-10-08 10:11:25'),
(4, 'Min_Blog', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmPUrM6524xpk3BMQUSCblejss5imxp_swgtcreK67rKO0j6QaLkVRw1CpDwEFNL1_TsI&usqp=CAU', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 4, 4, '2024-10-08 10:11:25'),
(5, 'Thu_Blog', 'https://pics.craiyon.com/2023-09-16/f2400097f5514365ab32d2452e77d55b.webp', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 5, 5, '2024-10-08 10:13:48'),
(6, 'Wai_Blog', 'https://joah-girls.com/system/item_images/images/000/249/492/medium/6d8b5000-5f55-40fa-89f7-efd1095d2857.png?1555777012', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 6, 6, '2024-10-08 10:13:48'),
(7, 'PyaePhyo_Blog', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSI9rhCAkeoG1bWBO0hLsjXuhKrsTnuTvetBXsUgTlSQA0LmL2ntvWI4eEcz1AJOBvKdAM&usqp=CAU', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pulvinar enim quis libero pretium, non pharetra nulla convallis. Donec eget risus non arcu euismod tristique. Phasellus varius id erat quis tempor. Fusce accumsan sollicitudin nulla et fermentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam aliquam tempus tellus. Fusce ante felis, lacinia nec dolor et, rutrum feugiat neque.\r\n\r\nVivamus nec lacus commodo, tristique mauris eget, tempus arcu. Maecenas eu purus convallis, tempus nunc mollis, congue ipsum. Proin dapibus fermentum neque consectetur faucibus. Pellentesque vitae dictum urna. Proin aliquam ultricies urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis eleifend ut dui et bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ultricies tortor nec commodo consequat.\r\n\r\nNam placerat, diam in sagittis pharetra, ex metus feugiat tortor, in tristique tellus erat vitae lorem. Nunc vel lectus et nisi malesuada ultrices non eget orci. Sed faucibus sed mauris sed interdum. Aliquam eget posuere tellus, in fringilla magna. Nulla non lacinia nulla. Vestibulum congue fermentum metus quis bibendum. Sed sit amet faucibus mauris. Ut commodo ultricies orci vel tristique. Nulla leo enim, mattis et ligula ac, pellentesque mattis magna. Nam augue orci, imperdiet quis tellus nec, elementum tincidunt leo. Curabitur et dignissim nibh.', 7, 7, '2024-10-08 10:17:52'),
(8, 'PhyoPaing_Blog', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpA3L7efoHDbkISjwTYhbfmmHKIcTcOv2qm9LwGaLXlhY0UelZvceVzP-E5Iuf4WHX11k&usqp=CAU', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pulvinar enim quis libero pretium, non pharetra nulla convallis. Donec eget risus non arcu euismod tristique. Phasellus varius id erat quis tempor. Fusce accumsan sollicitudin nulla et fermentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam aliquam tempus tellus. Fusce ante felis, lacinia nec dolor et, rutrum feugiat neque.\r\n\r\nVivamus nec lacus commodo, tristique mauris eget, tempus arcu. Maecenas eu purus convallis, tempus nunc mollis, congue ipsum. Proin dapibus fermentum neque consectetur faucibus. Pellentesque vitae dictum urna. Proin aliquam ultricies urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis eleifend ut dui et bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ultricies tortor nec commodo consequat.\r\n\r\nNam placerat, diam in sagittis pharetra, ex metus feugiat tortor, in tristique tellus erat vitae lorem. Nunc vel lectus et nisi malesuada ultrices non eget orci. Sed faucibus sed mauris sed interdum. Aliquam eget posuere tellus, in fringilla magna. Nulla non lacinia nulla. Vestibulum congue fermentum metus quis bibendum. Sed sit amet faucibus mauris. Ut commodo ultricies orci vel tristique. Nulla leo enim, mattis et ligula ac, pellentesque mattis magna. Nam augue orci, imperdiet quis tellus nec, elementum tincidunt leo. Curabitur et dignissim nibh.', 8, 8, '2024-10-08 10:17:52'),
(9, 'PyaePhyoPaing_Blog', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnIJLOFIQ765BJ7ZsVOYK4Oh4JN1RIM-HkK71oMtVhJFQhgbJfMUINi08YGO10j8NVvyE&usqp=CAU', 'Donec sed dolor in massa commodo cursus. Curabitur sed maximus nunc. Mauris aliquet urna orci, a congue dolor rhoncus id. Proin aliquam lacus hendrerit augue congue fermentum. Donec ut elementum nisi, porttitor tempor nisi. Morbi aliquam tristique ligula, a venenatis arcu mattis eu. Maecenas ut sem vulputate, condimentum mi id, suscipit arcu. Cras semper viverra mauris, at ullamcorper felis. Integer cursus libero augue, eu placerat dolor vestibulum bibendum. Donec non augue posuere justo congue varius ac sit amet ante. Suspendisse tempor diam a sapien scelerisque, at feugiat ipsum maximus. Mauris ornare accumsan turpis, nec ultricies risus efficitur eget. Nullam ex velit, varius id turpis vitae, hendrerit bibendum nunc.\r\n\r\nNulla urna justo, consequat lacinia dapibus eget, sagittis lacinia felis. Nam diam ante, vestibulum mattis massa id, consectetur faucibus justo. Aliquam dapibus elit id dolor ullamcorper, vitae placerat est accumsan. Vestibulum risus neque, fringilla in nulla ut, laoreet commodo nisi. Duis et elit sit amet turpis fringilla efficitur id ac ante. In lobortis est quis leo rhoncus, ac posuere nisi accumsan. Vestibulum gravida sodales arcu ac accumsan. In molestie dictum est sed luctus. Suspendisse potenti. Nulla non urna ut lorem dapibus pharetra id non mi. Nam at est ex. Donec porta, tortor in efficitur euismod, turpis nisi finibus purus, id consectetur velit massa vitae risus.\r\n\r\nAliquam auctor ligula nec magna pharetra, sit amet tincidunt diam consectetur. Praesent tincidunt mattis consectetur. Sed commodo odio nec mauris tristique, ac euismod sapien molestie. Integer hendrerit porttitor nulla vel interdum. Nulla id pellentesque nunc. Donec rutrum nulla tortor, lobortis fermentum felis faucibus ac. Aenean in lacinia quam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin posuere ac tellus nec fringilla. Cras tincidunt sapien massa, sagittis rhoncus ipsum gravida in. Curabitur tincidunt lacus lorem, quis venenatis sapien elementum eu. Aliquam eu facilisis risus. Etiam ex nibh, porta sed dapibus in, posuere sed ipsum.', 9, 9, '2024-10-08 10:17:52'),
(10, 'MinThuWai_Blog', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQo7IMCRgqBI5JA-W42lqAtx6eZXQg1FGjpo6HZ7jmjnhQZmiw0zk656tfW74aONqFo5NY&usqp=CAU', 'Morbi eu ligula nec mi maximus dapibus. Aenean ultrices dictum enim, ut vulputate sem scelerisque vel. Phasellus interdum tincidunt malesuada. Nullam at enim at diam efficitur efficitur. Ut blandit eget leo ut ultrices. Ut sit amet nunc molestie tortor dignissim semper. Phasellus vulputate luctus tellus id convallis. Sed et est purus. Vivamus sapien urna, gravida vitae odio id, porttitor aliquet lorem. Maecenas in lacinia nibh. Ut sit amet placerat nisi. Pellentesque pulvinar eros ut arcu egestas mollis. Phasellus egestas mollis felis, vitae dictum urna eleifend eget.\r\n\r\nDonec eu imperdiet ante, eu tempus elit. Duis tortor dolor, tristique ut ante at, molestie sodales eros. Aenean eu tortor bibendum, cursus eros ac, ornare ante. Nulla facilisi. Nam ultricies, arcu et iaculis mattis, eros leo porta arcu, sit amet ornare velit ligula eu ligula. Cras eu maximus tortor. Nulla tristique scelerisque scelerisque. Aenean in laoreet tortor, eu cursus quam. Donec viverra nibh sapien, in molestie elit dictum ut. Morbi facilisis mattis sem, et scelerisque dolor vulputate et. Etiam fermentum neque sed dolor finibus, vel lacinia lectus lacinia. Quisque in sodales ex. Etiam porttitor, sem sit amet egestas consequat, nibh risus semper ex, ac tristique dui est ut ligula. Integer iaculis feugiat malesuada. Integer ipsum sapien, condimentum nec varius ut, lobortis ac ex. Suspendisse id mi ut quam malesuada scelerisque.\r\n\r\nMaecenas vulputate blandit lectus, vel vehicula erat. Duis mauris mauris, elementum in blandit at, venenatis et arcu. Praesent ac condimentum orci. Fusce id dictum purus. Sed blandit ligula id elementum sodales. Fusce et posuere neque, quis rutrum nisl. Integer a porta velit. Nunc consectetur fermentum cursus. Cras finibus purus vitae venenatis dapibus. Aliquam efficitur sagittis neque molestie bibendum.', 10, 10, '2024-10-08 10:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile`, `role`, `created_at`) VALUES
(1, 'Pyae Phyo Paing', 'paing.mdy.edu@gmail.com', 'paing@1234', 'https://easy-peasy.ai/cdn-cgi/image/quality=70,format=auto,width=300/https://fdczvxmwwjwpwbeeqcth.supabase.co/storage/v1/object/public/images/5743d46d-55f5-4bb8-9730-8a3dd5d0776b/0a5a6788-881a-4aa8-b457-fb73515899e9.png', 'Admin', '2024-10-08 09:57:52'),
(2, 'Soe Soe', 'soesoe@gmail.com', 'soe@1234', 'https://static.vecteezy.com/system/resources/thumbnails/037/288/478/small_2x/ai-generated-beautyful-korean-girl-model-cosmetic-model-photo.jpg', 'Admin', '2024-10-08 09:57:52'),
(3, 'Mg Mg', 'mgmg@gmail.com', 'mgmg@1234', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZZW6djpCPhMWfnzdgnk-8KO-ISHpwD8xGcA&s', 'Admin', '2024-10-08 09:57:52'),
(4, 'Myint Myint', 'myint@gmail.com', 'myint@1234', 'https://media.istockphoto.com/id/2157220495/photo/beauty-portraits-of-beautiful-young-asian-women.jpg?s=612x612&w=0&k=20&c=IFiPizcWUTdEgHE9q1ZzvTLqt-_HZ4HU130cNJwT-1Y=', 'Admin', '2024-10-08 09:57:52'),
(5, 'Kyaw Kyaw', 'kyawkyaw@gmail.com', 'kyaw@1234', 'https://m.media-amazon.com/images/I/5181Hy5a3sL.jpg', 'Admin', '2024-10-08 09:57:52'),
(6, 'Moe Moe', 'moemoe@gmail.com', 'moe@1234', 'https://i.pinimg.com/originals/2f/df/43/2fdf43115ec3b285ec3207f76599e897.jpg', 'Author', '2024-10-08 10:03:00'),
(7, 'Ko Ko', 'koko@gmail.com', 'ko@1234', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0dycml6sXs7MxCqd4JBhb9xfX5c5oH2a9Yg&s', 'Author', '2024-10-08 10:03:00'),
(8, 'Kaung Kyaw', 'kaung@gmail.com', 'kaungk@1234', 'https://png.pngtree.com/png-vector/20240413/ourmid/pngtree-korean-boy-in-black-blazer-png-image_12283322.png', 'Author', '2024-10-08 10:03:00'),
(9, 'Sandi', 'sandi@gmail.com', 'sandi@1234', 'https://t4.ftcdn.net/jpg/03/75/72/21/360_F_375722121_6oUOLvHaEPdPLUauptLeMvi0GIgdQHkM.jpg', 'Author', '2024-10-08 10:03:00'),
(10, 'Yadanar', 'yadanar@gmail.com', 'y@1234', 'https://www.shutterstock.com/image-photo/beauty-portrait-young-asian-woman-260nw-2477663197.jpg', 'Author', '2024-10-08 10:03:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
