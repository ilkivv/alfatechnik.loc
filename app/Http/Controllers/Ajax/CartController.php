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

        $product_id = $context['quantity'];
        $quantity = $context['quantity'];

        $total = isset($cart['total']) ? $cart['total'] : 0;
        $price = 100/*min($cart['products'][$product_id]['prices'])*/;
        $cart['quantity'] = $quantity;
        $cart['products'][$product_id] = $productModel->getProductItem($product_id);
        $cart['total'] = $total + $price * $quantity;
        $this->session->put('cart', $cart);
        return $cart;
    }

    public function getTotal()
    {
        return $this->session->get('cart.total');
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
