<?php

use App\Models\ChatRoom;
use App\Models\Customer;
use App\Models\Lawyer;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('cust-lawyer-chat', function ($user) {
    return $user;
});

Broadcast::channel('customer_id.{customerId}.lawyer_id{lawyerId}', function (Customer $customer, int $customerId, int $lawyerId) {
    return ChatRoom::query()->get()
        ->where('customer_id', (int)$customerId)
        ->where('lawyer_id', (int)$lawyerId);
});

// 'customer_id' . $customerId . 'lawyer_id' . $lawyerId
// return $customer->id === ChatRoom::findOrNew($customerId)->customer_id;
