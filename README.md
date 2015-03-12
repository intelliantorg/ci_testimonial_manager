#CodeIgniter Testimonial Manager

Requires CodeIgniter 2.2.0 (has not been tested on other versions)

###Usage Instructions

For a quick trial follow these steps (recommended to be executed on a trial installation only and thereafter adapt to ones needs):

1. Execute testimonial.sql on the CI connected database to create the minimum required tables and load the sample testimonial data

2. Place the files from the repository in the respective paths of your CI setup

3. Include the following lines $route['testimonial']='testimonial/index'; in your routes.php file below the default_controller route

4. Access the rendered testimonials at <site_base_url>/testimonial
 
###Planned work:
Implement an admin backend to load the testimonials
