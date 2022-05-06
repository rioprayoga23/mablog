<?php

namespace App\Models;


class Post_
{
    private static $blog_posts = [
        [
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "author" => "Rio Prayoga",
            "body" => "
            Lorem ipsum dolor sit amet consectetur adipisicing elit. In ut ex assumenda, nostrum officia similique sit! Iure ad illum quaerat reprehenderit blanditiis sunt assumenda, praesentium nisi neque incidunt tenetur, aliquid, est unde doloribus labore quam similique consectetur soluta maiores necessitatibus magnam nostrum obcaecati! Facere laborum expedita nobis. Velit quas similique, porro commodi cupiditate fugiat tenetur modi pariatur voluptatum iure illum quo cum architecto minima voluptas aut reiciendis, veniam eligendi unde. Aut soluta praesentium dolorum odio nesciunt asperiores tempora cupiditate, nostrum ducimus itaque iure magni. Numquam, vel vero hic quasi modi assumenda aut animi doloremque? Officia tenetur neque mollitia odit molestiae?"
        ],
        [
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "author" => "Serina Azahra",
            "body" => "
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est veritatis, eius assumenda vel praesentium consectetur omnis totam cumque nisi suscipit accusamus nulla modi voluptatum. Vero ab odit dolore necessitatibus minima cupiditate commodi mollitia nulla error assumenda sint temporibus obcaecati consectetur ullam enim exercitationem rem velit, consequatur, dolorum aliquid, reprehenderit iure? Nesciunt ipsa odit enim assumenda sunt cumque, dicta deserunt earum facilis in modi eveniet incidunt, nam sapiente eligendi fugit inventore similique quisquam. Ea natus nulla officiis eius pariatur harum at iste nam, ipsum libero sit quia unde autem dolorem nobis doloribus amet cumque porro et! Blanditiis eum perspiciatis, repellat quis numquam dicta laudantium sit, suscipit possimus necessitatibus deleniti aut explicabo autem et ipsam voluptatum placeat vitae assumenda, voluptates excepturi earum."
        ]
        ];    

    public static function all() 
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        $posts = static::all();
        
        return $posts->firstWhere("slug", $slug);   
    }

}

