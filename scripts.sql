create database shareposts;

use shareposts;

create table users
(
    id         int primary key not null auto_increment,
    name       varchar(255),
    email      varchar(255),
    password   varchar(255),
    created_at datetime default current_timestamp
);

create table posts
(
    id         int primary key not null auto_increment,
    user_id    int             not null,
    title      varchar(255)    not null,
    body       text            not null,
    created_at datetime default current_timestamp,
    foreign key (user_id) references users (id)
);

select * from posts;