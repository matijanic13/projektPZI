CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    password VARCHAR (128) NOT NULL,
    roles_id INT NOT NULL,
    CONSTRAINT roles_fk FOREIGN KEY(roles_id) REFERENCES roles(id)
);

CREATE TABLE permissions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL
);

CREATE TABLE roles_permissions (
    roles_id INT NOT NULL,
    permissions_id INT NOT NULL,
    PRIMARY KEY (roles_id, permissions_id),
    CONSTRAINT rp_fk FOREIGN KEY(roles_id) REFERENCES roles(id),
    CONSTRAINT pr_fk FOREIGN KEY(permissions_id) REFERENCES permissions(id)
);

INSERT INTO
    roles (title)
VALUES
    ('Admin'),
    ('Moderator');

INSERT INTO
    permissions (title)
VALUES
    ('CRUD users'),
    ('CRUD items');

INSERT INTO
    roles_permissions (roles_id, permissions_id)
VALUES
    (1,1),
    (1,2),
    (2,2);