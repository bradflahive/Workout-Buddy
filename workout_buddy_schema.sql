--
-- Database: workout_buddy
--

DROP DATABASE workout_buddy;
CREATE DATABASE workout_buddy;
USE workout_buddy;

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE user (
  user_id int unsigned NOT NULL AUTO_INCREMENT,
  first_name varchar(100) NOT NULL DEFAULT '',
  last_name varchar(100) NOT NULL DEFAULT '',
  user_name varchar(100) NOT NULL DEFAULT '',
  age INT unsigned NOT NULL,
  password char(41) NOT NULL DEFAULT '',
  email varchar(100) NOT NULL DEFAULT '',
  member_since varchar(5) NOT NULL DEFAULT '',
  photo varchar(150) NOT NULL DEFAULT '../images/three.jpg',
  PRIMARY KEY (user_id)
);

-- 
-- Table structure for table activity
--

CREATE TABLE activity (
    activity_id int unsigned NOT NULL AUTO_INCREMENT,
    activity_name varchar(255) NOT NULL DEFAULT '',
    PRIMARY KEY (activity_id)
);

-- 
-- Table structure for table location
--

CREATE TABLE location (
    location_id int unsigned NOT NULL AUTO_INCREMENT,
    location_name varchar(255) NOT NULL DEFAULT '',
    PRIMARY KEY (location_id)
);

--
-- Table structure for table user_activity_location
--
CREATE TABLE user_activity_location (
    user_id int unsigned NOT NULL,
    activity_id int unsigned NOT NULL,
    location_id int unsigned NOT NULL,
    time INT unsigned NOT NULL,
    day INT unsigned NOT NULL,
    intensity varchar(10) NOT NULL DEFAULT '',
    invitee_name varchar(31) NOT NULL DEFAULT 'No Invitee',
    PRIMARY KEY (user_id, activity_id, location_id, time, day)
);

-- --------------------------------------------------------

--
-- Dumping data for table user
--

INSERT INTO user (first_name, last_name, user_name, age, password, email, member_since) 
VALUES 
('Brad', 'Flahive', 'bflahive', 25, 'password', 'brad@gmail.com', '2005'),
('Russ', 'Wolf', 'rwolf', 28, 'password', 'russ@gmail.com', '2007'),
('David', 'Stevens', 'dstevens', 28, 'password', 'david@gmail.com', '2009'),
('Mark', 'Ragano', 'mragano', 30, 'password', 'mark@gmail.com', '2008'),
('John', 'Cox', 'jcox', 25, 'password', 'john@gmail.com', '2009'),
('Jon', 'Nyman', 'jnyman', 30, 'password', 'jon@gmail.com', '2010'),
('Ryan', 'Morrow', 'rmorrow', 24, 'password', 'ryan@gmail.com', '2011'),
('Nathan', 'Atkin', 'natkinson', 31, 'password', 'nathan@gmail.com', '2013'),
('Sarah', 'Stein', 'sstein', 35, 'password', 'sarah@gmail.com', '2012'),
('Tiffany', 'Lewis', 'tlewis', 21, 'password', 'tiffany@gmail.com', '2014'),
('Angela', 'Johnson', 'ajohnson', 22, 'password', 'angela@gmail.com', '2007'),
('Carmelo', 'Anthony', 'canthony', 33, 'password', 'carmelo@gmail.com', '2013'),
('Earl', 'Boykins', 'eboykins', 35, 'password', 'earl@gmail.com', '2008'),
('Greg', 'Buckner', 'gbuckner', 27, 'password', 'greg@gmail.com', '2013'),
('Marcus', 'Camby', 'mcamby', 26, 'password', 'marcus@gmail.com', '2008'),
('Reggie', 'Evans', 'revans', 41, 'password', 'reggie@gmail.com', '2009'),
('Julius', 'Hodge', 'jhodge', 38, 'password', 'julius@gmail.com', '2010'),
('Kenyon', 'Martin', 'kmartin', 38, 'password', 'kenyon@gmail.com', '2011'),
('Andre', 'Miller', 'amiller', 19, 'password', 'andre@gmail.com', '2013'),
('Byron', 'Russell', 'brussel', 20, 'password', 'byron@gmail.com', '2012'),
('Earl', 'Watson', 'ewatson', 46, 'password', 'watson@gmail.com', '2014'),
('Britt', 'Griner', 'bgriner', 22, 'password', 'britney@gmail.com', '2007');

--
-- Dumping data for table activity
--

