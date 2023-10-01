DROP TABLE IF EXISTS users;
CREATE TABLE users (
  user_id SERIAL PRIMARY KEY,
  email VARCHAR(256) NOT NULL,
  password VARCHAR(256) NOT NULL,
  username VARCHAR(256) NOT NULL,
  profile_pic VARCHAR(256) DEFAULT NULL,
  is_admin BOOLEAN NOT NULL
);

INSERT INTO users (email, password, username, is_admin) VALUES ('admin@gmail.com', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'admin', true);
INSERT INTO users (email, password, username, is_admin) VALUES ('bew@gmail.com', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'bew', false);

DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
  language_id SERIAL PRIMARY KEY,
  language_name VARCHAR(256) NOT NULL,
  language_flag VARCHAR(256) NOT NULL
);

DROP TABLE IF EXISTS progress;
CREATE TABLE progress (
  progress_id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL,
  language_id INTEGER NOT NULL,
  total_module INTEGER NOT NULL DEFAULT 0,
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (language_id) REFERENCES languages (language_id)
);

INSERT INTO languages (language_name, language_flag) VALUES ('English', '');
INSERT INTO languages (language_name, language_flag) VALUES ('Indonesian', '');
INSERT INTO languages (language_name, language_flag) VALUES ('French', '');
INSERT INTO languages (language_name, language_flag) VALUES ('Germany', '');

DROP TABLE IF EXISTS modules;
CREATE TABLE modules (
  module_id SERIAL PRIMARY KEY,
  module_name VARCHAR(256) NOT NULL,
  language_id INTEGER NOT NULL,
  category VARCHAR(50) NOT NULL,
  difficulty VARCHAR(10) NOT NULL,
  module_order INTEGER NOT NULL,
  FOREIGN KEY (language_id) REFERENCES languages (language_id)
);

INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Numbers', 1, 'Vocabulary', 'Easy', 1);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Colors', 1, 'Vocabulary', 'Easy', 2);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Animals', 1, 'Vocabulary', 'Medium', 1);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Present Tense', 1, 'Grammar', 'Easy', 2);