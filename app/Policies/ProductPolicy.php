<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool
    {
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        //Show the page if the user id is equal to user id of product or user role is minor of 4
        if ($user->id === $product->user_id || $user->role_id < 4){
            return true;
        }else{
            return false;
        }

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        //Show the page if the user id is equal to user id of product or user role is minor of 4
        if ($user->id === $product->user_id || $user->role_id < 4){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        //
    }


    /**
     * Determine whether the user can permanently update state of the model.
     */
    public function acceptProduct(User $user, Product $product)
    {   
        //Get product status from database
        $dbProductState = Product::find($product->id);

        //If the db product state is differente from the actually product state verify if the requesting user has role id minor of 3
        if ($dbProductState->state !== $product->state){
            if($user->role_id <= 3 && $product->state == 'accepted') {
                return true;
            }
            else if ($user->role_id > 3 && $product->state == 'accepted'){
                return false;
            }
            else{   
                return true;
            }
        }
        else{

            $product->state = 'pending';
            $product->save();
            return true;
        }
    }
}
