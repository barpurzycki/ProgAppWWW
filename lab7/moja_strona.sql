-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 29, 2023 at 10:41 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'glowna', '<div id=\"header\">\r\n    <h1><i>Gry komputerowe</i></h1>\r\n    <h2><i>Moje hobby</i></h2>\r\n</div>\r\n<div id=\"content\">\r\n    <p>Witam Cię na stronie poświęconej mojemu hobby, czyli grom komputerowym.<br>\r\n    Z grami jestem związany już od najmłodszych lat, <br>\r\n    w których jako dzieciak \"grałem\" w takie tytuły jak Need For Speed: Most Wanted, Re-Volt czy Colin McRae Rally 2.0.<br>\r\n    Od tamtego czasu oczywiście dużo się zmieniło. Ja wydoroślałem, wiele razy zmieniał się mój gust,<br> \r\n    technologia się cały czas rozwija, a nowe produkcje jeszcze bardziej imponują z roku na rok.<br>\r\n    Pasja ta więc mimo, że trwa w moim życiu od bardzo młodego wieku, nigdy się nie wypaliła, <br>\r\n    zmieniają się jedynie tytuły, którymi jestem mniej lub bardziej zainteresowany.<br>\r\n    Postanowiłem na tej stronie zamieścić i opisać moje ulubione gry, <br>\r\n    które podczas mojej przygody z tym typem rozrywki zaciekawiły i chwyciły mnie za serce najbardziej.<br>\r\n    <b>Wybierz jeden z tytułów podanych na górze w menu, aby przeczytać moje przemyślenia, opinie, a także szczegółowe informacje na temat owych gier.</b></p><br>\r\n    <br>\r\n    <br>\r\n    <img src=\"Pictures/Main/colin.jpg\" alt=\"Colin McRae Rally 2.0\" width=\"275\" height=\"275\">\r\n    <img src=\"Pictures/Main/NFSMW.jpg\" alt=\"Need For Speed: Most Wanted\" width=\"275\" height=\"275\">\r\n    <img src=\"Pictures/Main/Revolt.jpg\" alt=\"Re-Volt\" width=\"275\" height=\"275\">\r\n</div>\r\n', 1),
(2, 'cyberpunk', '        <div id=\"header\">\r\n            <h1><i>Cyberpunk 2077</i></h1>\r\n        </div>\r\n        <div id=\"content\" style=\"font-size:30px;\">\r\n            <img src=\"./Pictures/Cyberpunk//cyberpunk.jpeg\" alt=\"Cyberpunk 2077\" width=\"400\" height=\"200\" style=\"float: left; margin:6px;\">\"Cyberpunk 2077\" to tytuł, który nie miał łatwo na premierę. Liczne błędy i bugi, \r\n            niezadowolenie graczy spowodowane słabą optymalizacją gry, a także tragicznie działające wersje konsolowe. \r\n            Na szczęście twórcy nie porzucili produkcji i wciąż regularnie naprawiali błędy, patchowali i rozwijali grę.\r\n            Po około dwóch latach prac w końcu wypuścili aktualizację, która, jak sami nazwali miała pokazać, jak gra miała wyglądać na premierę. \r\n            <img src=\"./Pictures/Cyberpunk/Johnny.jpg\" alt=\"Cyberpunk 2077 Johnny\" width=\"400\" height=\"200\" style=\"float: right; margin:6px;\">\r\n            Dodatkowo zakończyli pracę nad rozszerzeniem do gry o nazwie \"Widmo wolności\", które dodało dużą ilość kontentu, nową fabułę i wiele innych atrakcji. \r\n            Moim zdaniem jest to jedna z najlepszych gier akcji, w jakie grałem w życiu. \r\n            Dzieje się bardzo dużo, fabuła jest wciągająca, ścieżka dźwiękowa wpada w ucho od samego menu startowego, \r\n            oprawa graficzna jest oszałamiająca, jest także bardzo dużo możliwości rozwoju postaci, którą gramy. \r\n            Jako jedna z głównych postaci pojawia się Johnny Silverhand, którego gra sam uwielbiany przez fanów Keanu Reeves.\r\n            <img src=\"./Pictures/Cyberpunk/Nightcity.jpg\" alt=\"Night City\" width=\"400\" height=\"200\" style=\"float: left; margin:6px;\">\r\n            Uważam, że jest to tytuł, który warto sprawdzić, jeśli jest się fanem tego gatunku, ponieważ na prawdę warto. \r\n            Moim zdaniem jest to jedna z najlepszych i najbardziej wciągających gier, w jakie grałem.   \r\n        </div>\r\n', 1),
(3, 'finalfantasy', '        <div id=\"header\">\r\n            <h1><i>Final Fantasy 14</i></h1>\r\n        </div>\r\n        <div id=\"content\" style=\"font-size:30px;\">\r\n            <img src=\"./Pictures/FF14/ff14.jpg\" alt=\"Final Fantasy 14\" width=\"400\" height=\"200\" style=\"float: left; margin:6px;\">\r\n            Final Fantasy 14 Online to gra MMORPG, która istnieje na rynku od 2013 roku i w dalszym ciągu cały czas się rozwija. \r\n            Co prawda w Polsce nie jest to najpopularniejsza gra tego gatunku, ale dziennie posiada około 3 miliony aktywnych graczy z całego świata.\r\n            Gra jest cały czas wspierana i rozwijana, a także jest rozszerzana o kolejne dodatki, \r\n            które dodają dalszą część fabuły, nowe klasy postaci oraz lokacje, dzięki czemu świat gry jest obszerny i ciekawy. \r\n            <img src=\"./Pictures/FF14/ffcommjpg.jpg\" alt=\"FF Community\" width=\"400\" height=\"200\" style=\"float: right; margin:6px;\">\r\n            To, co wyróżnia Final Fantasy 14 na tle innych gier MMORPG jest bardzo przyjazna, pomocna i miła społeczność, która powoduje, \r\n            że chce się zostać przy tej produkcji na dłużej. Każdy gracz może grać w jaki sposób chce, gra niczego nie narzuca i na pewno każdy jest\r\n            w stanie znaleźć coś dla siebie. \r\n            <img src=\"./Pictures/FF14/FFfight.jpg\" alt=\"Final Fantasy 14 Fight\" width=\"400\" height=\"200\" style=\"float: left; margin:6px;\">\r\n            Jedynym większym minusem jest niestety miesięczny abonament, co niektórych może odrzucać. Moim zdaniem jednak\r\n            jest to gra, którą warto wypróbować. Osobiście nie żałuję, że postanowiłem ją sprawdzić i zostałem na dłużej.\r\n        </div>', 1),
(4, 'eldenring', '        <div id=\"header\">\r\n            <h1><i>Elden Ring</i></h1>\r\n        </div>\r\n        <div id=\"content\" style=\"font-size:30px;\">\r\n            <img src=\"./Pictures/ER/elden-ring.jpg\" alt=\"Elden Ring\" width=\"400\" height=\"200\" style=\"float: left; margin:6px;\">\r\n            Elden Ring to gra wywodząca się z mojego ulubionego gatunku gier, czyli souls-like. Jest to produkcja firmy FromSoftware, \r\n            która specjalizuje się w tym gatunku. Jest to tytuł, który był wyczekiwany przez ogromną liczbę graczy,a gdy gra otrzymała swój pierwszy trailer, \r\n            wszyscy byli zachwyceni i podekscytowani. \r\n            <img src=\"./Pictures/ER/eldencastle.jpg\" alt=\"Elden Ring Castle\" width=\"400\" height=\"200\" style=\"float: right; margin:6px;\">\r\n            Gra otrzymała wiele nagród, ale najważniejszą i najbardziej prestiżową jest nagroda \"Game of the Year\", \r\n            co uważam było zasłużone. Tytuł ten ma niesamowicie duży otwarty świat, który warto zwiedzić, gdyż w każdym miejscu na gracza czeka coś ciekawego i wymagającego.\r\n            Tak jak w każdej grze tego studia, wielką rolę odgrywają świetnie stworzone walki z bossami, a także genialny, przepiękny soundtrack.\r\n            Niestety przez swój dosyć wysoki próg wejścia dla nowego gracza tego gatunku, gra nie przypadnie do gustu każdemu. \r\n            <img src=\"./Pictures/ER/eldentree.jpg\" alt=\"Elden Ring Tree\" width=\"400\" height=\"200\" style=\"float: left; margin:6px;\">\r\n            Mi jednak ta produkcja przypomniała, dlaczego tak bardzo \r\n            uwielbiam dzieła studia FromSoftware, a po ukończeniu stała się moją ulubioną grą i zapadła mi w pamięci na bardzo długo. Osobiście bardzo polecam.\r\n        </div>', 1),
(5, 'darksouls', '        <div id=\"header\">\r\n            <h1><i>Dark Souls</i></h1>\r\n        </div>\r\n        <div id=\"content\" style=\"font-size:30px;\">\r\n            <img src=\"./Pictures/DarkSouls/DS3.jpg\" alt=\"Dark Souls 3\" width=\"200\" height=\"300\" style=\"float: left; margin:6px;\">\r\n            Tym razem nie jest mowa o jednej grze, a o mojej ulubionej serii gier, czyli Dark Souls. Tak samo jak za grę \"Elden Ring\", \r\n            za te arcydzieła jest odpowiedzialne studio FromSoftware. Gry te nie tylko nauczyły mnie wytrwałości i cierpliwości, \r\n            ale także całkowicie zmieniły mój gust i moje podejście do gier. \r\n            <img src=\"./Pictures/DarkSouls/DS2.jpg\" alt=\"Dark Souls 2\" width=\"200\" height=\"300\" style=\"float: right; margin:6px;\">\r\n            Świat, mimo, że nie jest całkowicie otwarty, \r\n            i tak jest rozbudowany, a jego klimat cały czas trzyma w napięciu. Walki z bossem to moim zdaniem główna atrakcja tych gier, \r\n            a zostały one wykonane na bardzo wysokim poziomie. Soundtrack jest świetny, idealnie oddaje klimat tych gier \r\n            i poszczególnych starć z przeciwnikami. Szczególnie głęboko w pamięci zapadła mi trzecia odsłona serii - \"Dark Souls 3\", \r\n            która to wprowadziła mnie w cały ten gatunek. \r\n            Fabuła jest bardzo wciągająca, godzinami można czytać przemyślenia graczy na jej temat. \r\n            <img src=\"./Pictures/DarkSouls/DS1.jpg\" alt=\"Dark Souls 1\" width=\"300\" height=\"200\" style=\"float: left; margin:6px;\">\r\n            Moim zdaniem jednak każda z części ma jakieś swoje indywidualne wady. Nie są to jednak tak wielkie minusy, przez które niewarto jest sprawdzić któreś z nich.\r\n            Uważam, że są to jedne z najlepszych gier w jakie kiedykolwiek grałem i polecam je każdemu, kto byłby zainteresowany tym gatunkiem gier.\r\n        </div>\r\n', 1),
(6, 'witcher', '        <div id=\"header\">\r\n            <h1><i>The Witcher 3</i></h1>\r\n        </div>\r\n        <div id=\"content\" style=\"font-size:30px;\">\r\n            <img src=\"./Pictures/TW3/W3cover.jpg\" alt=\"The Witcher 3\" width=\"150\" height=\"250\" style=\"float: left; margin:6px;\">\r\n            The Witcher 3 to znana już wszystkim produkcja firmy CD Projekt Red. Można powiedzieć, że była to moja pierwsza gra fabularna. \r\n            Oczywiście się nie zawiodłem. Historia pochłonęła mnie całego, a postać Geralta natychmiastowo stała się moją jedną z ulubionych postaci fikcyjnych.\r\n            <img src=\"./Pictures/TW3/wildhunt.jpg\" alt=\"Wild Hunt\" width=\"300\" height=\"200\" style=\"float: right; margin:6px;\">\r\n            Genialny dubbing, wciągająca fabuła, duży, rozbudowany otwarty świat, i świetny soundtrack \r\n            - to wszystko uczyniło tę grę tak znanym i lubianym na całym świecie. Tytuł ten, mimo swoich lat nadal wygląda pięknie i nadal jest to jedna z najlepszych gier \r\n            RPG na rynku. Ciężko jest się do czegokolwiek przyczepić w tej produkcji, wszystko zostało doszlifowane i dopięte na ostatni guzik. \r\n            <img src=\"./Pictures/TW3/TheWitcher.jpg\" alt=\"Wiedźmin 3 krajobraz\" width=\"300\" height=\"200\" style=\"float: left; margin:6px;\">\r\n            Gra mimo świetnej podstawki ma również jeszcze do zaoferowania dwa genialne dodatki - \"Serce z Kamienia\" i \"Krew i Wino\", \r\n            co daje nam razem ponad 100 godzin wciągającej i powalającej rozgrywki. Jest to tytuł, który każdy, kto lubi grać w gry powinien wypróbować. \r\n            Uważam, że jest to jedna z najlepszych gier na rynku, którą ciężko będzie pobić w najbliższym latach.   \r\n        </div>\r\n', 1),
(7, 'kontakt', '        <div id=\"header\">\r\n            <h1><i>Kontakt</i></h1>\r\n            <h2><i>Wyślij wiadomość e-mail</i></h2>\r\n        </div>\r\n        <div id=\"content\">\r\n            <h2>Skontaktuj się z nami!</h2>\r\n            <form action=\"mailto:164422@student.uwm.edu.pl\" method=\"post\" enctype=\"text/plain\">\r\n                <dt>Imię i Nazwisko</dt>\r\n                <dd><input type=\"text\" name=\"imienazw\"></dd>\r\n                <dt>E-mail</dt>\r\n                <dd><input type=\"email\" name=\"email\"></dd>\r\n                <dt>Wiadomość</dt>\r\n                <dd><textarea name=\"wiadomosc\"></textarea></dd>\r\n                <input type=\"submit\" value=\"Wyślij\">\r\n                <input type=\"reset\" value=\"Wyczyść\">\r\n            </form>\r\n        </div>', 1),
(8, 'filmy', '\r\n    <div id=\"header\">\r\n        <h1><i>Filmy</i></h1>\r\n    </div>\r\n    <div id=\"content\">\r\n        <br>\r\n        <br>\r\n        <br>\r\n        <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/E3Huy2cdih0?si=nFtDqS94YDpcFqz3\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n        <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/UgYoKVUPD8Y?si=CiNsy0Fsca_RAVfo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n        <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_zDZYrIUgKE?si=S-a_augxmdWSh94u\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n    </div>\r\n', 1);


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `haslo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `email`, `haslo`) VALUES
(1, '164422@student.uwm.edu.pl', 'Pass123');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
