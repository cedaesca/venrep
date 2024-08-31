<?php

return [
    'create' => [
        'view_title' => 'Dar punto de reputación a :username',
        'create' => 'Agregar punto de reputación a :username',
        'inputs' => [
            'rep_type' => 'Tipo de puntuación',
            'select_prompt' => 'Selecciona un tipo de puntuación',
            'types' => [
                'positive' => 'Positiva',
                'negative' => 'Negativa'
            ],
            'recommended_transactions' => 'Transacciones que recomiendo',
            'transaction_options' => [
                'zelle' => 'Zelle',
                'ves' => 'Bolívares',
                'cash' => 'Efectivo',
                'binance' => 'Binance',
                'paypal' => 'PayPal',
                'others' => 'Otros'
            ],
            'submit' => 'Añadir reputación'
        ]
    ],
    'already_voted' => 'No puedes volver a votar por éste usuario.'
];
