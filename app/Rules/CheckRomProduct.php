<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Model\ProductDetail;
class CheckRomProduct implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        if(ProductDetail::where('rom',$value)->get()->isEmpty())
            return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sản phẩm đã tồn tại';
    }
}
