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


create table department
(
    id    int auto_increment PRIMARY KEY,
    name varchar(255)
);

ALTER table department ADD is_hiring bool default 0;
ALTER TABLE department ADD workmode enum('onsite', 'hybrid','remote');


INSERT INTO department(name, is_hiring, workmode)
values ('Peter', '0', 'remote'),
       ('Donald', '1', 'onsite'),
       ('George', '1', 'hybrid');
