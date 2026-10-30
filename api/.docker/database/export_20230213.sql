-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: jazzfreunde-mysql-database
-- Erstellungszeit: 30. Okt 2026 um 16:48
-- Server-Version: 10.6.28-MariaDB-ubu2204
-- PHP-Version: 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `jazzfreunde-api`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `confirmable_entities`
--

CREATE TABLE `confirmable_entities` (
  `uuid` binary(16) NOT NULL,
  `email` varchar(254) NOT NULL,
  `creation_time` datetime NOT NULL DEFAULT current_timestamp(),
  `confirmation_id` binary(16) NOT NULL,
  `discriminator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `confirmation_contracts`
--

CREATE TABLE `confirmation_contracts` (
  `uuid` binary(16) NOT NULL,
  `token` char(32) NOT NULL,
  `request_time` datetime NOT NULL,
  `state` enum('new','pending','confirmed','cancelled') NOT NULL DEFAULT 'new',
  `expiration_time` datetime DEFAULT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`metadata`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `category` enum('none','session','jazztage','jazz-and-literature') NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `event_locations`
--

CREATE TABLE `event_locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `known_mails`
--

CREATE TABLE `known_mails` (
  `id` int(11) NOT NULL,
  `handle` enum('no-reply','jazzletter','developers') NOT NULL,
  `address` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `known_mails`
--

INSERT INTO `known_mails` (`id`, `handle`, `address`) VALUES
(1, 'no-reply', 'no-reply@jazzfreunde-ingolstadt.localhost'),
(2, 'jazzletter', 'jazzletter@jazzfreunde-ingolstadt.localhost'),
(3, 'developers', 'developers@jazzfreunde-ingolstadt.localhost');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newsletter_subscriptions`
--

CREATE TABLE `newsletter_subscriptions` (
  `uuid` binary(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `notification_subscriptions`
--

CREATE TABLE `notification_subscriptions` (
  `resource_scope` varchar(254) NOT NULL,
  `uuid` binary(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE `roles` (
  `uuid` binary(16) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `uuid` binary(16) NOT NULL,
  `email` varchar(254) NOT NULL,
  `token` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uuid`, `email`, `token`) VALUES
(0xb32aa8dfd3ae11f1ad263e420c841a51, 'user@jazzfreunde-ingolstadt.localhost', 'c71207a14dab888cd2fd046e3f329cdb');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users_groups`
--

CREATE TABLE `users_groups` (
  `user_uuid` binary(16) NOT NULL,
  `role_uuid` binary(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `confirmable_entities`
--
ALTER TABLE `confirmable_entities`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `UNIQ_1EB208CD6BACE54E` (`confirmation_id`);

--
-- Indizes für die Tabelle `confirmation_contracts`
--
ALTER TABLE `confirmation_contracts`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `UNIQ_DD197D9D5F37A13B` (`token`);

--
-- Indizes für die Tabelle `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indizes für die Tabelle `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5387574A64D218E` (`location_id`);

--
-- Indizes für die Tabelle `event_locations`
--
ALTER TABLE `event_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `known_mails`
--
ALTER TABLE `known_mails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7138182D918020D9` (`handle`),
  ADD KEY `IDX_7138182D918020D9D4E6F81` (`handle`,`address`);

--
-- Indizes für die Tabelle `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750` (`queue_name`,`available_at`,`delivered_at`,`id`);

--
-- Indizes für die Tabelle `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  ADD PRIMARY KEY (`uuid`);

--
-- Indizes für die Tabelle `notification_subscriptions`
--
ALTER TABLE `notification_subscriptions`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `IDX_52C540C82B142FE1` (`resource_scope`);

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `UNIQ_B63E2EC75E237E06` (`name`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_1483A5E95F37A13B` (`token`);

--
-- Indizes für die Tabelle `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_uuid`,`role_uuid`),
  ADD KEY `IDX_FF8AB7E0ABFE1C6F` (`user_uuid`),
  ADD KEY `IDX_FF8AB7E06FC02232` (`role_uuid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `event_locations`
--
ALTER TABLE `event_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `known_mails`
--
ALTER TABLE `known_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `confirmable_entities`
--
ALTER TABLE `confirmable_entities`
  ADD CONSTRAINT `FK_1EB208CD6BACE54E` FOREIGN KEY (`confirmation_id`) REFERENCES `confirmation_contracts` (`uuid`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK_5387574A64D218E` FOREIGN KEY (`location_id`) REFERENCES `event_locations` (`id`);

--
-- Constraints der Tabelle `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  ADD CONSTRAINT `FK_B3C13B0BD17F50A6` FOREIGN KEY (`uuid`) REFERENCES `confirmable_entities` (`uuid`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `notification_subscriptions`
--
ALTER TABLE `notification_subscriptions`
  ADD CONSTRAINT `FK_52C540C8D17F50A6` FOREIGN KEY (`uuid`) REFERENCES `confirmable_entities` (`uuid`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `FK_FF8AB7E06FC02232` FOREIGN KEY (`role_uuid`) REFERENCES `roles` (`uuid`),
  ADD CONSTRAINT `FK_FF8AB7E0ABFE1C6F` FOREIGN KEY (`user_uuid`) REFERENCES `users` (`uuid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
