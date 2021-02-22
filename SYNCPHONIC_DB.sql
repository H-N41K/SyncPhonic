-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql102.byetcluster.com
-- Generation Time: Dec 27, 2018 at 04:39 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_22852216_syncphonic`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'Seven', 1, 1, 'assets/images/artwork/MartinGarrixSeven.jpg'),
(2, 'Singles', 1, 3, 'assets/images/artwork/44721236928854.jpg'),
(3, 'A State Of Trance 2018', 3, 6, 'assets/images/artwork/asot2018.jpg'),
(4, 'Hardwell & Friends EP 1', 4, 3, 'assets/images/artwork/hardwellf1.jpg'),
(5, 'Hardwell & Friends EP 2', 4, 3, 'assets/images/artwork/hardwellf2.jpg'),
(6, 'Hardwell & Friends EP 3', 4, 3, 'assets/images/artwork/hardwellf3.jpg'),
(7, '7', 7, 10, 'assets/images/artwork/16019788811977.jpg'),
(8, 'Stories', 26, 10, 'assets/images/artwork/avicii-stories.jpg'),
(9, 'Mainstage Madness', 14, 4, 'assets/images/artwork/wandwmainstage.jpg'),
(10, 'Joytime', 10, 8, 'assets/images/artwork/31563234417985.jpg'),
(11, 'Year Of The Dragon', 75, 6, 'assets/images/artwork/1067241374014.jpg'),
(12, 'Hexagon', 11, 3, 'assets/images/artwork/28191138826421.jpg'),
(13, 'Sunrise', 51, 7, 'assets/images/artwork/9866946726904.jpg'),
(14, 'Se7en', 42, 10, 'assets/images/artwork/324522500531970.jpg'),
(15, 'Music Is The Weapon', 38, 9, 'assets/images/artwork/13262683125180.jpg'),
(16, '2 Aliens', 84, 8, 'assets/images/artwork/296001109717182.jpg'),
(17, 'Faded EP', 17, 5, 'assets/images/artwork/242882191316478.jpg'),
(18, 'Jackin Da Bass', 32, 4, 'assets/images/artwork/1307581627793.jpg'),
(19, 'We Are', 19, 6, 'assets/images/artwork/23899107447889.jpg'),
(20, 'Memories', 6, 9, 'assets/images/artwork/156081377718486.1000x1000x1-1491860216-640x640'),
(21, 'Bylaw EP', 1, 1, 'assets/images/artwork/81551992718489928701333434889.png');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `imageUrl` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `imageUrl` (`imageUrl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `description`, `imageUrl`) VALUES
(1, 'Martin Garrix', 'Martijn Gerard Garritsen ,known professionally as Martin Garrix  is a Dutch DJ, record producer and musician from Amstelveen. He was ranked number one on DJ Mag''s Top 100 DJs list for 2016 and 2017. He has performed at various music festivals such as Coachella, Ultra Music Festival, Tomorrowland and Creamfields and was announced as a resident DJ at HÃ¯ Ibiza in 2017 and the resident DJ at UshuaÃ¯a Ibiza in 2016 and 2018. He founded the label STMPD RCRDS in 2016, months after leaving Spinnin'' Records and before signing with Sony Music. Garrix also writes tracks for other artists, and despite this, only one in fifty of his tracks have made it out to the public.', 'assets/images/artists/20632356911159112596302304288.jpg'),
(2, 'Dimitri Vegas & Like Mike', 'Dimitri Vegas & Like Mike is a Belgian DJ and record producer duo, composed of brothers Dimitri Thivaios and Michael Thivaios. They are ranked No. 1 in 2015 and are ranked No. 2 on DJ Mag''s 2014, 2016 and 2017 Top 100 DJs list.They are both of Greek origin.', 'assets/images/artists/104411940615087.jpg'),
(3, 'Armin van Buuren', 'Armin van Buuren , born 25 December 1976), is a Dutch DJ, record producer and remixer from South Holland. Since 2001, he has hosted the A State of Trance radio show, which is broadcast to more than 37 million weekly listeners in 84 countries on over 100 FM radio stations. According to Djs And Festivals, "the radio show propelled him to stardom and helped cultivate an interest in trance music around the world." Van Buuren has won a number of accolades. He has been ranked the number one DJ by DJ Mag a record of five times, four years in a row.He was ranked fourth on the DJ Mag Top 100 DJs list in 2015 and 2016, and third in 2017.', 'assets/images/artists/841831871840.jpg'),
(4, 'Hardwell', 'Robbert van de Corput (born 7 January 1988), better known by his stage name Hardwell, is a Dutch electro house DJ, record producer and remixer from Breda, the Netherlands. Hardwell was voted the World''s No. 1 DJ on DJ Mag in 2013, and again in 2014. He is ranked at No. 4 on DJ Mag Top 100 DJs 2017 poll. Hardwell is best known for his sets at music festivals, including Ultra Music Festival, Sunburn and Tomorrowland. Hardwell first gained recognition in 2009 for his bootleg of "Show Me Love vs. Be". He founded the record label Revealed Recordings in 2010 and a radio show and podcast Hardwell On Air in 2011. He has released eight compilation albums through his label, as well as a documentary film. His debut studio album, United We Are, was released in 2015.', 'assets/images/artists/21402135151192.jpg'),
(5, 'Tiesto', 'Tijs Michiel Verwest  (born 17 January 1969), better known by his stage name TiÃ«sto , is a Dutch DJ and record producer from Breda. He was named "the Greatest DJ of All Time" by Mix magazine in a poll voted by the fans. In 2013, he was voted by DJ Magazine readers as the "best DJ of the last 20 years". He is also regarded as the "Godfather of EDM" by many sources. In 1997, he founded the label Black Hole Recordings with Arny Bink, where he released the Magik and In Search of Sunrise CD series. TiÃ«sto met producer Dennis Waakop Reijers in 1998; the two have worked together extensively since then.', 'assets/images/artists/44612089820019.jpg'),
(6, 'Chainsmokers', 'The Chainsmokers are an American DJ and production duo consisting of Alex Pall and Andrew Taggart. The EDM-pop duo achieved a breakthrough with their 2014 song "#Selfie", which was a top twenty single in several countries. Their debut EP, Bouquet was released in October 2015 and featured the single "Roses", which reached the top 10 on the US Billboard Hot 100. "Don''t Let Me Down" became their first top 5 single there and won the Grammy Award for Best Dance Recording at the 59th awards ceremony.', 'assets/images/artists/6652218122234.jpg'),
(7, 'David Guetta', 'Pierre David Guetta (born 7 November 1967) is a French DJ, songwriter, record producer and remixer who has sold over nine million albums and thirty million singles worldwide. In 2011, Guetta was voted as the number one DJ in the DJ Mag Top 100 DJs poll. In 2013, Billboard crowned "When Love Takes Over" as the number one dance-pop collaboration of all time.', 'assets/images/artists/2180215731906.jpg'),
(8, 'Afrojack', 'Nick van de Wall (born 9 September 1987), better known by his stage name Afrojack, is a Dutch DJ, record producer and remixer from Spijkenisse. In 2007, he founded the record label Wall Recordings; his debut album Forget the World was released in 2014. Afrojack regularly features as one of the ten best artists in the Top 100 DJs published by DJ Mag. He is also the CEO of LDH Europe.', 'assets/images/artists/244892692631951.jpg'),
(9, 'Steve Aoki', 'Steven Hiroyuki Aoki ( born November 30, 1977) is an American electro house musician, record producer, DJ, and music executive.In 2012, Pollstar designated Aoki as the highest grossing dance artist in North America from tours. He has collaborated with artists such as will.i.am, Afrojack, LMFAO, Linkin Park, Iggy Azalea, Lil Jon, Laidback Luke, BTS, Louis Tomlinson, Rise Against, Vini Vici and Fall Out Boy and is known for his remixes of artists such as Kid Cudi. Aoki has released several Billboard-charting studio albums as well, notably Wonderland, which was nominated for Grammy Award for Best Dance/Electronica Album in 2013. ', 'assets/images/artists/74751048015977.jpg'),
(10, 'Marshmello', 'Christopher Comstock (born May 19, 1992), known professionally as Marshmello, is an American electronic dance music producer and DJ. He first gained international recognition by remixing songs by Jack Ãœ and Zedd, and later collaborated with artists including Omar LinX, Slushii, Jauz, Ookay, Khalid, Selena Gomez, Anne-Marie, Lil Peep, Logic, and Bastille.', 'assets/images/artists/58992301610241.jpg'),
(11, 'Don Diablo', 'Don Pepijn Schipper (born 27 February 1980), better known by his stage name Don Diablo, is a Dutch DJ, record producer, musician and singer-songwriter of electronic dance music from Coevorden. He is known for his electronic style of production and vocalizing in most of his songs. He was ranked 11th in the Top 100 DJs â€“ 2017 list by DJ Mag. He was also ranked the number one Future House Artist of the Year on Beatport in 2016.', 'assets/images/artists/262041981327194.jpg'),
(12, 'KSHMR', 'Niles Hollowell-Dhar (born 6 October 1988), better known by his stage name KSHMR (pronounced "Kashmir"; stylized as KSHMÐ¯), is an American musician, record producer and DJ from Berkeley, California. He was ranked at 23rd on DJ Mag''s 2015 Top 100 DJs and was awarded "The Highest New Entry". His place elevated to 12th in the Top 100 DJs of 2016 and kept the same spot in 2017. In July 2017, he launched his own label, "Dharma Worldwide".', 'assets/images/artists/279341894325548.jpg'),
(13, 'Oliver Heldens', 'Olivier J. L. Heldens (born 1 February 1995), better known by his stage name Oliver Heldens, is a Dutch DJ and electronic music producer from Rotterdam. His 2013 song "Gecko" caught the attention of fellow Dutch DJ TiÃ«sto, who signed him to his label, Musical Freedom, and released the track with vocals from British singer Becky Hill on 23 June 2014. Heldens also has a weekly podcast titled Heldeep Radio, which has been ongoing for over 2 years.', 'assets/images/artists/13.jpg'),
(14, 'W&W', 'W&W is a Dutch DJ and record producer duo composed of Willem van Hanegem and Wardt van der Harst. They began their careers by producing trance music, before venturing into electro house and big room house. After producing trance for five years, W&W founded their own record label called Mainstage Music, and became active in the big room house and progressive house scene. This was followed by the release of their commercial breakthrough "Bigfoot" in 2014. In 2017, they returned to their original trance style with the NWYR (pronounced "new year") project.', 'assets/images/artists/1702637511412.jpg'),
(15, 'Calvin Harris', 'Adam Richard Wiles (born 17 January 1984), known professionally as Calvin Harris, is a Scottish DJ, singer, songwriter, and record producer. His debut studio album I Created Disco was released in June 2007, and it spawned two UK top 10 singles "Acceptable in the 80s" and "The Girls". In 2009, Harris released his second studio album, Ready for the Weekend, which debuted at number one on the UK Albums Chart and was later certified gold by the BPI. Its lead single, "I''m Not Alone", became his first song to top the UK Singles Chart.', 'assets/images/artists/15202237726094.jpg'),
(16, 'Skrillex', 'Sonny John Moore (born January 15, 1988), known professionally as Skrillex, is an American electronic dance music producer, DJ, singer, songwriter and musician. Growing up in Northeast Los Angeles and in Northern California, he joined the American post-hardcore band From First to Last as the lead singer in 2004, and recorded two studio albums with the band (Dear Diary, My Teen Angst Has a Body Count, 2004, and Heroine, 2006) before leaving to pursue a solo career in 2007. He began his first tour as a solo artist in late 2007. After recruiting a new band lineup, Moore joined the Alternative Press Tour to support bands such as All Time Low and The Rocket Summer, and appeared on the cover of Alternative Press'' annual "100 Bands You Need to Know" issue.', 'assets/images/artists/5414177677956.jpg'),
(17, 'Alan Walker', 'Alan Olav Walker (born 24 August 1997), formerly known by his stage name DJ Walkzz, is a Norwegian-British record producer and DJ. He is best known for his 2015 single "Faded", which received platinum certifications in over 10 different countries. He is ranked 17th on DJ Mag''s Top 100 DJs list of 2017, placing 38 positions higher than the previous year.', 'assets/images/artists/166222292725628.jpg'),
(18, 'R3HAB', 'Fadil El Ghoul (born 2 April 1986), better known by his stage name R3hab (pronounced "rehab"), is a Dutch DJ, record producer and remixer of Moroccan origin from Breda. Alongside Afrojack and Chuckie, he is one of the proponents of the modern Dutch house subgenre. During the 2012 WMC in Miami, United States, R3hab won the IDMA Best Breakthrough Artist Award.', 'assets/images/artists/22037156581819.jpg'),
(19, 'Dash Berlin', 'Dash Berlin is a Dutch electronic music group started in 2007 in The Hague by Jeffrey Sutorius, Eelke Kalberg and Sebastiaan Molijn. The frontman of the group was Jeffrey Sutorius, the tenth most popular DJ in the world according to DJ Mag in 2013; Kalberg and Molijn are record producers. Sutorius initially started playing drums influenced by his late father who was a drummer in a jazz band, before discovering electronic music. He worked at BPM Dance and Mid-Town Records specializing in vinyl, with both stores becoming meeting places for many established Dutch DJ''s. Molijn and Kalberg, who were deejaying as Pronti and Kalmani at the time, have credited Sutorius as a vital source of inspiration for some of their biggest records during that time.', 'assets/images/artists/19.jpg'),
(20, 'Axwell /\\ Ingrosso', 'Axwell & Ingrosso (stylised as Axwell Î› Ingrosso) is a Swedish DJ duo consisting of Swedish House Mafia members Axwell and Sebastian Ingrosso. They made their debut performance at the 2014 Governors Ball Music Festival in New York City in June.', 'assets/images/artists/225653225032683.jpg'),
(21, 'DVBBS', 'DVBBS (pronounced "dubs") are a Canadian EDM duo formed in 2012, composed of brothers Chris Chronicles (born Christopher van den Hoef, January 1, 1990) and Alex Andre (born Alexandre van den Hoef, October 17, 1991).', 'assets/images/artists/21.jpg'),
(22, 'DJ Snake', 'DJ Snake is a Grammy-nominated producer and artist who debuted into the international scene with singles "Bird Machine" and "Turn Down for What" in 2013. "Bird Machine" is a collaboration with fellow French musician Alesia. The single was picked up by Mad Decent, a Los Angeles-based record label run by Diplo, and released in February 2013. In June 2013, DJ Snake was invited by Diplo to do a live mix on his radio show, "Diplo & Friends", which airs on BBC Radio 1. DJ Snake was announced to be working on a collaboration with Diplo, originally slated to debut in 2014; it eventually released in 2015 as the single "Lean On" in collaboration with MÃ˜ and Diplo''s Major Lazer.', 'assets/images/artists/22.jpg'),
(23, 'Kygo', 'Kyrre GÃ¸rvell-Dahll (born 11 September 1991), better known by his stage name Kygo (Norwegian: [ËˆkyËÉ¡uË]), is a Norwegian DJ, record producer, musician, and songwriter. He garnered international attention with his remix of the track "I See Fire" by Ed Sheeran, which has received over 55 million plays on SoundCloud and 65 million views on YouTube and his single "Firestone" which has over 500 million views on YouTube with an additional 560 million plays on the music streaming service Spotify, as of August 2017. Kygo has accumulated over 2.5 billion views on his music on SoundCloud and YouTube.', 'assets/images/artists/23.jpg'),
(24, 'Diplo', 'Thomas Wesley Pentz (born November 10, 1978), better known by his stage name Diplo, is an American DJ and record producer based in Los Angeles, California. He is the co-creator and lead member of the electronic dancehall music project Major Lazer, and along with producer and DJ Skrillex, part of the electronic duo Jack Ãœ. He founded and manages record company Mad Decent, as well as co-founding the non-profit organization Heaps Decent. Among other jobs, he has worked as a school teacher in Philadelphia. His 2013 EP, Revolution, debuted at number 68 on the US Billboard 200. The EPâ€™s title track was later featured in a commercial for Hyundai and is featured on the WWE 2K16 soundtrack.', 'assets/images/artists/24.jpg'),
(25, 'Lost Frequencies', 'Felix De Laet (born 30 November 1993), known by his stage name Lost Frequencies, is a Belgian DJ and record producer. He is best known for his singles "Are You with Me" in 2014 and "Reality" in 2015.', 'assets/images/artists/25.jpg'),
(26, 'AVICII', '	Tim Bergling (8 September 1989 â€“ 20 April 2018), better known by his stage name Avicii , was a Swedish musician, DJ, remixer and record producer. At 16, Bergling began posting his remixes on electronic music forums, which led to his first record deal. He rose to prominence in 2011 with his single "Levels". His debut studio album, True (2013), blended electronic music with elements of multiple genres and received generally positive reviews. It peaked in the top ten in more than fifteen countries and topped international dance charts; the lead single, "Wake Me Up", topped most music markets in Europe and reached number four in the United States.', 'assets/images/artists/14649633711999468365886892505.jpg'),
(27, 'ZEDD', 'Anton Zaslavski (born 2 September 1989), known professionally as Zedd (/ËˆzÉ›d/; derived from the first letter of his surname), is a Russian-German record producer, DJ, multi-instrumentalist and songwriter. He primarily produces and performs electro house music,but has diversified his genre and musical style, drawing influences from progressive house, dubstep, and classical music.', 'assets/images/artists/27.jpg'),
(28, 'Quintino', 'Quinten van den Berg (born September 21, 1985), known professionally as Quintino, is a Dutch DJ and record producer. Notable releases include a remix of "Rap das Armas", "Selecta", "Go Hard" and "Fatality". In 2014 he was named No. 86 in the Top 100 DJs list put out by DJ Magazine.', 'assets/images/artists/28.jpg'),
(29, 'VINAI', 'VINAI is an EDM production and Italian DJ duo, formed in 2011 consisting of brothers Alessandro Vinai (born 25 January 1990) and Andrea Vinai (born 10 January 1994).', 'assets/images/artists/29.jpg'),
(30, 'Headhunterz', 'Willem Rebergen (born 12 September 1985), better known by his stage name Headhunterz, is a Dutch DJ and record producer. He also is a voice actor, dubbing for several movies and TV series. He began his career in 2005, working in hardstyle music. He has performed at Qlimax, Defqon.1, Q-Base, inQontrol, Decibel and Hard Bass and has performed at electronic music festivals including Electric Daisy Carnival and Tomorrowland.', 'assets/images/artists/30.jpg'),
(31, 'Eric Prydz', 'Eric Sheridan Prydz (/ËˆprÉªdz/; born 19 July 1976), also known by his aliases Pryda (/ËˆpraÉªdÉ™/) and Cirez D (/ËˆsaÉªrÉ›z/) (among a number of others), is a Swedish DJ, record producer, and musician. He rose to fame with his 2004 hit single "Call on Me", and saw continued chart success with "Proper Education" in 2007, and "Pjanoo" in 2008. In 2016, he released his debut studio album, Opus. In 2017, he won DJ of the Year at the Electronic Music Awards and was also nominated for Live Act of the Year.', 'assets/images/artists/31.jpg'),
(32, 'Bassjackers', 'Bassjackers is a Dutch electronic music production and DJ duo consisting of Marlon Flohr & Ralph van Hilst. Flohr is the more outspoken member of the duo whereas Van Hilst takes care of ''behind-the-scenes'' production. The pair''s Electro House tracks, including "Savior", "Crackin" and "Wave Your Hands", reached the ''Beatport top 100''. They are best known for their 2013 the single, "Crackin". They rank at 35th on DJ Mag''s Top 100 DJs of 2017. Bassjackers have released their tracks on labels Spinnin'' Records, Revealed Recordings and Smash The House.', 'assets/images/artists/32.jpg'),
(33, 'Blasterjaxx', 'Blasterjaxx is a Dutch DJ and record producer duo composed of Thom Jongkind (born 1990) and Idir Makhlaf (born 1992). The duo originated in The Hague and has been active since 2010. They mainly produce big room house and electro house music.', 'assets/images/artists/33.jpg'),
(34, 'Alesso', 'Alessandro Lindblad (Born 7 July 1991),  commonly known by his stage name Alesso, is a Swedish DJ, record producer and musician. Alesso is managed by John Shahidi of Shots Studios. He has worked with numerous artists, including Tove Lo, Theo Hutchcraft, Ryan Tedder, Hailee Steinfeld, Calvin Harris, Usher, David Guetta and Sebastian Ingrosso. He has performed at numerous music festivals, including Coachella, Electric Daisy Carnival, ', 'assets/images/artists/34.jpg'),
(35, 'Ummet Ozcan', 'Ummet Ozcan (Turkish: Ãœmmet Ã–zcan, IPA: [ymËˆmet Ã¸zËˆdÊ’an]; born 16 August 1982) is a Dutch-Turkish DJ and record producer from Putten, Gelderland. His releases signed to Spinnin'' Records are supported by DJs like Sander van Doorn, Armin van Buuren, TiÃ«sto, Calvin Harris and Hardwell. Ozcan is also known for his softsynth and soundbank design for well established music software houses like Rob Papen (Albino, Predator) and for hardware units such as the Access Virus.', 'assets/images/artists/35.jpg'),
(36, 'NERVO', 'Nervo (stylised as NERVO) are an Australian DJ duo comprising twin sisters Miriam and Olivia Nervo. After signing with Sony/ATV Music Publishing at 18 years of age, the sisters pursued careers as songwriting partners and in 2008 they signed with Fredrik Olsson and his Swedish music publishing company Razor Boy Music Publishing, which led to co-writing the Grammy Award-winning single, "When Love Takes Over", performed by David Guetta and Kelly Rowland. Nervo have been described as the world''s highest paid women DJs.', 'assets/images/artists/36.jpg'),
(37, 'Timmy Trumpet', 'Timothy Jude Smith (born in Sydney, 9 June 1982) better known by his stage name, Timmy Trumpet is an Australian DJ and producer. He has become known internationally for his jazz elements in the realm of global dance music. Now as a combined DJ/instrumentalist, Timmy Trumpet is ranked in the top 3 DJs in Australia (ITM Poll), performed at Ibiza''s Pacha and Miami''s WMC, and mixed both Ministry of Sound and Pacha albums. Signed to Ministry of Sound, three of his singles have reached the No. 1 spot on the ARIA Club chart.', 'assets/images/artists/37.jpg'),
(38, 'Major Lazer', 'Major Lazer is an American electronic dance music trio, which includes record producer Diplo, and DJs Jillionaire and Walshy Fire. It was founded in 2008 by Diplo and Switch, with Switch leaving after three years in 2011. He was then replaced by both Jillionaire and Walshy Fire. Its music spans numerous genres, mixing reggae with dancehall, reggaeton, soca, house and moombahton.', 'assets/images/artists/38.jpg'),
(39, 'Tom Swoon', 'Dorian Tomasiak (born 6 June 1993), known professionally as Tom Swoon (and previously as Pixel Cheese), is a Polish DJ and record producer. Tom Swoon used to host Lift Off Radio on Electro City on Dash Radio. He debuted in the DJ Mag''s 2017 Top 100 DJs voting poll as No. 47.', 'assets/images/artists/39.jpg'),
(40, 'KURA', 'RÃºben de Almeida (born August 21, 1987) better known as KURA is a Portuguese electro house music DJ and producer. Kura has released tracks through labels such as Hardwell''s Revealed Recordings, Ferry Corsten''s Flashover Recordings, MYNCâ€™s Cr2 Records, Spinnin'' Records, among others.', 'assets/images/artists/40.jpg'),
(41, 'Deadmau5', 'Joel Thomas Zimmerman (born January 5, 1981), known professionally as Deadmau5 (stylized as deadmau5; pronounced "dead mouse"), is a Canadian electronic music producer, DJ, musician, and composer. Zimmerman produces a variety of styles within the progressive house genre and sometimes other forms of electronic music. His works have been included in numerous compilation albums, such as TiÃ«sto''s In Search of Sunrise 6: Ibiza, and his tracks have also been included and presented on Armin van Buuren''s A State of Trance radio show.', 'assets/images/artists/41.jpg'),
(42, 'Nicky Romero', 'Nick Rotteveel van Gotum (born 6 January 1989), professionally known as Nicky Romero, is a Dutch DJ, record producer, musician and remixer from Amerongen. He has worked with, and received support from DJs, such as TiÃ«sto, Fedde le Grand, Sander van Doorn, David Guetta, Calvin Harris, Armand Van Helden, Avicii and Hardwell. He currently ranks at number 50 on DJ Mag''s annual Top 100 DJs poll. He is known for his viral hit song "Toulouse".', 'assets/images/artists/42.jpg'),
(43, 'Yellow Claw', 'Yellow Claw is a Dutch DJ and record production duo from Amsterdam  consisting of Jim Aasgier (born Jim Taihuttu) and Nizzle (born Nils Rondhuis). The duo''s music is a mix of a wide range of genres and often incorporates elements from trap, hip hop, dubstep, big room house, hardstyle and moombahton.', 'assets/images/artists/43.jpg'),
(44, 'Mike Williams', 'Mike Willemsen (born November 27, 1996), better known by his stage name Mike Williams, is a Dutch DJ, record producer, musician and remixer from Kortenhoef, North Holland. He is best known for working with TiÃ«sto and as an artist of Spinnin'' Records, who recognised him as an "artist of the future". He is regarded as one of the pioneers of the future bounce genre, an emerging subgenre of future house, alongside Dutch DJs Justin Mylo, Brooks and Mesto.', 'assets/images/artists/44.jpg'),
(45, 'Dannic', 'Daan Romers (born 10 November 1985), better known by his stage name Dannic, is a Dutch DJ and EDM producer. He is known for his work in collaborations with Hardwell, Dyro, Sick Individuals, and publishes his music through the record label Revealed Recordings and his own label Fonk Recordings.', 'assets/images/artists/45.jpg'),
(46, 'Lucas & Steve', 'Lucas & Steve is a Dutch DJ duo from Maastricht formed by house DJs Lucas de Wert and Steven Jansen.', 'assets/images/artists/46.jpg'),
(47, 'Galantis', 'Galantis is a Swedish electronic dance music production, songwriting and DJ duo consisting of Christian Karlsson and Linus EklÃ¶w. Karlsson is also known as Bloodshy as part of two other musical groups, a duo (Bloodshy & Avant) and a trio (Miike Snow). EklÃ¶w is known as Style of Eye. The duo is best known for their biggest hit singles "Runaway (U & I)", "Peanut Butter Jelly" and "No Money".', 'assets/images/artists/47.jpg'),
(48, 'Jay Hardway', 'Jobke Pieter Hendrik Heiblom (born 27 April 1991), better known by his stage name Jay Hardway (stylised as JÎ”Y HÎ”RDWÎ”Y), is a Dutch DJ, record producer and electronic musician from Drunen, North Brabant. He is signed to Spinnin'' Records. He is best known for his collaboration "Wizard" in conjunction with his fellow Dutch artist Martin Garrix. The 2013 single became an international hit charting in Belgium, France and the Netherlands.', 'assets/images/artists/48.jpg'),
(49, 'Florian Picasso', 'Florian Ruiz-Picasso (born 21 February 1990), better known as Florian Picasso, is a Vietnamese-French DJ and record producer based in Cannes. He is a great-grandson of the well-known artist, Pablo Picasso. He gained recognition for collaborations with Martin Garrix and Steve Aoki. In 2016, he was ranked by DJ Mag at 38th on their annual list of Top 100 DJs.', 'assets/images/artists/49.jpg'),
(50, 'Vini Vici', 'Vini Vici consists of the two musicians Aviram Saharai and Matan Kadosh. Both come from Afula, a city in northern Israel, and have been working together since the early 2000s, including the trance project Sesto Sento . At the same time, both producers are active both in solo and in other collaboration projects. As an intention to found Vini Vici, the duo decided to wrap old-school sound with new and futuristic ideas', 'assets/images/artists/50.jpg'),
(51, 'Sam Feldt', '', 'assets/images/artists/51.jpg'),
(52, 'Robin Schulz', '', 'assets/images/artists/52.jpg'),
(53, 'Steve Angello', '', 'assets/images/artists/53.jpg'),
(54, 'Mariana BO', '', 'assets/images/artists/54.jpg'),
(55, 'Dillon Francis', '', 'assets/images/artists/55.jpg'),
(56, 'Slushii', '', 'assets/images/artists/56.jpg'),
(57, 'Netsky', '', 'assets/images/artists/57.jpg'),
(58, 'Nucleya', '', 'assets/images/artists/58.jpg'),
(59, 'Cheat Codes', '', 'assets/images/artists/59.jpg'),
(60, 'Krewella', '', 'assets/images/artists/60.jpg'),
(61, 'Dyro', '', 'assets/images/artists/61.jpg'),
(62, 'Breathe Carolina', '', 'assets/images/artists/62.jpg'),
(63, 'Vicetone', '', 'assets/images/artists/63.jpg'),
(64, 'Showtek', '', 'assets/images/artists/64.jpg'),
(65, 'Justin Mylo', '', 'assets/images/artists/65.jpg'),
(66, 'Akon', '', 'assets/images/artists/66.jpg'),
(67, 'Ryan Tedder', '', 'assets/images/artists/67.jpg'),
(68, 'Dastic', '', 'assets/images/artists/68.jpg'),
(70, 'KAAZE', '', 'assets/images/artists/70.jpg'),
(71, 'Jonathan Mendelsohn', '', 'assets/images/artists/71.jpg'),
(72, 'Alex Schulz', '', 'assets/images/artists/72.jpg'),
(73, 'Sonu Nigam', '', 'assets/images/artists/73.jpg'),
(74, 'Laidback Luke', '', 'assets/images/artists/74.jpg'),
(75, 'NWYR', 'W&W is a Dutch DJ and record producer duo composed of Willem van Hanegem and Wardt van der Harst. They began their careers by producing trance music, before venturing into electro house and big room house. After producing trance for five years, W&W founded their own record label called Mainstage Music, and became active in the big room house and progressive house scene. This was followed by the release of their commercial breakthrough "Bigfoot" in 2014. In 2017, they returned to their original trance style with the NWYR (pronounced "new year") project.', 'assets/images/artists/75.jpg'),
(76, 'MOTi', '', 'assets/images/artists/76.jpg'),
(78, 'Matisse & Sadko', '', 'assets/images/artists/78.jpg'),
(81, 'Sidnie Tipton', '', 'assets/images/artists/81.jpg'),
(82, 'Rooverb', '', 'assets/images/artists/82.jpg'),
(83, 'Alan Crown', '', 'assets/images/artists/83.jpg'),
(84, 'AREA 21', 'Area21 (stylized as AREA21) is an electronic dance music duo consisting of Dutch DJ Martin Garrix and American musician Maejor. It gained popularity after Martin Garrix debuted their song "Spaceships" in his set during Ultra Music Festival 2016 in which Garrix had headlined. The duo is signed to Garrix''s record label Stmpd Rcrds. Their identities were previously unknown despite speculations about Garrix being a part of it alongside one or more vocalists. Throughout media and journalism, AREA21 has been described as "Martin Garrix''s new side project"', 'assets/images/artists/25167764428389.12'),
(85, 'Suyano', '', 'assets/images/artists/85.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Progressive House'),
(2, 'Hardstyle'),
(3, 'Future House'),
(4, 'Electro'),
(5, 'Psytrance'),
(6, 'Trance'),
(7, 'Tropical House'),
(8, 'Trap'),
(9, 'Dubstep'),
(10, 'House');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE IF NOT EXISTS `playlists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(3, 'EDM Hits', 'admin', '2018-10-13 00:00:00'),
(4, 'qwerty', 'admin', '2018-10-13 00:00:00'),
(6, 'Bigroom Favourites', 'betatester', '2018-10-13 00:00:00'),
(7, 'hits', 'thedipeshpatil', '2018-10-14 00:00:00'),
(8, 'EDM Hits', 'H3M3N', '2018-10-18 00:00:00'),
(12, 'xyz', 'ShubhamVaity', '2018-11-05 00:00:00'),
(13, 'p1', 'ShubhamVaity', '2018-11-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playlistsongs`
--

