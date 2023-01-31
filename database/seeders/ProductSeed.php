<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [
            [
                'name' => 'TIRO 23 LEAGUE JERSEY',
                'description' => '<p>Provident minus voluptatem qui. Animi mollitia enim inventore vitae illo. Blanditiis sunt incidunt numquam. Qui dolorum quisquam numquam temporibus id vero quia.</p>',
                'price' => 450000,
                'category_id' => 7,
                'image' => 'jersey1.png',
            ], [
                'name' => 'GERMANY_22_AWAY_JERSEY-removebg-preview',
                'description' => '<p>Quibusdam dicta dolor et tempora. Dignissimos quos soluta reprehenderit accusantium eos. Aut cum corporis tempore fugiat excepturi consequuntur.</p>',
                'price' => 300000,
                'category_id' => 7,
                'image' => 'jersey2.png',
            ], [
                'name' => 'REAL MADRID 22/23 THIRD JERSE',
                'description' => '<p>Doloribus et repellat natus sapiente minima. Quae rerum laudantium dolorem at sapiente rerum. Sunt dolorem et ex et in aspernatur reiciendis. Dolorem est possimus aspernatur voluptas nam libero.</p>',
                'price' => 400000,
                'category_id' => 7,
                'image' => 'jersey3.png',
            ], [
                'name' => 'Nike Utility Speed',
                'description' => '<p>The Nike Utility Speed Backpack keeps your gear close, secure and organised when commuting to and from training sessions. Cushioned straps give you comfort on the go and the pack opens flat for easy access to must-have items.</p>',
                'price' => 879000,
                'category_id' => 6,
                'image' => 'bag1.png',
            ], [
                'name' => 'Nike Brasilia JDI',
                'description' => '<p>A small but mighty bag, the Nike Brasilia JDI Backpack is just the bag for wherever your day takes you. Perfect for hanging out with friends or adventuring around town, this bag features a spacious double-zip main compartment for the essentials and a smaller front pocket for the small stuff that you need to grab quickly.</p>',
                'price' => 329000,
                'category_id' => 6,
                'image' => 'bag2.png',
            ], [
                'name' => 'MANCHESTER UNITED ANTHEM JACKET',
                'description' => '<p>THE REVERSIBLE JACKET PLAYERS WEAR IN THE LINEUP, MADE WITH RECYCLED MATERIALS.</p>',
                'price' => 1500000,
                'category_id' => 5,
                'image' => 'jacket1.png',
            ], [
                'name' => 'PREMIUM ESSENTIALS CRINKLE NYLON JACKET',
                'description' => '<p>A STYLISH JACKET WITH CLEVER TREFOIL DETAILS, MADE WITH RECYCLED MATERIALS</p>',
                'price' => 2300000,
                'category_id' => 5,
                'image' => 'jacket2.png',
            ], [
                'name' => 'SONG FOR THE MUTE TEAM JACKET',
                'description' => '<p>A DURABLE ADIDAS X SONG FOR THE MUTE JACKET WITH POPS OF DETAIL.</p>',
                'price' => 4000000,
                'category_id' => 5,
                'image' => 'jacket3.png',
            ], [
                'name' => 'MENS ADICROSS X ENERGY ONE-LAYER JACKET',
                'description' => '<p>A DURABLE, HOODED GOLF JACKET MADE IN PART WITH RECYCLED MATERIALS.</p>',
                'price' => 1850000,
                'category_id' => 5,
                'image' => 'jacket4.png',
            ], [
                'name' => 'Nike Dri-FIT AeroBill Legacy91',
                'description' => '<p>Lightweight, yet bold, our AeroBill Cap gets a military-inspired, brushed camo update for your reps. Adjust the fit to your liking and hit your workout hard in breathable, sweat-wicking comfort.</p>',
                'price' => 450000,
                'category_id' => 4,
                'image' => 'hat1.png',
            ], [
                'name' => 'Nike Sportswear Heritage 86',
                'description' => '<p>Classic and comfortable, the Nike Sportswear Heritage 86 Cap features a 6-panel design made from cotton twill fabric and an adjustable closure for a snug, secure fit.</p>',
                'price' => 249000,
                'category_id' => 4,
                'image' => 'hat2.png',
            ], [
                'name' => 'Nike Sportswear Heritage86',
                'description' => '<p>DThe Nike Sportswear Heritage86 Hat has a durable 6-panel design with an adjustable strap for the perfect fit. The iconic "JUST DO IT." adds a classic look you can wear anywhere.</p>',
                'price' => 400000,
                'category_id' => 4,
                'image' => 'hat3.png',
            ], [
                'name' => 'Jordan Jumpman Classic99 Metal',
                'description' => '<p>Keep your head in the game in the Jordan Jumpman Classic99 Metal Cap. Its made from flexible stretch-woven material with a pre-curved bill and a metal Jumpman design as its centrepiece.</p>',
                'price' => 299000,
                'category_id' => 4,
                'image' => 'hat4.png',
            ], [
                'name' => 'Nike Offcourt',
                'description' => "<p>Cheer your team to victory with the Nike Offcourt Slides. Brazil-inspired graphics and colours let you rep your squad. And if that's not enough, the innovative foam midsole lets you slide from the streets to the bleachers to the beaches in all-star comfort.</p>",
                'price' => 569000,
                'category_id' => 3,
                'image' => 'sandals1.png',
            ], [
                'name' => 'Nike Offcourt Adjust',
                'description' => "<p>Post game, errands and more—adjust your comfort on the go. The adjustable, padded strap lets you perfect your fit, while the lightweight foam midsole brings first-class comfort to your feet.</p>",
                'price' => 690000,
                'category_id' => 3,
                'image' => 'sandals2.png',
            ], [
                'name' => 'Nike Offcourt',
                'description' => "<p>These slides are designed to help you relax and recharge. Innovative dual-layered foam underfoot pairs with a plush strap to bring the comfort, while the iconic AF-1 pivot circle pattern on the outsole and block-letter branding casually nod to heritage hoops. What are you waiting for? Get lounging.</p>",
                'price' => 529000,
                'category_id' => 3,
                'image' => 'sandals3.png',
            ], [
                'name' => 'Air Jordan 1 Mid SE',
                'description' => "<p>Get that Jordan energy on your feet this festive season. Rich grain leather with bright details make this pair shine like festive lights.</p>",
                'price' => 2059000,
                'category_id' => 2,
                'image' => 'shoe1.png',
            ], [
                'name' => 'Nike Air More Uptempo 96',
                'description' => "<p>How do you make an icon even better? Unleash its wild side. A medley of animal prints lends new energy and power to the Nike Air More Uptempo '96, while Max Air units in the forefoot, midfoot and heel give you unmistakable cushioning. With its distinctive '90s graffiti-style branding, there's no way you'll blend into the crowd with these kicks.</p>",
                'price' => 2669000,
                'category_id' => 2,
                'image' => 'shoe2.png',
            ], [
                'name' => 'Nike Pegasus 39',
                'description' => "<p>Let the Nike Pegasus 39 help you ascend to new heights. More lightweight up top than the Pegasus 38 and ideal to wear in any season, it has a supportive sensation to help keep your feet contained, while underfoot cushioning and double Zoom Air units (1 more than the Peg 38) give you an extra pop to your step. Your trusted workhorse with wings is back. Time to fly.</p>",
                'price' => 1829000,
                'category_id' => 2,
                'image' => 'shoe3.png',
            ], [
                'name' => 'Nike Air Force 1 07',
                'description' => "<p>The radiance lives on with the b-ball original. Crossing hardwood comfort with off-court flair, it puts a fresh spin on what you know best: era-echoing, '80s construction, bold details and nothin'-but-net style.</p>",
                'price' => 1729000,
                'category_id' => 2,
                'image' => 'shoe4.png',
            ],
        ];

        foreach ($products as $product) {
            $image = $product['image'];
            unset($product['image']);
            $insert = Product::create($product);
            $insert->ProductImages()->create([
                'image' => $image,
                'is_cover' => '1',
            ]);

        }
    }
}
