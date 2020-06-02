
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `permissions` TINYINT DEFAULT 1,
    `spotify_access_token` VARCHAR(255),
    `spotify_refresh_token` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- session_lock
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `session_lock`;

CREATE TABLE `session_lock`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `session` VARCHAR(255) NOT NULL,
    `expires` DATETIME NOT NULL,
    `is_expired` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- band
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `band`;

CREATE TABLE `band`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `band_name` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- band_to_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `band_to_user`;

CREATE TABLE `band_to_user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user` INTEGER NOT NULL,
    `band` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- track
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `track`;

CREATE TABLE `track`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    `artist` VARCHAR(255),
    `image` VARCHAR(255),
    `trackUri` VARCHAR(255),
    `duration` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- track_to_band
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `track_to_band`;

CREATE TABLE `track_to_band`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `track` INTEGER NOT NULL,
    `band` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- likes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `user` INTEGER NOT NULL,
    `track` INTEGER NOT NULL,
    `band` INTEGER NOT NULL,
    `type` TINYINT DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
