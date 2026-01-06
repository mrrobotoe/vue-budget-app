<?php

namespace App\Observers;

use App\Models\Budget;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class UserObserver
{
    public function created(User $user)
    {
        $user->budgets()->attach(
            $budget = Budget::create(['name' => 'My Budget', 'slug' => Str::ulid()])
        );

       $budget->categories()->attach([
            $categoryBills = Category::create(['name' => 'Bills']),
            $categoryNeeds = Category::create(['name' => 'Needs']),
            $categoryWants = Category::create(['name' => 'Wants']),
        ]);

        $categoryBills->subcategories()->saveMany([
            new Category (['name' => 'Food']),
            new Category (['name' => 'TV, phone and internet']),
            new Category (['name' => 'Utilities']),
            new Category (['name' => 'Insurance']),
            new Category (['name' => 'Student loans']),
            new Category (['name' => 'Personal loans']),
            new Category (['name' => 'Music']),
            new Category (['name' => 'TV streaming']),
        ]);

        $categoryNeeds->subcategories()->saveMany([
            new Category (['name' => 'Groceries']),
            new Category (['name' => 'Transportation']),
            new Category (['name' => 'Car maintenance']),
            new Category (['name' => 'Home maintenance']),
            new Category (['name' => 'Kids']),
            new Category (['name' => 'Educational savings']),
            new Category (['name' => 'Medical expenses']),
            new Category (['name' => 'Annual credit card fees']),
            new Category (['name' => 'Taxes or other fees']),
            new Category (['name' => 'Emergency fund']),
        ]);

        $categoryWants->subcategories()->saveMany([
            new Category (['name' => 'Dining out']),
            new Category (['name' => 'Entertainment']),
            new Category (['name' => 'Hobbies']),
            new Category (['name' => 'Shopping']),
            new Category (['name' => 'Travel']),
            new Category (['name' => 'Subscriptions']),
            new Category (['name' => 'Stuff I forgot to plan for!']),
        ]);

        $user->currentBudget()->associate($budget);

        $user->save();
    }
}
