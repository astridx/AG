CREATE TABLE IF NOT EXISTS `#__agmaps_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  
  `coordinates` varchar(250) NOT NULL DEFAULT '',
  `showdefaultpin` tinyint(1) NOT NULL DEFAULT 0,
  `customPinPath` varchar(250) NOT NULL DEFAULT '',
  `customPinSize` varchar(250) NOT NULL DEFAULT '',
  `customPinShadowPath` varchar(250) NOT NULL DEFAULT '',
  `customPinShadowSize` varchar(250) NOT NULL DEFAULT '',
  `customPinOffset` varchar(250) NOT NULL DEFAULT '',
  `customPinPopupOffset` varchar(250) NOT NULL DEFAULT '',
  `showpopup` tinyint(1) NOT NULL DEFAULT 0,
  `customiconstart_icon` varchar(250) NOT NULL DEFAULT '',
  `customiconstart_markercolor` varchar(250) NOT NULL DEFAULT '',
  `customiconstart_iconcolor` varchar(250) NOT NULL DEFAULT '',
  `customiconstart_extraclasses` varchar(250) NOT NULL DEFAULT '',
  `customiconstart_spin` varchar(250) NOT NULL DEFAULT '',

  `awesomeicon_icon` varchar(250) NOT NULL DEFAULT '',
  `awesomeicon_markercolor` varchar(250) NOT NULL DEFAULT '',
  `awesomeicon_iconcolor` varchar(250) NOT NULL DEFAULT '',
  `awesomeicon_extraclasses` varchar(250) NOT NULL DEFAULT '',
  `awesomeicon_spin` varchar(250) NOT NULL DEFAULT '',

  `popuptext` text,
  `description` text,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `#__agmaps_details` ADD COLUMN  `access` int(10) unsigned NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD KEY `idx_access` (`access`);

ALTER TABLE `#__agmaps_details` ADD COLUMN  `catid` int(11) NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD COLUMN  `state` tinyint(3) NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD KEY `idx_catid` (`catid`);

ALTER TABLE `#__agmaps_details` ADD COLUMN  `published` tinyint(1) NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD COLUMN  `publish_up` datetime AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD COLUMN  `publish_down` datetime AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD KEY `idx_state` (`published`);

ALTER TABLE `#__agmaps_details` ADD COLUMN  `language` char(7) NOT NULL DEFAULT '*' AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD KEY `idx_language` (`language`);

ALTER TABLE `#__agmaps_details` ADD COLUMN  `ordering` int(11) NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD COLUMN  `params` text NOT NULL AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD COLUMN `checked_out` int(10) unsigned NOT NULL DEFAULT 0 AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD COLUMN `checked_out_time` datetime AFTER `alias`;

ALTER TABLE `#__agmaps_details` ADD KEY `idx_checkout` (`checked_out`);

ALTER TABLE `#__agmaps_details` ADD COLUMN  `featured` tinyint(3) unsigned NOT NULL DEFAULT 0 COMMENT 'Set if agmap is featured.';

ALTER TABLE `#__agmaps_details` ADD KEY `idx_featured_catid` (`featured`,`catid`);

INSERT INTO `#__agmaps_details` (`id`, `alias`, `checked_out_time`, `checked_out`, `params`, `ordering`, `language`, `publish_down`, `publish_up`, `published`, `state`, `catid`, `access`, `name`, `featured`) VALUES
(1, 'astrid', '0000-00-00 00:00:00', 0, '{\"show_name\":\"\",\"agmaps_layout\":\"\"}', 0, '*', NULL, NULL, 1, 0, 8, 5, 'Astrid', 0),
(2, 'nina', '0000-00-00 00:00:00', 0, '{\"show_name\":\"\",\"agmaps_layout\":\"\"}', 0, '*', '2020-02-27 15:08:16', '2020-02-11 15:08:12', 1, 0, 8, 1, 'Nina', 0),
(3, 'elmar', '0000-00-00 00:00:00', 0, '{\"show_name\":\"\",\"agmaps_layout\":\"\"}', 0, '*', '2020-02-27 15:08:16', '2020-02-11 15:08:12', 1, 0, 8, 1, 'Elmar', 1);
