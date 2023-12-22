<?php 

use Illuminate\Support\Facades\Route;

Route::view('/analytics', 'theme-template/analytics');
Route::view('/finance', 'theme-template/finance');
Route::view('/crypto', 'theme-template/crypto');

Route::view('/apps/chat', 'theme-template/apps.chat');
Route::view('/apps/mailbox', 'theme-template/apps.mailbox');
Route::view('/apps/todolist', 'theme-template/apps.todolist');
Route::view('/apps/notes', 'theme-template/apps.notes');
Route::view('/apps/scrumboard', 'theme-template/apps.scrumboard');
Route::view('/apps/contacts', 'theme-template/apps.contacts');
Route::view('/apps/calendar', 'theme-template/apps.calendar');

Route::view('/apps/invoice/list', 'theme-template/apps.invoice.list');
Route::view('/apps/invoice/preview', 'theme-template/apps.invoice.preview');
Route::view('/apps/invoice/add', 'theme-template/apps.invoice.add');
Route::view('/apps/invoice/edit', 'theme-template/apps.invoice.edit');

Route::view('/components/tabs', 'theme-template/ui-components.tabs');
Route::view('/components/accordions', 'theme-template/ui-components.accordions');
Route::view('/components/modals', 'theme-template/ui-components.modals');
Route::view('/components/cards', 'theme-template/ui-components.cards');
Route::view('/components/carousel', 'theme-template/ui-components.carousel');
Route::view('/components/countdown', 'theme-template/ui-components.countdown');
Route::view('/components/counter', 'theme-template/ui-components.counter');
Route::view('/components/sweetalert', 'theme-template/ui-components.sweetalert');
Route::view('/components/timeline', 'theme-template/ui-components.timeline');
Route::view('/components/notifications', 'theme-template/ui-components.notifications');
Route::view('/components/media-object', 'theme-template/ui-components.media-object');
Route::view('/components/list-group', 'theme-template/ui-components.list-group');
Route::view('/components/pricing-table', 'theme-template/ui-components.pricing-table');
Route::view('/components/lightbox', 'theme-template/ui-components.lightbox');

Route::view('/elements/alerts', 'theme-template/elements.alerts');
Route::view('/elements/avatar', 'theme-template/elements.avatar');
Route::view('/elements/badges', 'theme-template/elements.badges');
Route::view('/elements/breadcrumbs', 'theme-template/elements.breadcrumbs');
Route::view('/elements/buttons', 'theme-template/elements.buttons');
Route::view('/elements/buttons-group', 'theme-template/elements.buttons-group');
Route::view('/elements/color-library', 'theme-template/elements.color-library');
Route::view('/elements/dropdown', 'theme-template/elements.dropdown');
Route::view('/elements/infobox', 'theme-template/elements.infobox');
Route::view('/elements/jumbotron', 'theme-template/elements.jumbotron');
Route::view('/elements/loader', 'theme-template/elements.loader');
Route::view('/elements/pagination', 'theme-template/elements.pagination');
Route::view('/elements/popovers', 'theme-template/elements.popovers');
Route::view('/elements/progress-bar', 'theme-template/elements.progress-bar');
Route::view('/elements/search', 'theme-template/elements.search');
Route::view('/elements/tooltips', 'theme-template/elements.tooltips');
Route::view('/elements/treeview', 'theme-template/elements.treeview');
Route::view('/elements/typography', 'theme-template/elements.typography');

Route::view('/charts', 'theme-template/charts');
Route::view('/widgets', 'theme-template/widgets');
Route::view('/font-icons', 'theme-template/font-icons');
Route::view('/dragndrop', 'theme-template/dragndrop');

Route::view('/tables', 'theme-template/tables');

Route::view('/datatables/advanced', 'theme-template/datatables.advanced');
Route::view('/datatables/alt-pagination', 'theme-template/datatables.alt-pagination');
Route::view('/datatables/basic', 'theme-template/datatables.basic');
Route::view('/datatables/checkbox', 'theme-template/datatables.checkbox');
Route::view('/datatables/clone-header', 'theme-template/datatables.clone-header');
Route::view('/datatables/column-chooser', 'theme-template/datatables.column-chooser');
Route::view('/datatables/export', 'theme-template/datatables.export');
Route::view('/datatables/multi-column', 'theme-template/datatables.multi-column');
Route::view('/datatables/multiple-tables', 'theme-template/datatables.multiple-tables');
Route::view('/datatables/order-sorting', 'theme-template/datatables.order-sorting');
Route::view('/datatables/range-search', 'theme-template/datatables.range-search');
Route::view('/datatables/skin', 'theme-template/datatables.skin');
Route::view('/datatables/sticky-header', 'theme-template/datatables.sticky-header');

Route::view('/forms/basic', 'theme-template/forms.basic');
Route::view('/forms/input-group', 'theme-template/forms.input-group');
Route::view('/forms/layouts', 'theme-template/forms.layouts');
Route::view('/forms/validation', 'theme-template/forms.validation');
Route::view('/forms/input-mask', 'theme-template/forms.input-mask');
Route::view('/forms/select2', 'theme-template/forms.select2');
Route::view('/forms/touchspin', 'theme-template/forms.touchspin');
Route::view('/forms/checkbox-radio', 'theme-template/forms.checkbox-radio');
Route::view('/forms/switches', 'theme-template/forms.switches');
Route::view('/forms/wizards', 'theme-template/forms.wizards');
Route::view('/forms/file-upload', 'theme-template/forms.file-upload');
Route::view('/forms/quill-editor', 'theme-template/forms.quill-editor');
Route::view('/forms/markdown-editor', 'theme-template/forms.markdown-editor');
Route::view('/forms/date-picker', 'theme-template/forms.date-picker');
Route::view('/forms/clipboard', 'theme-template/forms.clipboard');

Route::view('/users/profile', 'theme-template/users.profile');
Route::view('/users/user-account-settings', 'theme-template/users.user-account-settings');

Route::view('/pages/knowledge-base', 'theme-template/pages.knowledge-base');
Route::view('/pages/contact-us-boxed', 'theme-template/pages.contact-us-boxed');
Route::view('/pages/contact-us-cover', 'theme-template/pages.contact-us-cover');
Route::view('/pages/faq', 'theme-template/pages.faq');
Route::view('/pages/coming-soon-boxed', 'theme-template/pages.coming-soon-boxed');
Route::view('/pages/coming-soon-cover', 'theme-template/pages.coming-soon-cover');
Route::view('/pages/error404', 'theme-template/pages.error404');
Route::view('/pages/error500', 'theme-template/pages.error500');
Route::view('/pages/error503', 'theme-template/pages.error503');
Route::view('/pages/maintenence', 'theme-template/pages.maintenence');

Route::view('/auth/boxed-lockscreen', 'theme-template/auth.boxed-lockscreen');
Route::view('/auth/boxed-signin', 'theme-template/auth.boxed-signin');
Route::view('/auth/boxed-signup', 'theme-template/auth.boxed-signup');
Route::view('/auth/boxed-password-reset', 'theme-template/auth.boxed-password-reset');
Route::view('/auth/cover-login', 'theme-template/auth.cover-login');
Route::view('/auth/cover-register', 'theme-template/auth.cover-register');
Route::view('/auth/cover-lockscreen', 'theme-template/auth.cover-lockscreen');
Route::view('/auth/cover-password-reset', 'theme-template/auth.cover-password-reset');
