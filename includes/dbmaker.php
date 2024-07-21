<?php 

$conn = mysqli_connect("localhost","root","");

$sql = "CREATE DATABSE `adminpanel`";
mysqli_query($conn,$sql);

$sql = "CREATE TABLE `adminpanel`.`projects` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `description` TEXT NOT NULL , `intension` TEXT NOT NULL , `deadline` TIMESTAMP NOT NULL , `status` INT NOT NULL , `createdon` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`user` ( `id` INT NOT NULL AUTO_INCREMENT, `firstName` TEXT NOT NULL ,  `lastName` TEXT NOT NULL , `user_name` TEXT NOT NULL , `user_email` TEXT NOT NULL , `image` TEXT NOT NULL , `userId` TEXT NOT NULL , `password` TEXT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`) ) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`assets` ( `id` INT NOT NULL AUTO_INCREMENT , `asset_id` TEXT NOT NULL , `asset_name` TEXT NOT NULL ,`asset_location` TEXT NOT NULL , `type` TEXT NOT NULL , `size` TEXT NOT NULL , `status` TEXT NOT NULL , `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`projects_files` ( `id` INT NOT NULL AUTO_INCREMENT ,`project_id` TEXT NOT NULL ,`file_name` TEXT NOT NULL ,`file_location` TEXT NOT NULL ,`status` INT NOT NULL ,`created_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`reset_pwd` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` TEXT NOT NULL , `email` TEXT NOT NULL , `reset_code` TEXT NOT NULL , `created_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`scripts` ( `id` INT NOT NULL AUTO_INCREMENT, `name` TEXT NOT NULL , `script_id` TEXT NOT NULL , `scriptName` TEXT NOT NULL , `scriptType` TEXT NOT NULL , `file_location` TEXT NOT NULL , `status` INT NOT NULL ,  `created_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`tmpSesId` ( `id` INT NOT NULL AUTO_INCREMENT, `type` TEXT NOT NULL , `typeid` TEXT NOT NULL , `status` TEXT NOT NULL , `created_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`db_log` ( `id` INT NOT NULL AUTO_INCREMENT, `sett_for` TEXT NOT NULL , `sett` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`texteditor` ( `id` INT NOT NULL AUTO_INCREMENT, `uniqId` TEXT NOT NULL , `title` TEXT NOT NULL , `contType` TEXT NOT NULL , `catg` TEXT NOT NULL , `tags` TEXT NOT NULL , `description` TEXT NOT NULL , `content` TEXT NOT NULL ,  `status` INT NOT NULL , `created_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`messages` ( `id` INT NOT NULL AUTO_INCREMENT, `notifor` TEXT NOT NULL , `notiFrom` TEXT NOT NULL , `notification` TEXT NOT NULL, `type` TEXT NOT NULL , `status` INT NOT NULL , `createdon` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$sql = "CREATE TABLE `adminpanel`.`webprojects` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `project_name` TEXT NOT NULL , `status` INT NOT NULL , `created_on` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);

$sql = "CREATE TABLE `adminpanel`.`userlog` ( `id` INT NOT NULL AUTO_INCREMENT, `user_id` TEXT NOT NULL , `status` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);

$sql = "CREATE TABLE `adminpanel`.`pers_log_book` ( `log_id` TEXT NOT NULL , `logBook_name` TEXT NOT NULL , `logBook_desc` TEXT NOT NULL , `status` TEXT NOT NULL , `logTables` INT NOT NULL , `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`log_id`(100))) ENGINE = InnoDB;";
mysqli_query($conn,$sql);

$sql = "CREATE TABLE `adminpanel`.`logbook_Data` ( `logDataId` TEXT NOT NULL , `logBook_id` TEXT NOT NULL , `onheader` TEXT NOT NULL , `data` TEXT NOT NULL , PRIMARY KEY (`logDataId`(100))) ENGINE = InnoDB;";
mysqli_query($conn,$sql);

$sql = "CREATE TABLE `adminpanel`.`logbook_header` ( `id` INT NOT NULL AUTO_INCREMENT , `logBook_id` TEXT NOT NULL , `header` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);

$sql = "CREATE TABLE `adminpanel`.`chartsType` ( `id` TEXT NOT NULL AUTO_INCREMENT , `chartsOn` INT NOT NULL , `type` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);

echo 'Db Created';


