DROP TABLE IF EXISTS users;
CREATE TABLE users (
  user_id SERIAL PRIMARY KEY,
  email VARCHAR(256) NOT NULL,
  password VARCHAR(256) NOT NULL,
  username VARCHAR(256) NOT NULL,
  is_admin BOOLEAN NOT NULL
);

INSERT INTO users (email, password, username, is_admin) VALUES ('admin@gmail.com', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'admin', true);