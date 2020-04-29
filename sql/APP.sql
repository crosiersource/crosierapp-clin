SET FOREIGN_KEY_CHECKS = 0;

DELETE
FROM cfg_app
WHERE uuid = 'ead49941-35a8-49fc-b932-44be4bb25e15';

INSERT INTO `cfg_app` (`id`, `uuid`, `inserted`, `updated`, `nome`, `obs`, `estabelecimento_id`, `user_inserted_id`,
                       `user_updated_id`)
VALUES (null, 'ead49941-35a8-49fc-b932-44be4bb25e15', '1900-01-01 00:00:00', '1900-01-01 00:00:00', 'crosierapp-clin', 'crosierapp-clin', 1,
        1, 1);

COMMIT;
