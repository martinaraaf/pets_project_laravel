<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cart; 
use App\Models\Proudct;

class CartCleanUpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:cart-clean-up-command';
    protected $signature = 'cart:clean-up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredCarts = Cart::where('expired_at', '<=', now())->get();

            foreach ($expiredCarts as $cart) {
                $product = Proudct::find($cart->product_id);
                if ($product) {
                    // Update product stock only if the cart is expired
                    $product->stock_number += $cart->quantity;
                    $product->save();
                }

                // Remove the item from the cart
                $cart->delete();

                $this->info('Returned ' . $cart->quantity . ' of product ' . $cart->product_id . ' to stock.');
            }
            $this->info('Cleaned up ' . count($expiredCarts) . ' expired carts.');
    }
}
