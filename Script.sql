use assingment_semester_ll;

SET FOREIGN_KEY_CHECKS = 0;
drop table if exists tbBlogCategories;
drop table if exists tbBlogs;
drop table if exists tbReporterUsers;
SET FOREIGN_KEY_CHECKS = 1;

create table tbBlogCategories(
	id int auto_increment primary key,
    categoryCode varchar(255),
    categoryName varchar(255),
    isDeleted bool,
    isView bool
);
create table tbBlogs (
	id int auto_increment primary key,
    blogCode varchar(255),
    title varchar(255),
    content text,
    topView bool,
    bogCategoryId int,
    reportUserId int,
    isApproved bool,
    isDeleted bool,
    isView bool,
    foreign key (bogCategoryId) references tbBlogCategories(id)
);
Create table tbReporterUsers (
	id int auto_increment primary key,
    fullname varchar(255),
    username varchar(255),
    password varchar(255),
    email varchar(255),
    dob datetime,
    profilePhoto varchar(255),
    isDeleted bool,
    isAdmin bool
)
    


