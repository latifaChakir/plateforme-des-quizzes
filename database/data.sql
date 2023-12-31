CREATE database IF NOT EXISTS quizesxxxx;
use quizesxxxx;


CREATE TABLE Personne (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL unique ,
    password_user VARCHAR(255) NOT NULL
 
);


CREATE table autority_user (
    authority_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    role_name VARCHAR(50) not null,
    foreign key (user_id) references Personne(user_id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Cours (
    cours_id INT PRIMARY KEY AUTO_INCREMENT,
    cours_name VARCHAR(50) NOT NULL,
    cours_content text NOT NULL,
    progress_cours int
 
);

CREATE table studing_courses (
    user_id int,
    cours_id int,
    foreign key (user_id) references Personne(user_id) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (cours_id) references Cours(cours_id) ON UPDATE CASCADE ON DELETE CASCADE 
);


CREATE table Resultat (
    id_result INT PRIMARY KEY AUTO_INCREMENT,
    ratt_note int NULL,
    normal_note int NULL,
    cours_note int,
    user_id int,
    cours_id int,
    foreign key (user_id) references Personne(user_id) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (cours_id) references Cours(cours_id) ON UPDATE CASCADE ON DELETE CASCADE 
);


CREATE table Questions (
    qst_id INT PRIMARY KEY AUTO_INCREMENT,
    qst_content TEXT NOT NULL,
    cours_id int,
    foreign key (cours_id) references Cours(cours_id) ON UPDATE CASCADE ON DELETE CASCADE 
);



CREATE table progression (
    id_progress INT PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    cours_id int,
    progress int,
    foreign key (user_id) references Personne(user_id) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (cours_id) references Cours(cours_id) ON UPDATE CASCADE ON DELETE CASCADE 
);

CREATE table reponses (
    rep_id INT PRIMARY KEY AUTO_INCREMENT,
    qst_id int,
    rep1 text,
    rep2 text,
    rep3 text,
    rep4 text,
    true_rep text,
    foreign key (qst_id) references Questions(qst_id) ON UPDATE CASCADE ON DELETE CASCADE
   
);


CREATE TABLE Reponse_Student (
    repo_id INT PRIMARY KEY AUTO_INCREMENT,
    content VARCHAR(50) NOT NULL,
    ratt VARCHAR(50) NOT NULL,
    user_id INT,
    qstId INT,
    FOREIGN KEY (user_id) REFERENCES Personne(user_id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (qstId) REFERENCES Questions(qst_id) ON UPDATE CASCADE ON DELETE CASCADE
);
 
