<?php

    namespace App\Controller;

    use App\Message\PurchaseConfirmationNotification;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Messenger\MessageBusInterface;
    use Symfony\Component\Routing\Annotation\Route;

    class StockTransactionController extends AbstractController
    {
        //buy
        #[Route('/buy', name: 'buy-stock')]
        public function buy(MessageBusInterface $bus): Response
        {
            // 1. Dispatch confirmation message
            // $notification->getOrder()->getBuyer()->getEmail()
            $order = new class {
                public function getOrderId(): string
                {
                    return 'JK-234234';
                }
              public function getBuyer(): object
              {
                  return new class {
                      public function getEmail(): string
                      {
                          return 'abc@fmail.com';

                      }
                  };
              }
            };

            $bus->dispatch(new PurchaseConfirmationNotification($order));

            // 2. Display confirmation to the user
            return $this->render('stocks/example.html.twig');
        }
    }
