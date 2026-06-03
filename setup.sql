-- Haramaya University Navigator - Database Setup
-- Note: Database creation and selection is handled by db.php

-- ===== TABLES =====
CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    icon VARCHAR(50) NOT NULL,
    color VARCHAR(20) NOT NULL,
    category ENUM('academic','services','facilities') NOT NULL,
    description TEXT NOT NULL,
    location_area VARCHAR(150) NOT NULL,
    hours TEXT NOT NULL,
    phone VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    map_x INT NOT NULL DEFAULT 100,
    map_y INT NOT NULL DEFAULT 100,
    map_width INT NOT NULL DEFAULT 150,
    map_height INT NOT NULL DEFAULT 120,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS location_features (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_id INT NOT NULL,
    feature VARCHAR(200) NOT NULL,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS location_services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_id INT NOT NULL,
    service VARCHAR(200) NOT NULL,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    from_slug VARCHAR(50) NOT NULL,
    to_slug VARCHAR(50) NOT NULL,
    distance VARCHAR(50) NOT NULL,
    duration VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS route_steps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    route_id INT NOT NULL,
    step_order INT NOT NULL,
    instruction VARCHAR(255) NOT NULL,
    detail VARCHAR(255),
    distance VARCHAR(20),
    FOREIGN KEY (route_id) REFERENCES routes(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200),
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_read TINYINT DEFAULT 0
);

-- ===== LOCATIONS (7 total — NO Cafeteria) =====
-- id=1: library, id=2: agriculture, id=3: humanities,
-- id=4: computing, id=5: admin, id=6: dorms, id=7: stadium
INSERT INTO locations (slug,name,icon,color,category,description,location_area,hours,phone,email,map_x,map_y,map_width,map_height) VALUES
('library','University Library','fa-book','#1976d2','academic','The Haramaya University Library is the central academic resource hub, housing over 80,000 volumes, extensive digital journals, and dedicated research spaces that support the university\'s wide range of programmes.','North Campus, Academic Zone','Mon–Fri: 8:00 AM – 9:00 PM<br>Sat: 9:00 AM – 5:00 PM<br>Sun: Closed','+251 25 553 0001','library@haramaya.edu.et',80,60,170,130),
('agriculture','College of Agriculture','fa-seedling','#2e7d32','academic','The College of Agriculture is the founding college of Haramaya University and remains its flagship. It offers degree programmes in agronomy, horticulture, animal science, and agricultural economics, underpinned by working research farms.','North-East Campus, Agriculture Block','Mon–Fri: 7:30 AM – 5:30 PM<br>Sat: 8:00 AM – 1:00 PM<br>Sun: Closed','+251 25 553 0002','agriculture@haramaya.edu.et',305,60,170,130),
('humanities','College of Humanities','fa-book-open','#c62828','academic','The College of Social Sciences and Humanities offers programmes in Ethiopian languages, history, sociology, psychology, and communication. It plays a central role in preserving and promoting the diverse cultural heritage of Ethiopia.','North-West Campus, Humanities Block','Mon–Fri: 7:30 AM – 5:30 PM<br>Sat: 8:00 AM – 12:00 PM<br>Sun: Closed','+251 25 553 0003','humanities@haramaya.edu.et',530,60,170,130),
('computing','Computing & Informatics','fa-laptop-code','#1565c0','academic','The College of Computing and Informatics provides modern computer laboratories and quality education in computer science, information technology, and software engineering, equipping graduates with skills for Ethiopia\'s growing digital economy.','Central Campus, ICT Building','Mon–Fri: 7:30 AM – 6:00 PM<br>Sat: 8:00 AM – 2:00 PM<br>Sun: Closed','+251 25 553 0004','computing@haramaya.edu.et',80,240,170,130),
('admin','Administration','fa-building','#7b1fa2','services','The Administration Building is the administrative heart of Haramaya University, housing the Office of the President, Registrar, Finance, Student Affairs, and all key administrative services for students and staff.','Central Campus, Main Compound','Mon–Fri: 8:30 AM – 5:30 PM<br>Sat: 9:00 AM – 12:00 PM<br>Sun: Closed','+251 25 553 0091','admin@haramaya.edu.et',305,240,170,130),
('dorms','Student Dormitories','fa-home','#388e3c','facilities','The Student Dormitories provide comfortable on-campus accommodation for thousands of Haramaya University students. Separated into male and female blocks, the facilities include furnished rooms, common study areas, and recreational spaces.','West Campus, Residential Area','24/7 Access for Residents<br>Front Desk: 24 hours<br>Maintenance: 8:00 AM – 5:00 PM','+251 25 553 0006','dorms@haramaya.edu.et',80,420,170,130),
('stadium','University Stadium','fa-running','#e65100','facilities','Haramaya University Stadium is a multi-purpose sports and athletics facility used for football, athletics, and major university ceremonies. It serves as a hub for student fitness, inter-college sports competitions, and community events.','South Campus, Sports Complex','Mon–Fri: 6:00 AM – 8:00 PM<br>Sat–Sun: 7:00 AM – 6:00 PM','+251 25 553 0007','stadium@haramaya.edu.et',305,420,170,130);