CREATE TABLE IF NOT EXISTS `playlistsongs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(9, 49, 3, 0),
(10, 30, 3, 1),
(11, 59, 3, 2),
(12, 60, 3, 3),
(13, 52, 4, 0),
(14, 54, 4, 1),
(15, 88, 4, 2),
(38, 28, 12, 3),
(40, 19, 12, 4),
(19, 30, 4, 3),
(22, 40, 7, 2),
(23, 73, 8, 0),
(32, 8, 12, 0),
(34, 23, 13, 0),
(35, 104, 12, 1),
(28, 47, 8, 3),
(37, 42, 7, 3),
(41, 73, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `artist2` int(11) NOT NULL,
  `artist3` int(11) NOT NULL,
  `artist4` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=107 ;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `artist2`, `artist3`, `artist4`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'WIEE', 1, 0, 0, 0, 1, 8, '3:31', 'assets/music/wiee.mp3', 1, 0),
(2, 'Sun Is Never Going Down', 1, 0, 0, 0, 1, 0, '3:26', 'assets/music/sunisnevergoingdown.mp3', 2, 0),
(3, 'Spotless', 1, 48, 0, 0, 1, 0, '3:15', 'assets/music/spotless.mp3', 3, 1),
(4, 'Hold On & Believe', 1, 0, 0, 0, 1, 0, '3:54', 'assets/music/holdonnbelieve.mp3', 4, 0),
(5, 'Welcome', 1, 0, 0, 0, 1, 0, '3:05', 'assets/music/welcome.mp3', 5, 0),
(6, 'Together', 1, 78, 0, 0, 1, 0, '3:41', 'assets/music/together.mp3', 6, 0),
(7, 'Make Up Your Mind', 1, 49, 0, 0, 1, 0, '3:16', 'assets/music/makeupyourmind.mp3', 7, 0),
(8, 'Virus', 1, 76, 0, 0, 2, 4, '3:15', 'assets/music/virus.mp3', 0, 1),
(9, 'Poison', 1, 0, 0, 0, 2, 4, '4:10', 'assets/music/poison.mp3', 0, 0),
(10, 'Lions In The Wild', 1, 0, 0, 0, 2, 1, '3:27', 'assets/music/lionsinthewild.mp3', 0, 0),
(11, 'Break Through The Silence', 1, 78, 0, 0, 2, 1, '3:24', 'assets/music/breakthru.mp3', 0, 0),
(12, 'High On Life', 1, 0, 0, 0, 2, 1, '3:50', 'assets/music/highonlife.mp3', 0, 0),
(13, 'The Last Dancer', 3, 0, 0, 0, 3, 6, '3:30', 'assets/music/lastdancer.mp3', 1, 5),
(14, 'United', 3, 50, 0, 0, 3, 6, '7:13', 'assets/music/united.mp3', 3, 2),
(15, 'Blah Blah Blah', 3, 0, 0, 0, 3, 6, '3:14', 'assets/music/blahblahblah.mp3', 2, 3),
(16, 'Therapy', 3, 0, 0, 0, 3, 6, '4:14', 'assets/music/therapy.mp3', 4, 2),
(17, 'This Is What It Feels Like', 3, 0, 0, 0, 3, 6, '4:09', 'assets/music/thisiswhatit.mp3', 5, 1),
(18, 'Sunny Days', 3, 0, 0, 0, 3, 6, '3:30', 'assets/music/sunnydays.mp3', 6, 0),
(19, 'Strong Ones', 3, 0, 0, 0, 3, 6, '3:08', 'assets/music/strongones.mp3', 7, 6),
(20, 'Great Spirit', 3, 50, 0, 0, 3, 6, '3:36', 'assets/music/greatspirit.mp3', 8, 0),
(21, 'Freefall', 3, 0, 0, 0, 3, 6, '3:01', 'assets/music/freefall.mp3', 9, 1),
(22, 'Heading Up High', 3, 0, 0, 0, 3, 6, '3:52', 'assets/music/headinguphigh.mp3', 10, 1),
(23, 'We Are Legends', 4, 70, 0, 0, 4, 4, '4:20', 'assets/music/werlegends.mp3', 1, 1),
(24, 'We Are One', 4, 0, 0, 0, 4, 1, '3:22', 'assets/music/werone.mp3', 2, 1),
(25, 'All That We''re Living For', 4, 0, 0, 0, 4, 2, '3:53', 'assets/music/allthatwe.mp3', 3, 0),
(26, 'Still The One', 4, 0, 0, 0, 5, 1, '3:41', 'assets/music/stilltheone.mp3', 1, 1),
(27, 'Sally', 4, 0, 0, 0, 4, 4, '4:35', 'assets/music/sally.mp3', 3, 1),
(28, 'Who''s In The House', 4, 0, 0, 0, 5, 4, '3:43', 'assets/music/whosinthehouse.mp3', 2, 7),
(29, 'One More Time Mashup', 4, 0, 0, 0, 5, 4, '4:08', 'assets/music/onemoretimermx.mp3', 3, 0),
(30, 'Mad World', 4, 0, 0, 0, 5, 1, '3:30', 'assets/music/madworld.mp3', 4, 0),
(31, 'Power', 4, 12, 0, 0, 5, 4, '2:32', 'assets/music/power.mp3', 5, 0),
(32, 'Get Low', 4, 0, 0, 0, 6, 4, '3:25', 'assets/music/getlow.mp3', 1, 1),
(33, 'Take Us Down', 4, 0, 0, 0, 6, 4, '4:17', 'assets/music/takeusdown.mp3', 2, 1),
(34, 'Bigroom Never Dies', 4, 33, 0, 0, 6, 4, '3:56', 'assets/music/brneverdies.mp3', 3, 3),
(35, 'Shine A Light', 4, 0, 0, 0, 6, 2, '3:18', 'assets/music/shinealight.mp3', 4, 2),
(36, 'Waiting For Love', 26, 1, 0, 0, 8, 10, '3:50', 'assets/music/waitingforlove.mp3', 1, 4),
(37, 'Citylights', 26, 0, 0, 0, 8, 10, '4:37', 'assets/music/citylights.mp3', 2, 2),
(38, 'The Nights', 26, 0, 0, 0, 8, 1, '2:56', 'assets/music/thenights.mp3', 3, 2),
(39, 'Levels', 26, 0, 0, 0, 8, 10, '3:18', 'assets/music/levels.mp3', 4, 1),
(40, 'Wake Me Up', 26, 0, 0, 0, 8, 1, '4:11', 'assets/music/wakemeup.mp3', 5, 1),
(41, 'I Could Be The One', 26, 42, 0, 0, 8, 3, '3:30', 'assets/music/icouldbe.mp3', 6, 1),
(42, 'Carribean Rave', 14, 0, 0, 0, 9, 3, '2:31', 'assets/music/crave.mp3', 1, 2),
(43, 'Supa Dupa Fly 2018', 14, 0, 0, 0, 9, 3, '2:52', 'assets/music/supadupafly.mp3', 2, 0),
(44, 'Komodo', 2, 14, 0, 0, 9, 3, '2:47', 'assets/music/komodo.mp3', 3, 1),
(45, 'God Is A Girl', 14, 0, 0, 0, 9, 3, '3:12', 'assets/music/godisagirl.mp3', 4, 0),
(46, 'Long Way Down', 14, 0, 0, 0, 9, 3, '3:26', 'assets/music/longwaydown.mp3', 5, 0),
(47, 'Moving On', 10, 0, 0, 0, 10, 8, '03:00', 'assets/music/265982954052.mp3', 1, 0),
(48, 'Find Me', 10, 0, 0, 0, 10, 8, '03:08', 'assets/music/140572822243.mp3', 2, 1),
(49, 'Keep It Mello', 10, 0, 0, 0, 10, 8, '03:10', 'assets/music/14033266421489.mp3', 3, 0),
(50, 'Alone', 10, 0, 0, 0, 10, 8, '03:20', 'assets/music/21824318653518.mp3', 4, 4),
(51, 'Take It Back', 10, 0, 0, 0, 10, 8, '03:15', 'assets/music/235103234332068.mp3', 5, 1),
(52, 'Dragon', 75, 0, 0, 0, 11, 6, '03:38', 'assets/music/3052078511382.mp3', 1, 1),
(53, 'Ends Of Time', 75, 0, 0, 0, 11, 6, '03:10', 'assets/music/24911125081509.mp3', 2, 0),
(54, 'Voltage', 75, 0, 0, 0, 11, 6, '03:06', 'assets/music/309061725932456.mp3', 3, 5),
(55, 'Horizon', 75, 0, 0, 0, 11, 6, '02:18', 'assets/music/314101075532128.mp3', 4, 2),
(56, 'Heart Eyes', 75, 0, 0, 0, 11, 6, '03:30', 'assets/music/8121409425439.mp3', 5, 1),
(57, 'Wormhole', 75, 0, 0, 0, 11, 6, '02:44', 'assets/music/291003237311786.mp3', 6, 3),
(58, 'We Love House Music', 11, 0, 0, 0, 12, 3, '02:40', 'assets/music/18378197713160.mp3', 1, 2),
(59, 'Save A Little Love', 11, 0, 0, 0, 12, 3, '03:23', 'assets/music/22139318963313.mp3', 2, 0),
(60, 'Another Chance', 11, 0, 0, 0, 12, 3, '02:52', 'assets/music/1837297946643.mp3', 3, 0),
(61, 'Momentum', 11, 0, 0, 0, 12, 3, '02:36', 'assets/music/57825355636.mp3', 4, 0),
(62, 'Heaven To Me', 11, 0, 0, 0, 12, 3, '02:56', 'assets/music/18413157010419.mp3', 5, 1),
(63, 'Been A While', 51, 0, 0, 0, 13, 7, '03:17', 'assets/music/1624185345591.mp3', 1, 3),
(64, 'Alive', 51, 0, 0, 0, 13, 7, '03:14', 'assets/music/36963018525198.mp3', 2, 1),
(65, 'Be My Lover', 51, 0, 0, 0, 13, 7, '03:06', 'assets/music/29324763718922.mp3', 3, 1),
(66, 'Yes', 51, 66, 0, 0, 13, 7, '02:57', 'assets/music/299151112816977.mp3', 4, 2),
(67, 'Warriors', 42, 0, 0, 0, 14, 10, '02:58', 'assets/music/142023153115240.mp3', 1, 0),
(68, 'Rise', 42, 0, 0, 0, 14, 10, '03:21', 'assets/music/180962692129870.mp3', 2, 0),
(69, 'Metropolis', 7, 42, 0, 0, 14, 10, '03:11', 'assets/music/951182812941.mp3', 3, 1),
(70, 'Young (Remix)', 42, 6, 0, 0, 14, 10, '04:54', 'assets/music/11330929929072.mp3', 4, 1),
(71, 'Lighthouse', 42, 0, 0, 0, 14, 10, '03:07', 'assets/music/144511720027561.mp3', 5, 1),
(72, 'Novell', 42, 0, 0, 0, 14, 10, '05:35', 'assets/music/47272019616205.mp3', 6, 5),
(73, 'Light It Up', 38, 0, 0, 0, 15, 9, '02:47', 'assets/music/65011797817131.mp3', 1, 7),
(74, 'Believer', 38, 64, 0, 0, 15, 9, '03:44', 'assets/music/31009208067943.mp3', 2, 1),
(75, 'All My Love', 38, 0, 0, 0, 15, 9, '03:50', 'assets/music/18504263373078.mp3', 3, 0),
(76, 'Know No Better', 38, 0, 0, 0, 15, 9, '03:46', 'assets/music/2100162915314.mp3', 4, 1),
(77, 'We Did It', 84, 0, 0, 0, 16, 8, '03:08', 'assets/music/19086129755820.mp3', 1, 0),
(78, 'Glad You Came', 84, 0, 0, 0, 16, 8, '02:41', 'assets/music/890384364125.mp3', 2, 0),
(79, 'Happy', 84, 0, 0, 0, 16, 8, '02:51', 'assets/music/25234931522624.mp3', 3, 0),
(80, 'Spaceships', 84, 0, 0, 0, 16, 8, '02:50', 'assets/music/117062161115304.mp3', 4, 0),
(81, 'Ignite', 17, 0, 0, 0, 17, 6, '03:31', 'assets/music/26623107009237.mp3', 1, 1),
(82, 'Routine', 17, 0, 0, 0, 17, 6, '02:47', 'assets/music/437755989151.mp3', 2, 0),
(83, 'Alone', 17, 0, 0, 0, 17, 6, '02:43', 'assets/music/52172752619527.mp3', 3, 3),
(84, 'Faded', 17, 0, 0, 0, 17, 6, '03:33', 'assets/music/6796968512778.mp3', 4, 2),
(85, 'Fever', 32, 62, 0, 0, 18, 4, '03:34', 'assets/music/15423231612885.mp3', 1, 2),
(86, 'These Heights', 32, 46, 0, 0, 18, 4, '03:09', 'assets/music/61342251926212.mp3', 2, 1),
(87, 'Cant Take It', 62, 32, 0, 0, 18, 4, '03:12', 'assets/music/111021926327660.mp3', 3, 1),
(88, 'Alamo', 32, 0, 0, 0, 18, 4, '03:00', 'assets/music/22869804223643.mp3', 4, 1),
(89, 'Without The Sun', 19, 0, 0, 0, 19, 6, '04:54', 'assets/music/155792136819025.mp3', 1, 0),
(90, 'Save Myself', 19, 0, 0, 0, 19, 6, '02:42', 'assets/music/320542975128068.mp3', 2, 0),
(91, 'Crazy', 25, 19, 0, 0, 19, 6, '03:09', 'assets/music/4101914725256.mp3', 3, 3),
(92, 'Wolves', 10, 19, 0, 0, 19, 6, '02:48', 'assets/music/25025752618599.mp3', 4, 0),
(93, 'Like I Do', 7, 1, 0, 0, 7, 1, '03:23', 'assets/music/3189112327369.mp3', 1, 1),
(94, 'Lovers On The Sun', 7, 0, 0, 0, 7, 10, '03:24', 'assets/music/6941938312068.mp3', 2, 4),
(95, 'Little Bad Girl', 7, 0, 0, 0, 7, 10, '03:16', 'assets/music/12238202077676.mp3', 3, 1),
(96, 'Where Them Girls At', 7, 0, 0, 0, 7, 10, '03:30', 'assets/music/227811073818499.mp3', 4, 2),
(97, 'She Wolf', 7, 0, 0, 0, 7, 10, '03:47', 'assets/music/22285140187379.mp3', 5, 1),
(98, 'Everybody Hates Me', 6, 0, 0, 0, 20, 9, '03:44', 'assets/music/164002228132014.mp3', 1, 1),
(99, 'Until You Were Gone', 6, 0, 0, 0, 20, 9, '03:36', 'assets/music/154933145027403.mp3', 2, 5),
(100, 'Don''t Let Me Down (Remix)', 6, 14, 0, 0, 20, 9, '02:37', 'assets/music/7656716927302.mp3', 3, 3),
(101, 'Something Just Like This (Remix)', 6, 11, 0, 0, 20, 3, '03:53', 'assets/music/131031977223237.mp3', 4, 2),
(102, 'Breach (Walk Alone)', 1, 0, 0, 0, 21, 9, '02:58', 'assets/music/12002924596571672871567103428.mp3', 1, 5),
(103, 'Yottabyte', 1, 0, 0, 0, 21, 1, '03:24', 'assets/music/168347805811220637931509975573.mp3', 2, 15),
(104, 'Latency', 1, 61, 0, 0, 21, 1, '03:25', 'assets/music/722017999405498105729491516.mp3', 3, 11),
(105, 'Access', 1, 0, 0, 0, 21, 1, '03:16', 'assets/music/171232183920777512931394144734.mp3', 4, 9),
(106, 'Waiting For Tomorrow', 1, 0, 0, 0, 21, 1, '04:07', 'assets/music/854401560370014752975657235.mp3', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user',
  `signUpDate` datetime NOT NULL,
  `premiumValidity` datetime DEFAULT NULL,
  `activation_status` int(11) NOT NULL,
  `activation_code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `type`, `signUpDate`, `premiumValidity`, `activation_status`, `activation_code`) VALUES
