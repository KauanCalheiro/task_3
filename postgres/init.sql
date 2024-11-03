/*
    ###############################
    ### VERSIONAMENTO DOS DADOS ###
    ###############################

    ####################################################################################
    ###                                 OBSERVAÇÕES                                  ###
    ####################################################################################
    ### - As colunas que não precisam ser alteradas, não foram incluídas no exemplo. ###
    ####################################################################################

    # CREATE
        - version => 1
        - ref_origin_register => $current_id
        - created_by => $user_id
        - created_at => NOW()


    # UPDATE
        ## LAST REGISTER
            - updated_by => $editer_user_id
            - updated_at => NOW()
            - deleted_by => $editer_user_id
            - deleted_at => NOW()

        ## NEW REGISTER
            - version => $version + 1
            - ref_last_register => $last_register_id
            - ref_origin_register => $origin_register_id
            - created_by => $user_id
            - created_at => NOW()

    # DELETE
        - deleted_by => $user_id
        - deleted_at => NOW()
*/

CREATE TABLE IF NOT EXISTS "users" (
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "email" TEXT NOT NULL,
    "password" TEXT,
    "dt_birth" DATE,
    "cpf" CHAR(11),
    "rg" CHAR(9),

    /* Audit fields */
    "ref_last_register" INTEGER,
    "ref_origin_register" INTEGER,
    "version" INTEGER NOT NULL DEFAULT 1,
    "created_by" INTEGER NOT NULL,
    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_by" INTEGER,
    "updated_at" TIMESTAMP,
    "deleted_by" INTEGER,
    "deleted_at" TIMESTAMP
);

CREATE TABLE IF NOT EXISTS "auths" (
    "id" SERIAL PRIMARY KEY,
    "ref_previous" INTEGER,
    "ref_user" INTEGER NOT NULL,
    "token" TEXT NOT NULL,
    "dt_expires" TIMESTAMP NOT NULL,

    /* Audit fields */
    "ref_last_register" INTEGER,
    "ref_origin_register" INTEGER,
    "version" INTEGER NOT NULL DEFAULT 1,
    "created_by" INTEGER NOT NULL,
    "created_at" TIMESTAMP NOT NULL DEFAULT NOW(),
    "updated_by" INTEGER,
    "updated_at" TIMESTAMP,
    "deleted_by" INTEGER,
    "deleted_at" TIMESTAMP
);


INSERT INTO "users" ("id", "name", "email", "password", "dt_birth", "created_by") 
VALUES (1, 'Admin', 'admin@admin.com', md5('admin'), '2000-01-01', 1)
ON CONFLICT DO NOTHING;
