<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NotificationController extends Controller
{
    public function index(): array|Collection
    {
        return Notification::get();
    }

    public function show(string $notification): array|Model|Collection|Notification
    {
        return Notification::findOrFail($notification);
    }
}
