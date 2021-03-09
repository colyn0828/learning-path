-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2021 at 01:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mgao7`
--

-- --------------------------------------------------------

--
-- Table structure for table `mga_contacts`
--

CREATE TABLE `mga_contacts` (
  `mga_BusinessName` varchar(100) NOT NULL,
  `mga_PersonName` varchar(100) NOT NULL,
  `mga_EmailAddress` varchar(100) NOT NULL,
  `mga_Url` varchar(100) NOT NULL,
  `mga_Phone` varchar(100) NOT NULL,
  `mga_Address` varchar(100) NOT NULL,
  `mga_City` varchar(100) NOT NULL,
  `mga_Province` varchar(40) NOT NULL,
  `mga_Postal` varchar(10) NOT NULL,
  `mga_Description` text NOT NULL,
  `mga_Resume` tinyint(1) NOT NULL,
  `mga_Tags` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mga_contacts`
--

INSERT INTO `mga_contacts` (`mga_BusinessName`, `mga_PersonName`, `mga_EmailAddress`, `mga_Url`, `mga_Phone`, `mga_Address`, `mga_City`, `mga_Province`, `mga_Postal`, `mga_Description`, `mga_Resume`, `mga_Tags`, `id`) VALUES
('Red Cherry', 'DAN CARTER', 'info@redcherry.ca', 'https://www.redcherryinc.ca/', '8884016668', '7 Coachwood Pl', 'Calgary', 'Alberta', 'T3H 1E1', 'Red Cherry provides top-notch app development, custom software development, web design and branding that can be all integrated into a digital marketing strategy. We see your project through, from conception to planning, design, development and marketing. At Red Cherry, we love what we do and it shows through our satisfied clients. We made it happen for them. Let us make it happen for you!', 1, 'WEB', 1),
('Clio Websites', 'Jack Newton', 'info@clio.ca', 'https://cliowebsites.com/', '4036908598', '171 Everoak Green', 'Calgary', 'Alberta', 'T2Y 0J5', 'Clio Websites is a full service website design and digital marketing company based in Calgary. Our company was established in 2007 and we have been helping clients grow ever since.', 1, 'WORDPRESS', 2),
('Media Labz', 'Paul Fekete', 'info@medialabz.ca', 'https://www.medialabz.ca', '5877881675', '172 Erin Meadow', 'Calgary', 'Alberta', 'T2B 3P7', 'Media Labz is amongst the renowned and reputed web design and website development service agency located in Calgary. Our prime motive is to provide tailor-made services to our customers based on their business requirements and expectations. Starting from developing e-commerce stores, custom designing of websites, internet marketing to mobile marketing, Media Labz is pro at delivering all sorts of services at the most affordable prices. The professionals at Calgary Web Design have the expertise to provide you with an exclusive website design, Search Engine Optimization and development services that even exceed your expectations. It is time to turn your online brand into a lucrative entity! ', 1, 'APP', 3),
('Web Candy Design Inc', 'Sean Jenkins', 'info@webcandy.ca', 'http://www.webcandy.ca/', '4034573499', '1732 11 Ave', 'Calgary', 'Alberta', 'T3C 0N4', 'Web Candy Design (a division of Blue Ocean Interactive Marketing) is a dynamic, Calgary web design and internet marketing company that delivers state-of-the art web solutions based on your company\'s unique business needs & goals. With our team of web developers, dedicated account managers, and top-notch customer service, Web Candy holds its place as Calgary\'s premier web design and marketing company.', 1, 'SEO', 4),
('AKRIC Web Design', 'ANDREW CHAPMAN', 'andrew@akric.com', 'https://www.akric.com/', '4036164161', '900 6 Ave', 'Calgary', 'Alberta', 'T2P 3K2', 'The AKRIC group specializes in building websites that work for our customers and their customers. We deliver effective internet solutions, regardless of project size, backed up by first-class support, bringing results to all our projects. Jobs range from small one off single page websites to customizable database driven e-commerce sites. We are based in Calgary, Alberta, Canada and have customers all over western Canada. The AKRIC group specializes in working with small businesses and our low overheads mean competitive prices, every time. If budgets are tight, we will work with you to give you a website solution that fits your budget. We believe in keeping things straightforward and as easy as possible for our customers and we hope that dealing with the AKRIC group is exactly that. EFFECTIVE WEB DESIGN THAT WORKS. IT IS THAT SIMPLE', 1, 'DESIGN', 5),
('Instalogic Solutions', 'Naj Zada', 'info@instalogic.com', 'https://www.instalogic.com/', '4037750597', '1127 17 Ave', 'Calgary', 'Alberta', 'T2T 0B6', 'Instalogic has been in business for 15+ years. With our experience and dedication we have become a leader in providing online and offline business services and solutions.', 1, 'BUSINESS', 6),
('Parxavenue', 'Leah Barnes', 'info@parxavenue.ca', 'https://parxavenue.ca/', '4033836081', '2010 Ulster Rd', 'Calgary', 'Alberta', 'T2N 4C2', 'Parxavenue is a Calgary internet marketing company and web design agency serving clients across Calgary, AB. and beyond. Our clients know that the key to standing out online is having a strong digital presence. From modern and attractive design designs to results-focused digital marketing, we offer a variety of tools to help businesses get found and attract more customers.', 1, '.NET', 7),
('Ullaco Corp', 'Jaques Botha', 'sales@ullaco.com', 'https://www.ullaco.com/', '4039107270', '340 Midpark Way', 'Calgary', 'Alberta', 'T2X 1P1', 'At Ullaco Corp we make great websites. Websites that not only look good, but are responsive and well written, with unique content created by our in-house team. Our premium web design and website development company is based right here in Calgary. Which means you can always get in touch with us or come by our boardroom and see where things are at. Open lines of communication are key to any project, which is why we are always available for a quick chat if you have a question about your website.', 1, 'PHP', 8),
('T2 Media', 'Todd Taylor', 'hello@t2.ca', 'https://www.t2.ca', '4039079889', '22343 Bankers Hall', 'Calgary', 'Alberta', 'T2P 4J1', 'Partnering with us is a journey and not just a single transaction. While working together we will help you navigate the dynamic digital landscape and help you rise above the rest.', 1, 'JAVASCRIPT', 9),
('Blue Ocean Interactive', 'James Keichinger', 'info@blueoceaninteractive.com', 'https://www.blueoceaninteractive.com/', '4034551658', '1732 11 Ave', 'Calgary', 'Alberta', 'T3C 0N4', 'Blue Ocean is well versed in delivering and executing marketing campaigns and strategies across ANY form of online and offline media. We combine smart people, creative ideas and hard work to achieve stellar results for our clients. As evidence, we have been selected as the recipient of the 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019 and 2020 Consumer Choice Award for Web Design for the Calgary area.', 1, 'DESIGN', 10),
('22 Web Design', 'Jim Federico', 'info@22webdesign.ca', 'https://www.22webdesign.com', '5878003050', 'Tuscany Ct', 'Calgary', 'Alberta', 'T3L 2Y7', 'With over a decade of experience in various markets (Canada, USA, Thailand, and India), 22 Web Design brings you professionalism, creativity, and diversity. We have successfully served clients from different industries i.e Food and Beverage, Event Management, Legal Services, Gems and Jewelry, Health, and Beauty just to name a few.', 1, 'DIGITAL', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mga_contacts`
--
ALTER TABLE `mga_contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mga_contacts`
--
ALTER TABLE `mga_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
