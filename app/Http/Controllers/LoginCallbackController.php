<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class LoginCallbackController extends Controller
{
    public function store(Request $request)
    {
        $hashCorrect = $this->compareHash(
            hash: $request->input('hash'),
            requestData: $request->collect()
        );

        if (!$hashCorrect) {
            abort(Response::HTTP_BAD_REQUEST, __('Solicitud incorrecta'));
        }

        if ((time() - $request->input('auth_date')) > 86400) {
            abort(Response::HTTP_BAD_REQUEST, __('Solicitud expirada'));
        }

        return $this->createAndLogin($request);
    }

    public function compareHash(string $hash, Collection $requestData): bool
    {
        $botToken = config('telegram.bot_token');

        $secretKey = hash('sha256', $botToken, true);

        $data = $requestData->filter(fn ($value, $key) => $key !== 'hash')
            ->map(fn ($value, $key) => "$key=$value")
            ->sort()
            ->join("\n");

        $checkHash = hash_hmac('sha256', $data, $secretKey);

        return strcmp($hash, $checkHash) === 0;
    }

    public function createAndLogin(Request $request): RedirectResponse
    {
        $user = $this->getUpdatedUser($request);

        Auth::login($user);

        return to_route('home');
    }

    public function getUpdatedUser(Request $request): User
    {
        $name = collect([
            $request->input('first_name'), $request->input('last_name')
        ])->join(' ');

        $user = User::query()->firstWhere(
            'telegram_id',
            $request->input('id')
        );

        $payload = [
            'telegram_id' => $request->input('id'),
            'username' => $request->input('username'),
            'name' => $name,
            'password' => 'password',
            'display_name' => $name,
        ];

        if (!$user) {
            return User::query()->create($payload);
        }

        $user->update(Arr::only($payload, ['username', 'name']));

        return $user;
    }
}
