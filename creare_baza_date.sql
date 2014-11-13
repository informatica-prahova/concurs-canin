/* CREARE BAZA DE DATE + TABELE FOLOSITE IN APLICATIA CONCURS CANIN*/

--
-- Database: `concurs_canin`
--
CREATE DATABASE concurs_canin;
USE `concurs_canin`;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `caini`
--

CREATE TABLE `caini` (
  `id` int(5) NOT NULL,
  `nume_caine` varchar(45) NOT NULL,
  `rasa` varchar(45) NOT NULL,
  `premiu` int(1) NOT NULL DEFAULT '0',
  `cnp` varchar(13) NOT NULL,
  `categorie` int(2) NOT NULL,
  `stapani_cnp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `stapani`
--

CREATE TABLE `stapani` (
  `cnp` varchar(13) NOT NULL,
  `nume` varchar(45) NOT NULL,
  `adresa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caini` CHEIE PRIMARA
--
ALTER TABLE `caini`
 ADD PRIMARY KEY (`id`), ADD KEY `caini_id_fk` (`stapani_cnp`);

--
-- Indexes for table `stapani` CHEIE PRIMARA
--
ALTER TABLE `stapani`
 ADD PRIMARY KEY (`cnp`);

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `caini` CHEIE EXTERNA
--
ALTER TABLE `caini`
ADD CONSTRAINT `caini_id_fk` FOREIGN KEY (`stapani_cnp`) REFERENCES `stapani` (`cnp`);
COMMIT;


