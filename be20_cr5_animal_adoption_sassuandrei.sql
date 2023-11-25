-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 05:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be20_cr5_animal_adoption_sassuandrei`
--
CREATE DATABASE IF NOT EXISTS `be20_cr5_animal_adoption_sassuandrei` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be20_cr5_animal_adoption_sassuandrei`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `vaccine` tinyint(1) NOT NULL,
  `weight` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `gender`, `breed`, `size`, `age`, `vaccine`, `weight`, `image`, `location`, `description`, `status`) VALUES
(106, 'Melisenda', 'Female', 'dog', 'Large', 5, 1, 35, 'https://cdn.pixabay.com/photo/2015/11/03/12/58/dalmatian-1020790_640.jpg', '708 Ronald Regan Junction', 'asdddddddfasfasfsa', 0),
(107, 'Washington', 'Male', 'bird', 'Large', 0, 1, 21, 'https://cdn.pixabay.com/photo/2017/02/07/16/47/kingfisher-2046453_640.jpg', '2 Washington Lane', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r\n\r\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 1),
(108, 'Gilly', 'Female', 'gerbil', 'small', 9, 0, 79, 'https://cdn.pixabay.com/photo/2016/03/05/18/54/animal-1238228_1280.jpg', '58877 Alpine Lane', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\r\n\r\nDuis consequat dui nec nisi volutpat eleifend. ', 0),
(109, 'Marj', 'Female', 'mouse', 'small', 3, 0, 69, 'https://cdn.pixabay.com/photo/2016/10/01/20/54/mouse-1708347_1280.jpg', '326 Tony Park', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 0),
(110, 'Bird', 'Female', 'rat', 'Medium', 12, 0, 28, 'https://cdn.pixabay.com/photo/2023/01/12/07/19/rat-7713508_640.jpg', '224 Lake View Alley', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 1),
(111, 'Rosaline', 'Female', 'hamster', 'Large', 9, 0, 17, 'https://cdn.pixabay.com/photo/2016/10/26/22/00/hamster-1772742_1280.jpg', '75 Sloan Pass', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\n\r\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 1),
(114, 'Gerome', 'Male', 'sugar glider', 'Large', 2, 1, 30, 'https://cdn.pixabay.com/photo/2016/09/17/02/44/australian-wildlife-1675479_1280.jpg', '986 Buhler Avenue', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\r\n\r\nVestibulum ac e', 1),
(115, 'Marven', 'Male', 'hedgehog', 'Small', 6, 1, 43, 'https://cdn.pixabay.com/photo/2018/09/25/21/54/hedgehog-3703244_640.jpg', '73613 Katie Crossing', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 1),
(117, 'Ali', 'Female', 'hedgehog', 'Small selected', 3, 1, 23, 'https://cdn.pixabay.com/photo/2015/10/12/23/07/hedgehog-985315_640.jpg', '57761 Dawn Road', 'a simple hedgehog', 0),
(118, 'Keir', 'Male', 'parrot', 'Medium ', 5, 1, 20, 'https://cdn.pixabay.com/photo/2023/10/27/10/49/australian-king-parrot-8345064_640.jpg', '42088 Artisan Terrace', '', 0),
(119, 'Christye', 'Female', 'tarantula', 'Medium', 11, 0, 45, 'https://cdn.pixabay.com/photo/2013/05/14/16/28/spider-111075_640.jpg', '43 Blaine Park', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\r\n\r\nNam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 1),
(120, 'Erika', 'Agender', 'fish', 'Large', 5, 0, 36, 'https://cdn.pixabay.com/photo/2016/11/15/22/59/aquarium-1827781_640.jpg', '31 Schmedeman Road', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r\n\r\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\r\n\r\nPhasellus ', 0),
(121, 'Hussein', 'Male', 'potbellied pig', 'Medium', 6, 0, 8, 'https://cdn.pixabay.com/photo/2017/10/20/19/45/potbelly-pigs-2872531_1280.jpg', '4 Stone Corner Road', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\r\n\r\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 1),
(122, 'Allard', 'Male', 'mouse', 'Large', 1, 1, 8, 'https://cdn.pixabay.com/photo/2022/02/21/21/18/animal-7027637_640.jpg', '013 Coolidge Way', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r\n\r\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante', 1),
(123, 'Matthus', 'Male', 'ferret', 'Large', 7, 0, 74, 'https://cdn.pixabay.com/photo/2019/10/08/09/23/animal-4534480_1280.jpg', '704 Oak Pass', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 1),
(124, 'Brande', 'Female', 'dog', 'Medium', 7, 1, 23, 'https://cdn.pixabay.com/photo/2022/10/10/04/23/rottweiler-7510724_1280.jpg', '72 Oakridge Road', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\r\n\r\nSed ante. Vivamus tortor. Duis mattis egestas metus.', 0),
(125, 'Donal', 'Male', 'snake', 'Small', 11, 1, 20, 'https://cdn.pixabay.com/photo/2014/08/15/21/40/snake-419043_640.jpg', '4 Jackson Point', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r\n\r\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\r\n\r\nPhasellus ', 1),
(126, 'Doy', 'Male', 'lizard', 'Medium', 8, 1, 51, 'https://cdn.pixabay.com/photo/2017/02/06/12/34/reptile-2042906_1280.jpg', '71 North Crossing', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\r\n\r\nVestibulum ac e', 1),
(127, 'Josefina', 'Female', 'rabbit', 'Large', 1, 0, 74, 'https://cdn.pixabay.com/photo/2016/12/04/21/58/rabbit-1882699_640.jpg', '449 Meadow Ridge Alley', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', 0),
(128, 'Hieronymus', 'Male', 'lizard', 'Medium', 12, 0, 27, 'https://cdn.pixabay.com/photo/2021/09/17/10/55/caiman-lizard-6632344_640.jpg', '290 Hazelcrest Way', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\r\n\r\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultri', 1),
(130, 'Leticia', 'Female', 'lizard', 'Medium', 11, 0, 44, 'https://cdn.pixabay.com/photo/2021/03/05/21/43/lizard-6072391_640.jpg', '75655 Linden Park', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 1),
(135, 'Rabbi', 'Male', 'turtle', 'Medium', 5, 1, 43, 'https://cdn.pixabay.com/photo/2016/11/29/08/31/animal-1868436_640.jpg', '6 4th Terrace', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r\n\r\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante', 1),
(136, 'Godfree', 'Male', 'snake', 'Small', 1, 1, 4, 'https://cdn.pixabay.com/photo/2021/09/28/00/20/snake-6662549_640.jpg', '2 Jay Street', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 1),
(137, 'Alden', 'Male', 'parrot', 'Large', 5, 0, 65, 'https://cdn.pixabay.com/photo/2023/11/06/06/50/parrot-8368951_640.png', '997 Dorton Road', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 0),
(138, 'Rolando', 'Male', 'fish', 'Medium', 2, 0, 52, 'https://cdn.pixabay.com/photo/2017/05/31/09/54/gold-fish-2359781_640.jpg', '0387 Scoville Plaza', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 1),
(149, 'andrei', 'Male', 'test1', 'medium', 22, 1, 22, 'https://cdn.pixabay.com/photo/2016/02/11/17/00/dog-1194087_640.jpg', 'Vienna 24', 'sadasfsafsaf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `id` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `fk_animals` int(11) NOT NULL,
  `buy_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `picture`, `password`, `status`) VALUES
(10, 'Andrei', 'Sassu', 'andreisassu@outlook.com', '0664495156', 'KPS', 'avatar.png', 'f4227d66b520f35c78b27abcc1f128cff27f6df7737262e196c7ff0d3bcab55c', 'adm'),
(11, 'userf', 'userl', 'uerf@uerl.com', '066449515622', 'KARL POpp', 'avatar.png', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_animals` (`fk_animals`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`fk_animals`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
