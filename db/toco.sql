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
INSERT INTO users (email, password, username, is_admin) VALUES ('ditraamadia@gmail.com', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'ditra', true);
INSERT INTO users (email, password, username, is_admin) VALUES ('bew@gmail.com', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'bew', false);
INSERT INTO users (email, password, username, is_admin) VALUES ('ditrarizqaamadia@gmail.com', '$2y$10$6WLbNG5Xq5fEFffZZLqfLOzJicMYintxlAejxObxsijNMR99GDtu2', 'ditramadia', false);

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
  difficulty VARCHAR(50) NOT NULL,
  module_order INTEGER NOT NULL,
  FOREIGN KEY (language_id) REFERENCES languages (language_id)
);

INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Numbers', 1, 'Vocabulary', 'Beginner', 1);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Colors', 1, 'Vocabulary', 'Beginner', 2);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Animals', 1, 'Vocabulary', 'Intermediate', 1);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Present Tense', 1, 'Grammar', 'Advanced', 1);

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

INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Numbers', 'https://www.youtube.com/embed/dk4LRnbYnss?si=7Aazf_HQ92Rf6UwJ', 1, 'Learn numbers in English', 1);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Colors', 'https://www.youtube.com/embed/2V9c7bQlq0A?si=7Aazf_HQ92Rf6UwJ', 1, 'Learn colors in English', 2);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Animals', 'https://www.youtube.com/embed/0A8J1a0YJtg?si=7Aazf_HQ92Rf6UwJ', 1, 'Learn animals in English', 3);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Present Tense', 'https://www.youtube.com/embed/6yS5q2sH1wA?si=7Aazf_HQ92Rf6UwJ', 1, 'Learn present tense in English', 4);

DROP TABLE IF EXISTS videos_result;
CREATE TABLE videos_result (
  video_result_id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL,
  video_id INTEGER NOT NULL,
  is_finished BOOLEAN NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (video_id) REFERENCES videos (video_id)
);

INSERT INTO videos_result (user_id, video_id, is_finished) VALUES (1, 1, true);
INSERT INTO videos_result (user_id, video_id, is_finished) VALUES (1, 2, true);
INSERT INTO videos_result (user_id, video_id, is_finished) VALUES (1, 3, false);
INSERT INTO videos_result (user_id, video_id, is_finished) VALUES (1, 4, true);