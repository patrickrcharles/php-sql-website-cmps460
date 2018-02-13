use website;

drop table if exists UserAccount;
drop table if exists Institution;
drop table if exists Category;
drop table if exists Subcategory;
drop table if exists Transaction;
drop table if exists Goals;

create table UserAccount (
CLID		varchar(7) not null,
fname		varchar(12),
lname		varchar(12),
user_password	varchar(16),
checking	int(12),
balance 	dec(9,2) not null,
savings		int(12),
sbalance	dec(9,2) not null,
primary key(CLID),
UNIQUE (CLID, checking, balance) 
);

INSERT INTO UserAccount 
VALUES 	('admin','','','admin','','','',''),
	('EJS9849','Erik','Schneider','password','123456','0','101100','20'),
	('PTC3456','Patrick','Charles','lemonsquares','789012','800','234567','40'),
	('KMP8690','Kevin','Pearson','lol','666222','9', '153573','600'),
	('SFH6490','Sean','Hungerford','canyousmellwhattherockiscooking','124680','0','299038','3'),
	('BOB2341','Bob','Bobbington','bobbyBoy721x9','434575','90','124909','65'),
	('JRM9080','Joanna','Manuel','nightingaleSinger','123414','80','593472','135'),
	('MDU9323','Meredith','Undertaker','FeArMEE','173913','12','896477','3000');

INSERT INTO UserAccount
VALUES ('AAA1111', 'Afirst','Alast','asdfasdfasdf','111111', '1000','101010','1000'),
('BBB1111', 'Bob','Bobb','200','222222', '2000','201010','2000'),
('CCC1111', 'Claire','Claireson','308','333333', '306','301010','3600'),
('EEE1111', 'Ein','Stein','4000','441111', '4000','401010','4000'),
('FFF1111', 'John','LastName','5000','611111', '8000','801010','8000'),
('GGG1111', 'George','Man','8800','881111', '8800','881010','8900');

create table Institution(
ID_no		varchar(3) NOT NULL AUTO_INCREMENT,
name		varchar(20),
cat_category	varchar(20),
cat_subcategory	varchar(20),
primary key(ID_no)
);


insert into Institution values('','RedRocket AutoShop','Automobile','Maintenance');
insert into Institution values('','Scammers R Us Insurance Company','Automobile','Loan Payment');
insert into Institution values('','Sad Babies Foundation','Charity','');
insert into Institution values('','Boots and Belts Emporium','Clothing','');
insert into Institution values('','Posterboards Outlet Store','Education','Books');
insert into Institution values('','Purgatory Loan Officers','Education','Student Loan Payment');
insert into Institution values('','Yum Yum Dining','Food','Dining Out');
insert into Institution values('','Dr. Crown','Healthcare','Dental');

insert into Institution values('', 'Johns','Automobile','Maintenance');
insert into Institution values('','Bobs Insurance','Insurance','Health');
insert into Institution values('','The Club','Entertainment','Reading material');
insert into Institution values('','Health and Wellness','Healthcare','Medical');
insert into Institution values('','Health Vision','Healthcare','Vision');
insert into Institution values('','Our Insurance','Insurance','Health');
insert into Institution values('','The Pizza Place','Food','Dining Out');
insert into Institution values('','The Insurance Specialists','Insurance','Health');

create table Category(
cat_ID			varchar(3) NOT NULL AUTO_INCREMENT,
type			char(12),
name			varchar(20),
subcategory		varchar(20),
primary key (cat_ID)
);

insert into Category values('','income','paycheck','');
insert into Category values('','income','miscellaneous income','' );
insert into Category values('','expense','gasoline','Automobile' );
insert into Category values('','expense','maintenance','Automobile' );
insert into Category values('','expense','auto loan payment','Automobile' );
insert into Category values('','expense','','Charity' );
insert into Category values('','expense','','Clothing' );
insert into Category values('','expense','tuition','Education' );
insert into Category values('','expense','books','Automobile' );
insert into Category values('','expense','student loan payment','Automobile' );
insert into Category values('','expense','groceries','Food' );
insert into Category values('','expense','dining out','Food' );
insert into Category values('','expense','dental','Healthcare' );
insert into Category values('','expense','vision','Healthcare' );
insert into Category values('','expense','medical','Healthcare' );
insert into Category values('','expense','rent/mortgage payment','Household' );
insert into Category values('','expense','utilities','Household' );
insert into Category values('','expense','automobile','Insurance' );
insert into Category values('','expense','health','Insurance' );
insert into Category values('','expense','reading material','Entertainment' );
insert into Category values('','expense','movies','Entertainment' );
insert into Category values('','expense','sporting events','Entertainment' );
insert into Category values('','expense','sporting goods','Entertainment' );
insert into Category values('','expense','','Transfer to Savings' );
insert into Category values('','expense','','Miscellaneous' );

