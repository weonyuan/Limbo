-- Limbo
-- This script limbo.sql will do the following:
--  1. Create database limbo_db
--  2. Create users, stuff, and locations tables.
--  3. Inserts values into users and locations tables.
--  4. Values are 'admin' (users) and all Marist buildings (locations).
-- Version 1.0 (Initial database)
-- Authors: Weon Yuan, Jaime Engl

# Creates limbo_db database and uses limbo_db.
create database if not exists limbo_db;
use limbo_db;

# Creates users table.
drop table if exists users;
create table if not exists users (
  id   int  not null auto_increment primary key,
  username  char(60) not null,
  password  char(40) not null,
  reg_date  datetime not null
);

# Creates stuff table.
drop table if exists stuff;
create table if not exists stuff (
  id             int  not null auto_increment primary key,
  location_id    int  not null,
  description    text not null,
  create_date    datetime not null,
  update_date    datetime not null,
  room           text,
  owner          text,
  finder         text,
  item_status    set ("found", "lost", "claimed") not null,
  ticket_status  set ("open", "closed", "on hold") not null
  
);

# Creates locations table.
drop table if exists locations;
create table if not exists locations (
  id          int auto_increment primary key,
  create_date datetime not null,
  update_date datetime not null,
  name        text not null
);


# Inserts admin into users table with username, 
# password, and registered date.
insert into users(username, password, reg_date)
  values('admin', 'gaze11e', Now());

# Inserts all buildings on Marist campus into locations table
# with create date, update date, and building name.
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Byrne House");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "James A. Cannavino Library");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Champagnat Hall");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Our Lady Seat of Wisdom Chapel");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Cornell Boathouse");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Donnelly Hall");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Dyson Center");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Fern Tor");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Fontaine Hall");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Gartland Apartments");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Greystone Hall");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Kieran Gatehouse");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Kirk House");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Leo Hall");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Longview Park");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Lowell Thomas Communications Center");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Lower Townhouses");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Marist Boathouse");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "McCann Recreational Center");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Midrise Hall");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "St. Ann's Hermitage");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "St. Peter's");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Sheahan Hall");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Steel Plant Studios and Gallery");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Student Center");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Foy Townhouses");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Lower West Cedar Townhouses");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Upper West Cedar Townhouses");
  
insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Fulton Street Townhouses");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Lower Fulton Townhouses");

insert into locations(create_date, update_date, name)
  values(Now(), Now(), "Hancock Center");

insert into stuff(location_id, description, create_date, update_date, room, owner, finder, item_status, ticket_status)
  values(18, 'Red Marist Crew backpack', '2012-12-04 12:43:32', '2012-12-10 15:24:16', 'Downstairs', 'Jack Daniels', 'John Doe', 'lost', 'open');

insert into stuff(location_id, description, create_date, update_date, room, owner, finder, item_status, ticket_status)
  values(31, '4th Generation Silver iPad', '2013-09-12 09:23:12', '2013-11-03 14:54:34', '2020', '', 'Joe Smith', 'lost', 'open');

insert into stuff(location_id, description, create_date, update_date, room, owner, finder, item_status, ticket_status)
  values(9, 'Red Marist planner', '2013-10-24 11:23:18', '2013-10-31 18:21:48', '105', 'Sally White', '', 'lost', 'open');
  
insert into stuff(location_id, description, create_date, update_date, room, owner, finder, item_status, ticket_status)
  values(14, 'Mail and Room Key on a red Marist lanyard', '2013-04-16 017:20:41', '2013-04-20 20:14:44', '2nd Floor Hallway', '', 'Kaitlyn Jobe', 'found', 'open');

insert into stuff(location_id, description, create_date, update_date, room, owner, finder, item_status, ticket_status)
  values(16, 'Brown leather wallet', '2013-10-08 08:39:11', '2013-10-10 16:34:19', '020', '', 'Weon Yuan', 'found', 'open');

insert into stuff(location_id, description, create_date, update_date, room, owner, finder, item_status, ticket_status)
  values(23, 'Macbook Pro with green sleeve', '2013-01-27 09:54:12', '2013-01-30 12:16:59', 'Lounge', '', 'Miles Welsh', 'found', 'open');