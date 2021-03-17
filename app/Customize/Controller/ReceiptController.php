<?php

namespace Customize\Controller;

use Eccube\Common\Constant;
use Eccube\Controller\AbstractController;
use Customize\Repository\ReceiptRepository;
use Eccube\Util\FormUtil;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ReceiptController extends AbstractController
{
    /**
     * @var ReceiptRepository
     */
    protected $receiptRepository;
    /**
     * ReceiptController constructor.
     *
     * @param ReceiptRepository $receiptRepository
    */
    public function __construct(
        ReceiptRepository $receiptRepository     
    ) {
        $this->receiptRepository = $receiptRepository;
    }
    /**
     * Show Receipt Page
     *
     * @Route("/products/receipt/{id}", name="Receipt_Page", methods={"GET"}, requirements={"id" = "\d+"})
     * @param int $id
     * @Template("Order/receipt.twig")
     */
    public function showReceipt($id)
 {
    $order = $this->receiptRepository->findOrderWithID($id);
        return [
        'Order' => $order,
        ];
 }
}
