SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `cln_profissional`;

CREATE TABLE `cln_profissional`
(
    `id`                 bigint(20)   NOT NULL AUTO_INCREMENT,
    `nome`               VARCHAR(255) NOT NULL,
    `json_data`          json,

    UNIQUE KEY `uk_cln_profissional` (`nome`),

    -- campo de controle
    PRIMARY KEY (`id`),
    `inserted`           datetime     NOT NULL,
    `updated`            datetime     NOT NULL,
    `version`            int(11),
    `estabelecimento_id` bigint(20)   NOT NULL,
    `user_inserted_id`   bigint(20)   NOT NULL,
    `user_updated_id`    bigint(20)   NOT NULL,
    KEY `K_crm_profissional_estabelecimento` (`estabelecimento_id`),
    KEY `K_crm_profissional_user_inserted` (`user_inserted_id`),
    KEY `K_crm_profissional_user_updated` (`user_updated_id`),
    CONSTRAINT `FK_crm_profissional_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_crm_profissional_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
    CONSTRAINT `FK_crm_profissional_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `cln_procedimento`;

CREATE TABLE `cln_procedimento`
(
    `id`                 bigint(20)   NOT NULL AUTO_INCREMENT,
    `nome`               VARCHAR(255) NOT NULL,
    `json_data`          json,

    UNIQUE KEY `uk_cln_procedimento` (`nome`),

    -- campo de controle
    PRIMARY KEY (`id`),
    `inserted`           datetime     NOT NULL,
    `updated`            datetime     NOT NULL,
    `version`            int(11),
    `estabelecimento_id` bigint(20)   NOT NULL,
    `user_inserted_id`   bigint(20)   NOT NULL,
    `user_updated_id`    bigint(20)   NOT NULL,
    KEY `K_crm_procedimento_estabelecimento` (`estabelecimento_id`),
    KEY `K_crm_procedimento_user_inserted` (`user_inserted_id`),
    KEY `K_crm_procedimento_user_updated` (`user_updated_id`),
    CONSTRAINT `FK_crm_procedimento_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_crm_procedimento_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
    CONSTRAINT `FK_crm_procedimento_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;



DROP TABLE IF EXISTS `cln_atendimento`;

CREATE TABLE `cln_atendimento`
(
    `id`                 bigint(20) NOT NULL AUTO_INCREMENT,
    `dt_atendimento`     DATETIME   NOT NULL,
    `cliente_id`         bigint(20) NOT NULL,
    `fatura_id`          bigint(20) NOT NULL,
    `json_data`          json,

    KEY `K_cln_atendimento_cliente` (`cliente_id`),
    CONSTRAINT `FK_cln_atendimento_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `crm_cliente` (`id`),

    KEY `K_cln_atendimento_fatura` (`fatura_id`),
    CONSTRAINT `FK_cln_atendimento_fatura` FOREIGN KEY (`fatura_id`) REFERENCES `fin_fatura` (`id`),

    -- campo de controle
    PRIMARY KEY (`id`),
    `inserted`           datetime   NOT NULL,
    `updated`            datetime   NOT NULL,
    `version`            int(11),
    `estabelecimento_id` bigint(20) NOT NULL,
    `user_inserted_id`   bigint(20) NOT NULL,
    `user_updated_id`    bigint(20) NOT NULL,
    KEY `K_crm_atendimento_estabelecimento` (`estabelecimento_id`),
    KEY `K_crm_atendimento_user_inserted` (`user_inserted_id`),
    KEY `K_crm_atendimento_user_updated` (`user_updated_id`),
    CONSTRAINT `FK_crm_atendimento_user_inserted` FOREIGN KEY (`user_inserted_id`) REFERENCES `sec_user` (`id`),
    CONSTRAINT `FK_crm_atendimento_estabelecimento` FOREIGN KEY (`estabelecimento_id`) REFERENCES `cfg_estabelecimento` (`id`),
    CONSTRAINT `FK_crm_atendimento_user_updated` FOREIGN KEY (`user_updated_id`) REFERENCES `sec_user` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_swedish_ci;
