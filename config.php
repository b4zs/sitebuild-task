<?php

return [
    'contents' => [
        'sidebar' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        'login' => 'If you want to login to our website please type your e-mail address and your password.'
    ],
    'checkboxes' => [
        [
            'id' => 'terms',
            'title' => 'checkbox1',
            'url' => '/checkbox2.pdf'
        ],
        [
            'id' => 'privacy',
            'title' => 'checkbox2',
            'url' => '/checkbox2.pdf',
        ],
    ],
    'error_messages' => [
        'required' => 'Required',
        'invalid_email' => 'This email is not valid',
        'invalid_email_or_password' => 'Invalid credentials',
    ],
    'users' => [
        [
            'email' => 'admin@example.com',
            'name' => 'John Doe',
            'password' => 'admin',
        ]
    ]
];