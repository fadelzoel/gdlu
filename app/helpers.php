<?php

if (! function_exists('whatsapp_link')) {
    function whatsapp_link(\App\Models\Product $product, string $number = '6281376753900'): string
    {
        $price = number_format($product->price, 0, ',', '.');

        $message = "Hi! I'm interested in buying:\n\n"
                 . "*{$product->name}*\n"
                 . "Price: Rp{$price}\n\n"
                 . "Please let me know if it's available!";

        return "https://wa.me/{$number}?text=" . urlencode($message);
    }
}