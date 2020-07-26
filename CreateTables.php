<?php 

$host   = 'locahost';;
$user   = 'root';
$pass   = '';
$dbname = 'db_shop'; 

$sql = "CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `OTP` varchar(6) NOT NULL,
  `email` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";


$query = "
CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";
$query1 = "
CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";
$query2 = "
CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";
$query3 = "
CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

";
$query4 = "
CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";

$query5 = "
CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";

$query6 = "
CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";

$query7 = "CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";

$query8 = "CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";
$query9= "CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";

$mysqli = new mysqli("localhost", "root", "", "db_shop");
/* Create table doesn't return a resultset */
$mysqli->query($sql);
$mysqli->query($query);
$mysqli->query($query1);
$mysqli->query($query2);
$mysqli->query($query3);
$mysqli->query($query4);
$mysqli->query($query5);
$mysqli->query($query6);
$mysqli->query($query7);
$mysqli->query($query8);
$mysqli->query($query9);


$query10 = "INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(1, 'Mini-503 Wireless Bluetooth', 4, 3, '<p><span>With built-in microphone as well as volume, play, pause skip, call answer and call reject control buttons. Freedom to exercise, move around and commute without wires to tangle or hold you back. Simplify your communications with this lightweight and versatile headset.&nbsp;</span><br /><br /><span>This Super lightweight, comfortable over-the-ear design makes this Bluetooth stereo headphone easy to wear throughout the day. You\'ll enjoy all-day wearing comfort, clearer voice transmission and superior sound quality - without wires!</span></p>', 999.00, 'uploads/cd60a8b471.jpg', 0),
(2, 'Travelmate  - Core i5 ', 2, 5, '<p>7th -generation core i5, 2 core 4thread,4 gb single channel,aspect ratio 16:9Thin Bezel &amp; Powerful Laptop on the go. 8th Gen Intel&nbsp;<strong>Core</strong>&nbsp;i7, Buy Now. Award winning laptops. Recommended by Pros. 12 months warranty. Learn gaming features.</p>', 38500.00, 'uploads/f685d89450.jpeg', 0),
(3, 'V18 LED - CC Camera - White', 4, 2, '<p>Press the power button for 2 seconds, then the light will vibrate for a few seconds. Once the vibration stop, the BLUE led indicator to stay on and it is in ready mode. To make a video, simply press the power button one time, the lighter will vibrate 2 times and the blue LED indicator goes off, then the video recording begins. To stop filming, press the power again, then the light will vibrate 3 times.&nbsp;Now your file is saved and in ready mode again. To turn off, hold the power button for 2 seconds, and the lighter will vibrate 2 times.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>', 2000.00, 'uploads/3bba9742ec.jpg', 1),
(4, 'Rechargeable Mini Fan', 4, 3, '<p><span>Enfield is a multi branded retail chain store where all sorts of tech related accessories can be found. Their range of products start from brand new power banks, headphones, USB Data &amp; Charging Cables, High Speed Data Line Cables, 3D VR BOX, Bluetooth Selfie Sticks, Wireless N Routers, Wireless Bluetooth Speakers, Home Theatre Speakers, Android TV Box, RA-OTG Micro USB Adapters to Bluetooth Headsets among many other high tech gadgets that are in demand to lead a modern life.</span></p>', 1500.00, 'uploads/fa56e62bef.jpg', 0),
(5, ' 3480 Laptop - Intel Core i5', 2, 2, '<p><span>Enhanced data protection: Data security is key in protecting your business and employees. Dell Data Protection is a suite of security software programs offered on each Latitude 3000 Series system. Endpoint security, advanced user authentication and data encryption software all work cohesively to safeguard your data from threats and hacks.</span><br /><span>Safely communicate: Your Latitude 3480 comes TPM2.0 TCG certified and FIPS-140-2 certified, and uses hardware-based cryptography for the most secure communication.</span></p>', 53500.00, 'uploads/9ef4ce1375.png', 1),
(6, 'V18 LED - CC Camera - Black', 4, 5, '<p><span>Press the power button for 2 seconds, then the light will vibrate for a few seconds. Once the vibration stop, the BLUE led indicator to stay on and it is in ready mode. To make a video, simply press the power button one time, the lighter will vibrate 2 times and the blue LED indicator goes off, then the video recording begins. To stop filming, press the power again, then the light will vibrate 3 times.&nbsp;Now your file is saved and in ready mode again. To turn off, hold the power button for 2 seconds, and the lighter will vibrate 2 times.</span></p>', 1850.00, 'uploads/2966aff2bb.jpg', 1),
(7, 'Bluetooth Speaker with ac line', 4, 2, '<p><span>Naturally, size and sound are two of the most important factors for many. Allocacoc has recently announced their audioCube and sent me one to review. Dutch manufacturer, Allocacoc, has an interesting proposition of getting the most out of a portable Bluetooth speaker. They obviously like working with cubes and have therefore added a speaker to almost every face of one.</span></p>', 3500.00, 'uploads/c5b154a642.jpg', 0),
(8, 'Smoothie Blender', 4, 2, '<p><span>Compact design ideal for small living spaces and on-the-go portability. Great for making shakes, baby formula, marinades and salad dressings.(Please don\'t put hard foods into it like nuts). Parts are Removable and dishwasher safe EXCEPT bottom part. Before it starts working, add some water will make it perfect. Rapid stiring speed can make a cup of juice within one minute. It can be charged by power bank, laptop, computer, mobile phones or any other USB devices. Can used as common cup and juicer blender or as a power bank.&nbsp;Can repeat use 10-12 times when fully charged.</span></p>', 999.00, 'uploads/4d2b549e0a.jpg', 0),
(11, 'Apple iPhone X 64GB', 3, 4, '<p>iPhone Display Size: 5.8 inches,Display Resolution: 1125 x 2436 pixels</p>\r\n<p>Rear Camera: Dual 12 MP</p>\r\n<p>Front Camera: 7 MP</p>\r\n<p>Video Quality : 4K video recording at 24 fps, 30 fps, or 60 fps</p>\r\n<p>Face ID: Enabled by TrueDepth camera for facial recognition<br />Splash, Water, and Dust Resistant: Rated IP67 under IEC standard 60529<br />Battery Capacity: Up to 21h (3G) talk time; Up to 60 h music play<br />Phone Sensors: Face ID, accelerometer, gyro, proximity, compass, barometer<br />Apple iPhone X Smartphone: Design &amp; Display</p>', 99990.00, 'uploads/9588c6f782.jpg', 1),
(12, 'Refrigerator long size', 4, 2, '<p><span>Samsung GR-S24SPB (C) Top Mount Refrigerator can be a perfect choice for you and your family. This wonderfully designed refrigerator of 226 liters capacity is fully equipped with various healthy features to help store your food without any health hazards. The doors ensure convenience and the low noise design ensures comfort. This refrigerator comes with amazing Tempered Glass Shelves, Hybrid Bio Deodorizer, Cool Air Wrap, Multi-shelf slots and energy saving with optimized insulation thickness.</span></p>', 24500.00, 'uploads/91f3e32ef2.jpg', 1),
(13, 'LED Monitor K202HQL Black', 1, 5, '<p>You\'ll enjoy tasks and entertainment more on the 19.5&rdquo; LED-backlit display. It presents incredibly clear, rich-detailed images at a high resolution of 1600 x 900, and features an impressive dynamic contrast ratio of 100,000,000:1 to reveal darker image areas in greater depth. A super-fast 5-millisecond response time displays action sequences with the highest degree of clarity. The great sights are made even better by exceptional colors via Acer Adaptive Contrast Management.</p>', 10500.00, 'uploads/bd293afbce.jpg', 1),
(15, 'Laundry machine ', 4, 2, '<p>Best Laundry machine in bd.! years warenty<br /><br /></p>', 3200.00, 'uploads/d712a37947.png', 0),
(16, 'iPhone X - Smartphone', 3, 4, '<p>5.8 inchi old multi touched display.Hexa-core 2.39ghz processor.</p>\r\n<p>3GB RAM And 256GB ROM</p>\r\n<p>12MP Dual Rear and 7MP front camera</p>\r\n<p>Nano Sim</p>', 120500.00, 'uploads/ac7385aa6d.jpeg', 1),
(17, ' iPhone 6 - Smartphone', 3, 4, '<p>Apple iPhone 6 comes with 1GB of RAM. The phone packs 16GB of internal storage that cannot be expanded. As far as the cameras are concerned, the Apple iPhone 6 packs a 8-megapixel primary camera on the rear and a 1.2-megapixel front shooter for selfies. The Apple iPhone 6 is powered by a 1810mAh non removable battery.</p>', 34999.00, 'uploads/dd277d68bd.jpg', 1),
(18, 'iPhone 8 Plus', 3, 4, '<p>iPhone XR comes with new chip<br />64GB and 256GB storage options on all models<br />128GB on XR only <br />Battery improvements on iPhone XR<br />The Apple iPhone 8 and 8 Plus both come with the A11 Bionic chip with 64-bit architecture, a neural engine and embedded M11 motion coprocessor. They also both come in 64GB and 256GB storage capacities, neither of which offer microSD support.</p>', 109999.00, 'uploads/33ce6b99f4.jpg', 1),
(19, 'LED Monitor K202HQL', 4, 5, '<p>Product details of LED Monitor K202HQL 19.5\" - Black<br />Display size: 19.5 Inch<br />Resolution: HD+ (1600 x 900)<br />Stunning colours<br />Wall mountable<br />Ergonomic stand tilt -5 to 25 degrees<br />Image Brightness: 200 nits (cd/m2)<br />About LED Monitor K202HQL 19.5\"</p>\r\n<p><br />You\'ll enjoy tasks and entertainment more on the 19.5&rdquo; LED-backlit display. It presents incredibly clear, rich-detailed images at a high resolution of 1600 x 900, and features an impressive dynamic contrast ratio of 100,000,000:1 to reveal darker image areas in greater depth. A super-fast 5-millisecond response time displays action sequences with the highest degree of clarity. The great sights are made even better by exceptional colors via Acer Adaptive Contrast Management.</p>', 6563.00, 'uploads/346c11f644.png', 1),
(21, 'EOS 77D DSLR Camera', 4, 3, '<p>Product details of EOS 77D DSLR Camera (Body) - Black<br />No return policy after delivered<br />24.2 Megapixel CMOS (APS-C) sensor<br />Built-in Wi-Fi, NFC and Bluetooth<br />Hdr movie &amp; time-lapse movie.<br />Flash memory type: SDXC<br />About EOS 77D<br />Featuring an optical viewfinder with a 45-point all cross-type AF system1 and fast, accurate Dual Pixel CMOS AF with phase-detection, the EOS 77D camera helps you capture the action right as it happens. Extensive, customizable controls and brilliant image quality help you get the photo looking exactly how you want it. Capture vibrant colors and fine details with the 24.2 Megapixel CMOS (APS-C) Sensor. Without missing a beat, check and change your settings with the top-mounted LCD screen and rear Quick Control dial. When you&rsquo;re satisfied with your results, built-in Wi-Fi2, NFC3 and Bluetooth4 technology lets you easily share your favorite photos and videos.</p>', 58160.00, 'uploads/50009699d9.png', 1),
(22, 'Smartphone Gtel X7', 3, 6, '<p>Thes best phone with all features users need.</p>', 200.25, 'uploads/7db59bd314.jpg', 0);";

