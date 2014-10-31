<?php namespace Anomaly\Streams\Addon\Module\Users;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class UsersModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users
 */
class UsersModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\Streams\Addon\Module\Users\Installer\UsersFieldInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\UsersStreamInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\RolesStreamInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\BlocksStreamInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\RemindersStreamInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\ThrottlesStreamInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\ActivationsStreamInstaller',
        'Anomaly\Streams\Addon\Module\Users\Installer\PersistencesStreamInstaller',
    ];
}
 