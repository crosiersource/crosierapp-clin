START TRANSACTION;

SET FOREIGN_KEY_CHECKS = 0;


# INSERT INTO cfg_app_config VALUES(null,'URL_prod','https://core.xxxxxxxxxxxx','ead49941-35a8-49fc-b932-44be4bb25e15',now(),now(),1,1,1);

--
--
-- Entrada no menu no crosier-core
DELETE
FROM cfg_entmenu
WHERE uuid = 'b0fb7ba0-c2eb-4c33-a4bb-e5078fc305b0';

INSERT INTO cfg_entmenu(uuid, label, icon, tipo, app_uuid, url, roles, pai_uuid, ordem, css_style, inserted, updated,
                        estabelecimento_id, user_inserted_id, user_updated_id)
VALUES ('b0fb7ba0-c2eb-4c33-a4bb-e5078fc305b0', 'Clínica', 'fas fa-clinic-medical', 'ENT', 'ead49941-35a8-49fc-b932-44be4bb25e15', '/', '',
        '71d1456b-3a9f-4589-8f71-42bbf6c91a3e', 100, 'background-color: darkslateblue;', now(), now(), 1, 1, 1);


--
--
-- crosierapp-clin (Menu Raíz)
DELETE
FROM cfg_entmenu
WHERE uuid = '9abbe89c-aa92-4a06-8fb8-198cfdc56bd2';

INSERT INTO cfg_entmenu(uuid, label, icon, tipo, app_uuid, url, roles, pai_uuid, ordem, css_style, inserted, updated,
                        estabelecimento_id, user_inserted_id, user_updated_id)
VALUES ('9abbe89c-aa92-4a06-8fb8-198cfdc56bd2', 'crosierapp-clin (Menu Raíz)', '', 'PAI',
        'ead49941-35a8-49fc-b932-44be4bb25e15', '', '', null, 0, null, now(), now(), 1, 1, 1);


-- Profissionais
DELETE
FROM cfg_entmenu
WHERE uuid = '829821c7-560f-455e-9709-347927788de6';

INSERT INTO cfg_entmenu(uuid, label, icon, tipo, app_uuid, url, roles, pai_uuid, ordem, css_style, inserted, updated,
                        estabelecimento_id, user_inserted_id, user_updated_id)
VALUES ('829821c7-560f-455e-9709-347927788de6', 'Profissionais', 'fas fa-user-md', 'ENT',
        'ead49941-35a8-49fc-b932-44be4bb25e15', '/cln/profissional/list/', '', 'be7e0edf-e3fc-4a64-987d-e3f71f696951',
        1, null, now(), now(), 1, 1, 1);


-- Procedimentos
DELETE
FROM cfg_entmenu
WHERE uuid = '991e76cc-8cf4-4835-87b4-edc2ecd4e1ef';

INSERT INTO cfg_entmenu(uuid, label, icon, tipo, app_uuid, url, roles, pai_uuid, ordem, css_style, inserted, updated,
                        estabelecimento_id, user_inserted_id, user_updated_id)
VALUES ('991e76cc-8cf4-4835-87b4-edc2ecd4e1ef', 'Procedimentos', 'fas fa-book-medical', 'ENT',
        'ead49941-35a8-49fc-b932-44be4bb25e15', '/cln/procedimento/list/', '', 'be7e0edf-e3fc-4a64-987d-e3f71f696951',
        1, null, now(), now(), 1, 1, 1);


--
--
--
--
--
--
--
-- cfg_entmenu_locator
--

DELETE FROM cfg_entmenu_locator WHERE menu_uuid = 'be7e0edf-e3fc-4a64-987d-e3f71f696951';

INSERT INTO cfg_entmenu_locator(menu_uuid, url_regexp, quem, inserted, updated, estabelecimento_id, user_inserted_id,
                                user_updated_id)
VALUES ('be7e0edf-e3fc-4a64-987d-e3f71f696951', '^https://cln\.(.)*/(.)*', '*', now(), now(), 1, 1, 1);


COMMIT;

