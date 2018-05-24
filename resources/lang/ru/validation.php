<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute должен быть заполнен.',
    'active_url'           => ':attribute не является URL.',
    'after'                => ':attribute должен быть датой позже :date.',
    'after_or_equal'       => ':attribute должен быть позже или эквивалентен :date.',
    'alpha'                => ':attribute должен состоять только из букв',
    'alpha_dash'           => ':attribute должен содержать только буквы, цифры и символы.',
    'alpha_num'            => ':attribute должен содержать только буквы и цифры.',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute должен быть датой раньше :date.',
    'before_or_equal'      => ':attribute должен быть раньше или эквивалентен :date.',
    'between'              => [
        'numeric' => ':attribute должен быть :min и :max.',
        'file'    => ':attribute должен быть :min и :max киллобайт.',
        'string'  => ':attribute должен быть :min и :max символов.',
        'array'   => ':attribute должен быть :min и :max элементов.',
    ],
    'boolean'              => ':attribute поле должно быть true или false.',
    'confirmed'            => ':attribute подтверждение не совпадает.',
    'date'                 => ':attribute не является валидной датой.',
    'date_format'          => ':attribute не соответствует формату :format.',
    'different'            => ':attribute и :other должны быть разными.',
    'digits'               => ':attribute должно быть :digits цифрой.',
    'digits_between'       => ':attribute должно быть между :min и :max.',
    'dimensions'           => ':attribute имеет недопустимые размеры изображения.',
    'distinct'             => ':attribute поле имеет повторяющееся значение.',
    'email'                => ':attribute адрес эл. почты должен быть действительным.',
    'exists'               => 'Выбранный :attribute недействительный.',
    'file'                 => ':attribute должен быть файлом.',
    'filled'               => 'Поле :attribute должно иметь значение.',
    'image'                => ':attribute должен быть изображением.',
    'in'                   => 'Выбранный :attribute неверный.',
    'in_array'             => 'Поле :attribute не существует :other.',
    'integer'              => ':attribute должен быть числом.',
    'ip'                   => ':attribute должен быть валидным IP-адресом.',
    'ipv4'                 => ':attribute должен быть валидным IPv4 адресом.',
    'ipv6'                 => ':attribute должен быть валидным IPv6 адресом.',
    'json'                 => ':attribute должен быть валидной JSON строкой.',
    'max'                  => [
        'numeric' => ':attribute может быть не больше :max.',
        'file'    => ':attribute может быть не больше :max кмллобайт.',
        'string'  => ':attribute может быть не больше :max символов.',
        'array'   => ':attribute должен иметь не больше :max элементов.',
    ],
    'mimes'                => ':attribute должен быть файлом типа: :values.',
    'mimetypes'            => ':attribute должен быть файлом типа: :values.',
    'min'                  => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file'    => ':attribute должен быть не менее :min киллобайт.',
        'string'  => ':attribute должен быть не менее :min символов.',
        'array'   => ':attribute должен иметь не менее :min элементов.',
    ],
    'not_in'               => 'Выбранный :attribute неверен.',
    'not_regex'            => 'Формат :attribute неверен.',
    'numeric'              => ':attribute должен быть числом.',
    'present'              => ':attribute поле должно присутствовать.',
    'regex'                => ':attribute формат неверен.',
    'required'             => ':attribute поле обязательно.',
    'required_if'          => ':attribute поле требуется, когда :other имеет значение :value.',
    'required_unless'      => ':attribute поле требуется, если :other имеет значение :values.',
    'required_with'        => ':attribute поле требуется, когда :values заданы.',
    'required_with_all'    => ':attribute поле требуется, когда :values заданы.',
    'required_without'     => ':attribute поле требуется, когда :values не заданы.',
    'required_without_all' => ':attribute поле требуется, если ни один из :values заданы.',
    'same'                 => ':attribute и :other должны совпадать.',
    'size'                 => [
        'numeric' => ':attribute должен быть :size.',
        'file'    => ':attribute должен быть :size киллобайт.',
        'string'  => ':attribute должен быть :size символов.',
        'array'   => ':attribute должен содержать :size элементов.',
    ],
    'string'               => ':attribute должен быть строкой.',
    'timezone'             => ':attribute должен быть валидной зоной.',
    'unique'               => ':attribute уже занят.',
    'uploaded'             => ':attribute не удалось загрузить.',
    'url'                  => 'Формат :attribute не верен.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
