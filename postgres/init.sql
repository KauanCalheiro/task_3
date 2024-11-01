CREATE TABLE IF NOT EXISTS "users" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "email" TEXT NOT NULL,
    "password" TEXT,
    "dt_birth" DATE,
    "cpf" CHAR(11),
    "rg" CHAR(9),

    /* Audit fields */
    "created_by" INTEGER NOT NULL,
    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_by" INTEGER,
    "updated_at" TIMESTAMP,
    "deleted_by" INTEGER,
    "deleted_at" TIMESTAMP,
    "version" INTEGER NOT NULL DEFAULT 1,
    "is_active" BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE IF NOT EXISTS "auths" (
    "id" SERIAL PRIMARY KEY,
    "ref_user" INTEGER NOT NULL,
    "token" TEXT NOT NULL,
    "dt_expires" TIMESTAMP NOT NULL,

    /* Audit fields */
    "created_by" INTEGER NOT NULL,
    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_by" INTEGER,
    "updated_at" TIMESTAMP,
    "deleted_by" INTEGER,
    "deleted_at" TIMESTAMP,
    "version" INTEGER NOT NULL DEFAULT 1,
    "is_active" BOOLEAN NOT NULL DEFAULT TRUE
);


INSERT INTO "users" ("id", "name", "email", "password", "dt_birth", "created_by") 
VALUES (1, 'Admin', 'admin@admin.com', md5('admin'), '2000-01-01', 1)
ON CONFLICT DO NOTHING;
