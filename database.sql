-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2015 at 10:24 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kapau`
--

-- --------------------------------------------------------

--
-- Table structure for table `cf`
--

CREATE TABLE IF NOT EXISTS `cf` (
  `id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` smallint(6) NOT NULL,
  `PlcSubNetworkId` tinyint(4) NOT NULL,
  `WebsiteId` int(4) NOT NULL,
  `PlacementId` int(4) NOT NULL,
  `PageId` int(4) NOT NULL,
  `CmgnNetworkId` smallint(6) NOT NULL,
  `CmgnSubNetworkId` tinyint(4) NOT NULL,
  `CampaignId` int(4) NOT NULL,
  `MasterCampaignId` int(4) NOT NULL,
  `BannerId` smallint(4) NOT NULL,
  `BannerNumber` int(4) NOT NULL,
  `PaymentId` int(4) NOT NULL,
  `StateId` smallint(4) NOT NULL,
  `CountTypeId` smallint(4) NOT NULL,
  `IpAddress` varchar(30) NOT NULL,
  `UserId` char(16) NOT NULL,
  `OsId` tinyint(4) NOT NULL,
  `TagType` tinyint(4) NOT NULL,
  `BrowserId` smallint(4) NOT NULL,
  `BrowserLanguage` tinyint(4) NOT NULL,
  `IpRangeId` int(4) NOT NULL,
  `DateEntered` int(4) NOT NULL,
  `Hour` tinyint(4) NOT NULL,
  `Minute` tinyint(4) NOT NULL,
  `Second` tinyint(4) NOT NULL,
  `AdServerIp` tinyint(4) NOT NULL,
  `AdServerFarmId` tinyint(4) NOT NULL,
  `DMAId` tinyint(4) NOT NULL,
  `CountryId` smallint(4) NOT NULL,
  `ZipCodeId` int(4) NOT NULL,
  `CityId` int(4) NOT NULL,
  `IspId` smallint(4) NOT NULL,
  `ConnectionTypeId` smallint(4) NOT NULL,
  `RecordSize` smallint(4) NOT NULL,
  `sizeStringBuffer` smallint(4) NOT NULL,
  `Referer` varchar(1024) NOT NULL,
  `QueryString` varchar(1024) NOT NULL,
  `LinkUrl` varchar(1024) NOT NULL,
  `UserAgent` varchar(924) NOT NULL,
  `in_bin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ga`
--

CREATE TABLE IF NOT EXISTS `ga` (
  `id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` mediumint(6) NOT NULL,
  `WebsiteId` bigint(11) NOT NULL,
  `PlacementId` bigint(11) NOT NULL,
  `CmgnNetworkId` mediumint(6) NOT NULL,
  `CampaignId` bigint(11) NOT NULL,
  `MasterCampaignId` bigint(11) NOT NULL,
  `BannerId` mediumint(4) NOT NULL,
  `BannerNumber` smallint(4) NOT NULL,
  `PaymentId` tinyint(4) NOT NULL,
  `StateId` smallint(4) NOT NULL,
  `AreaCodeId` smallint(4) NOT NULL,
  `IpAddress` varchar(30) NOT NULL,
  `UserId` char(16) NOT NULL,
  `OsId` tinyint(4) NOT NULL,
  `TagType` tinyint(4) NOT NULL,
  `BrowserId` tinyint(4) NOT NULL,
  `BrowserLanguage` tinyint(4) NOT NULL,
  `TLDId` smallint(4) NOT NULL,
  `MediaTypeId` tinyint(4) NOT NULL,
  `DateEntered` int(11) NOT NULL,
  `Hour` tinyint(4) NOT NULL,
  `Minute` tinyint(4) NOT NULL,
  `Second` tinyint(4) NOT NULL,
  `AdServerIp` tinyint(4) NOT NULL,
  `AdServerFarmId` tinyint(4) NOT NULL,
  `DMAId` tinyint(4) NOT NULL,
  `CountryId` smallint(4) NOT NULL,
  `ZipCodeId` int(4) NOT NULL,
  `CityId` int(4) NOT NULL,
  `IspId` smallint(4) NOT NULL,
  `CountTypeId` tinyint(4) NOT NULL,
  `ConnectionTypeId` tinyint(4) NOT NULL,
  `in_bin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gl`
--

CREATE TABLE IF NOT EXISTS `gl` (
  `id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` mediumint(6) NOT NULL,
  `PlcSubNetworkId` smallint(4) NOT NULL,
  `WebsiteId` bigint(11) NOT NULL,
  `PlacementId` bigint(11) NOT NULL,
  `PageId` smallint(4) NOT NULL,
  `CmgnNetworkId` smallint(4) NOT NULL,
  `CmgnSubNetworkId` smallint(4) NOT NULL,
  `CampaignId` bigint(11) NOT NULL,
  `MasterCampaignId` bigint(11) NOT NULL,
  `BannerId` mediumint(4) NOT NULL,
  `BannerNumber` smallint(4) NOT NULL,
  `PaymentId` tinyint(4) NOT NULL,
  `StateId` smallint(4) NOT NULL,
  `AreaCodeId` smallint(4) NOT NULL,
  `IpAddress` binary(16) NOT NULL,
  `UserId` char(16) NOT NULL,
  `OsId` tinyint(4) NOT NULL,
  `TagType` tinyint(4) NOT NULL,
  `BrowserId` tinyint(4) NOT NULL,
  `BrowserLanguage` tinyint(4) NOT NULL,
  `TLDId` smallint(4) NOT NULL,
  `MediaTypeId` tinyint(4) NOT NULL,
  `PlcContentTypeId` tinyint(4) NOT NULL,
  `Reserved2` smallint(4) NOT NULL,
  `DateEntered` int(4) NOT NULL,
  `Hour` tinyint(4) NOT NULL,
  `Minute` tinyint(4) NOT NULL,
  `Second` tinyint(4) NOT NULL,
  `AdServerIp` tinyint(4) NOT NULL,
  `AdServerFarmId` tinyint(4) NOT NULL,
  `DMAId` tinyint(4) NOT NULL,
  `CountryId` smallint(4) NOT NULL,
  `ZipCodeId` int(4) NOT NULL,
  `CityId` int(4) NOT NULL,
  `IspId` smallint(4) NOT NULL,
  `CountTypeId` tinyint(4) NOT NULL,
  `ConnectionTypeId` tinyint(4) NOT NULL,
  `in_bin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE IF NOT EXISTS `ir` (
  `id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `NetworkId` smallint(4) NOT NULL,
  `SubNetworkId` tinyint(4) NOT NULL,
  `PlacementId` int(4) NOT NULL,
  `CampaignId` bigint(11) NOT NULL,
  `IpAddress` binary(16) NOT NULL,
  `UserId` char(16) NOT NULL,
  `OsId` tinyint(4) NOT NULL,
  `BrowserId` smallint(4) NOT NULL,
  `TagType` smallint(4) NOT NULL,
  `RequestType` tinyint(4) NOT NULL,
  `DateEntered` int(4) NOT NULL,
  `Hour` tinyint(4) NOT NULL,
  `Minute` tinyint(4) NOT NULL,
  `Second` tinyint(4) NOT NULL,
  `AdServerIp` tinyint(4) NOT NULL,
  `AdServerFarmId` tinyint(4) NOT NULL,
  `Url` char(40) NOT NULL,
  `Referer` char(40) NOT NULL,
  `in_bin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kv`
--

CREATE TABLE IF NOT EXISTS `kv` (
  `id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `RecordSize` smallint(6) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` smallint(6) NOT NULL,
  `PlcSubNetworkId` tinyint(4) NOT NULL,
  `WebsiteId` int(4) NOT NULL,
  `PlacementId` int(4) NOT NULL,
  `CmgnNetworkId` smallint(6) NOT NULL,
  `CmgnSubNetworkId` tinyint(4) NOT NULL,
  `CampaignId` int(4) NOT NULL,
  `ExtensionType` tinyint(4) NOT NULL,
  `PhraseId` int(4) NOT NULL,
  `NoKeywordEntries` smallint(4) NOT NULL,
  `in_bin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kw`
--

CREATE TABLE IF NOT EXISTS `kw` (
  `id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` smallint(6) NOT NULL,
  `PlcSubNetworkId` tinyint(4) NOT NULL,
  `WebsiteId` int(4) NOT NULL,
  `PlacementId` int(4) NOT NULL,
  `PageId` int(4) NOT NULL,
  `CmgnNetworkId` smallint(6) NOT NULL,
  `CmgnSubNetworkId` tinyint(4) NOT NULL,
  `CampaignId` int(4) NOT NULL,
  `MasterCampaignId` int(4) NOT NULL,
  `ExtensionType` tinyint(4) NOT NULL,
  `TimeStamp` int(4) NOT NULL,
  `KeywordText` char(40) NOT NULL,
  `KeywordTextLength` smallint(4) NOT NULL,
  `in_bin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tc`
--

CREATE TABLE IF NOT EXISTS `tc` (
  `id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` mediumint(6) NOT NULL,
  `PlcSubNetworkId` smallint(4) NOT NULL,
  `WebsiteId` bigint(11) NOT NULL,
  `PlacementId` bigint(11) NOT NULL,
  `PageId` smallint(4) NOT NULL,
  `CmgnNetworkId` smallint(4) NOT NULL,
  `CmgnSubNetworkId` smallint(4) NOT NULL,
  `CampaignId` bigint(11) NOT NULL,
  `MasterCampaignId` bigint(11) NOT NULL,
  `BannerId` mediumint(4) NOT NULL,
  `BannerNumber` smallint(4) NOT NULL,
  `PaymentId` tinyint(4) NOT NULL,
  `StateId` smallint(4) NOT NULL,
  `AreaCodeId` smallint(4) NOT NULL,
  `IpAddress` binary(16) NOT NULL,
  `UserId` char(16) NOT NULL,
  `OsId` tinyint(4) NOT NULL,
  `TagType` tinyint(4) NOT NULL,
  `BrowserId` tinyint(4) NOT NULL,
  `BrowserLanguage` tinyint(4) NOT NULL,
  `TLDId` smallint(4) NOT NULL,
  `MediaTypeId` tinyint(4) NOT NULL,
  `PlcContentTypeId` tinyint(4) NOT NULL,
  `Reserved2` smallint(4) NOT NULL,
  `DateEntered` int(4) NOT NULL,
  `Hour` tinyint(4) NOT NULL,
  `Minute` tinyint(4) NOT NULL,
  `Second` tinyint(4) NOT NULL,
  `AdServerIp` tinyint(4) NOT NULL,
  `AdServerFarmId` tinyint(4) NOT NULL,
  `DMAId` tinyint(4) NOT NULL,
  `CountryId` smallint(4) NOT NULL,
  `ZipCodeId` int(4) NOT NULL,
  `CityId` int(4) NOT NULL,
  `IspId` smallint(4) NOT NULL,
  `CountTypeId` tinyint(4) NOT NULL,
  `ConnectionTypeId` tinyint(4) NOT NULL,
  `in_bin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cf`
--
ALTER TABLE `cf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ga`
--
ALTER TABLE `ga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gl`
--
ALTER TABLE `gl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kv`
--
ALTER TABLE `kv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kw`
--
ALTER TABLE `kw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc`
--
ALTER TABLE `tc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cf`
--
ALTER TABLE `cf`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ga`
--
ALTER TABLE `ga`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gl`
--
ALTER TABLE `gl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ir`
--
ALTER TABLE `ir`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kv`
--
ALTER TABLE `kv`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kw`
--
ALTER TABLE `kw`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tc`
--
ALTER TABLE `tc`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
