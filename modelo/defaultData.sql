--
-- Dumping data for table `Identifica_type`
--

INSERT INTO `Identifica_type` (`idIdentificaType`, `description`) VALUES
(1, 'Cédula de Ciudadania');

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`idCustomer`, `identType`, `numIdent`, `custName`, `custLastNam`, `cellPhone`, `phone`, `direction`, `email`, `registerDate`, `active`) VALUES
(1, 1, '1094928002', 'Juan David', 'Dávila Mejía', '3017972001', 'Calle 45 # 98B - 50, California, Torre 9 Apto 533', 'juan23davila@gmail.com', '', '2017-08-06 00:00:00', 'Y');
