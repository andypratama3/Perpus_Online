<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\Dashboard\Buku\CategoryBukuRequest;


class CategoryBukuData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $slug,

    ) {
        //
    }

    public static function fromRequest(CategoryBukuRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
        ];
    }
}
