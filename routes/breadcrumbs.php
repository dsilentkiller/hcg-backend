<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Admin\Contact\Contact;
// use App\Models\Admin\Contact;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;



// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});
// Home > setting
Breadcrumbs::for('setting', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Setting', route('setting.create'));
});
// Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });

// Setting start
Breadcrumbs::for('setting.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Setting List', route('setting.index'));
});
Breadcrumbs::for('setting.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Setting create', route('setting.create'));
});

Breadcrumbs::for('setting.edit', function (BreadcrumbTrail $trail, $setting) {
    $trail->parent('setting.index');
    $trail->push('Setting edit', route('setting.edit', $setting));
});

// setting end

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});
Breadcrumbs::for('admin.dashboard.', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});


//1.contact

// Breadcrumbs::for('Contact', function (BreadcrumbTrail $trail, Contact $contact) {
//     $trail->parent('home');
//     $trail->push($contact->title, route('contact', $contact));
// });
Breadcrumbs::for('dashboard.contact', function ($trail) {
    $trail->push('Contact', route('contact.index'));
});
Breadcrumbs::for('contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.contact');
    $trail->push('Contact list', route('contact.index'));
});
Breadcrumbs::for('contact.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.contact');
    $trail->push('Contact create', route('contact.create'));
});
Breadcrumbs::for('contact.update', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.contact');
    $trail->push('Contact update', route('contact.update'));
});

Breadcrumbs::for('contact.edit', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('dashboard.contact');
    $trail->push('Contact  edit', route('cotact.edit', $contact));
});
// //2.page start
// Breadcrumbs::for('page.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('dashboard.page');
//     $trail->push('Page list', route('page.index'));
// });
// Breadcrumbs::for('page.create', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Page Create', route('page.create'));
// });

// Breadcrumbs::for('page.edit', function (BreadcrumbTrail $trail, $page) {
//     $trail->parent('dashboard.page');
//     $trail->push('Page edit', route('page.edit', $page));
// });

// //3.about start
// Breadcrumbs::for('dashboard.about', function ($trail) {
//     $trail->push('About', route('about.index'));
// });
Breadcrumbs::for('dashboard.about', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('About', route('about.create'));
});
// Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('About List', route('about.index'));
// });
Breadcrumbs::for('about.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.about');
    $trail->push('About create ', route('about.create'));
});

Breadcrumbs::for('about.index', function ($trail) {
    $trail->parent('dashboard.about');
    $trail->push(' About list', route('about.index'));
});
// Breadcrumbs::for('about.edit', function (BreadcrumbTrail $trail, $about) {
//     $trail->parent('about.index');
//     $trail->push('about edit', route('about.edit', $about));
// });
// Breadcrumbs::for('about.show', function ($trail) {
//     $trail->push('about Show', route('about.show'));
// });

//about end
//4.banner start
Breadcrumbs::for('dashboard.banner', function ($trail) {
    $trail->push('Banner', route('banner.index'));
});
Breadcrumbs::for('banner.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.banner');
    $trail->push('Banner List', route('banner.index'));
});
// Breadcrumbs::for('banner.create', function (BreadcrumbTrail $trail) {
//     $trail->parent('dashboard.banner');
//     $trail->push('Banner Create', route('banner.create'));
// });

Breadcrumbs::for('banner.edit', function (BreadcrumbTrail $trail, $banner) {
    $trail->parent('dashboard.banner');
    $trail->push('Banner edit', route('banner.edit', $banner));
});
Breadcrumbs::for('banner.show', function ($trail) {
    $trail->parent('dashboard.banner');
    $trail->push('Banner Show', route('banner.show'));
});

//banner end

//member start
Breadcrumbs::for('dashboard.member', function ($trail) {
    $trail->push('Member', route('member.index'));
});
Breadcrumbs::for('member.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.member');
    $trail->push('Member List', route('member.index'));
});
Breadcrumbs::for('member.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.member');
    $trail->push('Member create', route('member.create'));
});

Breadcrumbs::for('member.edit', function (BreadcrumbTrail $trail, $member) {
    $trail->parent('dashboard.member');
    $trail->push('Member edit', route('member.edit', $member));
});
//member end


//testimonial start
// Home > Testimonial
Breadcrumbs::for('dashboard.testimonial', function ($trail) {
    $trail->push('Home Testimonial', route('testimonial.index'));
});

Breadcrumbs::for('testimonial.index', function (BreadcrumbTrail $trail) {
    // dd('test');
    $trail->parent('dashboard.testimonial');
    $trail->push('Testimonial List', route('testimonial.index'));

});
Breadcrumbs::for('testimonial.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.testimonial');
    $trail->push('Testimonial create', route('testimonial.create'));
});

Breadcrumbs::for('testimonial.edit', function (BreadcrumbTrail $trail, $testimonial) {
    $trail->parent('dashboard.testimonial');
    $trail->push('Testimonial edit', route('testimonial.edit', $testimonial));
});
// testimonial end

//service start
// Home > Service
Breadcrumbs::for('dashboard.service', function ($trail) {
    $trail->push('Service', route('service.index'));
});
Breadcrumbs::for('service.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.service');
    $trail->push('Service List', route('service.index'));
});
Breadcrumbs::for('service.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard.service');
    $trail->push('Service create', route('service.create'));
});

Breadcrumbs::for('service.edit', function (BreadcrumbTrail $trail, $service) {
    $trail->parent('dashboard.service');
    $trail->push('Service edit', route('service.edit', $service));
});
// service end


//4.project start
// Breadcrumbs::for('project.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('dashboard.project');
//     $trail->push('Project List', route('project.index'));
// });
// Breadcrumbs::for('project.create', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Project Create', route('project.create'));
// });

// Breadcrumbs::for('project.edit', function (BreadcrumbTrail $trail, $project) {
//     $trail->parent('project.index');
//     $trail->push('project edit', route('project.edit', $project));
// });
// Breadcrumbs::for('project.show', function ($trail) {
//     $trail->push('project Show', route('project.show'));
// });

//project end


// //4.project start
// Breadcrumbs::for('project.index', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Project List', route('project.index'));
// });
// Breadcrumbs::for('project.create', function (BreadcrumbTrail $trail) {
//     $trail->parent('admin.dashboard');
//     $trail->push('Project Create', route('project.create'));
// });

// Breadcrumbs::for('project.edit', function (BreadcrumbTrail $trail, $project) {
//     $trail->parent('project.index');
//     $trail->push('project edit', route('project.edit', $project));
// });
// Breadcrumbs::for('project.show', function ($trail) {
//     $trail->push('project Show', route('project.show'));
// });

// //project end


?>