(1, 'betatester', 'Beta', 'Tester', 'beta123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user', '2017-06-28 00:00:00', '0000-00-00 00:00:00', 1, 0),
(4, 'ShubhamVaity', 'Shubham', 'Vaity', 'bseta123@gmail.com', '5772a820e6798e5807a67b8640dfdf3a', 'admin', '2018-10-13 00:00:00', '2019-10-23 00:00:00', 1, 0),
(3, 'H3M3N', 'H3M3N', 'N4IK', 'beta123@gmail.coms', '43f68fea5c30a71bf7570313bb5d6bb1', 'admin', '2017-06-28 00:00:00', '2019-10-23 00:00:00', 1, 0),
(5, 'thedipeshpatil', 'Dipesh', 'Patil', 'betadsf123@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'user', '2018-10-14 00:00:00', '2019-10-23 00:00:00', 1, 0),
(7, 'Shubham_Vaity', 'Shubham', 'Vaity', 'betasfsdf123@gmail.com', '5772a820e6798e5807a67b8640dfdf3a', 'user', '2018-10-22 00:00:00', '2018-10-31 00:00:00', 1, 0),
(12, 'Amogh', 'Amogh', 'Vaity', 'betadsadaas123@gmail.com', 'df245eca5f067e801dab095c6ef902e8', 'user', '2018-10-23 00:00:00', '0000-00-00 00:00:00', 1, 0),
(11, 'sagar091098', 'Sagar', 'Bhandari', 'bet4434a123@gmail.com', '825f9e987933c2e093590348c615aa61', 'user', '2018-10-23 00:00:00', '2018-10-26 00:00:00', 1, 0),
(13, 'Hiralal', 'Hiralal', 'Purohit', 'b423e534ta123@gmail.com@gmail.com', '5c2bfda6ad4d90df7971ea9366ff0c14', 'user', '2018-10-23 00:00:00', '0000-00-00 00:00:00', 1, 0),
(14, 'BhavyadeepVas', 'Bhavyadeep', 'Vashisht', 'be5345ta153423@gmail.com', 'ca2bca16684d1746418471893a59568c', 'user', '2018-10-26 00:00:00', '2018-10-30 00:00:00', 1, 0),
(15, 'DipeshPatil', 'Dipesh', 'Patil', 'beerwrwerwta123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user', '2018-10-27 00:00:00', '0000-00-00 00:00:00', 1, 0),
(17, 'Johncena', 'John', 'Cena', 'Jofsfhncena@gmail.com', 'e8d25b4208b80008a9e15c8698640e85', 'user', '2018-11-01 00:00:00', '0000-00-00 00:00:00', 0, 315340),
(18, 'Rutara', 'Rutuja', 'Tarale', 'Rfsdufsdtzifdsfe1f4@gmail.com', '6f291a86a22529634ba04e2ca8cf8f5f', 'user', '2018-11-02 00:00:00', '0000-00-00 00:00:00', 1, 0),
(19, 'Akshay', 'Akshay', 'Khanolkar', 'Ar@sa.ii', '1c1d15237b2433f18f588d8bf6984751', 'user', '2018-11-04 00:00:00', '2018-11-07 00:00:00', 1, 0),
(20, 'Justin14', 'Justin', 'Dsouza', 'Ja.14@gmail.com', '53dd9c6005f3cdfc5a69c5c07388016d', 'user', '2018-11-05 00:00:00', '0000-00-00 00:00:00', 1, 0),
(21, 'prajas_k', 'Prajas', 'Kadepurkar', 'Kas@gmail.com', '8ac13f655a702dacc3147509b73f4fff', 'user', '2018-12-23 00:00:00', '0000-00-00 00:00:00', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
