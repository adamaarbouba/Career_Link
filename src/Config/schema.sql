create DATABASE Career;

use Career;

CREATE Table Roles(
    id int PRIMARY key,
    title enum('admin' , 'recruiter' , 'candidate')
);
create table users(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role_id int,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);
create table recruteurs(
    id int PRIMARY key,
    Company_name VARCHAR(50),
    description TEXT,
    Company_image VARCHAR(100),
    Foreign Key (id) REFERENCES users(id) ON DELETE CASCADE
);
create table admins(
    id int PRIMARY KEY,
    Foreign Key (id) REFERENCES users(id) ON DELETE CASCADE
);
CREATE Table candidates(
    id int PRIMARY KEY,
    Foreign Key (id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE table tags(
    id INT PRIMARY key AUTO_INCREMENT,
    title VARCHAR(50)
);
CREATE table candidates_tags(
    tag_id int,
    candidate_id int,
    Foreign Key (tag_id) REFERENCES tags(id),
    Foreign Key (candidate_id) REFERENCES candidates(id) ON DELETE CASCADE,
    PRIMARY KEY (tag_id , candidate_id)
);
CREATE Table Categories(
    id int PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50)
);
CREATE TABLE offers (
    id int PRIMARY key AUTO_INCREMENT,
    title VARCHAR(50),
    description TEXT,
    salary DECIMAL(8,2),
    Category_id int,
    Foreign Key (Category_id) REFERENCES Categories(id) on DELETE CASCADE
);
ALTER Table offers
add column recruteur_id int;

ALTER TABLE offers
add FOREIGN key (recruteur_id) REFERENCES recruteurs(id);

create Table candidates_offers(
    cv VARCHAR(100),
    statut VARCHAR(50),
    motif VARCHAR(100),
    offer_id int,
    candidate_id int,
    Foreign Key (offer_id) REFERENCES offers(id),
    Foreign Key (candidate_id) REFERENCES candidates(id),
    PRIMARY KEY(offer_id , candidate_id)
);



INSERT INTO roles (id, title) VALUES
(1, 'admin'),
(2, 'recruiter'),
(3, 'candidate');
select * from users;
INSERT INTO users (id, name, email, password, role_id) VALUES
(1, 'Admin User', 'admin@example.com', '$2y$10$adminhashedpassword', 1),
(2, 'recruiter User', 'recruiter@example.com', '$2y$10$recruiterhashedpassword', 2),
(3, 'Candidate User', 'candidate@example.com', '$2y$10$candidatehashedpassword', 3);

INSERT INTO recruteurs (id, Company_name, description, Company_image) VALUES
(1, 'TechCorp', 'Software development company', 'techcorp.png'),
(2, 'DesignHub', 'Creative design agency', 'designhub.png'),
(3, 'MarketingPro', 'Digital marketing solutions', 'marketingpro.png');


-- Insert categories
INSERT INTO Categories (title) VALUES
('Web Development'),
('Mobile Development'),
('Data Science');

INSERT INTO offers (title, description, salary, Category_id) VALUES
('Junior PHP Developer', 
 'Work on backend features using PHP and MySQL.', 
 4500.00, 
 1),

('Android Developer', 
 'Develop and maintain Android applications.', 
 6000.00, 
 2),

('Data Analyst', 
 'Analyze data and create reports for business decisions.', 
 7000.00, 
 3);
