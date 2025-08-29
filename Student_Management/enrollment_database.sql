-- Student Information System Database
-- Database: enrollment

CREATE DATABASE IF NOT EXISTS `enrollment`;
USE `enrollment`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sample data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `cname`) VALUES
(1, 'Computer Science'),
(2, 'Information Technology'),
(3, 'Business Administration'),
(4, 'Engineering'),
(5, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sample data for table `tbl_year`
--

INSERT INTO `tbl_year` (`id`, `level`) VALUES
(1, '1st Year'),
(2, '2nd Year'),
(3, '3rd Year'),
(4, '4th Year');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `cname` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sample data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `fname`, `mname`, `lname`, `gender`, `cname`, `level`, `date_created`) VALUES
(1, 'John', 'Michael', 'Doe', 'Male', 'Computer Science', '2nd Year', '2024-01-15 08:30:00'),
(2, 'Jane', 'Marie', 'Smith', 'Female', 'Information Technology', '1st Year', '2024-01-16 09:15:00'),
(3, 'Robert', 'James', 'Johnson', 'Male', 'Engineering', '3rd Year', '2024-01-17 10:00:00'),
(4, 'Emily', 'Rose', 'Davis', 'Female', 'Business Administration', '2nd Year', '2024-01-18 11:30:00'),
(5, 'Michael', 'Anthony', 'Wilson', 'Male', 'Education', '4th Year', '2024-01-19 14:20:00');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_year`
--
ALTER TABLE `tbl_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

COMMIT;
