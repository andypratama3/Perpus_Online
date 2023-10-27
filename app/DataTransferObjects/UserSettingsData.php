<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\Dashboard\UserRequest;

class UserSettingsData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $role,
        public readonly ?string $slug,
    ) {
        //
    }

    public static function fromRequest(UserRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getEmail(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom nama tidak boleh kosong!',
            'email.required' => 'Kolom email tidak boleh kosong!',
            'email.email' => 'Format email salah!',
            'email.unique' => 'Email yang Anda masukkan sudah terdaftar!',
        ];
    }
}
