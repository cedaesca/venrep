<?php

return [
    'view_title' => 'Iniciar sesión',
    'failed' => 'Las credenciales no coinciden con nuestros registros.',
    'password' => 'La contraseña proporcionada es incorrecta.',
    'inputs' => [
        'login' => 'Iniciar sesión',
        'remember_me' => 'Recuérdame'
    ],
    'register' => [
        'view_title' => 'Registro',
        'create_account' => 'Crear una cuenta',
        'inputs' => [
            'username' => 'Nombre de usuario',
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
            'password_confirmation' => 'Confirme la contraseña',
            'register_button' => 'Registrarme'
        ]
    ],
    'verify_email' => [
        'view_title' => 'Verificar correo electrónico',
        'notification' => 'Se ha enviado un correo de verificación a :email y debe seguir los pasos para poder utilizar la aplicación.',
        'no_email_received_prompt' => 'No ha recibido el correo? Haga click en el botón para reenviarlo',
        'resend_email' => 'Reenviar correo',
        'resend_success' => 'Se ha reenviado el correo de verificación a :email, debe esperar 5 minutos para reenviar nuevamente.',
        'resend_throttled' => 'Debe esperar 5 minutos para utilizar nuevamente ésta función.'
    ],
    'forgot_password' => [
        'view_title' => 'Contraseña olvidada',
        'forgot_password' => 'Olvidé mi contraseña'
    ]
];
