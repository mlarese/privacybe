CREATE TABLE `fact_reservation_res` (
  `related_sync_id` int(11) DEFAULT NULL,
  `related_sync_code` varchar(100) NOT NULL,
  `related_reservation_code` varchar(100) DEFAULT NULL,
  `structure_uid` varchar(100) DEFAULT NULL,
  `portal_uid` varchar(100) DEFAULT NULL,
  `date_key` varchar(10) DEFAULT NULL,
  `checkin_date_key` varchar(10) DEFAULT NULL,
  `checkout_date_key` varchar(10) DEFAULT NULL,
  `nights` int(4) DEFAULT NULL,
  `country_key` varchar(10) DEFAULT NULL,
  `price` float(20,3) DEFAULT NULL,
  `room_code` varchar(13) DEFAULT NULL,
  `treatment` varchar(13) DEFAULT NULL,
  `pax` varchar(40) DEFAULT NULL,
  `paxtype` varchar(40) DEFAULT NULL,
  `adults` int(4) DEFAULT NULL,
  `children` int(4) DEFAULT NULL,
  `infantes` int(4) DEFAULT NULL,
  `babies` int(4) DEFAULT NULL,
  `kids` int(4) DEFAULT NULL,
  `teens` int(4) DEFAULT NULL,
  `noset` int(4) DEFAULT NULL,
  `dba` int(11) DEFAULT NULL,
  `lead_time` varchar(30) DEFAULT NULL,
  `adr` float(20,3) DEFAULT NULL,
  `rev_x_pax` float(20,3) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `status_group` varchar(60) DEFAULT NULL,
  `origin` varchar(30) DEFAULT NULL,
  `original_type` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `rate_code` varchar(40) DEFAULT NULL,
  `rate` varchar(200) DEFAULT NULL,
  `guests` int(11) DEFAULT NULL,
  `sync_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`related_sync_code`),
  UNIQUE KEY `related_sync_id` (`related_sync_id`),
  KEY `sync_timestamp` (`sync_timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
