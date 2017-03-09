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

    'accepted'             => ':attribute  должен быть принят.',
    'active_url'           => ':attribute не корректный  URL.',
    'after'                => ':attribute не может быть позже :date числа.',
    'after_or_equal'       => ':attribute должен быть после  :date kuupäeva числа или это число.',
    'alpha'                => ':attribute может содержат только буквы.',
    'alpha_dash'           => ':attribute может содержат только буквы, числа и дефис.',
    'alpha_num'            => ':attribute может содержат только буквы и числа',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute должно быть до :date числа.',
    'before_or_equal'      => ':attribute должно быть число не позже :date',
    'between'              => [
        'numeric' => ':attribute должен быть между :min  и :max .',
        'file'    => ':attribute должен быть между :min килобайт и :max килобайт.',
        'string'  => ':attribute должен содержать :min до :max знаков.',
        'array'   => ':attribute может содержать :min до :max объектов.',
    ],
    'boolean'              => 'поле для :attribute должно быть true или false.',
    'confirmed'            => ':attribute подтверждение не подходит.',
    'date'                 => ':attribute не корректное число.',
    'date_format'          => ':attribute не подходит для :format формата.',
    'different'            => ':attribute и :other должны быть разными',
    'digits'               => ':attribute должно быть число :digits .',
    'digits_between'       => ':attribute должен быть между числами :min и :max .',
    'dimensions'           => ':attribute имеет неправильные размеры',
    'distinct'             => 'У :attribute есть дубликат.',
    'email'                => ':attribute должен быть корректным мейлом.',
    'exists'               => 'Выбранный :attribute не корректный.',
    'file'                 => ':attribute должен быть файлом.',
    'filled'               => 'поле :attribute обязательно!.',
    'image'                => ':attribute должен быть картинкой.',
    'in'                   => ':attribute не корректный .',
    'in_array'             => ':attribute поле не присуствует в листе :other .',
    'integer'              => ':attribute должно быть полное число.',
    'ip'                   => ':attribute должен быть корректный  IP адрес.',
    'json'                 => ':attribute должен быть корректным JSON словом.',
    'max'                  => [
        'numeric' => ':attribute не может быть больше чем :max.',
        'file'    => ':attribute не может быть больше :max килобайт.',
        'string'  => ':attribute не может быть длинне чем :max символов.',
        'array'   => ':attribute должен иметь как минимум :max объектов.',
    ],
    'mimes'                => ':attribute должен быть файл :values типа.',
    'mimetypes'            => ':attribute должен быть файл:values типов.',
    'min'                  => [
        'numeric' => ':attribute должно быть как минимум :min.',
        'file'    => ':attribute должен быть как минимум :min килобайт.',
        'string'  => ':attribute должен содержат как минимум :min знаков.',
        'array'   => ':attribute должен иметь как минимум  :min объектов.',
    ],
    'not_in'               => 'Выбранный  :attribute не корректный.',
    'numeric'              => ':attribute должен быть числом.',
    'present'              => ':attribute поле должно быть в настоящем времени.',
    'regex'                => ':attribute формат не корректный.',
    'required'             => ':attribute поле необходимо заполнить.',
    'required_if'          => ':attribute поле необходимо, если :other имеет значение :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => ':attribute необходим если существует :values .',
    'required_with_all'    => ':attribute поле необходимо если  :values представлены.',
    'required_without'     => ':attribute поле необходимо если  :values представлены .',
    'required_without_all' => ':attribute поле необходимо если что то из   :values не представлено.',
    'same'                 => ':attribute и :other должны подходить.',
    'size'                 => [
        'numeric' => ':attribute должен быть:size.',
        'file'    => ':attribute должен быть :size килобайт.',
        'string'  => ':attribute должен быть :size знаков.',
        'array'   => ':attribute должен содержать :size объектов.',
    ],
    'string'               => ':attribute должен быть словом.',
    'timezone'             => ':attribute должен быть корректной зоной.',
    'unique'               => ':attribute уже занят.',
    'uploaded'             => ':attribute загрузка неудалась.',
    'url'                  => ':attribute формат не корректный.',

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
