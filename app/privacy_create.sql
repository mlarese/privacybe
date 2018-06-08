CREATE TABLE privacy (id INT AUTO_INCREMENT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP, privacy LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', privacy_id INT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX privacy_history_created (created), INDEX privacy_history_privacy_id (privacy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE domain (name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, active TINYINT(1) DEFAULT '1' NOT NULL, deleted TINYINT(1) DEFAULT '0' NOT NULL, INDEX domain_active (active), PRIMARY KEY(name)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE action_history (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, history LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', user_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE term (uid VARCHAR(128) NOT NULL, name VARCHAR(255) NOT NULL, paragraphs LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', status VARCHAR(1) NOT NULL, published DATETIME DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP, modified DATETIME DEFAULT CURRENT_TIMESTAMP, suspended DATETIME DEFAULT NULL, deleted TINYINT(1) DEFAULT '0' NOT NULL, INDEX term_created (created), INDEX term_suspended (suspended), INDEX term_published (published), INDEX term_modified (modified), PRIMARY KEY(uid)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE term_history (id INT AUTO_INCREMENT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP, term LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', term_uid VARCHAR(128) NOT NULL, modifier INT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX term_history_created (created), INDEX term_history_modifier (modifier), INDEX term_history_term_uid (term_uid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE privacy_entry (
    uid VARCHAR(120) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    ref VARCHAR(100) DEFAULT NULL,
    surname VARCHAR(100) NOT NULL,
    form LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)',
    crypted_form LONGTEXT DEFAULT NULL,
    privacy LONGTEXT DEFAULT NULL,
    privacy_flags LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)',
    term_id VARCHAR(255) NOT NULL,
    domain VARCHAR(255) NOT NULL,
    site VARCHAR(255) NOT NULL,
    ip VARCHAR(100) DEFAULT NULL,
    telephone VARCHAR(120) DEFAULT NULL,
    deleted TINYINT(1) DEFAULT '0' NOT NULL,
    INDEX privacy_created (created), INDEX privacy_name_surname (name, surname),
    INDEX privacy_ref (ref),
    INDEX privacy_term_id (term_id),
    INDEX privacy_email (email),
    PRIMARY KEY(uid)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE operator (id INT NOT NULL, name VARCHAR(80) NOT NULL, surname VARCHAR(80) NOT NULL, zip VARCHAR(10) DEFAULT NULL, email VARCHAR(150) DEFAULT NULL, telephone VARCHAR(100) DEFAULT NULL, city VARCHAR(100) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, role VARCHAR(50) NOT NULL, profile LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', period_from DATETIME NOT NULL, period_to DATETIME NULL, domains LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', deleted TINYINT(1) DEFAULT '0' NOT NULL, active TINYINT(1) DEFAULT '1' NOT NULL, INDEX operator_name (name), INDEX operator_role (role), INDEX operator_period_from (period_from), INDEX operator_period_to (period_to), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE term_page (term_uid VARCHAR(255) NOT NULL, domain VARCHAR(255) NOT NULL, page VARCHAR(255) NOT NULL, deleted TINYINT(1) DEFAULT '0' NOT NULL, PRIMARY KEY(term_uid, domain, page)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE treatment (code VARCHAR(30) NOT NULL, name VARCHAR(255) NOT NULL, note LONGTEXT DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, creator LONGTEXT DEFAULT NULL COMMENT '(DC2Type:json)', deleted TINYINT(1) DEFAULT '0' NOT NULL, PRIMARY KEY(code)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

CREATE TABLE `user_request` (
  `uid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `domain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `history` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `flow` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `last_access` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`),
  KEY `user_request_mail` (`mail`),
  KEY `user_request_type` (`type`),
  KEY `user_request_domain_site` (`domain`,`site`),
  KEY `user_request_created` (`created`),
  KEY `user_request_last_access` (`domain`,`last_access`),
  KEY `user_request_status` (`domain`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `treatment_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `treatment` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `treatment_code` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `modifier` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `treatment_history_created` (`created`),
  KEY `treatment_history_modifier` (`modifier`),
  KEY `treatment_history_treatment_code` (`treatment_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `dictionary` (
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `configuration` (
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE privacy_entry
  ADD INDEX privacy_term_id (term_id);
