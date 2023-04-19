CREATE Table user_log (
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    email VARCHAR(20) UNIQUE NOT NULL,
    sID VARCHAR(9) UNIQUE NOT NULL,
    username VARCHAR(20) UNIQUE NOT NULL,
    pwd VARCHAR(20) NOT NULL,
    courses VARCHAR(100),
    isStudent TINYINT(1),
    isTA TINYINT(1),
    isProf TINYINT(1),
    isAdmin TINYINT(1),
    isSysOp TINYINT(1),
    PRIMARY KEY(sID)
);


/* for prof account  DO NOT UPDATE THESE! */
/* We have 5 Prof and 5 TA and 2 Student for test */
/* Student can be used for testing SysOp update */
INSERT INTO user_log(first_name,last_name,email,sID,username,pwd,courses,isStudent,isTA,isProf,isAdmin,isSysOp) VALUES
('Joseph','Vybihal','jv@mail.mcgill.ca','260900001','jv','123','COMP307',0,0,1,0,1), /* SysOp */
('David','Becerra','db@mail.mcgill.ca','260900002','db','123','COMP321',0,0,1,1,0), /* Admin */
('Prakash','Panangaden','pp@mail.mcgill.ca','260900003','pp','123','COMP330',0,0,1,0,0), /* prof */
('Yi','Yang','yy@mail.mcgill.ca','260900004','yy','123','MATH423',0,0,1,0,0),
('Joseph',"D'silva",'jd@mail.mcgill.ca','260900005','jd','123','COMP421',0,0,1,0,0),

('TA',"1",'ta1@mail.mcgill.ca','260900006','ta1','123','COMP307',0,1,0,0,0), /* TA for each course */
('TA',"2",'ta2@mail.mcgill.ca','260900007','ta2','123','COMP321',0,1,0,0,0),
('TA',"3",'ta3@mail.mcgill.ca','260900008','ta3','123','COMP330',0,1,0,0,0),
('TA',"4",'ta4@mail.mcgill.ca','260900009','ta4','123','MATH423',0,1,0,0,0),
('TA',"5",'ta5@mail.mcgill.ca','260900010','ta5','123','COMP421',0,1,0,0,0),

('Stud',"1",'s1@mail.mcgill.ca','260900011','s1','123','COMP307',1,0,0,0,0), /* 2 student for test */
('Stud',"2",'s2@mail.mcgill.ca','260900012','s2','123','COMP330',1,0,0,0,0);
/*-------------------------------------------------account for test--------------------------------------------------------*/




CREATE TABLE courses (
    term VARCHAR(20) NOT NULL, /* Fall2022 */
    cID VARCHAR(10) NOT NULL, /* COMP307 */
    cName VARCHAR(50) NOT NULL, /* Web Development */
    PRIMARY KEY(term,cID)
);
INSERT INTO courses(term,cID,cName) VALUES /* one course per prof */
('Winter/01/22','COMP307','Web Development'),
('Winter/01/22','COMP321','Programming Challenge'),
('Fall/09/21','COMP330','Theory of Computation'),
('Fall/09/21','MATH423','Linear Regression'),
('Winter/01/21','COMP421','Database');

/* yellow part */
CREATE TABLE prof (
    term VARCHAR(10),
    cID VARCHAR(10), 
    cName VARCHAR(50), 
    pName VARCHAR(30),
    pID VARCHAR(9),
    PRIMARY KEY(pID),
    foreign key(pID) references user_log(sid)
);

INSERT INTO prof(term,cID,cName,pName,pID) VALUES 
('Winter/01/22','COMP307','Web Development','Joseph Vybihal','260900001'),
('Winter/01/22','COMP321','Programming Challenge','David Becerra','260900002'),
('Fall/09/21','COMP330','Theory of Computation','Prakash Panangaden','260900003'),
('Fall/09/21','MATH423','Linear Regression','Yi Yang','260900004'),
('Winter/01/21','COMP421','Database',"Joseph D'silva",'260900005');



CREATE TABLE rating (
   rID Integer, 
   term VARCHAR(10) NOT NULL, /* 请按照这个格式： Winter/01/22, Fall/09/21, Summer/05/22 */
   course VARCHAR(30) NOT NULL,
   score TINYINT(1) NOT NULL,
   TAName VARCHAR(30) NOT NULL,
   comm VARCHAR(300), 
   PRIMARY KEY(rID)
);

