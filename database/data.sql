CREATE database IF NOT EXISTS quizes;
use quizes;


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

CREATE table Reponses (
    rep_id INT PRIMARY KEY AUTO_INCREMENT,
    rep1 TEXT,
    rep2 TEXT,
    rep3 TEXT,
    rep4 TEXT,
    true_rep TEXT
    qst_id int,
    foreign key (qst_id) references Questions(qst_id) ON UPDATE CASCADE ON DELETE CASCADE 
);
CREATE TABLE reponse_student (
    repo_id INT PRIMARY KEY AUTO_INCREMENT,
    qstID int,
    content VARCHAR(255) NOT NULL,
    ratt VARCHAR(255) not NULL,
    foreign key (qstID) references Questions(qst_id) ON UPDATE CASCADE ON DELETE CASCADE 

)



CREATE table progression (
    id_progress INT PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    cours_id int,
    progress int,
    foreign key (user_id) references Personne(user_id) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (cours_id) references Cours(cours_id) ON UPDATE CASCADE ON DELETE CASCADE 
);