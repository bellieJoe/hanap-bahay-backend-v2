--
-- Dumping data for table `reservation_tbl`
--

INSERT INTO `reservation_tbl` (`Reservation_ID`, `User_ID`, `RRP_ID`, `Date_Reserve`, `Expiry_date`, `Reservation`, `Status`, `Is_New`, `Date_Scheduled`, `Confirmation_Note`, `Deleted_From`) VALUES
(29, 170, 17, '2020-12-06', '0000-00-00', '10', 'approved', 0, '2020-12-18 15:32:00', 'pakyu hahaha', 17),
(34, 170, 17, '2020-12-06', '0000-00-00', '4', 'declined', 0, NULL, '', 170),
(36, 170, 16, '2020-12-11', '0000-00-00', '1', 'declined', 0, NULL, '', NULL),
(37, 170, 16, '2020-12-11', '0000-00-00', '1', 'pending', 1, NULL, '', NULL),
(39, 184, 21, '2021-01-05', '0000-00-00', '3', 'approved', 0, '2021-01-15 15:37:00', 'kita na lang sa location', NULL),
(40, 184, 18, '2021-01-06', '0000-00-00', '1', 'canceled', 1, NULL, '', NULL),
(45, 193, 27, '2021-01-11', '0000-00-00', '3', 'approved', 0, NULL, '', 27),
(46, 193, 19, '2021-01-13', '0000-00-00', '1', 'pending', 1, NULL, '', NULL),
(47, 233, 27, '2021-01-15', '0000-00-00', '2', 'approved', 0, '0000-00-00 00:00:00', 'undefined', NULL),
(48, 233, 26, '2021-01-15', '0000-00-00', '2', 'pending', 1, NULL, '', NULL);

-- --------------------------------------------------------