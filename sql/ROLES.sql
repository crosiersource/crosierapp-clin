START TRANSACTION;

SET FOREIGN_KEY_CHECKS=0;


INSERT INTO sec_role(id,inserted,updated,role,descricao,estabelecimento_id,user_inserted_id,user_updated_id) VALUES(null,now(),now(),'ROLE_CLINICA','ROLE_CLINICA',1,1,1);
INSERT INTO sec_role(id,inserted,updated,role,descricao,estabelecimento_id,user_inserted_id,user_updated_id) VALUES(null,now(),now(),'ROLE_CLINICA_ADMIN','ROLE_CLINICA_ADMIN',1,1,1);


COMMIT;
