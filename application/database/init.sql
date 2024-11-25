CREATE TABLE IF NOT EXISTS "users" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "name" TEXT NOT NULL,
    "email" TEXT NOT NULL,
    "password" TEXT,
    "dt_birth" DATE,
    "cpf" CHAR(11),
    "rg" CHAR(9),
    "created_at" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "auths" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "ref_user" INTEGER NOT NULL,
    "created_at" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "events" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "name" TEXT NOT NULL,
    "description" TEXT,
    "dt_init" TIMESTAMP NOT NULL,
    "dt_end" TIMESTAMP NOT NULL,
    "location" TEXT,
    "capacity" INTEGER NOT NULL,
    "created_at" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "inscriptions" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "ref_user" INTEGER NOT NULL,
    "ref_event" INTEGER NOT NULL,
    "dt_inscription" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "created_at" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "attendances" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "ref_inscription" INTEGER NOT NULL,
    "dt_presence" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "created_at" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "certificates" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "ref_inscription" INTEGER NOT NULL,
    "server_path" TEXT NOT NULL,
    "validation_code" TEXT NOT NULL,
    "created_at" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "emails" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT,
    "ref_user" INTEGER NOT NULL,
    "title" TEXT NOT NULL,
    "content" TEXT NOT NULL,
    "dt_send" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "created_at" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

-- Inserção de dados (sem conflito)
INSERT INTO "users" ("id", "name", "email", "password", "dt_birth") 
VALUES (1, 'Admin', 'admin@admin.com', 'admin', '2000-01-01')
ON CONFLICT DO NOTHING;

INSERT INTO "events" ("id", "name", "description", "dt_init", "dt_end", "location", "capacity") 
VALUES (1, 'Evento Teste', 'Evento de teste', '2021-01-01 00:00:00', '2021-01-01 23:59:59', 'Local de teste', 100)
ON CONFLICT DO NOTHING;

INSERT INTO "inscriptions" ("id", "ref_user", "ref_event") 
VALUES (1, 1, 1)
ON CONFLICT DO NOTHING;

INSERT INTO "attendances" ("id", "ref_inscription") 
VALUES (1, 1);
