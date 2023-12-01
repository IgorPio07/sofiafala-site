create table participante (
    insc        varchar(100) primary key,
    nome        varchar(100),
    email       varchar(100),
    nasc        varchar(10),
    cel         varchar(20),
    rg          varchar(20),
    endereco    varchar(100),
    cid         varchar(100),
    cep         varchar(10),
    uf          varchar(2),
    idade       integer,
    sexo        varchar(1),
    disturbio   varchar(20),
    cancelado   boolean not null default FALSE,
    created_at  TIMESTAMPTZ NOT NULL DEFAULT NOW()
);


ALTER TABLE participante
ADD COLUMN created_at TIMESTAMPTZ NOT NULL DEFAULT NOW();

ALTER TABLE participante
ADD COLUMN idade       integer,
ADD COLUMN sexo        varchar(1),
ADD COLUMN disturbio   varchar(20);

ALTER TABLE participante
ADD COLUMN cancelado   boolean not null default FALSE;
