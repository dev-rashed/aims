<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ uploadedFile(setting('favicon')) }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{ config('app.name') }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">

        <x-staff.nav-link name="Dashboard" startUrl="admin/dashboard" :url="route('staff.dashboard')" icon="bxs-dashboard" />

        @can('show_new_application')
            <x-staff.nav-link name="New applications" startUrl="admin/application*" :url="route('staff.application.index')" icon="bxs-file-plus" />
        @endcan

        <x-staff.nav-link
            name="members "
            startUrl="membership"
            icon="bx-group"
            :items="[
                ['name' => 'All Members', 'url' => route('staff.therapist.index'), 'startUrl' => 'admin/therapist*', 'permission' => 'show_therapist'],
                ['name' => 'Plan', 'url' => route('staff.membership-plan.index'), 'startUrl' => 'admin/membership-plan', 'permission' => 'show_membership_plan'],
                ['name' => 'Upgrade Member', 'url' => route('staff.renew.index'), 'startUrl' => 'admin/renew*', 'permission' => 'show_membership'],
                ['name' => 'badge & certificate', 'url' => route('staff.certificate.index'), 'startUrl' => 'admin/certificate*', 'permission' => 'show_certificate'],
            ]"
        />

        @can('show_student')
            <x-staff.nav-link name="students" startUrl="admin/student*" :url="route('staff.student.index')" icon="bx-book" />
        @endcan

        <x-staff.nav-link
            name="Course "
            startUrl="admin/course*"
            icon="bx-book-alt"
            :items="[
                ['name' => 'courses', 'url' => route('staff.course.index'), 'startUrl' => 'admin/course*', 'permission' => 'show_course'],
                ['name' => 'Modules', 'url' => route('staff.course-module.index'), 'startUrl' => 'admin/course-module*', 'permission' => 'show_course'],
            ]"
        />

        @can('show_event')
            <x-staff.nav-link name="events" startUrl="admin/event*" :url="route('staff.event.index')" icon="bx-calendar-event" />
        @endcan

        <x-staff.nav-link
            name="insights "
            startUrl="admin/insight*"
            icon="bx-news"
            :items="[
                ['name' => 'category', 'url' => route('staff.article-category.index'), 'startUrl' => 'admin/article-category*', 'permission' => 'show_article_category'],
                ['name' => 'insights', 'url' => route('staff.article.index'), 'startUrl' => 'admin/article*', 'permission' => 'show_article'],
            ]"
        />

        <x-staff.nav-link
            name="Member Settings"
            startUrl="admin/neurologist/*"
            icon="bx-capsule"
            :items="[
                ['name' => 'Profession/type of group', 'url' => route('staff.profession.index'), 'startUrl' => 'profession*', 'permission' => 'show_profession'],
                ['name' => 'language', 'url' => route('staff.language.index'), 'startUrl' => 'language*', 'permission' => 'show_language'],
                ['name' => 'Type of session', 'url' => route('staff.session.index'), 'startUrl' => 'session*', 'permission' => 'show_session'],
                ['name' => 'accessibility', 'url' => route('staff.accessibility.index'), 'startUrl' => 'accessibility*', 'permission' => 'show_accessibility'],
                ['name' => 'concession', 'url' => route('staff.concession.index'), 'startUrl' => 'concession*', 'permission' => 'show_concession'],
                ['name' => 'format', 'url' => route('staff.format.index'), 'startUrl' => 'format*', 'permission' => 'show_format'],
                ['name' => 'online platform', 'url' => route('staff.online-platform.index'), 'startUrl' => 'online-platform*', 'permission' => 'show_online_platform'],
            ]"
        />

        <x-staff.nav-link name="settings" startUrl="admin/setting*" :url="route('staff.setting.index')" icon="bx-cog" />

        <x-staff.nav-link
            name="Role Management"
            startUrl="manage"
            icon="bx-terminal"
            :items="[
                ['name' => 'Role', 'url' => route('staff.role.index'), 'startUrl' => 'admin/role*', 'permission' => 'show_role'],
                ['name' => 'Staff', 'url' => route('staff.staff.index'), 'startUrl' => 'admin/staff*', 'permission' => 'show_staff']
            ]"
        />

        @can('show_counsellor')
            <x-staff.nav-link name="contributor" startUrl="admin/counsellor*" :url="route('staff.counsellor.index')" icon="bx-user-check" />
        @endcan

        <li class="menu-label">Frontend</li>
        <x-staff.nav-link
            name="frontend"
            startUrl="frontend"
            icon="bx-minus-front"
            :items="[
                ['name' => 'coupon', 'url' => route('staff.coupon.index'), 'startUrl' => 'admin/coupon*', 'permission' => 'show_coupon'],
                ['name' => 'Enroll', 'url' => route('staff.enroll.index'), 'startUrl' => 'admin/enroll*', 'permission' => 'show_enroll'],
                ['name' => 'booking', 'url' => route('staff.booking.index'), 'startUrl' => 'admin/booking*', 'permission' => 'show_booking'],
                ['name' => 'Subscriber', 'url' => route('staff.subscriber.index'), 'startUrl' => 'admin/subscriber*', 'permission' => 'show_subscribe'],
                ['name' => 'Payment', 'url' => route('staff.payment.index'), 'startUrl' => 'admin/payment*', 'permission' => 'show_payment'],
                ['name' => 'Section Show/Hide', 'url' => route('staff.section.edit'), 'startUrl' => 'admin/section*', 'permission' => 'show_payment'],
                ['name' => 'About', 'url' => route('staff.about.edit'), 'startUrl' => 'admin/about*', 'permission' => 'show_payment'],
                ['name' => 'Aims Team', 'url' => route('staff.team.edit'), 'startUrl' => 'admin/team*', 'permission' => 'show_payment'],
                ['name' => 'Aims Advisors', 'url' => route('staff.advisor.edit'), 'startUrl' => 'admin/advisor*', 'permission' => 'show_payment'],
                ['name' => 'Aims Ambassadors', 'url' => route('staff.ambassador.edit'), 'startUrl' => 'admin/ambassador*', 'permission' => 'show_payment'],
                ['name' => 'Testimonial', 'url' => route('staff.review.index'), 'startUrl' => 'admin/review*', 'permission' => 'show_review'],
                ['name' => 'services', 'url' => route('staff.service.index'), 'startUrl' => 'admin/service*', 'permission' => 'show_service'],
                ['name' => 'Career', 'url' => route('staff.career.index'), 'startUrl' => 'admin/career*', 'permission' => 'show_career'],
            ]"
        />
        <x-staff.nav-link name="pages" startUrl="admin/page" :url="route('staff.page.index')" icon="bxs-layout" />



    </ul>
    <!--end navigation-->
</div>
