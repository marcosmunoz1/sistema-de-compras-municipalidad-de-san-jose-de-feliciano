<?php

return [
    'backup' => [
        'name' => env('APP_NAME', 'laravel-backup'),
        
        'source' => [
            'files' => [
                'include' => [
                    base_path(),
                ],
                'exclude' => [
                    base_path('vendor'),
                    base_path('node_modules'),
                    base_path('storage/app/backups'),
                    base_path('storage/framework/cache'),
                    base_path('storage/framework/sessions'),
                    base_path('storage/framework/views'),
                    base_path('storage/logs'),
                ],
                'follow_links' => false,
                'ignore_unreadable_directories' => false,
                'relative_path' => null,
            ],

            'databases' => [
                'mysql',
            ],
        ],

        'database_dump_binary_path' => env('DB_DUMP_PATH', 'C:\\xampp\\mysql\\bin'),

        'database_dump_compressor' => null,

        'database_dump_file_extension' => '',

        'destination' => [
            'filename_prefix' => '',
            'disks' => [
                'backups',
                'google',  // Sincronizar backups a Google Drive
                // 's3',      // Descomentar cuando configures AWS S3
            ],
        ],

        'temporary_directory' => storage_path('app/backup-temp'),

        'password' => env('BACKUP_ARCHIVE_PASSWORD'),

        'encryption' => 'default',

        'tries' => 1,

        'retry_delay' => 0,
    ],

    'notifications' => [
        'notifications' => [
            \Spatie\Backup\Notifications\Notifications\BackupHasFailedNotification::class => [],
            \Spatie\Backup\Notifications\Notifications\UnhealthyBackupWasFoundNotification::class => [],
            \Spatie\Backup\Notifications\Notifications\CleanupHasFailedNotification::class => [],
            \Spatie\Backup\Notifications\Notifications\BackupWasSuccessfulNotification::class => [],
            \Spatie\Backup\Notifications\Notifications\HealthyBackupWasFoundNotification::class => [],
            \Spatie\Backup\Notifications\Notifications\CleanupWasSuccessfulNotification::class => [],
        ],

        'notifiable' => \Spatie\Backup\Notifications\Notifiable::class,

        'mail' => [
            'to' => env('BACKUP_MAIL_TO', 'admin@example.com'),
            'from' => [
                'address' => env('MAIL_FROM_ADDRESS', 'backup@example.com'),
                'name' => env('MAIL_FROM_NAME', 'Sistema Municipal - Backup'),
            ],
        ],

        'slack' => [
            'webhook_url' => env('BACKUP_SLACK_WEBHOOK_URL', ''),
            'channel' => env('BACKUP_SLACK_CHANNEL', null),
            'username' => env('BACKUP_SLACK_USERNAME', null),
            'icon' => env('BACKUP_SLACK_ICON', null),
        ],

        'discord' => [
            'webhook_url' => env('BACKUP_DISCORD_WEBHOOK_URL', ''),
            'username' => env('BACKUP_DISCORD_USERNAME', ''),
            'avatar_url' => env('BACKUP_DISCORD_AVATAR_URL', ''),
        ],
    ],

    'monitor_backups' => [
        [
            'name' => env('APP_NAME', 'laravel-backup'),
            'disks' => ['backups'],
            'health_checks' => [
                \Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumAgeInDays::class => 1,
                \Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumStorageInMegabytes::class => 5000,
            ],
        ],
    ],

    'cleanup' => [
        'strategy' => \Spatie\Backup\Tasks\Cleanup\Strategies\DefaultStrategy::class,

        'defaultStrategy' => [
            'keepAllBackupsForDays' => 1,
            'keepDailyBackupsForDays' => 7,
            'keepWeeklyBackupsForWeeks' => 4,
            'keepMonthlyBackupsForMonths' => 12,
            'keepYearlyBackupsForYears' => 5,
            'deleteOldestBackupsWhenUsingMoreMegabytesThan' => 5000,
        ],
    ],
];
