-- Solo si YA importaste la versión anterior de database.sql
USE fardel_db;
ALTER TABLE households ADD COLUMN invite_code CHAR(8) NULL UNIQUE AFTER name;
UPDATE households SET invite_code = UPPER(SUBSTRING(MD5(RAND()),1,8)) WHERE invite_code IS NULL;
