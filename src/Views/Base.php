<?php
namespace tdewmain\src\Views;

echo '
            <nav class="uk-navbar uk-navbar-container" style="width:100%">
                <div class="uk-navbar-center">
                    <ul class="uk-navbar-nav">
                        <li class=""><a href="Database">Database</a></li>
                        <li class="uk-active"><a href="Homepage">Home</a></li>
';

if (isset($_SESSION['token'])) {
    echo '<li><a href="Logout">Logout</a></li>';
} else {
    echo '<li><a href="Login">Login</a></li>';
}

echo '</ul></div></nav>';
