create DATABASE mvc;

use MVC;

create table users(
    id int PRIMARY KEY ,
    name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(225),
    role_id int,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE Table Roles(
    id int PRIMARY key,
    title enum('admin' , 'recruiter' , 'candidate')
)

INSERT INTO roles (id, title) VALUES
(1, 'admin'),
(2, 'recruiter'),
(3, 'candidate');

INSERT INTO users (id, name, email, password, role_id) VALUES
(1, 'Admin User', 'admin@example.com', '$2y$10$adminhashedpassword', 1),
(2, 'recruiter User', 'recruiter@example.com', '$2y$10$recruiterhashedpassword', 2),
(3, 'Candidate User', 'candidate@example.com', '$2y$10$candidatehashedpassword', 3);
