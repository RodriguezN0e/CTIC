create database loanmaterial;

create table Major(idMayor int primary key auto_increment, nameMajor varchar(70) unique, codeMajor varchar(10) unique, statusMajor enum('Active','Inactive') default 'Active');


create table groups(idGroup int primary key auto_increment, nameGroup varchar(60) unique, codeGroup varchar(10) unique, fkMajor int, foreign key(fkMajor) references major(idMajor));


create table Students(idStudent int primary key auto_increment, nameStudent varchar(60),lastNameStudent varchar(100), enrollmentStudent varchar(60), carrerStudent varchar(60), telefoneStudent int(13), emailStudent varchar(70), fkGroup int, foreign key (fkGroup) references groups(idGroup));


create table electricMaterial(idElectric int primary key auto_increment, nameElectric varchar(60), codeElectric varchar(20), descriptionElectric text);

create table taekwondoMaterial(idTaekwondo int primary key auto_increment, nameTaekwondo varchar(60), codeTaekwondo varchar(15), descriptionTaekwondo text);

create table teachers(idTeacher int primary key auto_increment, nameTeacher varchar(60), lastNameTeacher varchar(60), noEmployeeteacher varchar(15), phoneTeacher varchar(15), emailTeacher varchar(100), fkMajor int, foreign key(fkMajor) references major(idMajor));

create or replace view vw_groupmajor as select g.*,m.nameMajor from major as m, groups as g WHERE g.fkMajor = m.idMajor;

create or replace view vw_teachermajor as select t.*,m.nameMajor from major as m, teachers as t WHERE t.fkMajor = m.idMajor;

create or replace view vw_prestamosstudentdeport as select p.*, s.nameStudent, d.nameDeportive, s.enrollmentStudent, s.lastNameStudent, d.CodeDeportive from students as s, materialdeportive as d, prestamosds as p where fkStudent = idStudent AND fkDeport = idDeportive;

create table prestamosts(idPrestamo int primary key auto_increment, fkStudent int, fkTaekwondo int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date);

create or replace view vw_prestamosstudenttaekwondo as select p.*, s.nameStudent, t.nameTaekwondo, s.enrollmentStudent, s.lastNameStudent, t.codeTaekwondo from students as s, taekwondomaterial as t, prestamosts as p where fkStudent = idStudent AND fkTaekwondo = idTaekwondo;

create or replace table prestamoses(IdPrestamo int primary key auto_increment, fkStudent int, fkElectric int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date);

create or replace view vw_prestamosstudentelectric as select p.*, s.nameStudent, e.nameElectric, s.enrollmentStudent, s.lastNameStudent, e.codeElectric from students as s, electricmaterial as e, prestamoses as p where fkStudent = idStudent AND fkElectric = idElectric;

create or replace table prestamosis(idPrestamo int primary key auto_increment, fkStudent int, fkInstrument int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date);

create or replace view vw_prestamosstudentinstrument as select p.*, s.nameStudent, i.nameInstrument, s.enrollmentStudent, s.lastNameStudent, i.codeInstrument from students as s, Instruments as i, prestamosis as p where fkStudent = idStudent AND fkInstrument = idInstrument;

create or replace table prestamosls(idPrestamo int primary key auto_increment, fkStudent int, fkLaptop int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date);

create or replace view vw_prestamosstudentlaptop as select p.*, s.nameStudent, l.brandLaptop, s.enrollmentStudent, s.lastNameStudent, l.modelLaptop from students as s, laptops as l, prestamosls as p where fkStudent = idStudent AND fkLaptop = idLaptop;

create or replace table prestamosss(idPrestamo int primary key auto_increment, fkStudent int, fkSchool int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date);

create or replace view vw_prestamosstudentschool as select p.*, s.nameStudent, ss.nameSchool, s.enrollmentStudent, s.lastNameStudent, ss.codeSchool from students as s, schoolmaterial as ss, prestamosss as p where fkStudent = idStudent AND fkSchool = IdSchool;

create table prestamosdt(idPrestamo int primary key auto_increment, fkTeacher int, fkDeport int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date, foreign key(fkTeacher) references teachers(idTeacher), foreign key(fkDeport) references materialdeportive(idDeportive));

create or replace view vw_prestamosteacherdeport as select p.*, t.nameTeacher, d.nameDeportive, t.noEmployeeteacher, t.lastNameTeacher, d.codeDeportive from teachers as t, materialdeportive as d, prestamosdt as p where fkTeacher = idTeacher AND fkDeport = idDeportive;

create table prestamosbt(idPrestamo int primary key auto_increment, fkTeacher int, fkBook int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date, foreign key(fkTeacher) references teachers(idTeacher), foreign key(fkBook) references books(idBook));

create or replace view vw_prestamosteacherbook as select p.*, t.nameTeacher, b.nameBook, t.noEmployeeteacher, t.lastNameTeacher, b.noAdquisition from teachers as t, books as b, prestamosbt as p where fkTeacher = idTeacher AND fkBook = idBook;

