<?php

return [
    'show' => [
        'joined_at' => 'Se unió el :date',
        'vote' => 'Haz click para añadir un punto a éste usuario',
        'rep_history' => [
            'heading' => 'Historial de reputación',
            'asc' => 'Click para mostrar los más antiguos primero',
            'desc' => 'Click para mostrar los más recientes primero',
            'only_negatives' => 'Mostrar solo las negativas',
            'only_positives' => 'Mostrar solo las positivas',
            'columns' => [
                'giver' => 'Otorgada por',
                'type' => 'Tipo de puntuación',
                'transactions' => 'Tipo de transacciones',
                'amount' => 'Montos manejados (referencial)',
                'created_at' => 'Recibida',
            ]
        ],
        'notifications' => [
            'unique_points' => 'Los puntos de reputación son únicos. No se puede recibir más de un punto (positivo o negativo) de un mismo usuario.',
            'be_safe' => 'VenRep es un sistema exclusivamente referencial y no da garantías de ningún tipo. Tomar las precauciones necesarias al hacer un negocio.'
        ]
    ]
];
