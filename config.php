<?php

define('MONTHLY_PRICE', getenv('MONTHLY_PRICE') ?: '30');
define('TRIAL_PERIOD', getenv('TRIAL_PERIOD') ?: '15');
define('SIGNUP_URL', getenv('SIGNUP_URL') ?: 'https://signup.kanboard.net/');

define('APP_VERSION', getenv('APP_VERSION') ?: 'REPLACE_ME');
define('APP_RELEASE_DATE', getenv('APP_RELEASE_DATE') ?: 'REPLACE_ME');
define('MAILGUN_API_KEY', getenv('MAILGUN_API_KEY') ?: 'REPLACE_ME');
define('DATA_PATH', 'data/');
