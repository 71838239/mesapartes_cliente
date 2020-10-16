DELIMITER //
CREATE PROCEDURE sp_c_solicitantes ( IN
    _DNI varchar(8),
    _nombres varchar(45),
    _apellidoPaterno varchar(45),
    _apellidoMaterno varchar(45),
    _telefono varchar(45),
    _email varchar(45)
)
BEGIN
        
    INSERT INTO solicitantes (DNI,nombres,apellidoPaterno,apellidoMaterno,telefono,email) values (_DNI,_nombres,
    _apellidoPaterno,_apellidoMaterno,_telefono,_email);
END;
//DELIMITER ;
/*------------------------------------------------------------------------------------------------------------------*/
DELIMITER //
CREATE PROCEDURE sp_listar_solicitantes (
)
BEGIN
        
    SELECT * FROM solicitantes;
END;
//DELIMITER ;
/*----------------------------------------------------------------------------------------------------------------------*/