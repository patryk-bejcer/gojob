-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Lis 2017, 21:36
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jobportal-db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `profile_description` varchar(600) NOT NULL,
  `establishment_date` date DEFAULT NULL,
  `company_website_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `company`
--

INSERT INTO `company` (`id`, `user_account_id`, `company_name`, `profile_description`, `establishment_date`, `company_website_url`) VALUES
(17, 77, 'TeamQuestx', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Nulla porttitor accumsan tincidunt. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', NULL, 'teamquest.co.uk'),
(18, 79, 'All Soft Companyx', 'Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt. ', NULL, 'www.allsoft.ru');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `job_post`
--

CREATE TABLE `job_post` (
  `id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `job_description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `job_province_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `job_post`
--

INSERT INTO `job_post` (`id`, `user_account_id`, `name`, `created_date`, `job_description`, `job_province_id`, `job_type_id`, `is_active`) VALUES
(46, 77, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2017-11-20 00:00:00', '<p>Vivamus magna justo acinia eget consectetur sed, convallis at tellus. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Pellentesque in ipsum id orci porta dapibus. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus suscipit tortor eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convall.</p>\r\n', 1, 2, 1),
(47, 77, 'Instalator Teleinformatyczny ', '2017-11-20 00:00:00', '<p>Witam,<br />\r\n<br />\r\nPoszukuję os&oacute;b z min. rocznym doświadczeniem w instalacjach teleinformatycznych (kable miedziane/światłowodowe) okablowania pionowego i poziomego lub absolwent&oacute;w kierunk&oacute;w skojarzonych z Telekomunikacją. Determinacja, zdolność szybkiego uczenia się, wysoka kultura osobista. Mile widziana własna działalność gospodarcza. Praca w młodym zespole.<br />\r\n<br />\r\nW ramach obowiązk&oacute;w jest wykonywanie indywidualnych podłączeń Abonenckich dla największego polskiego operatora usług Orange Polska S.A. w technologi FTTH.<br />\r\n<br />\r\nJestem w stanie zaoferować bardzo dobre warunki finansowe - praca akordowa (2500 - 8000+ netto), szkolenia wewnętrzne z zakresu instalacji optycznych jak r&oacute;wnież w firmach zewnętrznych w celu podniesienia kwalifikacji.<br />\r\n<br />\r\nElastyczny grafik.<br />\r\n<br />\r\nJeśli nie posiadasz doświadczenia z zakresu telekomunikacji jestem w stanie zaproponować mniejsze pieniądze w zależności od posiadanych umiejętności z zakresu budowlanki.<br />\r\n<br />\r\nDla os&oacute;b bez działalności gospodarczej oferuję Umowę Zlecenie ze wszystkimi świadczeniami.<br />\r\n<br />\r\nW ramach aplikacji proszę o przesłanie CV.<br />\r\n<br />\r\nZ g&oacute;ry zaznaczam, że odpowiem tylko do wybranych os&oacute;b.</p>\r\n', 13, 13, 1),
(48, 77, 'Recepcjonistka Rest Hotel ', '2017-11-20 00:00:00', '<p>REST HOTEL, zatrudnimy na stałe na stanowisku RECEPCJONISTKA. Nie wymagamy doświadczenia, oferujemy szkolenie stanowiskowe. Konieczna komunikatywna znajomość j. angielskiego.</p>\r\n', 7, 12, 1),
(49, 77, 'Technolog Odzieży ds Zaopatrzenia i Logistyki Produkcji', '2017-11-20 21:37:03', '<p>OPIS ZAKRESU OBOWIĄZK&Oacute;W:<br />\r\n<br />\r\nW zakresie Zaopatrzenia Produkcji :<br />\r\n1. Zamawianie materiał&oacute;w i akcesori&oacute;w (dodatk&oacute;w) niezbędnych do zapewnienia ciągłości produkcji w Polsce. Ustalanie cen na składniki do produkcji wyrob&oacute;w ( tkaniny , dodatki ) od dostawc&oacute;w polskich i zagranicznych<br />\r\n2. Wprowadzanie na stan magazynowy akcesori&oacute;w i materiał&oacute;w/tkanin do produkcji w Polsce<br />\r\n3. Inwentaryzacja dodatk&oacute;w i materiał&oacute;w/tkanin służących do produkcji w Polsce<br />\r\n4. Sporządzanie arkuszy kalkulacyjnych/kosztorysowych do nowych modeli/produkt&oacute;w (opcjonalnie) .<br />\r\n5. Czynny udział podczas tworzenia nowych modeli i częściowy nadz&oacute;r nad pozyskaniem do ich uszycia materiał&oacute;w oraz dodatk&oacute;w.<br />\r\n6. Sprawdzanie zgodności dostaw produkcyjnych z zatwierdzonymi wzorami.<br />\r\n<br />\r\nW zakresie Logistyki Produkcji :<br />\r\n1. Wydawanie lub zlecanie wydawania przez magazyn materiał&oacute;w i akcesori&oacute;w (dodatk&oacute;w krawieckich ) do poszczeg&oacute;lnych szwalni.<br />\r\n2. Przyjmowanie i rozliczanie powrotne materiał&oacute;w i akcesori&oacute;w (dodatk&oacute;w) z poszczeg&oacute;lnych szwalni po zakończeniu produkcji .<br />\r\n3. Zlecanie wykonywania haft&oacute;w, nadruk&oacute;w i innych operacji dodatkowych i skoordynowanie dostarczenia ich na czas do właściwych miejsc odbioru/szwalni (opcjonalnie z innym pracownikiem).<br />\r\n<br />\r\nWykonywanie, zgodnych z kodeksem pracy, poleceń Przełożonego .<br />\r\n<br />\r\nOFERUJEMY<br />\r\nZatrudnienie na podstawie umowy o pracę,<br />\r\nAtrakcyjne wynagrodzenie ,<br />\r\nNiezbędne narzędzia pracy,<br />\r\nRegularność i pewność wypłat,<br />\r\nCiekawą, zr&oacute;żnicowaną, gł&oacute;wnie biurową pracę, na samodzielnym stanowisku w 27-letniej firmie.<br />\r\nŚwiadczenia dodatkowe (wsp&oacute;łfinansujemy pakiet medyczny),<br />\r\nZniżki na nasze produkty.<br />\r\n<br />\r\nWYMAGANIA<br />\r\nZnajomość programu excel &ndash; b.dobra<br />\r\nUmiejętność logicznego myślenia, systematyczność oraz dobra organizacja pracy<br />\r\nZnajomość branży odzieżowej &ndash; nawet podstawowa<br />\r\nZnajomość komputera i jakiegoś programu mailowego<br />\r\nZnajomość jakiegoś programu magazynowego<br />\r\nKomunikatywność, umiejętność pracy w zespole i brak nałog&oacute;w<br />\r\nOdporność na stres i presję czasu<br />\r\nNiekaralność<br />\r\nWykształcenie: min. licencjat<br />\r\nDoświadczenie w pracy &ndash; min. 7 lat<br />\r\n&nbsp;</p>\r\n', 15, 1, 1),
(50, 79, 'Ratownik medyczny, detoks na wyjazdy', '2017-11-21 10:45:15', '<p>Firma specjalizująca się w detoksach alkoholowych i narkotykowych na wyjeździe nawiąże wsp&oacute;łpracę z ratownikiem medycznym&nbsp;<br />\r\n<br />\r\nWymagania:<br />\r\n-doświadczenie 5 lat w zawodzie&nbsp;<br />\r\n-znajomość zagadnień i charakteru detoksykacji<br />\r\n-samodzielność&nbsp;<br />\r\n-założona działalność gospodarcza lub gotowość do jej uruchomienia<br />\r\n-własne auto<br />\r\n-praca na terenie Wrocławia i okolic&nbsp;<br />\r\n<br />\r\nOferujemy:<br />\r\n-Atrakcyjne stawki<br />\r\n-Dowolne godziny pracy&nbsp;<br />\r\n<br />\r\nOsoby zainteresowane prosimy o przesłanie CV ze stosowną formują lub kontakt telefoniczny</p>\r\n', 15, 17, 1),
(51, 79, 'Praca dla terapeuty uzależnień', '2017-11-21 10:45:41', '<p>Prywatny ośrodek terapeutyczny poszukuje do wsp&oacute;łpracy psycholog&oacute;w i specjalist&oacute;w terapii uzależnień do poprowadzenia grupy terapeutycznej w zakresie uzależnień i terapii indywidualnej z pacjentami. Ośrodek znajduje się niedaleko lotniska im.L.Wałęsy. Więcej na stronie detoksvip kropka pl&nbsp;<br />\r\n<br />\r\nOferujemy:<br />\r\n- atrakcyjne warunki wynagrodzenia<br />\r\n- elastyczny czas pracy (możliwość dostosowania grafiku pracy do możliwości terapeuty)<br />\r\n- możliwość zdobycia nowych doświadczeń zawodowych<br />\r\n<br />\r\nOd kandydat&oacute;w oczekujemy:<br />\r\n<br />\r\nwymagania konieczne:<br />\r\n- wykształcenie wyższe (dyplom psychologa, socjologa lub pedagoga resocjalizacji)<br />\r\n- certyfikat terapeuty uzależnień (wydany przez PARPA lub Biuro do Spraw Narkomanii)<br />\r\n- co najmniej 5 lat doświadczenia zawodowego<br />\r\n- umiejętności pracy z grupą i pacjentem indywidualnym<br />\r\n- prowadzenie własnej działalności gospodarczej lub gotowość do jej założenia<br />\r\n- doświadczenia w pracy w zespole<br />\r\n- wysoka kultura osobista<br />\r\n<br />\r\nmile widziane:<br />\r\n- znajomość języka angielskiego w stopniu umożliwiającym prowadzenie terapii<br />\r\n- certyfikat psychoterapeuty wydany przez jedną z uznawanych szk&oacute;ł terapeutycznych (lub w trakcie certyfikacji)<br />\r\n- dodatkowe doświadczenia r&oacute;wnież w innych obszarach (praca z młodzieżą, praca psychoterapeutyczna z pacjentami z diagnozą nerwicy, depresji, zaburzeń osobowości, praca z rodziną)<br />\r\n- znajomość metod warsztatowych i treningowych potrzebnych do prowadzenia trening&oacute;w interpersonalnych, trening&oacute;w umiejętności społecznych i rozwoju osobistego, trening&oacute;w asertywności, warsztat&oacute;w dot. radzenia sobie ze stresem itp.)<br />\r\n- poczucie humoru, elastyczność, umiejętność pracy w stresie (w Ośrodku zawsze dużo się dzieje).<br />\r\n<br />\r\nZainteresowane osoby prosimy o nadsyłanie CV na adres e-mail: jchmielecki małpa ambumed kropka pl<br />\r\n<br />\r\nProsimy o umieszczeniu w CV klauzuli:<br />\r\nWyrażam zgodę na przetwarzanie moich danych osobowych zawartych w ofercie pracy dla potrzeb niezbędnych do procesu rekrutacji, zgodnie z ustawą z dnia 29 sierpnia 1997 r. o ochronie danych osobowych (t.j. Dz. U. z 2002 r. Nr 101, poz. 926 z p&oacute;źn. zm.)<br />\r\n<br />\r\nOśrodek zastrzega sobie prawo do skontaktowania się jedynie z wybranymi kandydatami. Kandydaci spełniający nasze oczekiwania zostaną zaproszeni na rozmowę kwalifikacyjną.</p>\r\n', 15, 17, 1),
(52, 79, 'Logopeda', '2017-11-21 10:46:12', '<p>Firma poszukuje logoped&oacute;w do wsp&oacute;łpracy przy realizacji projektu polegającego na udzielaniu wsparcia logopedycznego dzieciom z wrodzonymi wadami twarzy oraz ich opiekunom. Projekt jest realizowany przy wsp&oacute;łpracy UCSiMS w Poznaniu. Wsparcie będzie się odbywać w siedzibie UCSiMS w Poznaniu, ul. Bukowska 70. Od logoped&oacute;w wymaga się co najmniej 5-letniego doświadczenia zawodowego w prowadzeniu zajęć/ opiece logopedycznej po uzyskaniu dyplomu. Zainteresowane osoby prosimy o pilny kontakt.</p>\r\n', 14, 17, 1),
(53, 79, 'Optometrysta w SUNLOOX w Galerii Północnej/Warszawa', '2017-11-21 10:46:39', '<p>W związku z planowanym otwarciem salonu SunLoox w Galerii P&oacute;łnocnej poszukujemy pracownik&oacute;w na stanowisko: Optometrysta<br />\r\n<br />\r\nObowiązki:<br />\r\n- Przeprowadzanie badań wzroku &ndash; dob&oacute;r nowej korekcji, ocena widzenia bez lub w dotychczasowych okularach<br />\r\n- Ocena i badanie przedniego odcinka oka<br />\r\n- Dopasowanie soczewek kontaktowych<br />\r\n- Doradzanie rozwiązania korekcji w stosunku do oczekiwań Klienta &ndash; dobranie odpowiednich soczewek okularowych i kontaktowych<br />\r\n- Dob&oacute;r opraw okularowych itp.<br />\r\n<br />\r\nWymagania:<br />\r\n- Wykształcenie kierunkowe<br />\r\n- Wysoki poziom kultury osobistej<br />\r\n- Komunikatywność<br />\r\n- Zaangażowanie<br />\r\n- Uczciwość<br />\r\n- Zainteresowanie modą i aktualnymi trendami będzie dodatkowym atutem<br />\r\n<br />\r\nOferujemy:<br />\r\n- Ciekawą pracę o dużej samodzielności i r&oacute;żnorodności zadań<br />\r\n- Możliwość rozwoju wraz z firmą (ścieżka kariery aż do menadżera)<br />\r\n- Atrakcyjny pakiet wynagrodzenia i system motywacyjny powiązany z osiąganymi wynikami<br />\r\n- Oferujemy zakwaterowanie dla os&oacute;b spoza Warszawy<br />\r\n<br />\r\nProsimy o przesłanie CV ze zdjęciem.<br />\r\nZastrzegamy sobie prawo kontaktu tylko z wybranymi osobami.</p>\r\n', 7, 17, 1),
(54, 79, 'Sprzedawca na dziale mięsno-wędliniarskim', '2017-11-21 10:47:35', '<p>Bezpośredni i stabilny pracodawca sklep&oacute;w spożywczych sieci handlowej Lewiatan poszukujemy kandydat&oacute;w do pracy na stanowisko:&nbsp;<br />\r\nSPRZEDAWCA na dziale mięsnym w lokalizacji:<br />\r\n- os. Orła Białego 44a (dzielnica Rataje).<br />\r\nZakres obowiązk&oacute;w:<br />\r\n- profesjonalna obsługa klienta,<br />\r\n- dotowarowanie,<br />\r\n- dbanie o wygląd i ekspozycję asortymentu,<br />\r\n- dbanie o wizerunek stoiska.<br />\r\nWarunki wsp&oacute;łpracy:&nbsp;<br />\r\n- atrakcyjna stawka godzinowa,<br />\r\n- system premiowy kwartalny (premia uznaniowa),<br />\r\n- możliwość rozwoju poprzez szkolenia (4-dniowe szkolenie na stoisku przygotowujące do stanowiska płatne przez pracodawcę),<br />\r\n- przyjazną i miła atmosfera w młodym zespole,<br />\r\n- możliwość awansu wewnętrznego,<br />\r\n- możliwość dołączenia do ubezpieczenia grupowego,<br />\r\n- korzystny pakiet socjalny w formie paczek na święta, dodatkowo płatne inwentury sklep&oacute;w.<br />\r\nOd potencjalnych kandydat&oacute;w wymagamy:<br />\r\n- aktualnych badań sanepidowskich,<br />\r\n- uśmiechu i życzliwości w stosunku do klient&oacute;w i zespołu,&nbsp;<br />\r\n- dbania o czystość miejsca pracy,<br />\r\n- zaangażowania w powierzone obowiązki,&nbsp;<br />\r\n- mile widziane doświadczenie na takim samym stanowisku, ale nie jest to warunek konieczny, bo przeszkolimy Cię!<br />\r\nOdpowiemy na oferty z załączonym CV i zaprosimy na rozmowę kwalifikacyjną.</p>\r\n', 15, 14, 1),
(55, 60, 'Pracownik recepcji i rezerwacji hotel w centrum ', '2017-11-21 10:50:03', '<p>Poszukujemy:<br />\r\n<br />\r\nOsoby gościnnej i miłej, pełnej optymizmu w codziennej pracy<br />\r\nGotowej pracować w zespole podobnych, zaangażowanych ludzi<br />\r\nUmiejącej posługiwać się językiem angielskim w stopniu dobrym (dodatkowy język obcy będzie dodatkowym atutem)<br />\r\nZ ciekawą osobowością<br />\r\nPotrafiącej przekuwać swą pracę w pasję<br />\r\nDyspozycyjnej (praca zmianowa)<br />\r\n<br />\r\nTwoja misja:<br />\r\n<br />\r\nObsługa gości hotelowych w recepcji hotelu<br />\r\nObsługa klient&oacute;w hotelu, ich rezerwacji oraz płatności<br />\r\nOferowanie naszym gościom najwyższej jakości obsługi i komfortowego pobytu w naszym hotelu<br />\r\n<br />\r\nJeśli spełniasz nasze wymagania to z radością powitamy Cię w naszym zespole!<br />\r\n<br />\r\n<br />\r\nOferujemy:<br />\r\n<br />\r\nUmowę o pracę<br />\r\nInteresującą, dynamiczną pracę, pełną wyzwań<br />\r\nMożliwości rozwoju w ramach funkcjonującego systemu szkoleń i konkurs&oacute;w w ramach sieci hoteli należących do marek ACCOR<br />\r\nPakiet świadczeń socjalnych i opieki medycznej<br />\r\n<br />\r\nCzekamy na Twoje CV (ze zdjęciem i zgodą na przetwarzanie danych osobowych). Informujemy, że odpowiemy na zgłoszenia wybranych kandydat&oacute;w.</p>\r\n', 1, 12, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `job_province`
--

CREATE TABLE `job_province` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `job_province`
--

INSERT INTO `job_province` (`id`, `name`) VALUES
(1, 'dolnośląskie'),
(2, 'kujawsko-pomorskie'),
(3, 'lubelskie'),
(4, 'lubuskie'),
(5, 'łódzkie'),
(6, 'małopolskie'),
(7, 'mazowieckie'),
(8, 'opolskie'),
(9, 'podkarpackie'),
(10, 'podlaskie'),
(11, 'pomorskie'),
(12, 'śląskie'),
(13, 'świętokrzyskie'),
(14, 'warmińsko-mazurskie'),
(15, 'wielkopolskie'),
(16, 'zachodniopomorskie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `job_type`
--

INSERT INTO `job_type` (`id`, `name`) VALUES
(1, 'Administracja'),
(2, 'Architektura'),
(3, 'Bankowość'),
(4, 'Administracja biurowa'),
(5, 'Budowa / remonty'),
(6, 'Edukacja'),
(7, 'Finanse / księgowość'),
(8, 'Fryzjerstwo'),
(9, 'Kosmetyka'),
(10, 'Gastronomia'),
(11, 'HR'),
(12, 'Hotelarstwo'),
(13, 'IT / telekomunikacja'),
(14, 'Kasjer'),
(15, 'Ochrona'),
(16, 'Sprzątanie'),
(17, 'Zdrowie i opieka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seeker`
--

CREATE TABLE `seeker` (
  `id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `profile_description` text NOT NULL,
  `current_salary` int(11) NOT NULL,
  `currency` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `seeker`
--

INSERT INTO `seeker` (`id`, `user_account_id`, `first_name`, `last_name`, `profile_description`, `current_salary`, `currency`) VALUES
(33, 78, 'Mateusz', 'Bielak', '', 4000, 'PLN'),
(34, 80, 'Mateusz', 'bielak', '', 5999, 'PLN');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `user_image` varchar(500) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user_account`
--

INSERT INTO `user_account` (`id`, `user_type_id`, `email`, `password`, `date_of_birth`, `contact_number`, `user_image`, `registration_date`) VALUES
(60, 3, 'admin@gmail.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', '0000-00-00', '6967553431', '/images/logoo.png', '2017-11-07'),
(77, 2, 'teamquest@gmail.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', '2012-12-12', '+48 696 534 3333', 'uploads/users/firm_97778_f61704_big.jpg', '2017-11-20'),
(78, 1, 'mateusz@gmail.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', '1990-10-10', '696555555', '/images/logoo.png', '2017-11-20'),
(79, 2, 'allsoft@gmail.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', '2012-12-12', '7257775641', 'uploads/users/pobrane.png', '2017-11-21'),
(80, 1, 'Mateusztumatek@interia.pl', '827ccb0eea8a706c4c34a16891f84e7b', '1990-10-10', '222 333 444', '/images/logoo.png', '2017-11-22');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_favorite_job_post`
--

CREATE TABLE `user_favorite_job_post` (
  `id` int(11) NOT NULL,
  `user_account_id` int(11) NOT NULL,
  `job_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Zrzut danych tabeli `user_favorite_job_post`
--

INSERT INTO `user_favorite_job_post` (`id`, `user_account_id`, `job_post_id`) VALUES
(1, 1, 1),
(2, 78, 46),
(3, 60, 49),
(4, 78, 49),
(5, 78, 46),
(6, 78, 47),
(7, 78, 48),
(8, 80, 55),
(9, 80, 54);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user_type`
--

INSERT INTO `user_type` (`id`, `user_type_name`) VALUES
(1, 'seeker'),
(2, 'company'),
(3, 'admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_ibfk_1` (`user_account_id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_type_id` (`job_type_id`),
  ADD KEY `company_id` (`user_account_id`),
  ADD KEY `job_province_id` (`job_province_id`);

--
-- Indexes for table `job_province`
--
ALTER TABLE `job_province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seeker`
--
ALTER TABLE `seeker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_account_id` (`user_account_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_favorite_job_post`
--
ALTER TABLE `user_favorite_job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT dla tabeli `job_province`
--
ALTER TABLE `job_province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `seeker`
--
ALTER TABLE `seeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT dla tabeli `user_favorite_job_post`
--
ALTER TABLE `user_favorite_job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `job_post`
--
ALTER TABLE `job_post`
  ADD CONSTRAINT `job_post_ibfk_1` FOREIGN KEY (`job_type_id`) REFERENCES `job_type` (`id`),
  ADD CONSTRAINT `job_post_ibfk_3` FOREIGN KEY (`job_province_id`) REFERENCES `job_province` (`id`);

--
-- Ograniczenia dla tabeli `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