/* for orange/blue part */
CREATE Table courseQuota (
    term VARCHAR(10),
    cID VARCHAR(10), /* COMP307 */
    cType VARCHAR(10),
    cName VARCHAR(50), /* Web Development */
    iName VARCHAR(50), /* instrcutor name */
    enrolNum INTEGER, 
    TAQuata INTEGER,
    PRIMARY KEY(term,cID)
);


/* should be import from TA cohort csv */
-- INSERT INTO courseQuota(term,cID,cType,cName,iName,enrolNum,TAQuata) VALUES 
-- ("Winter/01/22","COMP307","COMP","Web Development","Joseph Vybihal",200,10),
-- ("Winter/01/22","COMP321","COMP","Programming Challenge","David Becerra",300,20),
-- ("Fall/09/21","COMP330","COMP","Theory of Computation","Prakash Panangaden",250,12),
-- ("Fall/09/21","MATH423","MATH","Linear Regression","Yi Yang",300,10),
-- ("Winter/01/21","COMP421","COMP","Database","Joseph D'silva",300,20);



CREATE Table TAcohort (
    term VARCHAR(10),
    TAName VARCHAR(30),
    sID VARCHAR(9) PRIMARY KEY NOT NULL,
    legalName VARCHAR(30),
    email VARCHAR(30),
    TAStatus TINYINT(1), /* undergraduate:0, graduate:1 */
    superName VARCHAR(30), /* supervisor name */
    prio BOOLEAN, /* has priority or not */
    TAHours INTEGER CHECK(TAHours = 90 OR TAHours = 180),
    dApply DATE, /* YYYY-MM-DD */
    loc VARCHAR(50), /* 3459 Tavish */
    phone VARCHAR(20),
    degree VARCHAR(30),
    cApplied VARCHAR(30), /* COMP307 */
    openToOther BOOLEAN,
    notes VARCHAR(100)
);




CREATE Table TAhist (
    TAID INTEGER PRIMARY KEY NOT NULL,
    sID VARCHAR(9) NOT NULL,
    term VARCHAR(20) NOT NULL,
    TAName VARCHAR(10) NOT NULL,
    cID VARCHAR(10) NOT NULL,
    assignedHour INTEGER NOT NULL CHECK(assignedHour = 90 OR assignedHour = 180)
);


INSERT INTO TAhist(TAID,sID,term,TAName,cID,assignedHour) VALUES
(1,'260910006','Winter/01/22','TA 1','COMP307',90),
(2,'260910007','Winter/01/22','TA 2','COMP321',90),
(3,'260910008','Fall/09/21','TA 3','COMP330',180),
(4,'260910009','Fall/09/21','TA 4','MATH423',180),
(5,'2609100010','Winter/01/21','TA 5','COMP421',180);




/* blue part: office hour, performance Log, wishlist */
CREATE TABLE OH (
    oHour TEXT, /* YYYY-MM-DD HH:MM:SS.SSS  -> 2022-04-10 13:00:00 */
    oLocation VARCHAR(50), /* Trottier3120 */
    oDuty VARCHAR(300), /* "help students with assignment" */
    sID VarCHAR(9),
    CID VarCHAR(10),
    term VarCHAR(10),
    TAName VarChar(30),
    FOREIGN KEY(term,CID) REFERENCES courses,
    FOREIGN KEY(sID) REFERENCES TAhist,
    Primary key(sID,term,CID,oHour)
);

CREATE Table perfLog ( 
    logID INTEGER PRIMARY KEY,
    term VARCHAR(10),
    cID VARCHAR(10), /* COMP307 */
    TAName VARCHAR(30),
    comm VARCHAR(300), /* performance note */
    sID VarCHAR(9),
    FOREIGN KEY(sID) REFERENCES TAhist,
    FOREIGN KEY(term,CID) REFERENCES courseQuota
);

CREATE Table wishlist (
    term VARCHAR(10),
    cID VARCHAR(10),
    pName VARCHAR(30),
    TAName VARCHAR(30),
    sID VarCHAR(9) NOT NULL,
    PRIMARY KEY(sID,term,CID,TAName),
    FOREIGN KEY(term,CID) REFERENCES courseQuota
);






