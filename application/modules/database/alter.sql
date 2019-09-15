ALTER TABLE `ref_course`
ADD COLUMN `prodi_id` INT NULL AFTER `status`;
ALTER TABLE `ref_room`
ADD COLUMN `prodi_id` INT NULL AFTER `status`;