-- ===== FEATURES (location_id 1–7, no id=6 cafeteria) =====
INSERT INTO location_features (location_id,feature) VALUES
(1,'Over 80,000 printed volumes and textbooks'),
(1,'Access to international e-journals and databases'),
(1,'Private and group study rooms'),
(1,'Computer workstations with internet access'),
(1,'Dedicated postgraduate research section'),
(1,'Printing, scanning and photocopying facilities');

INSERT INTO location_features (location_id,feature) VALUES
(2,'Working teaching and research farm on campus'),
(2,'Soil science and plant pathology laboratories'),
(2,'Irrigation and water management demonstration site'),
(2,'Animal science and livestock research unit'),
(2,'Post-harvest technology training centre'),
(2,'Greenhouse and horticultural demonstration plots');

INSERT INTO location_features (location_id,feature) VALUES
(3,'Well-equipped lecture halls and seminar rooms'),
(3,'Language laboratory for linguistics research'),
(3,'Dedicated Ethiopian heritage and culture archive'),
(3,'Sociology and psychology research units'),
(3,'Student journalism and media practice room'),
(3,'Community outreach and extension programme office');

INSERT INTO location_features (location_id,feature) VALUES
(4,'Multiple computer laboratories with modern PCs'),
(4,'High-speed campus network and internet access'),
(4,'Software engineering and programming training rooms'),
(4,'ICT innovation and student project space'),
(4,'Server room and networking practical lab'),
(4,'Licensed software for academic use');

INSERT INTO location_features (location_id,feature) VALUES
(5,'Office of the University President'),
(5,'Registrar and student records office'),
(5,'Finance and bursar services'),
(5,'Student affairs and welfare office'),
(5,'International relations and partnerships office'),
(5,'University council and conference room');

INSERT INTO location_features (location_id,feature) VALUES
(6,'Separate male and female residential blocks'),
(6,'Furnished rooms with bed, desk and wardrobe'),
(6,'Common study and reading rooms per block'),
(6,'Shared kitchen and laundry facilities'),
(6,'24/7 security and resident advisor support'),
(6,'Recreational and social common areas');

INSERT INTO location_features (location_id,feature) VALUES
(7,'Football pitch meeting FIFA standard dimensions'),
(7,'Athletics track for running and field events'),
(7,'Covered spectator stands and seating'),
(7,'Changing rooms and shower facilities'),
(7,'Basketball and volleyball courts adjacent'),
(7,'Outdoor fitness and exercise equipment area');

-- ===== SERVICES =====
INSERT INTO location_services (location_id,service) VALUES
(1,'Book lending, renewal and returns'),
(1,'Research and reference consultation'),
(1,'Inter-library loan and document delivery'),
(1,'Study room reservation and booking'),
(1,'Digital resources and e-library access');