create table prestamoset(idPrestamo int primary key auto_increment, fkTeacher int, fkElectric int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date, foreign key(fkTeacher) references teachers(idTeacher), foreign key(fkElectric) references electricMaterial(idElectric));

create or replace view vw_prestamosteacherelectric as select p.*, t.nameTeacher, e.nameElectric, t.noEmployeeteacher, t.lastNameTeacher, e.codeElectric from teachers as t, electricMaterial as e, prestamoset as p where fkTeacher = idTeacher AND fkElectric = idElectric;

create table prestamosit(idPrestamo int primary key auto_increment, fkTeacher int, fkInstrument int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date, foreign key(fkTeacher) references teachers(idTeacher), foreign key(fkInstrument) references instruments(idInstrument));

create or replace view vw_prestamosteacherinstrument as select p.*, t.nameTeacher, i.nameInstrument, t.noEmployeeteacher, t.lastNameTeacher, i.codeInstrument from teachers as t, instruments as i, prestamosit as p where fkTeacher = idTeacher AND fkInstrument = idInstrument;

create table prestamoslt(idPrestamo int primary key auto_increment, fkTeacher int, fkLaptop int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date, foreign key(fkTeacher) references teachers(idTeacher), foreign key(fkLaptop) references laptops(idLaptop));

create or replace view vw_prestamosteacherlaptop as select p.*, t.nameTeacher, l.brandLaptop, t.noEmployeeteacher, t.lastNameTeacher, l.modelLaptop from teachers as t, laptops as l, prestamoslt as p where fkTeacher = idTeacher AND fkLaptop = idLaptop;

create table prestamosst(idPrestamo int primary key auto_increment, fkTeacher int, fkSchool int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date, foreign key(fkTeacher) references teachers(idTeacher), foreign key(fkSchool) references schoolmaterial(IdSchool));

create or replace view vw_prestamosteacherschool as select p.*, t.nameTeacher, s.nameSchool, t.noEmployeeteacher, t.lastNameTeacher, s.codeSchool from teachers as t, schoolmaterial as s, prestamosst as p where fkTeacher = idTeacher AND fkSchool = idSchool;

create table prestamostt(idPrestamo int primary key auto_increment, fkTeacher int, fkTaekwondo int, statusPrestamo enum('Active','Inactive','Pending'), dateLoan timestamp default current_timestamp, dateReturn date, foreign key(fkTeacher) references teachers(idTeacher), foreign key(fkTaekwondo) references taekwondomaterial(idTaekwondo));

create or replace view vw_prestamosteachertaekwondo as select p.*, t.nameTeacher, ta.nameTaekwondo, t.noEmployeeteacher, t.lastNameTeacher, ta.codeTaekwondo from teachers as t, taekwondomaterial as ta, prestamostt as p where fkTeacher = idTeacher AND fkTaekwondo = idTaekwondo;

create table reportsds(idReport int primary key auto_increment, descriptionReport text, fkPrestamo int, reasonReport enum('Damage','Loss'), foreign key(fkPrestamo) references prestamosds(idPrestamo));

create or replace view vw_reportprestamo as select r.* from reportsds as r, prestamosds as p WHERE r.fkPrestamo = p.idPrestamo;

   create or replace view vw_Returnds as select m.idDeportive as idDeportive,
   m.nameDeportive as nameDeportive,
   m.descriptionDeportive as descriptionDeportive,
   m.stockMaterial as stockMaterial,
   m.codeDeportive as codeDeportive,
   l.idLoan as idLoan,
   l.total as total
   from materialdeportive as m,
   loans as l , loandetail_ds as ld
   where m.idDeportive = ld.fkMaterial and  l.idLoan= ld.fkLoan;

   CREATE OR REPLACE VIEW `vw_returnds` AS select `m`.`idDeportive` AS `idDeportive`,`m`.`nameDeportive` AS `nameDeportive`, idLoanDetail,`m`.`descriptionDeportive` AS `descriptionDeportive`,`m`.`stockMaterial` AS `stockMaterial`,`m`.`codeDeportive` AS `codeDeportive`,`l`.`idLoan` AS `idLoan`,`l`.`total` AS `total` from ((`materialdeportive` `m` join `loans` `l`) join `loandetail_ds` `ld`) where ((`m`.`idDeportive` = `ld`.`fkMaterial`) and (`l`.`idLoan` = `ld`.`fkLoan`));

CREATE VIEW `vw_usermanager` AS select `u`.`idUser` AS `idUser`,`u`.`nameUser` AS `nameUser`,`u`.`LastNameUser` AS `LastNameUser`,`u`.`emailUser` AS `emailUser`,`u`.`noEmployee` AS `noEmployee`,`u`.`phoneUser` AS `phoneUser`,`u`.`passwordUser` AS `passwordUser`,`u`.`statusUser` AS `statusUser`,`u`.`typeUser` AS `typeUser` from `users` `u` where (`u`.`typeUser` = 'Manager') | cp932                | cp932_japanese_ci    |