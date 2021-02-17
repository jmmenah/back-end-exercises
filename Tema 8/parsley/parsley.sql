
--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `register_user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_activation_code` varchar(250) NOT NULL,
  `user_email_status` enum('not verified','verified') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`register_user_id`, `user_name`, `user_email`, `user_password`, `user_activation_code`, `user_email_status`) VALUES
(1, 'John Smith', 'web-tutorial@programmer.net', '$2y$10$ZFXBzg3rzusgSFuAL.VeneDnJJpUVEMtEy2r2Xjshz/3O/wxSDQZa', 'c74c4bf0dad9cbae3d80faa054b7d8ca', 'verified'),
(2, 'John Smit', 'johnsmith@gmail.com', '$2y$10$n0ckpdEkvGVhX5GExG1ZD.Vg3Z1TEpMEoq12aEMCKVNFzXRSeOJ.q', '84b069ebd287d467cb7fd26e53c6a0c9', 'verified'),
(3, 'John Smith', 'peterparker@gmail.com', '$2y$10$CaXjutIQ2gYrvGwvuN3tJey36n.DNHVXtro11RFpnoRGHAaCf0FZ2', '2459e63c0cc08d3717f1e159de44586e', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`register_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `register_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
