Theam Url = 1] https://larathemes.pixelstrap.com/edmin/
2] https://larathemes.pixelstrap.com/edmin/admin/default-dashboard

CREATE TABLE `usermaster` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`username` VARCHAR(45) DEFAULT NULL,
`mobile_no` VARCHAR(15) DEFAULT NULL,
`password` VARCHAR(255) DEFAULT NULL,
`api_key` VARCHAR(64) DEFAULT NULL,
`access` VARCHAR(10) DEFAULT NULL,
`is_active` TINYINT(1) DEFAULT 1,
`indate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`ip` VARCHAR(20) DEFAULT NULL,
`last_ip` VARCHAR(20) DEFAULT NULL,
`lastlogin` DATETIME DEFAULT NULL,
PRIMARY KEY (`id`)
);

CREATE TABLE whatsapp_sessions (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
mobile_no VARCHAR(15) NOT NULL,
session_path VARCHAR(255),
status ENUM('QR_REQUIRED','READY','DISCONNECTED') DEFAULT 'QR_REQUIRED',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `user_permission2` (
`Id` int NOT NULL AUTO_INCREMENT,
`user_Id` int NOT NULL,
`username` varchar(50) NOT NULL,
`dashboard` tinyint(1) DEFAULT '1' COMMENT '/dashboard',
`actionlog` tinyint(1) DEFAULT '0' COMMENT '/actionlog',
`usermaster` tinyint(1) DEFAULT '0' COMMENT '/usermaster',
`InDate` datetime DEFAULT NULL,
PRIMARY KEY (`Id`)
) ;

CREATE TABLE `actionlogs` (
`id` int unsigned NOT NULL AUTO_INCREMENT,
`Action` varchar(45) DEFAULT NULL,
`Description` text,
`Indate` datetime DEFAULT NULL,
`AddedBy` int unsigned NOT NULL,
PRIMARY KEY (`id`)
) ;

CREATE TABLE `whatsapp_messages` (
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

`user_id` INT UNSIGNED NOT NULL,
`whatsapp_number` VARCHAR(20) NOT NULL,

`to_number` VARCHAR(20) NOT NULL,
`message` TEXT NOT NULL,

`message_type` ENUM('single','bulk') DEFAULT 'single',
`status` ENUM('pending','sent','failed') DEFAULT 'pending',

`error_message` TEXT DEFAULT NULL,
`sent_at` DATETIME DEFAULT NULL,

`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

PRIMARY KEY (`id`),
INDEX `idx_user_id` (`user_id`),
INDEX `idx_to_number` (`to_number`)
);

CREATE TABLE whatsapp_bulk_jobs (
id BIGINT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
message TEXT,
total_numbers INT DEFAULT 0,
sent_count INT DEFAULT 0,
failed_count INT DEFAULT 0,
status ENUM('PENDING','RUNNING','COMPLETED') DEFAULT 'PENDING',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE whatsapp_bulk_numbers (
id BIGINT AUTO_INCREMENT PRIMARY KEY,
bulk_id BIGINT NOT NULL,
mobile_no VARCHAR(20),
status ENUM('PENDING','SENT','FAILED') DEFAULT 'PENDING'
);

CREATE TABLE `whatsapp_bulk_campaigns` (
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

`user_id` INT UNSIGNED NOT NULL,
`whatsapp_number` VARCHAR(20) NOT NULL,

`campaign_name` VARCHAR(100) DEFAULT NULL,
`message` TEXT NOT NULL,

`total_numbers` INT DEFAULT 0,
`sent_count` INT DEFAULT 0,
`failed_count` INT DEFAULT 0,

`status` ENUM('pending','running','completed','failed') DEFAULT 'pending',

`started_at` DATETIME DEFAULT NULL,
`completed_at` DATETIME DEFAULT NULL,

`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

PRIMARY KEY (`id`),
INDEX `idx_user_id` (`user_id`)
) ;

CREATE TABLE `whatsapp_bulk_numbers` (
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

`campaign_id` BIGINT UNSIGNED NOT NULL,
`to_number` VARCHAR(20) NOT NULL,

`status` ENUM('pending','sent','failed') DEFAULT 'pending',
`error_message` TEXT DEFAULT NULL,
`sent_at` DATETIME DEFAULT NULL,

PRIMARY KEY (`id`),
INDEX `idx_campaign_id` (`campaign_id`),
INDEX `idx_to_number` (`to_number`)
);

CREATE TABLE `whatsapp_templates` (
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

`user_id` INT UNSIGNED NOT NULL,
`template_name` VARCHAR(100) NOT NULL,
`message` TEXT NOT NULL,

`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
`updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

PRIMARY KEY (`id`),
INDEX `idx_user_id` (`user_id`)
);

CREATE TABLE `whatsapp_logs` (
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

`user_id` INT UNSIGNED DEFAULT NULL,
`action` VARCHAR(50),
`request_data` TEXT,
`response_data` TEXT,
`ip_address` VARCHAR(45),

`created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,

PRIMARY KEY (`id`)
);

CREATE TABLE whatsapp_devices (
id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    user_id BIGINT UNSIGNED NOT NULL,
    device_name VARCHAR(100) NOT NULL,

    mobile_number VARCHAR(15) NOT NULL,
    sender_jid VARCHAR(30) DEFAULT NULL,   -- 919xxxxxxxx@c.us

    api_token VARCHAR(64) NOT NULL UNIQUE,

    webhook_url VARCHAR(255) DEFAULT NULL,

    status ENUM('ONLINE','OFFLINE','QR_REQUIRED','DISCONNECTED')
        DEFAULT 'OFFLINE',

    last_seen DATETIME DEFAULT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX (user_id),
    INDEX (mobile_number)

);

CREATE TABLE phonebooks (
id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id BIGINT UNSIGNED NULL,
name VARCHAR(150) NOT NULL,
total_numbers INT DEFAULT 0,
created_at datetime NULL DEFAULT CURRENT_TIMESTAMP,
updated_at datetime NULL DEFAULT null ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE phonebook_contacts (
id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
phonebook_id BIGINT UNSIGNED NOT NULL,
name VARCHAR(150) NULL,
mobile VARCHAR(20) NOT NULL,
created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);
