# API-Mailer
### Why API-Mailer
I created API-Mailer to reduce the complexity of contact forms. Instead of creating a new script to handle mailing each time, I can just call this api and be done. 

### Security
Due to the endpoint being unauthenticated, you will need other security measures. Possibilities include modifying the .htaccess file, or setting the Access-Control-Allow-Origin header for specific sites. Included in the repo is a .htaccess file that handles the basic security of domain white listing. You should also make your own security measures on top of this.

### Use
To use API-Mailer, hit the endpoint where ever that may be on your web server with a JSON Post. The body of the request should contain 'subject', 'body', 'htmlBody, 'toAddress', and 'fromName'.

### Sample JSON Request Body
```JSON
{
  "subject": "",
  "body": "",
  "htmlBody": "",
  "toAddress": "",
  "fromName": ""
}
```

### Sample cURL Request
```
curl -X "POST" "http://127.0.0.1:8080/Mailer/" \
	-H "Content-Type: application/json" \
	-d "{\"subject\":\"My Subject Line\",\"toAddress\":\"recipient@example.com\",\"body\":\"Hey there!\",\"htmlBody\":\"<b>Hey There!</b>\",\"fromName\":\"Sender Name\"}"
```
