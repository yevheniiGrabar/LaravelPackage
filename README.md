# User Registration Notifier

User Registration Notifier is a Composer package for sending welcome emails upon user registration in a Laravel application.

## Installation

You can install this package via Composer. Run the following command in your terminal:

```bash
composer require yevheniigrabar/user-registration-notifier
```

## Setup
Register the Event Listener
After installing the package, you need to register the UserRegistered event listener in your Laravel application. Open the ```EventServiceProvider.php``` file located in the ```app/Providers``` directory of your Laravel project and add the following code to the $listen array:

``` bash 
// app/Providers/EventServiceProvider.php

protected $listen = [
    \App\Events\UserRegistered::class => [
        \Yevheniigrabar\UserRegistrationNotifier\Listener::class,
    ],
];
```
## Ensure UserRegistered Event

Make sure you have the ```UserRegistered``` event set up in your Laravel application. If not, you'll need to create it. Here's an example of how you can define the event:

```bash 
// app/Events/UserRegistered.php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserRegistered
{
    use Dispatchable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}

```

## Ensure Email Templates
Ensure you have email templates set up for sending the welcome email. You can create your email template or use Laravel's default notification system.

## Usage
Once you have registered the event listener and ensured the UserRegistered event, your package is set up to send welcome emails upon user registration automatically.

## License
User Registration Notifier is open-sourced software licensed under the MIT license.

