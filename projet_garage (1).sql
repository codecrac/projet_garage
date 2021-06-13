-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 31 mai 2021 à 12:02
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `bilan_comptable`
--

CREATE TABLE `bilan_comptable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mois_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mois_a_afficher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_depense` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_entree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `telephone`, `email`, `localisation`, `date_naissance`, `created_at`, `updated_at`) VALUES
(1, 'Amani charles', '0748485959', 'personnepersonnepersonneperson@gmail.com', 'Cocody', '2020-05-31', '2021-05-29 00:00:00', '2021-05-29 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `flux_argent`
--

CREATE TABLE `flux_argent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `date_hebdo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flux` enum('entree','sortie') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_vehicule_concerner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historique_visites`
--

CREATE TABLE `historique_visites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_prochaine_visite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` enum('Non Debuter','En cours','Terminer','rendu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_des_lieux` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`etat_des_lieux`)),
  `kilometrage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau_carburant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `travaux` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`travaux`)),
  `factures` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`factures`)),
  `total_travaux` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_doeuvre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_a_payer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `versements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`versements`)),
  `total_versements` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reste_a_payer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `historique_visites`
--

INSERT INTO `historique_visites` (`id`, `id_vehicule`, `id_client`, `date`, `date_prochaine_visite`, `motif`, `etat`, `etat_des_lieux`, `kilometrage`, `niveau_carburant`, `travaux`, `factures`, `total_travaux`, `main_doeuvre`, `total_a_payer`, `versements`, `total_versements`, `reste_a_payer`) VALUES
(1, 1, 1, '2021-05-29', '2021-06-02', 'jefysdujdf', 'Non Debuter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `constructeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `constructeur`) VALUES
(23, 'Acura'),
(24, 'Alfa Romeo'),
(25, 'Alpine'),
(26, 'Aston-Martin'),
(21, 'Audi'),
(27, 'Bentley'),
(1, 'Bmw'),
(28, 'Bugatti'),
(29, 'Cadillac'),
(30, 'Chery'),
(31, 'Chrysler'),
(22, 'Citroën'),
(32, 'Dacia'),
(2, 'Daewoo'),
(33, 'Fiat'),
(3, 'Ford'),
(34, 'Gaz'),
(35, 'Hafei'),
(4, 'Holden'),
(5, 'Honda'),
(6, 'Hyundai'),
(7, 'Isuzu'),
(36, 'Jeep'),
(8, 'Kia'),
(37, 'Land Rover'),
(9, 'Lexus'),
(38, 'Lincoln'),
(10, 'Mazda'),
(19, 'Mercedes'),
(39, 'Mercedes-Benz'),
(11, 'Mitsubishi'),
(12, 'Nissan'),
(20, 'Opel'),
(13, 'Peugeot'),
(40, 'Porshe'),
(18, 'Renault'),
(14, 'Subaru'),
(15, 'Suzuki'),
(16, 'Toyota'),
(17, 'Volkswagen'),
(41, 'Volvo');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(157, '2014_10_12_000000_create_users_table', 1),
(158, '2014_10_12_100000_create_password_resets_table', 1),
(159, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(160, '2019_08_19_000000_create_failed_jobs_table', 1),
(161, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(162, '2021_05_08_163136_create_sessions_table', 1),
(163, '2021_05_10_112559_create_clients_table', 1),
(164, '2021_05_10_112754_create_vehicules_table', 1),
(165, '2021_05_10_113233_create_historique_visites_table', 1),
(166, '2021_05_12_121337_create_flux_argent_table', 1),
(167, '2021_05_12_141603_create_bilan_comptable_table', 1),
(168, '2021_05_21_112029_create_marques_table', 1),
(169, '2021_05_21_112528_create_modeles_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

CREATE TABLE `modeles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque_parente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modeles`
--

INSERT INTO `modeles` (`id`, `modele`, `marque_parente`) VALUES
(1, 'X1', 'Bmw'),
(2, 'X2', 'Bmw'),
(3, 'X2 M35i', 'Bmw'),
(4, 'Serie 3 Berline', 'Bmw'),
(5, 'M3 Competition Berline', 'Bmw'),
(6, 'Serie 8 coupé', 'Bmw'),
(7, 'Sorento', 'Kia'),
(8, 'Sportage', 'Kia'),
(9, 'Seltos', 'Kia'),
(10, 'Mohave', 'Kia'),
(11, 'Rio', 'Kia'),
(12, 'Forte', 'Kia'),
(13, 'Optima', 'Kia'),
(14, 'K5', 'Kia'),
(15, 'Cadenza', 'Kia'),
(16, 'Stinger', 'Kia'),
(17, 'K900', 'Kia'),
(18, 'Soul', 'Kia'),
(19, 'Niro', 'Kia'),
(20, 'Telluride', 'Kia'),
(21, 'Sedona', 'Kia');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eQYwtKUln59zYc0M8FpoCoSix2kYeRNXpWKoJeyg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiOWN3Q2x4Y0NSWEh3dDdNTWd2SjZvakZDNU5MeWRNOUczMFVnbk01bSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJERPeFdRVjZpLm1WRmxyajlOeW1TUmVzZ2ZXTFNCVXduSmhYQ29jNVlBQWZvNlc2ZVVEajhPIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRET3hXUVY2aS5tVkZscmo5TnltU1Jlc2dmV0xTQlV3bkpoWENvYzVZQUFmbzZXNmVVRGo4TyI7fQ==', 1621813386),
('KEYzIgUTR3L1ZdfQ3iUfAsQK412vj0P5W75xJfJJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoienFwUm40TXlvdlJqeWQ1U1l5TURZNElORzFHQkNBSGhNa1VXU2gwbCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1622386487),
('X1cT1Ht5nRzgzGrHRYAMMQVAqiUdKqUrKHn7Ev9l', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRnBZR0NwM1BkaEFkZTBMVHNsRmNOZG9oQjNDeExKV0s3bHFzOXhDUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkRE94V1FWNmkubVZGbHJqOU55bVNSZXNnZldMU0JVd25KaFhDb2M1WUFBZm82VzZlVURqOE8iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJERPeFdRVjZpLm1WRmxyajlOeW1TUmVzZ2ZXTFNCVXduSmhYQ29jNVlBQWZvNlc2ZVVEajhPIjt9', 1622279841);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comptabilite` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `supprimer` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `creer_utilisateurs` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `comptabilite`, `supprimer`, `creer_utilisateurs`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$DOxWQV6i.mVFlrj9NymSResgfWLSBUwnJhXCoc5YAAfo6W6eUDj8O', NULL, NULL, 'true', 'true', 'true', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `energie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `immatriculation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_chassis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `id_client`, `id_marque`, `id_model`, `energie`, `annee`, `immatriculation`, `numero_chassis`) VALUES
(1, 1, 'Kia', 'Sportage', 'diesel', '2014', '378382378347', '37846237842323');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bilan_comptable`
--
ALTER TABLE `bilan_comptable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bilan_comptable_mois_reference_unique` (`mois_reference`),
  ADD UNIQUE KEY `bilan_comptable_mois_a_afficher_unique` (`mois_a_afficher`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `flux_argent`
--
ALTER TABLE `flux_argent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historique_visites`
--
ALTER TABLE `historique_visites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marques_constructeur_unique` (`constructeur`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bilan_comptable`
--
ALTER TABLE `bilan_comptable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `flux_argent`
--
ALTER TABLE `flux_argent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historique_visites`
--
ALTER TABLE `historique_visites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT pour la table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
