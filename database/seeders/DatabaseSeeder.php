<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Jobs\CreateImage;
use App\Models\Main_category;
use App\Models\Product;
use App\Models\Role;
use App\Models\Sub_category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    
    public function roleSeed(){
        $roles = ['super_admin', 'admin', 'revisor', 'user'];

        foreach($roles as $key => $role){
            Role::create([
                'id' => $key + 1,
                'type' => $role,
            ]);
        }
    }

    public function baseUserSeed(){
        $baseUsers = [[
            'id' => 1,
            'name' => 'Super',
            'surname' => 'User',
            'nickname' => 'SuperUser',
            'email' => 'su@test.it',
            'email_verified_at' => Carbon::now(),
            'password' =>  'SuperPassword',
            'role_id' => 1
        ], [
            'id' => 2,
            'name' => 'Admin',
            'surname' => 'User',
            'nickname' => 'AdminUser',
            'email' => 'au@test.it',
            'email_verified_at' => Carbon::now(),
            'password' =>  'AdminPassword',
            'role_id' => 2
        ], [
            'id' => 3,
            'name' => 'Revisor',
            'surname' => 'User',
            'nickname' => 'RevisorUser',
            'email' => 'ru@test.it',
            'email_verified_at' => Carbon::now(),
            'password' =>  'RevisorPassword',
            'role_id' => 3
        ], [
            'id' => 4,
            'name' => 'Normal',
            'surname' => 'User',
            'nickname' => 'NormalUser',
            'email' => 'nu@test.it',
            'email_verified_at' => Carbon::now(),
            'password' =>  'NormalPassword',
            'role_id' => 4
        ]];

        foreach($baseUsers as $key => $baseUser){
            User::create([
                'id' => $baseUser['id'],
                'name' => $baseUser['name'],
                'surname' => $baseUser['surname'],
                'nickname' => $baseUser['nickname'],
                'email' => $baseUser['email'],
                'email_verified_at' => $baseUser['email_verified_at'],
                'password' =>  Hash::make($baseUser['password']),
                'role_id' => $baseUser['role_id']
            ]);
        }
    }

    public function categorieSeed(){
        $categories = Http::get('https://fakestoreapi.com/products/categories')->json();
        $icons = ['bi-phone', 'bi-gem', 'bi-gender-male', 'bi-gender-female'];
        $subcategories = ['Pants', 'T-Shirts', 'Hoodies', 'Pc', 'Smartphone', 'Hearphones', 'Rings', 'Earrings', 'Necklaces'];

        foreach($subcategories as $key => $category)
        {
            Sub_category::create([
                'name' => substr($category, 0, 50),
            ]);
        }


        foreach($categories as $key => $category)
        {
            $mainCategory = Main_category::create([
                'name' => substr($category, 0, 50),
                'icon' => $icons[$key],
            ]);

            if($key === 0){
                $mainCategory->subCategories()->attach([4, 5, 6]);
            }
            elseif($key === 1){
                $mainCategory->subCategories()->attach([7,8,9]);
            }else{
                $mainCategory->subCategories()->attach([1,2,3]);
            }

            $mainCategory->save();
        }
    }

    public function productSeed(){

        
        $products = Http::get('https://fakestoreapi.com/products')->json();
        
        foreach($products as $product)
        {
            $user = rand(1, 4);
            $title = substr($product['title'], 0, 50);
            $imageTitle = Str::slug($title, '_');

            $newProduct = Product::create([
                'title' => $title,
                'description' => substr($product['description'], 0, 500),
                'price' => $product['price'],
                'user_id' => $user,
                'state' => 'accepted'
            ]);

            $newProduct->categories()->attach([rand(1, 4), rand(1, 4)]);

            $newProduct->images()->create(['path' => "images/$user/crop_300x200_$imageTitle.jpg"]);

            $newProduct->save();


            Storage::put("public/images/$user/$imageTitle.jpg", file_get_contents($product['image']));
            dispatch(new CreateImage("images/$user/$imageTitle.jpg", 300, 200));
            if(Storage::exists("public/images/$user/$imageTitle.jpg")){
               Storage::delete("public/images/$user/$imageTitle.jpg");
               /*
                   Delete Multiple files this way
                   Storage::delete(['upload/test.png', 'upload/test2.png']);
               */
           }else{
               echo('File does not exist.');
           }
        }
    }
    
    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->roleSeed();
        $this->baseUserSeed();
        $this->categorieSeed();
        $this->productSeed();

    }
}
