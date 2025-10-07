DROP DATABASE if exists company;
CREATE DATABASE company;
use company;

create table employees
(
    id    int auto_increment PRIMARY KEY,
    fname varchar(255),
    lname varchar(255)
);


INSERT INTO employees(fname, lname)
values ('Peter', 'Pan'),
       ('Donald', 'Trump'),
       ('George', 'Busch');