INSERT INTO location_services (location_id,service) VALUES
(2,'Undergraduate and postgraduate admissions'),
(2,'Agricultural extension advisory services'),
(2,'Research collaboration with farmers and NGOs'),
(2,'Laboratory practical and field training'),
(2,'Student academic advising and counselling');

INSERT INTO location_services (location_id,service) VALUES
(3,'Undergraduate programme registration'),
(3,'Language and communication skills workshops'),
(3,'Academic research mentoring'),
(3,'Cultural exchange and community events'),
(3,'Student club and society coordination');

INSERT INTO location_services (location_id,service) VALUES
(4,'Computer lab booking and access'),
(4,'Technical support and IT helpdesk'),
(4,'Student project supervision and guidance'),
(4,'Software training and workshops'),
(4,'Internet and campus network services');

INSERT INTO location_services (location_id,service) VALUES
(5,'Course and semester registration'),
(5,'Official transcript and certificate requests'),
(5,'Tuition fee payment and financial processing'),
(5,'Student ID and documentation services'),
(5,'Scholarship and bursary applications');

INSERT INTO location_services (location_id,service) VALUES
(6,'Room allocation and accommodation applications'),
(6,'Maintenance and room repair requests'),
(6,'Lost and found management'),
(6,'Residential life orientation for new students'),
(6,'Emergency accommodation assistance');

INSERT INTO location_services (location_id,service) VALUES
(7,'Venue booking for sports and university events'),
(7,'Inter-college sports competitions organisation'),
(7,'Fitness and physical education classes'),
(7,'Sports equipment rental and management'),
(7,'Athletics coaching and training programmes');

-- ===== ROUTES (no cafeteria) =====
INSERT INTO routes (from_slug,to_slug,distance,duration) VALUES
('library',    'agriculture', '350 meters', '5 minutes'),
('agriculture','library',     '350 meters', '5 minutes'),
('library',    'admin',       '500 meters', '7 minutes'),
('admin',      'library',     '500 meters', '7 minutes'),
('dorms',      'library',     '600 meters', '8 minutes'),
('library',    'dorms',       '600 meters', '8 minutes'),
('dorms',      'stadium',     '450 meters', '6 minutes'),
('stadium',    'dorms',       '450 meters', '6 minutes'),
('admin',      'computing',   '300 meters', '4 minutes'),
('computing',  'admin',       '300 meters', '4 minutes'),
('agriculture','humanities',  '200 meters', '3 minutes'),
('humanities', 'agriculture', '200 meters', '3 minutes');

-- Route 1: library → agriculture
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(1,1,'Exit the University Library through the main entrance','Turn right towards the north academic corridor',NULL),
(1,2,'Walk along the north academic pathway','Pass the notice boards on your left','150m'),
(1,3,'Turn right at the junction near the agriculture signpost','The large green College of Agriculture gate is visible ahead','100m'),
(1,4,'Enter the College of Agriculture through the main gate','The main reception block is straight ahead','100m');

-- Route 2: agriculture → library
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(2,1,'Exit the College of Agriculture through the main gate','Turn left onto the north academic pathway',NULL),
(2,2,'Walk along the north academic pathway heading west','Keep the open green area on your right','100m'),
(2,3,'Turn left at the library signpost junction','The University Library building is visible ahead','150m'),
(2,4,'Enter the University Library through the main entrance','The information desk is just inside the doors','100m');

-- Route 3: library → admin
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(3,1,'Exit the University Library through the main entrance','Turn left onto the central campus road',NULL),
(3,2,'Walk south along the central campus road','You will pass the central green square on your right','200m'),
(3,3,'Continue straight at the crossroads','The Administration Building flag mast is visible ahead','150m'),
(3,4,'Turn right onto the administration forecourt','Walk towards the main entrance steps','100m'),
(3,5,'Enter the Administration Building through the main entrance','The reception desk is directly ahead','50m');

