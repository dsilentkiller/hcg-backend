<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});

//1.contact
Breadcrumbs::for('contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Contact List', route('contact.index'));
});
Breadcrumbs::for('contact.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Contact Create', route('contact.create'));
});
Breadcrumbs::for('contact.update', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Contact Update', route('contact.update'));
});

Breadcrumbs::for('contact.edit', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('contact.index');
    $trail->push('Contact  edit', route('cotact.edit', $contact));
});
//2.page start
Breadcrumbs::for('page.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Page List', route('page.index'));
});
Breadcrumbs::for('page.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Page Create', route('page.create'));
});

Breadcrumbs::for('page.edit', function (BreadcrumbTrail $trail, $page) {
    $trail->parent('page.index');
    $trail->push('Page edit', route('page.edit', $page));
});

//3.about start
Breadcrumbs::for('about.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('About List', route('about.index'));
});
Breadcrumbs::for('about.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('about Create', route('about.create'));
});

Breadcrumbs::for('about.edit', function (BreadcrumbTrail $trail, $about) {
    $trail->parent('about.index');
    $trail->push('about edit', route('about.edit', $about));
});
Breadcrumbs::for('about.show', function ($trail) {
    $trail->push('about Show', route('about.show'));
});

//about end
//4.banner start
Breadcrumbs::for('banner.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Banner List', route('banner.index'));
});
Breadcrumbs::for('bannercreate', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('banner Create', route('banner.create'));
});

Breadcrumbs::for('banner.edit', function (BreadcrumbTrail $trail, $banner) {
    $trail->parent('banner.index');
    $trail->push('banner edit', route('banner.edit', $banner));
});
Breadcrumbs::for('banner.show', function ($trail) {
    $trail->push('banner Show', route('banner.show'));
});

//banner end

//member start
Breadcrumbs::for('member.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Member List', route('member.index'));
});
Breadcrumbs::for('member.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Member create', route('member.create'));
});

Breadcrumbs::for('member.edit', function (BreadcrumbTrail $trail, $member) {
    $trail->parent('member.index');
    $trail->push('Member edit', route('member.edit', $member));
});
//member end

// Setting start
Breadcrumbs::for('setting.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Setting List', route('setting.index'));
});
Breadcrumbs::for('setting.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('setting create', route('setting.create'));
});

Breadcrumbs::for('setting.edit', function (BreadcrumbTrail $trail, $setting) {
    $trail->parent('setting.index');
    $trail->push('Setting edit', route('setting.edit', $setting));
});


// setting end

//testimonial start
// Home > Testimonial
Breadcrumbs::for('testimonial.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Testimonial List', route('testimonial.index'));
});
Breadcrumbs::for('testimonial.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Testimonial create', route('testimonial.create'));
});

Breadcrumbs::for('testimonial.edit', function (BreadcrumbTrail $trail, $testimonial) {
    $trail->parent('testimonial.index');
    $trail->push('Testimonial edit', route('testimonial.edit', $testimonial));
});
// testimonial end

//service start
// Home > Service
Breadcrumbs::for('service.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Testimonial List', route('service..index'));
});
Breadcrumbs::for('service.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Service create', route('service..create'));
});

Breadcrumbs::for('service.edit', function (BreadcrumbTrail $trail, $service) {
    $trail->parent('service.index');
    $trail->push('Service edit', route('service.edit', $service));
});
// service end


//4.project start
Breadcrumbs::for('project.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Project List', route('project.index'));
});
Breadcrumbs::for('project.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Project Create', route('project.create'));
});

Breadcrumbs::for('project.edit', function (BreadcrumbTrail $trail, $project) {
    $trail->parent('project.index');
    $trail->push('project edit', route('project.edit', $project));
});
Breadcrumbs::for('project.show', function ($trail) {
    $trail->push('project Show', route('project.show'));
});

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
