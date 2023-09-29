<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use chillerlan\QRCode\QRCode;
use Inertia\Inertia;
use JeroenDesloovere\VCard\VCard;

class BusinessCardQrController extends Controller
{
    public function __invoke(BusinessCard $qr, string $type)
    {
        if ($type == 'card') {
            $vcard = new VCard();
            $vcard->addName((string)$qr->last_name, (string)$qr->first_name);
            $vcard->addEmail((string)$qr->email);
            $vcard->addPhoneNumber((string)$qr->phone);
            $vcard->addURL((string)$qr->website);
            $data = $vcard->getOutput();
        } else {
            $data = $qr->{$type};
        }
        return Inertia::render('BusinessCardQr', [
            'card' => $qr,
            'qr' => (new QRCode)->render($data),
        ]);

    }
}
