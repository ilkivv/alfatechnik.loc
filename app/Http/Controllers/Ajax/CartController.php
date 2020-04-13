<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use App\Product;

class CartController extends Controller
{
    private $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function getCart()
    {
        return $this->session->has('cart') ? $this->session->get('cart') : $this->session->pull('cart');
    }

    public function checkCartItem()
    {
        $products = $this->session->get('cart.products');
        print_r($products);
    }

    public function addCart(Request $request, Product $productModel)
    {
        $context = $request->all();
        $cart = $this->getCart();

        $product_id = $context['product_id'];
        $quantity = $context['quantity'];

        $total = isset($cart['total']) ? $cart['total'] : 0;

        $cart['quantity'] = $quantity;
        if (!isset($cart['products'][$product_id])){
            $cart['products'][$product_id] = $productModel->getProductItem($product_id);
            print_r($productModel->getProductItem($product_id));
            $cart['products'][$product_id]['quantity_order'] = 0;
            $cart['products'][$product_id]['quantity_item'] = 0;
            $cart['products'][$product_id]['total_item'] = 0;
        }
        $price = $cart['products'][$product_id]['prices'][0]['price'];
        $cart['products'][$product_id]['price_item'] = $price;
        $cart['products'][$product_id]['quantity_item'] += $quantity;
        $cart['products'][$product_id]['total_item'] += $price * $quantity;
        $cart['total'] = $total + $price * $quantity;
        $this->session->put('cart', $cart);
        return $cart;
    }

    public function getTotal()
    {
        return $this->session->get('cart.total') ? $this->session->get('cart.total') : 0;
    }

    public function destroyCart()
    {
        return $this->session->forget('cart');
    }

    protected function getContent()
    {
        $content = $this->session->has($this->instance)
            ? $this->session->get($this->instance)
            : new Collection;

        return $content;
    }
}
