-- Pour créer un utilisateur
DROP user IF EXISTS 'siteweb'@'localhost';
CREATE user 'siteweb'@'localhost' IDENTIFIED BY '1234';

  -- Pour permettre les permissions
  GRANT SELECT, UPDATE, INSERT, DELETE
    ON restov2.*
    TO 'siteweb'@'localhost';