create table Subcategory(
sub_cat_ID		varchar(3) NOT NULL AUTO_INCREMENT,
sub_name		varchar(20),
category_name		varchar(20),
primary key (sub_cat_ID)
);

insert into Subcategory Values('','Reading Material','Entertainment');
insert into Subcategory Values('','Movies','Entertainment');
insert into Subcategory Values('','Dental','Healthcare');
insert into Subcategory Values('','Tuition','Education');
insert into Subcategory Values('','Books','Education');


create table Transaction(

user_CLID		char(7),
transaction_id		int(16) NOT NULL AUTO_INCREMENT,
amount			dec(9,2) not null,
inst_name		varchar(20),
inst_category		varchar(20),
inst_subcategory	varchar(20),
check_num		int(10),
transaction_date	int(8),
primary key(transaction_id)
);

insert into Transaction values('BOB2341','','100','The Club ','income','paycheck','12435345','20150101');
insert into Transaction values('','100','burger king','income',' ','12345','20151101');
insert into Transaction values('BOB2341','','100','The Pizza Place ','expense','paycheck','12345','20150121');
insert into Transaction values
('BOB2341','','100','Yum Yum Dining','income','paycheck','12345','20150401');
insert into Transaction values('BOB2341','','100','Yum Yum Dining','income','paycheck','12543345','20150131');


insert into Transaction values('AAA1111','','100','The Club ','income','paycheck','543534','20150101');
insert into Transaction values('','100','burger king','income',' ','5435','20151101');
insert into Transaction values('AAA1111','','100','The Pizza Place ','expense','paycheck','12345','20150121');
insert into Transaction values
('BOB2341','','100','Yum Yum Dining','income','paycheck','12345','20150401');
insert into Transaction values('BBB1111','','100','Yum Yum Dining','income','paycheck','543','20150131');

insert into Transaction values('CCC1111','','100','The Club ','income','paycheck','543','20150101');
insert into Transaction values('','100','burger king','income',' ','453543','20151101');
insert into Transaction values('BBB1111','','100','The Pizza Place ','expense','paycheck','543543','20150121');
insert into Transaction values
('BOB2341','','100','Yum Yum Dining','income','paycheck','12345','20150401');
insert into Transaction values('BOB2341','','100','Yum Yum Dining','income','paycheck','4543','20150131');

insert into Transaction values('EJS9849','','100','The Club ','income','paycheck','5345','20150101');
insert into Transaction values('','100','burger king','income',' ','5435','20151101');
insert into Transaction values('CCC1111','','100','The Pizza Place ','expense','paycheck','543','20150121');
insert into Transaction values
('BOB2341','','100','Yum Yum Dining','income','paycheck','12345','20150401');
insert into Transaction values('EJS9849','','100','Yum Yum Dining','income','paycheck','1233554345','20150131');

insert into Transaction values('BOB2341','','100','The Club ','income','paycheck','134532345','20150101');
insert into Transaction values('','100','burger king','income',' ','1235345345','20151101');
insert into Transaction values('CCC1111','','100','The Pizza Place ','expense','paycheck','12345','20150121');
insert into Transaction values
('BOB2341','','100','Yum Yum Dining','income','paycheck','12345','20150401');
insert into Transaction values('BOB2341','','100','Yum Yum Dining','income','paycheck','15345342345','20150131');

insert into Transaction values('CCC1111','','100','The Club ','income','paycheck','12543543345','20150101');
insert into Transaction values('','100','burger king','income',' ','12354353445','20151101');
insert into Transaction values('BOB2341','','100','The Pizza Place ','expense','paycheck','534534','20150121');
insert into Transaction values
('BOB2341','','100','Yum Yum Dining','income','paycheck','12345','20150401');
insert into Transaction values('CCC1111','','100','Yum Yum Dining','income','paycheck','543543','20150131');

insert into Transaction values('EJS9849','','100','The Club ','income','paycheck','12345','20150101');
insert into Transaction values('','100','burger king','income',' ','12345','20151101');
insert into Transaction values('EJS9849','','100','The Pizza Place ','expense','paycheck','12345','20150121');
insert into Transaction values
('BOB2341','','100','Yum Yum Dining','income','paycheck','1254353345','20150401');
insert into Transaction values('CCC1111','','100','Yum Yum Dining','income','paycheck','543512345','20150131');


