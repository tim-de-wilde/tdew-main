<?php
namespace tdewmain\src\Views;

use tdewmain\src\Helpers\AbstractPage;
use tdewmain\src\Helpers\Authenticator;

/**
 * Class Login
 *
 * @package Views
 */
class Login extends AbstractPage
{

    /**
     * @inheritdoc
     */
    public function render(): void
    {
        echo '
        <div style="margin-top:5px" class="uk-container uk-container-xsmall">
            <div class="uk-card uk-card-default uk-card-body uk-width-1-2 uk-position-center uk-height-large">
                <h3 class="uk-card-title">Login</h3>
                <form name="form" action="Login.php">
                    <input style="margin-top:2px" class="uk-input uk-form-width-medium" placeholder="Username" name="username" required> <br>
                    <input style="margin-top:2px" class="uk-input uk-form-width-medium" placeholder="Password" name="password" required> <br>
                    <button name="button" type="submit" onsubmit="document.form.submit()" class="uk-button uk-button-default" style="margin-top:5px">LOGIN</button>
                    <input type="hidden" name="action" value="go">
                </form>
            </div>
        </div>
        ';

        if ($_GET['username'] !== null && $_GET['password'] !== null) {
            if (Authenticator::login($_GET['username'], $_GET['password'])) {
                echo 'Login successful';
            } else {
                echo 'Wrong username/ password!';
            }
        }
    }
}
