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

    'accepted'             => ':attribute atribuudiga peab nõustuma.',
    'active_url'           => ':attribute ei ole korretne URL.',
    'after'                => ':attribute peab olema pärast :date kuupäev.',
    'after_or_equal'       => ':attribute peab olema pärast :date kuupäeva või sellel kuupäeval.',
    'alpha'                => ':attribute võib sisaldada vaid tähti.',
    'alpha_dash'           => ':attribute võib sisaldada vaid tähti, numbreid ja sidekriipsu.',
    'alpha_num'            => ':attribute võib sisaldada vaid numbreid ja tähti',
    'array'                => ':attribute peab olema massiiv.',
    'before'               => ':attribute peab olema kuupäev enne :date.',
    'before_or_equal'      => ':attribute peab olema kuupäev enne :date või sama kuupäev',
    'between'              => [
        'numeric' => ':attribute peab olema :min  ja :max vahel.',
        'file'    => ':attribute peab olema :min kilobaidi ja :max kilobaidi vahel.',
        'string'  => ':attribute peab sisaldama :min kuni :max märki.',
        'array'   => ':attribute võib sisalda :min kuni :max olendit.',
    ],
    'boolean'              => ':attribute väli peab olema tõene või väär.',
    'confirmed'            => ':attribute kinnitus ei sobi.',
    'date'                 => ':attribute ei ole korrektne kuupäev.',
    'date_format'          => ':attribute ei sobitu :format formaadiga.',
    'different'            => ':attribute ja :other peavad olema erinevad.',
    'digits'               => ':attribute peab olema :digits numbrid.',
    'digits_between'       => ':attribute peab olema numbrite :min ja :max vahel.',
    'dimensions'           => ':attribute omab valesid pildi mõõtmeid',
    'distinct'             => ':attribute omab dublikaatväärtust.',
    'email'                => ':attribute peab olema korretkne e-mail.',
    'exists'               => 'Valitud :attribute pole korrektne.',
    'file'                 => ':attribute peab olema fail.',
    'filled'               => ':attribute väli on nõutud!.',
    'image'                => ':attribute peab olema pilt.',
    'in'                   => ':attribute pole korrektne.',
    'in_array'             => ':attribute väli ei eksiteeri :other listis.',
    'integer'              => ':attribute peab olema täisarv.',
    'ip'                   => ':attribute peab olema korrektne IP aaddress.',
    'json'                 => ':attribute peab olema korrektne JSON sõne.',
    'max'                  => [
        'numeric' => ':attribute ei tohi olla suurem kui :max.',
        'file'    => ':attribute ei tohi olla suurem kui :max kilobaiti.',
        'string'  => ':attribute ei tohi olla pikem kui :max märki.',
        'array'   => ':attribute ei tohi omada rohkem kui :max objekti.',
    ],
    'mimes'                => ':attribute peab olema :values tüüpi fail.',
    'mimetypes'            => ':attribute peab olema :values tüüpi fail.',
    'min'                  => [
        'numeric' => ':attribute peab olema vähemalt :min.',
        'file'    => ':attribute peab olema vähemalt :min kilobaidine.',
        'string'  => ':attribute peab sisaldama vähemalt :min märki.',
        'array'   => ':attribute peab sisaldama vähemalt :min objekti.',
    ],
    'not_in'               => 'Valitud :attribute pole korrektne.',
    'numeric'              => ':attribute peab olema number.',
    'present'              => ':attribute väli peab olema olevikus.',
    'regex'                => ':attribute formaat pole korrektne.',
    'required'             => ':attribute väli on nõutud.',
    'required_if'          => ':attribute väli on nõutud kui :other on :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => ':attribute on nõutud kui :values on olemas.',
    'required_with_all'    => ':attribute väli on nõutud kui :values on esindatud.',
    'required_without'     => ':attribute väli on nõutud kui :values on esindatud .',
    'required_without_all' => ':attribute väli on nõutud kui mingi  :values pole esindatud.',
    'same'                 => ':attribute ja :other peavad sobituma.',
    'size'                 => [
        'numeric' => ':attribute peab olema :size.',
        'file'    => ':attribute peab olema :size kilobaiti.',
        'string'  => ':attribute peab olema :size märki.',
        'array'   => ':attribute peab sisaldama :size objekti.',
    ],
    'string'               => ':attribute peab olema sõne.',
    'timezone'             => ':attribute peab olema korrektne tsoon.',
    'unique'               => ':attribute on juba hõivatud.',
    'uploaded'             => ':attribute üleslaadimine ebaõnnestus.',
    'url'                  => ':attribute formaat pole korrektne.',

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
