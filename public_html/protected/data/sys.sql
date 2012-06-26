PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;

CREATE TABLE "user" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "username" TEXT NOT NULL,
    "email" TEXT NOT NULL,
    "password" TEXT NOT NULL,
    "salt" TEXT NOT NULL,
    "fullname" TEXT NOT NULL,
    "bio" TEXT,
    "location" TEXT,
    "url" TEXT
);

CREATE TABLE "follow" (
    "id_follower" INTEGER NOT NULL,
    "id_followed" INTEGER NOT NULL,
    PRIMARY KEY (id_follower, id_followed),
    FOREIGN KEY(id_follower) REFERENCES user(id),
    FOREIGN KEY(id_followed) REFERENCES user(id)
);

CREATE TABLE "post" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "id_user" INTEGER NOT NULL,
    "text" TEXT NOT NULL,
    "date" TEXT NOT NULL,
    FOREIGN KEY(id_user) REFERENCES user(id)
);

-- Senha admin
-- User  admin
INSERT INTO "user" VALUES(1,'admin','admin@admin.com','2b652946c029ac0adbf854f97eca8cf4','4fb9612a9d5e95.92878127','Administrador','Administrador do Sistemas TwitterFake','Exemplo - EX','http://exemplo.com');


COMMIT;
