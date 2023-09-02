<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Filter implements Rule
{
    protected $forbidden;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($forbidden)
    {
        //لو عنا كلمة مش مصفوفة بنخلي الكلمة سمول حروفها
        // $this->forbidden = strtolower($forbidden);
        //لو عنا مصفوفة ما بنخلي الكلمة سمول حروفها
        $this->forbidden = $forbidden;

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
            //لو كملة بنكتبها هيك مجرد مقارنة
            // return !(strtolower($value) == $this->forbidden);
            //لو مصفوفة بنقارن بهادي الطريقة
            return ! in_array(strtolower($value) , $this->forbidden);

        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This value isnt allowed';
    }
}