INSERT INTO activity (activity_name)
VALUES
('Basketball'), ('Running'), ('Walking'), ('Hiking'), ('Tennis'), 
('Raquetball'), ('Football'), ('Weight Lifting'), ('Ab Workout'), ('Biking'),
('Backpacking'), ('Canoeing'), ('Caving'), ('Climbing'), ('Kayaking'),
('Rafting'), ('Water Sports'), ('Swimming'), ('Elliptical'), ('Yoga'),
('Pilates'), ('Crossfit'), ('Spinning'), ('Zumba'), ('Disc Golf'),
('Ultimate Frisbee'), ('Rock Climbing'), ('Skiing'), ('Surfing'), ('Snow Boarding'),
('Park Workout'), ('Body Weight'), ('Sprinting'), ('Aerobics'), ('Circuit Training'),
('Flexibility Training'), ('Strength Training'), ('Resistance Training'), ('Core Workout'), ('Plyometrics'), 
('Longboarding'), ('Marathon Training'), ('Dance'), ('Sparring'), ('Boxing'),
('MMA'), ('Meditation'), ('Nordic Walking'), ('Volleyball'), ('Soccer'), 
('Jump Rope');

--
-- Dumping data for table location
--

INSERT INTO location (location_name)
VALUES
('Lifetime Fitness - N. Phoenix'), ('Lifetime Fitness - E. Phoenix'),
('Lifetime Fitness - S. Phoenix'), ('Lifetime Fitness - W. Phoenix'),
('Lifetime Fitness - C. Phoenix'), ('Lifetime Fitness - N. Scottsdale'),
('Lifetime Fitness - S. Scottsdale'), ('Lifetime Fitness - C. Scottsdale'), ('Lifetime Fitness - Tempe'),
('YMCA - N. Phoenix'), ('YMCA - E. Phoenix'), ('YMCA - S. Phoenix'), ('YMCA - W. Phoenix'),
('YMCA - C. Phoenix'), ('YMCA - N. Scottsdale'), ('YMCA - S. Scottsdale'), ('YMCA - C. Scottsdale'),
('YMCA - Tempe'), ('Planet Fitness - N. Phoenix'), ('Planet Fitness - E. Phoenix'),
('Planet Fitness - S. Phoenix'), ('Planet Fitness - W. Phoenix'),
('Planet Fitness - C. Phoenix'), ('Planet Fitness - N. Scottsdale'), ('Planet Fitness - S. Scottsdale'),
('Planet Fitness - C. Scottsdale'), ('Planet Fitness - Tempe'),
('24hr Fitness - N. Phoenix'), ('24hr Fitness - E. Phoenix'), ('24hr Fitness - S. Phoenix'),
('24hr Fitness - W. Phoenix'), ('24hr Fitness - C. Phoenix'),
('24hr Fitness - Tempe'), ('Camelback Mountain'), ('Lookout Mountain'),
('Squaw Peak'), ('Deem Hills'), ('Pinnacle Peak'), ('Four Peak'), ('Roadrunner Park'),
('Dust Devil Park'), ('Encanto Park'), ('Chapparal Park'), ('Altadena Park'), ('Buffalo Ridge Park'),
('Tempe Town Lake');

--
-- Test data for table location
--

INSERT INTO user_activity_location (user_id, activity_id, location_id, time, day, intensity) 
VALUES
(1, 1, 1, 0, 0, 1),
(2, 1, 1, 0, 0, 1),
(3, 1, 1, 0, 0, 1),
(4, 1, 1, 0, 0, 1),
(5, 1, 1, 0, 0, 1),
(6, 1, 1, 0, 0, 1),
(7, 1, 1, 0, 0, 1),
(8, 1, 1, 0, 0, 1),
(9, 1, 1, 0, 0, 1),
(1, 2, 10, 6, 1, 1),
(2, 2, 10, 6, 1, 1),
(3, 2, 10, 6, 1, 1),
(4, 2, 10, 6, 1, 1),
(5, 2, 10, 6, 1, 1),
(6, 2, 10, 6, 1, 1),
(10, 3, 20, 2, 4, 3),
(11, 3, 20, 2, 4, 3),
(12, 3, 20, 2, 4, 3),
(13, 3, 20, 2, 4, 3),
(14, 3, 20, 2, 4, 3),
(2, 4, 34, 1, 5, 1),
(3, 4, 34, 1, 5, 1),
(5, 4, 34, 1, 5, 1),
(6, 4, 34, 1, 5, 1),
(7, 4, 34, 1, 5, 1),
(8, 4, 34, 1, 5, 1),
(9, 4, 34, 1, 5, 1);















