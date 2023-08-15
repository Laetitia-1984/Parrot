CREATE TABLE `cars`
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    mark VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    year INT(4) NOT NULL,
    km INT(6) NOT NULL,
    price INT(5) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    id_users INT REFERENCES users(id)
);

CREATE TABLE `users` 
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL
);

CREATE TABLE `comment`
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nameClient VARCHAR(255) NOT NULL,
    note INT(1),
    content TEXT NOT NULL,
    id_users INT REFERENCES users(id)
);

CREATE TABLE `services` 
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    category VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price INT NOT NULL,
    id_users INT REFERENCES users(id)
);

INSERT INTO users VALUES 
(
    '1', 'parrot', 'vincent', 'v.parrot@gmail.com', 'V.Parrot-1956', 'ADMIN'
)


