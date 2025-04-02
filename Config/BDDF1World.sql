create table Ecurie (
TeamID int not null auto_increment,
TeamNom Varchar(25), 
TeamLocaQG VarChar(20),
TeamAnneeArriver int,
primary key (TeamID)
);

create table TitreConstructeur (
TitreConstruID int not null auto_increment,
TeamID int,
TitreConstruNB int, 
TitreConstruPremierDate int,
TitreConstruDernierDate int,
primary key (TitreConstruID),
foreign key (TeamID) references Ecurie (TeamID)
);

create table TeamPrinciples (
TPID int not null auto_increment,
TPAnnif int, 
TPNom VarChar(20),
TPPrenom VarChar(20),
TPNationalite VarChar(25),
primary key (TPID)
);

create table Ingenieur (
IngeID int not null auto_increment,
IngeAnnif int, 
IngeNom VarChar(20),
IngePrenom VarChar(20),
IngeNationalite VarChar(25),
primary key (IngeID)
);

create table Pilote (
PiloteID int not null auto_increment,
PiloteAnnif int, 
PiloteNom VarChar(20),
PilotePrenom VarChar(20),
PiloteNationalite VarChar(25),
primary key (PiloteID)
);

create table TitrePilote (
TitrePiloteID int not null auto_increment,
PiloteID int,
TitreNB int,
TitrePremierDate int,
TitreDernierDate int,
primary key (TitrePiloteID),
foreign key (PiloteID) references Pilote (PiloteID)
);

create table Appartenance (
EmployeeID int not null auto_increment,
TeamID int,
PiloteID int,
TPID int,
IngeID int,
EmployeeDateArriver int,
primary key (EmployeeID),
foreign key (TeamID) references Ecurie (TeamID),
foreign key (PiloteID) references Pilote (PiloteID),
foreign key (TPID) references TeamPrinciples (TPID),
foreign key (IngeID) references Ingenieur (IngeID)
);

create table Commentateur (
CommLangueID int not null auto_increment,
CommPays VarChar(20),
CommNomPrenom VarChar(50),
CommAnnif int,
CommDescription VarChar(100),
primary key (CommLangueID)
);