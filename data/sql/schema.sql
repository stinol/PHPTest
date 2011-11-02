CREATE TABLE answers (id INTEGER PRIMARY KEY AUTOINCREMENT, session_id VARCHAR(255) NOT NULL, question_id INTEGER NOT NULL, answer LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL);
CREATE TABLE questions (id INTEGER PRIMARY KEY AUTOINCREMENT, question_category_id INTEGER NOT NULL, validation_type VARCHAR(255) DEFAULT 'text' NOT NULL, description VARCHAR(255));
CREATE TABLE question_categories (id INTEGER PRIMARY KEY AUTOINCREMENT, question_category_id INTEGER, name VARCHAR(50));
CREATE UNIQUE INDEX idx_session_question_idx ON answers (session_id, question_id);
CREATE INDEX idx_session_idx ON answers (session_id);
