<?php

    namespace App\MessageHandler;


    use App\Message\PurchaseConfirmationNotification;
    use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
    use Symfony\Component\Mailer\MailerInterface;
    use Symfony\Component\Messenger\Attribute\AsMessageHandler;
    use Symfony\Component\Mime\Email;

    #[AsMessageHandler]
    class PurchaseConfirmationNotificationHandler
    {
        public function __construct(private MailerInterface $mailer)
        {
        }

        /**
         * @throws TransportExceptionInterface
         */
        public function __invoke(PurchaseConfirmationNotification $notification): void
        {
            //1. Create a PDF
            echo 'Create a PDF contract note... <br>';

            // Email the contract note to the buyer
            $order = $notification->getOrder();
            $toEmail = $order->getBuyer()->getEmail();
            $orderId = $order->getOrderId();
            
            $email = (new Email())
              ->from('sales@stockapp.com')
              ->to($toEmail)
              ->subject('Contract for Order Id' . $orderId)
              ->text('This is your contract note');

            $this->mailer->send($email);
        }
    }
