-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-04-2021 a las 12:33:36
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_groupdelta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIA`
--

CREATE TABLE `CATEGORIA` (
  `NOMBRE` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `CATEGORIA`
--

INSERT INTO `CATEGORIA` (`NOMBRE`, `TIPO`) VALUES
('BIZCOCHOS', 'DESAYUNO'),
('CARNE', 'CENA'),
('ENTRANTES', 'COMIDA'),
('GRANOLA', 'DESAYUNO'),
('LÁCTEOS', 'DESAYUNO'),
('PESCADO', 'CENA'),
('POSTRE', 'COMIDA'),
('PRINCIPALES', 'COMIDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FOTO`
--

CREATE TABLE `FOTO` (
  `IDFOTO` int(10) NOT NULL,
  `IDRECETA` int(10) NOT NULL,
  `PATH` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `FOTO`
--

INSERT INTO `FOTO` (`IDFOTO`, `IDRECETA`, `PATH`) VALUES
(1, 2, 'imagen1.jpg'),
(2, 2, 'imagen2.jpg'),
(3, 2, 'imagen3.jpg'),
(4, 3, 'imagen4.jpg'),
(5, 3, 'imagen5.jpg'),
(6, 3, 'imagen6.jpg'),
(7, 4, 'imagen7.jpg'),
(8, 4, 'imagen8.jpg'),
(9, 4, 'imagen9.jpg'),
(10, 5, 'imagen10.jpg'),
(11, 5, 'imagen11.jpg'),
(12, 5, 'imagen12.jpg'),
(13, 6, 'imagen13.jpg'),
(14, 6, 'imagen14.jpg'),
(15, 6, 'imagen15.jpg'),
(16, 7, 'imagen16.jpg'),
(17, 7, 'imagen17.jpg'),
(18, 7, 'imagen18.jpg'),
(19, 8, 'imagen19.jpg'),
(20, 8, 'imagen20.jpg'),
(21, 8, 'imagen21.jpg'),
(22, 9, 'imagen22.jpg'),
(23, 9, 'imagen23.jpg'),
(24, 9, 'imagen24.jpg'),
(25, 10, 'imagen25.jpg'),
(26, 10, 'imagen26.jpg'),
(27, 10, 'imagen27.jgp'),
(28, 11, 'imagen28.jpg'),
(29, 11, 'imagen29.jpg'),
(30, 11, 'imagen30.jpg'),
(31, 12, 'imagen31.jpg'),
(32, 12, 'imagen32.jpg'),
(33, 12, 'imagen33.jpg'),
(34, 13, 'imagen34.jpg'),
(35, 13, 'imagen35.jpg'),
(36, 13, 'imagen36.jpg'),
(37, 14, 'imagen37.jpg'),
(38, 14, 'imagen38.jpg'),
(39, 14, 'imagen39.jpg'),
(40, 15, 'imagen40.jpg'),
(41, 15, 'imagen41.jpg'),
(42, 15, 'imagen42.jpg'),
(43, 16, 'imagen43.jpg'),
(44, 16, 'imagen44.jpg'),
(45, 16, 'imagen45.jpg'),
(46, 17, 'imagen46.jpg'),
(47, 17, 'imagen47.jpg'),
(48, 15, 'imagen48.jpg'),
(49, 18, 'imagen49.jpg'),
(50, 18, 'imagen50.jpg'),
(51, 18, 'imagen51.jpg'),
(52, 19, 'imagen52.jpg'),
(53, 19, 'imagen53.jpg'),
(54, 19, 'imagen54.jpg'),
(55, 20, 'imagen55.jpg'),
(56, 20, 'imagen56.jpg'),
(57, 20, 'imagen57.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `INGREDIENTES`
--

CREATE TABLE `INGREDIENTES` (
  `IDRECETA` int(10) NOT NULL,
  `NOMBRE` text NOT NULL,
  `CANTIDAD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `INGREDIENTES`
--

INSERT INTO `INGREDIENTES` (`IDRECETA`, `NOMBRE`, `CANTIDAD`) VALUES
(2, 'Copos de avena', '300 g'),
(2, 'Azúcar moreno ', '45g'),
(2, 'Canela molida ', 'Media cucharadita'),
(2, 'Avellanas', '30g'),
(2, 'Uvas pasas sultanas', '20g'),
(2, 'Miel', '6 cucharaditas'),
(2, 'Aceite de girasol', '3 cucharadas'),
(2, 'Esencia de vainilla', '1 cucharadita'),
(3, 'Copos de avena', '150g'),
(3, 'Almendras en láminas', '50 g'),
(3, 'Semillas de calabaza', '30g'),
(3, 'Canela molida', '1/2 cucharadita'),
(3, 'Sal', '1/2 cucharadita'),
(3, 'Aceite de girasol', '1 cucharadita'),
(3, 'Miel', '20 ml'),
(3, 'Sirope de arce', '30ml'),
(3, 'Azúcar moreno', '50 g'),
(3, 'Frutas secas', 'Un puñado'),
(4, 'Copos de avena', '170 g'),
(4, 'Frutos secos variados', '200 g'),
(4, 'Semillas de calabaza', '45 g'),
(4, 'Pasas sultanas', '10 g'),
(4, 'Sal', '1/2 cucharadita '),
(4, 'Arándanos secos', '10 g'),
(4, 'Aceite de oliva', '40 g'),
(4, 'Clara de huevo', '1'),
(4, 'Pasta de dátiles', '40 g'),
(5, 'Melocotón maduro y jugoso', '4'),
(5, 'Yogur griego sin azúcar', '150 g'),
(5, 'Zumo de limón', '5 ml'),
(5, 'Leche ', 'al gusto'),
(5, 'Zumo de naranja', 'al gusto'),
(5, 'Menta fresca o hierbabuena', 'al gusto'),
(6, 'Plátano maduro', '1'),
(6, 'Kiwis', '2'),
(6, 'Aguacate', '1/2'),
(6, 'Peras', '1'),
(6, 'Yogur natural', '125 g'),
(6, 'Leche', '100 ml'),
(6, 'Miel', '40 g'),
(6, 'Salvado de avena', '30 g'),
(6, 'Jengibre molido', '5 g'),
(6, 'Coco rallado', '10 g'),
(6, 'Cubitos de hielo', '8'),
(7, 'Mango maduro', '1'),
(7, 'Yogur griego', '250 g'),
(7, 'Cardamomo molido', '2 g'),
(7, 'Zumo de limón', '2 ml'),
(7, 'Azafrán', '1 g'),
(7, 'Azúcar', 'al gusto'),
(7, 'Leche', '100 ml'),
(7, 'Cubitos de hielo', '5'),
(8, 'Piña', '250 g'),
(8, 'Manzanas Grand Smith', '5'),
(8, 'Hojas de menta', '12'),
(8, 'Ralladura de lima', '10 g'),
(8, 'Zumo de lima', '20 ml'),
(8, 'Cubitos de hielo', '5'),
(9, 'Harina de trigo', '150 g'),
(9, 'Huevos medianos', '2'),
(9, 'Azúcar', '25 g'),
(9, 'Mantequilla ', '50 g'),
(9, 'Leche', '200 ml'),
(9, 'Esencia de vainilla', 'Unas gotas'),
(9, 'Levadura', '12 g'),
(9, 'Sal', '2 g'),
(10, 'Harina de trigo', '250 g'),
(10, 'Leche', '90 ml'),
(10, 'Levadura', '12 g'),
(10, 'Huevos medianos', '2'),
(10, 'Azúcar perlado', '150 g'),
(10, 'Mantequilla', '125 g'),
(10, 'Leche', '200 ml'),
(10, 'Esencia de vainilla ', 'Unas gotas'),
(10, 'Sal', '2 g'),
(11, 'Chocolate negro', '200 g'),
(11, 'Mantequilla ', '110 g'),
(11, 'Huevos medianos', '4'),
(11, 'Azúcar', '120 g'),
(11, 'Esencia de vainilla', 'Unas gotas'),
(11, 'Harina', '85 g'),
(11, 'Bicarbonato', '2 g'),
(11, 'Nueces', '4'),
(11, 'Pepitas de Chocolate', '150 g'),
(12, 'Tomate cherry', '400 g'),
(12, 'Cebolleta ', '1'),
(12, 'Tahini', '1 cucharada'),
(12, 'Zumo de limón', '20 ml'),
(12, 'Queso feta', '150 g'),
(12, 'Harina', '85 g'),
(12, 'Tabasco ', 'Al gusto'),
(12, 'Sal', 'Una pizca'),
(12, 'Pimienta negra', '5 g'),
(12, 'Aceite de oliva', '20 ml'),
(13, 'Patata mediana', '3'),
(13, 'Salmón ahumado o marinado', '100 g'),
(13, 'Aguacate en su punto', '1'),
(13, 'Crema agria', '40 g'),
(13, 'Mayonesa', '40 g'),
(13, 'Leche ', '20 ml'),
(13, 'Mostaza', '5 ml'),
(13, 'Limón', '1'),
(13, 'Sal', 'Una pizca'),
(14, 'Tomates', '2'),
(14, 'Rodajas de sandía', '2'),
(14, 'Zumo de lima', '1'),
(14, 'Zumo de limón', '1'),
(14, 'Menta fresca ', '1 puñado'),
(14, 'Aceite de oliva', '2 cucharadas'),
(14, 'Comino', '1 cucharada '),
(14, 'Jengibre ', '1 trozo'),
(14, 'Cúrcuma', '1/4 cucharada'),
(14, 'Cayena', '1/4 cucharada'),
(14, 'Sal', '1 cucharada'),
(15, 'Chorizo', '120 g'),
(15, 'Plátano maduro', '100 g'),
(16, 'Pasta de boletus ', '170 g'),
(16, 'Crema de calabaza ', '200 ml'),
(16, 'Vino blanco', '50 ml'),
(16, 'Queso parmesado ', '3 cucharadas'),
(16, 'Orégano', '1 g'),
(16, 'Romero', '1 g'),
(16, 'Pimienta', '1 g'),
(16, 'Aceite de oliva', '1 cucharada'),
(16, 'Sal', '1 g'),
(17, 'Mantequilla', '220 g'),
(17, 'Azúcar', '300 g'),
(17, 'Harina de trigo', '330 g'),
(17, 'Huevos medianos', '3'),
(17, 'Zumo de naranja', '120 ml'),
(17, 'Ralladura de naranja', '2'),
(17, 'Sal', '1 cucharadita'),
(17, 'Albahaca', '1 cucharadita'),
(17, 'Azúcar glasé', '10 g'),
(18, 'Azúcar moreno', '65 g'),
(18, 'Harina de trigo', '225 g'),
(18, 'Mantequilla ', '150 g'),
(18, 'Zumo de limón ', '180 ml'),
(18, 'Azúcar', '60 g'),
(18, 'Huevos medianos', '3'),
(18, 'Ralladura de limón', '1'),
(18, 'Chocolate blanco ', '180 g'),
(19, 'Pan de pita', '3'),
(19, 'Queso fresco mozzarella', '1'),
(19, 'Salsa de tomate', '100 ml'),
(19, 'Huevos', '3'),
(19, 'Sal', '1 cucharada'),
(19, 'Tomatitos cherry', '12'),
(19, 'Salchichas', '3'),
(19, 'Aceitunas negras', '10'),
(19, 'Orégano', '2 g'),
(20, 'Doradas', '4'),
(20, 'Rabanitos', '6'),
(20, 'Aceitunas negras', '8'),
(20, 'Alcaparras', '10'),
(20, 'Zumo de limón', '20 ml'),
(20, 'Vinage', '30 ml'),
(20, 'Pimienta', '5 g'),
(20, 'Escarola', '1'),
(20, 'Diente de ajo', '1'),
(20, 'Huevos', '2'),
(20, 'Pepinillos', '6'),
(20, 'Aceite de oliva', '40 ml'),
(20, 'Perejil', '5 g'),
(20, 'Sal', '2 g');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PASOS`
--

CREATE TABLE `PASOS` (
  `IDRECETA` int(10) NOT NULL,
  `NUMERO_PASO` int(10) NOT NULL,
  `EXPLICACION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `PASOS`
--

INSERT INTO `PASOS` (`IDRECETA`, `NUMERO_PASO`, `EXPLICACION`) VALUES
(2, 1, '<p>Comenzamos por trocear las <b>avellanas</b>, lo podemos hacer con    un mortero o a cuchillo. Si nuestras avellanas están enteras,    retiramos la cáscara y la piel. Para pelar avellanas de manera    fácil las introducimos en horno pre-calentado a 180 ºC durante    cinco minutos, las envolvemos en un trapo y las masajeamos hasta    que se desprendan las pieles.<br/> </p>'),
(2, 2, '<p>\r\nMezclamos las avellanas troceadas con los <b>copos de avena</b>, el    <b>azúcar moreno</b>, la <b>canela molida</b> y las <b>uvas pasas</b>. \r\n</p>'),
(2, 3, '<p>\r\nAgregamos un    pellizco de <b>sal</b>. Batimos la <b>miel</b>, la <b>esencia de vainilla</b> y el    <b>aceite de girasol</b> y lo añadimos. Trabajamos con los dedos para    que todos los ingredientes secos queden bien cubiertos de miel,    vainilla y aceite.<br/>   \r\n</p>'),
(2, 4, '<p>\r\n Extendemos sobre una bandeja de horno cubierta con una lámina de    papel sulfurizado. Introducimos en el horno, pre-calentado a 150 ºC,    a media altura. Cocemos durante unos cinco o seis minutos. Retiramos    del horno, removemos y volvemos a introducir unos minutos más hasta que    adquieran un ligero tono dorado, observando regularmente para que no se queme.   Retiramos del horno y dejamos que nuestro granola se atempere sobre la misma    bandeja, removiendo de vez en cuando. \r\n</p>'),
(2, 5, '<p>\r\nUna vez esté completamente fría, la introducimos en un bote hermético y la guardamos en un sitio seco. <br/>   Se conservará en buen estado durante unas dos o tres semanas.   \r\n</p>'),
(3, 1, '<p>\r\nPesamos los ingredientes sólidos: los <b>copos de avena</b>, las <b>almendras</b> o <b>frutos secos</b>, las <b>semillas</b> y el <b>coco</b>. \r\n</p>'),
(3, 2, '<p>\r\nLas ponemos en un bol y removemos para mezclar.   Agregamos la <b>canela</b> y la <b>sal</b>; volvemos a mezclar.   <br/>   \r\n</p>\r\n'),
(3, 3, '<p>\r\nMedimos en una jarra medidora la <b>miel</b> y el <b>sirope de arce</b>.    Agregamos el <b>aceite vegetal</b> que hayamos elegido. Podemos    calentar muy brevemente en el microondas para que la miel se haga más fluida.   <br/>   \r\n</p>'),
(3, 4, '<p>\r\nAñadimos el <b>azúcar moreno</b> a los sólidos de la receta. Seguidamente    agregamos la mezcla de endulzantes y aceite. Removemos todo bien para que    se homogeneice lo más que se pueda.   <br/>   \r\n</p>'),
(3, 5, '<p>\r\nForramos un molde o bandeja de repostería con papel de hornear y ponemos la    mezcla sobre él. La extendemos con un tenedor para que quede en una capa no    muy gruesa.   <br/>   Horneamos la granola a 140ºC (con aire) / 160ºC (sin aire) unos 20-25 minutos,    removiendo con un tenedor cada 10 minutos para que no se quede apelmazada.   <br/>   Sacamos la bandeja del horno al cabo de ese tiempo y la ponemos sobre una rejilla.    Aunque parezca que la granola está blandita, al enfriarse se va poniendo crujiente.    En cualquier caso, si una vez fría os parece poco crujiente, se puede meter otro    ratillo en el horno hasta alcanzar la crujientez deseada. \r\n</p>'),
(3, 6, '<p>\r\nMientras se enfría seguiremos    removiéndola con el tenedor para que quede suelta.   <br/>   Cuando esté bien fría añadimos las frutas secas si nos gustan.    <br/>    \r\n</p>'),
(4, 1, '<p>\r\nPrecalentar el horno a 180°C.   <br/>   Mezclamos en un bol los <b>copos de avena</b>, los <b>frutos secos</b> y    las <b>semillas</b>.   <br/>   \r\n</p>'),
(4, 2, '<p>\r\nBatimos la <b>clara</b> hasta que esté espumosa (sin llegar a nieve).   Añadimos la <b>pasta de dátiles</b>, el <b>aceite</b>, la pizca de <b>sal</b> y    la clara de huevo. Mezclamos bien.<br/>\r\n</p>'),
(4, 3, '<p>\r\nForramos una fuente de horno con papel para hornear y distribuimos encima la    mezcla, repartiéndolo bien. No debe superar 1 cm de grosor, si tenéis mucha    cantidad horneadla en dos tandas.   <br/>   Llevamos al horno por unos 25 minutos, tiene que quedar bien tostadito. Es    importante que no se queme, conviene poner la bandeja en el punto medio del horno.   <br/>   \r\n</p>'),
(4, 4, '<p>\r\nRetiramos, mezclamos con las pasas y los arándanos y dejamos enfriar. Una vez fría    la guardamos en un bote de cristal hermético.   <br/>    \r\n</p>'),
(5, 1, '<p>\r\nLavar bien y secar los <b>melocotones</b>. Pelarlos y trocearlos,    desechando los huesos. Colocarlos en una bolsa de congelación e    introducirlos en el congelador como mínimo una hora.    <br/>   \r\n</p>\r\n'),
(5, 2, '<p>\r\nBatir con unas varillas el <b>yogur griego</b> y mezclarlo con un    poco de <b>sirope de ágave o miel</b> (opcional, no hace falta si    la fruta es dulce y aromática). \r\n</p>'),
(5, 3, '<p>\r\nIntroducir el melocotón congelado    en una picadora o batidora de vaso y comenzar a triturar. Añadir el    <b>yogur</b> y el <b>zumo de limón</b> y continuar picando hasta    conseguir una textura homogénea.\r\n</p>'),
(5, 4, '<p>\r\nAgregar un poco de <b>leche</b> o de <b>zumo de naranja</b>, poco a poco,    si quedara demasiado espeso, batiendo bien. Servir inmediatamente o    guardar en un recipiente hermético en la nevera.\r\n</p>'),
(6, 1, '<p>\r\nEn primer lugar, agregamos el <b>yogur</b> y la <b>leche</b> al vaso    de la batidora.   <br/>   A continuación, pelamos y troceamos el <b>plátano</b>, los <b>kiwis</b>,    el <b>aguacate</b> y la <b>pera</b>. \r\n</p>'),
(6, 2, '<p>\r\nLos agregamos al vaso de la batidora    y trituramos hasta que no haya trozos de fruta. Entonces incorporamos    la <b>miel</b>, el <b>salvado de avena</b>, el <b>jengibre</b> y el <b>coco rallado</b>    y trituramos de nuevo.   <br/>   \r\n</p>'),
(6, 3, '<p>\r\nProbamos el punto de dulzor y rectificamos si fuera necesario, añadiendo más    miel en caso de querer un smoothie más dulce. Por último, añadimos los cubos    de hielo al vaso de la batidora y trituramos hasta que no se noten. Servimos inmediatamente.   <br/>\r\n</p>'),
(7, 1, '<p>\r\nSi queremos un lassi especialmente refrescante, se puede cortar    el <b>mango</b> en cubos y congelar una o dos horas antes de prepararlo.    En caso contrario, simplemente pelar la fruta, retirar el hueso y picar,    conservando bien los jugos.   <br/>   \r\n</p>'),
(7, 2, '<p>\r\nDisponer en el vaso de una batidora o procesador de alimentos el <b>yogur</b>,    sin desechar el líquido, por si luego queremos rebajar el espesor del lassi.    Añadir el mango, sus jugos, unos <b>cubitos de hielo</b>, el <b>cardamomo</b> y    el <b>limón</b>. \r\n</p>'),
(7, 3, '<p>\r\nTriturar muy bien hasta tener una textura homogénea.   <br/>   Comprobar el punto de la textura y de dulzor, y añadir azúcar y leche, agua o    el líquido guardado del yogur, al gusto. Volver a mezclar muy bien y servir    inmediatamente con unas hebras de azafrán.   <br/>\r\n</p>'),
(8, 1, '<p>\r\nComenzaremos rallando y exprimiendo la <b>lima</b> para el vaso    alto de una batidora. Seguidamente cortamos la <b>piña</b> en trozos    hasta obtener los 250 gramos, los añadimos también al vaso de la batidora.   <br/>   \r\nDe las cinco <b>manzanas</b> pelamos y cortamos en trozos una de ellas,    las otras cuatro, que servirán para la presentación, les cortamos la parte    superior con cuidado, como si fuese una tapadera y con un cuchillito le    quitamos el centro de esta tapa para después pasar la paja de plástico.   <br/>\r\n</p>'),
(8, 2, '<p>\r\nLa parte inferior la vamos vaciando con una cuchara o sacabolas y    reservando la carne de las manzanas con el resto de los ingredientes    en el vaso de la batidora, teniendo cuidado de no añadir el corazón de ellas.   <br/>   Finalmente, junto con la piña, el zumo de la lima y la carne de las manzanas,    añadimos las <b>hojas de menta</b> y los <b>cubitos de hielo</b>. \r\n</p>'),
(8, 3, '<p>\r\nTrituramos    con la batidora y su accesorio de cuchilla, rectificamos con agua si nos ha quedado    muy espeso, y servimos rápidamente nuestro smoothie dentro de cada manzana.   <br/>\r\n</p>'),
(9, 1, '<p>\r\nEn un bol mezclamos los ingredientes secos: la <b>harina</b>,    <b>levadura</b>, <b>azúcar</b> y <b>sal</b>. Reservamos.   <br/> Combinamos en otro bol los <b>huevos</b> batidos, la    <b>mantequilla</b> derretida y la <b>esencia de vainilla</b>.\r\n</p>'),
(9, 2, '<p>\r\nEn un bol mezclamos los ingredientes secos: la <b>harina</b>,    <b>levadura</b>, <b>azúcar</b> y <b>sal</b>. Reservamos.   <br/>      Combinamos en otro bol los <b>huevos</b> batidos, la    <b>mantequilla</b> derretida y la <b>esencia de vainilla</b>.\r\n</p>'),
(9, 3, '<p>\r\nIncorporamos los ingredientes secos y, con una varilla incorporamos a los líquidos.   <br/>          Vertemos la <b>leche</b> y batimos, es muy importante que no batamos demasiado    la mezcla. Se trata de integrarlos pero no es necesario intentar eliminar    todos los grumos. Si lo batimos en exceso los pancakes nos quedarán demasiado duros.   <br/>   \r\n\r\n</p>'),
(9, 4, '<p>\r\nCalentamos una sartén (debe ser aquella que tengamos para que no se pegue las cosas,    la de las tortillas o cosas a la plancha).    <br/>   Cuando esté caliente añadimos un cucharón de la mezcla de las tortitas, comenzando    a verterlo por el centro y dejando que sea la propia masa la que se redistribuya    en la sartén. Es importante que regulemos la temperatura hacia arriba o hacia abajo    durante todo el proceso.   <br/>   Si la masa no se cuaja al añadirla a la sartén estará demasiado fría y si, por el    contrario la parte inferior se quema antes de que aparezcan burbujitas en la parte    superior, estará demasiado caliente.   <br/>\r\n</p>'),
(9, 5, '<p>\r\nCuando vemos que aparecen burbujas en la parte superior del pancake o tortita es    el momento de darle la vuelta con una espátula. Cocinamos el pancake por el otro    lado durante 30 o 40 segundos  y retiramos.\r\n</p>'),
(10, 1, '<p>\r\nEn una taza calentamos ligeramente la <b>leche</b> y disolvemos    en ella la <b>levadura</b> fresca y la <b>esencia de vainilla</b>. Es    importante no calentar la leche demasiado, ya que el exceso de calor    mataría la levadura.   <br/>   \r\n</p>'),
(10, 2, '<p>\r\nEn un bol grande incorporamos la <b>harina</b> y la <b>sal</b>. Mezclamos    y hacemos un hueco en la parte central donde añadimos la leche con levadura    y los <b>huevos</b>. Con un tenedor comenzamos a integrar los ingredientes hasta    que tengamos una masa más o menos homogénea.   <br/>   Dejamos que fermente la masa, tapada con papel transparente, durante 30 o 40 minutos    en un lugar cálido. Un sitio perfecto podría ser el horno previamente templadito y apagado.   <br/>   \r\n</p>'),
(10, 3, '<p>\r\nPasado este tiempo añadimos la <b>mantequilla</b> en trocitos y comenzamos a amasar hasta    que se haya integrado en la masa. Agregamos el azúcar perlado. Amasamos unos    minutos más para que el azúcar se distribuya.   <br/>\r\n</p>'),
(11, 1, '<p>\r\nEn un bol ponemos el <b>chocolate</b> y la <b>mantequilla</b>. Lo metemos al    microondas a temperatura media para que se vaya derritiendo. Una vez derretido    lo mezclamos muy bien.   <br/>   \r\n</p>'),
(11, 2, '<p>\r\nPonemos los 4 <b>huevos</b> y el <b>azúcar</b> en un bol. Agregamos la <b>harina</b> y    la cucharadita de <b>bicarbonato</b>. Mezclamos muy bien.   <br/>   Agregamos el <b>chocolate</b> que hemos derretido junto con la <b>mantequilla</b> y    el toque de <b>vainilla</b>. Seguimos mezclando.   <br/>   \r\n</p>'),
(11, 3, '<p>\r\nAgregamos las <b>nueces</b> y las <b>pepitas de chocolate</b>.   <br/>   En un recipiente de horno ponemos un poco de <b>mantequilla</b> y <b>harina</b>    para que no se nos pegue el brownie.   <br/>   Incorporamos la mezcla y cubrimos con unas pepitas y unas nueces (opcional).    Introducimos al horno durante 30-35 minutos a 180º.   <br/>\r\n</p>'),
(12, 1, '<p>\r\nLavamos y cortamos los <b>tomates</b> cherry por la mitad y los colocamos en una ensaladera.    Picamos finamente la <b>cebolleta</b> y la incorporamos a los <b>tomates</b>.\r\n</p>'),
(12, 2, '<p>\r\n Añadimos el    <b>zumo de medio limón</b> junto con una cucharada de <b>tahini</b> y removemos.   <br/>   A continuación añadimos el <b>queso feta</b>, desmenuzándolo con los dedos. \r\n</p>'),
(12, 3, '<p>\r\nSalpimentamos al    gusto y añadimos unas gotas de <b>tabasco</b>, más o menos dependiendo del punto de picante    que queramos obtener. Por último regamos con un chorrito de <b>aceite de oliva</b> virgen extra,    mezclamos bien y servimos.   <br/>\r\n</p>'),
(13, 1, '<p>\r\nCocemos las <b>patatas</b> enteras, con piel, en abundante agua salada durante 20-30    minutos o el tiempo necesario para que estén tiernas, pero sin que se deshagan.\r\n</p>'),
(13, 2, '<p>\r\nRetiramos del agua y dejamos enfriar antes de pelar.   <br/>   Mientras esto ocurre preparamos la salsa mezclando la <b>crema agria</b>, la    <b>mayonesa</b>, la <b>mostaza</b>, la <b>leche</b> y la ralladura de 1/4 de <b>limón</b>.    Salpimentamos al gusto y mezclamos bien para homogeneizar.   <br/>   Troceamos groseramente la patata pelada y añadimos la salsa. A continuación incorporamos el    <b>salmón</b> marinado troceado y el <b>aguacate</b> machacado.\r\n</p>'),
(13, 3, '<p>\r\nMezclamos bien todos los    ingredientes, removiendo con cuidado para que la patata no se haga puré. Servimos inmediatamente    o guardamos en la nevera hasta el momento de consumir.   <br/>\r\n</p>'),
(14, 1, '<p>\r\nPelamos el trozo de <b>jengibre</b> y lo rallamos. Tenerlo congelado en    trozos, que se rallan de maravilla con un buen rallador como un Microplane.    Aunque en verano hay que hacerlo rápidamente, porque se descongela en un pispás.\r\n</p>'),
(14, 2, '<p>\r\nCubrimos el fondo de una sartén pequeña con <b>aceite</b> y calentamos a fuego suave.   <br/>   Agregamos el <b>comino</b> y el <b>jengibre</b> fresco, y le damos unas vueltas durante    30 segundos. Añadimos la <b>cúrcuma</b>, la <b>cayena</b> y el <b>zumo de limón</b>, y    lo cocemos suavemente un minuto.   <br/>      \r\n</p>'),
(14, 3, '<p>\r\nProbamos y rectificamos la sazón si fuera necesario. Dejamos que se enfríe.   <br/>      Cortamos la <b>sandía</b> en cubos, así como los <b>tomates</b>. Ponemos ambos    en una ensaladera y añadimos la <b>sal</b>, la <b>menta</b> cortada y el <b>zumo de lima</b>.   <br/>\r\n</p>'),
(15, 1, '<p>\r\nSe pican los plátanos en    cubitos pequeños. Al cocinarlos, requieren un poco más de atención y cuidado que cuando    se los cocina en tajadas.    <br/>   Se puede empezar cocinando el chorizo con un poco de <b>cebolla</b> picada, luego se guarda    el chorizo ya cocinado, y se cocinan los plátanos hasta que se doren, y y luego se vuelve a    agregar el chorizo. O también se pueden usar dos sartenes y cocinar ambos al mismo tiempo    para combinarlos al final.   <br/>\r\n</p>\r\n'),
(15, 2, '<p>\r\nSe usa chorizo fresco (sin curar) para esta receta de picadillo. Puede usar su marca de chorizo    favorita o la que venden fresca en los supermercados. Aquí en EEUU a veces también se encuentra    longaniza que tiene una textura perfecta para este picadillo. También es muy fácil preparar su    propia mezcla de chorizo con carne molida (de cerdo, res o una combinación) con achiote, pimentón,    ají o chile molido, ajo, etc.\r\n</p>'),
(15, 3, '<p>\r\nTambién se puede usar chorizo de pollo o chorizo vegetariano. Los    huevos se pueden cocinar directamente encima del picadillo o se los puede freír por separado.   <br/>\r\n</p>'),
(16, 1, '<p>\r\nPoner a ebullición 1.7 litros de agua con sal. Cuando empiece a hervir, echar la <b>pasta</b>    y dejarla 8 minutos. Mientras se calienta el agua, preparar la salsa.   <br/>   \r\n</p>'),
(16, 2, '<p>\r\nPara la salsa, poner en una sartén a fuego medio la <b>crema de calabaza</b>, el <b>vino blanco</b>,    las cucharadas de <b>parmesano</b>, la <b>sal</b> y las <b>especias</b>, llevar a ebullición hasta    que espese.   <br/>   Cuando la pasta esté hecha, escurrirla bien, añadirle un chorrito de <b>aceite de oliva</b> para    que no se pegue y remover, poner en un plato, añadir la salsa y espolvorear con un poco de queso    parmesano.    <br/>\r\n</p>'),
(17, 1, '<p>\r\nComenzamos forrando el molde con papel sulfurizado y pre-calentando el horno a 180ºC.    En un recipiente hondo batimos la <b>mantequilla</b> con el <b>azúcar</b>, agregamos la    <b>harina</b> tamizada el pellizco de <b>sal</b> y removemos hasta obtener una masa homogenea.    \r\n</p>'),
(17, 2, '<p>\r\nLa extendemos sobre la base del molde de manera uniforme y horneamos 15 minutos. Retiramos y    dejamos atemperar.   <br/>   Mientras tanto preparamos la cobertura. Para ello batimos los <b>huevos</b> con el <b>azúcar</b>,    agregamos la <b>harina</b> tamizada y mezclamos. Incorporamos el <b>zumo de naranja</b> y la    <b>ralladura</b> y removemos de nuevo. Vertemos la mezcla sobre la base de galleta atemperada    e introducimos de nuevo en el horno a 180ºC unos 20 minutos.   <br/>\r\n</p>'),
(17, 3, '<p>\r\nRetiramos del horno y dejamos enfriar por completo antes de cortar en porciones y espolvorear    con <b>azúcar glas</b> de forma generosa. Antes de servir aromatizamos los bocaditos con    <b>albahaca fresca</b> picada para darles un toque exótico y diferente.   <br/>\r\n</p>'),
(18, 1, '<p>\r\nComenzaremos precalentando el horno a 180 grados con calor arriba y abajo y posición    media de la rejilla. Engrasamos un molde cuadrado de 24 centímetros de lado.   <br/>   \r\n</p>'),
(18, 2, '<p>\r\nEn un bol mezclamos la <b>harina</b> con el <b>azúcar moreno</b>, añadimos la <b>mantequilla</b>    en dados y vamos haciendo unas migas con los dedos. Aplastamos estas migas en la base del molde    sin subirse a los laterales de manera uniforme y horneamos la base 15 minutos. Dejamos enfriar.   <br/>   \r\n</p>'),
(18, 3, '<p>\r\nMientras preparamos la <b>crema de limón</b>. Derretimos al microondas con cuidado de que no se    queme el <b>chocolate blanco</b> para postres, un minuto y medio a 500W será suficiente.   <br/>   En un cacito mezclamos los <b>huevos</b>, el <b>azúcar</b>, el <b>zumo de limón</b>,la    <b>ralladura</b> y el colorante alimentario si lo deseamos y hacemos cocer esta mezcla removiendo    si parar justo hasta que parezca que empieza a hervir y la crema haya espesado ligeramente.    Volvamos la crema sobre el chocolate blanco derretido y removemos con una espátula hasta    conseguir una crema lisa.   <br/>\r\n</p>'),
(18, 4, '<p>\r\nVolcamos esta crema encima de la base horneada y movemos ligeramente el molde para que quede nivelada.    La dejamos templar y después reservamos en la nevera un mínimo de tres horas hasta que endurezca.    Una vez sólida la cortamos en porciones con un cuchillo bien afilado. Servimos fría con azúcar    glas espolvoreado.   <br/>\r\n</p>'),
(19, 1, '<p>\r\nAbre los <b>panes de pita</b> por la mitad y ponlos en la bandeja de horno sobre papel    de hornear. Extiende una capa de salsa de <b>tomate</b> en el centro del pan de pita,    sin llegar a los bordes.   <br/>\r\n</p>'),
(19, 2, '<p>\r\nLamina el <b>queso mozzarella</b> y ponlo sobre el tomate. Espolvorea el <b>queso rallado</b>    por encima. Abre cada <b>huevo</b> y colócalo en la pizza.   Coloca alrededor del huevo el resto de los ingredientes: los <b>tomatitos cherry</b>, las    <b>salchichas</b> y las <b>aceitunas negras</b>, todo ello laminado.   <br/>   \r\n</p>'),
(19, 3, '<p>\r\nEspolvorea un poco de <b>sal</b> sobre el huevo. Espolvorea un poco de <b>orégano</b> sobre las pizzas.   Introduce en el horno a 180º, calor arriba y abajo durante unos 10-15 minutos, o hasta    que veas el queso fundido, y el huevo en su punto. En mi caso yo lo saco cuando la clara    del huevo está blanquita, pero dependerá de cómo te guste el huevo de cuajado.   <br/>\r\n</p>'),
(20, 1, '<p>\r\nPon a cocer agua en un cazo con una pizca de <b>sal</b>. Agrega un <b>huevo</b> y    cuécelo durante 10 minutos desde el momento en que el agua empiece a hervir.   <br/>   Pon el otro huevo en un vaso batidor, agrega el <b>zumo de limón</b>, una pizca de    <b>sal</b> y un buen chorro de <b>aceite</b>. \r\n</p>'),
(20, 2, '<p>\r\nLiga la mezcla con una batidora eléctrica.    Pica las <b>alcaparras</b> y los <b>pepinillos</b> y añádelos. Pela y pica el <b>huevo</b>    cocido y agrégalo. Espolvorea con <b>perejil</b> picado y mezcla bien. Reserva la salsa tártara.   <br/>   \r\n</p>'),
(20, 3, '<p>\r\nLimpia la <b>escarola</b>, seca, trocea y ponla en una fuente. Lava los <b>rabanitos</b>,    córtalos en gajitos y añádelos. Pela y pica el diente de <b>ajo</b> finamente y agrégalo    junto con las <b>aceitunas</b> troceadas. En el momento de servir, adereza con aceite, vinagre y sal.   <br/>   Limpia el <b>pescado</b> y saca los lomos. Salpimienta y cocínalos a la plancha.   <br/>   Sirve la dorada con la ensalada. Salsea y decora con una hojita de perejil.   <br/>\r\n</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RECETA`
--

CREATE TABLE `RECETA` (
  `IDRECETA` int(10) NOT NULL,
  `CATEGORIA` varchar(100) DEFAULT NULL,
  `IDUSUARIO` int(10) DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `CREACION` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `RECETA`
--

INSERT INTO `RECETA` (`IDRECETA`, `CATEGORIA`, `IDUSUARIO`, `NOMBRE`, `CREACION`) VALUES
(2, 'GRANOLA', 1, 'GRANOLA CASERA CON UVAS Y MIEL', '2021-04-13'),
(3, 'GRANOLA', 1, 'GRANOLA CASERA CON SIROPE DE ARCE', '2021-04-13'),
(4, 'GRANOLA', 1, 'GRANOLA CASERA CON DÁTILES', '2021-04-13'),
(5, 'LÁCTEOS', 1, 'BATIDO DE MELOCOTÓN', '2021-04-13'),
(6, 'LÁCTEOS', 1, 'BATIDO DE AGUACATE', '2021-04-13'),
(7, 'LÁCTEOS', 1, 'LASSI DE MANGO', '2021-04-13'),
(8, 'LÁCTEOS', 1, 'SMOOTHIE DE MANZANA Y PIÑA', '2021-04-13'),
(9, 'BIZCOCHOS', 1, 'TORTITAS', '2021-04-13'),
(10, 'BIZCOCHOS', 1, 'GORFES', '2021-04-13'),
(11, 'BIZCOCHOS', 1, 'BROWNIES CON NUECES', '2021-04-13'),
(12, 'ENTRANTES', 1, 'ENSALADA SUDANESA', '2021-04-13'),
(13, 'ENTRANTES', 1, 'ENSALADA DE SALMÓN Y AGUACATE', '2021-04-13'),
(14, 'ENTRANTES', 1, 'ENSALADA DE SANDÍA Y TOMATE', '2021-04-13'),
(15, 'PRINCIPALES', 1, 'PICADILLO DE CHORIZO Y PLÁTANO MADURO', '2021-04-13'),
(16, 'PRINCIPALES', 1, 'PASTA CON CALABAZA', '2021-04-13'),
(17, 'POSTRE', 1, 'BOCADITOS DE NARANJA Y ALBAHACA', '2021-04-13'),
(18, 'POSTRE', 1, 'BOCADITOS DE LIMÓN', '2021-04-13'),
(19, 'CARNE', 1, 'PIZZA DE PAN DE PITA', '2021-04-13'),
(20, 'PESCADO', 1, 'DORADA CON SALSA TÁRTARA', '2021-04-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `IDUSUARIO` int(10) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `CORREO` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROL_ADMIN` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`IDUSUARIO`, `NOMBRE`, `CORREO`, `PASSWORD`, `ROL_ADMIN`) VALUES
(1, 'Carla', 'sotes.126113@e.unavarra.es', 'e5suu8vd', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  ADD PRIMARY KEY (`NOMBRE`);

--
-- Indices de la tabla `FOTO`
--
ALTER TABLE `FOTO`
  ADD PRIMARY KEY (`IDFOTO`),
  ADD KEY `FK_RECETA` (`IDRECETA`);

--
-- Indices de la tabla `INGREDIENTES`
--
ALTER TABLE `INGREDIENTES`
  ADD KEY `FK_INGRERECETA` (`IDRECETA`);

--
-- Indices de la tabla `PASOS`
--
ALTER TABLE `PASOS`
  ADD KEY `FK_IDRECETA` (`IDRECETA`);

--
-- Indices de la tabla `RECETA`
--
ALTER TABLE `RECETA`
  ADD PRIMARY KEY (`IDRECETA`),
  ADD KEY `FK_USUARIO` (`IDUSUARIO`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`IDUSUARIO`),
  ADD UNIQUE KEY `CORREO` (`CORREO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `FOTO`
--
ALTER TABLE `FOTO`
  MODIFY `IDFOTO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `RECETA`
--
ALTER TABLE `RECETA`
  MODIFY `IDRECETA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `IDUSUARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `FOTO`
--
ALTER TABLE `FOTO`
  ADD CONSTRAINT `FK_RECETA` FOREIGN KEY (`IDRECETA`) REFERENCES `RECETA` (`IDRECETA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `INGREDIENTES`
--
ALTER TABLE `INGREDIENTES`
  ADD CONSTRAINT `FK_INGRERECETA` FOREIGN KEY (`IDRECETA`) REFERENCES `RECETA` (`IDRECETA`);

--
-- Filtros para la tabla `PASOS`
--
ALTER TABLE `PASOS`
  ADD CONSTRAINT `FK_IDRECETA` FOREIGN KEY (`IDRECETA`) REFERENCES `RECETA` (`IDRECETA`);

--
-- Filtros para la tabla `RECETA`
--
ALTER TABLE `RECETA`
  ADD CONSTRAINT `FK_CATEGORIA` FOREIGN KEY (`CATEGORIA`) REFERENCES `CATEGORIA` (`NOMBRE`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIO` FOREIGN KEY (`IDUSUARIO`) REFERENCES `USUARIO` (`IDUSUARIO`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
