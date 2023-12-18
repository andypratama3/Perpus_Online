<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\Dashboard\Buku\BukuRequest;


class JurnalData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly UploadedFile $jurnal,
        public readonly array $jurnals_category,
        public readonly ?string $slug,
    ) {
        //
    }

    public static function fromRequest(JurnalRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->Jurnal(),
            $request->getJurnalsCatagory(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
            'jurnal.required' => 'Kolom Jurnal tidak boleh kosong!',
        ];
    }
}
