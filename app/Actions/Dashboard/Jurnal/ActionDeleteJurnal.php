<?php

namespace App\Actions\Dashboard\Jurnal;

use App\Models\Jurnal;

class ActionDeleteJurnal
{
    public function execute($slug)
    {
        $jurnal = Jurnal::where('slug', $slug)->firstOrFail();
        $jurnal->delete();
    }

}
