drop table if exists post;
create table post (    
    id integer not null primary key autoincrement,    
    Icon text default '' not null,
    Title varchar(50) not null,    
    Name varchar(30) not null,
    Body text default '' not null,
    Date Date

); 
insert into post values (null, "images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png", "Hey Guys!",  "Billy Ray Cyrus", "This is my first post yeeeeeeet haaaaaaaaaawwwwwwww", CURRENT_DATE);
insert into post values (null, "images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png", "Howdy Partner!",  "Billy Ray Cyrus", "Yikes!!!!!!!!!!!!!!!!!!!!!!!!!!!!!", CURRENT_DATE);
insert into post values (null, "images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png", "THIS IS OUTRAGEOUS!!!!", "Donald Trump", "I am a genius", CURRENT_DATE);
insert into post values (null, "images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png", "BUILD A WALL!", "Hillary Clinton", "Poop de scoop de poop de woop", CURRENT_DATE);


drop table if exists comment;
create table comment (    
    id integer not null primary key autoincrement,
    Icon text default '' not null,        
    Name varchar(30) not null,
    Body text default '' not null,
    Date Date,
    Post_ID integer not null,
    FOREIGN KEY (Post_ID) REFERENCES post(id) ON DELETE CASCADE

); 
insert into comment values (null, "images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png", "Billy Ray Cyrus", "This is my first post yeeeeeeet haaaaaaaaaawwwwwwww", CURRENT_DATE, 1);
insert into comment values (null, "images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png", "Billy Ray Cyrus", "YIPEEEEE", CURRENT_DATE, 1);
insert into comment values (null, "images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png", "Donald Trump", "I am a genius", CURRENT_DATE, 2);
insert into comment values (null, "images/anonymous+app+contacts+open+line+profile+user+icon-1320183042822068474_512.png", "Hillary Clinton", "Poop de scoop de poop de woop", CURRENT_DATE, 3);

