## Working on Asynchronous Symfony
### Completed till now
1. Setup a symfony project `symfony  new async-symfony`
2. Installed composer packages `composer install`
3. Set up a controller with route `/buy` which contained an anonymous class which generates orderId and an email id 
   for the buyer of that order Id
4. Dispatched an event with the `PurchaseConfirmationNotification` message passing in the order generated through 
   the anonymous class in step 3.
5. Set up a message and a message handler for `PurchaseConfirmationNotification` 
6. The Message for `PurchaseConfirmationNotification` is set up to send back the order created
7. An `__invoke()` function is configured on the `PurchaseConfirmationNotification` handler which does the following.
   - Create a Contract note PDF
   - Email the buyers to the email set in the $order

8. Installed the messenger package `composer require messenger`
9. Installed the debug bundle which provided a lot more in addition to twig `composer require debug`
10. Installed mailer service with an option to set up a test email server using docker <br/>`composer require 
   symfony/mailer`
11. Setup autowiring for mailer `php bin/console debug:autowiring mailer`
12. Started the test mail server using docker `docker-compose up -d`
13. Checked the inbox of the mail server `symfony open:local:webmail` 

### In progress [Section 4](https://youtu.be/wJr8r8Edvp8?list=PLQH1-k79HB39ZGddNOgbaU6Oamgcw7hBF&t=597)

