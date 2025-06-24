<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberBenefitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $objectives = [
            [
                'title' => 'Be Part of a Global Ummah of Islamic Practitioners',
                'desc' => 'Gain a sense of belonging to a growing, supportive, and dynamic global community of Islamic mental health professionals. Build lifelong connections with like-minded practitioners dedicated to serving the needs of the Ummah. '
            ],
            [
                'title' => 'Authenticity in Practice',
                'desc' => 'Align your work with Islamic teachings and Islamic ethical standards, ensuring that your approach resonates with the deeply held values of the Muslim community. Being part of AIMS reflects a commitment to practicing with integrity and authenticity. '
            ],
            [
                'title' => 'Exclusive Monthly Islamic Supervision (Irshad)',
                'desc' => 'Receive guidance and mentorship through monthly Islamic supervision sessions (Irshad), which not only help refine your practice but ensure your work aligns with the Quran and Sunnah. This unique form of support helps maintain spiritual and professional balance. '
            ],
            [
                'title' => 'Continuous Professional Development',
                'desc' => 'Stay ahead in your field with access to exclusive workshops, webinars, and resources designed to enhance your skills, deepen your Islamic knowledge, and address the unique challenges of serving Muslim clients.'
            ],
            [
                'title' => 'Member Discounts on Training and Certification',
                'desc' => 'Enjoy reduced fees on specialised training, courses, and certifications in Islamic mental health and counselling, helping you grow professionally while maintaining affordability. '
            ],
            [
                'title' => 'Confidence and Credibility',
                'desc' => 'Membership in AIMS is a mark of trustworthiness, showing that you adhere to Islamic ethical standards in your practice. Clients and communities are reassured knowing that they are receiving support from a Islamically qualified and ethical practitioner.'
            ],
            [
                'title' => 'Tools for Success',
                'desc' => 'Access practical tools, frameworks, and resources tailored to support your work with Muslim clients, allowing you to provide culturally sensitive and Islamically sound care.'
            ],
            [
                'title' => 'Contribute to a Noble Cause',
                'desc' => 'Participate in the collective effort to revive the Islamic tradition of holistic care by contributing to AIMS’ initiatives, research, and discussions. Your membership helps strengthen the voice of Islamic guidance and support globally. '
            ],
            [
                'title' => 'A Stronger Connection to Islamic Principles',
                'desc' => 'By engaging with a community of scholars and practitioners, you have the opportunity to deepen your own faith, gain spiritual clarity, and work in a manner that is pleasing to Allah (SWT). '
            ],
            [
                'title' => 'Access to Fatwa and Guidance',
                'desc' => 'When encountering complex ethical or theological issues in your practice, you can seek guidance through AIMS’ access to scholars and fatwa services, ensuring that your decisions align with Islamic teachings. '
            ],
            [
                'title' => 'Dedicated Support for Your Growth',
                'desc' => 'As an AIMS member, you are never alone in your Islamic professional journey. Whether it’s case discussions, ethical dilemmas, or emotional challenges, the community is there to support and uplift you every step of the way. '
            ],
            [
                'title' => 'Membership Recognition',
                'desc' => 'As a member, you gain recognition as part of a leading Islamic mental health association, elevating your profile as a trusted and credible Islamic practitioner within the community.'
            ],
        ];

        return view('frontend.benefits', compact('objectives'));
    }
}
