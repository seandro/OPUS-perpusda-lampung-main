CREATE TABLE IF NOT EXISTS `tbl_user` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`nama` varchar(100) NOT NULL,
	`email` varchar(320) NOT NULL,
	`password` varchar(100) NOT NULL,
	`noTelp` varchar(14) NOT NULL,
	`privilege` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `tbl_buku` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`judul` varchar(100) NOT NULL,
	`pengarang` varchar(100) NOT NULL,
	`penerbit` varchar(100) NOT NULL,
	`tahun` year NOT NULL,
	`ISBN` varchar(13) NOT NULL,
	`jumlah` int(5) NOT NULL
	`koleksi` int NOT NULL,
	`subjek` int NOT NULL,
	`inputBy` int,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `tbl_subjek` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`nama` varchar(30) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `tbl_koleksi` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`nama` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `tbl_privilege` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`nama` int NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `tbl_user` ADD CONSTRAINT `tbl_user_fk5` FOREIGN KEY (`privilege`) REFERENCES `tbl_privilege`(`id`);
ALTER TABLE `tbl_buku` ADD CONSTRAINT `tbl_buku_fk6` FOREIGN KEY (`koleksi`) REFERENCES `tbl_koleksi`(`id`);

ALTER TABLE `tbl_buku` ADD CONSTRAINT `tbl_buku_fk7` FOREIGN KEY (`subjek`) REFERENCES `tbl_subjek`(`id`);

ALTER TABLE `tbl_buku` ADD CONSTRAINT `tbl_buku_fk8` FOREIGN KEY (`inputBy`) REFERENCES `tbl_user`(`id`);


