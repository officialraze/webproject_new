-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 17. Mai 2019 um 19:27
-- Server-Version: 5.6.34-log
-- PHP-Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `artists`
--
DROP DATABASE IF EXISTS `artists`;
CREATE DATABASE IF NOT EXISTS `artists` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `artists`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(15) DEFAULT NULL,
  `genre` varchar(18) DEFAULT NULL,
  `age` varchar(9) DEFAULT NULL,
  `popular_song` varchar(21) DEFAULT NULL,
  `listeners` varchar(10) DEFAULT NULL,
  `images` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `artist`
--

INSERT INTO `artist` (`id`, `artist_name`, `genre`, `age`, `popular_song`, `listeners`, `images`) VALUES
(1, 'Porter Robinson', 'Electronic / Dance', '26', 'Shelter', '1,426,369', 'porterrobinson'),
(2, 'Virtual Riot', 'Dubstep', '24', 'Warriors Of The Night', '696.437', 'virtualriot'),
(3, 'Panda Eyes', 'Dubstep', '22', 'Highscore', '275.751', 'pandaeyes'),
(4, 'Skrillex', 'Dubstep', '30', 'Where Are Ü Now', '12,252,003', 'skrillex'),
(5, 'Diplo', 'Electronic / Dance', '39', 'Thunderclouds', '23,300,164', 'diplo'),
(6, 'Haywyre', 'Electronic / Dance', '26', 'Do You Don\'t You', '160.633', 'haywyre'),
(7, 'Barely Alive', 'Dubstep', '25', 'Bad Thang', '405.123', 'barelyalive'),
(8, 'Marshmello', 'Future Bass', '-', 'Friends', '31,637,993', 'marshmello'),
(9, 'Tokyo Machine', 'Electronic / Dance', '-', 'Rock it', '172.91', 'tokyomachine'),
(10, 'Slushii', 'Future Bass', '21', 'There x2', '1,690,097', 'slushii'),
(11, 'Fox Stevenson', 'Dubstep', '26', 'Bulgogi', '621.019', 'foxstevenson'),
(12, 'Avicii', 'Electronic / Dance', '28 (Tod)', 'Wake Me Up', '21,255,137', 'avicii'),
(13, 'Madeon', 'Electronic / Dance', '24', 'Shelter', '1,240,586', 'madeon'),
(14, 'Excision', 'Dubstep', '32', 'Gold (Stupid Love)', '1,139,508', 'excision'),
(15, 'Ray Volpe', 'Dubstep', '21', 'Hunt Me Down', '150.9', 'rayvolpe'),
(16, 'Eliminate', 'Dubstep', '-', 'Snake Bite - VIP', '75.59', 'eliminate'),
(17, 'San Holo', 'Future Bass', '27', 'Light', '3,612,017', 'sanholo'),
(18, 'Raze.Exe', 'Future Bass', '18', 'Coffee', '11', 'razeexe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `description`
--

CREATE TABLE IF NOT EXISTS `description` (
  `artist_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `quote` text,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `description`
--

INSERT INTO `description` (`artist_id`, `description`, `quote`, `url`) VALUES
(1, 'Nachdem er bei YAWA Recordings als Ekowraith seine erste Single, „Booming Track“, veröffentlichte, wechselte er zu den Labels Glamara Records und Big Fish Recordings und produzierte Musik unter seinem echten Namen. Seine erste Veröffentlichung bei diesen Labels war „Say My Name“, welche in den Beatport-Electro-House-Charts Platz eins erreichen konnte. 2011 unterschrieb er einen Vertrag bei Skrillexs Plattenlabel OWSLA. Es erschien daraufhin seine erste EP Spitfire, an welcher er laut eigenen Angaben fünf bis sechs Monate arbeitete. Sie konnte Platz eins der iTunes-Dance-Charts und Platz eins der Beatport-Charts erreichen.\r\n\r\nNach sechs kommerziell wenig erfolgreichen veröffentlichten Singles 2010 erschien 2012 seine siebte, „Language“, die bei den Labels Ministry Of Sound und Big Beat Records erschien. Diese konnte neben Platz eins der Beatport- und der iTunes-Dance-Charts auch Platz neun der britischen Charts sowie Platz drei der britischen Dance-Charts erreichen und wurde damit Robinsons erster Top-10-Hit.\r\n\r\n2016 kündigte er an, gemeinsam mit seinem DJ-Kollegen und Freund Madeon auf Tour gehen wird. Diese trägt den Namen „Shelter-Tour“. Shelter ist auch der Titel ihrer ersten gemeinsamen Single. Shelter lässt sich in den Bereich des zu der Zeit sehr beliebten Future-Bass einordnen. Das Musikvideo stammt vom japanischen Animationsstudio A-1 Pictures.\r\n\r\nRemixe produzierte er unter anderem für Yolanda Be Cools und DCUPs „We No Speak Americano“, Aviciis „Seek Bromance“ und Lady Gagas „The Edge of Glory“.', 'Is anyone there?', ''),
(2, '<p>Brunn has had numerous Beatport chart hits including \"One For All, All For One\" with Razihel and \"Cali Born\" with Helicopter Showdown. Other electronic music outlets, such as Your EDM, have called his music \"non-traditional\" and \"edgy\", comparing him to artists like Savant. Prior to producing under the alias \"Virtual Riot\", Brunn produced ambient dubstep and future garage music under another alias, Your Personal Tranquilizer. Brunn has released several EPs under Disciple Records, including his charted EP, Chemistry.</p>', '<p>We need more washing machines.</p>', ''),
(3, 'Oskar Steinbeck, bekannt unter seinem Künstlernamen Panda Eyes, ist ein Schweizer Komponist, Plattenproduzent und DJ aus Zürich, Schweiz.', 'Ja min bueb', ''),
(4, 'Sonny Moore wuchs im Nordosten von Los Angeles auf. 2004, im Alter von 16 Jahren, kam er über MySpace in Kontakt mit Matt Good von der Band From First to Last und wollte dort Gitarre spielen. Nachdem die anderen Bandmitglieder und einige Studioproduzenten ihn singen hörten, wurde er jedoch zum Leadsänger der Band gemacht. Im Juni 2004 veröffentlichten sie ihr Debütalbum Dear Diary, My Teen Angst Has a Body Count bei Epitaph Records. Die Band hatte mehrere erfolgreiche Tourneen und veröffentlichte im März 2006 ihr zweites Album Heroine. Schließlich bekam Sonny Stimmprobleme und unterzog sich erfolgreich einem chirurgischen Eingriff. Am 27. Februar 2007 verkündete er dennoch, dass er die Band verlassen würde, um sich einer Solokarriere zu widmen.\n\nErst veröffentlichte er einige Demos auf seiner MySpace-Seite und nach einigen Monaten ging er mit Team Sleep auf Tournee. Im Februar 2008 verkündete das Alternative Press Magazine die zweite jährliche AP-Tournee mit All Time Low, The Rocket Summer, The Matches, Forever the Sickest Kids und Sonny Moore. Während der Tournee umfasste Sonnys Besetzung Sean Friday am Schlagzeug, Christopher Null als Gitarrist und Aaron Rother am Keyboard.\n\n2008 begann Sonny auch Musik zu produzieren und hatte unter dem Pseudonym Skrillex Auftritte in verschiedenen Clubs in der Region um Los Angeles. Am 7. April 2009 erschien mit Gypsyhook EP seine erste Extended Play mit drei Songs und vier Remixen. Diese wurde unter seinem Vornamen Sonny veröffentlicht. Er ging erneut mit verschiedenen Bands auf Tournee und trat im April 2009 mit der Band Hollywood Undead als Sonny and the Blood Monkeys auf.\n\nSeine erste Produktion unter dem Namen Skrillex veröffentlichte er am 7. Juni 2010 mit der EP My Name Is Skrillex, die er als freien Download zur Verfügung stellte. Im Sommer 2010 arbeitete er mit der Metalcore-Band Bring Me the Horizon an deren drittem Studioalbum There Is a Hell, Believe Me I’ve Seen It. There Is a Heaven, Let’s Keep It a Secret. Schließlich wurde er von Deadmau5 auf dessen Musiklabel mau5trap Recordings unter Vertrag genommen und veröffentlichte auf diesem seine zweite EP Scary Monsters and Nice Sprites.\n\nIm April 2011 veröffentlichte die Band Korn den Song Get Up!, den Skrillex produzierte. Der Song wurde auf ihrer Facebook-Seite als freier Download zur Verfügung gestellt. Am 15. April 2011 kam Korn außerdem auf die Bühne während dessen Set am Coachella-Musikfestival 2011 und hatte einen kurzen Auftritt.\n\nAugust 2011 gründete Skrillex sein Plattenlabel OWSLA. Im September 2011 veröffentlichte Skrillex den Titelsong für die Neuauflage des Computerspiels Syndicate. 2011 konnte sich Skrillex auch erstmals in der Wahl der Top 100 DJs von DJ Mag platzieren und kam auf Platz 19. Es war der höchste Neueinstieg in die Liste in jenem Jahr. Im November 2011 wurde er fünfmal für den Grammy Award nominiert, darunter „Bester neuer Künstler“ und „Bestes Musikvideo“, von denen er im Februar 2012 drei gewonnen hat („Beste Dance-Aufnahme“, „Bestes Electronic/Dance-Album“ und „Beste Remix-Aufnahme“). Beim Sound of 2012 der BBC belegte er als prominentester der 15 Kandidaten Platz 4. Auch bei den Grammy-Verleihungen 2013 wurde Skrillex für die „Beste Dance-Aufnahme“ und das „Beste Electronic/Dance-Album“ ausgezeichnet.\n\nVon 2011 bis Oktober 2012 war Sonny Moore mit der britischen Singer-Songwriterin Ellie Goulding liiert.\n\nSein Album Recess erschien am 14. März 2014 in Deutschland.\n\nAm 5. August 2016 erschien die Single Purple Lamborghini mit dem amerikanischen Rapper Rick Ross. Die Single ist der Soundtrack des amerikanischen Actionfilms Suicide Squad.\n\nAm 15. Januar 2017 erschien die Single Make War, die er zusammen mit der Band From First to Last aufgenommen hatte (Sonny ist der ehemalige Leadsänger der Band und der Song erschien an seinem Geburtstag). Die Single wurde unter seinem Label OWSLA veröffentlicht.\n\nAußerdem erschienen 2017 die Single Would You Ever mit Poo Bear und Skrillex\' Remix von Kendrick Lamars Single Humble.', 'Bangarang', ''),
(5, 'Thomas Wesley Pentz (* 10. November 1978 in Tupelo, Mississippi) ist ein US-amerikanischer Musiker und DJ im Bereich der elektronischen Musik, des Hip-Hops sowie des Baile Funks, der unter dem Künstlernamen Diplo sein erstes Album bei Big Dada Recordings im Jahr 2004 veröffentlicht hat. Weitere Pseudonyme von ihm sind Diplodocus, Wes Gully und Wes Diplo, zudem ist er durch die Musikprojekte Major Lazer und Jack Ü bekannt.', 'Earthquake', ''),
(6, 'Haywyre ist das Pseudonym von Martin Vogt (* 8. August 1992 in Lafayette, Indiana), einem Electro-Musikproduzent aus Minneapolis, Minnesota. Als Pianist, der an klassischer Musik und Jazz interessiert war, kreierte er schon früh eine individuelle Mischung aus verschiedenen Genres.\n\nEr selber sagt, dass die Zeit, in der er für unbestimmte Zeit in Österreich war, sehr bedeutend für ihn gewesen sei. Dort bekam er als kleines Kind seinen ersten Klavierunterricht und fing mit dem Klavierspielen an. Es war wirkungsvoll, in einem Land vieler großer Komponisten das Musikinstrument Klavier erlernen zu können – nicht nur im kompositorischen Sinn, so Vogt.\n\nSeine ersten Alben Lotus (2009) und Of Mellows And Revelations (2010) besitzen fast ausschließlich Oldschool Hip-Hop- bzw. Jazz-Elemente, während seine neueren Alben (neben dem Jazz und Hip-Hop) ebenso dem House und Dubstep zugewiesen werden können. Es ist durchaus nicht einfach, seine Musik einem festen Genre zuzuordnen. Ein sehr typisches Element seiner neueren Releases ist die Anwendung eines Vocoders, der einen Synthesizer anhand einer singenden Stimme moduliert.\n\nSein neustes Album Two Fold Pt. 2 wurde im Februar 2016 veröffentlicht und kann als Fortsetzung des Albums Two Fold Pt. 1 angesehen werden, welches zwei Jahre zuvor über die Plattenfirma Monstercat veröffentlicht wurde.\n\nDerzeit hat Haywyre einen Vertrag bei den Plattenfirmen Monstercat und GruntWorthy. Ebenso erhielt er bereits Unterstützung von vielen anerkannten Elektro-Produzenten, wie etwa Zedd, Gramatik und Mat Zo.', 'Tell me what\'s on your mind', ''),
(7, 'Barely Alive is a Massachusetts-based EDM duo whose sound combines dubstep, trap, and drum\'n\'bass influences together. The duo began producing tracks in 2013, including digital singles on Dirty Duck Audio and Adapted Records, as well as remixes for Getter, Virtual Riot, Astronaut, and others. Barely Alive signed to Disciple Recordings in 2014, releasing the four-song EP, \"Lost In The Internet\" early in the year. The release was an immediate success on dance music retail site, Beatport (where the duo were eventually named the second best-selling dubstep artist of 2014), and they began touring the U.S and Europe along with artists such as Datsik and Trolley Snatcha. Numerous singles and EPs followed, including collaborations with Zomboy and Splitbreed, and the duo\'s full-length debut album, \"We Are Barely Alive\", surfaced on Disciple in October of 2015. Since then, the duo released their OWSLA debut single, \"Back To Back\", a remix to SKisM\'s \"Experts\", and their remix album, \"We Are Barely Alive: The Remixes\". Their experimental Hip-Hop/Rap & Dubstep track \"Salty\" was released later in the year, many remixes came after including some for DJ Snake, Herobust, Henry Fong, and Mayhem & Antiserum. Their OWSLA debut EP, \"Domain EP\", was released in early February of 2017. In late July, Disciple released a teaser for the duo\'s second album, \"Odyssey\", which was released on August 13th, 2018.\n', 'Devil\'s Tower', ''),
(8, 'Marshmellos Identität wurde von ihm selbst bisher nicht bestätigt. Bei seinen Auftritten, in seinen Musikvideos sowie auch in seinen sozialen Netzwerken versteckt er seine Identität unter einer Maske. Die Maske des Kostüms besteht aus einem zylinderförmigen Helm, auf dem ein Smiley-Gesicht zu sehen ist und ist an die Süßigkeit Marshmallow angelehnt, was ausschlaggebend für sein Pseudonym ist. Aufgrund der Maskierung war er lange Zeit grundlegend anonym.\n\nEs wurde bereits früh davon ausgegangen, dass hinter dem Pseudonym der US-amerikanische DJ und Produzent Chris Comstock, auch bekannt als Dotcom, steckt. Als Argumente dafür wurden genannt, dass sie wohl denselben Vornamen, Geburtstag sowie die gleichen Tattoos besäßen. Zuletzt stellte Produzent Feed Me ein Video auf Instagram hoch, in dem er Marshmellos Helm trägt, während Chris Comstock mit der Kamera versehentlich kurz auf einen Spiegel hält. Zu der Anonymität sagte Marshmello selber: „Just enjoy the music, don’t worry about me“, zu Deutsch „Genießt einfach die Musik, macht euch keine Gedanken um mich.“\n\nIm November 2017 stellte die schottische Zeitschrift Forbes die Identität Marshmellos als Fakt dar. Hier wurde neben den bereits bekannten Argumenten auch preisgegeben, dass der bürgerliche Name sowohl bei ASCAP und der BMI, als auch dem Unternehmensregister des Bundesstaates Delaware hinterlegt war.', 'Keep It Mello', ''),
(9, 'Tokyo Machine is a Bass House artist on Monstercat. His debut to the label was on July 22nd, 2016 with his track \"PARTY\", which was featured on Monstercat 028 - Uproar. Although the main genre he focuses in is Bass House, he breaks into other genres for certain parts of his song, mostly to give his sound a different vibe.\n\nTokyo Machine\'s identity is officially unknown. Tokyo Machine wears a mask that has a zig-zag pattern in white and glasses on his face that have caret (^) icons on to cover his identity. They are seen wearing it both on stage at events and in the artworks of their songs.\n\nTokyo Machine is the only artist on the label to have more than one song featured on the same alias within a Rocket League x Monstercat compilation, with his songs \"ROCK IT\" and \"FLY\". His most streamed song (as of October 2018) on Spotify is \"ROCK IT\", with his debut \"PARTY\" not too far behind at 2 million.', 'Fight', ''),
(10, 'Slushii veröffentlichte ab 2013 erste Remixe auf SoundCloud, seit 2016 veröffentlicht er eigene Tracks und geht als DJ auf Tour. Im August 2017 erschien sein Debütalbum Out of Light. Er absolvierte einige große Festivalauftritte, darunter Tomorrowland, Ultra, EDC, Pukkelpop und RFM Somnii.', 'Twinbow', ''),
(11, 'Stevenson\'s interest in electronic music production began in the early 2000s, when he made his first release on the website Newgrounds. He was 15–16 years old when he created his first vocal track. He later rose to prominence through the YouTube-based music community Liquicity, where Cloudhead, one of his earliest tracks as Stan SB, was featured.\n\nHis works are also published to the audio distribution platform SoundCloud, where he has accumulated over 1.5 million plays since 2012. In 2013, he released an EP titled Endless, the title track of which has since gained over 500,000 plays on SoundCloud.\n\nIn 2014, he announced the launch of his own record label, Cloudhead Records, under which he released an EP titled All This Time in the same year. In July 2014, Stevenson released Throwdown, an EP accompanied by a live online premiere.\n\nIn August 2015, he released a collaboration on Spinnin\' Records with UK EDM artist Curbi, titled Hoohah.[10][11] He signed with Disciple Recordings in March 2016 and in April 2016 released his first EP on the label, No Fox Given. On 12 September 2016, Fox Stevenson released a single titled Rocket on Disciple for the Alliance, Vol. 3 EP.', 'Out of my mind', ''),
(12, 'Tim Bergling wurde 1989 in Stockholm als Sohn des 1945 geborenen Managers Klas Bergling und der Schauspielerin Anki Lidén geboren. Sein Halbbruder ist der 1977 geborene Musiker und Schauspieler Anton Körberg, ein Sohn von Tommy Körberg.\n\nDa sein bürgerlicher Name auf Myspace schon vergeben war, wählte Bergling Avicii als Künstlernamen. Der Name leitet sich von Avici ab, der tiefsten Ebene der buddhistischen Unterwelt.', 'Hey Brother', ''),
(13, 'Leclercq begann im Alter von 11 Jahren, Musik zu komponieren - damals noch unter dem Namen DJ Deamon, ein Anagramm des heutigen Künstlernamens Madeon. Die ersten offiziellen Releases unter diesem Namen waren 2008 ein Remix zum Song „Wake Up“ von Sun Kidz sowie die Eigenproduktion „Still Loving You“. Beide Produktionen sind dem elektronischen Genre Hands Up zuzuordnet. Später folgte der Genre-Wechsel und die Umbenennung in Madeon.\n\nNachdem Leclercq 2010 einen Wettbewerb gewonnen hatte, bei dem er \"The Island\" von Pendulum remixte, begann er in den folgenden Jahren weitere Tracks von Künstlern im Genre Electronic zu remixen. Internationale Bekanntheit erlangte er durch ein Video zu seinem Mash-Up Pop Culture, das er im Juli 2011 auf Youtube hochlud. In diesem Mash-Up verwendete er 39 Songs, die er mit einem Novation Launchpad zusammenmixte. Das Video gewann sehr schnell an Popularität und erreichte innerhalb weniger Monate über 7 Millionen Aufrufe (Stand Oktober 2018: über 47 Millionen).\n\nSeinen ersten Live-Auftritt hatte Leclercq im April 2011 in Paris, wo er als Vorprogramm für Yelle auftrat. Während der Show verwendet er neben seinen Launchpads auch Novation\'s SL MKII, FL Studio und Ableton Live. Leclercq wurde mehrmals in Pete Tongs Radioshow \"15 Minutes of Fame\" auf BBC Radio 1 präsentiert. Seine Debütsingle Icarus sowie sein Remix von Deadmau5s \"Raise Your Weapon\" wurden in dieser Show das erste Mal in voller Länge abgespielt. Seine erste Liveaufnahme war für Pete Tongs BBC Radio 1 Galaevent in Hull am 27. Januar 2012, wo er ein 20-minütiges Konzert gab. Eine Debüt-EP war bereits für Ende 2011 angekündigt worden, wurde jedoch zugunsten mehrerer Singles abgesagt. Seine erste Single Icarus, wurde am 24. Februar 2012 durch sein eigenes Label \"popculture\" veröffentlicht. Am 11. November war er auf den MTV Europe Music Awards 2012 in Frankfurt am Main an der Show als DJ beteiligt. Er legte in der Zeit auf, in der im TV die Werbung ausgestrahlt wurde und war auch an diversen weiteren Stellen in den Verlauf der Show mit eingebunden.\n\nAls ein Zeichen seines schnellen internationalen Erfolges wurde er eingeladen, auf drei der bedeutendsten amerikanischen Festivals aufzutreten. Dem Ultra Music Festival in Miami, Coachella in Kalifornien und dem Electric Daisy Carnival in New York. Weiterhin wurde er auch auf viele weitere Festivals im Vereinigten Königreich eingeladen, um so zum Beispiel neben Swedish House Mafia auf dem \"Milton Keynes Bowl\" zu spielen. Icarus war in der US-Version von You Can Dance im Mai 2012 zu hören. Als seine größten Einflüsse nennt Leclercq The Beatles und Daft Punk.\n\n2016 kündigte er an, gemeinsam mit seinem DJ-Kollegen und Freund Porter Robinson auf Tour gehen wird. Diese trägt den Namen „Shelter-Tour“. Shelter ist auch der Titel ihrer ersten gemeinsamen Single. Shelter lässt sich in den Bereich des zu der Zeit sehr beliebten Future-Bass einordnen.', 'Shelter', ''),
(14, 'Excision begann im Jahr 2004, elektronische Musik zu produzieren und als DJ aufzutreten. 2007 gründete er sein eigenes Label „Rottun Recordings“ und veröffentlichte bei diesem seine erste Single „No Escape“. 2009 bot Pendulum ihm dann an, einen Remix für ihr Lied Showdown zu produzieren.\n\nAm 12. September 2011 wurde Excisions erstes Album „X Rated“ publiziert. Etwa ein Jahr später veröffentlichte er auch ein Album, welches ausschließlich Remixe der auf „X Rated“ enthaltenen Lieder enthält. Beide Alben wurden von den Medien überwiegend positiv aufgenommen.\n\n2012 gründete er zusammen mit Downlink und KJ Sawka, dem ehemaligen Schlagzeuger von Pendulum, die Band Destroid. Sie veröffentlichen unter diesem Namen keine Tonträger, sondern treten ausschließlich live auf.\n\n2015 war er Feature-Gast auf Tech N9nes Album Special Effects.', 'Throw your elbows', ''),
(15, 'Wonderchild Ray Volpe has been making a splash in the heavy dance music community. With compositions ranging from 100 all the way up to 175 bpm, this kid is tearing the scene apart piece by piece. He’s been on the rise since starting back in 2010. Not bound to one style, he’s constantly trying out new things and growing with each song. Most famous for his bootleg remix of Macklemore’s “Thrift Shop,” Ray has gained a massive following which grows by the day. Stay close to Ray Volpe, as his destruction is only the beginning.\n\n', 'Programmed to love', ''),
(16, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Found A Way', ''),
(17, 'Van Dijck schloss sein Studium in Musikproduktion am Rotterdams Conservatorium 2012 ab.\n\nAb 2013 veröffentlichte er seine Musik unter dem Pseudonym San Holo und erregte erste Aufmerksamkeit, als er von Heroic Recordings unter Vertrag gestellt wurde. Seine erste EP, Cosmos, wurde am 18. September 2014 veröffentlicht und erreichte die Top 100 der Elektronik-Charts bei iTunes.\n\nSeit September 2014 befindet er sich in einer rechtlichen Auseinandersetzung mit Walt Disney Pictures. Ihm wird vorgeworfen, sein Künstlername San Holo ähnele zu sehr dem des \"Han Solo\" aus der „Krieg der Sterne“-Reihe.\n\nEr veröffentlichte diverse Singles und Remixe bei Spinnin’ Records, Monstercat, OWSLA und in seinem eigenem Label Bitbird.\n\nAm 20. September 2018 erschien sein erstes Album mit dem Titel album1.', 'Light', ''),
(18, '', 'You go me on the cookie', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `events`
--

INSERT INTO `events` (`id`, `artist_id`, `title`, `start_date`) VALUES
(1, 12, 'Avicii - Open Air', '30-05-2019'),
(2, 1, 'Second Sky Festival', '05-06-2019'),
(3, 2, 'Rampage Las Vegas', '19-06-2019'),
(4, 3, 'Rampage Las Vegas', '19-06-2019'),
(5, 4, 'Rampage Las Vegas', '17-05-2019'),
(6, 5, 'Ultra Festival', '22-05-2019'),
(7, 6, 'Lost Lands', '16-07-2019'),
(8, 7, 'Lost Lands', '16-07-2019'),
(9, 8, 'Lost Lands', '16-07-2019'),
(10, 9, 'Tokyo Festival', '29-07-2019'),
(11, 10, 'Tokyo Festival', '29-07-2019'),
(12, 11, 'Rampage Las Vegas', '29-07-2019'),
(13, 13, 'Second Sky Festival', '30-05-2019'),
(14, 14, 'Excision and the headbangers', '02-07-2019'),
(15, 15, 'Excision and the headbangers', '02-07-2019'),
(16, 16, 'Lost Lands', '16-07-2019'),
(17, 17, 'Bitbird Tour', '06-06-2019'),
(18, 18, 'Scala', '25-07-2019');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales` int(11) NOT NULL,
  `plays` int(11) NOT NULL,
  `listeners` int(11) NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `stats`
--

INSERT INTO `stats` (`artist_id`, `sales`, `plays`, `listeners`) VALUES
(1, 883, 220700, 124000),
(2, 398, 99500, 55000),
(3, 208, 52000, 23000),
(4, 9200, 2300000, 1350000),
(5, 23080, 5770000, 3710000),
(6, 145, 35900, 18100),
(7, 158, 39400, 25500),
(8, 40000, 10000000, 4900000),
(9, 124, 31000, 16000),
(10, 1500, 370000, 238000),
(11, 258, 64400, 37500),
(12, 14000, 3500000, 1800000),
(13, 645, 161000, 100000),
(14, 832, 208000, 102000),
(15, 66, 16600, 11400),
(16, 90, 22500, 18800),
(17, 1827, 456800, 255000),
(18, 1, 348, 340);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vorname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `passwort`, `vorname`, `nachname`, `created_at`, `updated_at`) VALUES
(1, 'porterrobinson@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Porter', 'Robinson', '2019-01-30 15:42:15', NULL),
(2, 'virtualriot@gmail.com', '$2y$10$ZmbB6qQ.DDwblflZ2NFWZOSee4XPH39Gz9JCwze9xnirgmjqO40S6', 'Virtual', 'Riot', '2019-02-12 19:04:05', NULL),
(3, 'pandaeyes@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Panda', 'Eyes', '2019-02-12 19:10:45', NULL),
(4, 'skrillex@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Skrillex', '', '2019-02-12 19:11:23', NULL),
(5, 'diplo@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Diplo', '', '2019-02-12 19:12:23', NULL),
(6, 'haywyre@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Haywyre', '', '2019-02-12 19:12:23', NULL),
(7, 'barelyalive@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Barely', 'Alive', '2019-02-12 19:13:10', NULL),
(8, 'marshmello@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Marshmello', '', '2019-02-12 19:13:10', NULL),
(9, 'tokyomachine@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Tokyo', 'Machine', '2019-02-12 19:15:25', NULL),
(10, 'slushii@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Slushii', '', '2019-02-12 19:15:25', NULL),
(11, 'foxstevenson@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Fox', 'Stevenson', '2019-02-12 19:15:25', NULL),
(12, 'avicii@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Avicii', '', '2019-02-12 19:15:25', NULL),
(13, 'madeon@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Madeon', '', '2019-02-12 19:15:25', NULL),
(14, 'excision@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Excision', '', '2019-02-12 19:17:28', NULL),
(15, 'rayvolpe@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Ray', 'Volpe', '2019-02-12 19:17:28', NULL),
(16, 'eliminate@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Eliminate', '', '2019-02-12 19:17:28', NULL),
(17, 'sanholo@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'San', 'Holo', '2019-02-12 19:17:28', NULL),
(18, 'razeexe@gmail.com', '$2y$10$ESNZsqKD5ZcHsOavuszy9.K7gTnlZF/yKynzxjPkpetOkMxrBPoCW', 'Raze.Exe', '', '2019-02-12 19:17:28', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
