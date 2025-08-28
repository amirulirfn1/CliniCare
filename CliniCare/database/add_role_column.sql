ALTER TABLE user
    CHANGE COLUMN usertype role ENUM('admin','customer') NOT NULL DEFAULT 'customer';
