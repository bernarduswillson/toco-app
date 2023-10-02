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
INSERT INTO users (email, password, username, is_admin) VALUES ('13521019@std.stei.itb.ac.id', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'adminditra', true);
INSERT INTO users (email, password, username, is_admin) VALUES ('ditrarizqaamadia@gmail.com', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'ditramadia', false);
INSERT INTO users (email, password, username, is_admin) VALUES ('bew@gmail.com', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'bew', false);
INSERT INTO users (email, password, username, is_admin) VALUES ('13521021@std.stei.itb.ac.id', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'adminbewe', true);
INSERT INTO users (email, password, username, is_admin) VALUES ('13521022@std.stei.itb.ac.id', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'adminradit', true);

DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
  language_id SERIAL PRIMARY KEY,
  language_name VARCHAR(256) NOT NULL,
  language_flag VARCHAR(256) NOT NULL
);

INSERT INTO languages (language_name, language_flag) VALUES ('English', '');
INSERT INTO languages (language_name, language_flag) VALUES ('Indonesian', '');
INSERT INTO languages (language_name, language_flag) VALUES ('French', '');
INSERT INTO languages (language_name, language_flag) VALUES ('Germany', '');

DROP TABLE IF EXISTS progress;
CREATE TABLE progress (
  progress_id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL,
  language_id INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (language_id) REFERENCES languages (language_id)
);

INSERT INTO progress (user_id, language_id) VALUES (3, 1);

DROP TABLE IF EXISTS modules;
CREATE TABLE modules (
  module_id SERIAL PRIMARY KEY,
  module_name VARCHAR(256) NOT NULL,
  language_id INTEGER NOT NULL,
  category VARCHAR(50) NOT NULL,
  difficulty VARCHAR(50) NOT NULL,
  module_order INTEGER NOT NULL,
  FOREIGN KEY (language_id) REFERENCES languages (language_id)
);

INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Let''s count', 1, 'Vocabulary', 'Beginner', 1);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Greet people', 1, 'Phrases', 'Beginner', 2);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Refer to food', 1, 'Vocabulary', 'Beginner', 3);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Where you are form', 1, 'Grammar', 'Beginner', 4);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Talk about your hobbies', 1, 'Conversation', 'Beginner', 5);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Introduce yourself', 1, 'Conversation', 'Beginner', 6);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Describe possessions', 1, 'Phrases', 'Beginner', 7);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Form questions', 1, 'Grammar', 'Intermediate', 1);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Express a problem', 1, 'Grammar', 'Intermediate', 2);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Talk on the phone', 1, 'Conversation', 'Intermediate', 3);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Check into a hotel', 1, 'Conversation', 'Intermediate', 4);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Talk about daily life', 1, 'Conversation', 'Intermediate', 5);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Plan activities', 1, 'Conversation', 'Intermediate', 6);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Use prepositions', 1, 'Grammar', 'Advanced', 1);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Tenses', 1, 'Grammar', 'Advanced', 2);

DROP TABLE IF EXISTS modules_result;
CREATE TABLE modules_result (
  module_result_id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL,
  module_id INTEGER NOT NULL,
  is_finished BOOLEAN NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (module_id) REFERENCES modules (module_id)
);

INSERT INTO modules_result (user_id, module_id, is_finished) VALUES (3, 1, true);

DROP TABLE IF EXISTS videos;
CREATE TABLE videos (
  video_id SERIAL PRIMARY KEY,
  video_name VARCHAR(256) NOT NULL,
  video_url VARCHAR(256) NOT NULL,
  module_id INTEGER NOT NULL,
  video_desc TEXT NOT NULL,
  video_order INTEGER NOT NULL,
  FOREIGN KEY (module_id) REFERENCES modules (module_id)
);

INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Count from 1 to 20', 'https://www.youtube.com/embed/D0Ajq682yrA?si=snxdHX-WHAfRuLye', 1, 'Count from 1 to 10', 1);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Count  to 100', 'https://www.youtube.com/embed/D4eJ5kg28nU?si=k3QH0cCYyg9RClb-', 1, 'Count to 100', 2);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Big numbers', 'https://www.youtube.com/embed/ioldoJQYKyQ?si=0Eyexy_89R0AwY6K', 1, 'Big numbers', 3);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Learn pronouns', 'https://www.youtube.com/embed/h_GnSOIfWf4?si=73H6TWULcdq9pySO', 2, 'Learn pronouns', 1);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('100 most popular names', 'https://www.youtube.com/embed/pH3rDBCtZHo?si=zjCMS4zfooyC362W', 2, '100 most popular names', 2);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Greet someone!', 'https://www.youtube.com/embed/ZlO8Si2OkKk?si=ELyvLDNyxrqOAQVS', 2, 'Greet someone!', 3);

DROP TABLE IF EXISTS videos_result;
CREATE TABLE videos_result (
  video_result_id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL,
  video_id INTEGER NOT NULL,
  is_finished BOOLEAN NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (video_id) REFERENCES videos (video_id)
);

INSERT INTO videos_result (user_id, video_id, is_finished) VALUES (3, 1, true);
INSERT INTO videos_result (user_id, video_id, is_finished) VALUES (3, 2, true);
INSERT INTO videos_result (user_id, video_id, is_finished) VALUES (3, 3, true);
INSERT INTO videos_result (user_id, video_id, is_finished) VALUES (3, 4, true);
INSERT INTO videos_result (user_id, video_id, is_finished) VALUES (3, 5, true);
