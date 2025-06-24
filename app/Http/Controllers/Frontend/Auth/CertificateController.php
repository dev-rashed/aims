<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (auth()->user()->therapist?->status == 'approved') {
            $certificate = auth()->user()->therapist?->certificate;

            $color = match(auth()->user()->therapist?->membershipPlan?->slug) {
                'accredited-member' => '#40B080',
                'associate-member' => '#F8B114',
                'student-member' => '#B2115A',
                default => '#075C89',
            };

            if($request->has('pdf')) {
                return view('user.certificate.pdf', compact('color'));
            }
            return view('user.certificate.index', compact('certificate', 'color'));
        }
        return to_route('profile.index');
    }
}
