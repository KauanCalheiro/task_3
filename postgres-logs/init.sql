CREATE TABLE IF NOT EXISTS "request_logs" (
    "id" SERIAL PRIMARY KEY,
    "request_path" TEXT NOT NULL,
    "request_method" TEXT NOT NULL,
    "request_body" JSONB,
    "request_headers" JSONB,
    "request_params" JSONB,

    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_at" TIMESTAMP,
    "deleted_at" TIMESTAMP
)
