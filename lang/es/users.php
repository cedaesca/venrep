<?php

return [
    'show' => [
        'joined_at' => 'Se unió el :date',
        'vote' => 'Haz click para añadir un punto a éste usuario',
        'rep_history' => [
            'heading' => 'Historial de reputación',
            'columns' => [
                'giver' => 'Otorgada por',
                'type' => 'Tipo de puntuación',
                'transactions' => 'Tipo de transacciones',
                'amount' => 'Montos manejados (referencial)',
                'date' => 'Fecha'
            ]
        ],
        'notifications' => [
            'unique_points' => 'Los puntos de reputación son únicos. No se puede recibir más de un punto (positivo o negativo) de un mismo usuario.'
        ]
    ]
];
