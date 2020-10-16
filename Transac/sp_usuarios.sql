DELIMITER //
CREATE PROCEDURE sp_listar_usuarios (
)
BEGIN
        
    SELECT * FROM usuarios;
END;
//DELIMITER ;
/*------------------------------------------------------------------------------------------*/
DELIMITER //
CREATE PROCEDURE ver_user_ac (
)
BEGIN
        
    SELECT * FROM usuarios WHERE rol = 'AtencionCliente';
END;
//DELIMITER ;
/*-----------------------------------------------------------------------------------------------*/