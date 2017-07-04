/*drop database MapHort;*/

create schema if not exists MapHort;


use Maphort;

create table if not exists USUARIO
(
id int not null auto_increment,
sexo char check(sexo in ('M' or 'F')),
rua varchar (100) not null,
bairro varchar (100) not null,
cep varchar(8) not null,
numero_usuario int not null,
telefone varchar(9) not null,
nome varchar(100) not null,
Primary key (id)

);

create table if not exists HORTA
(
proprietario_id int not null,
nome varchar(100) not null,
categoria char check(categoria in ('X' or 'Y' or 'Z')),
tamanho char check(tamanho in('P' or 'M' or 'G')),
telefone int not null,
id int not null auto_increment,
Primary key (id)
);

create table if not exists PLANTA_HORTICULA
(
Especie varchar(20) not null,
Venda_Diaria int not null,
Quantidade_Metroquadrado int not null,
Cod_Planta int not null,
Primary Key (Cod_Planta)
);

create table if not exists DISTANCIA_HORTA
(
Cod_NomeHortas int not null,
Distancia_NomeHortas int not null,
Primary Key (Cod_NomeHortas)
);

insert into USUARIO values (1,'M', 'Rodovia Fernão Dias' ,'Novo Alvorada', '34650040', 1, '36916146' ,'Borges');
insert into USUARIO values (2,'M', ' Rua Santana' ,'Roça Grande', '34535230', 2, '36794200' ,'Cristiano');
insert into USUARIO values (3,'M', ' Romeu Jeronimo','Rosario', '34720010', 3,'36722038' ,'CAIC');
insert into USUARIO values (4,'F', 'Rua Campo Florido' ,'Nossa Sra de Fat.', '34600600', 4, '32262422' ,'Fatima');
insert into USUARIO values (5,'M', 'Rua Serra Grande' ,'Morada da Serra', '34515710', 5, '00000002' ,'Matheus');
insert into USUARIO values (6,'M', 'Rua Presidente JK' ,'Siderurgica', '34515170', 6, '10261290' ,'Marta');

insert into HORTA values ('Borges', 'Horta de Borges', 'Z' , 'Grande', '00000001', 1  );
insert into HORTA values ('Hospital Cr. Machado', 'Horta Machado', 'Z' , 'Grande', ' 36794200', 2 );
insert into HORTA values ('CAIC', 'Horta do CAIC', 'Z' , 'Grande', '36722038', 3  );
insert into HORTA values ('Fatima', 'Horta Com. de Fatima', 'Y' , 'Media', '32262422', 4  );
insert into HORTA values ('Fatima', 'Horta Com. de Fatima', 'Y' , 'Media', '32262422', 4  );
insert into HORTA values ('Matheus', 'Horta Com. Morada', 'Z' , 'Grande', '00000002', 5  );
insert into HORTA values ('Marta', 'Horta de Marta', 'Z' , 'Grande', '10261290', 6 );

insert into DISTANCIA_HORTA values ( 61, 19.9);
insert into DISTANCIA_HORTA values ( 62, 20.3);
insert into DISTANCIA_HORTA values ( 63, 14.1);
insert into DISTANCIA_HORTA values ( 64, 14.7);
insert into DISTANCIA_HORTA values ( 65, 5.7);

insert into DISTANCIA_HORTA values ( 51, 14.2);
insert into DISTANCIA_HORTA values ( 52, 16.0);
insert into DISTANCIA_HORTA values ( 53, 12.3);
insert into DISTANCIA_HORTA values ( 54, 10.6);

insert into DISTANCIA_HORTA values ( 41, 10.9);
insert into DISTANCIA_HORTA values ( 42, 7.8);
insert into DISTANCIA_HORTA values ( 43, 7.5);

insert into DISTANCIA_HORTA values ( 31, 10.4);
insert into DISTANCIA_HORTA values ( 32, 10.9);

insert into DISTANCIA_HORTA values ( 21, 2.5);





