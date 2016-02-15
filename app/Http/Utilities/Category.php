<?php 

namespace App\Http\Utilities; 

class Category
{
	protected static $categories = 
	[
		'Food',
		'Rent',
		'Electricity',
		'Water',
		'Internet',
		'Clothing',
		'Transportation',
		'Medical',
		'Insurance',
		'Household Items/Supplies',
		'Personal',
		'Debt Reduction',
		'Retirement',
		'Education',
		'Savings',
		'Subscriptions',
		'Gifts',
		'Entertainment',
	]; 

	public static function all()
	{
		return static::$categories;
	}
}