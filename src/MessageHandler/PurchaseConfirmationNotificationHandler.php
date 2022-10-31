<?php

    namespace App\MessageHandler;


    use App\Message\PurchaseConfirmationNotification;
    use Symfony\Component\Messenger\Attribute\AsMessageHandler;

    #[AsMessageHandler]
    class PurchaseConfirmationNotificationHandler
    {
        public function __invoke(PurchaseConfirmationNotification $notification)
        {
            //1. Create a PDF
            echo 'Create a PDF contract note... <br>';

            // Email the contract note to the buyer
            echo 'Email the PDF contract note. ' . $notification->getOrder()->getBuyer()->getEmail() . '<br/>';
        }
    }
