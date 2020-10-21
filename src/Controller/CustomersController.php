<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CustomersController extends AbstractController
{
    /**
     * @Route("/customers", name="customers")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $dql1 = "SELECT c,s 
                    FROM \App\Entity\Customer c 
                        JOIN c.customerStatus s
                    ORDER BY c.name";
        $query = $em->createQuery($dql1);

        $customers = $query->getResult();
        $orders = [];
        foreach ($customers as $customer) {
            $dql2 = "SELECT o
                        FROM \App\Entity\Order o JOIN o.customer c                         
                        WHERE c.customerId=:customerId";
            $query = $em->createQuery($dql2)
                        ->setParameter("customerId", $customer->getCustomerId());
            $ordersResult = $query->getResult();

            // loop through the orders for the totals
            $total = 0;
            $orderCount = 0;
            $totalThreeMonths = 0;
            $totalLastYear = 0;
            foreach ($ordersResult as $order) {
                // get total for all orders
                $total += $order->getOrderTotal();

                // get total completed in the last 3 months
                if ($order->getOrderStatus() == "Completed"
                    && $order->getCreatedDateTime()->getTimestamp() > strtotime('-3 month')) {
                    $totalThreeMonths += $order->getOrderTotal();
                }

                // get all total orders in the last year
                if ($order->getCreatedDateTime()->getTimestamp() > strtotime('-12 month')) {
                    $totalLastYear += $order->getOrderTotal();
                }

                $orderCount++;
            }

            $colour = "";
            // if total for last three months is over 200, customer is green
            if ($totalThreeMonths > 200) {
                $colour = 'green';
            }

            // if there are no orders in the last year, customer is orange
            // (this includes non-completed orders)
            if ($totalLastYear == 0) {
                $colour = 'orange';
            }

            // if customer is removed, colour is red
            if ($customer->getCustomerStatus()->getCode() == "RE") {
                $colour = 'red';
            }
            $orders[$customer->getCustomerId()] = [
                'total' => $total,
                'count' => $orderCount,
                'colour' => $colour
            ];

        }

        return $this->render('customers/index.html.twig', [
            'customers' => $customers,
            'orders' => $orders
        ]);
    }
}
