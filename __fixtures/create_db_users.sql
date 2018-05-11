-- users per privacy mmone
CREATE USER 'prvusr_2'@'localhost' IDENTIFIED BY 'b0ad9eab920200b0cc27660afd4b4a86';
CREATE USER 'prvusr_2'@'%' IDENTIFIED BY 'b0ad9eab920200b0cc27660afd4b4a86';

GRANT SELECT, INSERT, UPDATE, DELETE ON privacy_2.* to prvusr_2@'localhost' IDENTIFIED BY 'b0ad9eab920200b0cc27660afd4b4a86';
GRANT SELECT, INSERT, UPDATE, DELETE ON privacy_2.* to prvusr_2@'%' IDENTIFIED BY 'b0ad9eab920200b0cc27660afd4b4a86';
