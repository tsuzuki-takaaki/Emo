DROP DATABASE IF EXISTS mdesu;
CREATE DATABASE mdesu;
USE mdesu;

CREATE TABLE admin_users (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pass VARCHAR(100),
    name VARCHAR(100)
);

CREATE TABLE expert_users(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pass VARCHAR(100) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    family_name VARCHAR(100) NOT NULL,
    major VARCHAR(100) NOT NULL,
    description VARCHAR(200) NOT NULL
);

CREATE TABLE tags(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(100)
);

CREATE TABLE articles(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    author_id INT NOT NULL,
    image_path VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`author_id`) REFERENCES `expert_users` (`id`)
);

CREATE TABLE questions(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    tag_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
);

CREATE TABLE answers(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    author_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`author_id`) REFERENCES `expert_users` (`id`)
);

CREATE TABLE question_answer(
    question_id INT NOT NULL,
    answer_id INT NOT NULL,
    FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
    FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`)
);
CREATE INDEX question_answer_index ON question_answer (question_id, answer_id);

CREATE TABLE article_tag(
    article_id INT NOT NULL,
    tag_id INT NOT NULL,
    FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
    FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
);
CREATE INDEX article_tab_index ON article_tag (article_id, tag_id);

CREATE TABLE affiliate_products(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    price INT NOT NULL,
    brand_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image_path VARCHAR(200) NOT NULL
);

CREATE TABLE article_affiliate_product(
    article_id INT NOT NULL,
    affiliate_product_id INT NOT NULL,
    FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
    FOREIGN KEY (`affiliate_product_id`) REFERENCES `affiliate_products` (`id`)
);
CREATE INDEX article_affiliate_product_index ON article_affiliate_product (article_id, affiliate_product_id);
