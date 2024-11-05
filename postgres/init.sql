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