$mysqli->query($query10);

$query11 = "
INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(22, 1, 14, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/bb49c3ce4e.png', '2018-08-01 20:45:34', 1),
(23, 1, 15, 'Lorem Ipsum is simply', 3, 1515.66, 'uploads/d712a37947.png', '2018-08-01 21:23:42', 1),
(24, 1, 11, 'Lorem ipsum dolor sit amet sed do eiusmod', 3, 1501.65, 'uploads/4ebef5562f.png', '2018-08-02 00:14:55', 0),
(25, 1, 15, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/d712a37947.png', '2018-08-02 00:15:23', 0),
(26, 1, 15, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/d712a37947.png', '2018-08-02 00:19:13', 0),
(27, 1, 12, 'Lorem Ipsum is simply', 2, 856.04, 'uploads/8147397401.png', '2018-08-02 00:19:45', 0),
(28, 1, 11, 'Lorem ipsum dolor sit amet sed do eiusmod', 1, 500.55, 'uploads/4ebef5562f.png', '2018-08-02 02:39:52', 0),
(29, 1, 12, 'Lorem Ipsum is simply', 1, 428.02, 'uploads/8147397401.png', '2018-08-02 02:50:52', 0),
(30, 1, 15, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/d712a37947.png', '2018-08-02 02:50:52', 0),
(31, 1, 4, 'Lorem Ipsum is simply', 1, 220.97, 'uploads/fa56e62bef.jpg', '2018-08-02 02:50:52', 0),
(32, 1, 13, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/bd293afbce.jpg', '2018-08-06 03:29:05', 0),
(33, 2, 19, 'LED Monitor K202HQL', 12, 78756.00, 'uploads/346c11f644.png', '2020-06-18 15:33:51', 0),
(34, 2, 15, 'Laundry machine ', 1, 3200.00, 'uploads/d712a37947.png', '2020-06-18 15:33:51', 0),
(35, 2, 15, 'Laundry machine ', 1, 3200.00, 'uploads/d712a37947.png', '2020-06-18 20:02:53', 0),
(36, 2, 17, ' iPhone 6 - Smartphone', 1, 34999.00, 'uploads/dd277d68bd.jpg', '2020-06-18 20:02:53', 0),
(37, 2, 18, 'iPhone 8 Plus', 1, 109999.00, 'uploads/33ce6b99f4.jpg', '2020-06-19 13:34:10', 0),
(38, 2, 21, 'EOS 77D DSLR Camera', 1, 58160.00, 'uploads/50009699d9.png', '2020-06-19 13:34:10', 0);";

$mysqli->query($query11);
