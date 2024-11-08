CREATE TABLE IF NOT EXISTS "users" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "email" TEXT NOT NULL,
    "password" TEXT,
    "dt_birth" DATE,
    "cpf" CHAR(11),
    "rg" CHAR(9),

    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "auths" (
    "id" SERIAL PRIMARY KEY,
    "ref_user" INTEGER NOT NULL,

    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "events" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "description" TEXT,
    "dt_init" TIMESTAMP NOT NULL,
    "dt_end" TIMESTAMP NOT NULL,
    "location" TEXT,
    "capacity" INTEGER NOT NULL,

    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "inscriptions" (
    "id" SERIAL PRIMARY KEY,
    "ref_user" INTEGER NOT NULL,
    "ref_event" INTEGER NOT NULL,
    "dt_inscription" TIMESTAMP NOT NULL DEFAULT NOW(),

    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "attendance" (
    "id" SERIAL PRIMARY KEY,
    "ref_inscription" INTEGER NOT NULL,
    "dt_presence" TIMESTAMP NOT NULL DEFAULT NOW(),

    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "certificates" (
    "id" SERIAL PRIMARY KEY,
    "ref_inscription" INTEGER NOT NULL,
    "server_path" TEXT NOT NULL,
    "validation_code" TEXT NOT NULL,

    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "emails" (
    "id" SERIAL PRIMARY KEY,
    "ref_user" INTEGER NOT NULL,
    "title" TEXT NOT NULL,
    "content" TEXT NOT NULL,
    "dt_send" TIMESTAMP NOT NULL DEFAULT NOW(),
);

INSERT INTO "users" (
    "id",
    "name",
    "email",
    "password",
    "dt_birth"
) VALUES (1,
    'Admin',
    'admin@admin.com',
    md5('admin'),
    '2000-01-01'
)
ON CONFLICT DO NOTHING;
