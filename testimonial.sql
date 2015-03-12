# Copyright (c) 2015 Intelliant
#
# Product fuzzy search module
# 
# The MIT License (MIT)
# 
#
# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:
#
# The above copyright notice and this permission notice shall be included in all
# copies or substantial portions of the Software.
#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
# SOFTWARE.
#
#  @author Intelliant (open.ant@intelliant.net)

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL, # can be 'video' or 'text'
  `content` varchar(2000) NOT NULL, # for youtube video use, store the embed url herein, see sample data below
  `create_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expiry_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `Party_id` (`person_id`)
) ENGINE=InnoDB ;


--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `door_no` varchar(128) NOT NULL,
  `street_name1` varchar(128) NOT NULL,
  `street_name2` varchar(128) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin` int(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ;

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD CONSTRAINT `testimonial_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Sample data for testimonials
--

INSERT INTO `person` (`id`, `email`, `firstname`, `lastname`, `door_no`, `street_name1`, `street_name2`, `city`, `pin`, `state`, `country`) VALUES
(1, 'person@example.in', 'John', 'Doe', '10', 'Street1', 'Street2', 'City', 123456, 'State', 'Country');
INSERT INTO `testimonial` (`id`, `person_id`, `type`, `content`, `create_timestamp`, `update_timestamp`, `expiry_timestamp`) VALUES
(1, 1, 'video', 'https://www.youtube.com/embed/5BRVHKG_hpU', '2014-10-22 03:30:56', '2014-10-22 04:38:11', '0000-00-00 00:00:00'),
(1, 2, 'text', 'Thank you, it was an easy and great experience exchanging my phone for cash. Truly appreciate the great job you are doing, because for people like me who don''t have the time to go asking people if they''d like to buy my old phone, you make it so simple doing just that. Thank you once again.', '2014-10-22 03:54:53', '2014-11-15 14:42:14', '0000-00-00 00:00:00');
