<?php

namespace App\Transformers;

use App\Model\Secret;
use League\Fractal\Transformer\Abstract;

       class SecretTransformer extends TransformerAbstract
       {
           public function transform(Secret $secret)
           {
               return [
                   'id' => $secret->id,
                   'name' => $secret->name,
                   'location' => [
                       'latitude' => $secret->latitude,
                       'longitude' => $secret->longitude,
                       'name' => $secret->location_name
                   ]
               ];
           }
       }