# API-Mailer
### Why API-Mailer
I created API-Mailer to reduce the complexity of contact forms. Instead of creating a new script to handle mailing each time, I can just call this api and be done. 

### Security
Due to the endpoint being unauthenticated, you will need other security measures. Possibilities include modifying the .htaccess file, or setting the Access-Control-Allow-Origin header for specific sites. Included in the repo is a .htaccess file that handles the basic security of domain white listing. You should also make your own security measures on top of this.

### Use
To use API-Mailer, hit the endpoint where ever that may be on your web server with a JSON Post. The body of the request should contain 'subject', 'body', 'htmlBody, 'toAddress', and 'fromName'.

### Setup and Configuration
1. Clone or download the repo
2. Create a new directory on your webserver such as "mail" so you have example.com/mail/
3. Copy the contents of the repo into the new "mail" directory
4. Modify MailerConfig.php so that it matches the credentials of the mail server you will be connecting to
5. Modify the .htaccess file to whitelist certain domains that you want to be able to access the mailer
6. Once these steps are complete, the url of example.com/mail/ can be hit with the following HTTP POST JSON body

### Sample JSON Request Body
```JSON
{
  "subject": "My Subject Line",
  "body": "Hey there!",
  "htmlBody": "<b>Hey There!</b>",
  "toAddress": "recipient@example.com",
  "fromName": "Sender Name"
}
```

### Sample cURL Request
```
curl -X "POST" "http://127.0.0.1:8080/Mailer/" \
	-H "Content-Type: application/json" \
	-d "{\"subject\":\"My Subject Line\",\"toAddress\":\"recipient@example.com\",\"body\":\"Hey there!\",\"htmlBody\":\"<b>Hey There!</b>\",\"fromName\":\"Sender Name\"}"
```
