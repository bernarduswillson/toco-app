DROP TABLE IF EXISTS users;
CREATE TABLE users (
  user_id SERIAL PRIMARY KEY,
  email VARCHAR(256) NOT NULL,
  password VARCHAR(256) NOT NULL,
  username VARCHAR(256) NOT NULL,
  isAdmin BOOLEAN NOT NULL
);
