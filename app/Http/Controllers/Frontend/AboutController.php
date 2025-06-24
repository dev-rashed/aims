<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $objectives = [
            [
                'title' => 'Develop Standards of Practice',
                'desc' => 'Establish and maintain the highest standards of proficiency and Islamic ethical practice within Islamic mental health professions, ensuring practitioners work in alignment with Islamic teachings and professional frameworks.'
            ],
            [
                'title' => 'Provide Resources and Training',
                'desc' => 'Offer cutting-edge resources, workshops, and training programs rooted in Islamic principles to help practitioners grow professionally and spiritually.'
            ],
            [
                'title' => 'Advocate for authentic Islamic Mental Health Awareness',
                'desc' => 'Promote the importance of mental health within Muslim communities, addressing stigma and misconceptions, and ensuring access to culturally and religiously sensitive care.'
            ],
            [
                'title' => 'Support Practitioners',
                'desc' => 'Provide ongoing Islamic professional and spiritual support to mental health specialists through supervision (Irshad), networking opportunities, and mentorship programmes.'
            ],
            [
                'title' => 'Engage with Stakeholders',
                'desc' => 'Work collaboratively with community leaders, Islamic scholars, employers, and public agencies to integrate Islamic mental health services into broader health and well-being frameworks.'
            ],
            [
                'title' => 'Foster a Global Network',
                'desc' => 'Create a platform for Muslim mental health specialists to connect, share knowledge, and collaborate on addressing the unique mental health needs of the Ummah.'
            ],
        ];

        return view('frontend.about', compact('objectives'));
    }
}
