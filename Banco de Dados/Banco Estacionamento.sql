create database db_banco_digital;
use db_banco_digital;

create table correntista(
	id int auto_increment not null,
	nome varchar(255) not null,
    cpf int unique not null,
    data_nasc date not null,
    senha int not null,
	primary key(id)
);

create table conta(
	id int auto_increment not null,
	tipo varchar(50) not null,
    saldo double not null,
    limite double not null,
    id_correntista int not null,
    foreign key (id_correntista) references correntista(id),
	primary key(id)
);

create table chave_pix(
	id int auto_increment not null,
	tipo varchar(50) not null,
    chave varchar(50) unique not null,
    id_conta int not null,
    foreign key (id_conta) references conta(id),
	primary key(id)
);

create table transacao(
	id int auto_increment not null,
	valor double not null,
    data_hora datetime not null,
    id_conta_enviou int not null,
    id_conta_recebeu int,
    foreign key (id_conta_enviou) references conta(id),
    foreign key (id_conta_recebeu) references conta(id),
	primary key(id)
);
