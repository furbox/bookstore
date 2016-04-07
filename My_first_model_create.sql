-- Created by chris otaalo
-- Last modification date: 2016-02-17 15:23:43.807




-- tables
-- Table Authors
CREATE TABLE Authors (
    author_id int  NOT NULL,
    author_firstname varchar(50)  NOT NULL,
    author_lastname varchar(50)  NOT NULL,
    author_othernames varchar(50)  NOT NULL,
    author_birthdate date  NOT NULL,
    author_history text  NOT NULL,
    author_image text  NOT NULL,
    author_isactive int  NOT NULL  DEFAULT 1,
    CONSTRAINT Authors_pk PRIMARY KEY (author_id)
);

-- Table Book_Author
CREATE TABLE Book_Author (
    Book_Author_ID int  NOT NULL,
    BookId int  NOT NULL,
    AuthorId int  NOT NULL,
    Books_book_id int  NOT NULL,
    CONSTRAINT Book_Author_pk PRIMARY KEY (Book_Author_ID)
);

-- Table Book_Genre
CREATE TABLE Book_Genre (
    book_genreid int  NOT NULL,
    book_genre varchar(20)  NOT NULL,
    book_genreactive int  NOT NULL  DEFAULT 1,
    CONSTRAINT Book_Genre_pk PRIMARY KEY (book_genreid)
);

-- Table Book_Images
CREATE TABLE Book_Images (
    imageID int  NOT NULL,
    book_id int  NOT NULL,
    imagePath TEXT  NOT NULL,
    imageIsTitle int  NOT NULL  DEFAULT 0,
    imageActive int  NOT NULL  DEFAULT 1,
    CONSTRAINT Book_Images_pk PRIMARY KEY (imageID)
);

-- Table Books
CREATE TABLE Books (
    book_id int  NOT NULL,
    book_isbn varchar(15)  NOT NULL,
    book_title varchar(50)  NOT NULL,
    book_yop date  NOT NULL,
    book_dateadded timestamp  NOT NULL,
    book_active int  NOT NULL  DEFAULT 1,
    book_genreid int  NOT NULL,
    book_publisherid int  NOT NULL,
    CONSTRAINT Books_pk PRIMARY KEY (book_id)
);

CREATE INDEX Books_idx_1 ON Books (book_genreid,book_publisherid);


-- Table `Order`
CREATE TABLE `Order` (
    order_id int  NOT NULL,
    user_id int  NOT NULL,
    total_amount varchar(10)  NOT NULL,
    date_added timestamp  NOT NULL,
    CONSTRAINT Order_pk PRIMARY KEY (order_id)
);

-- Table Order_Details
CREATE TABLE Order_Details (
    order_detail_id int  NOT NULL,
    order_id int  NOT NULL,
    book_id int  NOT NULL,
    order_quantity int  NOT NULL,
    order_price varchar(10)  NOT NULL,
    order_dateadded timestamp  NOT NULL,
    order_status int  NOT NULL  DEFAULT 0,
    CONSTRAINT Order_Details_pk PRIMARY KEY (order_detail_id)
);

-- Table Publishers
CREATE TABLE Publishers (
    publisher_id int  NOT NULL,
    publisher_name varchar(20)  NOT NULL,
    publisher_country int  NOT NULL,
    publisher_city varchar(20)  NOT NULL,
    publisher_active int  NOT NULL  DEFAULT 1,
    CONSTRAINT Publishers_pk PRIMARY KEY (publisher_id)
);

-- Table User
CREATE TABLE User (
    user_id int  NOT NULL,
    user_firstname varchar(20)  NOT NULL,
    user_lastname varchar(20)  NOT NULL,
    user_emailaddress varchar(50)  NOT NULL,
    user_password varchar(255)  NOT NULL,
    user_type varchar(50)  NOT NULL  DEFAULT "customer",
    user_active int  NOT NULL  DEFAULT 1,
    CONSTRAINT User_pk PRIMARY KEY (user_id)
);

-- Table User_Billing
CREATE TABLE User_Billing (
    billing_id int  NOT NULL,
    billing_user_id int  NOT NULL,
    billing_address TEXT  NOT NULL,
    billing_country varchar(50)  NOT NULL,
    billing_phonenumber varchar(20)  NOT NULL,
    active int  NOT NULL  DEFAULT 1,
    CONSTRAINT User_Billing_pk PRIMARY KEY (billing_id)
);





-- foreign keys
-- Reference:  Book_Author_Authors (table: Book_Author)

ALTER TABLE Book_Author ADD CONSTRAINT Book_Author_Authors FOREIGN KEY Book_Author_Authors (AuthorId)
    REFERENCES Authors (author_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
-- Reference:  Book_Author_Books (table: Book_Author)

ALTER TABLE Book_Author ADD CONSTRAINT Book_Author_Books FOREIGN KEY Book_Author_Books (BookId)
    REFERENCES Books (book_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
-- Reference:  Book_Images_Books (table: Book_Images)

ALTER TABLE Book_Images ADD CONSTRAINT Book_Images_Books FOREIGN KEY Book_Images_Books (book_id)
    REFERENCES Books (book_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
-- Reference:  Books_Book_Genre (table: Books)

ALTER TABLE Books ADD CONSTRAINT Books_Book_Genre FOREIGN KEY Books_Book_Genre (book_genreid)
    REFERENCES Book_Genre (book_genreid)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
-- Reference:  Books_Publishers (table: Books)

ALTER TABLE Books ADD CONSTRAINT Books_Publishers FOREIGN KEY Books_Publishers (book_publisherid)
    REFERENCES Publishers (publisher_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
-- Reference:  Order_Details_Books (table: Order_Details)

ALTER TABLE Order_Details ADD CONSTRAINT Order_Details_Books FOREIGN KEY Order_Details_Books (book_id)
    REFERENCES Books (book_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
-- Reference:  Order_Details_Order (table: Order_Details)

ALTER TABLE Order_Details ADD CONSTRAINT Order_Details_Order FOREIGN KEY Order_Details_Order (order_id)
    REFERENCES `Order` (order_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
-- Reference:  Order_User (table: `Order`)

ALTER TABLE `Order` ADD CONSTRAINT Order_User FOREIGN KEY Order_User (user_id)
    REFERENCES User (user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
-- Reference:  User_Billing_User (table: User_Billing)

ALTER TABLE User_Billing ADD CONSTRAINT User_Billing_User FOREIGN KEY User_Billing_User (billing_user_id)
    REFERENCES User (user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;



-- End of file.

