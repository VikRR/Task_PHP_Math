<?php

namespace App\Observers;

use App\Model\Language;

class LanguageObserver
{

    public function deleting(Language $language)
    {
        $language->cities()->detach();

        return $language->delete();
    }

}