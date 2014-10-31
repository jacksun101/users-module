<?php namespace Anomaly\Streams\Addon\Module\Users\User;

use Anomaly\Streams\Addon\Module\Users\User\Event\PasswordWasChangedEvent;
use Anomaly\Streams\Platform\Support\Listener;

/**
 * Class UserListener
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Module\Users\User
 */
class UserListener extends Listener
{

    public function whenPasswordWasChanged(PasswordWasChangedEvent $event)
    {
        $user = $event->getUser();
    }
}
 