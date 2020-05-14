CREATE TABLE `tbllogactivity` (
  `logDateTime` DATETIME NOT NULL COMMENT 'Date and Time of Activity',
  `logActivity` VARCHAR(45) NULL COMMENT 'Activity : Insert / Update / Delete',
  `logTableName` VARCHAR(45) NULL COMMENT 'Table Activity\n',
  `logDetail` VARCHAR(255) NULL COMMENT 'Detail of the activity',
  `logUser` VARCHAR(45) NULL COMMENT 'User who do an activity.',
  PRIMARY KEY (`logDateTime`))
COMMENT = 'This table keeps activities of users';

/*Example of Triggers*/
DROP TRIGGER IF EXISTS InsertActivityBranch;
DELIMITER //
CREATE TRIGGER InsertActivityBranch AFTER INSERT ON TBLBRANCH
	FOR EACH ROW
BEGIN
	INSERT INTO TBLLOGACTIVITY (logDateTime,logActivity,logTableName,logDetail,logUser)
    VALUES (NOW(),'INSERT','TBLBRANCH',CONCAT('NEW ROW : ',NEW.BRANCH_ABBV,'/',NEW.BRANCH_DESC,'/',NEW.BRANCH_TYPE,'/' ,NEW.BRANCH_MANAGER_ID), CURRENT_USER);
END //


DROP TRIGGER IF EXISTS DeleteActivityBranch;
DELIMITER //
CREATE TRIGGER DeleteActivityBranch BEFORE DELETE ON TBLBRANCH
	FOR EACH ROW
BEGIN
	INSERT INTO TBLLOGACTIVITY (logDateTime,logActivity,logTableName,logDetail,logUser)
    VALUES (NOW(),'DELETE','TBLBRANCH',CONCAT('DELETE ROW : ',OLD.BRANCH_ABBV,'/',OLD.BRANCH_DESC,'/',OLD.BRANCH_TYPE,'/' ,OLD.BRANCH_MANAGER_ID),CURRENT_USER);
END //


DROP TRIGGER IF EXISTS UpdateActivityBranch;

DELIMITER //
CREATE TRIGGER UpdateActivityBranch AFTER UPDATE ON TBLBRANCH
	FOR EACH ROW
BEGIN
	INSERT INTO TBLLOGACTIVITY (logDateTime,logActivity,logTableName,logDetail,logUser)
    VALUES (NOW(),'UPDATE','TBLBRANCH',CONCAT('UPDATE ROW : ','ABBV OLD-NEW: ',OLD.BRANCH_ABBV,'-',NEW.BRANCH_ABBV,'/',
    'DESC OLD-NEW: ',OLD.BRANCH_DESC,'-',NEW.BRANCH_DESC,'/','TYPE OLD-NEW: ',OLD.BRANCH_TYPE,'-',NEW.BRANCH_TYPE,'/' ,
    'MANAGER OLD-NEW: ',OLD.BRANCH_MANAGER_ID,'-',NEW.BRANCH_MANAGER_ID),CURRENT_USER);
END //

SHOW TRIGGERS;