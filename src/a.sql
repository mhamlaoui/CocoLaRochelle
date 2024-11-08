create table Passenger (
username varchar(20) NOT NULL UNIQUE PRIMARY KEY, -- Will change in future
first_name varchar(30) NOT NULL,
last_name varchar(40) NOT NULL,
tel_number varchar(11) NOT NULL
);


insert into Passenger(username,first_name,last_name,tel_number) values ('cool_username','Ryan','Heuvel','616830');
