<?php namespace Anomaly\UsersModule\Http\Controller;

use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Register\Command\HandleActivateRequest;
use Illuminate\Contracts\Encryption\Encrypter;

/**
 * Class RegisterController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\UsersModule\Http\Controller
 */
class RegisterController extends PublicController
{

    /**
     * Return the register view.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function register()
    {
        return $this->view->make('anomaly.module.users::register');
    }

    /**
     * Activate a registered user.
     *
     * @param SettingRepositoryInterface $settings
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(SettingRepositoryInterface $settings)
    {
        if (!$this->dispatch(new HandleActivateRequest())) {

            $this->messages->success('anomaly.module.users::error.activate_user');

            return $this->redirect->to($settings->value('anomaly.module.users::activated_redirect', '/'));
        }

        $this->messages->success('anomaly.module.users::success.activate_user');

        return $this->redirect->to($this->request->get('redirect', '/'));
    }
}
