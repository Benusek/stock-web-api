<?php

return [

    'accepted' => 'Поле :attribute должно быть принято.',
    'accepted_if' => 'Поле :attribute должно быть принято, когда :other равно :value.',
    'active_url' => 'Поле :attribute должно быть корректным URL.',
    'after' => 'Поле :attribute должно быть датой после :date.',
    'after_or_equal' => 'Поле :attribute должно быть датой не ранее :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, дефисы и подчёркивания.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'any_of' => 'Поле :attribute имеет недопустимое значение.',
    'array' => 'Поле :attribute должно быть массивом.',
    'ascii' => 'Поле :attribute должно содержать только однобайтовые символы.',
    'before' => 'Поле :attribute должно быть датой до :date.',
    'before_or_equal' => 'Поле :attribute должно быть датой не позже :date.',

    'between' => [
        'array' => 'Поле :attribute должно содержать от :min до :max элементов.',
        'file' => 'Размер файла в поле :attribute должен быть от :min до :max килобайт.',
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'string' => 'Поле :attribute должно содержать от :min до :max символов.',
    ],

    'boolean' => 'Поле :attribute должно быть true или false.',
    'can' => 'Поле :attribute содержит недопустимое значение.',
    'confirmed' => 'Подтверждение поля :attribute не совпадает.',
    'contains' => 'Поле :attribute не содержит обязательное значение.',
    'current_password' => 'Пароль указан неверно.',
    'date' => 'Поле :attribute должно быть корректной датой.',
    'date_equals' => 'Поле :attribute должно быть датой, равной :date.',
    'date_format' => 'Поле :attribute должно соответствовать формату :format.',
    'decimal' => 'Поле :attribute должно содержать :decimal знаков после запятой.',
    'declined' => 'Поле :attribute должно быть отклонено.',
    'declined_if' => 'Поле :attribute должно быть отклонено, когда :other равно :value.',
    'different' => 'Поля :attribute и :other должны отличаться.',
    'digits' => 'Поле :attribute должно содержать :digits цифр.',
    'digits_between' => 'Поле :attribute должно содержать от :min до :max цифр.',
    'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute содержит повторяющееся значение.',
    'doesnt_contain' => 'Поле :attribute не должно содержать следующие значения: :values.',
    'doesnt_end_with' => 'Поле :attribute не должно заканчиваться на: :values.',
    'doesnt_start_with' => 'Поле :attribute не должно начинаться с: :values.',
    'email' => 'Поле :attribute должно быть корректным email адресом.',
    'encoding' => 'Поле :attribute должно быть закодировано в :encoding.',
    'ends_with' => 'Поле :attribute должно заканчиваться на: :values.',
    'enum' => 'Выбранное значение поля :attribute некорректно.',
    'exists' => 'Выбранное значение поля :attribute некорректно.',
    'extensions' => 'Поле :attribute должно иметь одно из расширений: :values.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute должно быть заполнено.',

    'gt' => [
        'array' => 'Поле :attribute должно содержать больше :value элементов.',
        'file' => 'Размер файла в поле :attribute должен быть больше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'string' => 'Поле :attribute должно содержать больше :value символов.',
    ],

    'gte' => [
        'array' => 'Поле :attribute должно содержать :value элементов или больше.',
        'file' => 'Размер файла в поле :attribute должен быть не меньше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть не меньше :value.',
        'string' => 'Поле :attribute должно содержать не меньше :value символов.',
    ],

    'hex_color' => 'Поле :attribute должно быть корректным HEX-цветом.',
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение поля :attribute некорректно.',
    'in_array' => 'Поле :attribute должно присутствовать в :other.',
    'in_array_keys' => 'Поле :attribute должно содержать один из ключей: :values.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть корректным IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть корректным IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть корректным IPv6-адресом.',
    'json' => 'Поле :attribute должно быть корректной JSON-строкой.',
    'list' => 'Поле :attribute должно быть списком.',
    'lowercase' => 'Поле :attribute должно быть в нижнем регистре.',

    'lt' => [
        'array' => 'Поле :attribute должно содержать меньше :value элементов.',
        'file' => 'Размер файла в поле :attribute должен быть меньше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'string' => 'Поле :attribute должно содержать меньше :value символов.',
    ],

    'lte' => [
        'array' => 'Поле :attribute не должно содержать больше :value элементов.',
        'file' => 'Размер файла в поле :attribute должен быть не больше :value килобайт.',
        'numeric' => 'Поле :attribute должно быть не больше :value.',
        'string' => 'Поле :attribute должно содержать не больше :value символов.',
    ],

    'mac_address' => 'Поле :attribute должно быть корректным MAC-адресом.',
    'max' => [
        'array' => 'Поле :attribute не должно содержать больше :max элементов.',
        'file' => 'Размер файла :attribute не должен превышать :max килобайт.',
        'numeric' => 'Поле :attribute не должно быть больше :max.',
        'string' => 'Поле :attribute не должно содержать больше :max символов.',
    ],

    'max_digits' => 'Поле :attribute не должно содержать больше :max цифр.',
    'mimes' => 'Файл :attribute должен быть типа: :values.',
    'mimetypes' => 'Файл :attribute должен быть типа: :values.',

    'min' => [
        'array' => 'Поле :attribute должно содержать минимум :min элементов.',
        'file' => 'Размер файла :attribute должен быть не меньше :min килобайт.',
        'numeric' => 'Поле :attribute должно быть не меньше :min.',
        'string' => 'Поле :attribute должно содержать не меньше :min символов.',
    ],

    'min_digits' => 'Поле :attribute должно содержать минимум :min цифр.',
    'missing' => 'Поле :attribute должно отсутствовать.',
    'missing_if' => 'Поле :attribute должно отсутствовать, когда :other равно :value.',
    'missing_unless' => 'Поле :attribute должно отсутствовать, если :other не равно :value.',
    'missing_with' => 'Поле :attribute должно отсутствовать, когда присутствует :values.',
    'missing_with_all' => 'Поле :attribute должно отсутствовать, когда присутствуют :values.',
    'multiple_of' => 'Поле :attribute должно быть кратно :value.',
    'not_in' => 'Выбранное значение поля :attribute некорректно.',
    'not_regex' => 'Формат поля :attribute некорректен.',
    'numeric' => 'Поле :attribute должно быть числом.',

    'password' => [
        'letters' => 'Поле :attribute должно содержать хотя бы одну букву.',
        'mixed' => 'Поле :attribute должно содержать буквы в верхнем и нижнем регистре.',
        'numbers' => 'Поле :attribute должно содержать хотя бы одну цифру.',
        'symbols' => 'Поле :attribute должно содержать хотя бы один символ.',
        'uncompromised' => 'Поле :attribute найдено в утечке данных. Выберите другое значение.',
    ],

    'present' => 'Поле :attribute должно присутствовать.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'unique' => 'Поле :attribute уже занято.',
    'uploaded' => 'Не удалось загрузить файл :attribute.',
    'url' => 'Поле :attribute должно быть корректным URL.',

    'custom' => [],

    'attributes' => [
        'products.*.product_id' => 'товар',
        'products.*.quantity' => 'количество',
        'products.*.price' => 'цена',
        'name' => 'название',
        'quantity' => 'количество',
        'minimum' => 'минимальный остаток',
        'email' => 'почта',
        'password' => 'пароль',
        'status' => 'статус',
        'supplier_id' => 'поставщик'
    ],

];
