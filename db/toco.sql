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
  language_flag VARCHAR(256)
);

INSERT INTO languages (language_name, language_flag) VALUES ('English', '/public/icons/uk-flag.svg');
INSERT INTO languages (language_name, language_flag) VALUES ('Indonesian', '/public/icons/id-flag.svg');
INSERT INTO languages (language_name, language_flag) VALUES ('French', '/public/icons/fr-flag.svg');
INSERT INTO languages (language_name, language_flag) VALUES ('Deutsch', '/public/icons/gr-flag.svg');

DROP TABLE IF EXISTS progress;
CREATE TABLE progress (
  progress_id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL,
  language_id INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  FOREIGN KEY (language_id) REFERENCES languages (language_id) ON DELETE CASCADE
);

INSERT INTO progress (user_id, language_id) VALUES (3, 1);
INSERT INTO progress (user_id, language_id) VALUES (3, 2);

DROP TABLE IF EXISTS modules;
CREATE TABLE modules (
  module_id SERIAL PRIMARY KEY,
  module_name VARCHAR(256) NOT NULL,
  language_id INTEGER NOT NULL,
  category VARCHAR(50) NOT NULL,
  difficulty VARCHAR(50) NOT NULL,
  module_order INTEGER NOT NULL,
  FOREIGN KEY (language_id) REFERENCES languages (language_id) ON DELETE CASCADE
);

INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Let''s count', 1, 'Vocabulary', 'Beginner', 1);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Greet people', 1, 'Phrases', 'Beginner', 2);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Refer to food', 1, 'Vocabulary', 'Beginner', 3);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Where you are form', 1, 'Grammar', 'Beginner', 4);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Talk about your hobbies', 1, 'Conversation', 'Beginner', 5);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Introduce yourself', 1, 'Conversation', 'Beginner', 6);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Describe possessions', 1, 'Phrases', 'Beginner', 7);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Form questions', 1, 'Grammar', 'Intermediate', 8);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Express a problem', 1, 'Grammar', 'Intermediate', 9);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Talk on the phone', 1, 'Conversation', 'Intermediate', 10);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Check into a hotel', 1, 'Conversation', 'Intermediate', 11);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Talk about daily life', 1, 'Conversation', 'Intermediate', 12);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Plan activities', 1, 'Conversation', 'Intermediate', 13);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Use prepositions', 1, 'Grammar', 'Advanced', 14);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Tenses', 1, 'Grammar', 'Advanced', 15);

INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Use Basic Phrases', 2, 'Phrases', 'Beginner', 1);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Introduce Yourself', 2, 'Conversation', 'Beginner', 2);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Use Common Phrases', 2, 'Phrases', 'Beginner', 3);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Greet People', 2, 'Phrases', 'Beginner', 4);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Order foods and drinks', 2, 'Phrases', 'Beginner', 5);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Describe Places', 2, 'Phrases', 'Beginner', 6);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Express Ownership', 2, 'Phrases', 'Intermediate', 7);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Conjunctions', 2, 'Verbs', 'Intermediate', 8);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Form Plurals', 2, 'Verbs', 'Intermediate', 9);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Use ber- verbs', 2, 'Verbs', 'Intermediate', 10);
INSERT INTO modules (module_name, language_id, category, difficulty, module_order) VALUES ('Use me- verbs', 2, 'Verbs', 'Intermediate', 11);

DROP TABLE IF EXISTS modules_result;
CREATE TABLE modules_result (
  module_result_id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL,
  module_id INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  FOREIGN KEY (module_id) REFERENCES modules (module_id) ON DELETE CASCADE
);

INSERT INTO modules_result (user_id, module_id) VALUES (3, 1);

DROP TABLE IF EXISTS videos;
CREATE TABLE videos (
  video_id SERIAL PRIMARY KEY,
  video_name VARCHAR(256) NOT NULL,
  video_url VARCHAR(256) NOT NULL,
  module_id INTEGER NOT NULL,
  video_desc TEXT NOT NULL,
  video_order INTEGER NOT NULL,
  FOREIGN KEY (module_id) REFERENCES modules (module_id) ON DELETE CASCADE
);

INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Count from 1 to 20', '/public/imgdata/video/NumberSong1-20.mp4', 1, 'Count from 1 to 20 blablablaballbalblablalbaba', 1);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Count  to 100', '/public/imgdata/video/LearnEnglishNumbers1-100.mp4', 1, 'Count to 100 blablablaballbalblablalbaba', 2);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Big numbers', '/public/imgdata/video/ReadingBigNumbersInEnglish.mp4', 1, 'Big numbers blablablaballbalblablalbaba', 3);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Learn pronouns', '/public/imgdata/video/LearnPronounsInEnglish.mp4', 2, 'Learn pronouns blablablaballbalblablalbaba', 1);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('100 most popular names', '/public/imgdata/video/100MostPopularEnglishGirlsNames.mp4', 2, '100 most popular names blablablaballbalblablalbaba', 2);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Greet someone!', '/public/imgdata/video/LearnPronounsInEnglish.mp4', 2, 'Greet someone! blablablaballbalblablalbaba', 3);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('10 Basic Phrases in Indonesian', '/public/imgdata/video/10 basic phrases for your first conversation.mp4', 16, 'Greet someone! blablablaballbalblablalbaba', 1);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Top 25 Indonesian Phrases', '/public/imgdata/video/Top 25 Indonesian Phrases.mp4', 16, 'Greet someone! blablablaballbalblablalbaba', 2);
INSERT INTO videos (video_name, video_url, module_id, video_desc, video_order) VALUES ('Self Introduction in Indonesian', '/public/imgdata/video/How to introduce yourself in Indonesian.mp4', 17, 'Greet someone! blablablaballbalblablalbaba', 1);

DROP TABLE IF EXISTS videos_result;
CREATE TABLE videos_result (
  video_result_id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL,
  video_id INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
  FOREIGN KEY (video_id) REFERENCES videos (video_id) ON DELETE CASCADE
);

INSERT INTO videos_result (user_id, video_id) VALUES (3, 1);
INSERT INTO videos_result (user_id, video_id) VALUES (3, 2);
INSERT INTO videos_result (user_id, video_id) VALUES (3, 3);
INSERT INTO videos_result (user_id, video_id) VALUES (3, 4);

-- TRIGGERS
CREATE OR REPLACE FUNCTION adjust_module_order_after_insert()
RETURNS TRIGGER AS $$
BEGIN
    UPDATE modules 
    SET module_order = module_order + 1 
    WHERE language_id = NEW.language_id AND module_order >= NEW.module_order;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_insert_trigger
BEFORE INSERT ON modules
FOR EACH ROW EXECUTE FUNCTION adjust_module_order_after_insert();


CREATE OR REPLACE FUNCTION adjust_module_order_after_delete()
RETURNS TRIGGER AS $$
BEGIN
    UPDATE modules 
    SET module_order = module_order - 1 
    WHERE language_id = OLD.language_id AND module_order > OLD.module_order;
    RETURN OLD;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_delete_trigger
AFTER DELETE ON modules
FOR EACH ROW EXECUTE FUNCTION adjust_module_order_after_delete();


CREATE OR REPLACE FUNCTION adjust_video_order_after_insert()
RETURNS TRIGGER AS $$
BEGIN
    UPDATE videos 
    SET video_order = video_order + 1 
    WHERE module_id = NEW.module_id AND video_order >= NEW.video_order;
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_insert_trigger
BEFORE INSERT ON videos
FOR EACH ROW EXECUTE FUNCTION adjust_video_order_after_insert();


CREATE OR REPLACE FUNCTION adjust_video_order_after_delete()
RETURNS TRIGGER AS $$
BEGIN
    UPDATE videos 
    SET video_order = video_order - 1 
    WHERE module_id = OLD.module_id AND video_order > OLD.video_order;
    RETURN OLD;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_delete_trigger
AFTER DELETE ON videos
FOR EACH ROW EXECUTE FUNCTION adjust_video_order_after_delete();