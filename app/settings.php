<?php

use Monolog\Logger;
use App\Lib\Locale;

return [
    'settings' => [
        'version' => '0.0.1',
        'language' => Locale::getBrowserLanguage(),
        'discord_link' => 'https://discord.gg/discord-developers',
        'github_link' => 'https://github.com/yuzulabo/teams.Creating.Social',
        'help_link' => 'https://help-teams.creating.social/',
        'status_link' => 'https://status.creating.social/',

        'recaptcha' => [
            'key' => $_ENV['RECAPTCHA_KEY'],
            'secret' => $_ENV['RECAPTCHA_SECRET']
        ],

        'displayErrorDetails' => getenv('IS_DEBUG'),
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/views/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../log/app.log',
            'level' => Logger::DEBUG,
        ],
    ],
];
