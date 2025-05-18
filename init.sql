CREATE TABLE IF NOT EXISTS users (
   user_id INTEGER NOT NULL AUTO_INCREMENT,
   name VARCHAR(128),
   email VARCHAR(128),
   password VARCHAR(128),
   PRIMARY KEY(user_id),
   INDEX(email),
   INDEX(password)
);

INSERT INTO users (name,email,password)
    VALUES ('Chuck','csev@umich.edu','1a52e17fa899cf40fb04cfc42e6352f1');

INSERT INTO users (name,email,password)
    VALUES ('UMSI','umsi@umich.edu','1a52e17fa899cf40fb04cfc42e6352f1');
