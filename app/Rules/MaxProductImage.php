<?php

namespace App\Rules;

use App\Models\Product;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class MaxProductImage implements Rule, DataAwareRule
{
    /**
     * All of the data under validation.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $paramsId = request()->route('product');
        $product = Product::findOrFail($paramsId);

        $count_deleted = isset($this->data['deleted_images']) ? count($this->data['deleted_images']) : 0;
        $count_new = $this->data['images'] ? count($this->data['images']) : 0;
        $count_existing = $product->productImages()->count();
        $max_image = \Config::get('constants.max_product_image');

        if ($count_existing - $count_deleted + $count_new <= $max_image) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Max ' . \Config::get('constants.max_product_image') . ' images allowed';
    }
}
