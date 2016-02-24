# API-Mailer
### Why API-Mailer
I created API-Mailer to help fight the need to create a 'contact.php' or similar for each and every contact form that I made for clients on their websites. Having this api allows me to collect the information needed from the contact form, send a request via AJAX post, and be on my way creating the rest of the site. It seemed silly to recreate the same functionality over and over again.

### Security
Because the endpoint is not secured by authentication there is a need to restrict access to the endpoint via a whitelist. Possible considerations are modifying the .htaccess file, setting the Access-Control-Allow-Origin header to specific sites, or other implementations. I have including a .htaccess file that handles the basic security of domain whitelisting but you should also make your own security measures as this is just a small part of the equation.

### Use
To use API-Mailer simply hit the endpoint where ever that may be on your web server with a JSON Post body containing 'subject', 'body', 'htmlBody, and 'toAddress' as the parameters.
