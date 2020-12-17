create database PHPCRUD;

use PHPCRUD;

select * from tables;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuarios` (`id`, `email`, `password`, `descripcion`) VALUES
(5, 'jluque', '123456', 'Usuario administrador'),
(6, 'cperez', '123456', 'Usuario estandar');

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
  
  ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

drop database PHPCRUD;
