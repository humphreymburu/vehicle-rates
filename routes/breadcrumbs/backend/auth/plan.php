<?php

Breadcrumbs::for('admin.auth.plan.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.access.plan.management'), route('admin.auth.plan.index'));
});

Breadcrumbs::for('admin.auth.plan.create', function ($trail) {
    $trail->parent('admin.auth.plan.index');
    $trail->push(__('menus.backend.access.plan.create'), route('admin.auth.plan.create'));
});

Breadcrumbs::for('admin.auth.plan.edit', function ($trail, $id) {
    $trail->parent('admin.auth.plan.index');
    $trail->push(__('menus.backend.access.plan.edit'), route('admin.auth.plan.edit', $id));
});
