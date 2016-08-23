Breadcrumbs::register('##nomePagina*##', function ($breadcrumbs) {
    $breadcrumbs->parent('##paiBread##');
    $breadcrumbs->push('##nomePagina##', route('suite'));
});