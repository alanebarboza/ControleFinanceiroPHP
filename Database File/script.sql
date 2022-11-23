CREATE TABLE USERACCOUNT (
     ID INT NOT NULL AUTO_INCREMENT,
     NAME CHAR(30) NOT NULL,
     EMAIL CHAR(30) NOT NULL,
     PASSWORD CHAR(30) NOT NULL,
     PRIMARY KEY (ID)
);

CREATE TABLE BILLS (
     ID INT NOT NULL AUTO_INCREMENT,
     USERACCOUNTID INT NOT NULL,
     GROUPDESCRIPTION CHAR(20) NOT NULL,
     CARD CHAR(15) NOT NULL,
     DESCRIPTION CHAR(50) NOT NULL,
     DIVIDEBY INT,
     VALUE DECIMAL(10,4) NOT NULL,    
     PURCHASEDATE DATETIME NOT NULL,
     PRIMARY KEY (ID),
     FOREIGN KEY (USERACCOUNTID) REFERENCES USERACCOUNT(ID)
);