<?php

Breadcrumbs::for('admin.auth.user.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.access.users.management'), route('admin.auth.user.index'));
});

Breadcrumbs::for('admin.auth.user.deactivated', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('menus.backend.access.users.deactivated'), route('admin.auth.user.deactivated'));
});

Breadcrumbs::for('admin.auth.user.deleted', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('menus.backend.access.users.deleted'), route('admin.auth.user.deleted'));
});

Breadcrumbs::for('admin.auth.user.create', function ($trail) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('labels.backend.access.users.create'), route('admin.auth.user.create'));
});

Breadcrumbs::for('admin.auth.user.show', function ($trail, $id) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('menus.backend.access.users.view'), route('admin.auth.user.show', $id));
});

Breadcrumbs::for('admin.auth.user.edit', function ($trail, $id) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('menus.backend.access.users.edit'), route('admin.auth.user.edit', $id));
});
Breadcrumbs::for('admin.edit_route', function ($trail, $id) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('menus.backend.access.users.edit'), route('admin.auth.user.edit', $id));
});
Breadcrumbs::for('admin.ziarat', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.edit'), route('admin.auth.user.edit', $id));
});

Breadcrumbs::for('admin.visa_rate', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.edit'), route('admin.auth.user.edit', $id));
});
Breadcrumbs::for('admin.vehicle', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.edit'), route('admin.auth.user.edit', $id));
});

Breadcrumbs::for('admin.update_vehicle', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.edit'), route('admin.auth.user.edit', $id));
});
Breadcrumbs::for('admin.vehicle_route', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.edit'), route('admin.auth.user.edit', $id));
});


Breadcrumbs::for('admin.auth.user.change-password', function ($trail, $id) {
    $trail->parent('admin.auth.user.index');
    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});


Breadcrumbs::for('admin.hotel.index', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});


Breadcrumbs::for('admin.hotel.edit', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});


Breadcrumbs::for('admin.hotel.room.edit', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});


Breadcrumbs::for('admin.createhotel', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});


Breadcrumbs::for('admin.hotel.room.create', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});

Breadcrumbs::for('admin.vehicalfare.index', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});
Breadcrumbs::for('admin.createvehicalfare', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});


Breadcrumbs::for('admin.vehicalfare.edit', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});
Breadcrumbs::for('admin.create_route', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});
Breadcrumbs::for('admin.route_priority', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});
Breadcrumbs::for('admin.riyal', function () {
//    $trail->parent('admin.auth.user.index');
//    $trail->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});
