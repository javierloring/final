------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS propietarios CASCADE;

CREATE TABLE propietarios (
     id         bigserial   PRIMARY KEY
    ,dni        varchar(9)  NOT NULL UNIQUE
    ,nombre     varchar(20) NOT NULL
    ,telefono   numeric(9)  NOT NULL
);

INSERT
    INTO propietarios (dni, nombre, telefono)
    VALUES ('25256256A', 'Pepe', 956956956)
            ,('22256256B', 'Juan', 954954954);

-------------------------------

DROP TABLE IF EXISTS inmuebles CASCADE;

CREATE TABLE inmuebles (
     id             bigserial       PRIMARY KEY
    ,precio         numeric(10,2)   NOT NULL
    ,num_hab        numeric(2)      NOT NULL
    ,num_banos      numeric(2)      NOT NULL
    ,lavavajillas   boolean         NOT NULL
    ,garaje         boolean         NOT NULL
    ,trastero       boolean         NOT NULL
    ,propietario_id bigint          NOT NULL REFERENCES propietarios (id)
                                    ON DELETE NO ACTION ON UPDATE CASCADE
);

INSERT
    INTO inmuebles (precio, num_hab, num_banos, lavavajillas, garaje, trastero, propietario_id)
    VALUES (150000, 3, 1, true, false, false, 1)
            ,(93500, 2, 1, false, false, false, 1)
            ,(125000, 3, 2, true, true, true, 2);

-------------------------------