create table Goals(
goals_id		varchar(4) NOT NULL AUTO_INCREMENT,
user_CLID		char(7),
inst_category		varchar(20),
inst_subcategory	varchar(20),
goal_amount		decimal,
primary key(goals_id)
);
insert into Goals Values('','ejs9849','Food','Dining out','50');
insert into Goals Values('','ejs9849','Food','Groceries','300');
insert into Goals Values('','ejs9849','Entertainment','Movies','600');
insert into Goals Values('','ejs9849','Misc.','','200');
insert into Goals Values('','ejs9849','Household','Utilities','80');

insert into Goals Values('','AAA1111','Food','Dining out','50');
insert into Goals Values('','AAA1111','Food','Groceries','300');
insert into Goals Values('','AAA1111','Entertainment','Movies','600');
insert into Goals Values('','AAA1111','Misc.','','200');
insert into Goals Values('','AAA1111','Household','Utilities','80');

insert into Goals Values('','BBB1111','Food','Dining out','50');
insert into Goals Values('','BBB1111','Food','Groceries','300');
insert into Goals Values('','BBB1111','Entertainment','Movies','600');
insert into Goals Values('','BBB1111','Misc.','','200');
insert into Goals Values('','BBB1111','Household','Utilities','80');

insert into Goals Values('','BOB2341','Food','Dining out','50');
insert into Goals Values('','BOB2341','Food','Groceries','300');
insert into Goals Values('','BOB2341','Entertainment','Movies','600');
insert into Goals Values('','BOB2341','Misc.','','200');
insert into Goals Values('','BOB2341','Household','Utilities','80');


insert into Goals Values('','CCC1111','Food','Dining out','50');
insert into Goals Values('','CCC1111','Food','Groceries','300');
insert into Goals Values('','CCC1111','Entertainment','Movies','600');
insert into Goals Values('','CCC1111','Misc.','','200');
insert into Goals Values('','CCC1111','Household','Utilities','80');

insert into Goals Values('','EEE1111','Food','Dining out','50');
insert into Goals Values('','EEE1111','Food','Groceries','300');
insert into Goals Values('','EEE1111','Entertainment','Movies','600');
insert into Goals Values('','EEE1111','Misc.','','200');
insert into Goals Values('','EEE1111','Household','Utilities','80');

insert into Goals Values('','FFF1111','Food','Dining out','50');
insert into Goals Values('','FFF1111','Food','Groceries','300');
insert into Goals Values('','FFF1111','Entertainment','Movies','600');
insert into Goals Values('','FFF1111','Misc.','','200');
insert into Goals Values('','FFF1111','Household','Utilities','80');

insert into Goals Values('','GGG1111','Food','Dining out','50');
insert into Goals Values('','GGG1111','Food','Groceries','300');
insert into Goals Values('','GGG1111','Entertainment','Movies','600');
insert into Goals Values('','GGG1111','Misc.','','200');
insert into Goals Values('','GGG1111','Household','Utilities','80');

insert into Goals Values('','JRM9080','Food','Dining out','50');
insert into Goals Values('','JRM9080','Food','Groceries','300');
insert into Goals Values('','JRM9080','Entertainment','Movies','600');
insert into Goals Values('','JRM9080','Misc.','','200');
insert into Goals Values('','JRM9080','Household','Utilities','80');

insert into Goals Values('','KMP8690','Food','Dining out','50');
insert into Goals Values('','KMP8690','Food','Groceries','300');
insert into Goals Values('','KMP8690','Entertainment','Movies','600');
insert into Goals Values('','KMP8690','Misc.','','200');
insert into Goals Values('','KMP8690','Household','Utilities','80');


insert into Goals Values('','PTC3456','Food','Dining out','50');
insert into Goals Values('','PTC3456','Food','Groceries','300');
insert into Goals Values('','PTC3456','Entertainment','Movies','600');
insert into Goals Values('','PTC3456','Misc.','','200');
insert into Goals Values('','PTC3456','Household','Utilities','80');

insert into Goals Values('','MDU9323','Food','Dining out','50');
insert into Goals Values('','MDU9323','Food','Groceries','300');
insert into Goals Values('','MDU9323','Entertainment','Movies','600');
insert into Goals Values('','MDU9323','Misc.','','200');
insert into Goals Values('','MDU9323','Household','Utilities','80');


insert into Goals Values('','SFH6490','Food','Dining out','50');
insert into Goals Values('','SFH6490','Food','Groceries','300');
insert into Goals Values('','SFH6490','Entertainment','Movies','600');
insert into Goals Values('','SFH6490','Misc.','','200');
insert into Goals Values('','SFH6490','Household','Utilities','80');




describe UserAccount;
describe Institution;
describe Category;
describe Subcategory;
describe Transaction;
describe Goals;

