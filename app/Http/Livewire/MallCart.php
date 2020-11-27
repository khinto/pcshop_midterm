<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Darryldecode\Cart\Cart;

class MallCart extends Component
{

    public $cartItems=[];



    protected $listeners = ['cartUpdated' => 'onCartUpdate'];




    public function mount()
    {
        $this->cartItems = \Cart::session(auth()->id())->getContent()->toArray();




    }

    public function onCartUpdate()
    {


        $this->mount();


    }






    public function render()
    {

        $products= Product::take(12)->get();
        return view('livewire.mall-cart',['allProducts' => $products]);
    }
}
