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

    protected function getCart()
    {
        return $this->session->has('cart') ? $this->session->get('cart') : $this->session->pull('cart');
    }

    public function checkCartItem()
    {
        $products = $this->session->get('cart.products');
        print_r($products);
    }

    public function addProduct(Request $request, Product $productModel)
    {
        $context = $request->all();
        $cart = $this->getCart();

        $product_id = $context['product_id'];
        $quantity_item = $context['quantity'];

        isset($cart['total']) ? $cart['total'] : $cart['total'] = 0;
        isset($cart['quantity']) ? $cart['quantity'] : $cart['quantity'] = 0;

        if (!isset($cart['products'][$product_id])){
            $cart['products'][$product_id] = $productModel->getProductItem($product_id);
            $cart['products'][$product_id]['quantity_item'] = 0;
            $cart['products'][$product_id]['total_item'] = 0;
        }
        $price = $cart['products'][$product_id]['prices'][0]['price'];
        $cart['products'][$product_id]['price_item'] = $price;
        $cart['products'][$product_id]['quantity_item'] += $quantity_item;
        $cart['products'][$product_id]['total_item'] += $price * $quantity_item;
        $cart['total'] += $price * $quantity_item;
        $cart['quantity'] += $quantity_item;
        $this->updateCart($cart);
        return $cart;
    }

    protected function updateCart($cart){
        return $this->session->put('cart', $cart);
    }

    public function deleteProduct(Request $request)
    {
        $context = $request->all();
        $cart = $this->getCart();

        $product_id = $context['product_id'];
        $cart['quantity'] -= $cart['products'][$product_id]['quantity_item'];
        $cart['total'] -= $cart['products'][$product_id]['total_item'];
        unset($cart['products'][$product_id]);
        $this->updateCart($cart);

        if (count($cart['products']) < 1){
            $this->destroyCart();
        }
        $this->updateCart($cart);
        $cart['view'] = (String) view('components.cart_block');
        return $cart;
    }

    public function quantityProduct(Request $request)
    {
        $context = $request->all();
        $cart = $this->getCart();

        $product_id = $context['product_id'];
        $quantity_item = $context['quantity'];
        $price = $cart['products'][$product_id]['prices'][0]['price'];
        /*
        $cart['quantity'] -= $cart['products'][$product_id]['quantity_item'];
        $cart['total'] -= $cart['products'][$product_id]['total_item'];
        */
        $cart['products'][$product_id]['quantity_item']+= 1;
        $cart['products'][$product_id]['total_item'] +=20;

        $cart['total'] += 20;
        $cart['quantity'] += 20;
        $this->updateCart($cart);
        $cart['view'] = (String) view('components.cart_block');
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
}