-- Route 4: admin → library
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(4,1,'Exit the Administration Building through the main entrance','Turn left onto the central campus road heading north',NULL),
(4,2,'Walk north along the central campus road','Pass the central green square on your left','150m'),
(4,3,'Continue straight at the crossroads','Follow the library directional sign','200m'),
(4,4,'Turn right at the library signpost','The University Library entrance is ahead','100m'),
(4,5,'Enter the University Library through the main entrance','The information desk is just inside','50m');

-- Route 5: dorms → library
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(5,1,'Exit the Student Dormitories through the main gate','Turn right onto the residential access road',NULL),
(5,2,'Walk east along the residential access road','Pass the small garden area on your right','200m'),
(5,3,'Turn left at the central campus junction','Follow signs for the Academic Zone','150m'),
(5,4,'Walk north along the central campus road','The library building will appear on your right','150m'),
(5,5,'Enter the University Library through the main door','The information desk is straight ahead','100m');

-- Route 6: library → dorms
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(6,1,'Exit the University Library through the main entrance','Turn right and head south along the central campus road',NULL),
(6,2,'Walk south along the central campus road','Pass the central green square on your left','150m'),
(6,3,'Turn right at the central campus junction','Follow the residential area signs heading west','150m'),
(6,4,'Walk west along the residential access road','You will see the dormitory blocks ahead','200m'),
(6,5,'Enter the Student Dormitories through the main gate','The front desk is in the reception block','100m');

-- Route 7: dorms → stadium
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(7,1,'Exit the Student Dormitories through the main gate','Turn left towards the south campus road',NULL),
(7,2,'Walk south along the residential road','Pass the sports signboard on your right','200m'),
(7,3,'Turn left at the sports complex junction','The University Stadium entrance gate is ahead','150m'),
(7,4,'Enter the University Stadium through the main gate','The ticket office and athletics track are ahead','100m');

-- Route 8: stadium → dorms
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(8,1,'Exit the University Stadium through the main gate','Turn right onto the sports complex road',NULL),
(8,2,'Walk north along the sports complex road','Follow the residential area signpost','150m'),
(8,3,'Turn right at the residential junction','The dormitory blocks are visible ahead','200m'),
(8,4,'Enter the Student Dormitories through the main gate','Present your student ID at the front desk','100m');

-- Route 9: admin → computing
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(9,1,'Exit the Administration Building through the main entrance','Turn left heading towards the ICT Building',NULL),
(9,2,'Walk along the central campus road heading west','Pass the notice board plaza on your left','150m'),
(9,3,'Turn left at the ICT Building signpost','The Computing and Informatics entrance is straight ahead','100m'),
(9,4,'Enter the Computing and Informatics Building through the main entrance','The reception and timetable boards are in the lobby','50m');

-- Route 10: computing → admin
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(10,1,'Exit the Computing and Informatics Building through the main entrance','Turn right heading east',NULL),
(10,2,'Walk east along the central campus road','Pass the notice board plaza on your right','100m'),
(10,3,'Turn right at the administration forecourt sign','The Administration Building flag mast is straight ahead','150m'),
(10,4,'Enter the Administration Building through the main entrance','The reception desk will direct you to the correct office','50m');

-- Route 11: agriculture → humanities
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(11,1,'Exit the College of Agriculture through the main gate','Turn right along the north academic corridor',NULL),
(11,2,'Walk west along the north academic corridor','Pass the open green space between the two colleges','100m'),
(11,3,'Turn left at the Humanities College signpost','The College of Humanities entrance is ahead','100m');

-- Route 12: humanities → agriculture
INSERT INTO route_steps (route_id,step_order,instruction,detail,distance) VALUES
(12,1,'Exit the College of Humanities through the main entrance','Turn right along the north academic corridor',NULL),
(12,2,'Walk east along the north academic corridor','Pass the open green space on your right','100m'),
(12,3,'Turn right at the Agriculture College signpost','The College of Agriculture main gate is ahead','100m');
